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
                                 <div class="col-lg-6">
                                    <div class="au-card recent-report">
                                       <div class="au-card-inner">
                                       <div class="table-responsive ">

                                    <table class="table table-striped">
                                        <thead class="head-tab-custom ">
                                        <tr>
                                                <th width="15%" colspan="6" class="text-center"> Roc Notice Status Report [Inspector : {{$inspector}}] </th>
                                            </tr>
                                            <tr>
                                                <th width="15%">RoC</th>
                                                <th width="10%">No. of Notices</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                        $sum1 = 0;
                                        @endphp
                                        @foreach ($rocData as $rec)
                                            @php
                                            $sum1 +=(isset($rec->c))?$rec->c:'0';
                                            @endphp
                                            <tr>
                                                <td><a href="{{ url('inspector_wise_notice/list?roc=') }}{{ $rec->rocName}}&year={{$year}}&inspector={{$inspector}}" target="_blank">{{ $rec->rocName}}</a></td>
                                                <td><a href="{{ url('inspector_wise_notice/list?roc=') }}{{ $rec->rocName}}&year={{$year}}&inspector={{$inspector}}&status=0" target="_blank">{{ (!empty($rec->c))?$rec->c:'' }}</td>
                                            </tr>

                                        @endforeach

                                        <tr>
                                                <th width="15%">Grand Total</th>
                                                <th width="10%">{{ $sum1  }}</th>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="au-card recent-report">
                                       <div class="au-card-inner">
                                       <div class="table-responsive ">

<table class="table table-striped">
    <thead class="head-tab-custom">
    <tr>
            <th width="15%" colspan="6" class="text-center">  Provision Notices Status Report [Inspector : {{$inspector}}]</th>
        </tr>
        <tr>
            <th width="15%">Provision Name</th>
            <th width="10%">No.of Notices</th>
        </tr>
    </thead>
    <tbody>
    @php
    $sum1 = 0;
    @endphp
    @foreach ($provisionData as $rec)
        @php
        $sum1 +=(isset($rec->c))?$rec->c:'';
        @endphp
        <tr>
            <td><a href="{{ url('inspector_wise_notice/list?provision_id=') }}{{ $rec->provision_id}}&year={{$year}}&inspector={{$inspector}}" target="_blank">{{ $rec->provision_id}}</a></td>
            <td><a href="{{ url('inspector_wise_notice/list?provision_id=') }}{{ $rec->provision_id}}&year={{$year}}&inspector={{$inspector}}&status=0" target="_blank">{{ (!empty($rec->c))?$rec->c:'' }}</td>
        </tr>

    @endforeach

    <tr>
            <th width="15%">Grand Total</th>
            <th width="10%">{{ $sum1  }}</th>
        </tr>

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
