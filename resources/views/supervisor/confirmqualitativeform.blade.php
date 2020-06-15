@extends('layouts.mainmenu')

@section('content') 
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
<div id="page-inner">
<div class="row">
<div class="col-md-12">
<h2>Qualitative Appraisal  </h2>   
<i><b>RATING SCALE: 5 = HIGHEST - 1 = LOWEST</b>  <br>
  (1 = Below expectation, 2 = Often meets expectation, 3 = Meets expectation, 4 = Exceeds expectations often, 5 = Always exceeds expectations.) </i>
</div>
</div>  
<br><br>


<!-- /. ROW  -->


<!-- /. ROW  -->
<div class="row" >

<div class="col-md-1 col-sm-12 col-xs-12"></div>
<div class="col-md-10 col-sm-12 col-xs-12">
<form method="POST" action="{{ route('supersubmitappraisal') }}">
@csrf  
<input type="text" style="font-size:13pt;"  name="userid" value="{{(session('userid'))}}" hidden>

<input type="text" style="font-size:13pt;"  name="code" value="{{(session('code'))}}" hidden>






<!-- For Back Office Staff -->
@if(session('position') != "Relationship Officer")

<p class="w3-text-red"><b>Confirm before submission, the total score is <h2>{{ number_format((float)($data['keyareaone'] + $data['keyareatwo']+ $data['keyareathree'] + $data['keyareafour'] + $data['keyareafive']+ $data['accountabilityone']  + $data['accountabilitytwo'] + $data['accountabilitythree']  + $data['accountabilityfour'] +
$data['reliabilityone']  + $data['reliabilitytwo'] + $data['reliabilitythree'] + $data['reliabilityfour'] + $data['reliabilityfive'] +
$data['initiativeone'] + $data['initiativetwo'] + $data['initiativethree'] + $data['initiativefour'] + $data['initiativefive'] + $data['initiativesix'] +
$data['customerfocusone'] + $data['customerfocustwo']  + $data['customerfocusthree'] + $data['customerfocusfour']  + $data['customerfocusfive'] + $data['customerfocussix'] + $data['efficiencyone']  + $data['efficiencytwo']  + $data['efficiencythree']  + $data['efficiencyfour'] + $data['efficiencyfive']  +$data['efficiencysix']  + $data['efficiencyseven'] + $data['professionalismone']  + $data['professionalismtwo']  + $data['professionalismthree'] + $data['professionalismfour'] + $data['professionalismfive']  + $data['professionalismsix']  + $data['professionalismseven'] + $data['professionalismeight']  +$data['professionalismnine']  +$data['professionalismten']  + $data['professionalismeleven']  +$data['professionalismtwelve'] ) / 225 * (0.7 *100),2,'.','')}}%</h2></b></p>



@foreach( $keyareas as $qu)

<h5><b>KEY RESULT AREAS</b></h5>

<p>1. {{ $qu['keyareaone']}}</p>
<label>{{ $data['keyareaone'] }}</label>
<input type="radio" style="font-size:13pt;" name="keyareaone" value="{{ $data['keyareaone'] }}" checked><br>
<br>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="keyareaone" value="{{$i}}">
@endfor



<p>2. {{ $qu['keyareatwo']}}</p>
<label>{{ $data['keyareatwo'] }}</label>
<input type="radio" style="font-size:13pt;" name="keyareatwo" value="{{ $data['keyareatwo'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="keyareatwo" value="{{$i}}" required >
@endfor

<p>3. {{ $qu['keyareathree']}}</p>
<label>{{ $data['keyareathree'] }}</label>
<input type="radio" style="font-size:13pt;" name="keyareathree" value="{{ $data['keyareathree'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="keyareathree" value="{{$i}}" required >
@endfor


<p>4. {{ $qu['keyareafour']}}</p>
<label>{{ $data['keyareafour'] }}</label>
<input type="radio" style="font-size:13pt;" name="keyareafour" value="{{ $data['keyareafour'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="keyareafour" value="{{$i}}" required >
@endfor

<p>5. {{ $qu['keyareafive']}}</p>
<label>{{ $data['keyareafive'] }}</label>
<input type="radio" style="font-size:13pt;" name="keyareafive" value="{{ $data['keyareafive'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="keyareafive" value="{{$i}}" required >
@endfor
@endforeach
@endif
<br><br>
@if(session('position') == "Relationship Officer")
<p class="w3-text-red"><b>Confirm before submission, the total score is <h2>{{ number_format((float)($data['accountabilityone']  + $data['accountabilitytwo'] + $data['accountabilitythree']  + $data['accountabilityfour'] +
$data['reliabilityone']  + $data['reliabilitytwo'] + $data['reliabilitythree'] + $data['reliabilityfour'] + $data['reliabilityfive'] +
$data['initiativeone'] + $data['initiativetwo'] + $data['initiativethree'] + $data['initiativefour'] + $data['initiativefive'] + $data['initiativesix'] +
$data['customerfocusone'] + $data['customerfocustwo']  + $data['customerfocusthree'] + $data['customerfocusfour']  + $data['customerfocusfive'] + $data['customerfocussix'] + $data['efficiencyone']  + $data['efficiencytwo']  + $data['efficiencythree']  + $data['efficiencyfour'] + $data['efficiencyfive']  +$data['efficiencysix']  + $data['efficiencyseven'] + $data['professionalismone']  + $data['professionalismtwo']  + $data['professionalismthree'] + $data['professionalismfour'] + $data['professionalismfive']  + $data['professionalismsix']  + $data['professionalismseven'] + $data['professionalismeight']  +$data['professionalismnine']  +$data['professionalismten']  + $data['professionalismeleven']  +$data['professionalismtwelve'] ) / 200 * (0.3 *100),2,'.','')}}%</h2></b></p>

@endif
<!-- For all  Staff -->
@foreach( $accountability as $qu)

<h5><b>ACCOUNTABILITY</b></h5>
<p>1. {{ $qu['accountabilityone']}}</p>
<label>{{ $data['accountabilityone'] }}</label>
<input type="radio" style="font-size:13pt;" name="accountabilityone" value="{{ $data['accountabilityone'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="accountabilityone" value="{{$i}}" required >
@endfor

<p>2. {{ $qu['accountabilitytwo']}}</p>
<label>{{ $data['accountabilitytwo'] }}</label>
<input type="radio" style="font-size:13pt;" name="accountabilitytwo" value="{{ $data['accountabilitytwo'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="accountabilitytwo" value="{{$i}}" required >
@endfor

<p>3. {{ $qu['accountabilitythree']}}</p>
<label>{{ $data['accountabilitythree'] }}</label>
<input type="radio" style="font-size:13pt;" name="accountabilitythree" value="{{ $data['accountabilitythree'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="accountabilitythree" value="{{$i}}" required >
@endfor

<p>4. {{ $qu['accountabilityfour']}}</p>
<label>{{ $data['accountabilityfour'] }}</label>
<input type="radio" style="font-size:13pt;" name="accountabilityfour" value="{{ $data['accountabilityfour'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="accountabilityfour" value="{{$i}}" required >
@endfor
@endforeach








@foreach( $reliability as $qu)
<br><br>
<h5><b>RELIABILITY</b></h5>
<p>1. {{ $qu['reliabilityone']}}</p>
<label>{{ $data['reliabilityone'] }}</label>
<input type="radio" style="font-size:13pt;" name="reliabilityone" value="{{ $data['reliabilityone'] }}" checked ><br>
<br>


@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="reliabilityone" value="{{$i}}" required >
@endfor

<p>2. {{ $qu['reliabilitytwo']}}</p>
<label>{{ $data['reliabilitytwo'] }}</label>
<input type="radio" style="font-size:13pt;" name="reliabilitytwo" value="{{ $data['reliabilitytwo'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="reliabilitytwo" value="{{$i}}" required >
@endfor

<p>3. {{ $qu['reliabilitythree']}}</p>
<label>{{ $data['reliabilitythree'] }}</label>
<input type="radio" style="font-size:13pt;" name="reliabilitythree" value="{{ $data['reliabilitythree'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="reliabilitythree" value="{{$i}}" required >
@endfor

<p>4. {{ $qu['reliabilityfour']}}</p>
<label>{{ $data['reliabilityfour'] }}</label>
<input type="radio" style="font-size:13pt;" name="reliabilityfour" value="{{ $data['reliabilityfour'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="reliabilityfour" value="{{$i}}" required >
@endfor

<p>5. {{ $qu['reliabilityfive']}}</p>
<label>{{ $data['reliabilityfive'] }}</label>
<input type="radio" style="font-size:13pt;" name="reliabilityfive" value="{{ $data['reliabilityfive'] }}" checked ><br>
<br>


@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="reliabilityfive" value="{{$i}}" required >
@endfor
@endforeach








@foreach( $initiative as $qu)
<br><br>
<h5><b>INIIATIVES</b></h5>


<p>1. {{ $qu['initiativeone']}}</p>
<label>{{ $data['initiativeone'] }}</label>
<input type="radio" style="font-size:13pt;" name="initiativeone" value="{{ $data['initiativeone'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="initiativeone" value="{{$i}}" required >
@endfor

<p>2. {{ $qu['initiativetwo']}}</p>
<label>{{ $data['initiativetwo'] }}</label>
<input type="radio" style="font-size:13pt;" name="initiativetwo" value="{{ $data['initiativetwo'] }}" checked ><br>
<br>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="initiativetwo" value="{{$i}}" required >
@endfor

<p>3. {{ $qu['initiativethree']}}</p>
<label>{{ $data['initiativethree'] }}</label>
<input type="radio" style="font-size:13pt;" name="initiativethree" value="{{ $data['initiativethree'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="initiativethree" value="{{$i}}" required >
@endfor

<p>4. {{ $qu['initiativefour']}}</p>
<label>{{ $data['initiativefour'] }}</label>
<input type="radio" style="font-size:13pt;" name="initiativefour" value="{{ $data['initiativefour'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="initiativefour" value="{{$i}}" required >
@endfor

<p>5. {{ $qu['initiativefive']}}</p>
<label>{{ $data['initiativefive'] }}</label>
<input type="radio" style="font-size:13pt;" name="initiativefive" value="{{ $data['initiativefive'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="initiativefive" value="{{$i}}" required >
@endfor

<p>6. {{ $qu['initiativesix']}}</p>
<label>{{ $data['initiativesix'] }}</label>
<input type="radio" style="font-size:13pt;" name="initiativesix" value="{{ $data['initiativesix'] }}" checked ><br>
<br>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="initiativesix" value="{{$i}}" required >
@endfor

@endforeach









@foreach( $customerfocus as $qu)
<br><br>
<h5><b>CUSTOMER FOCUS</b></h5>
<p>1. {{ $qu['customerfocusone']}}</p>
<label>{{ $data['customerfocusone'] }}</label>
<input type="radio" style="font-size:13pt;" name="customerfocusone" value="{{ $data['customerfocusone'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="customerfocusone" value="{{$i}}" required >
@endfor

<p>2. {{ $qu['customerfocustwo']}}</p>
<label>{{ $data['customerfocustwo'] }}</label>
<input type="radio" style="font-size:13pt;" name="customerfocustwo" value="{{ $data['customerfocustwo'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="customerfocustwo" value="{{$i}}" required >
@endfor

<p>3. {{ $qu['customerfocusthree']}}</p>
<label>{{ $data['customerfocusthree'] }}</label>
<input type="radio" style="font-size:13pt;" name="customerfocusthree" value="{{ $data['customerfocusthree'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="customerfocusthree" value="{{$i}}" required >
@endfor

<p>4. {{ $qu['customerfocusfour']}}</p>
<label>{{ $data['customerfocusfour'] }}</label>
<input type="radio" style="font-size:13pt;" name="customerfocusfour" value="{{ $data['customerfocusfour'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="customerfocusfour" value="{{$i}}" required >
@endfor

<p>5. {{ $qu['customerfocusfive']}}</p>
<label>{{ $data['customerfocusfive'] }}</label>
<input type="radio" style="font-size:13pt;" name="customerfocusfive" value="{{ $data['customerfocusfive'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="customerfocusfive" value="{{$i}}" required >
@endfor

<p>6. {{ $qu['customerfocussix']}}</p>
<label>{{ $data['customerfocussix'] }}</label>
<input type="radio" style="font-size:13pt;" name="customerfocussix" value="{{ $data['customerfocussix'] }}" checked ><br>
<br>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="customerfocussix" value="{{$i}}" required >
@endfor

@endforeach






@foreach( $efficiency as $qu)
<br><br>
<h5><b>EFFICIENCY</b></h5>
<p>1. {{ $qu['efficiencyone']}}</p>
<label>{{ $data['efficiencyone'] }}</label>
<input type="radio" style="font-size:13pt;" name="efficiencyone" value="{{ $data['efficiencyone'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="efficiencyone" value="{{$i}}" required >
@endfor

<p>2. {{ $qu['efficiencytwo']}}</p>
<label>{{ $data['efficiencytwo'] }}</label>
<input type="radio" style="font-size:13pt;" name="efficiencytwo" value="{{ $data['efficiencytwo'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="efficiencytwo" value="{{$i}}" required >
@endfor

<p>3. {{ $qu['efficiencythree']}}</p>
<label>{{ $data['efficiencythree'] }}</label>
<input type="radio" style="font-size:13pt;" name="efficiencythree" value="{{ $data['efficiencythree'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="efficiencythree" value="{{$i}}" required >
@endfor

<p>4. {{ $qu['efficiencyfour']}}</p>
<label>{{ $data['efficiencyfour'] }}</label>
<input type="radio" style="font-size:13pt;" name="efficiencyfour" value="{{ $data['efficiencyfour'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="efficiencyfour" value="{{$i}}" required >
@endfor

<p>5. {{ $qu['efficiencyfive']}}</p>
<label>{{ $data['efficiencyfive'] }}</label>
<input type="radio" style="font-size:13pt;" name="efficiencyfive" value="{{ $data['efficiencyfive'] }}" checked ><br>
<br>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="efficiencyfive" value="{{$i}}" required >
@endfor

<p>6. {{ $qu['efficiencysix']}}</p>
<label>{{ $data['efficiencysix'] }}</label>
<input type="radio" style="font-size:13pt;" name="efficiencysix" value="{{ $data['efficiencysix'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="efficiencysix" value="{{$i}}" required >
@endfor

<p>7. {{ $qu['efficiencyseven']}}</p>
<label>{{ $data['efficiencyseven'] }}</label>
<input type="radio" style="font-size:13pt;" name="efficiencyseven" value="{{ $data['efficiencyseven'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="efficiencyseven" value="{{$i}}" required >
@endfor

@endforeach















@foreach( $professionalism as $qu)
<br><br>
<h5><b>PROFESSIONALISM</b></h5>
<p>1. {{ $qu['professionalismone']}}</p>
<label>{{ $data['professionalismone'] }}</label>
<input type="radio" style="font-size:13pt;" name="professionalismone" value="{{ $data['professionalismone'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismone" value="{{$i}}" required >
@endfor

<p>2. {{ $qu['professionalismtwo']}}</p>
<label>{{ $data['professionalismtwo'] }}</label>
<input type="radio" style="font-size:13pt;" name="professionalismtwo" value="{{ $data['professionalismtwo'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismtwo" value="{{$i}}" required >
@endfor

<p>3. {{ $qu['professionalismthree']}}</p>
<label>{{ $data['professionalismthree'] }}</label>
<input type="radio" style="font-size:13pt;" name="professionalismthree" value="{{ $data['professionalismthree'] }}" checked ><br>
<br>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismthree" value="{{$i}}" required >
@endfor

<p>4. {{ $qu['professionalismfour']}}</p>
<label>{{ $data['professionalismfour'] }}</label>
<input type="radio" style="font-size:13pt;" name="professionalismfour" value="{{ $data['professionalismfour'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismfour" value="{{$i}}" required >
@endfor

<p>5. {{ $qu['professionalismfive']}}</p>
<label>{{ $data['professionalismfive'] }}</label>
<input type="radio" style="font-size:13pt;" name="professionalismfive" value="{{ $data['professionalismfive'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismfive" value="{{$i}}" required >
@endfor

<p>6. {{ $qu['professionalismsix']}}</p>
<label>{{ $data['professionalismsix'] }}</label>
<input type="radio" style="font-size:13pt;" name="professionalismsix" value="{{ $data['professionalismsix'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismsix" value="{{$i}}" required >
@endfor

<p>7. {{ $qu['professionalismseven']}}</p>
<label>{{ $data['professionalismseven'] }}</label>
<input type="radio" style="font-size:13pt;" name="professionalismseven" value="{{ $data['professionalismseven'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismseven" value="{{$i}}" required >
@endfor


<p>8. {{ $qu['professionalismeight']}}</p>
<label>{{ $data['professionalismeight'] }}</label>
<input type="radio" style="font-size:13pt;" name="professionalismeight" value="{{ $data['professionalismeight'] }}" checked ><br>
<br>
@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismeight" value="{{$i}}" required >
@endfor


<p>9. {{ $qu['professionalismnine']}}</p>
<label>{{ $data['professionalismnine'] }}</label>
<input type="radio" style="font-size:13pt;" name="professionalismnine" value="{{ $data['professionalismnine'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismnine" value="{{$i}}" required >
@endfor



<p>10. {{ $qu['professionalismten']}}</p>
<label>{{ $data['professionalismten'] }}</label>
<input type="radio" style="font-size:13pt;" name="professionalismten" value="{{ $data['professionalismten'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismten" value="{{$i}}" required >
@endfor


<p>11. {{ $qu['professionalismeleven']}}</p>
<label>{{ $data['professionalismeleven'] }}</label>
<input type="radio" style="font-size:13pt;" name="professionalismeleven" value="{{ $data['professionalismeleven'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismeleven" value="{{$i}}" required >
@endfor


<p>12. {{ $qu['professionalismtwelve']}}</p>
<label>{{ $data['professionalismtwelve'] }}</label>
<input type="radio" style="font-size:13pt;" name="professionalismtwelve" value="{{ $data['professionalismtwelve'] }}" checked ><br>
<br>

@for( $i = 1; $i <= 5; $i++)
<label>{{$i}}</label>
<input type="radio" style="font-size:13pt;" name="professionalismtwelve" value="{{$i}}" required >
@endfor

@endforeach



<p>Comment</p>
<textarea class="form-control " name="comment" rows="3" style=" font-size:13pt;" required/>{{ $data['comment'] }} </textarea>



<p>Strength</p>
<textarea class="form-control " name="strength" rows="3" style=" font-size:13pt;" required/> {{ $data['strength'] }}</textarea>



<p>Weakness</p>
<textarea class="form-control " name="weakness" rows="3" style=" font-size:13pt;" required/> {{ $data['weakness'] }} </textarea>

<p>Training Needed</p>
<textarea class="form-control " name="trainingneeded" rows="3" style=" font-size:13pt;" required/>{{ $data['trainingneeded'] }} </textarea>

<br><br><br><br>
<div class="text-center">
<button type="submit" class="btn btn-lg btn-primary w3-text-white"  style="background: #8d219c;"> Submit Record </button><br><br><br><br></form>
</div>
<div>
<div class="col-md-1 col-sm-12 col-xs-12"></div>
</div>








@endsection

