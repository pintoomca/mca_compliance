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
                              <div class="card-body card-block" >
                                 <form class="form-horizontal" action="{{url('company/list')}}" method="GET" target="_blank">
                                    <div class="row form-group">
                                       <div class="col-4">
                                          <input type="text" id="compname" name="compname" placeholder="Enter Company name or CIN" class="form-control">
                                       </div>
                                       <div class="col-4">
                                          <select name="LISTED_FLAG" id="LISTED_FLAG" class="form-control">
                                             <option value="">Listing Status</option>
                                             <option value="Listed">Listed</option>
                                             <option value="Unlisted">Unlisted</option>
                                          </select>
                                       </div>
                                       <div class="col-4">
                                          <select name="COMPANY_STATUS" id="COMPANY_STATUS" class="form-control">
                                             <option value="">Company Status</option>
                                             <option value="ACTV">Active</option>
                                             <option value="STOF">Strike Off</option>
                                             <option value="DISD">Disolved</option>
                                             <option value="AMAL">Amalgamation</option>
                                             <option LIQD="LIQD">Liquidation</option>
                                             <option value="DRMT">Dormant</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="row form-group">
                                       <div class="col-4">
                                          <select name="COMPANY_CLASS" id="COMPANY_CLASS" class="form-control">
                                             <option value="">Company Class</option>
                                             <option value="Public">Public</option>
                                             <option value="Private">Private</option>
                                             <option value="Private(One Person Company)">Private(One Person Company)</option>
                                          </select>
                                       </div>
                                       <div class="col-4">
                                          <select name="COMPANY_SUBCAT" id="COMPANY_SUBCAT" class="form-control">
                                             <option value="">Sub Category</option>
                                             <option value="Non-govt company">Non-govt company</option>
                                             <option value="Guarantee and Association comp">Guarantee and Association company</option>
                                             <option value="State Govt company">State Govt company</option>
                                             <option value="Union Govt company">Union Govt company</option>
                                             <option value="Subsidiary of Foreign Company">Subsidiary of Foreign Company</option>
                                          </select>
                                       </div>
                                       <div class="col-4">
                                          <button type="submit" class="btn btn-primary_new btn-md col-sm-4"><i class="fa fa-search"></i>Search</button>
                                          <button type="reset" class="btn btn-primary_new btn-md col-sm-4">Reset</button>
                                       </div>
                                    </div>
                                 </form>
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
                                 <div class="col-lg-6">
                                    <div class="au-card recent-report">
                                       <div class="au-card-inner">
                                          <figure class="highcharts-figure">
                                             <div id="container_chart1"></div>
                                          </figure>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="au-card chart-percent-card">
                                       <div class="au-card-inner">
                                          <figure class="highcharts-figure">
                                             <div id="container_chart3"></div>
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
                                       <table class="table table-borderless" style="background-color:#fff;">
                                          <thead>
                                             <tr class="table-primary">
                                                <th class="text-center">Provision</th>
                                                <?php foreach($notice_status['notice_actions'] as $v){?>
                                                <th class="text-center"><?php echo $v?></th>
                                                <?php } ?>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php
                                            foreach($notice_status['notice_counts'] as $k=>$v){ ?>
                                             <tr>
                                                <td class="text-center table-secondary"><?=$k;?></td>
                                                <td class="text-center">
                                                   <div class="text-center">
                                                      <span>
                                                      <?php if(isset($v[1])){ ?>
                                                      <a href="{{ url('notice/list?provision_id='.$k.'&status=1') }}&year={{$year}}" target="_blank"><?php echo $v[1];?></a>
                                                      <?php } else { echo '-'; } ?>
                                                      </span>
                                                   </div>
                                                </td>
                                                <td class="text-center  table-success">
                                                   <div class="text-center">
                                                      <span>
                                                      <?php if(isset($v[2])){ ?>
                                                      <a href="{{ url('notice/list?provision_id='.$k.'&status=2') }}&year={{$year}}" target="_blank"><?php echo $v[2];?></a>
                                                      <?php } else { echo '-'; } ?>
                                                      </span>
                                                   </div>
                                                </td>
                                                <td class="text-center table-info">
                                                   <div class="text-center">
                                                      <span>
                                                      <?php if(isset($v[3])){ ?>
                                                      <a href="{{ url('notice/list?provision_id='.$k.'&status=3') }}&year={{$year}}" target="_blank"><?php echo $v[3];?></a>
                                                      <?php } else { echo '-'; } ?>
                                                      </span>
                                                   </div>
                                                </td>
                                                <td class="text-center table-danger">
                                                   <div class="text-center">
                                                      <span>
                                                      <?php if(isset($v[4])){ ?>
                                                      <a href="{{ url('notice/list?provision_id='.$k.'&status=3') }}&year={{$year}}" target="_blank"><?php echo $v[4];?></a>
                                                      <?php } else { echo '-'; } ?>
                                                      </span>
                                                   </div>
                                                </td>
                                                <td class="text-center table-warning">
                                                   <div class="text-center">
                                                      <span>
                                                      <?php if(isset($v[0])){ ?>
                                                      <a href="{{ url('notice/list?provision_id='.$k.'&status=0') }}&year={{$year}}" target="_blank"><?php echo $v[0];?></a>
                                                      <?php } else { echo '-'; } ?>
                                                      </span>
                                                   </div>
                                                </td>
                                             </tr>
                                             <?php } ?>
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
      Highcharts.chart('container_chart1', {

      title: {
      text: 'Provision Wise Total Companies'
      },
      credits: {enabled : false},
      // subtitle: {
      //     text: 'Source: thesolarfoundation.com'
      // },

      yAxis: {
      title: {
          text: 'Number of Companies'
      }
      },

      xAxis: {
          categories: <?php echo json_encode($provision_wise_data['_years']); ?>
      },

      legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle'
      },

      plotOptions: {
      series: {
          cursor: 'pointer',
          colorByPoint: true,
                  point: {
                      events: {
                          click: function () {
                              //location.href = 'rangespent.php?year=FY+2016-17&category='+this.category;
                              $url =  "{{ url('provision_wise_company/list')}}?provisionId="+this.series.name+'&year='+this.category;

                              window.open($url, '_blank');
                          }
                      }
                  },
          label: {
              connectorAllowed: false
          },
          pointStart: 2017
      }
      },

      series: [
      //     {
      //     name: 'Installation',
      //     data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
      // }, {
      //     name: 'Manufacturing',
      //     data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
      // }, {
      //     name: 'Sales & Distribution',
      //     data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
      // }, {
      //     name: 'Project Development',
      //     data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
      // }, {
      //     name: 'Other',
      //     data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
      // }
      <?php  foreach($provision_wise_data['_names'] as $name){ ?>
      {
      name: '<?php echo $name; ?>',
      data: <?php echo json_encode($provision_wise_data['_count'][$name]); ?>
      },
      <?php } ?>
      ],

      responsive: {
      rules: [{
          condition: {
              maxWidth: 500
          },
          chartOptions: {
              legend: {
                  layout: 'horizontal',
                  align: 'center',
                  verticalAlign: 'bottom'
              }
          }
      }]
      }

      });
   </script>
   <script>
      Highcharts.chart('container_chart3', {

      title: {
      text: 'Provision Wise Total Email Sent'
      },
      credits: {enabled : false},
      // subtitle: {
      //     text: 'Source: thesolarfoundation.com'
      // },

      yAxis: {
      title: {
          text: 'Number of Emails'
      }
      },

      xAxis: {
          categories: <?php echo json_encode($provision_wise_email['_years']); ?>
      },

      legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle'
      },

      plotOptions: {
      series: {
          cursor: 'pointer',
          colorByPoint: true,
                  point: {
                      events: {
                          click: function () {
                              //location.href = 'rangespent.php?year=FY+2016-17&category='+this.category;
                              $url =  "{{ url('provision_wise_notice/list')}}?provisionId="+this.series.name+'&year='+this.category;

                              window.open($url, '_blank');
                          }
                      }
                  },
          label: {
              connectorAllowed: false
          },
          pointStart: 2017
      }
      },

      series: [

      <?php  foreach($provision_wise_email['_names'] as $name){ ?>
      {
      name: '<?php echo $name; ?>',
      data: <?php echo json_encode($provision_wise_email['_count'][$name]); ?>
      },
      <?php } ?>
      ],

      responsive: {
      rules: [{
          condition: {
              maxWidth: 500
          },
          chartOptions: {
              legend: {
                  layout: 'horizontal',
                  align: 'center',
                  verticalAlign: 'bottom'
              }
          }
      }]
      }

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

@endsection
