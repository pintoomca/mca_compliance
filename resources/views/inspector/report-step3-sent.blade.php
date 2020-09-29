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
                                          <figure class="highcharts-figure">
                                             <div id="container_chart4"></div>
                                          </figure>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="au-card chart-percent-card">
                                       <div class="au-card-inner">
                                          <figure class="highcharts-figure">
                                             <div id="container_chart5"></div>
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
                                        <thead class="head-tab-custom text-center">
                                        <tr>
                                                <th width="15%" colspan="6">Inspector : {{$inspector}} => Roc Notice Status Report </th>
                                            </tr>
                                            <tr>
                                                <th width="15%">Inspector</th>
                                                <th width="10%">No Action</th>
                                                <th width="15%">Drop Charges</th>
                                                <th width="20%">Subject to Prosecution</th>
                                                <th width="25%">Further Examination Required</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                        $sum1 = 0;
                                        $sum3 = 0;
                                        $sum4 = 0;
                                        $sum5 = 0;
                                        @endphp
                                        @foreach ($rocData as $rec)
                                            @php
                                            $sum1 +=(isset($rec->c1))?$rec->c1:'0';
                                            $sum3 +=(isset($rec->c3))?$rec->c3:'0';
                                            $sum4 +=(isset($rec->c4))?$rec->c4:'0';
                                            $sum5 +=(isset($rec->c5))?$rec->c5:'0';
                                            @endphp
                                            <tr>
                                                <td><a href="{{ url('inspector_wise_notice/list?roc=') }}{{ $rec->rocName}}&year={{$year}}&inspector={{$inspector}}" target="_blank">{{ $rec->rocName}}</a></td>
                                                <td><a href="{{ url('inspector_wise_notice/list?roc=') }}{{ $rec->rocName}}&year={{$year}}&inspector={{$inspector}}&status=0" target="_blank">{{ (!empty($rec->c1))?$rec->c1:'' }}</td>
                                                <td><a href="{{ url('inspector_wise_notice/list?roc=') }}{{ $rec->rocName}}&year={{$year}}&inspector={{$inspector}}&status=2" target="_blank">{{ (!empty($rec->c3))?$rec->c3:'' }}</td>
                                                <td><a href="{{ url('inspector_wise_notice/list?roc=') }}{{ $rec->rocName}}&year={{$year}}&inspector={{$inspector}}&status=3" target="_blank">{{ (!empty($rec->c4))?$rec->c4:'' }}</td>
                                                <td><a href="{{ url('inspector_wise_notice/list?roc=') }}{{ $rec->rocName}}&year={{$year}}&inspector={{$inspector}}&status=4" target="_blank">{{ (!empty($rec->c5))?$rec->c5:'' }}</td>
                                            </tr>

                                        @endforeach

                                        <tr>
                                                <th width="15%">Grand Total</th>
                                                <th width="10%">{{ $sum1  }}</th>
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
    <thead class="head-tab-custom text-center">
    <tr>
            <th width="15%" colspan="6">Inspector : {{$inspector}} => Provision Wise Notice Status Report </th>
        </tr>
        <tr>
            <th width="15%">Provision Name</th>
            <th width="10%">No Action</th>
            <th width="15%">Drop Charges</th>
            <th width="20%">Subject to Prosecution</th>
            <th width="25%">Further Examination Required</th>
        </tr>
    </thead>
    <tbody>
    @php
    $sum1 = 0;
    $sum3 = 0;
    $sum4 = 0;
    $sum5 = 0;
    @endphp
    @foreach ($provisionData as $rec)
        @php
        $sum1 +=(isset($rec->c1))?$rec->c1:'';
        $sum3 +=(isset($rec->c3))?$rec->c3:'';
        $sum4 +=(isset($rec->c4))?$rec->c4:'';
        $sum5 +=(isset($rec->c5))?$rec->c5:'';
        @endphp
        <tr>
            <td><a href="{{ url('inspector_wise_notice/list?provision_id=') }}{{ $rec->provision_id}}&year={{$year}}&inspector={{$inspector}}" target="_blank">{{ $rec->provision_id}}</a></td>
            <td><a href="{{ url('inspector_wise_notice/list?provision_id=') }}{{ $rec->provision_id}}&year={{$year}}&inspector={{$inspector}}&status=0" target="_blank">{{ (!empty($rec->c1))?$rec->c1:'' }}</td>
            <td><a href="{{ url('inspector_wise_notice/list?provision_id=') }}{{ $rec->provision_id}}&year={{$year}}&inspector={{$inspector}}&status=2" target="_blank">{{ (!empty($rec->c3))?$rec->c3:'' }}</td>
            <td><a href="{{ url('inspector_wise_notice/list?provision_id=') }}{{ $rec->provision_id}}&year={{$year}}&inspector={{$inspector}}&status=3" target="_blank">{{ (!empty($rec->c4))?$rec->c4:'' }}</td>
            <td><a href="{{ url('inspector_wise_notice/list?provision_id=') }}{{ $rec->provision_id}}&year={{$year}}&inspector={{$inspector}}&status=4" target="_blank">{{ (!empty($rec->c5))?$rec->c5:'' }}</td>
        </tr>

    @endforeach

    <tr>
            <th width="15%">Grand Total</th>
            <th width="10%">{{ $sum1  }}</th>
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
 $('#container_chart4').highcharts({

chart: {
    type: 'column',
  //   options3d: {
  //       enabled: true,
  //       alpha: 15,
  //       beta: 15,
  //       depth: 50,
  //       viewDistance: 25
  //   }
},
// colors: [
//     '#FFC400',
//     '#FF5627',
//     '#B12C4B',
//     '#00B32C',
// ],
plotOptions: {
    series: {
        cursor: 'pointer',
        colorByPoint: true,
        point: {
            events: {
                click: function () {
                    //location.href = 'rangespent.php?year=FY+2016-17&category='+this.category;

                    $url =  "{{ url('inspector_wise_notice/list')}}?year={{$year}}&inspector={{$inspector}}"+'&roc='+this.category;

                    window.open($url, '_blank');
                }
            }
        },
        dataLabels: {
            enabled: true,
            style: {
                textOutline: false,
            },
        },
    },
    column: {
        grouping: false,
        shadow: false,
        borderWidth: 0
    }
},
xAxis: {
    title:{text:'RoC Names'},
    categories: <?php echo json_encode($roc_data['_name']); ?>,

},
legend: {
    enabled : false,
    formatter: function() {
        var sliceIndex = this.point.index;
        var sliceName = this.series.chart.axes[0].categories[sliceIndex];

        return '<b>' + this.x + '</b> ' ;
    },

},
title: {
    text: 'RoC Notice Sent Report For FY {{$year}} and Inspector( {{$inspector}} )'
},
credits: {enabled : false},

subtitle: {
    text: ''
},
yAxis: {
    labels: {
        formatter: function () {
            return this.value;
        }
    },
    min: 0,
    title: {
        text: 'No. of Companies'
    }
},
tooltip: {
    shared: true
},
series: [
    {
        name: 'No. of Notices',
        type: 'column',
        data: <?php echo json_encode($roc_data['_count']); ?>,
        // color: 'rgba(165,170,217,1)',
        pointPadding: 0.1,
        // pointPlacement: 0,
        tooltip: {
            valueSuffix: ''
        }
    }]
});

$('#container_chart5').highcharts({

chart: {
    type: 'column',
  //   options3d: {
  //       enabled: true,
  //       alpha: 15,
  //       beta: 15,
  //       depth: 50,
  //       viewDistance: 25
  //   }
},
// colors: [
//     '#FFC400',
//     '#FF5627',
//     '#B12C4B',
//     '#00B32C',
// ],
plotOptions: {
    series: {
        cursor: 'pointer',
        colorByPoint: true,
        point: {
            events: {
                click: function () {
                    //location.href = 'rangespent.php?year=FY+2016-17&category='+this.category;

                    $url =  "{{ url('inspector_wise_notice/list')}}?year={{$year}}&inspector={{$inspector}}"+'&provision='+this.category;

                    window.open($url, '_blank');
                }
            }
        },
        dataLabels: {
            enabled: true,
            style: {
                textOutline: false,
            },
        },
    },
    column: {
        grouping: false,
        shadow: false,
        borderWidth: 0
    }
},
xAxis: {
    title:{text:'Provisions'},
    categories: <?php echo json_encode($provision_data['_provision']); ?>,

},
legend: {
    enabled : false,
    formatter: function() {
        var sliceIndex = this.point.index;
        var sliceName = this.series.chart.axes[0].categories[sliceIndex];

        return '<b>' + this.x + '</b> ' ;
    },

},
title: {
    text: 'Provision Notice Sent Report For FY {{$year}} and Inspector( {{$inspector}} )'
},
credits: {enabled : false},

subtitle: {
    text: ''
},
yAxis: {
    labels: {
        formatter: function () {
            return this.value;
        }
    },
    min: 0,
    title: {
        text: 'No. of Notices'
    }
},
tooltip: {
    shared: true
},
series: [
    {
        name: 'No. of Notices',
        type: 'column',
        data: <?php echo json_encode($provision_data['_count']); ?>,
        // color: 'rgba(165,170,217,1)',
        pointPadding: 0.1,
        // pointPlacement: 0,
        tooltip: {
            valueSuffix: ''
        }
    }]
});
   </script>

@endsection
