@extends('layouts.mainmenu')

@section('content') 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>List Of Pending Appraisal</h2>   
                       
                    </div>
                </div>              
                 <!-- /. ROW  -->
              
    @if(Session::has('message'))
        <div class="alert alert-success">
        <p class="alert">{!! Session::get('message') !!}</p
        </div>
     @endif
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
<th>Name</th>
<th>Position</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php   $i = 1; ?>
@foreach( $profile as $user)

<tr>
<td>{{$i}}</td> 
<td>{{ $user['firstname']}} {{ $user['lastname']}}</td>
<td>{{ $user['position']}}</td>
<td> <a class="btn btn-success " href="/finconappraisalform/{{ $user['userid']}}" ><i class="fa fa-edit"></i><b>Appraise</b></a></td></tr>
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
              
