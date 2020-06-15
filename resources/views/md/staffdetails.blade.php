@extends('layouts.mmainmenu')

@section('content') 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Staff Profile</h2>  
                       <a class="btn btn-lg btn-danger " href="/mdlistofallstaff" ><i class=""></i><b>Back</b></a>  
                       
                    </div>
                </div>              
                 <!-- /. ROW  -->
              
            <hr />     

<div class="w3-card-4">

<header class="w3-container w3-red text-center">
<h3><b>Personal Information</b></h3>
</header>

<div class="w3-container">

  <div class="row">
@foreach( $staffdetails as $user)
<div class="col-md-5"></div>
<div class="col-md-2">
<br>
 <img src="{{asset('/staffpics/').'/'.$user['profilepic']}}" )}}" class="img-responsive w3-circle w3-animate-zoom w3-hover-opacity" width="100px" height="100px" alt="Staff Image"/>
</div>
<div class="col-md-5">
</div>


  </div>
 <br><br>
<div class="row">
<div class="col-md-4 col-sm-6 col-xs-6">
 <p><b>Firstname:</b> {{ $user['firstname']}}</p>
 <p><b>staffid:</b> {{ $user['staffid']}}</p>
<p><b>Date Of Birth:</b>  {{ $user['dob']}}</p>

</div>



<div class="col-md-4 col-sm-6 col-xs-6">
<p><b>Lastname:</b> {{ $user['lastname']}}</p>
<p><b>Gender:</b> {{ $user['gender']}}</p>


</div>




<div class="col-md-4 col-sm-6 col-xs-6">
<p><b>Othername:</b>  {{ $user['othername']}}</p>
<p><b>Phone:</b>  {{ $user['phone']}}</p>

</div>
</div>



<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<p><b>Email:</b>  {{ $user['email']}}</p> 
<p><b>Address:</b> {{ $user['address']}}</p>

</div>
</div>




<hr>
</div>
</div>

<br><br>


 <div class="w3-card-4">

<header class="w3-container w3-red text-center">
<h3><b>Official Profile</b></h3>
</header>

<div class="w3-container">
 <div class="row">
<div class="col-md-4 col-sm-6 col-xs-6">
<p><b>Employment Date:</b>  {{ $user['doe']}} </p> <br>
<p><b>Entry Grade Level:</b>  {{ $user['entrygradelevel']}}</p> <br>
<p><b>Qualification:</b>  {{ $user['qualification']}} </p> <br>
</div>



<div class="col-md-4 col-sm-6 col-xs-6">
<p><b>Department:</b> {{ $user['department']}} </p> <br>
<p><b>Current Grade Level:</b> {{ $user['currentgradelevel']}}</p> <br>
<p><b>Branch:</b> {{ $user['branch']}}</p> <br>
</div>




<div class="col-md-4 col-sm-6 col-xs-6">
<p><b>Supervisor:</b> {{ $user['supervisor']}}</p> <br>
@if ($user['staffid'] == "002")
<p><b>Position:</b>  Head, MicroCredit</p><br>
@elseif($user['staffid'] == "003")
<p><b>Position:</b>  Head, Premium</p><br>
@else
<p><b>Position:</b>  {{ $user['position']}}</p> <br>
@endif
</div>
</div>
</div>



</div> 






<br><br><br>
  <a class="btn btn-lg btn-danger " href="/mdlistofallstaff" ><i class=""></i><b>Back</b></a> 
@endforeach




</div></div>






@endsection
              
