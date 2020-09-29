            @extends('layout.admin')

            @section('title', 'Compliance Monitoring Dashboard')

            @section('content')
            <div class="main-content loader" style="padding-top:90px !important;">
               <div class="section__content section__content--p30">
                  <div class="container-fluid">
                     <div class="row">

                     </div>
                     <div class="default-tab">
                       <!-- <nav>
                           <div class="nav nav-tabs" id="nav-tab" role="tablist">
                              <a class="nav-item nav-link active show" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" title="Show Cause Notice Trace">SCN</a>
                              <a class="nav-item nav-link <?=($year == '2017')?'active':'';?>" id="nav-fy1617-tab" data-toggle="tab" href="{{url('inspector-wise-report?year=2017')}}" role="tab" aria-controls="nav-fy1617" aria-selected="false">FY 2016-17</a>
                              <a class="nav-item nav-link <?=($year == '2018')?'active':'';?>" id="nav-fy1718-tab" data-toggle="tab" href="{{url('inspector-wise-report?year=2018')}}" role="tab" aria-controls="nav-fy1718" aria-selected="false">FY 2017-18</a>
                              <a class="nav-item nav-link <?=($year == '2019')?'active':'';?>" id="nav-fy1819-tab" data-toggle="tab" href="{{url('inspector-wise-report?year=2019')}}" role="tab" aria-controls="nav-fy1819" aria-selected="false">FY 2018-19</a>
                              <a class="nav-item nav-link <?=($year == '2020')?'active':'';?>" id="nav-fy1920-tab" data-toggle="tab" href="{{url('inspector-wise-report?year=2020')}}" role="tab" aria-controls="nav-fy1920" aria-selected="false">FY 2019-20</a>
                           </div>
                        </nav> -->
                        <div class="tab-content" id="nav-tabContent">
                           <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                           <div class="row">
                                 <div class="col-lg-12">
                                 <div class="head-chart">Notice Sent Report for Inspector with RoC</div>
                                    <div class="au-card recent-report">

                                       <div class="au-card-inner">

                                       <figure class="highcharts-figure" style="max-width:1200px;">
                                             <div id="container2"></div>
                                          </figure>
                                       </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                 <div class="col-lg-12">
                                 <div class="head-chart">Inspector Wise Notice Sent Report</div>
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

                                    <table class="table table-striped">
                                        <thead class="head-tab-custom">
                                        <tr>
                                                <th width="15%" colspan="6"  class="text-center">Inspector Wise Notices Status Report</th>
                                            </tr>
                                            <tr>
                                                <th width="15%">Inspector</th>
                                                <th width="10%">No Action</th>
                                                <!-- <th width="15%">Notice Sent</th> -->
                                                <th width="15%">Drop Charges</th>
                                                <th width="20%">Subject to Prosecution</th>
                                                <th width="25%">Further Examination Required</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                        $sum1 = 0;
                                        $sum2 = 0;
                                        $sum3 = 0;
                                        $sum4 = 0;
                                        $sum5 = 0;
                                        @endphp
                                        @foreach ($comp_data as $rec)
                                            @php
                                            $sum1 +=$rec->c1;
                                            $sum2 +=$rec->c2;
                                            $sum3 +=$rec->c3;
                                            $sum4 +=$rec->c4;
                                            $sum5 +=$rec->c5;
                                            @endphp
                                            <tr>
                                                <!-- <td><a href="{{ url('inspector-wise-report-step2?inspector=') }}{{ $rec->firstName}} ({{$rec->Region}})&year={{$year}}" target="_blank">{{ $rec->firstName}} ({{ $rec->Region  }})</a></td> -->
                                                <td>{{ $rec->firstName}} ({{ $rec->Region  }})</td>
                                                <td><a href="{{ url('inspector-wise-report-step1?inspector=') }}{{ $rec->firstName}} ({{$rec->Region}})&year={{$year}}&status=0" target="_blank">{{ $rec->c1 }}</td>
                                                <!-- <td><a href="{{ url('inspector-wise-report-step1?inspector=') }}{{ $rec->firstName}} ({{$rec->Region}})&year={{$year}}&status=1" target="_blank">{{ (isset($notice_counts[1]))?$notice_counts[1]:'' }}</td> -->
                                                <td><a href="{{ url('inspector-wise-report-step1?inspector=') }}{{ $rec->firstName}} ({{$rec->Region}})&year={{$year}}&status=2" target="_blank">{{ $rec->c3 }}</td>
                                                <td><a href="{{ url('inspector-wise-report-step1?inspector=') }}{{ $rec->firstName}} ({{$rec->Region}})&year={{$year}}&status=3" target="_blank">{{ $rec->c4}}</td>
                                                <td><a href="{{ url('inspector-wise-report-step1?inspector=') }}{{ $rec->firstName}} ({{$rec->Region}})&year={{$year}}&status=4" target="_blank">{{ $rec->c5}}</td>
                                            </tr>

                                        @endforeach

                                        <tr>
                                                <th width="15%">Grand Total</th>
                                                <th width="10%">{{ $sum1  }}</th>
                                                <!-- <th width="15%">{{ $sum2  }}</th> -->
                                                <th width="15%">{{ $sum3  }}</th>
                                                <th width="20%">{{ $sum4  }}</th>
                                                <th width="25%">{{ $sum5  }}</th>
                                            </tr>

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
                                       <div class="table-responsive ">

                                    <table class="table table-striped">
                                        <thead class="head-tab-custom">
                                        <tr>
                                                <th width="15%" colspan="6" class="text-center">Inspector Wise Total Notice Sent and Reply Received</th>
                                            </tr>
                                            <tr>
                                                <th width="15%">Inspector</th>
                                                <th width="10%">E-mail Sent(Total)</th>
                                                <!-- <th width="15%">Notice Sent</th> -->
                                                <th width="15%">E-mail Reply(Total)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                        $sum1 = 0;
                                        $sum2 = 0;
                                        @endphp
                                        @foreach ($comp_data_sr as $rec)
                                            @php
                                            $sum1 +=(isset($rec->_count_sent))?$rec->_count_sent:'0';
                                            $sum2 +=(isset($rec->_count_reply))?$rec->_count_reply:'0';
                                            @endphp
                                            <tr>
                                                <td>{{ $rec->firstName}} ({{ $rec->fName  }})</td>
                                                <td><a href="{{ url('inspector-wise-report-step3?inspector=') }}{{ $rec->firstName}} ({{$rec->fName}})&year={{$year}}&type=sent" target="_blank">{{ (isset($rec->_count_sent))?$rec->_count_sent:'0' }}</td>
                                                <td><a href="{{ url('inspector-wise-report-step3?inspector=') }}{{ $rec->firstName}} ({{$rec->fName}})&year={{$year}}&type=reply" target="_blank">{{ (isset($rec->_count_reply))?$rec->_count_reply:'0' }}</td>
                                            </tr>

                                        @endforeach

                                        <tr>
                                                <th width="15%">Grand Total</th>
                                                <th width="20%">{{ $sum1  }}</th>
                                                <th width="25%">{{ $sum2  }}</th>
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
        text: ''
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

                              $url =  "{{ url('inspector-wise-report-step1')}}?year={{$year}}"+'&inspector='+this.category+'&action='+this.series.name;

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
<script>
Highcharts.chart('container2', {
    chart: {
        type: 'packedbubble',
        height: '60%'
    },
    title: {
        text: ''
    },
    tooltip: {
        useHTML: true,
        pointFormat: '<b>{point.name}:</b> {point.value}</sub>'
    },
    plotOptions: {
        packedbubble: {
            minSize: '30%',
            maxSize: '120%',
            zMin: 0,
            zMax: 1000,
            layoutAlgorithm: {
                splitSeries: false,
                gravitationalConstant: 0.02
            },
            dataLabels: {
                enabled: true,
                format: '{point.name}',
                filter: {
                    property: 'y',
                    operator: '>',
                    value: 250
                },
                style: {
                    color: 'black',
                    textOutline: 'none',
                    fontWeight: 'normal'
                }
            }
        }
    },
    series: [
        <?php foreach($ins_roc_data as $key=>$value)
        { ?>
        {
        name: '<?=$key;?>',
        data:<?=json_encode($value,JSON_NUMERIC_CHECK);?>
        },
        <?php }
            ?>
    //     {
    //     name: 'Europe',
    //     data: [{
    //         name: 'Germany',
    //         value: 767.1
    //     }, {
    //         name: 'Croatia',
    //         value: 20.7
    //     },
    //     {
    //         name: "Belgium",
    //         value: 97.2
    //     },
    //     {
    //         name: "Turkey",
    //         value: 353.2
    //     }]
    // }
    ]
});
</script>
@endsection
