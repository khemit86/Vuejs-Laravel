<template>
 <main>
   <homelayout>
    <div class="inner-account-section" slot="frontbody">
	 <div class="account-section">
	  <div class="container">
	 	<h2>Your account </h2>
	<div class="row">
	  <div class="col-md-10">
	   <div class="account-tab-list">
	 	  <ul class="nav nav-tabs">
			  <li class="nav-item">
			    <a class="nav-link active" data-toggle="tab" href="#account-setting">Account settings</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" data-toggle="tab" href="#contact-preference">Contact preferences</a>
			  </li>
			  <div class="account-right-btn">
			    <router-link to="/candidate/profile" class="btn profile-btn">Profile</router-link>
			 </div>
		   </ul>
	 	</div>
	    <div class="account-information">
		  <div class="tab-content">
			<div class="tab-pane active" id="account-setting">
			   <div class="account-info-section">
				<h4>Edit your details below</h4>
				 <ValidationObserver v-slot="{ invalid }">
					<form @submit.prevent="submit" ref="frm_changeemail" id="frm_changeemail" class="ajax-form" enctype='multipart/form-data'>
					<div class="email-section">
					<div class="email-left">
						<h3>Email address</h3>	
						<p>{{ candidateData.email }}</p>			  
					</div>
					<div class="email-right-form">
						<button type="button" class="btn email-btn" id="btnEmail">Change email address</button>
						<div class="email-form" id="email_form" style="display: none;">
						 <ValidationProvider rules="required|email" v-slot="{ errors }"> 
							<div class="form-group">
								<label>New email</label>
								<div class="input-box">
									<input type="text" class="form-control" name="email" id="email" v-model="email">
								</div>
								<span class="help-block" style="color:red">{{ errors[0] }}</span>
								<div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.email">
                                    <span>{{ laravelErrors.email[0] }}</span>
                                </div>
							</div>
						</ValidationProvider>
						<ValidationProvider rules="required" v-slot="{ errors }">
						<div class="form-group">
							<label>Enter your password to continue</label>
								<div class="input-box">
									<input type="password" class="form-control" name="password" id="password" v-model="password">
								</div>
							<span class="help-block" style="color:red">{{ errors[0] }}</span>
							<div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.password">
                                    <span>{{ laravelErrors.password[0] }}</span>
                            </div>
						</div>
						</ValidationProvider>
						<button class="btn email-btn" type="submit"  :disabled="invalid">Save Email
							<span><img src="/img/waiting.gif" width="21px" class="btnLoading" style="display:none"  /></span>
						</button>
						</div>
					</div>
					</div>
					</form>
				 </ValidationObserver>
				 <ValidationObserver v-slot="{ invalid }">
					<form @submit.prevent="changePassword" ref="frm_changePassword" id="frm_changePassword" class="ajax-form" enctype='multipart/form-data'>
						<div class="email-section password-detail">
						<div class="email-left">
							<h3>Password</h3>
							<p id="phoneLength">-At least 8 characters and a maximum of 20 characters</p>
							<p id="oneSpecial">-At least 1 special character (. ! @ # & ( ).+)</p>
							<p id="oneNumber">-At least 1 number [0-9]</p>
							<p id="oneSmallLetter">-At least one lowercase Latin character [a-z]</p>
							<p id="oneCapLetter">-At least one uppercase Latin character [A-Z]</p>
						</div>
						<div class="email-right-form">
							<button class="btn email-btn" type="button" id="btnPassword">Change password</button>
							<div class="email-form" id="password_form" style="display: none;">
								<ValidationProvider rules="required" v-slot="{ errors }">
									<div class="form-group">
										<label>Current password</label>
										<div class="input-box">
											<input type="password" class="form-control" name="current_password" id="current_password" v-model="current_password">
										</div>
										<span class="help-block" style="color:red">{{ errors[0] }}</span>
                                        <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.current_password">
                                            <span>{{ laravelErrors.current_password[0] }}</span>
                                        </div>
									</div>
								</ValidationProvider>
								<ValidationProvider rules="required" v-slot="{ errors }">
								<div class="form-group">
									<label>New password</label>
									<div class="input-box">
										<input type="password" class="form-control" name="new_password" id="new_password"  v-model="new_password">
									</div>
									<span class="help-block" style="color:red">{{ errors[0] }}</span>
									<div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.new_password">
										<span>{{ laravelErrors.new_password[0] }}</span>
									</div>
								</div>
								</ValidationProvider>
								<ValidationProvider rules="required" v-slot="{ errors }">
								<div class="form-group">
									<label>Confirm password</label>
									<div class="input-box">
										<input type="password" class="form-control" name="confirm_password" id="confirm_password" v-model="confirm_password">
									</div>
									<span class="help-block" style="color:red">{{ errors[0] }}</span>
									<div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.confirm_password">
										<span>{{ laravelErrors.confirm_password[0] }}</span>
									</div>
								</div>
								</ValidationProvider>
								<button class="btn email-btn" :disabled="invalid" type="submit" id="btnChangePassword">Save Password</button>
							</div>
						</div>
						</div>
					</form>
				</ValidationObserver>
				<ValidationObserver v-slot="{ invalid }">
					<form @submit.prevent="deleteAccount" ref="frm_deleteAccount" id="frm_deleteAccount" class="ajax-form" enctype='multipart/form-data'>
						<div class="email-section password-detail">
						<div class="email-left">
							<h3>Account Termination</h3>
						</div>
						<div class="email-right-form termination-account">
							<button class="btn email-btn"  id="btnLocation" type="button">Delete Account</button>
							<div class="email-form" id="location_form" style="display: none;">
							<div class="form-group">
								<label>If you want to continue with the termination of your account please enter your password below.</label>
							</div>
							<ValidationProvider rules="required" v-slot="{ errors }">
							<div class="form-group">
								<label>Password</label>
								<div class="input-box">
									<input type="password" class="form-control" name="delete_password" id="delete_password" v-model="delete_password">
								</div>
								<span class="help-block" style="color:red">{{ errors[0] }}</span>
								<div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.delete_password">
									<span>{{ laravelErrors.delete_password[0] }}</span>
								</div>
							</div>
							</ValidationProvider>
							<button class="btn cancel-btn" id="btnCancel" type="button">Cancel</button>
							<button class="btn delete-btn" id="btnDelete" type="submit" :disabled="invalid">Delete</button>
							</div>
						</div>
						</div>
					</form>
				</ValidationObserver>
			  </div>
			</div>
			<div class="tab-pane" id="contact-preference">
			   <div class="contact-preference">
				<h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h4>
				<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>
				<article class="contact-list">
				  <h3>Alerts & job news</h3>
				   <div class="input-container">
				  	 <fieldset class="checkbox form-group">
				  		<input class="contact-preferences-option" id="JobAlerts" name="JobAlerts" type="checkbox" data-key="0" data-preference="32" value="true" checked="">
				  		<label><h4>Job Alerts</h4><p>Get email alerts for jobs that match your saved searches.<br><br>You have one active Job Alerts. <a href="#">Manage your alerts <i class="icon icon-arrow-blue-right"></i></a></p></label></fieldset>
				  	 </div>
				  	 <div class="input-container">
				  		<fieldset class="checkbox form-group">
				  		<input class="contact-preferences-option" id="JobAlerts" name="JobAlerts" type="checkbox" data-key="0" data-preference="32" value="true" checked="">
				  		<label><h4>Job news</h4><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p></label>
				  	  </fieldset>
				  	 </div>
				  </article>
			     <article class="contact-list">
				  <h3>Career development</h3>
				   <div class="input-container">
				  	 <fieldset class="checkbox form-group">
				  		<input class="contact-preferences-option" id="JobAlerts" name="JobAlerts" type="checkbox" data-key="0" data-preference="32" value="true" checked="">
				  		<label><h4>Career Advice</h4><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p></label></fieldset>
				  	 </div>
				</article>


				<button class="btn email-btn">Unsubscribe from all</button>

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
	 data() {
			return {
				email: '',
				password: '',
				current_password: '',
				new_password: '',
				confirm_password: '',
				delete_password: '',
				laravelErrors: {},
				candidateData: [],                    
			}
		},
	mounted()
	{
		this.getData();
		$("#btnEmail").click(function()
		{		
			$(this).hide();	 		
			$("#email_form").slideToggle()
		}); 

		$("#btnPassword").click(function()
		{		
			$(this).hide();	
			$("#password_form").slideToggle()
		}); 

		$("#btnLocation").click(function()
		{		
			$(this).hide();
			$("#location_form").slideToggle()
		});
		$("#btnCancel").click(function()
		{		
			$('#btnLocation').show();
			$("#location_form").slideToggle()
		}); 
		
		$('#new_password').on('keyup keydown', function(e) 
		{
			var phone = $(this).val();
			var re = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=]).{8,20}$/;
			var oneNumber = /^(?=.*\d)/;
			var oneSmallLetter = /^(?=.*\d)(?=.*[a-z])$/;
			var oneCapLetter = /^(?=.*[A-Z])$/;
			var oneSpecial = /^(?=.*[@#$%^&+=])$/;
			var isValid = 1;
			if(/[0-9]/.test(phone))
			{
				$('#oneNumber').css('color','green');
			}
			else
			{
				$('#oneNumber').css('color','red');
				isValid = 0;
			}
			if(/[a-z]/.test(phone))
			{
				$('#oneSmallLetter').css('color','green');         
			}
			else
			{
				$('#oneSmallLetter').css('color','red');      
				isValid = 0;  
			}
			if(/[A-Z]/.test(phone))
			{
				$('#oneCapLetter').css('color','green');         
			}
			else
			{
				$('#oneCapLetter').css('color','red');  
				isValid =0;      
			}
			if(/[@#$%^&+=!()]/.test(phone))
			{
				$('#oneSpecial').css('color','green');         
			}
			else
			{
				$('#oneSpecial').css('color','red'); 
				isValid= 0;       
			}
			if(phone.length < 8 || phone.length > 20)
			{
				$('#phoneLength').css('color','red');
				isValid = 0;
			}
			else
			{
				$('#phoneLength').css('color','green');
			}
			if(isValid == 0)
			{
				$('#btnSubmit').attr('disabled',true);
			}
			else
			{
				$('#btnSubmit').attr('disabled',false); 
			}
				
		});
	},
	methods: {
		getData()
		{
			axios.get('/api/front/candidate/account/getCandidate').then(response => {
				this.candidateData = response.data;
			});
		},
		submit() {
					$('.btnLoading').show();
					this.laravelErrors = {};
					let formData = new FormData(this.$refs.frm_changeemail);
					axios.post('/api/front/candidate/account/changeemail', formData).then(response => {
							$('.btnLoading').hide();
						if(response.data.status == 200)
						{
							$('#frm_changeemail')[0].reset();
							$('#btnEmail').show();
							$("#email_form").slideToggle();
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
					axios.post('/api/front/candidate/account/changePassword', formData).then(response => {
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
					axios.post('/api/front/candidate/account/deletePassword', formData).then(response => {

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
