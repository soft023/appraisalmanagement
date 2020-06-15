@extends('layouts.mainmenu')

@section('content') 
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
<div id="page-inner">
<div class="row" >

<div class="col-md-12 col-sm-12 col-xs-12">
<div class="w3-card-4" style="width:100%;">
<header class="w3-container w3-red">
<h3>STAFF PERSONAL APPRAISAL</h3>
</header>

<div class="w3-container">
@foreach( $general as $qu)
<h6><b>Appraisal Reference</b>: {{ $qu['ref']}}</h6><br>
<h6><b>Period Of Appraisal </b>: {{ $qu['period']}}</h6><br>
<h6><b>Give a brief description of your key roles?</b>:<br> {{ $qu['roledesc']}}</h6><br>
<h6><b>Are you satisfied with your current role?  </b>: {{ $qu['satisfywithrole']}}</h6><br>
<h6><b>Prefered Role 1 </b>: {{ $qu['preferroleone']}}</h6><br>
<h6><b>Prefered Role 2 </b>: {{ $qu['preferroletwo']}}</h6><br>
<h6><b>Prefered Role 3 </b>: {{ $qu['preferrolethree']}}</h6><br>
<h6><b>What factors favored your performance during this appraisal period?</b>:<br> {{ $qu['favorfactor']}}</h6><br>
<h6><b>C) What factors impeded your performance during this appraisal period? </b>:<br> {{ $qu['constfactor']}}</h6><br>
<h6><b>D) How can the constraints which impeded your performance be removed? </b>: <br>{{ $qu['solution']}}</h6><br>
<h6><b>E) What are the trainings you attended during this appraisal period?</b>:<br> {{ $qu['trainingattended']}}</h6><br>
<h6><b>F) What are your identified training needs?</b>:<br> {{ $qu['trainingneeded']}}</h6><br>
<h6><b>My Comment </b>: {{ $qu['comment']}}</h6>
@endforeach
</div>

<footer class="w3-container w3-blue">

</footer>
</div> 

</div>
</div>

<br><br><br>
<div class="row">
<div class="col-md-12">
<h2>Qualitative Appraisal (70%) For Back Office & (30%) For Front Office</h2>   
<i><b>RATING SCALE: 5 = HIGHEST - 1 = LOWEST</b>  <br>
  (1 = Below expectation, 2 = Often meets expectation, 3 = Meets expectation, 4 = Exceeds expectations often, 5 = Always exceeds expectations.) </i>
</div>
</div>              
<!-- /. ROW  -->

<br><br>
<!-- /. ROW  -->
<div class="row" >

<div class="col-md-1 col-sm-12 col-xs-12"></div>
<div class="col-md-10 col-sm-12 col-xs-12">
<form method="POST" action="{{ route('confirmappraisal') }}">
@csrf  
<input type="text" style="font-size:13pt;"  name="userid" value="{{(session('userid'))}}" hidden>

<input type="text" style="font-size:13pt;"  name="code" value="{{(session('code'))}}" hidden>






<!-- For Back Office Staff -->
@if(session('position') != "Relationship Officer")
@foreach( $keyareas as $qu)

<h5><b>KEY RESULT AREAS</b></h5>

<p>1. {{ $qu['keyareaone']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>

<input type="radio" style="font-size:13pt;" name="keyareaone" value="{{$i}}" required >
@endfor

<p>2. {{ $qu['keyareatwo']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="keyareatwo" value="{{$i}}" required >
@endfor

<p>3. {{ $qu['keyareathree']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="keyareathree" value="{{$i}}" required >
@endfor


<p>4. {{ $qu['keyareafour']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="keyareafour" value="{{$i}}" required >
@endfor

<p>5. {{ $qu['keyareafive']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="keyareafive" value="{{$i}}" required >
@endfor
@endforeach
@endif
<br><br>


<!-- For all  Staff -->
@foreach( $accountability as $qu)

<h5><b>ACCOUNTABILITY</b></h5>
<p>1. {{ $qu['accountabilityone']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="accountabilityone" value="{{$i}}" required >
@endfor

<p>2. {{ $qu['accountabilitytwo']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="accountabilitytwo" value="{{$i}}" required >
@endfor

<p>3. {{ $qu['accountabilitythree']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="accountabilitythree" value="{{$i}}" required >
@endfor

<p>4. {{ $qu['accountabilityfour']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="accountabilityfour" value="{{$i}}" required >
@endfor
@endforeach








@foreach( $reliability as $qu)
<br><br>
<h5><b>RELIABILITY</b></h5>
<p>1. {{ $qu['reliabilityone']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="reliabilityone" value="{{$i}}" required >
@endfor

<p>2. {{ $qu['reliabilitytwo']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="reliabilitytwo" value="{{$i}}" required >
@endfor

<p>3. {{ $qu['reliabilitythree']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="reliabilitythree" value="{{$i}}" required >
@endfor

<p>4. {{ $qu['reliabilityfour']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="reliabilityfour" value="{{$i}}" required >
@endfor

<p>5. {{ $qu['reliabilityfive']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="reliabilityfive" value="{{$i}}" required >
@endfor
@endforeach








@foreach( $initiative as $qu)
<br><br>
<h5><b>INIIATIVES</b></h5>
<p>1. {{ $qu['initiativeone']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="initiativeone" value="{{$i}}" required >
@endfor

<p>2. {{ $qu['initiativetwo']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="initiativetwo" value="{{$i}}" required >
@endfor

<p>3. {{ $qu['initiativethree']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="initiativethree" value="{{$i}}" required >
@endfor

<p>4. {{ $qu['initiativefour']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="initiativefour" value="{{$i}}" required >
@endfor

<p>5. {{ $qu['initiativefive']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="initiativefive" value="{{$i}}" required >
@endfor

<p>6. {{ $qu['initiativesix']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="initiativesix" value="{{$i}}" required >
@endfor

@endforeach









@foreach( $customerfocus as $qu)
<br><br>
<h5><b>CUSTOMER FOCUS</b></h5>
<p>1. {{ $qu['customerfocusone']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="customerfocusone" value="{{$i}}" required >
@endfor

<p>2. {{ $qu['customerfocustwo']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="customerfocustwo" value="{{$i}}" required >
@endfor

<p>3. {{ $qu['customerfocusthree']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="customerfocusthree" value="{{$i}}" required >
@endfor

<p>4. {{ $qu['customerfocusfour']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="customerfocusfour" value="{{$i}}" required >
@endfor

<p>5. {{ $qu['customerfocusfive']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="customerfocusfive" value="{{$i}}" required >
@endfor

<p>6. {{ $qu['customerfocussix']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="customerfocussix" value="{{$i}}" required >
@endfor

@endforeach






@foreach( $efficiency as $qu)
<br><br>
<h5><b>EFFICIENCY</b></h5>
<p>1. {{ $qu['efficiencyone']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="efficiencyone" value="{{$i}}" required >
@endfor

<p>2. {{ $qu['efficiencytwo']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="efficiencytwo" value="{{$i}}" required >
@endfor

<p>3. {{ $qu['efficiencythree']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="efficiencythree" value="{{$i}}" required >
@endfor

<p>4. {{ $qu['efficiencyfour']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="efficiencyfour" value="{{$i}}" required >
@endfor

<p>5. {{ $qu['efficiencyfive']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="efficiencyfive" value="{{$i}}" required >
@endfor

<p>6. {{ $qu['efficiencysix']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="efficiencysix" value="{{$i}}" required >
@endfor

<p>7. {{ $qu['efficiencyseven']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="efficiencyseven" value="{{$i}}" required >
@endfor

@endforeach















@foreach( $professionalism as $qu)
<br><br>
<h5><b>PROFESSIONALISM</b></h5>
<p>1. {{ $qu['professionalismone']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismone" value="{{$i}}" required >
@endfor

<p>2. {{ $qu['professionalismtwo']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismtwo" value="{{$i}}" required >
@endfor

<p>3. {{ $qu['professionalismthree']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismthree" value="{{$i}}" required >
@endfor

<p>4. {{ $qu['professionalismfour']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismfour" value="{{$i}}" required >
@endfor

<p>5. {{ $qu['professionalismfive']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismfive" value="{{$i}}" required >
@endfor

<p>6. {{ $qu['professionalismsix']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismsix" value="{{$i}}" required >
@endfor

<p>7. {{ $qu['professionalismseven']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismseven" value="{{$i}}" required >
@endfor


<p>8. {{ $qu['professionalismeight']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismeight" value="{{$i}}" required >
@endfor


<p>9. {{ $qu['professionalismnine']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismnine" value="{{$i}}" required >
@endfor



<p>10. {{ $qu['professionalismten']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismten" value="{{$i}}" required >
@endfor


<p>11. {{ $qu['professionalismeleven']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismeleven" value="{{$i}}" required >
@endfor


<p>12. {{ $qu['professionalismtwelve']}}</p>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismtwelve" value="{{$i}}" required >
@endfor

@endforeach



<p>Comment</p>
<textarea class="form-control " name="comment" rows="3" style=" font-size:13pt;" required/> </textarea>



<p>Strength</p>
<textarea class="form-control " name="strength" rows="3" style=" font-size:13pt;" required/> </textarea>



<p>Weakness</p>
<textarea class="form-control " name="weakness" rows="3" style=" font-size:13pt;" required/> </textarea>

<p>Training Needed</p>
<textarea class="form-control " name="trainingneeded" rows="3" style=" font-size:13pt;" required/> </textarea>

<br><br><br><br>
<div class="text-center">
<button type="submit" class="btn btn-lg btn-primary w3-text-white"  style="background: #8d219c;"> Proceed </button><br><br><br><br></form>
</div>
<div>
<div class="col-md-1 col-sm-12 col-xs-12"></div>
</div>








@endsection

