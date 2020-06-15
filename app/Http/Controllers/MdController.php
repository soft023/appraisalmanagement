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

class MdController extends Controller
{


public function __construct()
{
$this->middleware('auth');
$this->middleware('md');
}

public function showallresult()
{

$result = Result::all()->where('status',2);
return view('md/allstaffappraisal')->with('result',$result);

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

$staff = User::all()->where('id',$userid);
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



return view('md/staffappraisalreview')
->with('generalapp', $generalapp)
->with('quantitative', $quantitative)
->with('qualitative', $qualitative)
->with('result', $result)
->with('staff', $staff)
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

$pending = Result::all()->where('status',1);

//$pending = R::all()->where('status',3);
return view('md/pendingappraisal')->with('pending',$pending);

}




public function appraisalform()
{

session()->forget('md');
$rid = Input::get('resultid');
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



	return view('md/staffappraisalform')
	->with('generalapp', $generalapp)
	->with('result', $result)
	->with('quantitative', $quantitative)
	->with('qualitative', $qualitative)
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


   


public function submitappraisal()
{

$rid = Input::get('rid');
$code = Input::get('code');
$commentandrecom = Input::get('comandrecom');


$result = Result::find($rid);
$result->mdname = Auth::User()->firstname. " ".Auth::User()->lastname;
$result->mdcomandrecom = $commentandrecom ;
$result->status = 2;
$result->save();

return $this->showpending();
}





public function allpending()
{

$fincondelay = Generalappraisal::all()->where('status',1); 
$stafffindelay = Quantitative::all()->where('status',1); 
$finconxdelay = Quantitative::all()->where('status',2); 
$supervisordelay = Quantitative::all()->where('status',3); 
$staffsupdelay = Qualitativeresult::all()->where('status',1); 
$hrdelay = Qualitativeresult::all()->where('status',2); 
$mddelay = Result::all()->where('status',1); 

return view('md/allpending')
->with('fincondelay',$fincondelay)
->with('stafffindelay',$stafffindelay)
->with('staffsupdelay',$staffsupdelay)
->with('finconxdelay',$finconxdelay)
->with('supervisordelay',$supervisordelay)
->with('hrdelay',$hrdelay)
->with('mddelay',$mddelay);
}














 /// ALL STAFF RECORD  

public function showallstaff()
{
$staff = User::all(); 
return view('md/viewallstaff')->with('allstaff',$staff);
}

public function staffinformation($id)
{
$staff = User::all()->where('id',$id); 
return view('md/staffdetails')->with('staffdetails',$staff);
}

}
