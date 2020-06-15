@extends('layouts.mainmenu')

@section('content') 
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
<div id="page-inner">
<div class="row">
<div class="col-md-12">
<h2>My Profile</h2>   
 @if(Session::get('success'))                
     <h4 class="w3-text-red">{{Session::get('success')}} </h4>
    @endif

</div>
</div>              
<!-- /. ROW  -->
<hr />
<div class="row">


<div class="col-md-4 col-sm-6 col-xs-6">           
<div class="panel panel-back noti-box">
<span class="icon-box bg-color-red set-icon">
<i class="fa fa-envelope-o"></i>
</span>
<a href="/pendingrequest"><div class="text-box" >
<h4 class="main-text">{{session('pending')}}</h4>
<p class="text-muted">Pending Request</p>
</div></a>
</div>
</div>


<div class="col-md-4 col-sm-6 col-xs-6">           
<div class="panel panel-back noti-box">
<span class="icon-box bg-color-green set-icon">
<i class="fa fa-bars"></i>
</span>
<div class="text-box" >
<h4 class="main-text">{{Auth::user()->staffid }}<h4>
<p class="text-muted">Staff ID</p>
</div>
</div>
</div>


<div class="col-md-4 col-sm-6 col-xs-6">           
<div class="panel panel-back noti-box">
<span class="icon-box bg-color-blue set-icon">
<i class="fa fa-bell-o"></i>
</span>
<div class="text-box" >
<h4 class="main-text">{{Auth::user()->currentgradelevel }}</h4>
<p class="text-muted">Current Grade Level</p>
</div>
</div>
</div>

</div>
<!-- /. ROW  -->
<hr />  
<h4><strong class="w3-red"> Personal Information </strong></h4><hr>           
<div class="w3-card w3-purple">
<div class="row">




<div class="col-md-4 col-sm-6 col-xs-6">
<p><b><b>Firstname: </b> </b>{{Auth::user()->firstname }}</p> <br>
<p><b>Date Of Birth: </b>{{Auth::user()->dob }}</p> <br>

</div>



<div class="col-md-4 col-sm-6 col-xs-6">
<p><b>Lastname: </b>{{Auth::user()->lastname }}</p> <br>
<p><b>Phone: </b>{{Auth::user()->phone }}</p> <br>
</div>




<div class="col-md-4 col-sm-6 col-xs-6">
<p><b>Othername: </b>{{Auth::user()->othername }}</p> <br>
<p><b>Gender: </b>{{Auth::user()->gender }}</p> <br>
</div>
</div>

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<p><b>Email: </b>{{Auth::user()->email }}</p> <br>
</div>
</div>

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<p><b>Address: </b>{{Auth::user()->address }}</p> <br>
</div>
</div>


</div>

<h4 ><strong class="w3-red">Official Information</strong></h4>  <hr>
<div class="w3-card w3-purple">
<div class="row">



<div class="col-md-4 col-sm-6 col-xs-6">
<p><b>Employement Date: </b>{{Auth::user()->doe }} </p> <br>
<p><b>Entry Grade Level: </b>{{Auth::user()->entrygradelevel }}</p> <br>
@if (Auth::user()->staffid == "002")
<p><b>Position:</b>  Head, MicroCredit</p><br>
@elseif(Auth::user()->staffid == "003")
<p><b>Position:</b>  Head, Premium</p><br>
@else
<p><b>Position:</b>  {{ Auth::user()->position}}</p> <br>
@endif
</div>



<div class="col-md-4 col-sm-6 col-xs-6">
<p><b>Branch: </b>{{Auth::user()->branch}}</p> <br>
<p><b>Department: </b>{{Auth::user()->department }} </p><br>
<p><b>Status: </b>{{Auth::user()->employmentstatus }} </p><br>
</div>




<div class="col-md-4 col-sm-6 col-xs-6">
<p><b>Supervisor: </b>{{ Auth::user()->supervisor }}</p> <br>
<p><b>Qualification: </b>{{Auth::user()->qualification }}</p> <br>
</div>
</div>
</div>


















@endsection

