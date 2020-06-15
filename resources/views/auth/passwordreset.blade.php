<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BGMFB Staff Password Reset</title>
  <!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
 <link rel="stylesheet" type="text/css" href="css/w3.css">
</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> Password Reset Page</h2>
               
                <h5>( Reset Your Password )</h5>
                 <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading w3-text-white text-center" style="background: #8d219c">
                        <strong>    Update Your Password </strong>  
                            </div>
                            <div class="panel-body text-center">
                               <form method="POST" action="{{ route('passreset') }}">
                                        @csrf
                                       <br />
                                               
                               
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon w3-text-white" style="background: #8d219c"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="password" class="form-control"  placeholder="New Password" />
                                        </div>


                        


                                    <div class="form-group">
                                            
                                            <span class="pull-right">
                                                   <a href="#" > </a> 
                                            </span>
                                        </div><br><br>
                                     <button type="submit" class="btn btn-primary w3-text-white"  style="background: #8d219c;"> Update Now</button>
                                  
                                      </form>
                                    <hr />
                                    Meet the HR | ADMIN For More Info
                                     <hr />
                                          
                                   
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->

    <script src="js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="js/custom.js"></script>
   
</body>
</html>
