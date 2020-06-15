@extends('layouts.fmainmenu')

@section('content') 
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
<div id="page-inner">
   

 <!-- If Back Office STaff Only   -->

@if(session('position') != "Relationship Officer")


 <div class="row" >
 <h2 class="text-center">Quantitative Appraisal For Back Office Staff </h2> 
<form method="POST" action="{{ route('finconsubmitappraisalbo') }}">
@csrf

<input type="text" style="font-size:13pt;"  name="userid" value="{{(session('userid'))}}" hidden >
<input type="text" style="font-size:13pt;"  name="code" value="{{(session('code'))}}"  hidden>
<input type="text" style="font-size:13pt;"  name="position" value="{{(session('position'))}}" hidden >
<input type="text" style="font-size:13pt;"  name="department" value="{{(session('department'))}}" hidden  >


<div class="col-md-6 col-sm-12 col-xs-12">
	<h4><b>Deposit Liability</b></h4>
<p>Target</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="target"   onkeyup="this.value=addcommas(this.value);"   onkeyup="this.value=addcommas(this.value);" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">


<p>Actual</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="actual" onkeyup="this.value=addcommas(this.value);" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">


<p>Weight</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="weight" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"><br><br>

<button type="submit" class="btn btn-lg btn-primary w3-text-white"  style="background: #8d219c;"> Submit Record </button></form>


</div>
<div class="col-md-6 col-sm-12 col-xs-12"></div>




</form></div>


@endif

































@if(session('position') == "Relationship Officer")
<!-- For Marketers Only   -->


<h2>Quantitative Appraisal For Relationship Officer</h2> 
<form method="POST" action="{{ route('finsubmitappraisalro') }}">
@csrf

<input type="text" style="font-size:13pt;" name="userid" value="{{(session('userid'))}}" hidden >
<input type="text" style="font-size:13pt;" name="code" value="{{(session('code'))}}" hidden >
<input type="text" style="font-size:13pt;" name="position" value="{{(session('position'))}}" hidden >
<input type="text" style="font-size:13pt;" name="department" value="{{(session('department'))}}" hidden >

<br><br><h5><b>Account Opening</b></h5>
<div class="row">


<div class="col-md-4 col-sm-12 col-xs-12">

<p>Target</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="acctopentarget"     onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">	
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Actual</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="acctopenactual"      onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">	
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Weight</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="acctopenweight" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div>
</div><br><br>





<h5><b>Deposit Liability Generation</b></h5>
<div class="row">

<div class="col-md-4 col-sm-12 col-xs-12">
<p>Target</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="liagentarget"   onkeyup="this.value=addcommas(this.value);"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">	
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Actual</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="liagenactual"    onkeyup="this.value=addcommas(this.value);"   onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">	
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Weight</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="liagenweight" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div>
</div><br><br>





<h5><b>Risk Asset</b></h5>
<div class="row">

<div class="col-md-4 col-sm-12 col-xs-12">
<p>Target</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="risktarget"   onkeyup="this.value=addcommas(this.value);"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">	
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Actual</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="riskactual"    onkeyup="this.value=addcommas(this.value);"   onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">	
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Weight</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="riskweight" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div>
</div><br><br>







<h5><b>E-Products</b></h5>
<div class="row">

<div class="col-md-4 col-sm-12 col-xs-12">
<p>Target</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="eproducttarget"   onkeyup="this.value=addcommas(this.value);"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">	
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Actual</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="eproductactual"    onkeyup="this.value=addcommas(this.value);"   onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">	
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Weight</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="eproductweight" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div>
</div><br><br>





<h5><b>Cross Selling</b></h5>
<div class="row">

<div class="col-md-4 col-sm-12 col-xs-12">
<p>Target</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="crosstarget"   onkeyup="this.value=addcommas(this.value);"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">	
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Actual</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="crossactual"    onkeyup="this.value=addcommas(this.value);"   nkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" >	
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Weight</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="crossweight" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div>
</div><br><br>









<h5><b>Fees and Commission</b></h5>
<div class="row">
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Target</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="feeandcomtarget"   onkeyup="this.value=addcommas(this.value);"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">	
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Actual</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="feeandcomactual"    onkeyup="this.value=addcommas(this.value);"   onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">	
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Weight</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="feeandcomweight" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div>
</div><br><br>







<h5><b>Total Revenue</b></h5>
<div class="row">

<div class="col-md-4 col-sm-12 col-xs-12">
<p>Target</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="totrevtarget"   onkeyup="this.value=addcommas(this.value);"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">	
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Actual</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="totrevactual"    onkeyup="this.value=addcommas(this.value);"   onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">	
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Weight</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="totrevweight" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div>
</div><br><br>





<h5><b>PAR</b></h5>
<div class="row">
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Target</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="partarget"   onkeyup="this.value=addcommas(this.value);"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">	
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Actual</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="paractual"    onkeyup="this.value=addcommas(this.value);"   onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">	
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Weight</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="parweight" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div>
</div><br><br>







</div>
<div class="text-center"><br><br>
<button type="submit" class="btn btn-lg btn-primary w3-text-white "  style="background: #8d219c;"> Submit Record </button>
</div></form><br><br><br>
</div>


@endif





@endsection
