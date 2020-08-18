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

                                       <div id="accordion">
                                       <?php $counter = 1; ?>
                                       @foreach ($chart_data as $rec)
                                            <div class="card" style="margin-bottom:10px;">
                                                <div class="card-header" id="heading{{$counter}}" style="background-color:#8d84cc;padding: .75rem 1.0rem;">
                                                <h5 class="mb-0 panel-title">
                                                    <button style="color:#fff;"class="<?php echo (($counter > 1)?'collapsed':'');?>" data-toggle="collapse" data-target="#collapse{{$counter}}" aria-expanded="<?php echo (($counter > 1)?'false':'true');?> " aria-controls="collapse{{$counter}}">
                                                    <i class="fa fa-plus"></i>  Provision {{ $rec['provision_id']}}
                                                    </button>
                                                </h5>
                                                </div>

                                                <div id="collapse{{$counter}}" class="collapse <?php echo (($counter > 1)?'':'show');?> " aria-labelledby="heading{{$counter}}" data-parent="#accordion">
                                                <div class="card-body">
                                                <!-- <button type="button" class="btn btn-info">Total Comapnies : {{$rec['_count']}}</button> -->
                                                <div class="row">

                                                    <div class="col-sm">
                                                <?php $counter1 = 1;
                                                if(isset($rec['roc_wise'])){
                                                 ?>

                                                <div class="table-responsive">
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                            <th width="15%" class="head-tab-custom text-center" colspan="5">RoC Wise Notice Sent </th>
                                                        </tr>
                                                        <tr>
                                                            <th width="15%" class="head-tab-custom">RoC </th>
                                                            <th width="10%" class="head-tab-custom">FY 2017 <br>(Total Companies)</th>
                                                            <th width="10%" class="head-tab-custom">FY 2018 <br>(Total Companies)</th>
                                                            <th width="10%" class="head-tab-custom">FY 2019 <br>(Total Companies)</th>
                                                            <th width="10%" class="head-tab-custom">FY 2020 <br>(Total Companies)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                            @if (count($rec['roc_wise']) > 0)
                                                @foreach ($rec['roc_wise'] as $ydata)

                                                <tr>
                                                    <td>{{$ydata['roc_name']}}</td>
                                                    <td>{{$ydata['c1']}}</td>
                                                    <td>{{$ydata['c2']}}</td>
                                                    <td>{{$ydata['c3']}}</td>
                                                    <td>{{$ydata['c4']}}</td>
                                                </tr>

                                                <?php $counter1++; ?>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="5">No record found.</td>
                                                </tr>
                                            @endif


                                                </tbody>
                                                </table>
                                                </div>
                                                <?php } ?>
                                                    </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">

                                                    <div class="col-sm">
                                                    <div class="table-responsive ">
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                            <th width="15%" class="head-tab-custom text-center" colspan="5">Company Class Wise Default Companies(Total)</th>
                                                        </tr>
                                                        <tr>
                                                        <th width="15%" class="head-tab-custom">Company Class </th>
                                                            <th width="10%" class="head-tab-custom">FY 2017 <br>(Total Companies)</th>
                                                            <th width="10%" class="head-tab-custom">FY 2018 <br>(Total Companies)</th>
                                                            <th width="10%" class="head-tab-custom">FY 2019 <br>(Total Companies)</th>
                                                            <th width="10%" class="head-tab-custom">FY 2020 <br>(Total Companies)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                <?php $counter1 = 1; ?>
                                                @if (count($rec['class_wise']) > 0)
                                                @foreach ($rec['class_wise'] as $ydata)

                                                        <tr>
                                                        <td>{{$ydata['COMPANY_CLASS']}}</td>
                                                    <td>{{$ydata['c1']}}</td>
                                                    <td>{{$ydata['c2']}}</td>
                                                    <td>{{$ydata['c3']}}</td>
                                                    <td>{{$ydata['c4']}}</td>
                                                        </tr>

                                                <?php $counter1++; ?>
                                                @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="2">No record found.</td>
                                                    </tr>
                                                @endif


                                                </tbody>
                                                </table>
                                                </div>
                                                </div>
                                                <div class="col-sm">
                                                <div class="table-responsive ">
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                            <th width="15%" class="head-tab-custom text-center" colspan="2">FY Wise Default Companies(Total)</th>
                                                        </tr>
                                                        <tr>
                                                            <th width="15%" class="head-tab-custom">FY </th>
                                                            <th width="10%" class="head-tab-custom">Total Companies</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                <?php $counter1 = 1; ?>
                                                @if (count($rec['year_wise']) > 0)
                                                @foreach ($rec['year_wise'] as $ydata)

                                                        <tr>
                                                            <td>{{$ydata['YearOfFiling']}}</td>
                                                            <td>{{$ydata['_count']}}</td>
                                                        </tr>

                                                <?php $counter1++; ?>
                                                @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="2">No record found.</td>
                                                    </tr>
                                                @endif


                                                </tbody>
                                                </table>
                                                </div>
                                                    </div>
                                                </div>


                                                </div>
                                                </div>
                                            </div>
                                            <?php $counter++; ?>
                                         @endforeach

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
$(document).ready(function(){
    // Add minus icon for collapse element which is open by default
    $(".collapse.show").each(function(){
        $(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
    });

    // Toggle plus minus icon on show hide of collapse element
    $(".collapse").on('show.bs.collapse', function(){
        $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
    }).on('hide.bs.collapse', function(){
        $(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
    });
});
</script>

@endsection
