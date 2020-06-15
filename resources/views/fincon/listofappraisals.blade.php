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
List Of Past Appraisals
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>Name</th>
<th>Score</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php   $i = 1; ?>
@foreach( $quantitative as $quant)
<tr>
<td>{{$i}}</td> 
<td>{{ $quant['firstname']}} {{ $quant['lastname']}}</td>
<td>{{ number_format((float)$quant['score'],2,'.','')}}</td>
<td> <a class="btn btn-success " href="finconappraisaldetails/{{ $quant['id']}}" ><i class="fa fa-edit"></i><b>View More</b></a></td></tr>
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
              
