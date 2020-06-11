 <?php //echo "Satya";die; ?>
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
    <title>MCA Compliance | Notice List</title>

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
                                <div class="card" style="margin-top:-35px; margin-bottom:5px;">
                                    <div class="card-body card-block">
                                    <form class="form-header" action="{{url('provision_wise_notice/list')}}" method="GET">
                                            <input class="au-input col-sm-6" type="text" name="searchKey"  value="<?=$searchKey;?>"
                                            placeholder="Search for datas &amp; reports..." onkeyup = " ($(this).val() === '') ? this.form.submit() : '';">
                                            <input type="hidden" name="year" value="<?=$year;?>">
                                            <button class="au-btn--submit" type="submit"><i class="zmdi zmdi-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-4">
                                <div class="card" style="margin-top:-35px; margin-bottom:5px;">
                                    <div class="card-body card-block">
                                    <button type="button" class="btn btn-outline-primary btn-lg active">Total Notice: <?=$total;?></button>
                                    </div>
                                </div>
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
                                <div class="table-responsive table--no-card m-b-30 ">

                                    <table class="table table-borderless table-striped  ">
                                        <thead class="thead-dark">
                                            <tr>
                                                <!-- <th width="5%"><label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label></th> -->
                                                <th width="10%">S.No.</th>
                                                <th width="20%">CIN</th>
                                                <th width="40%">Company Name</th>
                                                <th width="10%" class="text-right">FY</th>
                                                <th width="10%" class="text-right">Action</th>
                                               <!--   <th width="15%" class="text-right">Address</th>
                                               <th width="5%" class="text-right">Status</th>
                                                <th width="15%" class="text-right">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($notice_data as $user)

                                            <tr>
                                                <!-- <td><label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label></td> -->
                                                <td>{{ $counter++ }}</td>
                                                <td>{{ $user->cin }}</td>
                                                <td>{{ $user->company_name }}</td>
                                                <td class="text-right">{{ $user->YearOfFilling }}</td>
                                                <td class="text-right"><a href="{{url('compliance_company/view?cin=')}}{{ $user->cin }}&year={{ $year }}" target="_blank"><i class="fa fa-table"></i></a></td>
                                            </tr>

                                        @endforeach



                                        </tbody>
                                    </table>
                                </div>
                                {{ $notice_data->appends([])->links() }}
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
