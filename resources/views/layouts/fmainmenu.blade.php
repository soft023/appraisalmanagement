<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Account</title>
  <!-- BOOTSTRAP STYLES-->
    <link href="../../css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../../css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="../../js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../../css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">My Profile</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">{{Auth::user()->firstname }} </a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">   <a class="dropdown-item" href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
{{ __('Logout') }}
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
@csrf
</form>
</div>



        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
        <li class="text-center">
                    <img src="../img/find_user.png" class="user-image img-responsive"/>
          </li>
        
                        <!---General Menu -->
                    <li>
                        <a class="active-menu"  href=""><i class="fa fa-dashboard fa-3x"></i> My Dashboard</a>
                    </li>
                       <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i> My Appraisal<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/appraisalform">Appraisal Form</a>
                            </li>
                            <li>
                                <a href="/pendingrequest">Pending Confirmation</a>
                            </li>
                            <li>
                                <a href="/appraisalhistory">Appraisal History</a>
                            </li>
                        </ul>
                      </li>  



                        <!-- Roles of the supervisor-->
                        @if ( Auth::user()->rightsupervisor == 1)

                        <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>Supervisor Menu<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Pending</a>
                            </li>
                            <li>
                                <a href="#">History</a>
                            </li>
                        </ul>
                        </li>
                        @endif



                        <!-- Roles of the Fincon-->



                        @if ( Auth::user()->rightfincon == 1)

                        <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>Fincon Menu<span class="fa arrow"></span></a>
                           <ul class="nav nav-second-level">
                            <li>
                                <a href="/finconpendingrequest">Pending</a>
                            </li>
                            <li>
                                <a href="/finconallappraisals">History</a>
                            </li>
                            <li>
                                <a href="/finconlistofrejected">Rejected</a>
                            </li>
                        </ul>
                        </li>
                        @endif



                     


                     <!-- Roles of the HR Menu-->

                         @if ( Auth::user()->righthr == 1)
                      <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>HR Menu<span class="fa arrow"></span></a>
                       <ul class="nav nav-second-level">
                            <li>
                                <a href="/hrnewstaff">New Staff</a>
                            </li>
                            <li>
                                <a href="/listofallstaff">All Staff</a>
                            </li>
                            <li>
                                <a href="/hrappraisalref">Appraisal Code</a>
                            </li>
                            <li>
                                <a href="/hrpendingrequest">Pending {{session('hr')}}</a>
                            </li>
                            <li>
                                <a href="/hrallappraisals">History</a>
                            </li>
                             <li>
                                <a href="/hrallpendinglist">All Pending</a>
                            </li>
                        </ul>
                        </li>
                        @endif



                        <!--- MD Menu -->
                         @if ( Auth::user()->rightmd == 1)
                        <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>MD Menu<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">All Staff</a>
                            </li>
                            <li>
                                <a href="#">Pending</a>
                            </li>
                            <li>
                                <a href="#">History</a>
                            </li>
                        </ul>
                        </li>
                     <@endif>




                    


                  
                    
                </ul>
               
            </div>
            
        </nav> 



<main class="py-4">
@yield('content')
</main> 


   <!--
                </div>     
                 <!-- /. ROW  -->           
<script type="text/javascript">

function addcommas(x) {
//remove commas
retVal = x ? parseFloat(x.replace(/,/g, '')) : 0;

//apply formatting
return retVal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
</script>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../../js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../../js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../../js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="../../js/morris/raphael-2.1.0.min.js"></script>
    <script src="../../js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="../../js/custom.js"></script>
    
   
</body>
</html>






















