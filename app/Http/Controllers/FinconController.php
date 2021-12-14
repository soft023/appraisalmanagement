<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Result;
use App\Generalappraisal;
use App\Quantitative;
use App\Supervisor;
use App\Position;
use App\Gradelevel;
use App\Department;
use App\Keyresultareaquestion;
use App\Keyresultareaanswer;
use App\Keyarea;
use App\Accountability;
use App\Reliability;
use App\Initiative;
use App\Customerfocus;
use App\Efficiency;
use App\Professionalism;
use App\Qualitativeresult;
use App\Refrence;

use Auth;

use Redirect;
use Session;

class FinconController extends Controller
{

public function __construct()
{
$this->middleware('auth');
$this->middleware('fincon');
}

public function showpending()
{
$pending = Generalappraisal::all()->where('status', 1);
return view('fincon/pendingstaffappraisallist')->with('profile',$pending);
}




public function showallappraisals()

{

$pending = Quantitative::all()->where('status', 3);
return view('fincon/listofappraisals')->with('quantitative',$pending);

}



public function showappraisalform($userid)

{

$gen = Generalappraisal::all()->where('userid', $userid)->last();

$pos = $gen['position'];
$dep = $gen['department'];
$code = $gen['code'];

Session::put('position', $pos);
Session::put('userid', $userid);
Session::put('department', $dep);
Session::put('code', $code);
session()->forget('fin');
return view('fincon/quantitativeform');

}





public function showrejectedappraisals()

{

$pending = Quantitative::all()->where('status', 2);
return view('fincon/listofrejectedappraisal')->with('reject',$pending);

}




public function showrejectedappraisalform($id)

{
session()->forget('fx');
$qua = Quantitative::all()->where('id', $id);

foreach ($qua as $key ) {
	$pos = $key->position;
}

Session::put('position', $pos);

return view('fincon/editrejectedappraisal')->with('quantitative',$qua);

}



public function showappraisaldetails($id)
{
$qua = Quantitative::all()->where('id', $id);

return view('fincon/appraisaldetail')->with('quantitative',$qua);

}




public function submitappraisalbo()
{

$ref = Refrence::all()->where('status',1);
foreach ($ref as $key ) {
	$ref = $key->ref;
}

$dep = Input::get('department');
$userid = Input::get('userid');


$user =  User::all()->where('id',$userid);
foreach ($user as $key ) {
	$sup = $key->supervisor;
}


if($sup == "Sherifdeen Rabiu"){
	$dep = "MD OFFICE";
}


$userid = $userid;
$pos = Input::get('position');
$dep = $dep;
$code = Input::get('code');
$weight = Input::get('weight');
$target =  Input::get('target');
$target  = str_replace( ',', '', $target );
$actual = Input::get('actual');
$actual  = str_replace( ',', '', $actual );
$sc = $actual /$target;
if ($sc > 1 ){
	$sc = 1;
	$exceed = $actual - $target;
	$exceed = "Deposit Target exceeded by N".$exceed;
}else{
	$sc = $sc;
	$exceed = "Not Exceeded";
}

$score =  $sc* $weight * 0.2 * 100;

$userinfo = Generalappraisal::all()->where('userid',$userid)->where('code',$code);



$fname = Auth::user()->firstname ." ".Auth::user()->lastname ;
foreach ($userinfo as $key) {
	$fna = $key->firstname;
	$lnam = $key->lastname;
	$gid = $key->id;
	$uid = $key->userid;
	$ref = $key->ref;
}

$stat = Quantitative::all()->where('userid',$userid)->where('code',$code);

//return $stat;
//Saving into the db


if(!$stat->isEmpty()){

$message = "You have already submitted and it's being processed";

}else{


$appraisal = new Quantitative;
$appraisal->ref = $ref;
$appraisal->userid = $userid;
$appraisal->code = $code;
$appraisal->firstname = $fna;
$appraisal->lastname = $lnam;
$appraisal->position = $pos;
$appraisal->department = $dep;
$appraisal->finconname = $fname ;
$appraisal->targetbo = $target;
$appraisal->actualbo = $actual;
$appraisal->exceeddeposittarget = $exceed;
$appraisal->weightbo = $weight;
$appraisal->score = $score;
$appraisal->status = 1;
$appraisal->save();

$message = "Submitted Successfully";
}



$genupdate = Generalappraisal::find($gid);
$genupdate->status = 2;
$genupdate->save();

return $this->showpending(); 

}










public function submitappraisalro()

{

$ref = Refrence::all()->where('status',1);
foreach ($ref as $key ) {
	$ref = $key->ref;
}

$dep = Input::get('department');
$userid = Input::get('userid');


$user =  User::all()->where('id',$userid);
foreach ($product as $key ) {
	$sup = $key->supervisor;
}


if($sup == "Sherifdeen Rabiu"){
	$dep = "MD OFFICE";
}

$a = Input::get('acctopentarget');
$a  = str_replace( ',', '', $a );
$aa =Input::get('acctopenactual');
$aa  = str_replace( ',', '', $aa );
$aaa = Input::get('acctopenweight');
$ax =  ($aa / $a );
if ($ax > 1 ){
	$ax = 1;
}
$acctopenscore = $ax * $aaa ;



$b = Input::get('liagentarget');
$b  = str_replace( ',', '', $b );
$bb = Input::get('liagenactual');
$bb  = str_replace( ',', '', $bb );
$bbb = Input::get('liagenweight');
$sc = $bb / $b;

if ($sc > 1 ){
	$sc = 1;
	$exceed = $bb - $b;
	$exceed = "Deposit Target exceeded by N".$exceed;
}else{
	$exceed = "Not Exceeded";
}
$liagenscore = $sc * $bbb ;



$c = Input::get('risktarget');
$c  = str_replace( ',', '', $c );
$cc = Input::get('riskactual');
$cc  = str_replace( ',', '', $cc );
$ccc = Input::get('riskweight');

$cx = ($cc / $c );
$riskex = "Not Exceeded";
if ($cx > 1 ){
	$cx = 1;
	$riskex = $cc - $c;
}
$riskexceed = $riskex;
$riskscore = $cx * $ccc ;


$d = Input::get('eproducttarget');
$d  = str_replace( ',', '', $d );
$dd = Input::get('eproductactual');
$dd  = str_replace( ',', '', $dd );
$ddd = Input::get('eproductweight');


if ($dd > $d ){
	$dx = 1;
}
if ($d == 0 ){
	$dx = 0;
}else{
 $dx = ($dd / $d );
}
$eproductscore = $dx * $ddd  ;




$e = Input::get('feeandcomtarget');
$e  = str_replace( ',', '', $e );
$ee = Input::get('feeandcomactual');
$ee  = str_replace( ',', '', $ee );
$eee = Input::get('feeandcomweight');


if ($ee > $e){
	$ex = 1;
}

if ($e == 0 ){
	$ex = 0;
}else{
$ex = ($ee / $e );	
}


$feeandcomscore = $ex * $eee  ;

$f = Input::get('totrevtarget');
$f  = str_replace( ',', '', $f );
$ff = Input::get('totrevactual');
$ff  = str_replace( ',', '', $ff );
$fff = Input::get('totrevweight');


if ($ff > $f ){
	$fx = 1;
}

if ($f == 0 ){
	$fx = 0;
}else{
$fx = ($ff / $f );	
}



$totrevscore = $fx *  $fff  ;




$g = Input::get('partarget');
$g  = str_replace( ',', '', $g );
$gg = Input::get('paractual');
$gg  = str_replace( ',', '', $gg );
$ggg = Input::get('parweight');


if ($gg > $g ){
	$gx = 1;
}
if ($g == 0 ){
	$gx = 0;
}else{
$gx = ($gg / $g );	
}
$parscore = $gx *  $ggg ;



$h = Input::get('crosstarget');
$h  = str_replace( ',', '', $h );
$hh = Input::get('crossactual');
$hh  = str_replace( ',', '', $hh );
$hhh = Input::get('crossweight');


if ($hh > $h ){
	$hx = 1;
}

if ($h == 0 ){
	$hx = 0;
}else{
$hx = ($hh / $h );	
}
$crossscore = $hx *  $hhh ;





$tot = $crossscore + $parscore + $totrevscore + $feeandcomscore + $eproductscore + $riskscore + $liagenscore  + $acctopenscore;


$totalscore = $tot * 0.7 * 100 ;

$userid = Input::get('userid');
$code = Input::get('code');
$pos = Input::get('position');

$userinfo = Generalappraisal::all()->where('userid',$userid)->where('code',$code);

$fname = Auth::user()->firstname ." ".Auth::user()->lastname ;

foreach ($userinfo as $key) {
	$fna = $key->firstname;
	$lnam = $key->lastname;
	$gid = $key->id;
	$position = $key->position;
	$ref = $key->ref;

}

//check if exist
$stat = Quantitative::all()->where('userid',$userid)->where('code',$code);

//Saving into the db


if(!$stat->isEmpty()){

$message = "You have already submitted and it's being processed";

}else{
$appraisal = new Quantitative;
$appraisal->ref = $ref;
$appraisal->userid = $userid;
$appraisal->code = $code;
$appraisal->firstname = $fna;
$appraisal->lastname = $lnam;
$appraisal->position = $position;
$appraisal->department = $dep;
$appraisal->finconname  = $fname;


$appraisal->acctopentarget =$a ;
$appraisal->acctopenactual =$aa ;
$appraisal->acctopenweight = $aaa;
$appraisal->acctopenscore = $acctopenscore ;

$appraisal->liagentarget = $b;
$appraisal->liagenactual = $bb ;
$appraisal->liagenweight = $bbb;
$appraisal->liagenscore =  $liagenscore;

$appraisal->risktarget = $c;
$appraisal->riskactual = $cc;
$appraisal->riskweight = $ccc;
$appraisal->riskscore = $riskscore;
$appraisal->exceedrisktarget = $riskexceed;

$appraisal->eproducttarget = $d;
$appraisal->eproductactual = $dd;
$appraisal->eproductweight = $ddd;
$appraisal->eproductscore = $eproductscore;

$appraisal->feeandcomtarget = $e;
$appraisal->feeandcomactual = $ee;
$appraisal->feeandcomweight = $eee;
$appraisal->feeandcomscore = $feeandcomscore;

$appraisal->totrevtarget = $f;
$appraisal->totrevactual = $ff;
$appraisal->totrevweight = $fff;
$appraisal->totrevscore = $totrevscore;

$appraisal->partarget = $g;
$appraisal->paractual = $gg;
$appraisal->parweight = $ggg;
$appraisal->parscore = $parscore;

$appraisal->crosstarget = $h;
$appraisal->crossactual = $hh;
$appraisal->crossweight = $hhh;
$appraisal->crossscore = $crossscore;
$appraisal->exceeddeposittarget = $exceed;

$appraisal->score = $totalscore ;
$appraisal->status = 1 ;
$appraisal->save();




$message ="Submitted Successfully";
}


$genupdate = Generalappraisal::find($gid);
$genupdate->status = 2;
$genupdate->save();

return $this->showpending()->with('message', $message);

}







public function updatebo()
{

$qid = Input::get('qid');
$weight = Input::get('weight');
$target = Input::get('target');
$actual = Input::get('actual');
$actual  = str_replace( ',', '', $actual );
$target  = str_replace( ',', '', $target );


$sc = $actual / $target;

if ($sc > 1 ){
	$sc = 1;
	$exceed = ($actual - $target);
	$exceed = "Deposit Target exceeded by N".$exceed;
}else{
	$sc = $sc;
	$exceed = "Not Exceeded";
}

$score =  $sc* $weight * 0.2 * 100;


$appraisal = Quantitative::find($qid);
$appraisal->targetbo = $target;
$appraisal->actualbo = $actual;
$appraisal->weightbo = $weight;
$appraisal->exceeddeposittarget = $exceed;
$appraisal->score = $score;
$appraisal->status = 1;
$appraisal->save();
$message = "Correction has been submitted successfully";

return $this->showrejectedappraisals()->with('message',$message); 

}







public function updatero()

{

$qid = Input::get('qid');



$a = Input::get('acctopentarget');
$aa = Input::get('acctopenactual');
$aaa = Input::get('acctopenweight');
$ax = ($aa / $a );
if ($ax > 1 ){
	$ax = 1;
}

$acctopenscore = $ax * $aaa ;



$b = Input::get('liagentarget');
$b  = str_replace( ',', '', $b );
$bb = Input::get('liagenactual');
$bb  = str_replace( ',', '', $bb );
$bbb = Input::get('liagenweight');
$sc = $bb / $b;

if ($sc > 1 ){
	$sc = 1;
	$exceed = $bb - $b;
	$exceed = "Deposit Target exceeded by N".$exceed;
}else{
	$exceed = "Not Exceeded";
}
$liagenscore = $sc * $bbb ;



$c = Input::get('risktarget');
$c  = str_replace( ',', '', $c );
$cc = Input::get('riskactual');
$cc  = str_replace( ',', '', $cc );
$ccc = Input::get('riskweight');

$cx = ($cc / $c );
$riskex = "Not Exceeded";
if ($cx > 1 ){
	$cx = 1;
	$riskex = $cc - $c;
}
$riskexceed = $riskex;
$riskscore = $cx * $ccc ;


$d = Input::get('eproducttarget');
$d  = str_replace( ',', '', $d );
$dd = Input::get('eproductactual');
$dd  = str_replace( ',', '', $dd );
$ddd = Input::get('eproductweight');


if ($dd > $d ){
	$dx = 1;
}
if ($d == 0 ){
	$dx = 0;
}else{
 $dx = ($dd / $d );
}
$eproductscore = $dx * $ddd  ;




$e = Input::get('feeandcomtarget');
$e  = str_replace( ',', '', $e );
$ee = Input::get('feeandcomactual');
$ee  = str_replace( ',', '', $ee );
$eee = Input::get('feeandcomweight');


if ($ee > $e){
	$ex = 1;
}

if ($e == 0 ){
	$ex = 0;
}else{
$ex = ($ee / $e );	
}


$feeandcomscore = $ex * $eee  ;

$f = Input::get('totrevtarget');
$f  = str_replace( ',', '', $f );
$ff = Input::get('totrevactual');
$ff  = str_replace( ',', '', $ff );
$fff = Input::get('totrevweight');


if ($ff > $f ){
	$fx = 1;
}

if ($f == 0 ){
	$fx = 0;
}else{
 $fx = ($ff / $f );
}


$totrevscore = $fx *  $fff  ;




$g = Input::get('partarget');
$g  = str_replace( ',', '', $g );
$gg = Input::get('paractual');
$gg  = str_replace( ',', '', $gg );
$ggg = Input::get('parweight');


if ($gg > $g ){
	$gx = 1;
}
if ($g == 0 ){
	$gx = 0;
}else{
$gx = ($gg / $g );	
}
$parscore = $gx *  $ggg ;



$h = Input::get('crosstarget');
$h  = str_replace( ',', '', $h );
$hh = Input::get('crossactual');
$hh  = str_replace( ',', '', $hh );
$hhh = Input::get('crossweight');


if ($hh > $h ){
	$hx = 1;
}

if ($h == 0 ){
	$hx = 0;
}else{
$hx = ($hh / $h );	
}

$crossscore = $hx *  $hhh ;


$tot = $crossscore + $parscore + $totrevscore + $feeandcomscore + $eproductscore + $riskscore + $liagenscore  + $acctopenscore;


$totalscore = $tot * 0.7 * 100 ;




//Saving into the db


$appraisal = Quantitative::find($qid);

$appraisal->acctopentarget =$a ;
$appraisal->acctopenactual =$aa ;
$appraisal->acctopenweight = $aaa;
$appraisal->acctopenscore = $acctopenscore ;

$appraisal->liagentarget = $b;
$appraisal->liagenactual = $bb ;
$appraisal->liagenweight = $bbb;
$appraisal->liagenscore =  $liagenscore;

$appraisal->risktarget = $c;
$appraisal->riskactual = $cc;
$appraisal->riskweight = $ccc;
$appraisal->riskscore = $riskscore;
$appraisal->exceedrisktarget = $riskexceed;

$appraisal->eproducttarget = $d;
$appraisal->eproductactual = $dd;
$appraisal->eproductweight = $ddd;
$appraisal->eproductscore = $eproductscore;

$appraisal->feeandcomtarget = $e;
$appraisal->feeandcomactual = $ee;
$appraisal->feeandcomweight = $eee;
$appraisal->feeandcomscore = $feeandcomscore;

$appraisal->totrevtarget = $f;
$appraisal->totrevactual = $ff;
$appraisal->totrevweight = $fff;
$appraisal->totrevscore = $totrevscore;

$appraisal->partarget = $g;
$appraisal->paractual = $gg;
$appraisal->parweight = $ggg;
$appraisal->parscore = $parscore;

$appraisal->crosstarget = $h;
$appraisal->crossactual = $hh;
$appraisal->crossweight = $hhh;
$appraisal->crossscore = $crossscore;

$appraisal->exceeddeposittarget = $exceed;
$appraisal->score = $totalscore ;
$appraisal->status = 1 ;
$appraisal->save();








$message = "Correction has been submitted successfully";

return $this->showpending();

}



}
