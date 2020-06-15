@extends('layouts.mainmenu')

@section('content') 

 <div id="page-wrapper" >
            <div id="page-inner">
<div class="row text-center ">
<div class="col-md-12">
<br /><br />
<h2> New Staff : Registration</h2>


<br />
</div>
</div>
<div class="row ">
<div class="col-md-1 col-sm-12  col-xs-12"></div>
<div class="col-md-10 col-sm-12  col-xs-12">
<div class="panel panel-default">
<div class="panel-heading w3-text-white text-center" style="background: #8d219c">
<strong>   All fields are compulsory</strong>  
</div>
<div class="panel-body">
<div class="row">

<h4  class="w3-text-green">{{Session::get('success')}} </h4>

<strong class="text-center"> <p>Personal Info</p></strong>
<form  method="POST" action="{{ route('registerstaff') }}" enctype="multipart/form-data">
@csrf

<div class="col-md-4 col-sm-12  col-xs-12">
<br />
<div class="form-group input-group" >
<input type="text" class="form-control" name="firstname" placeholder="First Name" required />
</div>             
<div class="form-group input-group">
<input type="text" class="form-control" name="staffid" placeholder="Staff ID" required /> 
</div>      
<div class="form-group input-group">
<select class="form-control" id="gender" name="gender" required>
<option value="" disabled selected>Select Gender</option>  
<option value="Male">Male</option>   
<option value="Female">Female</option>       
</select>
</div>                              
<hr />


</div>
<div class="col-md-4 col-sm-12  col-xs-12">
<br />
<div class="form-group input-group" >
<input type="text" class="form-control" name="lastname" placeholder="Last Name" required />
</div>             
<div class="form-group input-group">
<input type="text" class="form-control" name="phone" placeholder="Phone" required/>
</div>       
<div class="form-group input-group">

 <input type="file" id="profilepic" class="form-control" name="profilepic" />   

</div>                                
<hr />
</div>
<div class="col-md-4 col-sm-12  col-xs-12"> <br />
<div class="form-group input-group" >
<input type="text" class="form-control" name="othername" placeholder="Other Name" required />
</div>             
<div class="form-group">
<input type="text" class="form-control" name="email" placeholder="Email"  required/> 
</div>    

<div class="form-group" >
<input type="date" id="dob" name="dob" > 
</div>              


<hr /></div>







</div>

<div class="row">
<div class="col-md-8 col-sm-12  col-xs-12">
<div class="form-group">
<label>Address</label><textarea class="form-control" name="address"  rows="3" required> </textarea>
</div>    

</div>
<div class="col-md-4 col-sm-12  col-xs-12">

<div class="form-group input-group">
<br>
<input type="password" class="form-control" name="password" placeholder="Password" required>
</div>



</div>

</div>
<hr>







<div class="row">
<strong class="text-center"> <p>Job Profile</p></strong>
<div class="col-md-4 col-sm-12  col-xs-12">
<div class="form-group">
<select class="form-control" id="gender" name="branch" required>
<option value="" disabled selected>Select Branch</option>  
<option value="Head Office">Head Office</option>   
</select>
</div>
</div>

<div class="col-md-4 col-sm-12  col-xs-12">
<div class="form-group">
<select class="form-control" id="department" name="department" required>
<option value="" disabled selected>Select Department</option>  
@foreach($dep as $depz) 
<option value="{{$depz->name}}">{{ $depz->name }}</option>
@endforeach 
</select>    
</div>
</div>
<div class="col-md-4 col-sm-12  col-xs-12">
<div class="form-group">
<select class="form-control" id="supervisor" name="supervisor" required>
<option value="" disabled selected>Select Supervisor</option>  
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
<input type="checkbox" id="fincon" name="fincon" value="1">

</div>
</div>

<div class="col-md-3 col-sm-12  col-xs-12">
<div class="form-group">
<h6>HR Role</h6>
<input type="text" name="hr" value="0" hidden>
<input type="checkbox" id="hr" name="hr" value="1">

</div>
</div>

<div class="col-md-3 col-sm-12  col-xs-12">
<div class="form-group">
<h6>Supervisor Role</h6>
<input type="text" name="sp" value="0" hidden>
<input type="checkbox" id="sp" name="sp" value="1">
</div>
</div>


<div class="col-md-3 col-sm-12  col-xs-12">

<div class="form-group">
<h6>MD Role</h6>

<input type="text" name="md" value="0" hidden>
<input type="checkbox" name="md" value="1">


</div>

</div>


</div>



















<hr>

<div class="row">
<strong class="text-center"> <p>Other Information</p></strong>
<div class="col-md-3 col-sm-12  col-xs-12">
<div class="form-group">
<select class="form-control" id="position" name="position" required>
<option value="" disabled selected>Select Position</option>  
 @foreach($pos as $grad) 
<option value="{{$grad->name}}">{{ $grad->name }}</option>
@endforeach  
</select> 
</div>
</div>

<div class="col-md-3 col-sm-12  col-xs-12">
<div class="form-group">
<select class="form-control" id="entrygrade" name="entrygrade" required>
<option value="" disabled selected>Select Entry Grade</option>  
 @foreach($gra as $grad) 
<option value="{{$grad->name}}">{{ $grad->name }}</option>
@endforeach  
</select> 
</div>
</div>
<div class="col-md-3 col-sm-12  col-xs-12">
<div class="form-group">
<select class="form-control" id="currentgrade" name="currentgrade" required>
<option value="" disabled selected>Select Current Grade </option>  
@foreach($gra as $grady) 
<option value="{{$grady->name}}">{{ $grady->name }}</option>
@endforeach 
</select> 
</div>
</div>


<div class="col-md-3 col-sm-12  col-xs-12">
<div class="form-group">
<select class="form-control" id="status" name="status" required>
<option value="" disabled selected>Select Status</option>  
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
<textarea class="form-control" name="qualification"  rows="3" required></textarea>
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








</div>
<div class="col-md-1 col-sm-12  col-xs-12"></div>
</div>

@endsection
