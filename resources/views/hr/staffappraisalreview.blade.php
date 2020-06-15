@extends('layouts.mainmenu')

@section('content') 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
         <div id="page-inner">
 <div class="text-right"><a class="btn btn-lg btn-warning " href="/hrallappraisals" ><i class=""></i><b>Back</b></a>
<form>
  <br>  <input type="button" class="btn-danger btn-lg"  value="Print" onClick="printReport()">
</form>
</div>
<div class="reportPrinting" id="reportPrinting" >
<div class="row">
<div class="col-md-1 text-right">
<img src="../img/lg.jpeg" height="70px" weight="70px"  > 
</div>
<div class="col-md-8 text-center ">
<h3>BALOGUN GAMBARI MICROFINANCE BANK LIMITED</h3>
@foreach( $generalapp as $qu)
@foreach( $staff as $st)
<h5><i>6 MONTHS APPRAISAL FORM FOR TELLER</i></h5>
</div>
<div class="col-md-3"></div>
</div>  
<div class="row">

<div class="col-md-8">
<h6><b>INDIVIDUAL BALANCED SCORE CARD</b></h6>



<table class="w3-table w3-bordered">


<tr>
<td> 
<b> NAME  </b>
</td>
<td>
{{ $qu['firstname']. ' '.$qu['lastname'] }}
</td>
</tr>



<tr>
<td>
<b>POSITION</b>
</td>
<td>
{{ $qu['position'] }}
</td>
</tr>


<tr>
<td>
<b>DEPARTMENT</b>
</td>
<td>
{{ $qu['department'] }}
</td>
</tr>

<tr>
<td>
<b>SUPERVISOR NAME</b>
</td>
<td>
{{ $st['supervisor'] }}
</td>
</tr>


<tr>
<td>
<b>DETAILS OF QUALIFICATION</b>
</td>
<td>
{{ $st['qualification'] }}
</td>
</tr>



<tr>
<td>
<b>ENTRY GRADE LEVEL</b>
</td>
<td>
{{ $st['entrygradelevel'] }}
</td>
</tr>

<tr>
<td>
<b>CURRENT GRADE LEVEL</b>
</td>
<td>
{{ $st['currentgradelevel'] }}
</td>
</tr>


<tr>
<td>
<b>PERIOD UNDER REVIEW</b>
</td>
<td>
{{ $qu['period'] }}
</td>
</tr>



<tr>
<td>
<b>APPRAISAL DATE</b>
</td>
<td>
{{ $qu['created_at'] }}
</td>
</tr>

</table>

</div>  
<div class="col-md-4">
</div>

</div>

@endforeach






<br>
<div class="row">
<div class="col-md-8 text-left">
<table class="w3-table w3-bordered">
<tr>
<td>
<label><b>SELF-APPRAISAL</b></label><br><br>
<b>A)  Give a brief description of your key roles?</b><br>
{{ $qu['roledesc'] }}

</td>
</tr>


<tr>
<td>

<b>B)   What factors favored your performance?</b><br>
{{ $qu['favorfactor'] }}

</td>
</tr>



<tr>
<td>

<b>C)   What factors impeded your performance?</b><br>
{{ $qu['constfactor'] }}

</td>
</tr>


<tr>
<td>

<b>D)   How can the constraints be removed?</b><br>
{{ $qu['solution'] }}

</td>
</tr>


<tr>
<td>

<b>E)   What are the trainings you attended during this appraisal period?</b><br>
{{ $qu['trainingattended'] }}

</td>
</tr>


<tr>
<td>

<b>F)   What are your identified training needs?</b><br>
{{ $qu['trainingneeded'] }}
</td>
</tr>




<tr>
<td>
<b>G)   Are you satisfied with your current role? If yes or No, what are your top (3) preferred roles and why?</b><br>
{{ $qu['satisfywithrole'] }}<br>
1. {{ $qu['preferroleone'] }}<br>
2. {{ $qu['preferroletwo'] }} <br>
3. {{ $qu['preferrolethree'] }}

</td>
</tr>



<tr>
<td>

<b>COMMENTS</b><br>
{{ $qu['comment'] }}

</td>
</tr>



</table>

</div>
<div class="col-md-4"></div>
</div>
























<div class="row">
<div class="col-md-8 text-left">
<table class="w3-table w3-bordered">


</table>

</div>
<div class="col-md-4"></div>
</div>



<div class="row">
<div class="col-md-8 text-left">
<table class="w3-table w3-bordered">



</tr>
<tr>

</tr>
<tr>

</tr>
</table>

</div>
<div class="col-md-4"></div>
</div>


<div class="row">
<div class="col-md-8 text-left">
<table class="w3-table w3-bordered">


</table>
@endforeach

</div>
<div class="col-md-4"></div>
</div>

<br><br>

@foreach( $quantitative as $quant)
@if($quant['position'] == 'Relationship Officer')
<div class="row">
<div class="col-md-12">
<label>QUANTITATIVE APPRAISAL I(80%)</label>

<table class="w3-table w3-bordered text-left">
<tr>
<th>Category</th>
<th>Target</th>
<th>Actual</th>
<th>Weight</th>
<th>Score</th>
<th>Exceed</th>
</tr>


<tr>
<td >Account Opening</td> 
<td>{{ $quant['acctopentarget']}}</td> 
<td>{{ $quant['acctopenactual']}}</td> 
<td>{{ $quant['acctopenweight']}}</td> 
<td>{{ number_format((float)$quant['acctopenscore'],2,'.','')}}</td> 
<td>-</td> 
</tr>


<tr>
<td  >Deposit Liability Generation</td> 
<td>{{ $quant['liagentarget']}}</td> 
<td>{{ $quant['liagenactual']}}</td> 
<td>{{ $quant['liagenweight']}}</td> 
<td>{{ number_format((float)$quant['liagenscore'],2,'.','')}}</td> 
<td>{{ $quant['exceeddeposittarget']}}</td> 
</tr>



<tr>
<td  >Risk Asset</td> 
<td>{{ $quant['risktarget']}}</td> 
<td>{{ $quant['riskactual']}}</td> 
<td>{{ $quant['riskweight']}}</td> 
<td>{{ number_format((float)$quant['riskscore'],2,'.','')}}</td> 
<td>{{ $quant['exceedrisktarget']}}</td> 
</tr>



<tr>
<td  >E-Product</td> 
<td>{{ $quant['eproducttarget']}}</td> 
<td>{{ $quant['eproductactual']}}</td> 
<td>{{ $quant['eproductweight']}}</td> 
<td>{{ number_format((float)$quant['eproductscore'],2,'.','')}}</td> 
<td>-</td> 
</tr>



<tr>
<td  >Fees and Commission</td> 
<td>{{ $quant['feeandcomtarget']}}</td> 
<td>{{ $quant['feeandcomactual']}}</td> 
<td>{{ $quant['feeandcomweight']}}</td> 
<td>{{ number_format((float)$quant['feeandcomscore'],2,'.','')}}</td> 
<td>-</td> 
</tr>





<tr>
<td  >Total Revenue</td> 
<td>{{ $quant['totrevtarget']}}</td> 
<td>{{ $quant['totrevactual']}}</td> 
<td>{{ $quant['totrevweight']}}</td> 
<td>{{ number_format((float)$quant['totrevscore'],2,'.','')}}</td> 
<td>-</td> 
</tr>





<tr>
<td  >Portfolio At Risk</td> 
<td>{{ $quant['partarget']}}</td> 
<td>{{ $quant['paractual']}}</td> 
<td>{{ $quant['parweight']}}</td> 
<td>{{ number_format((float)$quant['parscore'],2,'.','')}}</td> 
<td>-</td> 
</tr>





<tr>
<td  >Cross Selling</td> 
<td>{{ $quant['crosstarget']}}</td> 
<td>{{ $quant['crossactual']}}</td> 
<td>{{ $quant['crossweight']}}</td> 
<td>{{ number_format((float)$quant['crossscore'],2,'.','')}}</td> 
<td>-</td> 
</tr>


<tr>
<td></td> 
<td></td> 
<td></td> 
<td><b>Total Score</b></td> 
<td><b>{{ number_format((float)$quant['score'],2,'.','')}}%</b></td> 
<td>-</td> 
</tr>




</table>
</div>
{{-- <div class="col-md-1"></div> --}}
</div>

@endif



@if($quant['position'] != 'Relationship Officer')

<div class="row">
<div class="col-md-8 text-left">
<h6><b>QUANTITATIVE APPRAISAL I - (20%)</b></h6>

<table class="w3-table w3-bordered">
<tr>
<th>S/N</th>
<th>KEY RESULT AREAS</th>
<th>TARGET</th>
<th>ACTUAL</th>
<th>WEIGHT</th>
<th>SCORE</th>
</tr>

<tr>
<td>1</td>
<td>Variable Achievement </td>
<td>{{ $quant['targetbo']}}</td>
<td>{{ $quant['actualbo']}}</td>
<td>{{ $quant['weightbo']}}</td>
<td><b>{{ number_format((float)$quant['score'],2,'.','')}}%</b></td>
</tr>


</table>

</div>
<div class="col-md-4"></div>
</div>




<br><br>




@foreach( $keyresultareaanswer as $qua)
@foreach( $keyresultareaquestion as $quaq)


<div class="row">
<div class="col-md-8 text-left">
<label> QUANTITATIVE APPRAISAL II - (10%) </label>

<table class="w3-table w3-bordered">
<tr>
<th>S/N</th>
<th>Key Result Areas</th>
<th>1-2</th>
</tr>

<tr>
<td>1.</td>
<td>{{ $quaq['resultone']}}</td>
<td>{{ $qua['resultone']}}</td>
</tr>

<tr>
<td>2.</td>
<td>{{ $quaq['resulttwo']}}</td>
<td>{{ $qua['resulttwo']}}</td> 
</tr>
<tr>
<td>3.</td>
<td>{{ $quaq['resultthree']}}</td>
<td>{{ $qua['resultthree']}}</td> 
</tr>
<tr>
<td>4.</td>
<td>{{ $quaq['resultfour']}}</td>
<td>{{ $qua['resultfour']}}</td>
</tr>
<tr>
<td>5.</td>
<td>{{ $quaq['resultfive']}}</td>
<td>{{ $qua['resultfive']}}</td>
</tr>
@if($quant['position'] == "Head, Financial Controller" || $quant['position'] == "Head, Banking Operations" || $quant['position'] == "Head, Internal Control & Audit"  )
<tr>
<td>6.</td>
<td>{{ $quaq['resultsix']}}</td>
<td>{{ $qua['resultsix']}}</td> 
</tr>

<tr>
<td>7.</td>
<td>{{ $quaq['resultseven']}}</td>
<td>{{ $qua['resultseven']}}</td> 
</tr>
<tr>
<td>8.</td>
<td>{{ $quaq['resulteight']}}</td>
<td>{{ $qua['resulteight']}}</td> 
</tr>
<tr>
<td>9.</td>
<td>{{ $quaq['resultnine']}}</td>
<td>{{ $qua['resultnine']}}</td> 
</tr>
<tr>
<td>10.</td>
<td>{{ $quaq['resultten']}}</td>
<td>{{ $qua['resultten']}}</td>
</tr>
@endif
<tr>
<td></td>
<td><b>TotalScore </b></td>
<td><b>{{ $qua['score']}} %</b></td>
</tr>


</table>

</div>
<div class="col-md-4"></div>
</div>

@endforeach
@endforeach

@endif

<br><br><br>

@foreach( $qualitative as $qual)
<div class="row">
<div class="col-md-8 text-left">
<h6>
@if($quant['position'] == 'Relationship Officer')
<b>QUALITATIVE APPRAISAL (30%) - Total {{ number_format((float)$qual['score'],2,'.','')}}%</b>
</h6>
@endif

@if($quant['position'] != 'Relationship Officer')
<b>QUALITATIVE APPRAISAL (70%) - Total {{ number_format((float)$qual['score'],2,'.','')}}%</b>
</h6>

<table class="w3-table w3-bordered">
<tr>
<th>S/N</th>
<th>Key Result Areas</th>
<th>1-5</th>
</tr>

@foreach( $keyarea as $qu)
<tr>
<td>1</td>
<td>{{ $qu['keyareaone']}} </td>
<td>{{ $qual['keyareaone']}}</td>

</tr>

<tr>
<td>2</td>
<td>{{ $qu['keyareatwo']}} </td>
<td>{{ $qual['keyareatwo']}}</td>
</tr>

<tr>
<td>3</td>
<td>{{ $qu['keyareathree']}} </td>
<td>{{ $qual['keyareathree']}}</td>
</tr>

<tr>
<td>4</td>
<td>{{ $qu['keyareafour']}} </td>
<td>{{ $qual['keyareafour']}}</td>
</tr>

<tr>
<td>5</td>
<td>{{ $qu['keyareafive']}} </td>
<td>{{ $qual['keyareafive']}}</td>
</tr>
@endforeach
</table>
@endif





<table class="w3-table w3-bordered">
<tr>
<td></td>
<td><b>ACCOUNTABILITY</b></td>
<td><b>1-5</b></td>
</tr>
@foreach( $accountability as $qu)
<tr>
<td>1</td>
<td>{{ $qu['accountabilityone']}}</td>
<td>{{ $qual['accountabilityone']}}</td>

</tr>

<tr>
<td>2</td>
<td>{{ $qu['accountabilitytwo']}}</td>
<td>{{ $qual['accountabilitytwo']}}</td>
</tr>

<tr>
<td>3</td>
<td>{{ $qu['accountabilitythree']}}</td>
<td>{{ $qual['accountabilitythree']}}</td>

</tr>

<tr>
<td>4</td>
<td>{{ $qu['accountabilityfour']}}</td>
<td>{{ $qual['accountabilityfour']}}</td>

</tr>
@endforeach



<tr>
<td></td>
<td><b>RELIABILITY</b></td>
<td><b>1-5</b></td>
</tr>
@foreach( $reliability as $qu)
<tr>
<td>1</td>
<td>{{ $qu['reliabilityone']}}</td>
<td>{{ $qual['reliabilityone']}}</td>
</tr>

<tr>
<td>2</td>
<td>{{ $qu['reliabilitytwo']}}</td>
<td>{{ $qual['reliabilitytwo']}}</td>
</tr>

<tr>
<td>3</td>
<td>{{ $qu['reliabilitythree']}}</td>
<td>{{ $qual['reliabilitythree']}}</td>
</tr>

<tr>
<td>4</td>
<td>{{ $qu['reliabilityfour']}}</td>
<td>{{ $qual['reliabilityfour']}}</td>
</tr>

<tr>
<td>5</td>
<td>{{ $qu['reliabilityfive']}}</td>
<td>{{ $qual['reliabilityfive']}}</td>
</tr>


@endforeach

<tr>
<td></td>
<td><b>INITIATIVE</b></td>
<td><b>1-5</b></td>
</tr>

@foreach( $initiative as $qu)
<tr>
<td>1</td>
<td>{{ $qu['initiativeone']}}</td>
<td>{{ $qual['initiativeone']}}</td>
</tr>

<tr>
<td>2</td>
<td>{{ $qu['initiativetwo']}}</td>
<td>{{ $qual['initiativetwo']}}</td>
</tr>

<tr>
<td>3</td>
<td>{{ $qu['initiativethree']}}</td>
<td>{{ $qual['initiativethree']}}</td>
</tr>

<tr>
<td>4</td>
<td>{{ $qu['initiativefour']}}</td>
<td>{{ $qual['initiativefour']}}</td>
</tr>

<tr>
<td>5</td>
<td>{{ $qu['initiativefive']}}</td>
<td>{{ $qual['initiativefive']}}</td>
</tr>

<tr>
<td>6</td>
<td>{{ $qu['initiativesix']}}</td>
<td>{{ $qual['initiativesix']}}</td>
</tr>

@endforeach


<tr>
<td></td>
<td><b>CUSTOMER FOCUSED</b></td>
<td><b>1-5</b></td>
</tr>
@foreach( $customerfocus as $qu)
<tr>
<td>1</td>
<td>{{ $qu['customerfocusone']}}</td>
<td>{{ $qual['customerfocusone']}}</td>
</tr>

<tr>
<td>2</td>
<td>{{ $qu['customerfocustwo']}}</td>
<td>{{ $qual['customerfocustwo']}}</td>
</tr>

<tr>
<td>3</td>
<td>{{ $qu['customerfocusthree']}}</td>
<td>{{ $qual['customerfocusthree']}}</td>
</tr>

<tr>
<td>4</td>
<td>{{ $qu['customerfocusfour']}}</td>
<td>{{ $qual['customerfocusfour']}}</td>
</tr>

<tr>
<td>5</td>
<td>{{ $qu['customerfocusfive']}}</td>
<td>{{ $qual['customerfocusfive']}}</td>
</tr>

<tr>
<td>6</td>
<td>{{ $qu['customerfocussix']}}</td>
<td>{{ $qual['customerfocussix']}}</td>
</tr>
@endforeach


<tr>
<td></td>
<td><b>EFFICIENCY</b></td>
<td><b>1-5</b></td>
</tr>
@foreach( $efficiency as $qu)
<tr>
<td>1</td>
<td>{{ $qu['efficiencyone']}}</td>
<td>{{ $qual['efficiencyone']}}</td>
</tr>

<tr>
<td>2</td>
<td>{{ $qu['efficiencytwo']}}</td>
<td>{{ $qual['efficiencytwo']}}</td>
</tr>

<tr>
<td>3</td>
<td>{{ $qu['efficiencythree']}}</td>
<td>{{ $qual['efficiencythree']}}</td>
</tr>

<tr>
<td>4</td>
<td>{{ $qu['efficiencyfour']}}</td>
<td>{{ $qual['efficiencyfour']}}</td>
</tr>

<tr>
<td>5</td>
<td>{{ $qu['efficiencyfive']}}</td>
<td>{{ $qual['efficiencyfive']}}</td>
</tr>

<tr>
<td>6</td>
<td>{{ $qu['efficiencysix']}}</td>
<td>{{ $qual['efficiencysix']}}</td>
</tr>

<tr>
<td>7</td>
<td>{{ $qu['efficiencyseven']}}</td>
<td>{{ $qual['efficiencyseven']}}</td>
</tr>
@endforeach


<tr>
<td></td>
<td><b>PROFESSIONALISM</b></td>
<td><b>1-5</b></td>
</tr>
@foreach( $professionalism as $qu)
<tr>
<td>1</td>
<td>{{ $qu['professionalismone']}}</td>
<td>{{ $qual['professionalismone']}}</td>
</tr>

<tr>
<td>2</td>
<td>{{ $qu['professionalismtwo']}}</td>
<td>{{ $qual['professionalismtwo']}}</td>
</tr>

<tr>
<td>3</td>
<td>{{ $qu['professionalismthree']}}</td>
<td>{{ $qual['professionalismthree']}}</td>
</tr>

<tr>
<td>4</td>
<td>{{ $qu['professionalismfour']}}</td>
<td>{{ $qual['professionalismfour']}}</td>
</tr>

<tr>
<td>5</td>
<td>{{ $qu['professionalismfive']}}</td>
<td>{{ $qual['professionalismfive']}}</td>
</tr>

<tr>
<td>6</td>
<td>{{ $qu['professionalismsix']}}</td>
<td>{{ $qual['professionalismsix']}}</td>
</tr>

<tr>
<td>7</td>
<td>{{ $qu['professionalismseven']}}</td>
<td>{{ $qual['professionalismseven']}}</td>
</tr>

<tr>
<td>8</td>
<td>{{ $qu['professionalismeight']}}</td>
<td>{{ $qual['professionalismeight']}}</td>
</tr>


<tr>
<td>9</td>
<td>{{ $qu['professionalismnine']}}</td>
<td>{{ $qual['professionalismnine']}}</td>
</tr>

<tr>
<td>10</td>
<td>{{ $qu['professionalismten']}}</td>
<td>{{ $qual['professionalismten']}}</td>
</tr>

<tr>
<td>11</td>
<td>{{ $qu['professionalismeleven']}}</td>
<td>{{ $qual['professionalismeleven']}}</td>
</tr>


<tr>
<td>12</td>
<td>{{ $qu['professionalismtwelve']}}</td>
<td>{{ $qual['professionalismtwelve']}}</td>
</tr>
@endforeach
</table>

<br>
 @foreach( $result as $result)
<table class="w3-table w3-bordered">


<tr>
<td>
<b>Employee Weaknesses:</b><br>
{{ $qual['weakness']}}
</td>
</tr>

<tr>
<td>
<b>Employee Strengths:</b><br>
{{ $qual['strength']}}
</td>
</tr>

<tr>
<td>
<b>Identified training needs of employees:</b><br>
{{ $qual['trainingneeded']}}
</td>
</tr>

<tr>
<td>
<b>Recommdation By Supervisor ({{ $qual['supervisorname']}}):</b><br>
{{ $qual['supervisorcomment']}}
</td>
</tr>


<tr>
<td>
<b>Acceptance And Comments By Appraisee:</b><br>
{{ $qual['accepted']}} - {{ $qual['staffcomment']}}
</td>
</tr>

<tr>
<td>
<b>Score and Interpretation:</b><br>
<b> {{ number_format((float)$result['resultinpercentage'],2,'.','')}}%</b> - {{ $result['resultinterpretation']}}.
</td>
</tr>


<tr>
<td>
<b>HR Comments ({{ $result['hrname']}}):</b><br>
{{ $result['hrcomandrecom']}}
</td>
</tr>


<tr>
<td>
<b>MD Comments ({{ $result['mdname']}}):</b><br>
{{ $result['mdcomandrecom']}}
</td>
</tr>

</table>

</div>
<div class="col-md-4"></div>

</div><br><br><br>

</div>








@endforeach
@endforeach

@endforeach








@endsection