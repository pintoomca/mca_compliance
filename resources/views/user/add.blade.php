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
    <title>MCA Compliance | User List</title>

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

                                    <div class="card-header">Add New</div>
                                    <div class="card-body">
                                    @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        @foreach ($errors->all() as $message) 
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @endforeach
                                        <form action="{{ url('user/addSubmit') }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input class="au-input au-input--full" type="text" name="fname" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <label>Middel Name</label>
                                    <input class="au-input au-input--full" type="text" name="mname" placeholder="Middel Name">
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="au-input au-input--full" type="text" name="lname" placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="au-input au-input--full" type="password" name="password_confirmation" placeholder="Confirm Password">
                                </div>

                                
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="cat_id" id="cat_id" class="form-control">
                                                        <option value="">Please select</option>
                                                        @foreach ($categories as $cat)
                                                        <option value="{{$cat->cat_id}}">{{$cat->cat_name}}</option>
                                                        @endforeach

                                           
                                                    </select>
                                </div>
                                

                                
                                <div class="row">
                                    <div class="col-6">
                                    <div class="form-group">
                                    <label>Department Name</label>
                                    <select name="dept_id" id="dept_id" class="form-control">
                                                        <option value="">Please select</option>
                                                        @foreach ($departments as $dept)
                                                        <option value="{{$dept->dept_id}}">{{$dept->dept_name}}</option>
                                                        @endforeach

                                           
                                                    </select>
                                </div>
                                    </div>
                                    <div class="col-6">
                                    <div class="form-group">
                                    <label>Location</label>
                                    <select name="location_id" id="location_id" class="form-control">
                                                        <option value="">Please select</option>
                                                        @foreach ($locations as $loc)
                                                        <option value="{{$loc->location_id}}">{{$loc->location_name}}</option>
                                                        @endforeach

                                           
                                                    </select>
                                </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                    <div class="form-group">
                                    <label>Reporting Person</label>
                                    <input class="au-input au-input--full" type="text" name="reporting_user_id" placeholder="Reporting Person">
                                    </div>
                                    </div>
                                    <div class="col-6">
                                    <div class="form-group">
                                    <label>Role</label>
                                    <select name="role_id" id="role_id" class="form-control">
                                                        <option value="">Please select</option>
                                                        @foreach ($roles as $role)
                                                        <option value="{{$role->role_id}}">{{$role->role_name}}</option>
                                                        @endforeach

                                           
                                                    </select>
                                </div>
                                </div>
                               </div>
                               <div class="row">
                                    <div class="col-6">
                                    <div class="form-group">
                                    <label>Email Verify</label>
                                    <select name="is_verified" id="is_verified" class="form-control">
                                                        <option value="">Please select</option>
                                                        <option value="1">Verified</option>
                                                        <option value="0">Unverified</option>
                                           
                                                    </select>
                                    </div>
                                    </div>
                                    <div class="col-6">
                                    <div class="form-group">
                                    <label>Default Status</label>
                                    <select name="status" id="status" class="form-control">
                                                        <option value="">Please select</option>
                                                        <option value="1">Active</option>
                                                        <option value="2">Deactive</option>
                                           
                                                    </select>
                                </div>
                                </div>
                               </div>
                                
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Save</button>

                            </form>
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
