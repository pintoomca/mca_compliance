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
    <title>MCA Compliance | Company Detail</title>

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
                                                <td>CIN</td>
                                                <td>{{ $comp_data->CIN }}</td>
                                            </tr>
                                            <tr>
                                                <td>CIN GUID</td>
                                                <td>{{ $comp_data->CIN_GUID }}</td>
                                            </tr>
                                            <tr>
                                                <td>E-mail Address</td>
                                                <td>{{ $comp_data->EMAIL_ADDR }}</td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td>{{ $comp_data->ADDR_LINE1 }} {{ $comp_data->ADDR_LINE2 }}<br>
                                                Post Code : {{ $comp_data->POSTALCODE }}<br>
                                                City : {{ $comp_data->CITY_1 }}<br>
                                                Region : {{ $comp_data->REGION }}<br>
                                                Country : {{ $comp_data->COUNTRY }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Present Address</td>
                                                <td>{{ $comp_data->PRSNT_ADDR_LINE1 }} {{ $comp_data->PRSNT_ADDR_LINE2 }}<br>
                                                Post Code : {{ $comp_data->PRSNT_POST_CODE }}<br>
                                                District : {{ $comp_data->DISTRICT_CODE }}<br>
                                                Tehsil : {{ $comp_data->TEHSIL }}<br>
                                                City : {{ $comp_data->PRSNT_ADDR_CITY1 }}<br>
                                                Region : {{ $comp_data->PRSNT_ADD_REGION }}<br>
                                                Country : {{ $comp_data->PRSNT_AD_COUNTRY }}<br>
                                                Telephone : {{ $comp_data->TELEPHONE_NUMBER }}<br>
                                                Fax Number : {{ $comp_data->FAX_NUMBER }}<br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ROC</td>
                                                <td>{{ $comp_data->ROC_CODE }}</td>
                                            </tr>
                                            <tr>
                                                <td>Partner</td>
                                                <td>{{ $comp_data->PARTNER }}</td>
                                            </tr>
                                            <tr>
                                                <td>Class</td>
                                                <td>{{ $comp_data->COMPANY_CLASS }}</td>
                                            </tr>
                                            <tr>
                                                <td>No. of Auditors</td>
                                                <td>{{ $comp_data->NUM_AUDITORS }}</td>
                                            </tr>
                                            <tr>
                                                <td>No. of Directors</td>
                                                <td>{{ $comp_data->NUM_OF_DIRECTOR }}</td>
                                            </tr>
                                            <tr>
                                                <td>Category</td>
                                                <td>{{ $comp_data->COMPANY_SUBCAT }}</td>
                                            </tr>
                                            <tr>
                                                <td>Type</td>
                                                <td>{{ $comp_data->TYPE_OF_COMPANY }}</td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>{{ $comp_data->COMPANY_STATUS }}</td>
                                            </tr>

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
