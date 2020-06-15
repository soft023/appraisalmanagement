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
                     <h2>List Of Rejected Appraisal</h2>   
                        
                    </div>
                </div>              
                 <!-- /. ROW  -->
              

                 <!-- /. ROW  -->
                <div class="row" >

<div class="col-md-12 col-sm-12 col-xs-12">

<div class="panel panel-default">
<div class="panel-heading">
Rejected Appraisals
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>Name</th>
<th>Postion</th>
<th>Score</th>
<th>Exceed</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php   $i = 1; ?>
@foreach( $reject as $rej)

<tr>
<td>{{$i}}</td> 
<td>{{ $rej['firstname']}} {{ $rej['lastname']}}</td>
<td>{{ $rej['position']}}</td>
<td>{{ number_format((float)$rej['score'],2,'.','')}}</td>
<td>{{ number_format((float)$rej['exceeddeposittarget'],2,'.','')}}</td>
<td> <a class="btn btn-success " href="/finconeditrejectedappraisal/{{ $rej['id']}}" ><i class="fa fa-edit"></i><b>Re-appraise</b></a></td></tr>
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
              
