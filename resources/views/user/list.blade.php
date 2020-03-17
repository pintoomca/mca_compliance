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
                            <div class="col-sm-8">
                                <div class="card">
                                    <div class="card-body card-block">
                                        <form class="form-header" action="" method="POST">
                                            <input class="au-input col-sm-6" type="text" name="search" placeholder="Search for datas &amp; reports...">
                                            <button class="au-btn--submit" type="submit"><i class="zmdi zmdi-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-4 text-right">
                                            <a href="{{ url('user/add') }}"><button type="button" class="btn btn-success btn-sm">
                                            <i class="fa fa-plus-circle"></i>&nbsp; Add New</button></a>
</div>
</div>
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
                                <div class="table-responsive table--no-card m-b-30">
                                
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th width="5%"><label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label></th>
                                                <th width="20%">Name</th>
                                                <th width="20%">Email</th>
                                                <th width="5%" class="text-right">Role</th>
                                                <th width="15%" class="text-right">Department</th>
                                                <th width="15%" class="text-right">Location</th>
                                                <th width="5%" class="text-right">Status</th>
                                                <th width="15%" class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($userData as $user)

                                            <tr>
                                                <td><label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label></td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td class="text-right">{{ $user->role_name }}</td>
                                                <td class="text-right">{{ $user->dept_name }}</td>
                                                <td class="text-right">{{ $user->location_name }}</td>
                                                <td class="text-right">
                                                <a href="{{ url('user/change-status/'.$user->id) }}">
                                                    @if ($user->status == 1)
                                                    <button type="button" class="btn btn-success btn-sm">
                                            Active</button>
                                                        @else
                                                        <button type="button" class="btn btn-danger btn-sm">
                                            Deactive</button>
                                                    @endif
                                                    </a>
                                                    </td>
                                                <td class="text-right"><div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Send">
                                                            <i class="zmdi zmdi-mail-send"></i>
                                                        </button>
                                                        <a href="{{ url('user/view/'.$user->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                                        <i class="fa fa-eye"></i>
                                                        </button></a>
                                                        <a href="{{ url('user/edit/'.$user->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button></a>
                                                        <a href="{{ url('user/delete/'.$user->id) }}">
                                                        <button class="item close" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        </a>
                                                    </div>
                                                    </td>
                                            </tr>
                                            
                                        @endforeach
                                    
                                        
                                         
                                        </tbody>
                                    </table>
                                    {{ $userData->links() }}
                                    <!-- <div class="user-data__footer">
                                        <button class="au-btn au-btn-load">load more</button>
                                    </div> -->
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
<script>
    $('.close').click(function(){
        var checkstr =  confirm('are you sure you want to delete this?');
        if(checkstr == true){
        // do your code
        }else{
        return false;
        }
    });
</script>
</body>

</html>
<!-- end document-->
