<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>MCA Compliance | User Edit</title>

    @include('dashboard.header')

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
        @include('dashboard.sidebar')
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
        @include('dashboard.sidebar1')
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
            @include('dashboard.topheader') 
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="row">
                            <div class="col-sm-8"></div>
                                <div class="col-sm-4 text-right">
                                <a href="{{ url('user/list') }}"><button type="button" class="btn btn-primary btn-sm">
                                <i class="fa fa-arrow-left"></i>&nbsp; Back</button></a>
                                            
</div>
</div>
<div class="col-lg-8">
<div class="card">

                                    <div class="card-header">User Edit</div>
                                    <div class="card-body">
                                  
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input class="au-input au-input--full" type="text" value='{{$userDetails->fname}}' name="fname" placeholder="First Name" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Middel Name</label>
                                    <input class="au-input au-input--full" type="text" value='{{$userDetails->mname}}' name="mname" placeholder="Middel Name" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="au-input au-input--full" type="text" value='{{$userDetails->lname}}' name="lname" placeholder="Last Name" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" value='{{$userDetails->email}}' name="email" placeholder="Email" readonly>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" value='' name="password" placeholder="Password" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="au-input au-input--full" type="password" value='' name="password_confirmation" placeholder="Confirm Password" readonly>
                                </div> -->

                                
                                <div class="form-group">
                                    <label>Category</label>

                                                      
                                                        @foreach ($categories as $cat)
                                                            @if($cat->cat_id==$userDetails->cat_id)
                                                            <input class="au-input au-input--full" type="email" value='{{$cat->cat_name}}' name="cat_name" readonly>
                                                            
                                                            @endif
                                                        @endforeach

                                </div>
                                

                                
                                <div class="row">
                                    <div class="col-6">
                                    <div class="form-group">
                                    <label>Department Name</label>
                                    
                                                        @foreach ($departments as $dept)
                                                        @if($dept->dept_id==$userDetails->dept_id)
                                                        <input class="au-input au-input--full" type="email" value='{{$dept->dept_name}}' name="dept_name" readonly>
                                                            
                                                            @endif
                                                        
                                                        @endforeach

                                           
                                                   
                                </div>
                                    </div>
                                    <div class="col-6">
                                    <div class="form-group">
                                    <label>Location</label>
                                    
                                                        @foreach ($locations as $loc)
                                                        @if($loc->location_id==$userDetails->location_id)
                                                        <input class="au-input au-input--full" type="email" value='{{$loc->location_name}}' name="location_id" readonly>
                                                            
                                                            @endif
                                                        @endforeach

                                           
                                                    
                                </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                    <div class="form-group">
                                    <label>Reporting Person</label>
                                    <input class="au-input au-input--full" type="text" value="{{$userDetails->reporting_user_id}}" name="reporting_user_id" placeholder="Reporting Person" readonly>
                                    </div>
                                    </div>
                                    <div class="col-6">
                                    <div class="form-group">
                                    <label>Role</label>
                                    
                                                        @foreach ($roles as $role)
                                                        @if($role->role_id==$userDetails->role_id)
                                                        <input class="au-input au-input--full" type="email" value='{{$role->role_name}}' name="role_id" readonly>
                                                            
                                                            @endif
                                                        @endforeach

                                           
                                </div>
                                </div>
                               </div>
                               <div class="row">
                                    <div class="col-6">
                                    <div class="form-group">
                                    <label>Email Verify</label>
                                    
                                    @if ($userDetails->status == 1)
                                    <input class="au-input au-input--full" type="email" value='Active' name="role_id" readonly>
                                        @else
                                        <input class="au-input au-input--full" type="email" value='Deactive' name="role_id" readonly>
                                    @endif
                                    </div>
                                    </div>
                                    <div class="col-6">
                                    <div class="form-group">
                                    <label>Default Status</label>
                                    @if ($userDetails->status == 1)
                                    <input class="au-input au-input--full" type="email" value='Veryfied' name="role_id" readonly>
                                        @else
                                        <input class="au-input au-input--full" type="email" value='Unverified' name="role_id" readonly>
                                    @endif
                                </div>
                                </div>
                               </div>
              
                                    </div>
                                </div>      
                                
                            </div>
                        
                            </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('dashboard.footer')

</body>

</html>
<!-- end document-->
