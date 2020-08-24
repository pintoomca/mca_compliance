            @extends('layout.admin')

            @section('title', 'Compliance Monitoring Dashboard')

            @section('content')
            <div class="main-content loader" style="padding-top:90px !important;">
               <div class="section__content section__content--p30">
                  <div class="container-fluid">
                     <div class="row">

                     </div>
                     <div class="default-tab">
                     <nav>
                           <div class="nav nav-tabs" id="nav-tab" role="tablist">
                              <!-- <a class="nav-item nav-link active show" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" title="Show Cause Notice Trace">SCN</a> -->
                              <a class="nav-item nav-link <?=($year == '2017')?'active':'';?>" id="nav-fy1617-tab" data-toggle="tab" href="{{url('dashboard?year=2017')}}" role="tab" aria-controls="nav-fy1617" aria-selected="false">FY 2016-17</a>
                           </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                           <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="au-card recent-report">
                                       <div class="au-card-inner">
                                       <div class="table-responsive ">

                                    <table class="table table-striped">
                                        <thead class="head-tab-custom text-center">
                                        <tr>
                                                <th width="15%" colspan="6">Inspector Wise Notice Sent Report</th>
                                            </tr>
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
                                            $status =explode(",",$rec->status);
                                            @endphp
                                            <tr>
                                                <td><a href="{{ url('inspector_wise_notice/list?inspector=') }}{{ $rec->firstName}} ({{$rec->fName}})&year={{$year}}" target="_blank">{{ $rec->firstName}} ({{ $rec->fName  }})</a></td>
                                                <td><a href="{{ url('inspector_wise_notice/list?inspector=') }}{{ $rec->firstName}} ({{$rec->fName}})&year={{$year}}&status={{(isset($status[0]))?$status[0]:''}}" target="_blank">{{ (isset($notice_counts[0]))?$notice_counts[0]:'' }}</td>
                                                <td><a href="{{ url('inspector_wise_notice/list?inspector=') }}{{ $rec->firstName}} ({{$rec->fName}})&year={{$year}}&status={{(isset($status[1]))?$status[1]:''}}" target="_blank">{{ (isset($notice_counts[1]))?$notice_counts[1]:'' }}</td>
                                                <td><a href="{{ url('inspector_wise_notice/list?inspector=') }}{{ $rec->firstName}} ({{$rec->fName}})&year={{$year}}&status={{(isset($status[2]))?$status[2]:''}}" target="_blank">{{ (isset($notice_counts[2]))?$notice_counts[2]:'' }}</td>
                                                <td><a href="{{ url('inspector_wise_notice/list?inspector=') }}{{ $rec->firstName}} ({{$rec->fName}})&year={{$year}}&status={{(isset($status[3]))?$status[3]:''}}" target="_blank">{{ (isset($notice_counts[3]))?$notice_counts[3]:'' }}</td>
                                                <td><a href="{{ url('inspector_wise_notice/list?inspector=') }}{{ $rec->firstName}} ({{$rec->fName}})&year={{$year}}&status={{(isset($status[4]))?$status[4]:''}}" target="_blank">{{ (isset($notice_counts[4]))?$notice_counts[4]:'' }}</td>
                                            </tr>

                                        @endforeach



                                        </tbody>
                                    </table>
                                </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
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
        text: 'Inspector Wise Notice Sent Report'
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
        series: {
                  cursor: 'pointer',
                  point: {
                      events: {
                          click: function () {
                              //location.href = 'rangespent.php?year=FY+2016-17&category='+this.category;

                              $url =  "{{ url('inspector_wise_notice/list')}}?year={{$year}}"+'&inspector='+this.category+'&action='+this.series.name;

                              window.open($url, '_blank');
                          }
                      }
                  },
              },
        column: {
            stacking: 'normal',
            depth: 40
        },

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
