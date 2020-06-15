@extends('layouts.fmainmenu')

@section('content') 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Update Rejected Appraisal Form</h2>   
                        <h5>Welcome, to update more info on this page kindly contact the HR | ADMIN. </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
              

 <!-- Quantitavtive For Backoffice.  -->
@if(session('position') != "Relationship Officer")
 <div class="row" >

<form method="POST" action="{{ route('updatebo') }}">
@csrf
@foreach( $quantitative as $quant)
<div class="col-md-6 col-sm-12 col-xs-12">
<input type="text" style="font-size:13pt;"  name="qid" value="{{ $quant['id']}}" hidden>

<h5><b>Officer Comment : </b>{{ $quant['staffcomment']}}</h5><br>


<p>Target</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="target" value="{{ $quant['targetbo']}}"   onkeyup="this.value=addcommas(this.value);"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" >


<p>Actual</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="actual" value="{{ $quant['actualbo']}}"  onkeyup="this.value=addcommas(this.value);"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">


<p>Weight</p>
<input type="text" style="font-size:13pt;" class="form-control text-center"  name="weight" value="{{ $quant['weightbo']}}" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"><br><br>

<button type="submit" class="btn btn-lg btn-primary w3-text-white"  style="background: #8d219c;"> Submit Record </button></form>

@endforeach
</div>
<div class="col-md-6 col-sm-12 col-xs-12"></div>




</form></div>

@endif



































<!-- Quantitavtive For Relationship Managers.  -->

@if(session('position') == "Relationship Officer")

<!-- For Marketers Only   -->


  
<form method="POST" action="{{ route('updatero') }}">
@csrf
@foreach( $quantitative as $quant)
<input type="text" style="font-size:13pt;" name="qid" value="{{ $quant['id']}}" hidden >
<h5>Officer Comment : {{ $quant['staffcomment']}}</h5><br>
<h5><b>Account Opening</b></h5> 
<div class="row" >


<div class="col-md-4 col-sm-12 col-xs-12">
<p>Target</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['acctopentarget']}}" name="acctopentarget"         onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" >
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Actual</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['acctopenactual']}}" name="acctopenactual"       onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Weight</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['acctopenweight']}}" name="acctopenweight" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div><br><br>
</div>





<h5><b>Deposit Liability Generation</b></h5> 
<div class="row">
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Target</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['liagentarget']}}" name="liagentarget"    onkeyup="this.value=addcommas(this.value);"      onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Actual</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['liagenactual']}}" name="liagenactual"   onkeyup="this.value=addcommas(this.value);"     onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Weight</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['liagenweight']}}" name="liagenweight" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div><br><br>

</div>




<h5><b>Risk Asset</b></h5>
<div class="row">
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Target</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['risktarget']}}" name="risktarget"    onkeyup="this.value=addcommas(this.value);"      onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Actual</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['riskactual']}}" name="riskactual"   onkeyup="this.value=addcommas(this.value);"     onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Weight</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['riskweight']}}" name="riskweight" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div><br><br>
</div>







<h5><b>E-Products</b></h5>
<div class="row">
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Target</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['eproducttarget']}}" name="eproducttarget"    onkeyup="this.value=addcommas(this.value);"      onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Actual</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['eproductactual']}}" name="eproductactual"   onkeyup="this.value=addcommas(this.value);"     onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Weight</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['eproductweight']}}" name="eproductweight" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div><br><br>
</div>





<h5><b>Fees and Commission</b></h5>
<div class="row">
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Target</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['feeandcomtarget']}}" name="feeandcomtarget"    onkeyup="this.value=addcommas(this.value);"      onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Actual</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['feeandcomactual']}}" name="feeandcomactual"   onkeyup="this.value=addcommas(this.value);"     onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Weight</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['feeandcomweight']}}" name="feeandcomweight" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div><br><br>
</div>






<h5><b>Total Revenue</b></h5>
<div class="row">
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Target</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['totrevtarget']}}" name="totrevtarget"    onkeyup="this.value=addcommas(this.value);"      onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Actual</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['totrevactual']}}" name="totrevactual"   onkeyup="this.value=addcommas(this.value);"     onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Weight</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['totrevweight']}}" name="totrevweight" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div><br><br>
</div>





<h5><b>PAR</b></h5>
<div class="row">
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Target</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['partarget']}}" name="partarget"    onkeyup="this.value=addcommas(this.value);"      onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Actual</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['paractual']}}" name="paractual"   onkeyup="this.value=addcommas(this.value);"     onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Weight</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['parweight']}}" name="parweight" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div><br><br>
</div>







<h5><b>Cross Selling</b></h5>
<div class="row">
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Target</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['crosstarget']}}" name="crosstarget"    onkeyup="this.value=addcommas(this.value);"      onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Actual</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['crossactual']}}" name="crossactual"   onkeyup="this.value=addcommas(this.value);"     onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<p>Weight</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $quant['crossweight']}}" name="crossweight" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
</div><br><br>
</div>


<br><br><br><br>
<div class="text-center">
    <button type="submit" class="btn btn-lg btn-primary w3-text-white"  style="background: #8d219c;"> Submit Record </button></form>
</div>




@endforeach


@endif




@endsection
              
