@extends('layouts.mainmenu')

@section('content') 
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
<div id="page-inner">
<div class="row">
<div class="col-md-12">

<h2>Tables Of All Pending Appraisal</h2>   

</div>
</div>              
<!-- /. ROW  -->


<!-- /. ROW  -->
<div class="row" >

<div class="col-md-12 col-sm-12 col-xs-12">

<div class="panel panel-default">
<div class="panel-heading">
Table Of Pending Appraisal
</div>
<div class="panel-body">
<div class="table-responsive">

<strong class="w3-text-red">Quantitative Appraisal Delay By Fincon</strong>
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th class="w3-red">#</th>
<th class="w3-red">Name</th>
<th class="w3-red">Department</th>
<th class="w3-red">Position</th>
<th class="w3-red">Date</th>
</tr>
</thead>
<tbody>
<?php   $i = 1; ?>
@foreach( $fincondelay as $user)
<tr>
<td>{{$i}}</td> 
<td>{{ $user['firstname']}} {{ $user['lastname']}}</td>
<td>{{ $user['department']}}</td>
<td>{{ $user['position']}}</td>
<td>{{ $user['updated_at']}}</td>
</tr>

<?php   $i++; ?>
 @endforeach
</tbody>
</table>

<br><br>


<strong class="w3-text-red">Quantitative Confirmation Delay By Staff</strong>
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th class="w3-red">#</th>
<th class="w3-red">Name</th>
<th class="w3-red">Department</th>
<th class="w3-red">Position</th>
<th class="w3-red">Date</th>
</tr>
</thead>
<tbody>
<?php   $i = 1; ?>
@foreach( $stafffindelay as $us)
<tr>
<td>{{$i}}</td> 
<td>{{ $us['firstname']}} {{ $us['lastname']}}</td>
<td>{{ $us['department']}}</td>
<td>{{ $us['position']}}</td>
<td>{{ $us['updated_at']}}</td>
</tr> 

<?php   $i++; ?>
@endforeach
</tbody>
</table>




<br><br>


<strong class="w3-text-red">Qualitative Confirmation Delay By Staff</strong>
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th class="w3-red">#</th>
<th class="w3-red">Name</th>
<th class="w3-red">Department</th>
<th class="w3-red">Position</th>
<th class="w3-red">Date</th>
</tr>
</thead>
<tbody>
<?php   $i = 1; ?>
@foreach( $staffsupdelay as $user)
<tr>
<td>{{$i}}</td> 
<td>{{ $user['firstname']}} {{ $user['lastname']}}</td>
<td>{{ $user['department']}}</td>
<td>{{ $user['position']}}</td>
<td>{{ $user['updated_at']}}</td>
</tr> 

<?php   $i++; ?>
@endforeach
</tbody>
</table>




<br><br>



<strong class="w3-text-red">Rejected Quantitative Delay By Fincon</strong>
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th class="w3-red">#</th>
<th class="w3-red">Name</th>
<th class="w3-red">Department</th>
<th class="w3-red">Position</th>
<th class="w3-red">Date</th>
</tr>
</thead>
<tbody>
<?php   $i = 1; ?>
@foreach( $finconxdelay as $user)
<tr>
<td>{{$i}}</td> 
<td>{{ $user['firstname']}} {{ $user['lastname']}}</td>
<td>{{ $user['department']}}</td>
<td>{{ $user['position']}}</td>
<td>{{ $user['updated_at']}}</td>
</tr>

<?php   $i++; ?>
 @endforeach
</tbody>
</table>






<br><br>


<strong class="w3-text-red">Qualitative Appraisal Delay By Supervisor</strong>
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th class="w3-red">#</th>
<th class="w3-red">Name</th>
<th class="w3-red">Department</th>
<th class="w3-red">Supervisor</th>
<th class="w3-red">Position</th>
<th class="w3-red">Date</th>
</tr>
</thead>
<tbody>
<?php   $i = 1; ?>
@foreach( $supervisordelay as $usr)
<tr>
<td>{{$i}}</td> 
<td>{{ $usr['firstname']}} {{ $usr['lastname']}}</td>
<td>{{ $usr['department']}}</td>
<td>
<?php 
if ($usr['department'] =="MD OFFICE"){
?>	
Sherifdeen Rabiu
<?php } ?>
<?php 
if ($usr['department'] =="MICROCREDIT"){
?>	
Taiye Ajia
<?php } ?>
<?php 
if ($usr['department'] =="OPERATIONS"){
?>	
Qazeeem Muhammad
<?php } ?>
<?php 
if ($usr['department'] =="CREDIT AND RISK"){
?>	
Sherifdeen Rabiu
<?php } ?>	

<?php 
if ($usr['department'] =="CONSUMER"){
?>	
Issa Abubakar
<?php } ?>	

<?php 
if ($usr['department'] =="FINCON"){
?>	
Saad Hameed
<?php } ?>	


</td>
<td>{{ $usr['position']}}</td>
<td>{{ $usr['updated_at']}}</td>
</tr>

<?php   $i++; ?>
 @endforeach
</tbody>
</table>




<br><br>


<strong class="w3-text-red">Comment And Recommendation Delay By Hr</strong>
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th class="w3-red">#</th>
<th class="w3-red">Name</th>
<th class="w3-red">Department</th>
<th class="w3-red">Position</th>
<th class="w3-red">Date</th>
</tr>
</thead>
<tbody>
<?php   $i = 1; ?>
@foreach( $hrdelay as $user)
<tr>
<td>{{$i}}</td> 
<td>{{ $user['firstname']}} {{ $user['lastname']}}</td>
<td>{{ $user['department']}}</td>
<td>{{ $user['position']}}</td>
<td>{{ $user['updated_at']}}</td>
</tr> 

<?php   $i++; ?>
@endforeach
</tbody>
</table>




<br><br>


<strong class="w3-text-red">Comment And Recommendation Delay By Md</strong>
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th class="w3-red">#</th>
<th class="w3-red">Name</th>
<th class="w3-red">Department</th>
<th class="w3-red">Position</th>
<th class="w3-red">Date</th>
</tr>
</thead>
<tbody>
<?php   $i = 1; ?>
@foreach( $mddelay as $user)
<tr>
<td>{{$i}}</td> 
<td>{{ $user['firstname']}} {{ $user['lastname']}}</td>
<td>{{ $user['department']}}</td>
<td>{{ $user['position']}}</td>
<td>{{ $user['updated_at']}}</td>
</tr>

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

