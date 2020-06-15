@extends('layouts.mainmenu')

@section('content') 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Confirmation Form</h2>   
@if (session('message'))
<div class="alert alert-success">
{{ session('message') }}
</div>
@endif
       
                    </div>
                </div>              
                 <!-- /. ROW  -->
              

                <!-- /. ROW  -->
<div class="row" >

<div class="col-md-12 col-sm-12 col-xs-12">

<div class="panel panel-default">
<div class="panel-heading">
Pending Appraisal Confirmation
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>Date</th>
<th>Type</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php   $i = 1; ?>
<tr>
<td>{{$i}}</td> 
<td>{{session('pendingdate')}}</td>
<td>{{session('pendingtype')}}</td>

@if(session('codex') == 2)
<td> <a class="btn btn-success " href="/quantacceptanceform" ><i class="fa fa-edit"></i><b>Confirm</b></a></td>
@endif
@if(session('codex') == 3)
<td> <a class="btn btn-success " href="/qualtacceptanceform" ><i class="fa fa-edit"></i><b>Confirm</b></a></td>
@endif




</tr>
 <?php   $i++; ?>
</tbody>
</table>
</div>
</div>
</div>

</div>
</div>






@endsection
              
