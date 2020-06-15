@extends('layouts.mainmenu')

@section('content') 
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
<div id="page-inner">
<div class="row">
<div class="col-md-12">
<h2>Quantitative Appraisal Second Part (10%)</h2> 
<i>(ONLY 15 INFRACTIONS ARE PERMITTED IN AN APPRAISAL CYCLE)</i>  

</div>
</div>              
<!-- /. ROW  -->


<!-- /. ROW  -->
<div class="row" >

<div class="col-md-1 col-sm-12 col-xs-12"></div>
<div class="col-md-10 col-sm-12 col-xs-12">


<form  method="POST" action="{{ route('supersubmitkey') }}">
@csrf

<input type="text" style="font-size:13pt;"  name="userid" value="{{(session('userid'))}}" hidden>

<input type="text" style="font-size:13pt;"  name="code" value="{{(session('code'))}}" hidden>

<input type="text" style="font-size:13pt;"  name="position" value="{{(session('position'))}}" hidden>

@foreach( $keyresultareaquestion as $qu)
<!-- FOR NON MANAGEMENT BACK OFFICE---->
@if(session('position') == "Teller" || session('position') == "Credit Analyst" || session('position') == "Customer Service Officer"  || session('position') == "Fund Transfer | Cash Officer" || session('position') == "Recovery Officer" || session('position') == "IT | Systems Administrator" || session('position') == "Financial Control Officer" || session('position') == "Driver")

{{-- @if(session('position') != "Financial Controller" || session('position') != "Head, Banking Operations" || session('position') != "Internal Controller"  ) --}}


<input type="text"  name="typex" value="1" hidden>

<p>1.{{ $qu['resultone']}} </p>



<label>0</label> - <input type="radio" style="font-size:13pt;"  name="resultone" value="0" required ><br>
<label>1</label> - <input type="radio" style="font-size:13pt;"  name="resultone" value="1" required ><br>
<label>2</label> - <input type="radio" style="font-size:13pt;"  name="resultone" value="2" required ><br>




<p>2.{{ $qu['resulttwo']}} </p>

<label>0</label> - <input type="radio" style="font-size:13pt;"  name="resulttwo" value="0" required ><br>
<label>1</label> - <input type="radio" style="font-size:13pt;"  name="resulttwo" value="1" required ><br>
<label>2</label> - <input type="radio" style="font-size:13pt;"  name="resulttwo" value="2" required ><br>



<p>3.{{ $qu['resultthree']}} </p>

<label>0</label> - <input type="radio" style="font-size:13pt;"  name="resultthree" value="0" required ><br>
<label>1</label> - <input type="radio" style="font-size:13pt;"  name="resultthree" value="1" required ><br>
<label>2</label> - <input type="radio" style="font-size:13pt;"  name="resultthree" value="2" required ><br>



<p>4.{{ $qu['resultfour']}} </p>

<label>0</label> - <input type="radio" style="font-size:13pt;"  name="resultfour" value="0" required ><br>
<label>1</label> - <input type="radio" style="font-size:13pt;"  name="resultfour" value="1" required ><br>
<label>2</label> - <input type="radio" style="font-size:13pt;"  name="resultfour" value="2" required ><br>



<p>5.{{ $qu['resultfive']}} </p>

<label>0</label> - <input type="radio" style="font-size:13pt;"  name="resultfive" value="0" required ><br>
<label>1</label> - <input type="radio" style="font-size:13pt;"  name="resultfive" value="1" required ><br>
<label>2</label> - <input type="radio" style="font-size:13pt;"  name="resultfive" value="2" required ><br>

@endif














<!-- FOR Internal Control, Fincon, HOP---->
@if(session('position') == "Financial Controller" || session('position') == "Head, Banking Operations" || session('position') == "Internal Controller"  )

<input type="text" name="typex" value="2" hidden>

<p>1.{{ $qu['resultone']}}</p>

<label>0</label> -  <input type="radio" style="font-size:13pt;"  name="resultone" value="0" required ><br>
<label>1</label> -  <input type="radio" style="font-size:13pt;"  name="resultone" value="1" required ><br>



<p>2.{{ $qu['resulttwo']}}</p>

<label>0</label> - <input type="radio" style="font-size:13pt;"  name="resulttwo" value="0" required ><br>
<label>1</label> - <input type="radio" style="font-size:13pt;"  name="resulttwo" value="1" required ><br>



<p>3.{{ $qu['resultthree']}}</p>

<label>0</label> - <input type="radio" style="font-size:13pt;"  name="resultthree" value="0" required ><br>
<label>1</label> - <input type="radio" style="font-size:13pt;"  name="resultthree" value="1" required ><br>


<p>4.{{ $qu['resultfour']}}</p>

<label>0</label> - <input type="radio" style="font-size:13pt;"  name="resultfour" value="0" required ><br>
<label>1</label> - <input type="radio" style="font-size:13pt;"  name="resultfour" value="1" required ><br>


<p>5.{{ $qu['resultfive']}}</p>

<label>0</label> - <input type="radio" style="font-size:13pt;"  name="resultfive" value="0" required ><br>
<label>1</label> - <input type="radio" style="font-size:13pt;"  name="resultfive" value="1" required ><br>



<p>6.{{ $qu['resultsix']}}</p>

<label>0</label> - <input type="radio" style="font-size:13pt;"  name="resultsix" value="0" required ><br>
<label>1</label> - <input type="radio" style="font-size:13pt;"  name="resultsix" value="1" required ><br>



<p>7.{{ $qu['resultseven']}}</p>

<label>0</label> - <input type="radio" style="font-size:13pt;"  name="resultseven" value="0" required ><br>
<label>1</label> - <input type="radio" style="font-size:13pt;"  name="resultseven" value="1" required ><br>



<p>8.{{ $qu['resulteight']}}</p>

<label>0</label> - <input type="radio" style="font-size:13pt;"  name="resulteight" value="0" required ><br>
<label>1</label> - <input type="radio" style="font-size:13pt;"  name="resulteight" value="1" required ><br>


<p>9.{{ $qu['resultnine']}}</p>

<label>0</label> - <input type="radio" style="font-size:13pt;"  name="resultnine" value="0" required ><br>
<label>1</label> - <input type="radio" style="font-size:13pt;"  name="resultnine" value="1" required ><br>


<p>10.{{ $qu['resultten']}}</p>

<label>0</label> - <input type="radio" style="font-size:13pt;"  name="resultten" value="0" required ><br>
<label>1</label> - <input type="radio" style="font-size:13pt;"  name="resultten" value="1" required ><br>

@endif
<br><br><br><br>
<button type="submit" class="btn btn-lg btn-primary w3-text-white"  style="background: #8d219c;"> Submit Record </button><br><br><br><br></form>
</div>
<div class="col-md-1 col-sm-12 col-xs-12"></div>
</div>

@endforeach






@endsection

