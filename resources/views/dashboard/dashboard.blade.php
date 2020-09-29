            @extends('layout.admin')

            @section('title', 'Compliance Monitoring Dashboard')

            @section('content')
            <div class="main-content loader" style="padding-top:60px !important;">
               <div class="section__content section__content--p30">
                  <div class="container-fluid">
                     <div class="row">
                        <!-- <div class="col-sm-12 text-center" style="padding-top:20px;">
                           <button type="button" class="btn btn-primary_new btn-sm ad-search" id="search_btn_s" onclick="$('.ad-search-form').slideDown();$('#search_btn_s').hide();$('#search_btn_h').show();" style="margin-bottom:10px;"><i class="fa fa-arrow-down"></i>&nbsp; Advance Search</button>
                           <button type="button" style="display:none;" class="btn btn-primary_new btn-sm ad-search" id="search_btn_h" onclick="$('.ad-search-form').slideUp();$('#search_btn_s').show();$('#search_btn_h').hide();" style="margin-bottom:10px;"><i class="fa fa-arrow-up"></i>&nbsp; Hide Search</button>
                        </div> -->
                        <div class="col-sm-12 ad-search-form " style="margin-top:-10px;">
                           <div class="card au-card" style="padding-bottom:10xp;!important">
                              <div class="card-body card-block">
                              @include('dashboard.search')
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="default-tab">
                        <nav>
                           <div class="nav nav-tabs" id="nav-tab" role="tablist">
                              <!-- <a class="nav-item nav-link active show" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" title="Show Cause Notice Trace">SCN</a> -->
                              <a class="nav-item nav-link <?=($_REQUEST['year'] == '2017')?'active':'';?>" id="nav-fy1617-tab" data-toggle="tab" href="{{url('dashboard?year=2017')}}" role="tab" aria-controls="nav-fy1617" aria-selected="false">Compliance FY 2016-17</a>
                              <a class="nav-item nav-link <?=($_REQUEST['year'] == '2018')?'active':'';?>" id="nav-fy1718-tab" data-toggle="tab" href="#nav-fy1718" role="tab" aria-controls="nav-fy1718" aria-selected="false">Compliance FY 2017-18</a>
                              <a class="nav-item nav-link <?=($_REQUEST['year'] == '2019')?'active':'';?>" id="nav-fy1819-tab" data-toggle="tab" href="#nav-fy1819" role="tab" aria-controls="nav-fy1819" aria-selected="false">Compliance FY 2018-19</a>
                              <a class="nav-item nav-link" id="nav-comparative-tab" data-toggle="tab" href="#nav-comparative" role="tab" aria-controls="nav-comparative" aria-selected="false">Comparative</a>
                           </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                           <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="au-card recent-report">
                                       <div class="au-card-inner">
                                          <figure class="highcharts-figure" style="max-width:1200px;">
                                          <div id="container_first"></div>
                                             <div id="container_chart2"></div>
                                          </figure>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="au-card recent-report">
                                       <div class="au-card-inner">
                                          <figure class="highcharts-figure" style="max-width:1200px;">
                                             <div id="container_chart4"></div>
                                          </figure>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="au-card recent-report">
                                       <div class="au-card-inner">
                                          <figure class="highcharts-figure" style="max-width:1200px;">
                                             <div id="container_bubble"></div>
                                          </figure>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="au-card chart-percent-card">
                                       <div class="au-card-inner">
                                          <figure class="highcharts-figure">
                                             <div id="container_balloon"></div>
                                          </figure>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="au-card chart-percent-card">
                                       <div class="au-card-inner">
                                          <figure class="highcharts-figure">
                                             <div id="container_piechart1"></div>
                                          </figure>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="au-card chart-percent-card">
                                       <div class="au-card-inner">
                                          <figure class="highcharts-figure">
                                             <div id="container_combine1"></div>
                                          </figure>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                        <thead class="head-tab-custom text-center">
                                        <tr>
                                                <th width="15%" colspan="6">Provision Wise Notice Status Report </th>
                                            </tr>
                                            <tr>
                                                <th width="15%">Provision</th>
                                                <th width="10%">No Action</th>
                                                <th width="15%">Drop Charges</th>
                                                <th width="20%">Subject to Prosecution</th>
                                                <th width="25%">Further Examination Required</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        @php
                                        $sum1 = 0;
                                        $sum3 = 0;
                                        $sum4 = 0;
                                        $sum5 = 0;
                                        @endphp
                                        @foreach ($notice_status as $rec)
                                            @php
                                            $sum1 +=(isset($rec->c1))?$rec->c1:'0';
                                            $sum3 +=(isset($rec->c3))?$rec->c3:'0';
                                            $sum4 +=(isset($rec->c4))?$rec->c4:'0';
                                            $sum5 +=(isset($rec->c5))?$rec->c5:'0';
                                            @endphp
                                            <tr>
                                                <td>{{ $rec->provision_id}}</td>
                                                <td><a href="{{ url('inspector_wise_notice/list?provision_id=') }}{{ $rec->provision_id}}&year={{$year}}&status=0" target="_blank">{{ (!empty($rec->c1))?$rec->c1:'' }}</td>
                                                <td><a href="{{ url('inspector_wise_notice/list?provision_id=') }}{{ $rec->provision_id}}&year={{$year}}&status=2" target="_blank">{{ (!empty($rec->c3))?$rec->c3:'' }}</td>
                                                <td><a href="{{ url('inspector_wise_notice/list?provision_id=') }}{{ $rec->provision_id}}&year={{$year}}&status=3" target="_blank">{{ (!empty($rec->c4))?$rec->c4:'' }}</td>
                                                <td><a href="{{ url('inspector_wise_notice/list?provision_id=') }}{{ $rec->provision_id}}&year={{$year}}&status=4" target="_blank">{{ (!empty($rec->c5))?$rec->c5:'' }}</td>
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
                           <div class="tab-pane fade" id="nav-fy1617" role="tabpanel" aria-labelledby="nav-fy1617-tab">
                              <p>p2</p>
                           </div>
                           <div class="tab-pane fade" id="nav-fy1718" role="tabpanel" aria-labelledby="nav-fy1718-tab">
                              <p>p3</p>
                           </div>
                           <div class="tab-pane fade" id="nav-fy1819" role="tabpanel" aria-labelledby="nav-fy1819-tab">
                              <p>p4</p>
                           </div>
                           <div class="tab-pane fade" id="nav-comparative" role="tabpanel" aria-labelledby="nav-comparative-tab">
                              <p>p5</p>
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
      Highcharts.chart('container_combine1', {
          title: {
              text: 'Comparative Data of Companies'
          },
          credits: {enabled : false},
          plotOptions: {
              pie: {
                  allowPointSelect: true,
                  cursor: 'pointer',
                  point: {
                          events: {
                              click: function () {

                                  $url =  'company/list?type='+this.series.category;

                                  window.open($url, '_blank');
                              }
                          }
                      },
                  dataLabels: {
                      enabled: true
                  },
                  showInLegend: true
              }
          },
          xAxis: {
              categories: <?php echo json_encode($master_compliance_comparison['comp_class']);?>
          },
          labels: {
              items: [{
                  html: 'Total compliance company',
                  style: {
                      left: '50px',
                      top: '18px',
                      color: ( // theme
                          Highcharts.defaultOptions.title.style &&
                          Highcharts.defaultOptions.title.style.color
                      ) || 'black'
                  }
              }]
          },

          series: [
              {
              type: 'column',
              name: 'Total Company',
              data: <?php echo json_encode($master_compliance_comparison['total_company']);?>
          }, {
              type: 'column',
              name: 'Total Compliance Company',
              data: <?php echo json_encode($master_compliance_comparison['total_compliance_company']);?>
          },{
              type: 'column',
              name: 'Non Compliance Company',
              data: <?php echo json_encode($master_compliance_comparison['total_non_compliance_company']);?>
          }, {
              type: 'pie',
              name: 'Total',
              data: [{
                  name: 'Total Company',
                  y: <?php echo $master_compliance_comparison['total_sum'];?>,
                  color: Highcharts.getOptions().colors[0] // Jane's color
              }, {
                  name: 'Total Compliance Company',
                  y: <?php echo $master_compliance_comparison['compliance_sum'];?>,
                  color: Highcharts.getOptions().colors[0] // Jane's color
              },{
                  name: 'Total Non Compliance Company',
                  y: <?php echo $master_compliance_comparison['non_compliance_sum'];?>,
                  color: Highcharts.getOptions().colors[1] // John's color
              }],
              center: [100, 80],
              size: 100,
              showInLegend: false,
              dataLabels: {
                  enabled: false
              }
          }]
      });
   </script>
   <script Type="text/javascript">
      // $('#container_piechart1').highcharts({
          Highcharts.chart('container_piechart1', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie'
      },
      colors: [
              '#FF5627',
              '#B12C4B',
              '#00B32C',
              '#FFC400',

          ],
      title: {
          text: 'Company Master data Categorisation'
      },
      credits: {enabled : false},
      tooltip: {
          // pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
          pointFormat: ' <b>{series.name}: {point.y} ({point.percentage:.1f}%)</b>'
      },
      accessibility: {
          point: {
              //valueSuffix: '%'
              valueSuffix: '%'
          }
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              point: {
                      events: {
                          click: function () {
                              $url =  'company/list?company_class='+this.name;

                              window.open($url, '_blank');
                          }
                      }
                  },
              dataLabels: {
                  enabled: true
              },
              showInLegend: true
          }
      },
      series: [{
          name: 'Companies',
          colorByPoint: true,
          data : <?php echo json_encode($company_class_data);?>
          // data: [{
          //     name: 'Chrome',
          //     y: 61.41,
          //     sliced: true,
          //     selected: true
          // }, {
          //     name: 'Internet Explorer',
          //     y: 11.84
          // }, {
          //     name: 'Firefox',
          //     y: 10.85
          // }, {
          //     name: 'Edge',
          //     y: 4.67
          // }, {
          //     name: 'Safari',
          //     y: 4.18
          // }, {
          //     name: 'Other',
          //     y: 7.05
          // }]
      }]
      });
   </script>
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

                              $url =  "{{ url('notice_roc/list')}}?year={{$year}}"+'&roc='+this.category;

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
              categories: <?php echo json_encode($roc_wise_email['_names']); ?>,

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
              text: 'RoC wise notice sent : {{$year}}'
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
                  name: 'No. of Companies',
                  type: 'column',
                  data: <?php echo json_encode($roc_wise_email['_count']); ?>,
                  // color: 'rgba(165,170,217,1)',
                  pointPadding: 0.1,
                  // pointPlacement: 0,
                  tooltip: {
                      valueSuffix: ''
                  }
              }]
      });

    //First Chart



    Highcharts.chart('container_first', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Inspectors'
    },
    credits: {enabled : false},
    xAxis: {
        categories: <?php echo json_encode($inspector_names); ?>
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total fruit consumption'
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'gray'
            }
        }
    },
    legend: {
        align: 'right',
        x: -30,
        verticalAlign: 'top',
        y: 25,
        floating: true,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || 'white',
        borderColor: '#CCC',
        borderWidth: 1,
        shadow: false
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
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
            dataLabels: {
                enabled: true
            }
        }
    },
    series: [
    // {
    //     name: 'John',
    //     data: [5, 3, 4, 7, 2]
    // }, {
    //     name: 'Jane',
    //     data: [2, 2, 3, 2, 1]
    // }, {
    //     name: 'Joe',
    //     data: [3, 4, 4, 2, 5]
    // }, {
    //     name: 'Joe1',
    //     data: [3, 4, 4, 2, 5]
    // }, {
    //     name: 'Joe2',
    //     data: [3, 4, 4, 2, 5]
    // }, {
    //     name: 'Joe3',
    //     data: [3, 4, 4, 2, 5]
    // }, {
    //     name: 'Joe4',
    //     data: [3, 4, 4, 2]
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
Highcharts.chart('container_bubble', {

chart: {
    type: 'bubble',
    plotBorderWidth: 1,
    zoomType: 'xy'
},

legend: {
    enabled: false
},
credits: {
            enabled: false
        },
title: {
    text: 'Provision Wise Non Compliance, Notice Sent, Reply Received Report'
},

// subtitle: {
//     text: 'Source: <a href="http://www.euromonitor.com/">Euromonitor</a> and <a href="https://data.oecd.org/">OECD</a>'
// },

// accessibility: {
//     point: {
//         valueDescriptionFormat: '{index}. {point.name}, fat: {point.x}g, sugar: {point.y}g, obesity: {point.z}%.'
//     }
// },

xAxis: {
    gridLineWidth: 1,
    // title: {
    //     text: 'Daily fat intake'
    // },
    labels: {
        format: '{value}'
    },
    // plotLines: [{
    //     color: 'black',
    //     dashStyle: 'dot',
    //     width: 2,
    //     value: 65,
    //     label: {
    //         rotation: 0,
    //         y: 15,
    //         style: {
    //             fontStyle: 'italic'
    //         },
    //         text: 'Safe fat intake 65g/day'
    //     },
    //     zIndex: 3
    // }],
    // accessibility: {
    //     rangeDescription: 'Range: 60 to 100 grams.'
    // }
},

yAxis: {
    startOnTick: false,
    endOnTick: false,
    title: {
        text: ''
    },

    labels: {
        format: '{value}'
    },
    maxPadding: 0.2,
    // plotLines: [{
    //     color: 'black',
    //     dashStyle: 'dot',
    //     width: 2,
    //     value: 50,
    //     label: {
    //         align: 'right',
    //         style: {
    //             fontStyle: 'italic'
    //         },
    //         text: 'Safe sugar intake 50g/day',
    //         x: -10
    //     },
    //     zIndex: 3
    // }],
    accessibility: {
        rangeDescription: ''
    }
},

tooltip: {
    useHTML: true,
    headerFormat: '<table>',
    pointFormat: '<tr><th colspan="2"><h3>{point.name}</h3></th></tr>' +
        '<tr><th>Non Compliance:</th><td>{point.x}</td></tr>' +
        '<tr><th>Notice Sent:</th><td>{point.y}</td></tr>' +
        '<tr><th>Reply Received:</th><td>{point.z}</td></tr>',
    footerFormat: '</table>',
    followPointer: true
},

plotOptions: {
    series: {
        dataLabels: {
            enabled: true,
            format: '{point.name}'
        }
    }
},

series: [{
    data: [
        <?php  foreach($data_nsr as $row){ ?>
            { x: <?=$row->dcount;?>, y: <?=$row->scount;?>, z: <?=$row->rcount;?>, name: 'Provision <?=$row->provision_id;?>', country: '' },
    <?php } ?>
        // { x: 64, y: 82.9, z: 31.3, name: 'NZ', country: '' }
    ]
}]

});
</script>
<script>

    Highcharts.chart('container_balloon', {
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        xAxis: {
            categories:   [141.88],
        },
        series: [
        <?php  foreach($data_overnsr as $row){ ?>
            {
                    type:'pie',
                    zIndex: 3,
                    colors: ['#809bec'],
                    depth: 50,
                    size:200,
                    center: [100, 150],
                    showInLegend: false,
                    y: 0,
                    dataLabels: {
                        enabled:true,
                        distance: -100 ,// Individual distance
                        formatter: function() {
                            return '<b>Non Compliance<br/>' + 'FY 2017' + '<br/></b> Total:'  + this.y ;
                        },
                    },
                    name: 'Total Non Compliance',
                    data: [<?=$row->dcount;?>],
                },
                {
                type:'pie',
                size:200,
                colors: ['#8080ec'],
                depth: 50,
                center: [350, 150],
                showInLegend: false,
                y: 0,
                dataLabels: {
                    enabled:true,
                    distance: -100, // Individual distance
                    formatter: function() {
                        return '<b>Notice Sent<br/> FY 2017' + '<br/></b> Total:'  + this.y ;
                    },
                },
                name: 'Total Notice Sent',
                data: [<?=$row->scount;?>],
            },
            {
                type:'pie',
                colors: ['#9b80ec'],
                center: [600, 150],
                size:200,
                depth: 50,
                showInLegend: false,
                y: 0,
                dataLabels: {
                    enabled:true,
                    distance: -100, // Individual distance
                    formatter: function() {
                        return '<b>Reply Received<br/> FY 2017' + '<br/></b> Total:'  + this.y ;
                    },
                },
                name: 'Total Reply Received',
                data: [<?=$row->rcount;?>],
            }
           <?php } ?>


        ]

    });
</script>
<script>
var user_list = <?php echo json_encode($user_list) ;?>;
$(document).on('change', '#inspector', function(event) {
    $('#roc').find('option').remove();
    $('#roc').append('<option value="">--ALL ROC--</option>');

	$.each(user_list, function(key, value) {

		$('#inspector :selected').each(function(){
			var state1 = $(this).text();

            if(value.Region.toLowerCase() == state1.toLowerCase())
            {
                $('#roc').append($("<option></option>").attr("value",value.rocName).text(value.rocName));
            }
		});


	});

});
</script>
@endsection
