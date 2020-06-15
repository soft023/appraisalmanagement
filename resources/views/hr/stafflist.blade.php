@extends('layouts.mainmenu')

@section('content') 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>List Of All Staff</h2>   
                        
                    </div>
                </div>              
                 <!-- /. ROW  -->
          
       
     
 @if (session('message'))
<div class="w3-text-red">
{{ Session::get('message')}}
</div><br>
@endif                 <!-- /. ROW  -->
                     <!-- /. ROW  -->
                <div class="row" >

<div class="col-md-12 col-sm-12 col-xs-12">

<div class="panel panel-default">
<div class="panel-heading">
All Staff
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>Name</th>
<th>Position</th>
<th>Department</th>
<th>Status</th>
<th>Picture</th>
<th>Action</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php   $i = 1; ?>
@foreach( $allstaff as $staff)

<tr>
<td>{{$i}}</td> 
<td>{{ $staff['firstname']}} {{ $staff['lastname']}}</td>
@if ($staff['staffid'] == "002")
<td>Head, MicroCredit </td>
@elseif($staff['staffid'] == "003")
<td>Head, Consumer </td>
@else
<td>{{ $staff['position']}}</td>
@endif
<td>{{ $staff['department']}}</td>
<td>{{ $staff['employmentstatus']}}</td>
<th><img src="{{asset('/staffpics/').'/'.$staff['profilepic']}}" )}}" class="img-responsive w3-circle w3-animate-zoom w3-hover-opacity" width="50px" height="50px" alt="Staff Image"/></th>
<td> <a class="btn btn-success " href="hrstaffinformation/{{$staff['id']}}" ><i class="fa fa-edit"></i><b>View more</b></a></td>
<td> <a class="btn btn-primary " href="hrstaffupdateform/{{$staff['id']}}" ><i class="fa fa-edit"></i><b>Update</b></a></td>

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
              
