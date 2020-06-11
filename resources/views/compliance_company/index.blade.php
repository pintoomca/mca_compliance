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
                            <div class="col-md-12">

                                <div class="table-responsive table--no-card m-b-30 ">

                                    <table class="table table-borderless table-striped  ">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th colspan="2">Company Detail Information</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>CIN No.</td>
                                                <td>{{ $comp_data->cin }}</td>
                                            </tr>
                                            <tr>
                                                <td>Company Name</td>
                                                <td>{{ $comp_data->Companyname }}</td>
                                            </tr>
                                            <tr>
                                                <td>E-mail Address</td>
                                                <td>{{ $comp_data->comp_email_addr }}</td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td>{{ $comp_data->address }}</td>
                                            </tr>
                                            <tr>
                                                <td>CFI Number</td>
                                                <td>{{ $comp_data->cfi_number }}</td>
                                            </tr>
                                            <tr>
                                                <td>Alert</td>
                                                <td>{{ $comp_data->Alert }}</td>
                                            </tr>
                                            <tr>
                                                <td>Provision</td>
                                                <td>{{ $comp_data->provision_id }}</td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>{{ $comp_data->status }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="table-responsive table--no-card m-b-30 ">

                                    <table class="table table-borderless table-striped  ">
                                    <thead class="thead-dark">
                                            <tr>
                                                <th width="6%">S No.</th>
                                                <th>E-mail Recepient </th>
                                                <th>Ref No.</th>
                                                <!-- <th width="5%">Cfi No.</th> -->
                                                <th>Subject</th>
                                                <th width="15%">Name</th>
                                                <th width="10%">ROC</th>
                                                <th width="8%">E-Mail</th>
                                                <th width="10%">Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $counter = 1;?>
                                        @foreach ($notice_data as $row)
                                        <tr>
                                            <td>{{ $counter++ }}</td>
                                            <td>{{ $row->emai_id_recepient }}</td>
                                            <td>{{ $row->reff_num }}</td>
                                            <!-- <td>{{ $row->cfi_number }}</td> -->
                                            <td>{{ substr($row->subject,0,20) }}...<a href="#info-circle" data-toggle="tooltip" data-placement="top" title="{{ $row->subject }}"><i class="fa fa-info-circle" ></i></a></td>
                                            <td>{{ $row->firstName }} {{ $row->lastName }}</td>
                                            <td>{{ $row->roc_name }}</td>
                                            <td class="text-right"><a href="{{url('compliance_mail/view?id=')}}{{ $row->id }}" target="_blank"><i class="fa fa-envelope"></i></a></td>
                                            <td>{{ $row->mailSentTime }}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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
