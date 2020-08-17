            @extends('layout.admin')

            @section('title', 'Compliance Monitoring Dashboard')

            @section('content')
            <div class="main-content loader" style="padding-top:60px !important;">
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
                                          <figure class="highcharts-figure" style="max-width:1200px;">
                                             <div id="container_chart1"></div>
                                          </figure>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="au-card recent-report">
                                       <div class="au-card-inner">
                                       <div class="table-responsive ">

                                    <table class="table table-borderless table-striped  ">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th width="15%">Inspector</th>
                                                <th width="10%">No Action</th>
                                                <th width="15%">Notice Sent</th>
                                                <th width="15%">Drop Charges</th>
                                                <th width="20%">Subject to Prosecution</th>
                                                <th width="25%">Further Examination Required</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($comp_data as $rec)
                                            @php
                                            $notice_counts =explode(",",$rec->cnt);
                                            $meta_names =explode(",",$rec->action);
                                            @endphp
                                            <tr>
                                                <td>{{ $rec->firstName}} ({{ $rec->fName  }})</td>
                                                <td>{{ (isset($notice_counts[0]))?$notice_counts[0]:'0' }}</td>
                                                <td>{{ (isset($notice_counts[1]))?$notice_counts[1]:'0' }}</td>
                                                <td>{{ (isset($notice_counts[2]))?$notice_counts[2]:'0' }}</td>
                                                <td>{{ (isset($notice_counts[3]))?$notice_counts[3]:'0' }}</td>
                                                <td>{{ (isset($notice_counts[4]))?$notice_counts[4]:'0' }}</td>
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
Highcharts.chart('container_chart1', {
    chart: {
        type: 'column',
        // options3d: {
        //     enabled: true,
        //     alpha: 15,
        //     beta: 15,
        //     viewDistance: 25,
        //     depth: 40
        // }
    },

    title: {
        text: 'Inspector Wise report'
    },

    xAxis: {
        categories: <?php echo json_encode($inspector_names); ?>,
        labels: {
            skew3d: true,
            style: {
                fontSize: '16px'
            }
        }
    },

    yAxis: {
        allowDecimals: false,
        min: 0,
        title: {
            text: 'Number of companies',
            skew3d: true
        }
    },

    tooltip: {
        headerFormat: '<b>{point.key}</b><br>',
        pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y} / {point.stackTotal}'
    },

    plotOptions: {
        column: {
            stacking: 'normal',
            depth: 40
        }
    },

    series: [
    //     {
    //     name: 'John',
    //     data: [5, 3, 4, 7, 2],
    //     stack: 'male'
    // }, {
    //     name: 'Joe',
    //     data: [3, 4, 4, 2, 5],
    //     stack: 'male'
    // }, {
    //     name: 'Jane',
    //     data: [2, 5, 6, 2, 1],
    //     stack: 'female'
    // }, {
    //     name: 'Janet',
    //     data: [3, 0, 4, 4, 3],
    //     stack: 'female'
    // }
    <?php  foreach($meta_name as $k=>$v){ ?>
      {
      name: '<?php echo $k; ?>',
      data: <?php echo json_encode($v,JSON_NUMERIC_CHECK); ?>
      },
    <?php } ?>
]
});
   </script>

@endsection
