
@extends('layout.admin')

@section('title', 'Compliance Monitoring Dashboard')

@section('content')
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-lg-12">
                            <div class="row">
                            <div class="col-sm-8">
                                <div class="card" style="margin-top:-35px; margin-bottom:5px;">
                                    <div class="card-body card-block">
                                        <form class="form-header" action="{{url('notice/list')}}" method="GET">
                                            <input class="au-input col-sm-6" type="text" name="searchKey"  value="<?=$searchKey;?>"
                                            placeholder="Search for datas &amp; reports..." onkeyup = " ($(this).val() === '') ? this.form.submit() : '';">
                                            <input type="hidden" name="provision_id" value="<?=$provision_id;?>">
                                            <input type="hidden" name="year" value="<?=$year;?>">
                                            <input type="hidden" name="status" value="<?=$status;?>">
                                            <button class="au-btn--submit" type="submit"><i class="zmdi zmdi-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-4">
                                <div class="card" style="margin-top:-35px; margin-bottom:5px;">
                                    <div class="card-body card-block">
                                    <button type="button" class="btn btn-outline-primary btn-lg active">Total Notice: <?=$total;?></button>
                                    </div>
                                </div>
                            </div>
                            </div>


                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                                <div class="table-responsive table--no-card m-b-30">

                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <!-- <th width="5%"><label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label></th> -->
                                                <th width="5%">S.No.</th>
                                                <th width="10%">CIN</th>
                                                <th width="20%">Company Name</th>
                                                <!-- <th width="15%" class="text-right">YearOfFiling</th> -->
                                                <th width="40%" class="text-right">Alert</th>
                                               <!--   <th width="15%" class="text-right">Address</th>
                                               <th width="5%" class="text-right">Status</th>!-->
                                                <th width="15%" class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $counter = 0; ?>
                                        @foreach ($notice_data as $user)

                                            <tr>
                                                <!-- <td><label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label></td> -->
                                                <td>{{ ++$counter }}</td>
                                                <td>{{ $user->CIN }}</td>
                                                <td>{{ $user->Companyname }}</td>
                                                <!-- <td class="text-right">{{ $user->YearOfFiling }}</td> -->
                                                <td class="text-right">{{ $user->Alert }}</td>
                                                <td class="text-right"><a href="{{url('compliance_company/view?cin=')}}{{ $user->CIN }}&year={{ $year }}" target="_blank" title="View"><i class="fa fa-table"></i></a></td>
                                            </tr>

                                        @endforeach



                                        </tbody>
                                    </table>


                                    <!-- <div class="user-data__footer">
                                        <button class="au-btn au-btn-load">load more</button>
                                    </div> -->
                                </div>
                                {{ $notice_data->appends(['year'=>$year,'provision_id' => $provision_id,'status' => $status])->links() }}
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
<script src="{{asset('assets/CoolAdmin/vendor/select2/select2.min.js')}}"></script>
<!-- Main JS-->
<script src="{{asset('assets/CoolAdmin/js/main.js')}}"></script>
<script>
    $('.close').click(function(){
        var checkstr =  confirm('are you sure you want to delete this?');
        if(checkstr == true){
        // do your code
        }else{
        return false;
        }
    });
</script>
@endsection
