<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('export', 'FinalreportController@export')->name('export');
//General Staff Route

//GET REQUESTS
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pendingrequest', 'HomeController@showpending')->name('pendingrequest');
Route::get('/qualtacceptanceform', 'HomeController@showqualtacceptanceform')->name('qualtacceptanceform');
Route::get('/quantacceptanceform', 'HomeController@showquantacceptanceform')->name('quantacceptanceform');
Route::get('/appraisalform', 'HomeController@showappraisalform')->name('appraisalform');
Route::get('/appraisalhistory', 'HomeController@showlistofappraisals')->name('appraisalhistory');
//POST REQUESTS

Route::post('/submitappraisal', 'HomeController@submitappraisal')->name('submitappraisal');
Route::post('/submitquantacceptance', 'HomeController@submitquantacceptance')->name('submitquantacceptance');
Route::post('/submitqualtacceptance', 'HomeController@submitqualtacceptance')->name('submitqualtacceptance');
Route::post('/appraisalreview', 'HomeController@fulldetails')->name('appraisalreview');


//Fincon Route
//GET REQUESTS
Route::get('/finconeditrejectedappraisal/{id}', 'FinconController@showrejectedappraisalform')->name('showrejectedappraisalform');;
Route::get('/finconallappraisals', 'FinconController@showallappraisals')->name('finconallappraisal');
Route::get('/finconlistofrejected', 'FinconController@showrejectedappraisals')->name('finconrejectedappraisals');
Route::get('/finconpendingrequest', 'FinconController@showpending')->name('finconpendingrequest');
Route::get('/finconappraisaldetails/{id}', 'FinconController@showappraisaldetails')->name('finconappraisaldetails');
Route::get('/finconappraisalform/{userid}', 'FinconController@showappraisalform')->name('finconappraisalform');
//POST REQUESTS
Route::post('/finconsubmitappraisalbo', 'FinconController@submitappraisalbo')->name('finconsubmitappraisalbo');
Route::post('/finconsubmitappraisalro', 'FinconController@submitappraisalro')->name('finsubmitappraisalro');
Route::post('/finupdateappraisalbo', 'FinconController@updatebo')->name('updatebo');
Route::post('/finupdateappraisalro', 'FinconController@updatero')->name('updatero');







//Supervisor Route
//Get REQUESTS
Route::get('/superallresult', 'SupervisorController@showallresult')->name('showallresult');
Route::get('/superpendingrequest', 'SupervisorController@showpending')->name('superpendingrequest');
//POST REQUESTS
Route::post('/supersubmitappraisal', 'SupervisorController@submitappraisal')->name('supersubmitappraisal');
Route::post('/supersubmitkey', 'SupervisorController@submitkey')->name('supersubmitkey');
Route::post('/superfulldetails', 'SupervisorController@fulldetails')->name('superfulldetails');
Route::post('/superappraisalform', 'SupervisorController@appraisalform')->name('qualitativeform');
Route::post('/confirmappraisal', 'SupervisorController@confirmappraisal')->name('confirmappraisal');




//Hr Route
//GET REQUESTS
Route::get('/hrallpendinglist', 'HrController@allpending')->name('hrallpendinglist');
Route::get('/hrallappraisals', 'HrController@showallresult')->name('hrallappraisals');
Route::get('/hrpendingrequest', 'HrController@showpending')->name('hrpendingrequest');
Route::get('/listofallstaff', 'HrController@showallstaff')->name('allstaff');
Route::get('/hrstaffinformation/{id}', 'HrController@staffinformation')->name('hrstaffinfo');
Route::get('/hrnewstaff', 'HrController@showregistrationform')->name('hrnewstaff');
Route::get('/hrstaffupdateform/{id}', 'HrController@showupdateform')->name('hrstaffform');
Route::get('/hrappraisalref', 'HrController@showrefform')->name('hrappraisalref');
//--------------------------------------------------------------------------------
Route::post('/hrappraisalform', 'HrController@appraisalform')->name('hrappraisalform');
Route::post('/hrsubmitappraisal', 'HrController@hrsubmitappraisal')->name('hrsubmitappraisal');
Route::post('/hrregister', 'RegisterController@register')->name('registernewstaff');
Route::post('/hrupdatestaffrecord', 'HrController@updatestaff')->name('updatestaff');
Route::post('/hrfulldetails', 'HrController@fulldetails')->name('hrfulldetails');
Route::post('/registerstaff', 'HrController@registerstaff')->name('registerstaff');
Route::post('/hrsubmitref', 'HrController@submitref')->name('hrsubmitref');
Route::post('/hrstopref', 'HrController@stopref')->name('hrstopref');
Route::post('/passreset', 'Auth\ResetPasswordController@passreset')->name('passreset');

// MD route
//GET REQUESTS
Route::get('/mdallappraisals', 'MdController@showallresult')->name('mdallappraisals');
Route::get('/mdpendingrequest', 'MdController@showpending')->name('mdpendingrequest');
Route::get('/mdlistofallstaff', 'MdController@showallstaff')->name('mdlistofallstaff');
Route::get('/mdstaffinformation/{id}', 'MdController@staffinformation')->name('mdstaffinfo');
Route::get('/mdgeneralpendinglist', 'MdController@allpending')->name('mdgeneralpendinglist');
//------------------------------------------------------------------------------
Route::post('/mdappraisalform', 'MdController@appraisalform')->name('mdappraisalform');
Route::post('/mdsubmitappraisal', 'MdController@submitappraisal')->name('mdsubmitappraisal');
Route::post('/mdfulldetails', 'MdController@fulldetails')->name('mdfulldetails');

