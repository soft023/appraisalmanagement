@extends('layouts.mainmenu')

@section('content') 
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
<div id="page-inner">
<div class="row">
<div class="col-md-12">
<h2>Appraisal Reference Management</h2>   
</div>
</div>              
<!-- /. ROW  -->
<hr>
<h6 class="w3-text-red">{{$message}}</h6>
<br><br>
<!-- /. ROW  -->
<div class="row" >
<div class="col-md-6 col-sm-12 col-xs-12">

<div class="w3-card-4" style="width:100%;">
<header class="w3-container w3-purple">
<h3 class="text-center">Appraisal Refrence</h3>
</header>

<div class="w3-container">
<br><br>
<form method="POST" action="{{route('hrsubmitref')}}">
@csrf
<div class="text-center">
<input type="text" style="font-size:13pt;" name="refname" placeholder="Input New Refrence">
</div><br><br>
<div class="text-center">
  <button type="submit" class="btn btn-lg btn-primary w3-text-white"  style="background: #8d219c;"> Start </button><br><br><br></form>
</div>
</div>

<footer class="w3-container w3-purple">
<h5></h5>
</footer>
</div> 

</div>
<div class="col-md-6 col-sm-12 col-xs-12">
<div class="w3-card-4" style="width:100%;">
<header class="w3-container w3-purple">
<h3 class="text-center">Ongoing Appraisal Reference</h3>
</header>

<div class="w3-container">

<form method="POST" action="{{route('hrstopref')}}">
@csrf
<div class="text-center">

@foreach ($ref as $refz)
<br><h2> {{$refz['ref']}} </h2><br><br>
<input type="text" style="font-size:13pt;" name="rid" value="{{ $refz['id'] }}" hidden>
</div>

<div class="text-center">
  @if($refz['id'] > 0)
  <button type="submit" class="btn btn-lg btn-primary w3-text-white"  style="background: red;"> Stop </button></div>
  @endif
@endforeach
</div><br><br></form>
<footer class="w3-container w3-purple">
<h5></h5>
</footer>
</div>

</div>
</div>









@endsection

