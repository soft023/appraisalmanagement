@extends('layouts.hmainmenu')

@section('content') 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12 text-center">
                     <h3>Staff Information Update Form</h3>   
                    </div>
                     <div class="col-md-12 ">
                      <a class="btn btn-lg btn-danger " href="/listofallstaff" ><i class=""></i><b>Back</b></a>  
                  </div>
                </div>              
                 <!-- /. ROW  -->
              

               
                 <!-- /. ROW  -->
                <div class="row ">
<div class="col-md-1 col-sm-12  col-xs-12"></div>
<div class="col-md-10 col-sm-12  col-xs-12">
<div class="panel panel-default">
<div class="panel-heading w3-text-white text-center" style="background: #8d219c">
<strong>  </strong>  
</div>
<div class="panel-body">
<div class="row">



<strong class="text-center"> <p>Personal Info</p></strong>
<form  method="POST" action="{{ route('updatestaff') }}" enctype="multipart/form-data">
@csrf
@foreach( $staffdetails as $user)
<input type="text" class="form-control" value="{{ $user['id']}}" name="uid"  hidden />
<div class="col-md-4 col-sm-12  col-xs-12">
<br />
<div class="form-group " >
<label>First Name</label>
<input type="text" class="form-control" value="{{ $user['firstname']}}" name="firstname"  required />
</div>             
<div class="form-group input-group">
<label>Staff ID</label>
<input type="text" class="form-control" value="{{ $user['staffid']}}" name="staffid"  required /> 
</div>      
<div class="form-group input-group">
<label>Gender</label>
<select class="form-control" id="gender" name="gender" required>
<option value="{{ $user['gender']}}"  selected>{{ $user['gender']}}</option>  
<option value="Male">Male</option>   
<option value="Female">Female</option>       
</select>
</div>                              
<hr />


</div>
<div class="col-md-4 col-sm-12  col-xs-12">
<br />
<div class="form-group input-group" >
<label>Last Name</label>
<input type="text" class="form-control" value="{{ $user['lastname']}}" name="lastname" required />
</div>             
<div class="form-group input-group">
<label>Phone Number</label>
<input type="text" class="form-control"  value="{{ $user['phone']}}" name="phone"  required/>
</div>       
<div class="form-group input-group">
<label>Profile Picture</label>
 <input type="file" id="profilepic" class="form-control" name="profilepic" value="{{ $user['profilepic']}}" />   

</div>                                
<hr />
</div>
<div class="col-md-4 col-sm-12  col-xs-12"> <br />
<div class="form-group input-group" >
<label>Other Name</label>
<input type="text" class="form-control"  value="{{ $user['othername']}}" name="othername"  required />
</div>             
<div class="form-group">
<label>Email</label>
<input type="text" class="form-control" value="{{ $user['email']}}" name="email"  required/> 
</div>    

<div class="form-group" >
<label>D.O.B</label>
<input type="text" id="dob" value="{{ $user['dob']}}" name="dob" required> 
</div>              


<hr /></div>







</div>

<div class="row">
<div class="col-md-12 col-sm-12  col-xs-12">
<div class="form-group">
 <label>Address</label>
<textarea class="form-control" name="address"  rows="3" required> {{ $user['address']}}</textarea>
</div>    

</div>
<div class="col-md-4 col-sm-12  col-xs-12">




</div>

</div>
<hr>







<div class="row">
<strong class="text-center"> <p>Job Profile</p></strong><br>
<div class="col-md-4 col-sm-12  col-xs-12">
<div class="form-group">
<label>Branch</label>
<select class="form-control" id="gender" name="branch" required>
<option value="{{ $user['branch']}}" selected>{{ $user['branch']}}</option>  
<option value="Head Office">Head Office</option>   
</select>
</div>
</div>

<div class="col-md-4 col-sm-12  col-xs-12">
<div class="form-group">
<label>Department</label>
<select class="form-control" id="department" name="department" required>
<option value="{{ $user['department']}}" selected>{{ $user['department']}}</option>  
@foreach($dep as $depz) 
<option value="{{$depz->name}}">{{ $depz->name }}</option>
@endforeach 
</select>    
</div>
</div>
<div class="col-md-4 col-sm-12  col-xs-12">
<div class="form-group">
<label>Supervisor</label>
<select class="form-control" id="supervisorid" name="supervisor" required>
<option value="{{ $user['supervisor']}}"  selected>{{ $user['supervisor']}}</option>  
 @foreach($sup as $sup) 
<option value="{{ $sup->firstname }} {{ $sup->lastname }}">{{ $sup->firstname }} {{ $sup->lastname }}</option>
@endforeach 
</select> 
</div>

</div>


</div>









<hr>

<div class="row">
<strong class="text-center"> <p>Roles</p></strong>
<div class="col-md-3 col-sm-12  col-xs-12">
<div class="form-group">
<h6>Fincon Role</h6>
<input type="text" name="fincon" value="0" hidden>
@if ( $user['rightfincon'] == 1)
<input type="checkbox" id="fincon" name="fincon" value="1" checked>
@else
<input type="checkbox" id="fincon" name="fincon" value="1">
@endif
</div>
</div>

<div class="col-md-3 col-sm-12  col-xs-12">
<div class="form-group">
<h6>HR Role</h6>
<input type="text" name="hr" value="0" hidden>
@if ( $user['righthr'] == 1)
<input type="checkbox" id="hr" name="hr" value="1" checked>
@else
<input type="checkbox" id="hr" name="hr" value="1">
@endif



</div>
</div>

<div class="col-md-3 col-sm-12  col-xs-12">
<div class="form-group">
<h6>Supervisor Role</h6>
<input type="text" name="sp" value="0" hidden>

@if ( $user['rightsupervisor'] == 1)
<input type="checkbox" id="sp" name="sp" value="1" checked>
@else
<input type="checkbox" id="sp" name="sp" value="1">
@endif


</div>
</div>


<div class="col-md-3 col-sm-12  col-xs-12">

<div class="form-group">
<h6>MD Role</h6>

<input type="text" name="md" value="0" hidden>
@if ( $user['rightmd'] == 1)
<input type="checkbox" id="md" name="md" value="1" checked>
@else
<input type="checkbox" id="md" name="md" value="1">
@endif

</div>

</div>


</div>



















<hr>

<div class="row">
<strong class="text-center"> <p>Other Information</p></strong><br>
<div class="col-md-3 col-sm-12  col-xs-12">
<div class="form-group">
<label>Position</label>
<select class="form-control" id="position" name="position" required>
<option value="{{ $user['position']}}" selected>{{ $user['position']}}</option>  
 @foreach($pos as $grad) 
<option value="{{$grad->name}}">{{ $grad->name }}</option>
@endforeach  
</select> 
</div>
</div>

<div class="col-md-3 col-sm-12  col-xs-12">
<div class="form-group">
<label>Entry Grade Level</label>
<select class="form-control" id="entrygrade" name="entrygrade" required>
<option value="{{ $user['entrygradelevel']}}" selected>{{ $user['entrygradelevel']}}</option>  
 @foreach($gra as $grad) 
<option value="{{$grad->id}}">{{ $grad->name }}</option>
@endforeach  
</select> 
</div>
</div>
<div class="col-md-3 col-sm-12  col-xs-12">
<div class="form-group">
<label>Current Grade Level</label>
<select class="form-control" id="currentgrade" name="currentgrade" required>
<option value="{{ $user['currentgradelevel']}}"selected>{{ $user['currentgradelevel']}}</option>  
@foreach($gra as $grady) 
<option value="{{$grady->id}}">{{ $grady->name }}</option>
@endforeach 
</select> 
</div>
</div>


<div class="col-md-3 col-sm-12  col-xs-12">
<div class="form-group">
<label>Status</label>
<select class="form-control" id="status" name="status" required>
<option value="{{ $user['employmentstatus']}}" selected>{{ $user['employmentstatus']}}</option>  
<option value="Active">Active</option>
<option value="Inactive">Inactive</option>        
</select> 
</div>
</div>


</div>







<div class="row">
<div class="col-md-12 col-sm-12  col-xs-12"><br>
<div class="form-group">
<label>Qualification</label>
<textarea class="form-control" name="qualification"  rows="3" required>{{ $user['qualification']}}</textarea>
</div>    
</div>


</div>





<hr>
<div class="row">
<div class="col-md-12 col-sm-12  col-xs-12 text-center"><br>
<div class="form-group"><br><br>
<button type="submit" class="btn btn-lg btn-primary w3-text-white"  style="background: #8d219c;"> Submit Record </button><br><br><br><br>
</div>    
</div>


</div></form>

@endforeach








@endsection
              
