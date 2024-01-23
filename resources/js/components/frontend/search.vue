<template>
	<main>
		<homelayout>
			<div class="mainSearchSection" slot="frontbody">
				<section class="slider-sec jobOptions mt-75">
					<!-- <div class="banner-img d-none d-sm-none d-md-block d-lg-block d-xl-block"></div> -->
					<div class="searchBG"></div>
					<div class="container">
						<div class="slider-content">
							<form class="slider-form">
								<div class="form-row row">
									<div class="form-group col-md-3 col-sm-12 keyword-container">
									<label>What</label>
									<input type="text" class="form-control" placeholder="eg. UI Designer
									">
									</div>
									<div class="form-group col-md-3 col-sm-12 location-container">
										<div class="form-group input-icon industries-fields">
										<label>Industries</label>
										<div class="select-bx class-box lblClasi" id="lblClasi">
											<ul>
											<li>
												<label class="form-check-label lblDrp" for="same-address">Choose Industry</label>
												<div class="select-direction">
													<span class="selectSpan">
													<i class="fa fa-angle-down"></i>
													</span>
													<div class="right-cros"><img class="default-cross" src="img/cross.svg">
														<img class="show-hover" src="img/crosson-hover.svg"></div>
													</div>
											</li>
											</ul>
										</div>
											<div class="select-heading-list hide" style="display: none;">
											<p style="display:none">{{ childCount = 0 }}</p>
												<ul v-if="dataCategory" v-for="(value, key) in dataCategory">       
																	
													<li class="dropdown mainLi"  :id="'mainLi_'+key" :data-id="key">                                           
													<div class="form-check">
													<input type="checkbox" class="form-check-input mainChk indChk" :data-id="key" :id="'mainChk_'+key">
													<label class="form-check-label" :for="'mainChk_'+key">{{  value.parent.value }}</label>
													</div>
													<ul class="nestedMenu" :id="'nestedMenu_'+key" style="display: none;" :data-id="key">
														<div class="all-heading">
															<div class="form-check">
															<input type="checkbox" class="form-check-input all indChk" :id="'all_'+key" checked="checked" :data-id="key">
															<label class="form-check-label" :for="'all_'+key">All {{  value.parent.value }}</label>
															<span class="all_count" :id="'all_count_'+key">4217</span>
														</div>
														</div>                                                      
														<div v-if="value.child" v-for="(value11, key11) in value.child">                                                    
															<li>
															<div class="form-check">
															<input type="checkbox" class="form-check-input child indChk" :id="`child_${childCount}`" :data-id="`${childCount}`" name="child[]">
															<label class="form-check-label" :data-labelfor="`child_${childCount}`" :for="`${childCount}`">{{ value11.value }} </label>
															<span :class="`${childCount}`" :id="`child_count_${childCount}`">1014</span>
															<p style="display:none">{{ childCount++ }}</p>
														</div>
														</li>                                                
														</div>                                                               
														</ul>
														</li>
															
												</ul>
											</div>
										</div>
									</div>
									<div class="form-group col-md-3 col-sm-12 location-container choose-location-list">
										<div class="form-group input-icon industries-fields">
										<label>Where</label>
										<div class="select-bx class-box lblLocation" id="lblLocation">
											<ul>
											<li>
												<label class="form-check-label lblDrpLocation" for="same-address">Choose Location</label>
												<div class="select-direction">
													<span class="selectSpan1">
													<i class="fa fa-angle-down"></i>
													</span>
													<div class="right-cros1"><img class="default-cross" src="img/cross.svg">
														<img class="show-hover" src="img/crosson-hover.svg"></div>
											</div>
											</li>
											</ul>
										</div>
											<div class="locationList hide" style="display: none;">
												<ul>			                  	 
													<li class="dropdown mainLi1" id="mainLi1_1" data-id="1">
													<div class="form-check">
														<input type="checkbox" class="form-check-input mainChk1 locChk" data-id="1" id="mainChk1_1">
														<label class="form-check-label" for="mainChk1_1">Nicosia</label>
													</div>							          
												</li>
												<li class="dropdown mainLi1" id="mainLi1_2" data-id="2">
													<div class="form-check">
														<input type="checkbox" class="form-check-input mainChk1 locChk" data-id="2" id="mainChk1_2">
														<label class="form-check-label" for="mainChk1_2">Larnaca</label>
													</div>							          
												</li>
												<li class="dropdown mainLi1" id="mainLi1_3" data-id="3">
													<div class="form-check">
														<input type="checkbox" class="form-check-input mainChk1 locChk" data-id="3" id="mainChk1_3">
														<label class="form-check-label" for="mainChk1_3">Limassol</label>
													</div>							          
												</li>
												<li class="dropdown mainLi1" id="mainLi1_4" data-id="4">
													<div class="form-check">
														<input type="checkbox" class="form-check-input mainChk1 locChk" data-id="4" id="mainChk1_4">
														<label class="form-check-label" for="mainChk1_4">Paphos</label>
													</div>							          
												</li>
												<li class="dropdown mainLi1" id="mainLi1_5" data-id="5">
													<div class="form-check">
														<input type="checkbox" class="form-check-input mainChk1 locChk" data-id="5" id="mainChk1_5">
														<label class="form-check-label" for="mainChk1_5">Famagusta</label>
													</div>							          
												</li>

												</ul>
											</div>							
										</div>
									</div>
									<div class="form-group  col-xs-12 col-sm-12 col-md-3 serach-btn-slider">
										<label>&nbsp;</label>
										<p id="searchJob" @click="search" class="btn calc-btn"> Search Jobs</p>
									</div>
								</div>
							</form>
						</div>
					</div>

				<div class="job-search-container">
				<div class="">
				<div class="filter-bar">
					<div class="accordion" id="accordionExample">
						<div class="row mx-0 ">
						<div class="card-header col" id="headingOne">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#job1" aria-expanded="true" aria-controls="job1">
								All Work Types
								</button>
							</h5>
						</div>
					<div class="card-header col" id="headingTwo">
						<h5 class="mb-0">
						<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#job2" aria-expanded="false" aria-controls="job2">
						Salary Estimate
						</button>
						</h5>
					</div>
					<div class="card-header col" id="headingThree">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#job3" aria-expanded="false" aria-controls="job3">
							Date Posted
							</button>
						</h5>
					</div>
					<div class="card-header col" id="headingFour">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#job4" aria-expanded="false" aria-controls="job4">
							Experience Level
							</button>
						</h5>
					</div>
					</div>
					<div class="card-description">
					<div id="job1" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
						<div class="card-body">
							<ul class="work-type">
								<li>
									<span class="radio_yes-1">
										<input type="checkbox" class="predefine_img" name="predefine-img2" checked="checked">
										<span>Full Time</span>
									</span>
								</li>
								<li>
									<span class="radio_yes-1">
										<input type="checkbox" class="predefine_img" name="predefine-img2">
										<span>Part Time</span>
									</span>
								</li>
								<li>
									<span class="radio_yes-1">
										<input type="checkbox" class="predefine_img" name="predefine-img2">
										<span>Temporary</span>
									</span>
								</li>
								<li>
									<span class="radio_yes-1">
										<input type="checkbox" class="predefine_img" name="predefine-img2">
										<span>Contract</span>
									</span>
								</li>
								<li>
									<span class="radio_yes-1">
										<input type="checkbox" class="predefine_img" name="predefine-img2">
										<span>Internship</span>
									</span>
								</li>
							</ul>
					</div>
					</div>
					<div id="job2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
					<div class="card-body">
						<ul class="paying">
							<li>
								<span class="radio_yes-1">
									<input type="radio" class="predefine_radio" name="paying-start" checked="true">
									<span>up to €10K</span>
								</span>
							</li>
							<li>
								<span class="radio_yes-1">
									<input type="radio" class="predefine_radio" name="paying-start">
									<span>up to €15K</span>
								</span>
							</li>
							<li>
								<span class="radio_yes-1">
									<input type="radio" class="predefine_radio" name="paying-start">
									<span>up to €20K</span>
								</span>
							</li>
							<li>
								<span class="radio_yes-1">
									<input type="radio" class="predefine_radio" name="paying-start">
									<span>up to €25K</span>
								</span>
							</li>
							<li>
								<span class="radio_yes-1">
									<input type="radio" class="predefine_radio" name="paying-start">
									<span>up to €30K</span>
								</span>
							</li>
							<li>
								<span class="radio_yes-1">
									<input type="radio" class="predefine_radio" name="paying-start">
									<span>up to €35K</span>
								</span>
							</li>
							<li>
								<span class="radio_yes-1">
									<input type="radio" class="predefine_radio" name="paying-start">
									<span>up to €40K</span>
								</span>
							</li>
							<li>
								<span class="radio_yes-1">
									<input type="radio" class="predefine_radio" name="paying-start">
									<span>over €40K</span>
								</span>
							</li>
						</ul>
					</div>
				</div>
				</div>
				<div id="job3" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
					<div class="card-body">
					<ul class="work-type listed-today">
						<li>
							<span class="radio_yes-1">
								<input type="radio" class="predefine_radio" name="predefine-img2" checked="true">
								<span>Any Time</span>
							</span>
						</li>
						<li>
							<span class="radio_yes-1">
								<input type="radio" class="predefine_radio" name="predefine-img2">
								<span>Today</span>
							</span>
						</li>
						<li>
							<span class="radio_yes-1">
								<input type="radio" class="predefine_radio" name="predefine-img2">
								<span>Last 3 days</span>
							</span>
						</li>
						<li>
							<span class="radio_yes-1">
								<input type="radio" class="predefine_radio" name="predefine-img2">
								<span>Last 7 days</span>
							</span>
						</li>
						<li>
							<span class="radio_yes-1">
								<input type="radio" class="predefine_radio" name="predefine-img2">
								<span>Last 14 days</span>
							</span>
						</li>
						<li>
							<span class="radio_yes-1">
								<input type="radio" class="predefine_radio" name="predefine-img2">
								<span>Last 30 days</span>
							</span>
						</li>
					</ul>
				</div>
				</div>
				<div id="job4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
					<div class="card-body">
						<ul class="work-type listed-today">
							<li>
								<span class="radio_yes-1">
									<input type="radio" class="predefine_radio" name="predefine-img2" checked="true">
									<span>Entry Level</span>
								</span>
							</li>
							<li>
								<span class="radio_yes-1">
									<input type="radio" class="predefine_radio" name="predefine-img2">
									<span>Mid Level</span>
								</span>
							</li>
							<li>
								<span class="radio_yes-1">
									<input type="radio" class="predefine_radio" name="predefine-img2">
									<span>Senior Level</span>
								</span>
							</li>
					</ul>
					</div>
				</div>
				</div>
				</div>
				</div>
				</div>
				</section>
       		 </div>
			<div class="m_container" slot="frontbody">
				<div class="main-wrapper">    
					<div class="job-result-find">
					<div class="container-fluid text-position">
					<button class="btn btn-job" id="jobAlert">Create Job Alert</button>
					</div>
					<div class="jobalert-info" style="display: none;">
					<h4>Get Php jobs as soon as they're posted</h4>
					<p>Sign up for a Monster account, and we'll send jobs and job-search advice right to your inbox.</p>
					<div class="form-group">
					<input type="text" class="form-control" name="" placeholder="Enter your email address">
					<div class="text-center">
					<button class="btn browse-btn-fill my-3 w-100">Send Me Jobs</button>
					</div>
					</div>
					<div class="d-flex align-items-baseline">
					<input type="checkbox" class="checkbox mr-2" name="" checked>
					<label>Email me for job opportunities and updates related to career and education.</label>
					</div>
					</div>
					<div class="save-job">
					</div>
					<div class="container-fluid desktop-job">
					<div class="row">
					<div class="col-md-5">
					<div class="nav flex-column nav-pills job-tab" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<div class="nav-link" id="tab-1" data-toggle="pill" data-target="#tab1" role="tab">
					<div class="row align-items-center">
						<div class="col-auto">
							<div class="company-logo">
								<img src="frontend/img/apple.svg" class="company-img">
							</div>
						</div>
						<div class="col">
							<div class="row">
								<div class="col col-detail">
									<div class="header-title">
										<a href="#">Front End Engineer</a>
									</div>
									<div class="company">
										<span class="-name">E-Talent Network</span>
									</div>
									<div class="location">
										<span class="-name"><i class="fa fa-map-marker"></i> San Francisco, CA</span>
									</div>
								</div>
								<div class="col-auto col-post">
									<div class="text-position">
										<span class="posted-by">Posted Yesterday</span>
										<span class="expired-by">Expires in 7 days</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
					<div class="nav-link active" id="tab-2" data-toggle="pill" data-target="#tab2" role="tab">
					<div class="row align-items-center">
						<div class="col-auto">
							<div class="company-logo">
								<img src="frontend/img/google.svg" class="company-img">
							</div>
						</div>
						<div class="col">
							<div class="row no-gutters">
								<div class="col pl-1 col-detail">
									<div class="header-title">
										<a href="#">Web Development Manager</a>
									</div>
									<div class="company col-sm-6">
										<span class="-name">Granicus</span>
									</div>
									<div class="location">
										<span class="-name"><i class="fa fa-map-marker"></i> San Francisco, CA</span>
									</div>
								</div>
								<div class="col-auto col-post">
									<div class="text-position">
										<span class="posted-by">Posted 15 days ago</span>
										<span class="expired-by">Expires in 1 day</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
					<div class="nav-link" id="tab-3" data-toggle="pill" data-target="#tab3" role="tab">
					<div class="row align-items-center">
						<div class="col-auto">
							<div class="company-logo">
								<img src="frontend/img/company-logo.png" class="company-img">
							</div>
						</div>
						<div class="col">
							<div class="row">
								<div class="col pl-1 col-detail">
									<div class="header-title">
										<a href="#">Web Developer/ Software Engineer</a>
									</div>
									<div class="company">
										<span class="-name">E-Talent Network</span>
									</div>
									<div class="location">
										<span class="-name"><i class="fa fa-map-marker"></i> San Francisco, CA</span>
									</div>
								</div>
								<div class="col-auto col-post">
									<div class="text-position">
										<span class="posted-by">Posted 2 days ago</span>
										<span class="expired-by">Expires in 15 days</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
					<div class="nav-link" id="tab-4" data-toggle="pill" href="#data-target" role="tab">
					<div class="row align-items-center">
						<div class="col-auto">
							<div class="company-logo">
								<img src="frontend/img/apple.svg" class="company-img">
							</div>
						</div>
						<div class="col">
							<div class="row">
								<div class="col pl-1 col-detail">
									<div class="header-title">
										<a href="#">Senior Visual Designer</a>
									</div>
									<div class="company">
										<span class="-name">E-Talent Network</span>
									</div>
									<div class="location">
										<span class="-name"><i class="fa fa-map-marker"></i> San Francisco, CA</span>
									</div>
								</div>
								<div class="col-auto col-post">
									<div class="text-position">
										<span class="posted-by">Posted 3 days ago</span>
										<span class="expired-by">Expires in 15 days</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
					</div>
					</div>
					<div class="col-md-7">
					<div class="tab-content" id="v-pills-tabContent">
					<div class="tab-pane fade" id="tab1" role="tabpanel" aria-labelledby="v-pills-home-tab">
					<div class="cp-info">
						<div class="row align-items-center g-3">
							<div class="col-auto">
								<div class="company-logo save-job-logo">
									<img src="frontend/img/google.svg" class="company-img">
								</div>
							</div>
							<div class="col">
								<h4>PHP Developer - REMOTE at <span>CyberCoders Batavia, IL 60510 </span></h4>
							</div>
							<div class="col-auto apply-data">
								<div class="text-position mb-3">
									<button class="btn apply-btn">Apply Now</button>
								</div>
								<div class="job-action text-position">
									<span><a href="#"><i class="fa fa-heart-o"></i></a></span>
									<span><a href="#"><i class="fa fa-envelope"></i> Email</a></span>
								</div>
							</div>
						</div>
					</div>
					<div class="details-tab">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="home" aria-selected="true">Details</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="highlights-tab" data-toggle="tab" href="#highlights" role="tab" aria-controls="profile" aria-selected="false">Highlights</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="company-tab" data-toggle="tab" href="#company" role="tab" aria-controls="profile" aria-selected="false">Company</a>
							</li>
						</ul>
					</div>
					<div class="tab-content job-detail-bx" id="myTabContent">
						<div class="tab-pane fade show active" id="detail" role="tabpanel">
							<div class="job-des-container">
								<div class="card-content">
									<div class="details-content" id="JobDescription" tabindex="0">
										<h4>Job Description & Requirements</h4>
										<p> Our client is seeking a Frontend Web Developer for an exciting contract to hire scenario. This position assists in managing, transitioning, and planning the design, functionality, and content upgrades to the organization's marketing website. This associate in this position will have an understanding of user-friendly design principles and intensive experience in customer service and promoting brand aligned principles.
										</p>
										<strong><span class="job-title">DUTIES:</span></strong>
										<ul>
											<li>Evolves the website design by assisting Sr. Web Developer with information design.</li>
											<li>Promotes the importance of being brand alignment and grows/expands brand services and relationships.</li>
											<li>Manages, trains, and develops relationships when converting websites.</li>
											<li>Provides guidance on best practices of SEM and SEO trends.</li>
											<li>Develops tutorials and other training materials.</li>
											<li>Assists with graphic design, when needed.</li>
											<li>Performs other job related duties as assigned or requested.</li>
										</ul>
										<strong><span class="job-title">REQUIREMENTS:</span></strong>
										<ul>
											<li>Bachelor's degree or equivalent education/experience</li><li>2+ years of experience working with CMS platforms</li><li>Hands-on knowledge of web-based analytics tools and implementation</li><li>Ability to work interdepartmentally and externally with multiple points of contact</li><li>Customer service oriented</li><li>Proficient with Microsoft Office applications</li><li>Experience in HTML5, SEO, Bootstrap 3, PHP, JSP/JSF</li><li>Experience with the Liferay and dotCMS platforms</li><li>SEO and SEM experience</li><li>Familiarity with InDesign and other graphic design solutions</li>
										</ul>
										<div class="apply-now-div">
											<button class="btn browse-btn my-3">Apply Now</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="highlights" role="tabpanel">
							<div class="details-content highlights-info">
								<h4 class="mb-4">Job Summary</h4>
								<div class="row">
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Location</h6>
											<p class="job-title">MANCHESTER, NJ 980877</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Job Type</h6>
											<p class="job-title">Full Time, Employee</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Posted</h6>
											<p class="job-title">Today</p>
										</div>
										
									</div>
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Industries</h6>
											<p class="job-title">Computer Software</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Salary</h6>
											<p class="job-title">€10000-€20000</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Career level</h6>
											<p class="job-title">Entry Level</p>
										</div>
									<!--  <div class="mb-4">
											<h6 class="mb-0">Contact name</h6>
											<p class="job-title">Patrick Solano</p>
										</div> -->
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="company" role="tabpanel">
							<div class="details-content">
								<div class="job-des-container">
								<div class="card-content">
									<div class="details-content ml-0" id="JobDescription" tabindex="0">
										<h4>OSI Engineering</h4>
										<h5 class="mb-0">Company Description</h5>
										<p class="job-title">Full Time, Employee</p>
										<p>OSI is the premiere Managed Services and Staff Augmentation partner for today's tech leaders and tomorrow's luminaries. With over 20 years of experience, we bring expert knowledge of today's emerging technologies and deep relationships with the world's biggest, brightest, & boldest players to help you tackle employment demands with a targeted array of talent solutions.</p>
										<a class="company-link">View Company Profile</a>
									</div>
								</div>
							</div>
								<div class="row pt-3">
									<div class="col-md-6">
										<!-- <div class="mb-4">
											<h6 class="mb-0">Company Description</h6>
											<p class="job-title">Full Time, Employee</p>
										</div> -->
										<div class="mb-4">
											<h6 class="mb-0">Website</h6>
											<p class="job-title">http://www.OSIengineering.com</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Industry</h6>
											<p class="job-title">Staffing/Employment Agencies</p>
										</div>
										
									</div>
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Founded</h6>
											<p class="job-title">2010</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Company size</h6>
											<p class="job-title">100 to 499 employees</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
					<div class="tab-pane fade show active" id="tab2" role="tabpanel" aria-labelledby="v-pills-profile-tab">
					<div class="cp-info">
						<div class="row align-items-center g-3">
							<div class="col-auto">
								<div class="company-logo save-job-logo">
									<img src="frontend/img/google.svg" class="company-img">
								</div>
							</div>
							<div class="col">
								<h4>PHP Developer - REMOTE at <span>CyberCoders Batavia, IL 60510 </span></h4>
							</div>
							<div class="col-auto apply-data">
								<div class="text-position mb-3">
									<button class="btn apply-btn">Apply at Employer's site 
										<img class="ml-2 not-hover" src="frontend/img/arrow.png">
										<img class="ml-2 on-hover" src="frontend/img/arrow-perple.png">
								</button>
								</div>
								<div class="job-action text-position">
									<span><a href="#"><i class="fa fa-heart-o"></i></a></span>
									<span><a href="#"><i class="fa fa-envelope"></i> Email</a></span>
								</div>
							</div>
						</div>
					</div>
					<div class="details-tab">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail2" role="tab" aria-controls="home" aria-selected="true">Details</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="highlights-tab" data-toggle="tab" href="#highlights2" role="tab" aria-controls="profile" aria-selected="false">Highlights</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="company-tab2" data-toggle="tab" href="#company2" role="tab" aria-controls="profile" aria-selected="false">Company</a>
							</li>
						</ul>
					</div>
					<div class="tab-content job-detail-bx" id="myTabContent">
						<div class="tab-pane fade show active" id="detail2" role="tabpanel">
							<div class="job-des-container">
								<div class="card-content">
									<div class="details-content" id="JobDescription" tabindex="0">
										<h4>Job Description & Requirements</h4>
										<p> Our client is seeking a Frontend Web Developer for an exciting contract to hire scenario. This position assists in managing, transitioning, and planning the design, functionality, and content upgrades to the organization's marketing website. This associate in this position will have an understanding of user-friendly design principles and intensive experience in customer service and promoting brand aligned principles.
										</p>
										<strong><span class="job-title">DUTIES:</span></strong>
										<ul>
											<li>Evolves the website design by assisting Sr. Web Developer with information design.</li>
											<li>Promotes the importance of being brand alignment and grows/expands brand services and relationships.</li>
											<li>Manages, trains, and develops relationships when converting websites.</li>
											<li>Provides guidance on best practices of SEM and SEO trends.</li>
											<li>Develops tutorials and other training materials.</li>
											<li>Assists with graphic design, when needed.</li>
											<li>Performs other job related duties as assigned or requested.</li>
										</ul>
										<strong><span class="job-title">REQUIREMENTS:</span></strong>
										<ul>
											<li>Bachelor's degree or equivalent education/experience</li><li>2+ years of experience working with CMS platforms</li><li>Hands-on knowledge of web-based analytics tools and implementation</li><li>Ability to work interdepartmentally and externally with multiple points of contact</li><li>Customer service oriented</li><li>Proficient with Microsoft Office applications</li><li>Experience in HTML5, SEO, Bootstrap 3, PHP, JSP/JSF</li><li>Experience with the Liferay and dotCMS platforms</li><li>SEO and SEM experience</li><li>Familiarity with InDesign and other graphic design solutions</li>
										</ul>
										<div class="apply-now-div">
											<button class="btn browse-btn my-3">Apply at Employer's site 
												<img class="ml-2 not-hover" src="frontend/img/arrow.png">
												<img class="ml-2 on-hover" src="frontend/img/arrow-perple.png">
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="highlights2" role="tabpanel">
							<div class="details-content highlights-info">
								<h4 class="mb-4">Job Summary</h4>
								<div class="row">
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Location</h6>
											<p class="job-title">MANCHESTER, NJ 980877</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Job Type</h6>
											<p class="job-title">Full Time, Employee</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Posted</h6>
											<p class="job-title">Today</p>
										</div>
										
									</div>
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Industries</h6>
											<p class="job-title">Computer Software</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Salary</h6>
											<p class="job-title">€10000-€20000</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Career level</h6>
											<p class="job-title">Entry Level</p>
										</div>
										<!-- <div class="mb-4">
											<h6 class="mb-0">Contact name</h6>
											<p class="job-title">Patrick Solano</p>
										</div> -->
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="company2" role="tabpanel">
							<div class="details-content">
								<div class="job-des-container">
								<div class="card-content">
									<div class="details-content ml-0" id="JobDescription" tabindex="0">
										<h4>OSI Engineering</h4>
										<h5 class="mb-0">Company Description</h5>
										<p class="job-title">Full Time, Employee</p>
										<p>OSI is the premiere Managed Services and Staff Augmentation partner for today's tech leaders and tomorrow's luminaries. With over 20 years of experience, we bring expert knowledge of today's emerging technologies and deep relationships with the world's biggest, brightest, & boldest players to help you tackle employment demands with a targeted array of talent solutions.</p>
										<a class="company-link">View Company Profile</a>
									</div>
								</div>
							</div>
								<div class="row pt-3">
									<div class="col-md-6">
										<!-- <div class="mb-4">
											<h6 class="mb-0">Company Description</h6>
											<p class="job-title">Full Time, Employee</p>
										</div> -->
										<div class="mb-4">
											<h6 class="mb-0">Website</h6>
											<p class="job-title">http://www.OSIengineering.com</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Industry</h6>
											<p class="job-title">Staffing/Employment Agencies</p>
										</div>
										
									</div>
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Founded</h6>
											<p class="job-title">2010</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Company size</h6>
											<p class="job-title">100 to 499 employees</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
					<div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="v-pills-messages-tab">
					<div class="cp-info">
						<div class="row align-items-center g-3">
							<div class="col-auto">
								<div class="company-logo save-job-logo">
									<img src="frontend/img/google.svg" class="company-img">
								</div>
							</div>
							<div class="col">
								<h4>PHP Developer - REMOTE at <span>CyberCoders Batavia, IL 60510 </span></h4>
							</div>
							<div class="col-auto apply-data">
								<div class="text-position mb-3">
									<button class="btn apply-btn">Apply Now</button>
								</div>
								<div class="job-action text-position">
									<span><a href="#"><i class="fa fa-heart-o"></i></a></span>
									<span><a href="#"><i class="fa fa-envelope"></i> Email</a></span>
								</div>
							</div>
						</div>
					</div>
					<div class="details-tab">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="home" aria-selected="true">Details</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="highlights-tab" data-toggle="tab" href="#highlights" role="tab" aria-controls="profile" aria-selected="false">Highlights</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="company-tab" data-toggle="tab" href="#company3" role="tab" aria-controls="profile" aria-selected="false">Company</a>
							</li>
						</ul>
					</div>
					<div class="tab-content job-detail-bx" id="myTabContent">
						<div class="tab-pane fade show active" id="detail" role="tabpanel">
							<div class="job-des-container">
								<div class="card-content">
									<div class="details-content" id="JobDescription" tabindex="0">
										<h4>Job Description & Requirements</h4>
										<p> Our client is seeking a Frontend Web Developer for an exciting contract to hire scenario. This position assists in managing, transitioning, and planning the design, functionality, and content upgrades to the organization's marketing website. This associate in this position will have an understanding of user-friendly design principles and intensive experience in customer service and promoting brand aligned principles.
										</p>
										<strong><span class="job-title">DUTIES:</span></strong>
										<ul>
											<li>Evolves the website design by assisting Sr. Web Developer with information design.</li>
											<li>Promotes the importance of being brand alignment and grows/expands brand services and relationships.</li>
											<li>Manages, trains, and develops relationships when converting websites.</li>
											<li>Provides guidance on best practices of SEM and SEO trends.</li>
											<li>Develops tutorials and other training materials.</li>
											<li>Assists with graphic design, when needed.</li>
											<li>Performs other job related duties as assigned or requested.</li>
										</ul>
										<strong><span class="job-title">REQUIREMENTS:</span></strong>
										<ul>
											<li>Bachelor's degree or equivalent education/experience</li><li>2+ years of experience working with CMS platforms</li><li>Hands-on knowledge of web-based analytics tools and implementation</li><li>Ability to work interdepartmentally and externally with multiple points of contact</li><li>Customer service oriented</li><li>Proficient with Microsoft Office applications</li><li>Experience in HTML5, SEO, Bootstrap 3, PHP, JSP/JSF</li><li>Experience with the Liferay and dotCMS platforms</li><li>SEO and SEM experience</li><li>Familiarity with InDesign and other graphic design solutions</li>
										</ul>
										<div class="apply-now-div">
											<button class="btn browse-btn my-3">Apply Now</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="highlights" role="tabpanel">
							<div class="details-content highlights-info">
								<h4 class="mb-4">Job Summary</h4>
								<div class="row">
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Location</h6>
											<p class="job-title">MANCHESTER, NJ 980877</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Job Type</h6>
											<p class="job-title">Full Time, Employee</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Posted</h6>
											<p class="job-title">Today</p>
										</div>
										
									</div>
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Industries</h6>
											<p class="job-title">Computer Software</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Salary</h6>
											<p class="job-title">€10000-€20000</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Career level</h6>
											<p class="job-title">Entry Level</p>
										</div>
										<!-- <div class="mb-4">
											<h6 class="mb-0">Contact name</h6>
											<p class="job-title">Patrick Solano</p>
										</div> -->
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="company3" role="tabpanel">
							<div class="details-content">
								<div class="job-des-container">
								<div class="card-content">
									<div class="details-content ml-0" id="JobDescription" tabindex="0">
										<h4>OSI Engineering</h4>
										<h5 class="mb-0">Company Description</h5>
										<p class="job-title">Full Time, Employee</p>
										<p>OSI is the premiere Managed Services and Staff Augmentation partner for today's tech leaders and tomorrow's luminaries. With over 20 years of experience, we bring expert knowledge of today's emerging technologies and deep relationships with the world's biggest, brightest, & boldest players to help you tackle employment demands with a targeted array of talent solutions.</p>
										<a class="company-link">View Company Profile</a>
									</div>
								</div>
							</div>
								<div class="row pt-3">
									<div class="col-md-6">
										<!-- <div class="mb-4">
											<h6 class="mb-0">Company Description</h6>
											<p class="job-title">Full Time, Employee</p>
										</div> -->
										<div class="mb-4">
											<h6 class="mb-0">Website</h6>
											<p class="job-title">http://www.OSIengineering.com</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Industry</h6>
											<p class="job-title">Staffing/Employment Agencies</p>
										</div>
										
									</div>
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Founded</h6>
											<p class="job-title">2010</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Company size</h6>
											<p class="job-title">100 to 499 employees</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
					<div class="tab-pane fade" id="tab4" role="tabpanel">
					<div class="cp-info">
						<div class="row align-items-center g-3">
							<div class="col-auto">
								<div class="company-logo save-job-logo">
									<img src="frontend/img/google.svg" class="company-img">
								</div>
							</div>
							<div class="col">
								<h4>PHP Developer - REMOTE at <span>CyberCoders Batavia, IL 60510 </span></h4>
							</div>
							<div class="col-auto apply-data">
								<div class="text-position mb-3">
									<button class="btn apply-btn">Apply Now</button>
								</div>
								<div class="job-action text-position">
									<span><a href="#"><i class="fa fa-heart-o"></i></a></span>
									<span><a href="#"><i class="fa fa-envelope"></i> Email</a></span>
								</div>
							</div>
						</div>
					</div>
					<div class="details-tab">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="home" aria-selected="true">Details</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="highlights-tab" data-toggle="tab" href="#highlights" role="tab" aria-controls="profile" aria-selected="false">Highlights</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="company-tab2" data-toggle="tab" href="#company2" role="tab" aria-controls="profile" aria-selected="false">Company</a>
							</li>
						</ul>
					</div>
					<div class="tab-content job-detail-bx" id="myTabContent">
						<div class="tab-pane fade show active" id="detail" role="tabpanel">
							<div class="job-des-container">
								<div class="card-content">
									<div class="details-content" id="JobDescription" tabindex="0">
										<h4>Job Description & Requirements</h4>
										<p> Our client is seeking a Frontend Web Developer for an exciting contract to hire scenario. This position assists in managing, transitioning, and planning the design, functionality, and content upgrades to the organization's marketing website. This associate in this position will have an understanding of user-friendly design principles and intensive experience in customer service and promoting brand aligned principles.
										</p>
										<strong><span class="job-title">DUTIES:</span></strong>
										<ul>
											<li>Evolves the website design by assisting Sr. Web Developer with information design.</li>
											<li>Promotes the importance of being brand alignment and grows/expands brand services and relationships.</li>
											<li>Manages, trains, and develops relationships when converting websites.</li>
											<li>Provides guidance on best practices of SEM and SEO trends.</li>
											<li>Develops tutorials and other training materials.</li>
											<li>Assists with graphic design, when needed.</li>
											<li>Performs other job related duties as assigned or requested.</li>
										</ul>
										<strong><span class="job-title">REQUIREMENTS:</span></strong>
										<ul>
											<li>Bachelor's degree or equivalent education/experience</li><li>2+ years of experience working with CMS platforms</li><li>Hands-on knowledge of web-based analytics tools and implementation</li><li>Ability to work interdepartmentally and externally with multiple points of contact</li><li>Customer service oriented</li><li>Proficient with Microsoft Office applications</li><li>Experience in HTML5, SEO, Bootstrap 3, PHP, JSP/JSF</li><li>Experience with the Liferay and dotCMS platforms</li><li>SEO and SEM experience</li><li>Familiarity with InDesign and other graphic design solutions</li>
										</ul>
										<div class="apply-now-div">
											<button class="btn browse-btn my-3">Apply Now</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="highlights" role="tabpanel">
							<div class="details-content highlights-info">
								<h4 class="mb-4">Job Summary</h4>
								<div class="row">
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Location</h6>
											<p class="job-title">MANCHESTER, NJ 980877</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Job Type</h6>
											<p class="job-title">Full Time, Employee</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Posted</h6>
											<p class="job-title">Today</p>
										</div>
										
									</div>
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Industries</h6>
											<p class="job-title">Computer Software</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Salary</h6>
											<p class="job-title">€10000-€20000</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Career level</h6>
											<p class="job-title">Entry Level</p>
										</div>
										<!-- <div class="mb-4">
											<h6 class="mb-0">Contact name</h6>
											<p class="job-title">Patrick Solano</p>
										</div> -->
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="company2" role="tabpanel">
							<div class="details-content">
								<div class="job-des-container">
								<div class="card-content">
									<div class="details-content ml-0" id="JobDescription" tabindex="0">
										<h4>OSI Engineering</h4>
										<h5 class="mb-0">Company Description</h5>
										<p class="job-title">Full Time, Employee</p>
										<p>OSI is the premiere Managed Services and Staff Augmentation partner for today's tech leaders and tomorrow's luminaries. With over 20 years of experience, we bring expert knowledge of today's emerging technologies and deep relationships with the world's biggest, brightest, & boldest players to help you tackle employment demands with a targeted array of talent solutions.</p>
										<a class="company-link">View Company Profile</a>
									</div>
								</div>
							</div>
								<div class="row pt-3">
									<div class="col-md-6">
										<!-- <div class="mb-4">
											<h6 class="mb-0">Company Description</h6>
											<p class="job-title">Full Time, Employee</p>
										</div> -->
										<div class="mb-4">
											<h6 class="mb-0">Website</h6>
											<p class="job-title">http://www.OSIengineering.com</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Industry</h6>
											<p class="job-title">Staffing/Employment Agencies</p>
										</div>
										
									</div>
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Founded</h6>
											<p class="job-title">2010</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Company size</h6>
											<p class="job-title">100 to 499 employees</p>
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
					</div>
					<div class="mobile-job1">
					<div class="container-fluid">
					<div class="job-result-find mobile-job-result">
					<div class="job-mobile-list">
					<div class="nav-tabs">
					<div class="nav flex-column nav-pills"> 
					<div class="accordion" id="accordionExample1">
					<div class="card-header" id="mobile-headingone">
						<button class="btn browse-btn nav-link collapsed" type="button" data-toggle="collapse" data-target="#mobile-tab1" aria-expanded="true" aria-controls="mobile-tab1">
							<div class="row align-items-center">
								<div class="col-auto">
									<div class="company-logo">
										<img src="frontend/img/apple.svg" class="company-img">
									</div>
								</div>
								<div class="col">
									<div class="row">
										<div class="col col-detail">
											<div class="header-title">
												<a href="#">Front End Engineer</a>
											</div>
											<div class="company">
												<span class="-name">E-Talent Network</span>
											</div>
											<div class="location">
												<span class="-name"><i class="fa fa-map-marker"></i> San Francisco, CA</span>
											</div>
										</div>
										<div class="col-auto col-post">
											<div class="text-position">
												<span class="posted-by">Posted Yesterday</span>
												<span class="expired-by">Expires 7 days</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</button>
					</div>
					<div id="mobile-tab1" class="collapse" aria-labelledby="mobile-headingone" data-parent="#accordionExample1">
						<div class="card-body">
						<div class="mobile-result-data">
							<div class="cp-info">
								<div class="row align-items-center g-3">
									<div class="col-auto">
										<div class="company-logo save-job-logo">
											<img src="frontend/img/google.svg" class="company-img">
										</div>
									</div>
									<div class="col">
										<h4>PHP Developer - REMOTE at <span>CyberCoders Batavia, IL 60510 </span></h4>
									</div>
									<div class="col-auto apply-data">
										<div class="text-position mb-3">
											<button class="btn apply-btn">Apply Now</button>
										</div>
										<div class="job-action text-position">
											<span><a href="#"><i class="fa fa-heart-o"></i></a></span>
											<span><a href="#"><i class="fa fa-envelope"></i> Email</a></span>
										</div>
									</div>
								</div>
							</div>
							<div class="details-tab">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="detail-tab1" data-toggle="tab" href="#detail01" role="tab" aria-controls="home" aria-selected="true">Details</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="highlights-tab2" data-toggle="tab" href="#highlights02" role="tab" aria-controls="profile" aria-selected="false">Highlights</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="company-tab3" data-toggle="tab" href="#company03" role="tab" aria-controls="profile" aria-selected="false">Company</a>
									</li>
								</ul>
							</div>
							<div class="tab-content job-detail-bx" id="myTabContent">
							<div class="tab-pane fade show active" id="detail01" role="tabpanel">
								<div class="job-des-container">
								<div class="card-content">
									<div class="details-content" id="JobDescription" tabindex="0">
										<h4>Job Description & Requirements</h4>
										<p> Our client is seeking a Frontend Web Developer for an exciting contract to hire scenario. This position assists in managing, transitioning, and planning the design, functionality, and content upgrades to the organization's marketing website. This associate in this position will have an understanding of user-friendly design principles and intensive experience in customer service and promoting brand aligned principles.
										</p>
										<strong><span class="job-title">DUTIES:</span></strong>
										<ul>
											<li>Evolves the website design by assisting Sr. Web Developer with information design.</li>
											<li>Promotes the importance of being brand alignment and grows/expands brand services and relationships.</li>
											<li>Manages, trains, and develops relationships when converting websites.</li>
											<li>Provides guidance on best practices of SEM and SEO trends.</li>
											<li>Develops tutorials and other training materials.</li>
											<li>Assists with graphic design, when needed.</li>
											<li>Performs other job related duties as assigned or requested.</li>
										</ul>
										<strong><span class="job-title">REQUIREMENTS:</span></strong>
										<ul>
											<li>Bachelor's degree or equivalent education/experience</li><li>2+ years of experience working with CMS platforms</li><li>Hands-on knowledge of web-based analytics tools and implementation</li><li>Ability to work interdepartmentally and externally with multiple points of contact</li><li>Customer service oriented</li><li>Proficient with Microsoft Office applications</li><li>Experience in HTML5, SEO, Bootstrap 3, PHP, JSP/JSF</li><li>Experience with the Liferay and dotCMS platforms</li><li>SEO and SEM experience</li><li>Familiarity with InDesign and other graphic design solutions</li>
										</ul>
										<div class="apply-now-div">
											<button class="btn browse-btn my-3">Apply Now</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="highlights02" role="tabpanel">
							<div class="details-content highlights-info">
								<h4 class="mb-4">Job Summary</h4>
								<div class="row">
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Location</h6>
											<p class="job-title">MANCHESTER, NJ 980877</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Job Type</h6>
											<p class="job-title">Full Time, Employee</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Posted</h6>
											<p class="job-title">Today</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Industries</h6>
											<p class="job-title">Computer Software</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Salary</h6>
											<p class="job-title">€10000-€20000</p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Career level</h6>
											<p class="job-title">Entry Level</p>
										</div>
										<!-- <div class="mb-4">
											<h6 class="mb-0">Contact name</h6>
											<p class="job-title">Patrick Solano</p>
										</div> -->
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="company03" role="tabpanel">
							<div class="details-content">
							<div class="job-des-container">
								<div class="card-content">
									<div class="details-content ml-0" id="JobDescription" tabindex="0">
										<h4>OSI Engineering</h4>
										<h5 class="mb-0">Company Description</h5>
										<p class="job-title">Full Time, Employee</p>
										<p>OSI is the premiere Managed Services and Staff Augmentation partner for today's tech leaders and tomorrow's luminaries. With over 20 years of experience, we bring expert knowledge of today's emerging technologies and deep relationships with the world's biggest, brightest, & boldest players to help you tackle employment demands with a targeted array of talent solutions.</p>
										<a class="company-link">View Company Profile</a>
									</div>
								</div>
							</div>
								<div class="row pt-3">
									<div class="col-md-6">
										<!-- <div class="mb-4">
											<h6 class="mb-0">Company Description</h6>
											<p class="job-title">Full Time, Employee</p>
										</div> -->
										<div class="mb-4">
											<h6 class="mb-0">Website</h6>
											<p class="job-title">http://www.OSIengineering.com</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Industry</h6>
											<p class="job-title">Staffing/Employment Agencies</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Founded</h6>
											<p class="job-title">2010</p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Company size</h6>
											<p class="job-title">100 to 499 employees</p>
										</div>
									</div>
								</div>
							</div>
							</div>
						</div>
						</div>
						</div>
					</div>

					<div class="card-header" id="mobile-headingtwo">
						<button class="btn browse-btn nav-link collapsed" type="button" data-toggle="collapse" data-target="#mobile-tab2" aria-expanded="true" aria-controls="mobile-tab2">
						<div class="row align-items-center">
							<div class="col-auto">
								<div class="company-logo">
									<img src="frontend/img/google.svg" class="company-img">
								</div>
							</div>
							<div class="col">
								<div class="row no-gutters">
									<div class="col pl-1 col-detail">
										<div class="header-title">
											<a href="#">Web Development Manager</a>
										</div>
										<div class="company col-sm-6">
											<span class="-name">Granicus</span>
										</div>
										<div class="location">
											<span class="-name"><i class="fa fa-map-marker"></i> San Francisco, CA</span>
										</div>
									</div>
									<div class="col-auto col-post">
										<div class="text-position">
											<span class="posted-by">Posted 15 days ago</span>
											<span class="expired-by">Expires in 1 day</span>
										</div>
									</div>
								</div>
							</div>
					</div>
					</button>
					</div>

					<div id="mobile-tab2" class="collapse" aria-labelledby="mobile-headingtwo" data-parent="#accordionExample1">
						<div class="card-body">
						<div class="mobile-result-data">
						<div class="cp-info">
						<div class="row align-items-center g-3">
							<div class="col-auto">
								<div class="company-logo save-job-logo">
									<img src="frontend/img/google.svg" class="company-img">
								</div>
							</div>
							<div class="col">
								<h4>PHP Developer - REMOTE at <span>CyberCoders Batavia, IL 60510 </span></h4>
							</div>
							<div class="col-auto apply-data">
								<div class="text-position mb-3">
									<button class="btn apply-btn">Apply at Employer's site 
									<img class="ml-2 not-hover" src="frontend/img/arrow.png">
									<img class="ml-2 on-hover" src="frontend/img/arrow-perple.png">
								</button>
								</div>
								<div class="job-action text-position">
									<span><a href="#"><i class="fa fa-heart-o"></i></a></span>
									<span><a href="#"><i class="fa fa-envelope"></i> Email</a></span>
								</div>
							</div>
						</div>
					</div>
					<div class="details-tab">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail001" role="tab" aria-controls="home" aria-selected="true">Details</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="highlights-tab" data-toggle="tab" href="#highlights002" role="tab" aria-controls="profile" aria-selected="false">Highlights</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="company-tab2" data-toggle="tab" href="#company003" role="tab" aria-controls="profile" aria-selected="false">Company</a>
							</li>
						</ul>
					</div>
					<div class="tab-content job-detail-bx" id="myTabContent">
						<div class="tab-pane fade show active" id="detail001" role="tabpanel">
							<div class="job-des-container">
								<div class="card-content">
									<div class="details-content" id="JobDescription" tabindex="0">
										<h4>Job Description & Requirements</h4>
										<p> Our client is seeking a Frontend Web Developer for an exciting contract to hire scenario. This position assists in managing, transitioning, and planning the design, functionality, and content upgrades to the organization's marketing website. This associate in this position will have an understanding of user-friendly design principles and intensive experience in customer service and promoting brand aligned principles.
										</p>
										<strong><span class="job-title">DUTIES:</span></strong>
										<ul>
											<li>Evolves the website design by assisting Sr. Web Developer with information design.</li>
											<li>Promotes the importance of being brand alignment and grows/expands brand services and relationships.</li>
											<li>Manages, trains, and develops relationships when converting websites.</li>
											<li>Provides guidance on best practices of SEM and SEO trends.</li>
											<li>Develops tutorials and other training materials.</li>
											<li>Assists with graphic design, when needed.</li>
											<li>Performs other job related duties as assigned or requested.</li>
										</ul>
										<strong><span class="job-title">REQUIREMENTS:</span></strong>
										<ul>
											<li>Bachelor's degree or equivalent education/experience</li><li>2+ years of experience working with CMS platforms</li><li>Hands-on knowledge of web-based analytics tools and implementation</li><li>Ability to work interdepartmentally and externally with multiple points of contact</li><li>Customer service oriented</li><li>Proficient with Microsoft Office applications</li><li>Experience in HTML5, SEO, Bootstrap 3, PHP, JSP/JSF</li><li>Experience with the Liferay and dotCMS platforms</li><li>SEO and SEM experience</li><li>Familiarity with InDesign and other graphic design solutions</li>
										</ul>
										<div class="apply-now-div">
											<button class="btn browse-btn my-3">Apply at Employer's site</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="highlights002" role="tabpanel">
							<div class="details-content highlights-info">
								<h4 class="mb-4">Job Summary</h4>
								<div class="row">
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Location</h6>
											<p class="job-title">MANCHESTER, NJ 980877</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Job Type</h6>
											<p class="job-title">Full Time, Employee</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Posted</h6>
											<p class="job-title">Today</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Industries</h6>
											<p class="job-title">Computer Software</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Salary</h6>
											<p class="job-title">€10000-€20000</p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Career level</h6>
											<p class="job-title">Entry Level</p>
										</div>
										<!-- <div class="mb-4">
											<h6 class="mb-0">Contact name</h6>
											<p class="job-title">Patrick Solano</p>
										</div> -->
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="company003" role="tabpanel">
							<div class="details-content">
								<div class="job-des-container">
								<div class="card-content">
									<div class="details-content ml-0" id="JobDescription" tabindex="0">
										<h4>OSI Engineering</h4>
										<h5 class="mb-0">Company Description</h5>
										<p class="job-title">Full Time, Employee</p>
										<p>OSI is the premiere Managed Services and Staff Augmentation partner for today's tech leaders and tomorrow's luminaries. With over 20 years of experience, we bring expert knowledge of today's emerging technologies and deep relationships with the world's biggest, brightest, & boldest players to help you tackle employment demands with a targeted array of talent solutions.</p>
										<a class="company-link">View Company Profile</a>
									</div>
								</div>
							</div>
								<div class="row pt-3">
									<div class="col-md-6">
										<!-- <div class="mb-4">
											<h6 class="mb-0">Company Description</h6>
											<p class="job-title">Full Time, Employee</p>
										</div> -->
										<div class="mb-4">
											<h6 class="mb-0">Website</h6>
											<p class="job-title">http://www.OSIengineering.com</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Industry</h6>
											<p class="job-title">Staffing/Employment Agencies</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Founded</h6>
											<p class="job-title">2010</p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Company size</h6>
											<p class="job-title">100 to 499 employees</p>
										</div>
									</div>
								</div>
							</div>
							</div>
						</div>
						</div>
					</div>
					</div>

					<div class="card-header" id="mobile-headingtwothree">
						<button class="btn browse-btn nav-link collapsed" type="button" data-toggle="collapse" data-target="#mobile-tab3" aria-expanded="true" aria-controls="mobile-tab3">
						<div class="row align-items-center">
								<div class="col-auto">
									<div class="company-logo">
										<img src="frontend/img/company-logo.png" class="company-img">
									</div>
								</div>
								<div class="col">
									<div class="row">
										<div class="col pl-1 col-detail">
											<div class="header-title">
												<a href="#">Web Developer/ Software Engineer</a>
											</div>
											<div class="company">
												<span class="-name">E-Talent Network</span>
											</div>
											<div class="location">
												<span class="-name"><i class="fa fa-map-marker"></i> San Francisco, CA</span>
											</div>
										</div>
										<div class="col-auto col-post">
											<div class="text-position">
												<span class="posted-by">Posted 2 days ago</span>
												<span class="expired-by">Expires in 15 days</span>
											</div>
										</div>
									</div>
								</div>
							</div>
					</button>
					</div>

					<div id="mobile-tab3" class="collapse" aria-labelledby="mobile-headingthree" data-parent="#accordionExample1">
						<div class="card-body">
						<div class="mobile-result-data">
					<div class="cp-info">
						<div class="row align-items-center g-3">
							<div class="col-auto">
								<div class="company-logo save-job-logo">
									<img src="frontend/img/google.svg" class="company-img">
								</div>
							</div>
							<div class="col">
								<h4>PHP Developer - REMOTE at <span>CyberCoders Batavia, IL 60510 </span></h4>
							</div>
							<div class="col-auto apply-data">
								<div class="text-position mb-3">
									<button class="btn apply-btn">Apply Now</button>
								</div>
								<div class="job-action text-position">
									<span><a href="#"><i class="fa fa-heart-o"></i></a></span>
									<span><a href="#"><i class="fa fa-envelope"></i> Email</a></span>
								</div>
							</div>
						</div>
					</div>
					<div class="details-tab">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="detail-tab01" data-toggle="tab" href="#detail0001" role="tab" aria-controls="home" aria-selected="true">Details</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="highlights-tab" data-toggle="tab" href="#highlights0002" role="tab" aria-controls="profile" aria-selected="false">Highlights</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="company-tab" data-toggle="tab" href="#company0003" role="tab" aria-controls="profile" aria-selected="false">Company</a>
							</li>
						</ul>
					</div>
					<div class="tab-content job-detail-bx" id="myTabContent">
						<div class="tab-pane fade show active" id="detail0001" role="tabpanel">
							<div class="job-des-container">
								<div class="card-content">
									<div class="details-content" id="JobDescription" tabindex="0">
										<h4>Job Description & Requirements</h4>
										<p> Our client is seeking a Frontend Web Developer for an exciting contract to hire scenario. This position assists in managing, transitioning, and planning the design, functionality, and content upgrades to the organization's marketing website. This associate in this position will have an understanding of user-friendly design principles and intensive experience in customer service and promoting brand aligned principles.
										</p>
										<strong><span class="job-title">DUTIES:</span></strong>
										<ul>
											<li>Evolves the website design by assisting Sr. Web Developer with information design.</li>
											<li>Promotes the importance of being brand alignment and grows/expands brand services and relationships.</li>
											<li>Manages, trains, and develops relationships when converting websites.</li>
											<li>Provides guidance on best practices of SEM and SEO trends.</li>
											<li>Develops tutorials and other training materials.</li>
											<li>Assists with graphic design, when needed.</li>
											<li>Performs other job related duties as assigned or requested.</li>
										</ul>
										<strong><span class="job-title">REQUIREMENTS:</span></strong>
										<ul>
											<li>Bachelor's degree or equivalent education/experience</li><li>2+ years of experience working with CMS platforms</li><li>Hands-on knowledge of web-based analytics tools and implementation</li><li>Ability to work interdepartmentally and externally with multiple points of contact</li><li>Customer service oriented</li><li>Proficient with Microsoft Office applications</li><li>Experience in HTML5, SEO, Bootstrap 3, PHP, JSP/JSF</li><li>Experience with the Liferay and dotCMS platforms</li><li>SEO and SEM experience</li><li>Familiarity with InDesign and other graphic design solutions</li>
										</ul>
										<div class="apply-now-div">
											<button class="btn browse-btn my-3">Apply Now</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="highlights0002" role="tabpanel">
							<div class="details-content highlights-info">
								<h4 class="mb-4">Job Summary</h4>
								<div class="row">
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Location</h6>
											<p class="job-title">MANCHESTER, NJ 980877</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Job Type</h6>
											<p class="job-title">Full Time, Employee</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Posted</h6>
											<p class="job-title">Today</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Industries</h6>
											<p class="job-title">Computer Software</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Salary</h6>
											<p class="job-title">€10000-€20000</p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Career level</h6>
											<p class="job-title">Entry Level</p>
										</div>
										<!-- <div class="mb-4">
											<h6 class="mb-0">Contact name</h6>
											<p class="job-title">Patrick Solano</p>
										</div> -->
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="company0003" role="tabpanel">
							<div class="details-content">
								<div class="job-des-container">
								<div class="card-content">
									<div class="details-content ml-0" id="JobDescription" tabindex="0">
										<h4>OSI Engineering</h4>
										<h5 class="mb-0">Company Description</h5>
										<p class="job-title">Full Time, Employee</p>
										<p>OSI is the premiere Managed Services and Staff Augmentation partner for today's tech leaders and tomorrow's luminaries. With over 20 years of experience, we bring expert knowledge of today's emerging technologies and deep relationships with the world's biggest, brightest, & boldest players to help you tackle employment demands with a targeted array of talent solutions.</p>
										<a class="company-link">View Company Profile</a>
									</div>
								</div>
							</div>
								<div class="row pt-3">
									<div class="col-md-6">
										<!-- <div class="mb-4">
											<h6 class="mb-0">Company Description</h6>
											<p class="job-title">Full Time, Employee</p>
										</div> -->
										<div class="mb-4">
											<h6 class="mb-0">Website</h6>
											<p class="job-title">http://www.OSIengineering.com</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Industry</h6>
											<p class="job-title">Staffing/Employment Agencies</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Founded</h6>
											<p class="job-title">2010</p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Company size</h6>
											<p class="job-title">100 to 499 employees</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>
					</div>
					</div>

					<div class="card-header" id="mobile-headingfour">
						<button class="btn browse-btn nav-link collapsed" type="button" data-toggle="collapse" data-target="#mobile-tab4" aria-expanded="true" aria-controls="mobile-tab4">
						<div class="row align-items-center">
						<div class="col-auto">
							<div class="company-logo">
								<img src="frontend/img/apple.svg" class="company-img">
							</div>
						</div>
						<div class="col">
							<div class="row">
								<div class="col pl-1 col-detail">
									<div class="header-title">
										<a href="#">Senior Visual Designer</a>
									</div>
									<div class="company">
										<span class="-name">E-Talent Network</span>
									</div>
									<div class="location">
										<span class="-name"><i class="fa fa-map-marker"></i> San Francisco, CA</span>
									</div>
								</div>
								<div class="col-auto col-post">
									<div class="text-position">
										<span class="posted-by">Posted 3 days ago</span>
										<span class="expired-by">Expires in 15 days</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					</button>
					</div>
					<div id="mobile-tab4" class="collapse" aria-labelledby="mobile-headingfour" data-parent="#accordionExample1">
						<div class="card-body">
						<div class="mobile-result-data">
					<div class="cp-info">
						<div class="row align-items-center g-3">
							<div class="col-auto">
								<div class="company-logo save-job-logo">
									<img src="frontend/img/google.svg" class="company-img">
								</div>
							</div>
							<div class="col">
								<h4>PHP Developer - REMOTE at <span>CyberCoders Batavia, IL 60510 </span></h4>
							</div>
							<div class="col-auto apply-data">
								<div class="text-position mb-3">
									<button class="btn apply-btn">Apply Now</button>
								</div>
								<div class="job-action text-position">
									<span><a href="#"><i class="fa fa-heart-o"></i></a></span>
									<span><a href="#"><i class="fa fa-envelope"></i> Email</a></span>
								</div>
							</div>
						</div>
					</div>
					<div class="details-tab">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="detail-tab01" data-toggle="tab" href="#detail00001" role="tab" aria-controls="home" aria-selected="true">Details</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="highlights-tab" data-toggle="tab" href="#highlights00002" role="tab" aria-controls="profile" aria-selected="false">Highlights</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="company-tab" data-toggle="tab" href="#company00003" role="tab" aria-controls="profile" aria-selected="false">Company</a>
							</li>
						</ul>
					</div>
					<div class="tab-content job-detail-bx" id="myTabContent">
						<div class="tab-pane fade show active" id="detail00001" role="tabpanel">
							<div class="job-des-container">
								<div class="card-content">
									<div class="details-content" id="JobDescription" tabindex="0">
										<h4>Job Description & Requirements</h4>
										<p> Our client is seeking a Frontend Web Developer for an exciting contract to hire scenario. This position assists in managing, transitioning, and planning the design, functionality, and content upgrades to the organization's marketing website. This associate in this position will have an understanding of user-friendly design principles and intensive experience in customer service and promoting brand aligned principles.
										</p>
										<strong><span class="job-title">DUTIES:</span></strong>
										<ul>
											<li>Evolves the website design by assisting Sr. Web Developer with information design.</li>
											<li>Promotes the importance of being brand alignment and grows/expands brand services and relationships.</li>
											<li>Manages, trains, and develops relationships when converting websites.</li>
											<li>Provides guidance on best practices of SEM and SEO trends.</li>
											<li>Develops tutorials and other training materials.</li>
											<li>Assists with graphic design, when needed.</li>
											<li>Performs other job related duties as assigned or requested.</li>
										</ul>
										<strong><span class="job-title">REQUIREMENTS:</span></strong>
										<ul>
											<li>Bachelor's degree or equivalent education/experience</li><li>2+ years of experience working with CMS platforms</li><li>Hands-on knowledge of web-based analytics tools and implementation</li><li>Ability to work interdepartmentally and externally with multiple points of contact</li><li>Customer service oriented</li><li>Proficient with Microsoft Office applications</li><li>Experience in HTML5, SEO, Bootstrap 3, PHP, JSP/JSF</li><li>Experience with the Liferay and dotCMS platforms</li><li>SEO and SEM experience</li><li>Familiarity with InDesign and other graphic design solutions</li>
										</ul>
										<div class="apply-now-div">
											<button class="btn browse-btn my-3">Apply Now</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="highlights00002" role="tabpanel">
							<div class="details-content highlights-info">
								<h4 class="mb-4">Job Summary</h4>
								<div class="row">
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Location</h6>
											<p class="job-title">MANCHESTER, NJ 980877</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Job Type</h6>
											<p class="job-title">Full Time, Employee</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Posted</h6>
											<p class="job-title">Today</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Industries</h6>
											<p class="job-title">Computer Software</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Salary</h6>
											<p class="job-title">€10000-€20000</p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Career level</h6>
											<p class="job-title">Entry Level</p>
										</div>
										<!-- <div class="mb-4">
											<h6 class="mb-0">Contact name</h6>
											<p class="job-title">Patrick Solano</p>
										</div> -->
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="company00003" role="tabpanel">
							<div class="details-content">
								<div class="job-des-container">
								<div class="card-content">
									<div class="details-content ml-0" id="JobDescription" tabindex="0">
										<h4>OSI Engineering</h4>
										<h5 class="mb-0">Company Description</h5>
										<p class="job-title">Full Time, Employee</p>
										<p>OSI is the premiere Managed Services and Staff Augmentation partner for today's tech leaders and tomorrow's luminaries. With over 20 years of experience, we bring expert knowledge of today's emerging technologies and deep relationships with the world's biggest, brightest, & boldest players to help you tackle employment demands with a targeted array of talent solutions.</p>
										<a class="company-link">View Company Profile</a>
									</div>
								</div>
							</div>
								<div class="row pt-3">
									<div class="col-md-6">
										<!-- <div class="mb-4">
											<h6 class="mb-0">Company Description</h6>
											<p class="job-title">Full Time, Employee</p>
										</div> -->
										<div class="mb-4">
											<h6 class="mb-0">Website</h6>
											<p class="job-title">http://www.OSIengineering.com</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Industry</h6>
											<p class="job-title">Staffing/Employment Agencies</p>
										</div>
										<div class="mb-4">
											<h6 class="mb-0">Founded</h6>
											<p class="job-title">2010</p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="mb-0">Company size</h6>
											<p class="job-title">100 to 499 employees</p>
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
					</div>
					</div>
					</div>
					</div>
					</div>
				</div>
			</div>
		</homelayout>
	</main>
</template>

<script>
export default {
	data(){
		return{
			dataCategory: [],
		}
	},
	mounted()
	{
		this.getCategory();
		setTimeout(function(){
		//$('.abcd').addClass('jobOptions');
		$('.mainSearchSection').addClass('searchA');
		$('.job-search-container').addClass('searchB')
		$('.slide-hide-txt').hide(); 
		}, 100);

		 
			
	},
	methods:
    {
        getCategory() {
           axios.get('/api/front/getCategory')
                .then( (response) => { 
                 this.dataCategory = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
			},
			search()
            {
                // let self = this;
                // $('.loaderBck').show();               
                // setTimeout(function(){
                //  $('.loaderBck').hide();
                //  /*$('.slide-hide-txt').slideUp( 300 ).delay( 500 ).fadeOut( 400 );*/                 
                //  self.$router.push("/search");
                // }, 500);
              
                
            },
            
    },
}
</script>