@extends('layouts.fmainmenu')

@section('content') 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Appraisal Details</h2>   
                      
                    </div>
                </div>              
                 <!-- /. ROW  -->
              

                <!-- Quantitavtive For Backoffice.  -->
@foreach($quantitative as $quant)
@if ($quant['position'] != "Relationship Officer")


<div class="row" >
<div class="col-md-1 col-sm-12 col-xs-12"> </div>
<div class="col-md-10 col-sm-12 col-xs-12">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>Financial Controller</th>
<th>Target</th>
<th>Actual</th>
<th>Weight</th>
<th>Score</th>
<th>Exceed</th>

</tr>
</thead>
<tbody>

<tr>
<td>{{ $quant['finconname']}}</td> 
<td>{{ $quant['targetbo']}}</td> 
<td>{{ $quant['actualbo']}}</td> 
<td>{{ $quant['weightbo']}}</td> 
<td>{{ number_format((float)$quant['score'],2,'.','')}}</td> 
<td>{{ $quant['exceeddeposittarget']}}</td> 
</tr></tbody>
</table>
@endif



<!-- Quantitavtive For Relationship Managers.  -->

@if($quant['position']  == "Relationship Officer")


<p><b>Financial Controller :</b> {{ $quant['finconname']}}</p><br>
<p><b>Total Score :</b> {{ number_format((float)$quant['score'],2,'.','')}}</p><br>
<h5><b>Account Opening</b></h5>
<div class="row" >
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Target: {{ $quant['acctopentarget']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Actual : {{ $quant['acctopenactual']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Weight : {{ $quant['acctopenweight']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Score : {{ number_format((float)$quant['acctopenscore'],2,'.','')}}</p>
</div>
</div>
<br><br>





<h5><b>Deposit Liability Generation</b></h5>
<div class="row" >

<div class="col-md-3 col-sm-12 col-xs-12"> 

<p>Target: {{ $quant['liagentarget']}}</p>
<p>Exceed: {{ $quant['exceeddeposittarget']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Actual : {{ $quant['liagenactual']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Weight : {{ $quant['liagenweight']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Score : {{ number_format((float)$quant['liagenscore'],2,'.','')}}</p>
</div>
</div>
<br><br>




<h5><b>Risk Asset</b></h5>
<div class="row" >
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Target: {{ $quant['risktarget']}}</p>
<p>Exceed: {{ $quant['exceedrisktarget']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Actual : {{ $quant['riskactual']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Weight : {{ $quant['riskweight']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Score : {{ number_format((float)$quant['riskscore'],2,'.','')}}</p>
</div>
</div>
<br><br>




<h5><b>E-Product</b></h5>
<div class="row" >
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Target: {{ $quant['eproducttarget']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Actual : {{ $quant['eproductactual']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Weight : {{ $quant['eproductweight']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Score : {{ number_format((float)$quant['eproductscore'],2,'.','')}}</p>
</div>
</div>
<br><br>




<h5><b>Fees and Commision</b></h5>
<div class="row" >
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Target: {{ $quant['feeandcomtarget']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Actual : {{ $quant['feeandcomactual']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Weight : {{ $quant['feeandcomweight']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Score : {{ number_format((float)$quant['feeandcomscore'],2,'.','')}}</p>
</div>
</div>
<br><br>



<h5><b>Total Revenue</b></h5>
<div class="row" >
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Target: {{ $quant['totrevtarget']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Actual : {{ $quant['totrevactual']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Weight : {{ $quant['totrevweight']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Score : {{ number_format((float)$quant['totrevscore'],2,'.','')}}</p>
</div>
</div>
<br><br>






<h5><b>Portfolio At Risk</b></h5>
<div class="row" >
<div class="col-md-3 col-sm-12 col-xs-12"> 

<p>Target: {{ $quant['partarget']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Actual : {{ $quant['paractual']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Weight : {{ $quant['parweight']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Score : {{ number_format((float)$quant['parscore'],2,'.','')}}</p>
</div>
</div>
<br><br>







<h5><b>Cross Selling</b></h5>
<div class="row" >
<div class="col-md-3 col-sm-12 col-xs-12"> 

<p>Target: {{ $quant['crosstarget']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Actual : {{ $quant['crossactual']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Weight : {{ $quant['crossweight']}}</p>
</div>
<div class="col-md-3 col-sm-12 col-xs-12"> 
<p>Score : {{ number_format((float)$quant['crossscore'],2,'.','')}}</p>
</div>
</div>
<br><br>


@endif
@endforeach





@endsection
              
