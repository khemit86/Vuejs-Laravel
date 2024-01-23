<template>
    <main>
        <homelayout>
	        <div class="inner-account-section" slot="frontbody">
                <div class="container">
                  <div class="work-experiance">
                    <router-link to="/candidate/profile"><i class="fa fa-angle-left"></i> Your profile</router-link>
                    <div class="profile-detail-form">
                     <h2>Looking For</h2>
                     <ValidationObserver v-slot="{ invalid }">
                     <form @submit.prevent="submit" ref="frm_looking" id="frm_looking" class="ajax-form" enctype='multipart/form-data'>
                         <ValidationProvider rules="required" v-slot="{ errors }"> 
                          <div class="form-group row">
                              <label class="col-md-10" for="title">Job title</label>
                              <div class="col-md-10">                                
                                <input type="text" class="form-control" name="job_title" id="job_title" v-model="job_title">
                              </div>
                              <span class="help-block" style="color:red">{{ errors[0] }}</span>
                              <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.job_title">
                                    <span>{{ laravelErrors.job_title[0] }}</span>
                              </div>
                          </div>
                         </ValidationProvider>

                         <ValidationProvider rules="required" v-slot="{ errors }"> 
                        <div class="form-group row">
                            <label class="col-md-10" for="company">Work Type</label>
                            <div class="col-md-10">
                              <div class="col-md-3 form-group radio-plan steps-radio">
                                <p>
                                    <input type="radio" id="worktype1" v-model="work_type" name="work_type" value="1"><label for="worktype1">Full Time</label>
                                </p>
						        </div>
                              <div class="col-md-3 form-group radio-plan steps-radio">
                                <p>
                                   <input type="radio" id="worktype2" v-model="work_type" name="work_type" value="2"><label for="worktype2">Part Time</label>
                                </p>
                              </div>
                              <div class="col-md-3 form-group radio-plan steps-radio">
                                <p>
                                  	<input type="radio" id="worktype3" v-model="work_type" name="work_type" value="3"><label for="worktype3">Temporary</label>
                                </p>
                              </div>
							 <div class="col-md-3 form-group radio-plan steps-radio">
								<p>
									<input type="radio" id="worktype4" v-model="work_type" name="work_type" value="4"><label for="worktype4">Contract</label>
								</p>
							 </div>
                            <div class="col-md-3 form-group radio-plan steps-radio">
                             	 <p>
                                 	<input type="radio" id="worktype4" v-model="work_type" name="work_type" value="5"><label for="worktype4">Internship</label>
                              	</p>
                              </div>
                            </div>
                            <span class="help-block" style="color:red">{{ errors[0] }}</span>
                              <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.work_type">
                                    <span>{{ laravelErrors.work_type[0] }}</span>
                              </div>
                        </div>
                        </ValidationProvider>

                        <ValidationProvider rules="required" v-slot="{ errors }"> 
                          <div class="form-group row">
                              <label class="col-md-10" for="title">Salary (Minimum)</label>
                              <div class="col-md-10">                                
                                <input type="text" class="form-control" name="salary" id="salary" v-model="salary">
                              </div>
                              <span class="help-block" style="color:red">{{ errors[0] }}</span>
                              <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.salary">
                                    <span>{{ laravelErrors.salary[0] }}</span>
                              </div>
                          </div>
                         </ValidationProvider>

                         
                          <div class="form-group row">
                              <label class="col-md-10" for="title">Industries Of Operation</label>
                              <div class="col-md-10">                                
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
                              </div>                              
                          </div>
                      

                          <ValidationProvider rules="required" v-slot="{ errors }"> 
                          <div class="form-group row">
                              <label class="col-md-10" for="title">Location</label>
                              <div class="col-md-10">                                
                                 <select class="form-control" name="location" id="location" v-model="location">
                                    <option value="" selected="selected">Select Location*</option>
                                    <option value="Nicosia">Nicosia</option>
                                    <option value="Larnaca">Larnaca</option>
                                    <option value="Limassol">Limassol</option>
                                    <option value="Paphos">Paphos</option>
                                    <option value="Famagusta">Famagusta</option>
                                </select>
                              </div>
                              <span class="help-block" style="color:red">{{ errors[0] }}</span>
                              <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.location">
                                    <span>{{ laravelErrors.location[0] }}</span>
                              </div>
                          </div>
                         </ValidationProvider>
                        
                   
                       
                        <div class="row">
                          <div class="col-md-12">
                            <div class="btn btn-inline">
                                <button class="btn cancel-btn" type="button">Cancel</button>
                                <button class="btn cancel-btn blue-bg" type="submit" id="btnSubmit" :disabled="invalid">
                                  <span><img src="/img/waiting.gif" width="21px" class="btnLoading" style="display:none"  /></span>
                                  Save 
                                </button>
                                <!-- <button class="btn cancel-btn save-btn" type="submit" :disabled="invalid">
                                  <span><img src="/img/waiting.gif" width="21px" class="btnLoading" style="display:none"  /></span>
                                  Save
                                </button> -->
                            </div>
                          </div>
                        </div>
                    </form>
                     </ValidationObserver>
                  </div>
                 </div>
                </div>
            </div>
        </homelayout>
    </main>
</template>
<script>
export default {
	 data() {
			return {
				job_title: '',
				work_type: '',
				salary: '',
				location: '',
				laravelErrors: {},  
        		dataCategory: [],              
			}
		},
	mounted()
	{
		this.getCategory();
		 $(document).ready(function ()
		 {    
			$('html, body').animate({
				scrollTop: $('.inner-account-section').offset().top
			}, 'slow');
    	});
	},
	methods: {    
     getCategory() {
           axios.get('/api/front/getCategory')
                .then( (response) => { 
                 this.dataCategory = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
			},		
		submit() {
					$('.btnLoading').show();
					this.laravelErrors = {};
					let formData = new FormData(this.$refs.frm_work);
				  axios.post('/api/front/candidate/profile/addworkexp', formData).then(response => {
							$('.btnLoading').hide();
						if(response.data.status == 200)
            {
                this.flashMessage.success({                                   
                          message: response.data.message
                      });
                this.$router.push("/candidate/profile");
            }
            else
            {          
              this.flashMessage.error({                                   
                        message: response.data.message
                      });
            }                         
					}).catch(error => {
							$('.btnLoading').hide();
						if (error.response.status === 422) 
						{
							this.laravelErrors = error.response.data.errors || {};
						}
						else if(error.response.status === 500)
						{
								this.flashMessage.error({
									message: 'Oops! Email not changed!'                      
							});
						}
					});
            	},
				changePassword()
				{
					$('.btnLoading').show();
					this.laravelErrors = {};
					let formData = new FormData(this.$refs.frm_changePassword);
					axios.post('/api/front/candidate/changePassword', formData).then(response => {
							$('.btnLoading').hide();
						if(response.data.status == 200)
						{
							$('#frm_changePassword')[0].reset();
							$("#password_form").slideToggle();
							$('#btnPassword').show();
							$('.btnLoading').hide();
							this.flashMessage.success({                                   
									message: response.data.message
								});							
						}
						else if(response.data.status == 501)
						{
								this.flashMessage.error({
									message: response.data.message                          
							});
						}                      
					}).catch(error => {
							$('.btnLoading').hide();
						if (error.response.status === 422) 
						{
							this.laravelErrors = error.response.data.errors || {};
						}
						else if(error.response.status === 500)
						{
								this.flashMessage.error({
									message: 'Oops! Password not changed!'                      
							});
						}
					});
				},
				deleteAccount()
				{
					$('.btnLoading').show();
					this.laravelErrors = {};
					let formData = new FormData(this.$refs.frm_deleteAccount);
					axios.post('/api/front/candidate/deletePassword', formData).then(response => {

						$('.btnLoading').hide();
						if(response.data.status == 200)
						{
							$('#frm_deleteAccount')[0].reset();
							$("#location_form").slideToggle();
							$('#btnLocation').show();							
							localStorage.removeItem('authUser');
							this.flashMessage.success({                                   
								message: response.data.message
							});	
							this.$router.push("/login");
												
						}
						else if(response.data.status == 501)
						{
								this.flashMessage.error({
									message: response.data.message                          
							});
						}    

					});
				},
	},
}
</script>

