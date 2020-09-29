            @extends('layout.admin')

            @section('title', 'Compliance Monitoring Dashboard')

            @section('content')
            <div class="main-content loader" style="padding-top:90px !important;">
               <div class="section__content section__content--p30">
                  <div class="container-fluid">
                     <div class="row">

                     </div>
                     <div class="default-tab">
                        <div class="tab-content" id="nav-tabContent">
                           <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="au-card recent-report">
                                       <div class="au-card-inner">
                                       <div class="head-chart">Roc Notice Status Report [Inspector : {{$inspector}}]</div>
                                       <div class="table-responsive ">

                                    <table class="table table-striped">
                                        <thead class="head-tab-custom ">
                                            <tr>
                                                <th width="15%">RoC</th>
                                                <?php
                                                $ys =  (int)date('Y')-5;
                                                $ye =  (int)date('Y');
                                                for ($x = $ys; $x <= $ye; $x++) { ?>
                                                    <th width="10%">FY <?=$x;?><br>(Total)</th>
                                                <?php } ?>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($rocData as $rec)
                                            <tr>
                                                <td><a href="{{ url('inspector_wise_notice/list?roc=') }}{{ $rec->rocName}}&year={{$year}}&inspector={{$inspector}}" target="_blank">{{ $rec->rocName}}</a></td>
                                                <?php
                                                $ys =  (int)date('Y')-5;
                                                $ye =  (int)date('Y');
                                                for ($x = $ys; $x <= $ye; $x++) { ?>
                                                    <td><a href="{{ url('inspector_wise_notice/list?roc=') }}{{ $rec->rocName}}&year={{$x}}&inspector={{$inspector}}&status={{$status}}" target="_blank">{{ (!empty($rec->$x))?$rec->$x:'' }}</td>
                                                <?php } ?>

                                            </tr>

                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="au-card recent-report">
                                       <div class="au-card-inner">
                                       <div class="head-chart">Provision Notices Status Report [Inspector : {{$inspector}}]</div>
                                       <div class="table-responsive ">

<table class="table table-striped">
    <thead class="head-tab-custom">
        <tr>
            <th width="15%">Provision Name</th>
            <?php
            $ys =  (int)date('Y')-5;
            $ye =  (int)date('Y');
            for ($x = $ys; $x <= $ye; $x++) { ?>
                <th width="10%">FY <?=$x;?><br>(Total)</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
    @foreach ($provisionData as $rec)
        <tr>
            <td><a href="{{ url('inspector_wise_notice/list?provision_id=') }}{{ $rec->provision_id}}&year={{$year}}&inspector={{$inspector}}" target="_blank">{{ $rec->provision_id}}</a></td>
            <?php
            $ys =  (int)date('Y')-5;
            $ye =  (int)date('Y');
            for ($x = $ys; $x <= $ye; $x++) { ?>
            <td><a href="{{ url('inspector_wise_notice/list?provision_id=') }}{{ $rec->provision_id}}&year={{$x}}&inspector={{$inspector}}&status={{$status}}" target="_blank">{{ (!empty($rec->$x))?$rec->$x:'' }}</td>
            <?php } ?>
        </tr>

    @endforeach

    </tbody>
</table>
</div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
   <!-- Jquery JS-->
   <script src="{{asset('assets/CoolAdmin/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('assets/CoolAdmin/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('assets/CoolAdmin/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('assets/CoolAdmin/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('assets/CoolAdmin/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('assets/CoolAdmin/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('assets/CoolAdmin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('assets/CoolAdmin/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/CoolAdmin/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('assets/CoolAdmin/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('assets/CoolAdmin/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('assets/CoolAdmin/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('assets/CoolAdmin/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{asset('assets/CoolAdmin/js/main.js')}}"></script>
    <script src="{{asset('assets/CoolAdmin/highchart_cms/highcharts.js')}}"></script>
   <script src="{{asset('assets/CoolAdmin/highchart_cms/highcharts-3d.js')}}"></script>
   <script src="{{asset('assets/CoolAdmin/highchart_cms/highcharts-more.js')}}"></script>
   <script src="{{asset('assets/CoolAdmin/highchart_cms/exporting.js')}}"></script>
   <script src="{{asset('assets/CoolAdmin/highchart_cms/export-data.js')}}"></script>
   <script src="{{asset('assets/CoolAdmin/highchart_cms/accessibility.js')}}"></script>
   <script>
   </script>

@endsection
