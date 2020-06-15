@extends('layouts.mainmenu')

@section('content') 
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
<div id="page-inner">
<div class="row">
<div class="col-md-12">
@if (session('message'))
<div class="alert alert-success">
{{ session('message') }}
</div>
@endif
<h2>List Of Pending Appraisal</h2>   

</div>
</div>              
<!-- /. ROW  -->


<!-- /. ROW  -->
<div class="row" >

<div class="col-md-12 col-sm-12 col-xs-12">

<div class="panel panel-default">
<div class="panel-heading">
List Of Pending Appraisal
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th style="display:none">userid</th>
<th style="display:none">code</th>
<th>Name</th>
<th>Position</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php   $i = 1; ?>
@foreach( $pending as $user)
<form method="POST" action="{{ route('qualitativeform') }}"> 
@csrf
<tr>
<td style="display:none"><input type="text" style="font-size:13pt;"  name="userid" value="{{$user['userid']}}"></td>
<td style="display:none"><input type="text" style="font-size:13pt;"  name="code" value="{{$user['code']}}"></td>
<td>{{$i}}</td> 
<td>{{ $user['firstname']}} 	{{ $user['lastname']}}</td>
<td>{{ $user['position']}}</td>
<td> <button type="submit" class="btn btn-lg btn-primary w3-text-white"  style="background: #8d219c;"> Appraise </button></td></form></tr> 

<?php   $i++; ?>
@endforeach
</tbody>
</table>
</div>
</div>
</div>

</div>
</div>















@endsection

