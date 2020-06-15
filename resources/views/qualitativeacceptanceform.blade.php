@extends('layouts.mainmenu')

@section('content') 
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
<div id="page-inner">
<div class="row">
<div class="col-md-12">
<h2>Qualitative Acceptance Form</h2>  <br><br> 

</div>
</div>              
<!-- /. ROW  -->


<!-- /. ROW  -->
<div class="row" >
@foreach( $qualitativesresult as $qual)

<div class="col-md-12 col-sm-12 col-xs-12">
 <div class="w3-card-4">

<header class="w3-container w3-red">
  <h3>Supervisor Remark</h3>
</header>

<div class="w3-container">
<p><b>Supervisor</b> : {{ $qual['supervisorname']}}</p>
<p><b>Supervisor Comment</b> : {{ $qual['supervisorcomment']}}</p>
<p><b>Weakness</b> : {{ $qual['weakness']}}</p>
<p><b>Strength</b> : {{ $qual['strength']}}</p>
<p><b>Training Needed</b> : {{ $qual['trainingneeded']}}</p>
<p><b>Total Qualitative Score</b> : {{ number_format((float)$qual['score'],2,'.','')}}%</p><br>
</div>

<footer class="w3-container w3-red">
  <h5></h5>
</footer>
</div><br><br><br>
</div> 
</div>





<!-- IF back office staff and not fincon,hop or control  -->

@if(Auth::user()->position != "Relationship Officer")
<div class="row">

@foreach( $keyresultareaanswer as $qua)
@foreach( $keyresultareaquestion as $quaq)

<div class="col-md-12 col-sm-12 col-xs-12">
<div class="w3-card-4">

<header class="w3-container w3-red">
  <h3>QUANTITATIVE PART II - You scored - {{ number_format((float)$qua['score'],2,'.','')}}% Out of 10%</h3>
</header>
<div class="w3-container">
<p>1.{{ $quaq['resultone']}} : {{ $qua['resultone']}}</p>
<p>2.{{ $quaq['resulttwo']}} : {{ $qua['resulttwo']}}</p>
<p>3.{{ $quaq['resultthree']}} : {{ $qua['resultthree']}}</p>
<p>4.{{ $quaq['resultfour']}} : {{ $qua['resultfour']}}</p>
<p>5.{{ $quaq['resultfive']}} : {{ $qua['resultfive']}}</p>
@if(Auth::user()->position == "Head, Financial Controller" || Auth::user()->position == "Head, Banking Operations" || Auth::user()->position == "Head, Internal Control & Audit"  )

<p>6.{{ $quaq['resultsix']}} : {{ $qua['resultsix']}}</p><br>
<p>7.{{ $quaq['resultseven']}} : {{ $qua['resultseven']}}</p><br>
<p>8.{{ $quaq['resulteight']}} : {{ $qua['resulteight']}}</p><br>
<p>9.{{ $quaq['resultnine']}} : {{ $qua['resultnine']}}</p><br>
<p>10.{{ $quaq['resultten']}} : {{ $qua['resultten']}}</p><br>
@endif
@endforeach
@endforeach



</div>
</div>








<br>

<h6><b>RATING SCALE: <i class="w3-text-purple"> 1 = LOWEST ,5 = HIGHEST 1 = Below expectation, 2 = Often meets expectation, 3 = Meets expectation, 4 = Exceeds expectations often, 5 = Always exceeds expectations. </i></b></h6><br>
<!-- IF BAck Office  -->



<div class="col-md-12 col-sm-12 col-xs-12">


<div class="w3-card-4">

<header class="w3-container w3-red">
  <h3>QUALITATTIVE PART : KEY RESULT AREAS</h3>
</header>
@foreach( $keyarea as $qu)
<p>1.{{ $qu['keyareaone']}} : {{ $qual['keyareaone']}}</p>
<p>2.{{ $qu['keyareatwo']}} : {{ $qual['keyareatwo']}}</p>
<p>3.{{ $qu['keyareathree']}} : {{ $qual['keyareathree']}}</p>
<p>4.{{ $qu['keyareafour']}} : {{ $qual['keyareafour']}}</p>
<p>5.{{ $qu['keyareafive']}} : {{ $qual['keyareafive']}}</p>

</div>
@endforeach

</div>
</div>



</div><br><br>
<h6><b>RATING SCALE: <i class="w3-text-purple"> 1 = LOWEST ,5 = HIGHEST 1 = Below expectation, 2 = Often meets expectation, 3 = Meets expectation, 4 = Exceeds expectations often, 5 = Always exceeds expectations. </i></b></h6>

@endif




<!-- For All Staff  -->
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">


<div class="w3-card-4">

<header class="w3-container w3-red">
  <h3>ACCOUNTABILITY</h3>
</header>
<div class="w3-container">
 @foreach( $accountability as $qu)
<p>1.{{ $qu['accountabilityone']}} : {{ $qual['accountabilityone']}}</p>
<p>2.{{ $qu['accountabilitytwo']}} : {{ $qual['accountabilitytwo']}}</p>
<p>3.{{ $qu['accountabilitythree']}} : {{ $qual['accountabilitythree']}}</p>
<p>4.{{ $qu['accountabilityfour']}} : {{ $qual['accountabilityfour']}}</p>
@endforeach
</div>

<footer class="w3-container w3-red">
  <h5></h5>
</footer>

</div>
</div></div>




<br><br>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="w3-card-4">
<header class="w3-container w3-red">
  <h3>RELIABILITY</h3>
</header>
<div class="w3-container">


@foreach( $reliability as $qu)
<p>1.{{ $qu['reliabilityone']}} : {{ $qual['reliabilityone']}}</p>
<p>2.{{ $qu['reliabilitytwo']}} : {{ $qual['reliabilitytwo']}}</p>
<p>3.{{ $qu['reliabilitythree']}} : {{ $qual['reliabilitythree']}}</p>
<p>4.{{ $qu['reliabilityfour']}} : {{ $qual['reliabilityfour']}}</p>
<p>5.{{ $qu['reliabilityfive']}} : {{ $qual['reliabilityfive']}}</p>
@endforeach

</div>

<footer class="w3-container w3-red">
  <h5></h5>
</footer>

</div>




<br><br>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="w3-card-4">
<header class="w3-container w3-red">
  <h3>INITIATIVE</h3>
</header>
<div class="w3-container">
@foreach( $initiative as $qu)
<p>1.{{ $qu['initiativeone']}} : {{ $qual['initiativeone']}}</p>
<p>2.{{ $qu['initiativetwo']}} : {{ $qual['initiativetwo']}}</p>
<p>3.{{ $qu['initiativethree']}} : {{ $qual['initiativethree']}}</p>
<p>4.{{ $qu['initiativefour']}} : {{ $qual['initiativefour']}}</p>
<p>5.{{ $qu['initiativefive']}} : {{ $qual['initiativefive']}}</p>
<p>6.{{ $qu['initiativesix']}} : {{ $qual['initiativesix']}}</p>
@endforeach

</div>

<footer class="w3-container w3-red">
  <h5></h5>
</footer>

</div>




<br><br>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="w3-card-4">
<header class="w3-container w3-red">
  <h3>CUSTOMER FOCUS</h3>
</header>
<div class="w3-container">
@foreach( $customerfocus as $qu)
<p>1.{{ $qu['customerfocusone']}} : {{ $qual['customerfocusone']}}</p>
<p>2.{{ $qu['customerfocustwo']}} : {{ $qual['customerfocustwo']}}</p>
<p>3.{{ $qu['customerfocusthree']}} : {{ $qual['customerfocusthree']}}</p>
<p>4.{{ $qu['customerfocusfour']}} : {{ $qual['customerfocusfour']}}</p>
<p>5.{{ $qu['customerfocusfive']}} : {{ $qual['customerfocusfive']}}</p>
<p>6.{{ $qu['customerfocussix']}} : {{ $qual['customerfocussix']}}</p>
@endforeach
</div>

<footer class="w3-container w3-red">
  <h5></h5>
</footer>

</div>




<br><br>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="w3-card-4">
<header class="w3-container w3-red">
  <h3>EFFICIENCY</h3>
</header>
<div class="w3-container">
@foreach( $efficiency as $qu)
<p>1.{{ $qu['efficiencyone']}} : {{ $qual['efficiencyone']}}</p>
<p>2.{{ $qu['efficiencytwo']}} : {{ $qual['efficiencytwo']}}</p>
<p>3.{{ $qu['efficiencythree']}} : {{ $qual['efficiencythree']}}</p>
<p>4.{{ $qu['efficiencyfour']}} : {{ $qual['efficiencyfour']}}</p>
<p>5.{{ $qu['efficiencyfive']}} : {{ $qual['efficiencyfive']}}</p>
<p>6.{{ $qu['efficiencysix']}} : {{ $qual['efficiencysix']}}</p>
<p>7.{{ $qu['efficiencyseven']}} : {{ $qual['efficiencyseven']}}</p>
@endforeach
</div>

<footer class="w3-container w3-red">
  <h5></h5>
</footer>

</div>


<br><br>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="w3-card-4">
<header class="w3-container w3-red">
  <h3>PROFESSIONALISM</h3>
</header>
<div class="w3-container">



@foreach( $professionalism as $qu)
<p>1.{{ $qu['professionalismone']}} : {{ $qual['professionalismone']}}</p>
<p>2.{{ $qu['professionalismtwo']}} : {{ $qual['professionalismtwo']}}</p>
<p>3.{{ $qu['professionalismthree']}} : {{ $qual['professionalismthree']}}</p>
<p>4.{{ $qu['professionalismfour']}} : {{ $qual['professionalismfour']}}</p>
<p>5.{{ $qu['professionalismfive']}} : {{ $qual['professionalismfive']}}</p>
<p>6.{{ $qu['professionalismsix']}} : {{ $qual['professionalismsix']}}</p>
<p>7.{{ $qu['professionalismseven']}} : {{ $qual['professionalismseven']}}</p>
<p>8.{{ $qu['professionalismeight']}} : {{ $qual['professionalismeight']}}</p>
<p>9.{{ $qu['professionalismnine']}} : {{ $qual['professionalismnine']}}</p>
<p>10.{{ $qu['professionalismten']}} : {{ $qual['professionalismten']}}</p>
<p>11.{{ $qu['professionalismeleven']}} : {{ $qual['professionalismeleven']}}</p>
<p>12.{{ $qu['professionalismtwelve']}} : {{ $qual['professionalismtwelve']}}</p>
@endforeach
</div>
<footer class="w3-container w3-red">
 <h5></h5>
</footer>
</div>
<br><br>


<form  method="POST" action="{{ route('submitqualtacceptance') }}">
@csrf
<input type="text" style="font-size:13pt;" class="form-control text-center" name="qid" value="{{ $qual['id']}}" hidden >
@endforeach



<div class="row">
	<div class="col-md-2 col-sm-12 col-xs-12"></div>	
<div class="col-md-8 col-sm-12 col-xs-12 text-center">
<h5><b>YOUR COMMENT SECTION</b></h5><br>
<p><b>Are you satisfied with this qualitative appraisal?</b></p> 
<label>Yes</label><input type="radio" style="font-size:13pt;" value="Yes" name="qualitativeok" >
<label>No</label><input type="radio" style="font-size:13pt;" value="No" name="qualitativeok" ><br><br>
<p><b>Comment</b></p>	
<textarea class="form-control text-center" name="comment" rows="3" style=" font-size:13pt;" required/> </textarea><br><br>
<button type="submit" class="btn btn-lg btn-primary w3-text-white"  style="background: #8d219c;"> Submit Record </button><br><br><br><br>
</div>	
<div class="col-md-2 col-sm-12 col-xs-12"></div>	
<div></div>	
</div>
</form>




</div>

















@endsection

