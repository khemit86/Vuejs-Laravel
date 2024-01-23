<template>
    <main>
        <homelayout>
	        <div class="inner-account-section" slot="frontbody">
                <div class="container">
                  <div class="work-experiance">
                    <router-link to="/candidate/profile"><i class="fa fa-angle-left"></i> Your profile</router-link>
                    <div class="profile-detail-form">
                     <h2>Add Work Experiance</h2>
                     <ValidationObserver v-slot="{ invalid }">
                     <form @submit.prevent="submit" ref="frm_work" id="frm_work" class="ajax-form" enctype='multipart/form-data'>
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
                            <label class="col-md-10" for="company">Company</label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" name="company" id="company" v-model="company">
                            </div>
                            <span class="help-block" style="color:red">{{ errors[0] }}</span>
                              <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.company">
                                    <span>{{ laravelErrors.company[0] }}</span>
                              </div>
                        </div>
                        </ValidationProvider>
                        
                        <div class="form-group row">
                            <div class="date-dection">
                            <label class="col-md-10" for="company">From</label>
                            <div class="col-md-10">
                              <ValidationProvider rules="required" v-slot="{ errors }">
                              <div class="month">
                                <select class="form-control" name="from_month" id="from_month" v-model="from_month">
                                    <option value="">Month</option>
                                     <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <span class="help-block" style="color:red">{{ errors[0] }}</span>
                                <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.from_month">
                                      <span>{{ laravelErrors.from_month[0] }}</span>
                                </div>
                              </div>
                              </ValidationProvider>
                              <ValidationProvider rules="required" v-slot="{ errors }">
                              <div class="month year">
                                <select class="form-control" name="from_year" id="from_year" v-model="from_year">
                                    <option value="">Year</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                </select>
                                <span class="help-block" style="color:red">{{ errors[0] }}</span>
                                <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.from_year">
                                  <span>{{ laravelErrors.from_year[0] }}</span>
                                </div>
                              </div>
                              </ValidationProvider>
                              <div class="check-form">
                                  <label><input type="checkbox" name="is_current" value="1">I currently work here</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                            <div class="date-dection">
                            <label class="col-md-10" for="company">To</label>
                            <div class="col-md-10">
                              <ValidationProvider rules="required" v-slot="{ errors }">
                              <div class="month">                                
                                <select class="form-control" name="to_month" id="to_month" v-model="to_month">
                                    <option value="">Month</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select> 
                                <span class="help-block" style="color:red">{{ errors[0] }}</span>
                                <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.to_month">
                                  <span>{{ laravelErrors.to_month[0] }}</span>
                                </div>                              
                              </div>
                              </ValidationProvider>

                              <ValidationProvider rules="required" v-slot="{ errors }">
                              <div class="month year">
                                <select class="form-control" name="to_year" id="to_year" v-model="to_year">
                                    <option value="">Year</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                </select>
                                <span class="help-block" style="color:red">{{ errors[0] }}</span>
                                <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.to_year">
                                  <span>{{ laravelErrors.to_year[0] }}</span>
                                </div>
                              </div>
                              </ValidationProvider>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-12" for="company">What did you do there?</label>
                            <div class="col-md-12">
                              <textarea class="form-control" name="description" id="description" v-model="description"></textarea>
                              <!-- <p v-text="(description.length)">2000/1800</p> -->
                            </div>
                        </div>
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
				email: '',
				job_title: '',
				company: '',
				description: '',
				from_month: '',
				from_year: '',
        to_month: '',
				to_year: '',
				laravelErrors: {},                
			}
		},
	mounted()
	{
		 $(document).ready(function () {
    
        $('html, body').animate({
            scrollTop: $('.inner-account-section').offset().top
        }, 'slow');
    });
	},
	methods: {
		
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

