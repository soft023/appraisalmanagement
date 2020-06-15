@extends('layouts.mainmenu')

@section('content') 
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
<div id="page-inner">
<div class="row">
<div class="col-md-12">
<h2>Quantitative Acceptance Form</h2>   
</div>
</div>              
<!-- /. ROW  -->

<form method="POST" action="{{ route('submitquantacceptance') }}">
@csrf

@foreach( $quantitative as $quant)

<!-- Quantitavtive For Backoffice.  -->

@if(Auth::user()->position != "Relationship Officer")





<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th class="w3-purple">Financial Controller</th>
<th class="w3-purple">Target</th>
<th class="w3-purple">Actual</th>
<th class="w3-purple">Weight</th>
<th class="w3-purple">Score</th>
<th class="w3-purple">Exceed</th>
<th style="display: none;"></th>
</tr>
</thead>
<tbody>
<?php   $i = 1; ?>
<tr>
<td>{{ $quant['finconname']}}</td> 
<td>{{ $quant['targetbo']}}</td> 
<td>{{ $quant['actualbo']}}</td> 
<td>{{ $quant['weightbo']}}</td> 
<td>{{ number_format((float)$quant['score'],2,'.','')}}%</td> 
<td>{{ $quant['exceeddeposittarget']}}</td> 

<td style="display: none;"><input type="text" style="font-size:13pt;" class="form-control text-center" name="qid" value="{{ $quant['id']}}" hidden ></td>
</tr>
 <?php   $i++; ?>
</tbody>
</table>
</div>


@endif



<!-- Quantitavtive For Relationship Managers.  -->




<!-- Quantitavtive For Relationship Managers.  -->
@if(Auth::user()->position == "Relationship Officer")

<input type="text" style="font-size:13pt;" class="form-control text-center" name="qid" value="{{ $quant['id']}}" hidden >
<p><b>Financial Controller :</b> {{ $quant['finconname']}}</p>
<p><b>Total Score :</b> {{ number_format((float)$quant['score'],2,'.','')}}%</p><br>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th  class="w3-purple">Category</th>
<th  class="w3-purple">Target</th>
<th  class="w3-purple">Actual</th>
<th  class="w3-purple">weight</th>
<th  class="w3-purple">Score</th>
<th  class="w3-purple">Exceed</th>
</tr>
</thead>
<tbody>

<tr>
<td  class="w3-purple">Account Opening</td> 
<td>{{ $quant['acctopentarget']}}</td> 
<td>{{ $quant['acctopenactual']}}</td> 
<td>{{ $quant['acctopenweight']}}</td> 
<td>{{ number_format((float)$quant['acctopenscore'],2,'.','')}}</td> 
<td>-</td> 
</tr>


<tr>
<td  class="w3-purple">Deposit Liability Generation</td> 
<td>{{ $quant['liagentarget']}}</td> 
<td>{{ $quant['liagenactual']}}</td> 
<td>{{ $quant['liagenweight']}}</td> 
<td>{{ number_format((float)$quant['liagenscore'],2,'.','')}}</td> 
<td>{{ $quant['exceeddeposittarget']}}</td> 
</tr>



<tr>
<td  class="w3-purple">Risk Asset</td> 
<td>{{ $quant['risktarget']}}</td> 
<td>{{ $quant['riskactual']}}</td> 
<td>{{ $quant['riskweight']}}</td> 
<td>{{ number_format((float)$quant['riskscore'],2,'.','')}}</td> 
<td>{{ $quant['exceedrisktarget']}}</td> 
</tr>



<tr>
<td  class="w3-purple">E-Product</td> 
<td>{{ $quant['eproducttarget']}}</td> 
<td>{{ $quant['eproductactual']}}</td> 
<td>{{ $quant['eproductweight']}}</td> 
<td>{{ number_format((float)$quant['eproductscore'],2,'.','')}}</td> 
<td>-</td> 
</tr>



<tr>
<td  class="w3-purple">Fees and Commission</td> 
<td>{{ $quant['feeandcomtarget']}}</td> 
<td>{{ $quant['feeandcomactual']}}</td> 
<td>{{ $quant['feeandcomweight']}}</td> 
<td>{{ number_format((float)$quant['feeandcomscore'],2,'.','')}}</td> 
<td>-</td> 
</tr>





<tr>
<td  class="w3-purple">Total Revenue</td> 
<td>{{ $quant['totrevtarget']}}</td> 
<td>{{ $quant['totrevactual']}}</td> 
<td>{{ $quant['totrevweight']}}</td> 
<td>{{ number_format((float)$quant['totrevscore'],2,'.','')}}</td> 
<td>-</td> 
</tr>





<tr>
<td  class="w3-purple">Portfolio At Risk</td> 
<td>{{ $quant['partarget']}}</td> 
<td>{{ $quant['paractual']}}</td> 
<td>{{ $quant['parweight']}}</td> 
<td>{{ number_format((float)$quant['parscore'],2,'.','')}}</td> 
<td>-</td> 
</tr>





<tr>
<td  class="w3-purple">Cross Selling</td> 
<td>{{ $quant['crosstarget']}}</td> 
<td>{{ $quant['crossactual']}}</td> 
<td>{{ $quant['crossweight']}}</td> 
<td>{{ number_format((float)$quant['crossscore'],2,'.','')}}</td> 
<td>-</td> 
</tr>





</tbody>
</table>
</div>
<br><br>

@endif

@endforeach


<p>Are you satisfied with this quantitative appraisal?</p> 
<label>Yes</label>
<input type="radio" style="font-size:13pt;" value="Yes" name="acceptance" required><br>

<label>No</label>
<input type="radio" style="font-size:13pt;" value="No" name="acceptance" required><br><br>

<p>Comment</p>
<textarea class="form-control text-center" name="staffcomment" rows="3" style=" font-size:13pt;" required/> </textarea>
<div class="form-group text-center"><br><br>
<button type="submit" class="btn btn-lg btn-primary w3-text-white"  style="background: #8d219c;"> Submit Record </button><br><br><br><br>
</div>



</div>
<div class="col-md-1 col-sm-12 col-xs-12"> </div>



</div>






@endsection

