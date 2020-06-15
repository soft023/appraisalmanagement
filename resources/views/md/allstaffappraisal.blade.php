@extends('layouts.mainmenu')

@section('content') 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>All Appraisal History</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
              



                
                 <!-- /. ROW  -->
                <div class="row" >

<div class="col-md-12 col-sm-12 col-xs-12">

<div class="panel panel-default">
<div class="panel-heading">
List Of Past Appraisals  <a class="btn btn-lg btn-danger " href="/export" style="margin-left:700px" >Export To Excel</a> 
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
<th>Department</th>
<th>Position</th>
<th>Score</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php   $i = 1; ?>
@foreach( $result as $res)
<tr>
<form method="POST" action="{{ route('mdfulldetails') }}">   
@csrf

<td>{{$i}}</td> 

<td style="display:none"><input type="text" style="font-size:13pt;"  name="rid" value="{{$res['id']}}"></td>
<td style="display:none"><input type="text" style="font-size:13pt;"  name="code" value="{{$res['code']}}"></td>


<td>{{ $res['firstname']}} {{ $res['lastname']}}</td>
<td>{{ $res['department']}}</td>
<td>{{ $res['position']}}</td>
<td>{{ number_format((float)$res['resultinpercentage'],2,'.','')}}%</td>
<td>{{ $res['updated_at']}} </td>

<td><button type="submit" class="btn btn-lg btn-primary w3-text-white"  style="background: #8d219c;"> More </button></td></tr>  </form>
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
              
