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
use App\Finalreport;
use Auth;

use Redirect;
use Session;

class SupervisorController extends Controller
{

public function __construct()
{
$this->middleware('auth');
$this->middleware('supervisor');
}


   public function showallresult()
{

$dep = Auth::user()->department;
$result = Result::all()->where('department',$dep)->where('status',2);

return view('supervisor/allstaffappraisallist')->with('result',$result);

}




public function fulldetails()
{

$rid = Input::get('rid');
$code = Input::get('code');

$result = Result::all()->where('id',$rid);


foreach ($result as $key) {
$pos = $key->position;
$userid = $key->userid;
}

Session::put('position', $pos);


$quantitative = quantitative::all()->where('userid',$userid)->where('code',$code);
$qualitative = Qualitativeresult::all()->where('userid',$userid)->where('code',$code);
$result = Result::all()->where('userid',$userid)->where('code',$code);
$keyresultareaanswer = Keyresultareaanswer::all()->where('userid',$userid)->where('code',$code);
$generalapp = Generalappraisal::all()->where('userid',$userid)->where('code',$code);



$keyresultareaquestion = Keyresultareaquestion::all()->where('position',$pos);
$keyarea = Keyarea::all()->where('position', $pos);
$accountability =  Accountability::all();
$reliability =  Reliability::all();
$initiative =  Initiative::all();
$customerfocus =  Customerfocus::all();
$efficiency =  Efficiency::all();
$professionalism =  Professionalism::all();



return view('Supervisor/staffappraisaldetail')
->with('generalapp', $generalapp)
->with('quantitative', $quantitative)
->with('qualitative', $qualitative)
->with('result', $result)
->with('keyarea', $keyarea)
->with('keyresultareaquestion', $keyresultareaquestion)
->with('keyresultareaanswer', $keyresultareaanswer)
->with('accountability', $accountability)
->with('reliability', $reliability)
->with('initiative', $initiative)
->with('customerfocus', $customerfocus)
->with('efficiency', $efficiency)
->with('professionalism', $professionalism);

}












public function showpending()
{


$pending = Quantitative::all()->where('department', Auth::user()->department)->where('status',3);

return view('supervisor/pendingstaffappraisal')->with('pending',$pending);

}


public function appraisalform()
{

$userid = Input::get('userid');
$code = Input::get('code');

$userinfo = User::all()->where('id', $userid);
foreach ($userinfo as $key ) {
	$pos = $key->position;
}



Session::put('position', $pos);
Session::put('userid', $userid);
Session::put('code', $code);

$accountability =  Accountability::all();
$reliability =  Reliability::all();
$initiative =  Initiative::all();
$customerfocus =  Customerfocus::all();
$efficiency =  Efficiency::all();
$professionalism =  Professionalism::all();
$question = Keyresultareaquestion::all()->where('position', $pos);
$general = Generalappraisal::all()->where('userid', $userid)->where('code', $code);

if($pos == "Relationship Officer"){

$vw = 'supervisor/qualitativeform';

}else{

$vw = 'supervisor/keyresultarea';

}

session()->forget('superx');



return view($vw)
->with('general', $general)
->with('keyresultareaquestion', $question)
->with('accountability', $accountability)
->with('reliability', $reliability)
->with('initiative', $initiative)
->with('customerfocus', $customerfocus)
->with('efficiency', $efficiency)
->with('professionalism', $professionalism);


}








//key aread submission which will lead to bo main qual form
public function submitkey()
{
$userid = Input::get('userid');
$code = Input::get('code');
$type = Input::get('typex');


$ref = Refrence::all()->where('status',1);
foreach ($ref as $key ) {
	$ref = $key->ref;
}

$refx = Finalreport::all()->where('userid',$userid)->where('reference',$ref);
foreach ($refx as $key) {
	$fid = $key->id;	
}



$userinfo = User::all()->where('id', $userid);
foreach ($userinfo as $key ) {
$position = $key->position;
$fname = $key->firstname;
$lname = $key->lastname;
$dep = $key->department;
}






$sname = Auth::user()->firstname." ".Auth::user()->lastname;

if($type == 1){

$a = Input::get('resultone');
$b = Input::get('resulttwo');
$c = Input::get('resultthree');
$d = Input::get('resultfour');
$e = Input::get('resultfive');
$weight = 1;
$score = ($a * $weight) + ($b * $weight) + ($c * $weight) + ($d * $weight) + ($e * $weight) ;
$score =  $score * 0.1 * 10 ;

$stat = Keyresultareaanswer::all()->where('userid',$userid)->where('code',$code);

if(!$stat->isEmpty()){

$message = "You have already submitted and it's being processed";

}else{



$key = new Keyresultareaanswer;
$key->ref = $ref;
$key->userid = $userid;
$key->code = $code;
$key->firstname = $fname;
$key->lastname = $lname;
$key->position = $position;
$key->department = $dep;
$key->supervisorname = $sname;
$key->resultone = $a;
$key->resulttwo =$b;
$key->resultthree = $c;
$key->resultfour = $d;
$key->resultfive = $e;
$key->keyresultweight = $weight;
$key->score = $score;
$key->save();


$qat = Quantitative::all()->where('userid',$userid)->where('code',$code);
foreach ($qat as $gt) {
	$qtscore = $gt->score;	
}




}

}else{



$a = Input::get('resultone');
$b = Input::get('resulttwo');
$c = Input::get('resultthree');
$d = Input::get('resultfour');
$e = Input::get('resultfive');
$f = Input::get('resultsix');
$g = Input::get('resultseven');
$h = Input::get('resulteight');
$i = Input::get('resultnine');
$j = Input::get('resultten');

$weight = 1;

$score = ($a * $weight) + ($b * $weight) + ($c * $weight) + ($d * $weight) + ($e * $weight) + ($f * $weight) 
+ ($g * $weight) + ($h * $weight) + ($i * $weight) + ($j * $weight);

$score =  $score * 0.1 * 10 ;
$stat = Keyresultareaanswer::all()->where('userid',$userid)->where('code',$code);

if(!$stat->isEmpty()){

$message = "You have already submitted and it's being processed";

}else{


$qat = Quantitative::all()->where('userid',$userid)->where('code',$code);
foreach ($qat as $gt) {
	$qtscore = $gt->score;	
}

$refx = Finalreport::all()->where('userid',$userid)->where('reference',$ref);
foreach ($refx as $key) {
$fid = $key->id;	
}


$key = new Keyresultareaanswer;
$key->ref = $ref;
$key->userid = $userid;
$key->code = $code;
$key->firstname = $fname;
$key->lastname = $lname;
$key->position = $position;
$key->department = $dep;
$key->supervisorname = $sname;
$key->resultone = $a;
$key->resulttwo =$b;
$key->resultthree = $c;
$key->resultfour = $d;
$key->resultfive = $e;
$key->resultsix = $f;
$key->resultseven = $g;
$key->resulteight= $h;
$key->resultnine = $i;
$key->resultten = $j;
$key->keyresultweight = $weight;
$key->score = $score;
$key->save();






}


}


Session::put('position', $position);
Session::put('userid', $userid);
Session::put('code', $code);

$keyarea = Keyarea::all()->where('position', $position);
$accountability =  Accountability::all();
$reliability =  Reliability::all();
$initiative =  Initiative::all();
$customerfocus =  Customerfocus::all();
$efficiency =  Efficiency::all();
$professionalism =  Professionalism::all();
$general = Generalappraisal::all()->where('userid', $userid)->where('code', $code);


return view('supervisor/qualitativeform')
->with('general', $general)
->with('keyareas', $keyarea)
->with('accountability', $accountability)
->with('reliability', $reliability)
->with('initiative', $initiative)
->with('customerfocus', $customerfocus)
->with('efficiency', $efficiency)
->with('professionalism', $professionalism);

}






public function confirmappraisal(Request $request)
{  

$data = $request->all();
$userid = Input::get('userid');
$code = Input::get('code');

$userinfo = User::all()->where('id', $userid);
foreach ($userinfo as $key ) {
$pos = $key->position;
}

// Session::put('position', $pos);
// Session::put('userid', $userid);
// Session::put('code', $code);

$accountability =  Accountability::all();
$reliability =  Reliability::all();
$initiative =  Initiative::all();
$customerfocus =  Customerfocus::all();
$efficiency =  Efficiency::all();
$professionalism =  Professionalism::all();
$keyarea = Keyarea::all()->where('position', $pos);

$vw = 'supervisor/confirmqualitativeform';


return view($vw)
->with('data',$data)
->with('keyareas', $keyarea)
->with('accountability', $accountability)
->with('reliability', $reliability)
->with('initiative', $initiative)
->with('customerfocus', $customerfocus)
->with('efficiency', $efficiency)
->with('professionalism', $professionalism);




}






public function submitappraisal()
{
$ref = Refrence::all()->where('status',1);
foreach ($ref as $key ) {
	$ref = $key->ref;
}

$userid = Input::get('userid');
$code = Input::get('code');

$refx = Finalreport::all()->where('userid',$userid)->where('reference',$ref);
foreach ($refx as $key) {
	$fid = $key->id;	
}

// $pos = User::all()->where('id', $userid);


$userinfo = Generalappraisal::all()->where('userid', $userid)->where('code',$code);
foreach ($userinfo as $key ) {
$position = $key->position;
$id = $key->id;
$fname = $key->firstname;
$lname = $key->lastname;
$dep = $key->department;
}


$quantid = Quantitative::all()->where('userid',$userid)->where('code',$code);
foreach ($quantid as $keyz) {
	$qid = $keyz->id;
}



if( $position != "Relationship Officer"){

$stat = Qualitativeresult::all()->where('userid',$userid)->where('code',$code);

if(!$stat->isEmpty()){

$message = "You have already submitted and it's being processed";

}else{

$k = Input::get('keyareaone');
$kk = Input::get('keyareatwo');
$kkk = Input::get('keyareathree');
$kkkk = Input::get('keyareafour');
$kkkkk = Input::get('keyareafive');

$a = Input::get('accountabilityone');
$aa = Input::get('accountabilitytwo');
$aaa = Input::get('accountabilitythree');
$aaaa = Input::get('accountabilityfour');

$r = Input::get('reliabilityone');
$rr = Input::get('reliabilitytwo');
$rrr = Input::get('reliabilitythree');
$rrrr = Input::get('reliabilityfour');
$rrrrr = Input::get('reliabilityfive');

$i = Input::get('initiativeone');
$ii = Input::get('initiativetwo');
$iii = Input::get('initiativethree');
$iiii = Input::get('initiativefour');
$iiiii = Input::get('initiativefive');
$iiiiii = Input::get('initiativesix');


$c = Input::get('customerfocusone');
$cc = Input::get('customerfocustwo');
$ccc = Input::get('customerfocusthree');
$cccc = Input::get('customerfocusfour');
$ccccc = Input::get('customerfocusfive');
$cccccc = Input::get('customerfocussix');

$e = Input::get('efficiencyone');
$ee = Input::get('efficiencytwo');
$eee = Input::get('efficiencythree');
$eeee = Input::get('efficiencyfour');
$eeeee = Input::get('efficiencyfive');
$eeeeee = Input::get('efficiencysix');
$eeeeeee = Input::get('efficiencyseven');



$p = Input::get('professionalismone');
$pp = Input::get('professionalismtwo');
$ppp = Input::get('professionalismthree');
$pppp = Input::get('professionalismfour');
$ppppp = Input::get('professionalismfive');
$pppppp = Input::get('professionalismsix');
$ppppppp = Input::get('professionalismseven');
$pppppppp = Input::get('professionalismeight');
$ppppppppp = Input::get('professionalismnine');
$pppppppppp = Input::get('professionalismten');
$ppppppppppp = Input::get('professionalismeleven');
$pppppppppppp = Input::get('professionalismtwelve');

$totk = $k + $kk + $kkk + $kkkk + $kkkkk;
$totp = $p + $pp + $ppp + $pppp + $ppppp + $pppppp + $ppppppp + $pppppppp + $ppppppppp + $pppppppppp + $ppppppppppp + $pppppppppppp ;
$tote = $e + $ee + $eee + $eeee + $eeeee + $eeeeee + $eeeeeee ;
$totc = $c + $cc + $ccc + $cccc + $ccccc + $cccccc ;
$toti = $i + $ii + $iii + $iiii + $iiiii + $iiiiii ;
$totr = $r + $rr + $rrr + $rrrr + $rrrrr ;
$tota = $a + $aa + $aaa + $aaaa  ;

$score = (($totk+$totp+$tote+$totc+$toti+$totr+$tota) / 225) * ( 70 /100 ) * 100;

$sname = Auth::user()->firstname." ".Auth::user()->lastname;


$key = new Qualitativeresult;

$key->ref = $ref;
$key->userid = $userid;
$key->code = $code;
$key->firstname = $fname;
$key->lastname = $lname;
$key->position = $position;
$key->department = $dep;
$key->supervisorname = $sname;


$key->keyareaone = $k;
$key->keyareatwo = $kk;
$key->keyareathree = $kkk;
$key->keyareafour = $kkkk;
$key->keyareafive = $kkkkk;

$key->accountabilityone = $a;
$key->accountabilitytwo = $aa;
$key->accountabilitythree = $aaa;
$key->accountabilityfour = $aaaa;


$key->reliabilityone = $r;
$key->reliabilitytwo = $rr;
$key->reliabilitythree = $rrr;
$key->reliabilityfour = $rrrr;
$key->reliabilityfive = $rrrrr;


$key->initiativeone = $i;
$key->initiativetwo = $ii;
$key->initiativethree = $iii;
$key->initiativefour = $iiii;
$key->initiativefive = $iiiii;
$key->initiativesix = $iiiiii;



$key->customerfocusone = $c;
$key->customerfocustwo = $cc;
$key->customerfocusthree = $ccc;
$key->customerfocusfour = $cccc;
$key->customerfocusfive = $ccccc;
$key->customerfocussix = $cccccc;


$key->efficiencyone = $e;
$key->efficiencytwo = $ee;
$key->efficiencythree = $eee;
$key->efficiencyfour = $eeee;
$key->efficiencyfive = $eeeee;
$key->efficiencysix = $eeeeee;
$key->efficiencyseven = $eeeeeee;


$key->professionalismone = $p;
$key->professionalismtwo = $pp;
$key->professionalismthree = $ppp;
$key->professionalismfour = $pppp;
$key->professionalismfive = $ppppp;
$key->professionalismsix = $pppppp;
$key->professionalismseven = $ppppppp;            
$key->professionalismeight = $pppppppp;
$key->professionalismnine = $ppppppppp;
$key->professionalismten = $pppppppppp;
$key->professionalismeleven = $ppppppppppp;
$key->professionalismtwelve = $pppppppppppp;

$key->score = $score;
$key->weakness = Input::get('weakness');
$key->strength = Input::get('strength');
$key->trainingneeded = Input::get('trainingneeded');
$key->supervisorcomment = Input::get('comment');
$key->status = 1    ;
$key->save();



$final = Finalreport::find($fid);
$final->qualitativescore  = $score ;
$final->save();




}
}else{

$stat = Qualitativeresult::all()->where('userid',$userid)->where('code',$code);

if(!$stat->isEmpty()){

$message = "You have already submitted and it's being processed";

}else{

$a = Input::get('accountabilityone');
$aa = Input::get('accountabilitytwo');
$aaa = Input::get('accountabilitythree');
$aaaa = Input::get('accountabilityfour');

$r = Input::get('reliabilityone');
$rr = Input::get('reliabilitytwo');
$rrr = Input::get('reliabilitythree');
$rrrr = Input::get('reliabilityfour');
$rrrrr = Input::get('reliabilityfive');

$i = Input::get('initiativeone');
$ii = Input::get('initiativetwo');
$iii = Input::get('initiativethree');
$iiii = Input::get('initiativefour');
$iiiii = Input::get('initiativefive');
$iiiiii = Input::get('initiativesix');


$c = Input::get('customerfocusone');
$cc = Input::get('customerfocustwo');
$ccc = Input::get('customerfocusthree');
$cccc = Input::get('customerfocusfour');
$ccccc = Input::get('customerfocusfive');
$cccccc = Input::get('customerfocussix');

$e = Input::get('efficiencyone');
$ee = Input::get('efficiencytwo');
$eee = Input::get('efficiencythree');
$eeee = Input::get('efficiencyfour');
$eeeee = Input::get('efficiencyfive');
$eeeeee = Input::get('efficiencysix');
$eeeeeee = Input::get('efficiencyseven');



$p = Input::get('professionalismone');
$pp = Input::get('professionalismtwo');
$ppp = Input::get('professionalismthree');
$pppp = Input::get('professionalismfour');
$ppppp = Input::get('professionalismfive');
$pppppp = Input::get('professionalismsix');
$ppppppp = Input::get('professionalismseven');
$pppppppp = Input::get('professionalismeight');
$ppppppppp = Input::get('professionalismnine');
$pppppppppp = Input::get('professionalismten');
$ppppppppppp = Input::get('professionalismeleven');
$pppppppppppp = Input::get('professionalismtwelve');


$totp = $p + $pp + $ppp + $pppp + $ppppp + $pppppp + $ppppppp + $pppppppp + $ppppppppp + $pppppppppp + $ppppppppppp + $pppppppppppp ;
$tote = $e + $ee + $eee + $eeee + $eeeee + $eeeeee + $eeeeeee ;
$totc = $c + $cc + $ccc + $cccc + $ccccc + $cccccc ;
$toti = $i + $ii + $iii + $iiii + $iiiii + $iiiiii ;
$totr = $r + $rr + $rrr + $rrrr + $rrrrr ;
$tota = $a + $aa + $aaa + $aaaa  ;

$score = (($totp+$tote+$totc+$toti+$totr+$tota) / 200) * ( 30 / 100 ) * 100;
$sname = Auth::user()->firstname." ".Auth::user()->lastname;


$key = new Qualitativeresult;


$key->ref = $ref;
$key->userid = $userid;
$key->code = $code;
$key->firstname = $fname;
$key->lastname = $lname;
$key->position = $position;
$key->department = $dep;
$key->supervisorname = $sname;

$key->accountabilityone = $a;
$key->accountabilitytwo = $aa;
$key->accountabilitythree = $aaa;
$key->accountabilityfour = $aaaa;


$key->reliabilityone = $r;
$key->reliabilitytwo = $rr;
$key->reliabilitythree = $rrr;
$key->reliabilityfour = $rrrr;
$key->reliabilityfive = $rrrrr;


$key->initiativeone = $i;
$key->initiativetwo = $ii;
$key->initiativethree = $iii;
$key->initiativefour = $iiii;
$key->initiativefive = $iiiii;
$key->initiativesix = $iiiiii;



$key->customerfocusone = $c;
$key->customerfocustwo = $cc;
$key->customerfocusthree = $ccc;
$key->customerfocusfour = $cccc;
$key->customerfocusfive = $ccccc;
$key->customerfocussix = $cccccc;


$key->efficiencyone = $e;
$key->efficiencytwo = $ee;
$key->efficiencythree = $eee;
$key->efficiencyfour = $eeee;
$key->efficiencyfive = $eeeee;
$key->efficiencysix = $eeeeee;
$key->efficiencyseven = $eeeeeee;


$key->professionalismone = $p;
$key->professionalismtwo = $pp;
$key->professionalismthree = $ppp;
$key->professionalismfour = $pppp;
$key->professionalismfive = $ppppp;
$key->professionalismsix = $pppppp;
$key->professionalismseven = $ppppppp;            
$key->professionalismeight = $pppppppp;
$key->professionalismnine = $ppppppppp;
$key->professionalismten = $pppppppppp;
$key->professionalismeleven = $ppppppppppp;
$key->professionalismtwelve = $pppppppppppp;

$key->score = $score;
$key->weakness = Input::get('weakness');
$key->strength = Input::get('strength');
$key->trainingneeded = Input::get('trainingneeded');
$key->supervisorcomment = Input::get('comment');
$key->status = 1 ;
$key->save();



$final = Finalreport::find($fid);
$final->qualitativescore  = $score ;
$final->save();



}}





$genupdate = Generalappraisal::find($id);
$genupdate->status = 3;
$genupdate->save();

$genupdate = Quantitative::find($qid);
$genupdate->status = 4;
$genupdate->save();

return $this->showpending();

}

}
