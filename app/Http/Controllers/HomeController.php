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

class HomeController extends Controller
{
/**
* Create a new controller instance.
*
* @return void
*/
public function __construct()
{
$this->middleware('auth');
}

/**
* Show the application dashboard.
*
* @return \Illuminate\Contracts\Support\Renderable
*/



// For the STaff home page.
public function index()
{

$id = Auth::user()->id;

$pendingx = Quantitative::select('id')->where([
['userid','=', $id],
['status','=', 1]
])->get();


$id = Auth::user()->id;

$fin = Generalappraisal::where('status', 1)->get(['id']);
$fx = Quantitative::where('status', 2)->get(['id']);
$superx = Quantitative::where('department',Auth::user()->department)->where('status', 3)->get(['id']);
$hr = Qualitativeresult::where('status', 2)->get(['id']);
$md = Result::where('status', 1)->get(['id']);


// $finx = count($fin);
// $fx = count($fx);
// $superx = count($superx);
// $hrx = count($hr);
// $mdx = count($md);

if(count($fin) > 0){
Session::put('finx', count($fin) );
}

if(count($fx) > 0){
Session::put('fnx', count($fx));
}

if(count($superx) > 0){
Session::put('superx', count($superx));
}

if(count($hr) > 0){
Session::put('hr',count($hr));
}

if(count($md) > 0){
Session::put('md', count($md));
}











$pendingz = Qualitativeresult::select('id')->where([
['userid','=', $id],
['status','=', 1]
])->get();


$penx = count($pendingx);
$penz = count($pendingz);

if($penx == 1 ){

Session::put('pending', 1);

}




if($penz == 1 ){

Session::put('pending', 1);

}


return view('home');

}



// For Pending Requests


public function showpending()
{

$id = Auth::user()->id;
$pos = Auth::user()->position;





$pendingx = Quantitative::all()->where('userid',$id)->where('status',1);


$pendingz = Qualitativeresult::all()->where('userid',$id)->where('status',1);





$penx = count($pendingx);
$penz = count($pendingz);



if($penx == 1 ){
foreach ($pendingx as $key) {
	$time = $key->updated_at;
}
Session::put('pendingtype', "Quantitative");
Session::put('pendingdate', $time);
Session::put('codex', 2);
}


//return $pendingx[0];	

if($penz == 1 ){
foreach ($pendingz as $key) {
	$time = $key->updated_at;
}
Session::put('pendingtype', "Qualitative");
Session::put('pendingdate', $time);
Session::put('codex', 3);

}

return view('staffpendingconfirmation');


}




// For pending quantitative appraisal staff confirmation form   

public function showquantacceptanceform()
{

$id = Auth::user()->id;
$quantitative = Quantitative::all()->where('userid',$id)->where('status',1);

return view('quantitativeacceptanceform')->with('quantitative', $quantitative);
}





public function showqualtacceptanceform()
{

$id = Auth::user()->id;
$position = Auth::user()->position;
$gen = Qualitativeresult::all()->where('userid',$id)->where('status',1);

foreach ($gen as $key ) {
	$code = $key->code;
}

if ($position == "Relationship Officer"){

$keyresultareaquestion = "";
$keyresultareaanswer ="";
$keyarea = "";
}else{

$keyresultareaquestion = Keyresultareaquestion::all()->where('position', $position);
$keyresultareaanswer = Keyresultareaanswer::all()->where('userid', $id)->where('code', $code);
$keyarea = Keyarea::all()->where('position', $position);	

}

$accountability =  Accountability::all();
$reliability =  Reliability::all();
$initiative =  Initiative::all();
$customerfocus =  Customerfocus::all();
$efficiency =  Efficiency::all();
$professionalism =  Professionalism::all();
$qualitativesresult = Qualitativeresult::all()->where('userid', $id)->where('code', $code);





return view('qualitativeacceptanceform')
->with('qualitativesresult', $qualitativesresult)
->with('keyresultareaquestion', $keyresultareaquestion)
->with('keyresultareaanswer', $keyresultareaanswer)
->with('keyarea', $keyarea)
->with('accountability', $accountability)
->with('reliability', $reliability)
->with('initiative', $initiative)
->with('customerfocus', $customerfocus)
->with('efficiency', $efficiency)
->with('professionalism', $professionalism);



}



//For History list 



public function showlistofappraisals()
{

$id = Auth::user()->id;
$result = Result::all()->where('userid',$id)->where('status',2);

return view('stafflistofappraisals')->with('result', $result);

}






// Completed Appraisal Final Review

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



return view('staffappraisalreview')
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





// For general appraisal submission

public function submitappraisal(){

$stat = Generalappraisal::all()->where('userid', Auth::user()->id )->where('status',1);
$ref = Refrence::all()->where('status',1);


if (!$ref->isEmpty()) {
	foreach ($ref as $key ) {
		$refx = $key->ref;
	}
$report = Finalreport::all()->where('userid', Auth::user()->id)->where('reference', $refx);


if(!$stat->isEmpty() && !$report->isEmpty() ){

$message = "You have already submitted your appraisal and it's being processed";

}else{

$code = Generalappraisal::latest()->where('userid', Auth::user()->id)->first();


if($code['code'] > 0){
$code = $code['code'] + 1 ;
}else{
$code = 1;
}

$appraisal = new Generalappraisal;
$appraisal->ref = $refx;
$appraisal->userid = Auth::user()->id;
$appraisal->code = $code;
$appraisal->firstname = Auth::user()->firstname;
$appraisal->lastname = Auth::user()->lastname;
$appraisal->position = Auth::user()->position;
$appraisal->department =Auth::user()->department;
$appraisal->period = Input::get('period');
$appraisal->roledesc = Input::get('roledesc');
$appraisal->favorfactor = Input::get('favorfactor');
$appraisal->constfactor = Input::get('constfactor');
$appraisal->solution = Input::get('solution');
$appraisal->trainingattended = Input::get('trainingattended');
$appraisal->trainingneeded = Input::get('trainingneeded');
$appraisal->satisfywithrole = Input::get('satisfywithrole');
$appraisal->preferroleone = Input::get('preferroleone');
$appraisal->preferroletwo = Input::get('preferroletwo');
$appraisal->preferrolethree = Input::get('preferrolethree');
$appraisal->comment = Input::get('comment');
$appraisal->status = 1;
$appraisal->save();	 		
	 		
	 
$final = new Finalreport;
$final->period = Input::get('period');
$final->firstname = Auth::user()->firstname;
$final->lastname = Auth::user()->lastname;
$final->staffid = Auth::user()->staffid;
$final->userid = Auth::user()->id;
$final->phone = Auth::user()->phone;
$final->email = Auth::user()->email;
$final->dob = Auth::user()->dob;
$final->gender = Auth::user()->gender;
$final->position = Auth::user()->position;
$final->department = Auth::user()->department;
$final->grade = Auth::user()->currentgradelevel;
$final->reference = $refx;
$final->save();


$message = "Your appraisal has been submitted successfully";


}
}else{
$message = "You can't do this right now, meet the HR ";
}
Session::put('success', $message);
return view('home');

}








// For qualitative appraisal submissiob
public function submitqualtacceptance(){

$qid = Input::get('qid');
$qua = Qualitativeresult::find($qid);
$qua->accepted = Input::get('qualitativeok');
$qua->staffcomment = Input::get('comment');
$qua->status = 2;
$qua->save();

$message = "Qualitative appraisal acceptance has been submitted";
session()->forget('pendingtype');
session()->forget('pendingdate');
session()->forget('codex');
session()->forget('pending');
return $this->showpending()->with('message',$message);


}



// For qualitative appraisal submissiob
public function submitquantacceptance(){

$accept = Input::get('acceptance');
$qid = Input::get('qid');


if($accept == "Yes"){

$qua = Quantitative::find($qid);
$qua->acceptance = Input::get('acceptance');
$qua->staffcomment = Input::get('staffcomment');
$qua->status = 3 ;
$qua->save();


}else{
$qua = Quantitative::find($qid);
$qua->acceptance = Input::get('acceptance');
$qua->staffcomment = Input::get('staffcomment');
$qua->status = 2 ;
$qua->save();
}

session()->forget('pendingtype');
session()->forget('pendingdate');
session()->forget('codex');
session()->forget('pending');

return $this->showpending();

}












// For General Staff Appraisal Form
public function showappraisalform()
{
return view('appraisalform');
}



}
