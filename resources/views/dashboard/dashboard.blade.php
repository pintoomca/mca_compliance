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
    <title>Dashboard</title>
    @include('dashboard.header');
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
        @include('dashboard.sidebar');
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
        @include('dashboard.sidebar1'); 
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
            @include('dashboard.topheader'); 
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                    <div class="default-tab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active show" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" title="Show Cause Notice Trace">SCN</a>
                                <a class="nav-item nav-link" id="nav-fy1617-tab" data-toggle="tab" href="#nav-fy1617" role="tab" aria-controls="nav-fy1617" aria-selected="false">Compliance FY 2016-17</a>
                                <a class="nav-item nav-link" id="nav-fy1718-tab" data-toggle="tab" href="#nav-fy1718" role="tab" aria-controls="nav-fy1718" aria-selected="false">Compliance FY 2017-18</a>
                                <a class="nav-item nav-link" id="nav-fy1819-tab" data-toggle="tab" href="#nav-fy1819" role="tab" aria-controls="nav-fy1819" aria-selected="false">Compliance FY 2018-19</a>
                                <a class="nav-item nav-link" id="nav-comparative-tab" data-toggle="tab" href="#nav-comparative" role="tab" aria-controls="nav-comparative" aria-selected="false">Comparative</a>
                            </div>
                        </nav>
                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                            <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row">
                            <div class="col-lg-12">
                            <!-- <h2 class="title-1 m-b-25">Notice Status</h2> -->
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                            <?php foreach($notice_status as $k=>$v){?>
                                                <th class="text-center"><?php echo $k?></th>
                                            <?php } ?>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <?php foreach($notice_status as $k=>$v){?>
                                                
                                            <td class="text-left">
                                            <?php foreach($v as $val){?>
                                            <div class="rounded shadow-sm text-justify" style="margin-top:10px;min-height:75px; color:black; background-color:#f7eca6; padding:10px; "><span><strong>Provision :</strong> <?php echo $val['provision'];?> </span><br>
                                            <span><strong>Total :</strong> <?php echo $val['_count'];?></span></div>
                                            <?php } ?>
                                            </td>
                                            
                                            <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="au-card recent-report">
                                    <div class="au-card-inner">
                                    <figure class="highcharts-figure">
                                     <div id="container_chart2"></div>
                                     </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card recent-report">
                                    <div class="au-card-inner">
                                    <figure class="highcharts-figure">
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
            <!-- END MAIN CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    @include('dashboard.footer');

</body>
<script src="{{asset('assets/CoolAdmin/highchart_cms/highcharts.js')}}"></script>
<script src="{{asset('assets/CoolAdmin/highchart_cms/highcharts-3d.js')}}"></script>
<script src="{{asset('assets/CoolAdmin/highchart_cms/highcharts-more.js')}}"></script>
<script src="{{asset('assets/CoolAdmin/highchart_cms/exporting.js')}}"></script>
<script src="{{asset('assets/CoolAdmin/highchart_cms/export-data.js')}}"></script>
<script src="{{asset('assets/CoolAdmin/highchart_cms/accessibility.js')}}"></script>
<script>
Highcharts.chart('container_combine1', {
    title: {
        text: 'Total Company and Compliance company comparison'
    },
    credits: {enabled : false},
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
        name: 'Compliance Company',
        data: <?php echo json_encode($master_compliance_comparison['total_compliance_company']);?>
    }, {
        type: 'pie',
        name: 'Total',
        data: [{
            name: 'Total Company',
            y: <?php echo $master_compliance_comparison['total_sum'];?>,
            color: Highcharts.getOptions().colors[0] // Jane's color
        }, {
            name: 'Compliance Company',
            y: <?php echo $master_compliance_comparison['compliance_sum'];?>,
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

                            $url =  'rangespent.php?state=&district=&mact=&compCat=&district=&year=FY 2018-19&csr_spent_range='+this.category;

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


    $('#container_chart2').highcharts({
       
        chart: {
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }

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
                            //location.href = 'rangespent.php?year=FY+2016-17&csr_spent_range='+this.category;

                            $url =  'rangespent.php?state=&district=&mact=&compCat=&district=&year=FY 2018-19&csr_spent_range='+this.category;

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
            title:{text:'Inspector Names'},
            categories: <?php echo json_encode($inspector_names); ?>,

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
            text: 'Inspector wise notice sent'
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
                data: {{ $inspector_comp_count }},
                // color: 'rgba(165,170,217,1)',
                pointPadding: 0.1,
                // pointPlacement: 0,
                tooltip: {
                    valueSuffix: ''
                }
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
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }

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
                            //location.href = 'rangespent.php?year=FY+2016-17&csr_spent_range='+this.category;

                            $url =  'rangespent.php?state=&district=&mact=&compCat=&district=&year=FY 2018-19&csr_spent_range='+this.category;

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
            text: 'RoC wise notice sent'
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
</script>

</html>
<!-- end document-->
