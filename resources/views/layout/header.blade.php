<header>
	<div class="header-area">
		<div class="main-header ">
			<div class="header-top top-bg d-none d-lg-block">
				<div class="container-fluid">
					<div class="col-xl-12">
						<div class="row d-flex justify-content-between align-items-center">
							<div class="header-info-left">
								<ul>
									<li><i class="fas fa-map-marker-alt"></i>65/A, 17th floor, Kings land, New Delhi</li>
									<li><i class="fas fa-envelope"></i><a href="#">mcacms@gov.in</a>
									</li>
								</ul>
							</div>
							<div class="header-info-right">
								<ul class="header-social">
									<li><a href="#"><i class="fab fa-linkedin-in"></i></a>
									</li>
									<li><a href="#"><i class="fab fa-twitter"></i></a>
									</li>
									<li><a href="#"><i class="fab fa-facebook-f"></i></a>
									</li>
									<li> <a href="#"><i class="fab fa-google-plus-g"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-bottom  header-sticky">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-xl-2 col-lg-1 col-md-1">
							<div class="logo">
								<a href="{{url('/')}}">
									<img src="{{asset('assets/master/img/logo/logo.jpg')}}" alt="" width="290" height="112">
								</a>
							</div>
						</div>
						<div class="col-xl-8 col-lg-8 col-md-8">
							<div class="main-menu f-right d-none d-lg-block">
								<nav>
									<ul id="navigation">
										<li><a href="index-2.html">Home</a>
										</li>
										<li><a href="about.html">About</a>
										</li>
										<li><a href="services.html">Services</a>
										</li>
										<li><a href="cases.html">Cases</a>
										</li>
                                        <li><a href="{{url('forums')}}">Forum</a>
										</li>
										<!-- <li><a href="blog.html">Blog</a>
										</li> -->
										<!-- <li><a href="#">Pages</a>
											<ul class="submenu">
												<li><a href="contact.html">Contact</a>
												</li>
												<li><a href="elements.html">Element</a>
												</li>
												<li><a href="case_details.html">Case Details</a>
												</li>
											</ul>
										</li> -->
                                        @if(Auth::user())
                                        <li><a href="#">My Profile</a>
											<ul class="submenu">
												<li><a href="contact.html">Contact</a>
												</li>
												<li><a href="elements.html">Element</a>
												</li>
												<li><a href="case_details.html">Case Details</a>
												</li>
											</ul>
										</li>
                                        @endif

									</ul>
								</nav>
							</div>
						</div>
						<div class="col-xl-2 col-lg-3 col-md-3">
							<div class="header-right-btn f-right d-none d-lg-block">
<a href="{{url('forums')}}" class="btn btn-success">Contact us</a>
							</div>
						</div>
						<div class="col-12">
							<div class="mobile_menu d-block d-lg-none"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
