            <div class="logo">
                <a href="{{url('/dashboard?year=2017')}}">
                    <img src="{{asset('assets/CoolAdmin/images/icon/mcaLogo.jpg')}}" alt="MCA Dashboard" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="@if(Request::is('dashboard*')) active @endif has-sub">
                            <a class="js-arrow" href="{{url('/dashboard?year=2017')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <!-- <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">Dashboard 4</a>
                                </li>
                            </ul> -->
                        </li>

                        <li class="<?php echo (Request::is('inspector-wise-report')?'active':'');?>">
                            <a href="{{url('/inspector-wise-report')}}">
                                <i class="fas fa-chart-bar"></i>Inspector Wise Report</a>
                        </li>
                        <li class="<?php echo (Request::is('provision-wise-report')?'active':'');?>">
                            <a href="{{url('/provision-wise-report')}}">
                                <i class="fas fa-chart-bar"></i>Provision Wise Report</a>
                        </li>
                        <li class="<?php echo (Request::is('year-wise-report')?'active':'');?>">
                            <a href="{{url('/year-wise-report')}}">
                                <i class="fas fa-chart-bar"></i>Year Wise Report</a>
                        </li>
                        <li class="<?php echo (Request::is('roc-wise-report')?'active':'');?>">
                            <a href="{{url('/roc-wise-report')}}">
                                <i class="fas fa-chart-bar"></i>RoC Wise Report</a>
                        </li>
                        <li class="<?php echo (Request::is('provision-wiki')?'active':'');?>">
                            <a href="{{url('/provision-wiki')}}">
                                <i class="fas fa-book"></i>Provision Wiki</a>
                        </li>
                        <li>
                            <a href="{{url('/dashboard?year=2017')}}">
                            <i class="fa fa-sign-out"></i>Logout</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-question-circle"></i>Support</a>
                        </li>
                        <!--<li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                            <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li> -->
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li> -->

                    </ul>
                </nav>
            </div>
