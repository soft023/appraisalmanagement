<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
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
use Auth;	
use Redirect;
use App\Refrence;
use App\Finalreport;
use Session;
use Illuminate\Foundation\Auth\RegistersUsers;



class HrController extends Controller
{
use RegistersUsers;




public function __construct()
{
$this->middleware('auth');
$this->middleware('hr');

}





public function showrefform()
{

$ref = Refrence::all()->where('status',1);
$message = "";
return view('hr/appraisalref')
->with('message',$message)
->with('ref',$ref);

}



public function showallresult()
{

$result = Result::all()->where('status',2);
return view('hr/allstaffappraisallist')->with('result',$result);

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



return view('hr/staffappraisalreview')
->with('generalapp', $generalapp)
->with('quantitative', $quantitative)
->with('qualitative', $qualitative)
->with('result', $result)
->with('keyarea', $keyarea)
->with('staff', $staff)
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

$pending = Qualitativeresult::all()->where('status',2);
return view('hr/listofpendingappraisal')->with('pending',$pending);

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

return view('hr/allpending')
->with('fincondelay',$fincondelay)
->with('stafffindelay',$stafffindelay)
->with('staffsupdelay',$staffsupdelay)
->with('finconxdelay',$finconxdelay)
->with('supervisordelay',$supervisordelay)
->with('hrdelay',$hrdelay)
->with('mddelay',$mddelay);
}






public function appraisalform()
{

$userid = Input::get('userid');
$code = Input::get('code');

$generalapp = Generalappraisal::all()->where('userid',$userid)->where('code',$code);
foreach ($generalapp as $key) {
$pos = $key->position;
$ref = $key->ref;
}
Session::put('position', $pos);


$quantitative = Quantitative::all()->where('userid',$userid)->where('code',$code);
foreach ($quantitative as $quan) {
	$accttarget = $quan->acctopentarget ;
	$acctactual = $quan->acctopenactual ;
	$risktarget = $quan->risktarget ;
	$riskactual = $quan->riskactual ;
	$liagentarget  = $quan->liagentarget ;
	$liagenactual  = $quan->liagenactual ;
	$qutscore = $quan->score;
	$targetbo = $quan->targetbo;
	$actualbo = $quan->actualbo;
}







$qualitative = Qualitativeresult::all()->where('userid',$userid)->where('code',$code);
foreach ($qualitative as $qual) {
	$qualscore = $qual->score;
}


$keyresultareaanswer = Keyresultareaanswer::all()->where('userid',$userid)->where('code',$code);
foreach ($keyresultareaanswer as $keyresult) {
	$key = $keyresult->score;
}
if($pos == "Relationship Officer"){
$key = 0;
}

$tota = $key + $qutscore + $qualscore ;
$tota = number_format((float)$tota,2,'.','');


if($tota >= 100){
	$meaning = "Performance during appraisal period met and exceeded expectation";
}elseif ($tota >= 86) {
	$meaning = "Performance during appraisal period exceeded minimum expectations ";
}elseif ($tota >= 70) {
	$meaning = "Performance during appraisal period met minimum expectations ";
}elseif ($tota >= 60) {
	$meaning = "Performance during appraisal period failed to meet minimum expectations ";
}else{
	$meaning = "Performance was unsatisfactory ";
}


if($pos == "Relationship Officer"){

$acctach = $acctactual / $accttarget;
$riskach = $riskactual / $risktarget;
$liagentach = $liagenactual / $liagentarget;

$refx = Finalreport::all()->where('userid',$userid)->where('reference',$ref);
foreach ($refx as $keyx) {
	$fid = $keyx->id;	
}
$qutscore = number_format((float)$qutscore,2,'.','');
$final = Finalreport::find($fid);
$final->depositactual  = $liagenactual;
$final->deposittarget  = $liagentarget;
$final->depositachieved  = $liagentach;
$final->riskactual  = $riskactual;
$final->risktarget  = $risktarget;
$final->riskachieved  = $riskach;
$final->accountactual  = $acctactual;
$final->accounttarget  = $accttarget;
$final->accountachieved  = $acctach;
$final->quantitativescore  = $qutscore;
$final->totalscore  = $tota ;
$final->interpretation  = $meaning ;
$final->save();


}else{

$achievedbo = $actualbo / $targetbo;
$key = $key;
$tota = number_format((float)$tota,2,'.','');
$totquant = $key +  $qutscore;
$totquant = number_format((float)$totquant,2,'.','');

$refx = Finalreport::all()->where('userid',$userid)->where('reference',$ref);

foreach ($refx as $keyz) {
	$fidxx = $keyz->id;	
}



$fin = Finalreport::find($fidxx);
$fin->depositactual = $actualbo;
$fin->deposittarget = $targetbo;
$fin->depositachieved = $achievedbo;
$fin->quantitativescore = $totquant;
$fin->totalscore = $tota;
$fin->interpretation  = $meaning ;
$fin->save();

}





$result = Result::all()->where('userid',$userid)->where('code',$code);
$keyresultareaquestion = Keyresultareaquestion::all()->where('position',$pos);
$keyarea = Keyarea::all()->where('position', $pos);
$accountability =  Accountability::all();
$reliability =  Reliability::all();
$initiative =  Initiative::all();
$customerfocus =  Customerfocus::all();
$efficiency =  Efficiency::all();
$professionalism =  Professionalism::all();

session()->forget('hr');


return view('hr/staffappraisalform')
->with('generalapp', $generalapp)
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
->with('professionalism', $professionalism)
->with('total', $tota )
->with('meaning', $meaning );


}




public function submitref()
{
$reff = Refrence::all()->where('status',1);
if(count($reff) > 0){
$message = "Kindly stop the existing refrence to start a new one.";
}else{
$refname = Input::get('refname');
$ref = new Refrence;
$ref->ref = $refname;
$ref->status = 1;
$ref->save();
$message = "New refrence is set.";
}

return $this->showrefform()->with('message',$message);
}






public function stopref()
{

$refid = Input::get('rid');
$ref = Refrence::find($refid);
$ref->status = 0 ;
$ref->save();
return $this->showrefform();	

}











public function hrsubmitappraisal()
{

$ref = Refrence::all()->where('status',1);
foreach ($ref as $key ) {
	$ref = $key->ref;
}

$qid = Input::get('qid');
$code = Input::get('code');
$commentandrecom = Input::get('comandrecom');

$qualinfo = Qualitativeresult::all()->where('id',$qid)->where('code',$code);

foreach ($qualinfo as $us) {
$pos = $us->position;
$userid = $us->userid;
$fname = $us->firstname;
$lname = $us->lastname;
$pos = $us->position;
$dep = $us->department;
}


$quant = Quantitative::all()->where('userid',$userid)->where('code',$code);
foreach ($quant as $keya) {
$quantitative = $keya->score;

}


$qual = Qualitativeresult::all()->where('userid',$userid)->where('code',$code);
foreach ($qual as $keyz) {
$qualitative = $keyz->score;
$$qid = $keyz->id;

}


if($pos == "Relationship Officer"){

$key = 0 ;

}else{

$keyresult = Keyresultareaanswer::all()->where('userid',$userid)->where('code',$code);

foreach ($keyresult as $keyr) {
$key = $keyr->score;

}

}

$hrname = Auth::user()->firstname. " ".Auth::user()->lastname ;

$totalscore = $key + $qualitative + $quantitative ;
if($totalscore == 100){
$meaning = "Performance during appraisal period met and exceeded expectation";
}elseif ($totalscore >= 86) {
$meaning = "Performance during appraisal period exceeded minimum expectations";
}elseif ($totalscore >= 70) {
$meaning = "Performance during appraisal period met minimum expectations";
}elseif ($totalscore >= 60) {
$meaning = "Performance during appraisal period failed to meet minimum expectations";
}else{
$meaning = "Performance was unsatisfactory";
}

$stat = Result::all()->where('userid',$userid)->where('code',$code);

//Saving into the db


if(!$stat->isEmpty()){

$message = "You have already submitted and it's being processed";

}else{

$result = new Result;
$result->ref = $ref;
$result->userid = $userid;
$result->code = $code;
$result->firstname = $fname;
$result->lastname = $lname;
$result->position = $pos;
$result->department = $dep;
$result->hrname = $hrname;
$result->hrcomandrecom = $commentandrecom;
$result->resultinpercentage = $totalscore;
$result->resultinterpretation = $meaning;
$result->status = 1;
$result->save();
}
$gen = Generalappraisal::all()->where('userid',$userid)->where('code',$code);
foreach ($gen as $gey) {
$gid = $gey->id;
}



$genupdate = Qualitativeresult::find($qid);
$genupdate->status = 3;
$genupdate->save();

$genupdatex = Generalappraisal::find($gid);
$genupdatex->status = 4;
$genupdatex->save();


return $this->showpending();

}

















//////////// ALL STAFF RECORD///////////////////////


public function showallstaff()
{
$staff = User::all(); 
return view('hr/stafflist')->with('allstaff',$staff);
}

public function staffinformation($id)
{
$staff = User::all()->where('id',$id);
return view('hr/staffdetails')->with('staffdetails',$staff);
}


public function showupdateform($id)
{
$position = Position::all(); 
$Supervisor = Supervisor::all(); 
$department = Department::all(); 
$gradelevel = Gradelevel::all(); 

$staff = User::all()->where('id',$id); 
return view('hr/updatestaffrecord',[
"staffdetails" => $staff,
"pos" => $position,
"sup" => $Supervisor,
"dep" => $department,
"gra" =>$gradelevel ]);


}





public function updatestaff(Request $request)
{
$id = Input::get('uid');

if($request->hasFile('profilepic'))
{
$filen = Input::file('profilepic')->getClientOriginalName();
//$fileex = Input::file('profilepic')->getClientOriginalExtension();
$nam = Input::get('staffid');     
$filename = $nam.$filen;
Input::file('profilepic')->move(public_path('staffpics'),$filename);

$userx = User::find($id);
$userx->profilepic =$filename;
$userx->save();
}


$user = User::find($id);
$user->firstname =Input::get('firstname');
$user->lastname =Input::get('lastname');
$user->othername =Input::get('othername');
$user->staffid = Input::get('staffid');
$user->email =Input::get('email');
$user->phone =Input::get('phone');
$user->address =Input::get('address');
$user->gender =Input::get('gender');
$user->dob =Input::get('dob');
$user->branch =Input::get('branch');
$user->department =Input::get('department');
$user->supervisor =Input::get('supervisor');
$user->rightsupervisor =Input::get('sp') ; 
$user->rightmd =Input::get('md');
$user->righthr =Input::get('hr');
$user->rightfincon =Input::get('fincon');
$user->position =Input::get('position');
$user->entrygradelevel =Input::get('entrygrade');
$user->currentgradelevel =Input::get('currentgrade');
$user->qualification =Input::get('qualification');
$user->employmentstatus =Input::get('status');
$user->save();




$message = "Staff profile updated successfully";
Session::put('message', $message);
return $this->showallstaff();
}






public function showregistrationform()
{

$position = Position::all(); 
$Supervisor = Supervisor::all(); 
$department = Department::all(); 
$gradelevel = Gradelevel::all(); 


return view('hr.newstaffform',[
"pos" => $position,
"sup" => $Supervisor,
"dep" => $department,
"gra" =>$gradelevel ]);


}

protected function create(array $data)
{


$filen = Input::file('profilepic')->getClientOriginalName();
//$fileex = Input::file('profilepic')->getClientOriginalExtension();
$nam = $data['staffid'];     
$filename = $nam.$filen;
Input::file('profilepic')->move(public_path('staffpics'),$filename);


return User::create([
'firstname' => $data['firstname'],
'lastname' => $data['lastname'],
'othername' => $data['othername'],
'staffid' => $data['staffid'],
'email' => $data['email'],
'phone' => $data['phone'],
'address' => $data['address'],
'gender' => $data['gender'],
'dob' => $data['dob'],
'profilepic' => $filename,
'branch' => $data['branch'],
'department' => $data['department'],
'supervisor' => $data['supervisor'],
'rightsupervisor' => $data['sp'],  
'rightmd' => $data['md'],
'righthr' => $data['hr'],
'rightfincon' => $data['fincon'],
'position' => $data['position'],
'doe' => $data['doe'],
'entrygradelevel' => $data['entrygrade'],
'currentgradelevel' => $data['currentgrade'],
'qualification' => $data['qualification'],
'employmentstatus' => $data['status'],
'password' => Hash::make($data['password']),
]);


}




public function registerstaff(Request $request)
{
//$this->validator($request->all())->validate();

$this->create($request->all());



return $this->showallstaff();

}





}
