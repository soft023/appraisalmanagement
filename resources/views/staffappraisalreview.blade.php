@extends('layouts.mainmenu')

@section('content') 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12 text-center">
                     <h2>OVERALL PERFORMANCE ASSESSMENT </h2> <br><hr>   
                    </div>
                    <div class="col-md-12 text-center">
                     <a class="btn btn-lg btn-success " href="/appraisalhistory" ><i class=""></i><b>Back</b></a>  
                    </div>

                </div>              
                 <!-- /. ROW  -->
              

               <!-- /. ROW  -->
<div class="row" >

<div class="col-md-12 col-sm-12 col-xs-12">
<h4 class="w3-red" style="padding: 10px;"><b>STAFF PERSONAL APPRAISAL</b></h4><br>
@foreach( $generalapp as $qu)
<h6><b>Appraisal Reference</b>: {{ $qu['ref']}}</h6><br>
<h6><b>Period Of Appraisal </b>: {{ $qu['period']}}</h6><br>
<h6><b>A) Give a brief description of your key roles?</b>:<br> {{ $qu['roledesc']}}</h6><br>
<h6><b>B) Are you satisfied with your current role?  </b>: {{ $qu['satisfywithrole']}}</h6><br>
<h6><b> - Prefered Role 1 </b>: {{ $qu['preferroleone']}}</h6><br>
<h6><b> - Prefered Role 2 </b>: {{ $qu['preferroletwo']}}</h6><br>
<h6><b> - Prefered Role 3 </b>: {{ $qu['preferrolethree']}}</h6><br>
<h6><b>C) What factors favored your performance during this appraisal period?</b>:<br> {{ $qu['favorfactor']}}</h6><br>
<h6><b>D) What factors impeded your performance during this appraisal period? </b>:<br> {{ $qu['constfactor']}}</h6><br>
<h6><b>E) How can the constraints which impeded your performance be removed? </b>: <br>{{ $qu['solution']}}</h6><br>
<h6><b>F) What are the trainings you attended during this appraisal period?</b>:<br> {{ $qu['trainingattended']}}</h6><br>
<h6><b>G) What are your identified training needs?</b>:<br> {{ $qu['trainingneeded']}}</h6><br>
<h6><b>My Comment </b>: {{ $qu['comment']}}</h6>
@endforeach
</div>




</div>


<!-- For Back Office -->
<hr>
@foreach( $quantitative as $quant)
@if( session('position') != "Relationship Officer")
<h4  class="w3-red" style="padding: 10px;" ><b>FINCON Quantitative Part I (20% Maximum Score)</b></h4><br>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th class="w3-purple">Financial Controller</th>
<th  class="w3-purple">Target</th>
<th  class="w3-purple">Actual</th>
<th  class="w3-purple">Weight</th>
<th  class="w3-purple">Score</th>
<th  class="w3-purple">Exceed</th>
</tr>
</thead>
<tbody>
<tr>
<td>{{ $quant['finconname']}}</td> 
<td>{{ $quant['targetbo']}}</td> 
<td>{{ $quant['actualbo']}}</td> 
<td>{{ $quant['weightbo']}}</td> 
<td>{{ number_format((float)$quant['score'],2,'.','')}} %</td> 
<td>{{ $quant['exceeddeposittarget']}}</td> 
</tr>
</tbody>
</table>
</div>
@endif








@if( session('position') == "Relationship Officer")

<h4 class="w3-red" style="padding: 10px;" ><b>Quantitative (70% Maximum Score)</b></h4>
<h6><b>Financial Controller :</b> {{ $quant['finconname']}}</h6>


<h4 class="w3-text-red"><b>Total Quantitative Score: {{ number_format((float)$quant['score'],2,'.','')}} %</b> </h4>

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
@endif

@endforeach
















<hr>
@if( session('position') == "Relationship Officer")
<h4  class="w3-red" style="padding: 10px;"><b>Qualitative Part (30%  Maximum Score) </b></h4><br>
@else
<h4  class="w3-red" style="padding: 10px;"><b> Quantitative Part II And Qualitative Part (80% Maximum Score For Both)</b></h4><br>
@endif

<div class="row" >
@foreach( $qualitative as $qual)


<div class="col-md-11 col-sm-12 col-xs-12">
<h6><b>Supervisor</b> : {{ $qual['supervisorname']}}</h6>
<h6><b>Supervisor Comment</b> : {{ $qual['supervisorcomment']}}</h6>
<h6><b>Weakness</b> : {{ $qual['weakness']}}</h6>
<h6><b>Strength</b> : {{ $qual['strength']}}</h6>
<h6><b>Training Needed</b> : {{ $qual['trainingneeded']}}</h6>

</div></div>

<!-- IF back office staff and not fincon,hop or control  -->

@if(Auth::user()->position != "Relationship Officer")

@foreach( $keyresultareaanswer as $qua)
@foreach( $keyresultareaquestion as $quaq)

<h4 class="w3-text-red" style="padding: 10px;"><b>Quantitative Part II: {{ $qua['score']}}% </b></h4>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th  class="w3-purple">#</th>
<th  class="w3-purple">Question</th>
<th  class="w3-purple">Mark</th>
</tr>
</thead>
<tbody>
<tr>


<td>1</td> 
<td>{{ $quaq['resultone']}}</td> 
<td>{{ $qua['resultone']}}</td> 
</tr>

<tr>
<td>2</td> 
<td>{{ $quaq['resulttwo']}}</td> 
<td>{{ $qua['resulttwo']}}</td> 
</tr>


<tr>
<td>3</td> 
<td>{{ $quaq['resultthree']}}</td> 
<td>{{ $qua['resultthree']}}</td> 
</tr>


<tr>
<td>4</td> 
<td>{{ $quaq['resultfour']}}</td> 
<td>{{ $qua['resultfour']}}</td> 
</tr>

<tr>
<td>5</td> 
<td>{{ $quaq['resultfive']}}</td> 
<td>{{ $qua['resultfive']}}</td> 
</tr>


@if(Auth::user()->position == "Head, Financial Controller" || Auth::user()->position == "Head, Banking Operations" || Auth::user()->position == "Head, Internal Control & Audit"  )

<tr>
<td>6</td> 
<td>{{ $quaq['resultsix']}}</td> 
<td>{{ $qua['resultsix']}}</td> 
</tr>


<tr>
<td>7</td> 
<td>{{ $quaq['resultseven']}}</td> 
<td>{{ $qua['resultseven']}}</td> 
</tr>


<tr>
<td>8</td> 
<td>{{ $quaq['resulteight']}}</td> 
<td>{{ $qua['resulteight']}}</td>
</tr>


<tr>
<td>9</td> 
<td>{{ $quaq['resultnine']}}</td> 
<td>{{ $qua['resultnine']}}</td>
</tr>



<tr>
<td>10</td> 
<td>{{ $quaq['resultten']}}</td> 
<td>{{ $qua['resultten']}}</td>
</tr>


</tbody>
</table>
</div>

@endif
@endforeach
@endforeach


<!-- IF BAck Office  -->





@endif




<!-- For All Staff  -->







<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<h4 class="w3-text-red"><b>Total Qualitative Score:  {{ number_format((float)$qual['score'],2,'.','')}}%</b> </h4>
<tr>
<th  class="w3-purple">#</th>
<th  class="w3-purple">Question</th>
<th  class="w3-purple">Mark</th>
</tr>
</thead>
<tbody>
@foreach( $keyarea as $qu)
@if(Auth::user()->position != "Relationship Officer")
<tr>
<th>1</th>
<th>{{ $qu['keyareaone']}} </th>
<th>{{ $qual['keyareaone']}}</th>
</tr>


<tr>
<th>2</th>
<th>{{ $qu['keyareatwo']}} </th>
<th>{{ $qual['keyareatwo']}}</th>
</tr> 

<tr>
<th>3</th>
<th>{{ $qu['keyareathree']}} </th>
<th>{{ $qual['keyareathree']}}</th>
</tr>

<tr>
<th>4</th>
<th>{{ $qu['keyareafour']}} </th>
<th>{{ $qual['keyareafour']}}</th>
</tr>

<tr>
<th>5</th>
<th>{{ $qu['keyareafive']}} </th>
<th>{{ $qual['keyareafive']}}</th>
</tr>
@endif
@endforeach



@foreach( $accountability as $qu)

<tr>
<th></th>
<th class="w3-purple"><h6><b>ACCOUNTABILITY</b></h6> </th>
<th></th>
</tr>


<tr>
<th>1</th>
<th>{{ $qu['accountabilityone']}} </th>
<th>{{ $qual['accountabilityone']}}</th>
</tr>


<tr>
<th>2</th>
<th>{{ $qu['accountabilitytwo']}} </th>
<th>{{ $qual['accountabilitytwo']}}</th>
</tr> 

<tr>
<th>3</th>
<th>{{ $qu['accountabilitythree']}}</th>
<th>{{ $qual['accountabilitythree']}}</th>
</tr>



<tr>
<th>4</th>
<th>{{ $qu['accountabilityfour']}}</th>
<th>{{ $qual['accountabilityfour']}}</th>
</tr>
@endforeach

@foreach( $reliability as $qu)
<tr>
<th></th>
<th  class="w3-purple"><h6><b>RELIABILITY</b></h6></th>
<th></th>
</tr>

<tr>
<th>1</th>
<th>{{ $qu['reliabilityone']}}</th>
<th>{{ $qual['reliabilityone']}}</th>
</tr>


<tr>
<th>2</th>
<th>{{ $qu['reliabilitytwo']}}</th>
<th>{{ $qual['reliabilitytwo']}}</th>
</tr>



<tr>
<th>3</th>
<th>{{ $qu['reliabilitythree']}}</th>
<th>{{ $qual['reliabilitythree']}}</th>
</tr>


<tr>
<th>4</th>
<th>{{ $qu['reliabilityfour']}}</th>
<th>{{ $qual['reliabilityfour']}}</th>
</tr>

<tr>
<th>5</th>
<th>{{ $qu['reliabilityfive']}}</th>
<th>{{ $qual['reliabilityfive']}}</th>
</tr>
@endforeach
@foreach( $initiative as $qu)
<tr>
<th></th>
<th  class="w3-purple"><h6><b>INITIATIVE</b></h6></th>
<th></th>
</tr>


<tr>
<th>1</th>
<th>{{ $qu['initiativeone']}}</th>
<th>{{ $qual['initiativeone']}}</th>
</tr>


<tr>
<th>2</th>
<th>{{ $qu['initiativetwo']}}</th>
<th>{{ $qual['initiativetwo']}}</th>
</tr>



<tr>
<th>3</th>
<th>{{ $qu['initiativethree']}}</th>
<th>{{ $qual['initiativethree']}}</th>
</tr>


<tr>
<th>4</th>
<th>{{ $qu['initiativefour']}}</th>
<th>{{ $qual['initiativefour']}}</th>
</tr>

<tr>
<th>5</th>
<th>{{ $qu['initiativefive']}}</th>
<th>{{ $qual['initiativefive']}}</th>
</tr>



<tr>
<th>6</th>
<th>{{ $qu['initiativesix']}}</th>
<th>{{ $qual['initiativesix']}}</th>
</tr>
@endforeach
@foreach( $customerfocus as $qu)
<tr>
<th></th>
<th  class="w3-purple"><h6><b>CUSTOMER FOCUS</b></h6></th>
<th></th>
</tr>


<tr>
<th>1</th>
<th>{{ $qu['customerfocusone']}}</th>
<th>{{ $qual['customerfocusone']}}</th>
</tr>


<tr>
<th>2</th>
<th>{{ $qu['customerfocustwo']}}</th>
<th>{{ $qual['customerfocustwo']}}</th>
</tr>



<tr>
<th>3</th>
<th>{{ $qu['customerfocusthree']}}</th>
<th>{{ $qual['customerfocusthree']}}</th>
</tr>


<tr>
<th>4</th>
<th>{{ $qu['customerfocusfour']}}</th>
<th>{{ $qual['customerfocusfour']}}</th>
</tr>

<tr>
<th>5</th>
<th>{{ $qu['customerfocusfive']}}</th>
<th>{{ $qual['customerfocusfive']}}</th>
</tr>



<tr>
<th>6</th>
<th>{{ $qu['customerfocussix']}}</th>
<th>{{ $qual['customerfocussix']}}</th>
</tr>

@endforeach
@foreach( $efficiency as $qu)
<tr>
<th></th>
<th  class="w3-purple"><h6><b>EFFICIENCY</b></h6></th>
<th></th>
</tr>

<tr>
<th>1</th>
<th>{{ $qu['efficiencyone']}}</th>
<th>{{ $qual['efficiencyone']}}</th>
</tr>


<tr>
<th>2</th>
<th>{{ $qu['efficiencytwo']}}</th>
<th>{{ $qual['efficiencytwo']}}</th>
</tr>



<tr>
<th>3</th>
<th>{{ $qu['efficiencythree']}}</th>
<th>{{ $qual['efficiencythree']}}</th>
</tr>


<tr>
<th>4</th>
<th>{{ $qu['efficiencyfour']}}</th>
<th>{{ $qual['efficiencyfour']}}</th>
</tr>

<tr>
<th>5</th>
<th>{{ $qu['efficiencyfive']}}</th>
<th>{{ $qual['efficiencyfive']}}</th>
</tr>



<tr>
<th>6</th>
<th>{{ $qu['efficiencysix']}}</th>
<th>{{ $qual['efficiencysix']}}</th>
</tr>

<tr>
<th>7</th>
<th>{{ $qu['efficiencyseven']}}</th>
<th>{{ $qual['efficiencyseven']}}</th>
</tr>
@endforeach



@foreach( $professionalism as $qu)
<tr>
<th></th>
<th  class="w3-purple"><h6><b>PROFESSIONALISM</b></h6></th>
<th></th>
</tr>

<tr>
<th>1</th>
<th>{{ $qu['professionalismone']}}</th>
<th>{{ $qual['professionalismone']}}</th>
</tr>


<tr>
<th>2</th>
<th>{{ $qu['professionalismtwo']}}</th>
<th>{{ $qual['professionalismtwo']}}</th>
</tr>



<tr>
<th>3</th>
<th>{{ $qu['professionalismthree']}}</th>
<th>{{ $qual['professionalismthree']}}</th>
</tr>


<tr>
<th>4</th>
<th>{{ $qu['professionalismfour']}}</th>
<th>{{ $qual['professionalismfour']}}</th>
</tr>

<tr>
<th>5</th>
<th>{{ $qu['professionalismfive']}}</th>
<th>{{ $qual['professionalismfive']}}</th>
</tr>



<tr>
<th>6</th>
<th>{{ $qu['professionalismsix']}}</th>
<th>{{ $qual['professionalismsix']}}</th>
</tr>

<tr>
<th>7</th>
<th>{{ $qu['professionalismseven']}}</th>
<th>{{ $qual['professionalismseven']}}</th>
</tr>

<tr>
<th>8</th>
<th>{{ $qu['professionalismeight']}}</th>
<th>{{ $qual['professionalismeight']}}</th>
</tr>

<tr>
<th>9</th>
<th>{{ $qu['professionalismnine']}}</th>
<th>{{ $qual['professionalismnine']}}</th>
</tr>


<tr>
<th>10</th>
<th>{{ $qu['professionalismten']}}</th>
<th>{{ $qual['professionalismten']}}</th>
</tr>


<tr>
<th>11</th>
<th>{{ $qu['professionalismeleven']}}</th>
<th>{{ $qual['professionalismeleven']}}</th>
</tr>


<tr>
<th>12</th>
<th>{{ $qu['professionalismtwelve']}}</th>
<th>{{ $qual['professionalismtwelve']}}</th>
</tr>

@endforeach

</tbody>
</table>
</div> 







<!----MD RESULT AREA - -->
<h4  class="w3-red" style="padding: 10px;" ><b>SUMARY</b></h4><br>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
 @foreach( $result as $result)
<tr>
<th  class="w3-purple">HR</th>
<th  class="w3-purple">Comment</th>
<th  class="w3-purple">MD </th>
<th  class="w3-purple">Comment</th>
<th  class="w3-purple">Result</th>
<th  class="w3-purple">Interpretation</th>
</tr>
</thead>
<tbody>
<tr>
<td>{{ $result['hrname']}}</td> 
<td>{{ $result['hrcomandrecom']}}</td> 
<td>{{ $result['mdname']}}</td> 
<td>{{ $result['mdcomandrecom']}}</td> 
<td>{{ number_format((float)$result['resultinpercentage'],2,'.','')}}%</td> 
<td>{{ $result['resultinterpretation']}}</td> 

</tr>

</tbody>
</table>
<br><br>
<div class="text-center">
<a class="btn btn-lg btn-success " href="/appraisalhistory" ><i class=""></i><b>Back</b></a>  
</div>
</div>
@endforeach
@endforeach








@endsection