@extends('layouts.mainmenu')

@section('content') 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>New Appraisal</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
              

                 <!-- /. ROW  -->
                <div class="row" >
                   
                    <div class="col-md-2 col-sm-12 col-xs-12"></div>
                    <div class="col-md-10 col-sm-12 col-xs-12">
                        
<form  method="POST" action="{{ route('submitappraisal') }}">
@csrf


<p>Appraisal Period</p>
<select class="form-control text-center" style="font-size:13pt;" name="period" id="period" required>
<option value="" disabled selected>Select Appraisal Period</option>
<option value="3months">3months</option>
<option value="6months">6months</option>
</select>



<p>A.   Give a brief description of your key roles?</p>
<textarea class="form-control text-center" name="roledesc" rows="3" style=" font-size:13pt;" required/></textarea> 


<p>B.   What factors favored your performance during this appraisal period?</p>
<textarea class="form-control text-center" name="favorfactor" rows="3" style=" font-size:13pt;" required/> </textarea> 



<p>C.   What factors impeded your performance during this appraisal period?</p>
<textarea class="form-control text-center" name="constfactor" rows="3" style=" font-size:13pt;" required/> </textarea> 


<p>D.   How can the constraints be removed which impeded your performance?</p>
<textarea class="form-control text-center" name="solution" rows="3" style=" font-size:13pt;" required/> </textarea> 



<p>E.   What are the trainings you attended during this appraisal period?</p>
<textarea class="form-control text-center" name="trainingattended" rows="3" style=" font-size:13pt;" required/> </textarea> 




<p>F.   What are your identified training needs?</p>
<textarea class="form-control text-center" name="trainingneeded" rows="3" style=" font-size:13pt;" required/> </textarea> 




<p>G.   Are you satisfied with your current role? If yes or No, what are your top (3) preferred roles and why?</p> 
<label>Yes</label>
<input type="radio" style="font-size:13pt;" value="Yes" name="satisfywithrole" >
<label>No</label>
<input type="radio" style="font-size:13pt;" value="No" name="satisfywithrole" >

<p>Prefer Role 1</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="preferroleone" placeholder="Preferred Role 1" >
<p>Prefer Role 2</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="preferroletwo" placeholder="Preferred Role 2" >
<p>Prefer Role 3</p>
<input type="text" style="font-size:13pt;" class="form-control text-center" name="preferrolethree" placeholder="Preferred Role 3" >



<p>Comment</p>
<textarea class="form-control text-center" name="comment" rows="3" style=" font-size:13pt;" required/> </textarea> 

 
<div class="form-group text-center"><br><br><br><br>
<button type="submit" class="btn btn-lg btn-primary w3-text-white "  style="background: #8d219c;"> Submit Record </button><br><br><br><br>
</div>


                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12"></div>
               
                
                    
                </div>






</form>

@endsection
              
