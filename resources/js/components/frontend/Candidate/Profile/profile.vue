<template>
  <main>
   <homelayout>
	<div class="inner-account-section" slot="frontbody">
	  <div class="profile-section">
	  	<div class="container">
			  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalPDF" style="display:none" id="btnModal">
                        Launch demo modal
    </button>
	<div id="myModalPDF" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <!-- <h4 class="modal-title">CV File</h4> -->
                    </div>
                    <div class="modal-body">

                        <embed id="pdfFile" src="" frameborder="0" width="100%">

                        <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div> -->
                    </div>

                </div>
            </div>
        </div>

	  	  <h2>Profile & CV <router-link to="/candidate/account/edit_details" class="btn profile-btn">Account</router-link></h2>	  	 
	  	  <div class="row">	  	  	 
	  	  	 <div class="col-md-8">			
				<form @submit.prevent="uploadCV" ref="frm_uploadcv" id="frm_uploadcv" enctype='multipart/form-data'>
	  	  	 	<div class="cv-section">
	  	  	      <h3><i class="fa fa-id-badge"></i>CV</h3>
	  	  	      <div class="cv-detail">
	  	  	        <div class="cv-box" v-if="candidateProfile.cv_file">
			  	  	   	 <h4>
							<i class="fa fa-file-pdf-o"></i>
							<a style="cursor:pointer;margin-left:10px" class="showPDF" :data-id="candidateProfile.cv_file" href="javascript:void(0)">Preview CV</a>
						</h4>						
			  	  	   	 <router-link to="#">
							<button type="button" @click="deleteCV" class="btn btn-danger">
								<i class="fa fa-trash-o"></i>
							</button>
						</router-link>
			  	     </div>
			  	     <div class="text-center">
					<span class="help-block" id="fileMsg" style="color:red"></span>
			  	    <label class="filelabel">
						<span class="upload-icon">
                        <i class="fa fa-upload"></i></span>
							<span class="u-title">
								Upload CV
							</span>							
							<input @change="readUrl" style="display:none" class="FileUpload1" id="cv_file" ref="cv_file" name="cv_file" type="file"/>
							<span class="check-icon" style="display:none">
							<i class="fa fa-check-square-o"></i>
						</span>
					</label> 
				</div>
			  	 </div>
	  	  	 	</div>					
				</form>
			
	  	  	 	<div class="cv-section">
	  	  	      <h3>
					<i class="fa fa-search"></i>Looking for 
					<a href="javascript:void(0)" @click="redirectTo('/candidate/profile/candidate_info')">Edit
						<i class="fa fa-angle-right"></i>
					</a>
					</h3>
	  	  	      <div class="cv-detail">
			  	    <div class="cv-left-detail">
			  	      <div class="cvjob-title">
			  	      	<h4>Desired job title</h4>
			  	      	<p v-if="candidateProfile.job_title">{{ candidateProfile.job_title }}</p>
						<p v-else>Developer</p>
			  	      </div>
			  	      <div class="cvjob-title">
			  	      	<h4>Salary</h4>
			  	      	<p v-if="candidateProfile.salary">{{ candidateProfile.salary }}</p>
						<p v-else>€10,000</p>
			  	      </div>
			  	      <div class="cvjob-title">
			  	      	<h4>Location</h4>
			  	      	<p v-if="candidateProfile.location">{{ candidateProfile.location }}</p>
						<p v-else>Nicosia</p>
			  	      </div>
			  	    </div>
			  	    <div class="cv-left-detail right-cv">
			  	      <div class="cvjob-title">
			  	      	<h4>Job type</h4>
			  	      	<p v-if="candidateProfile.work_type == 1">Full Time</p> 
						<p v-else-if="candidateProfile.work_type == 2">Part Time</p> 
						<p v-else-if="candidateProfile.work_type == 3">Temporary</p>        
						<p v-else-if="candidateProfile.work_type == 4">Contract</p> 
						<p v-else-if="candidateProfile.work_type == 5">Internship</p>
						<p v-else>Full Time</p>
						
			  	      </div>
			  	      <div class="cvjob-title">
			  	      	<h4>Sectors & Industry</h4>
			  	      	<p>Accountancy</p>
			  	      </div>
			  	    </div>
			  	 </div>
	  	  	 	</div>
	  	  	 	<div class="cv-section" v-if="candidateWorkInfo.length == 0">
	  	  	      <h3><i class="fa fa-graduation-cap"></i>Work experience</h3>
	  	  	      <div class="cv-detail">
			  	    <a href="javascript:void(0)" @click="redirectTo('/candidate/profile/add_work_exp')"><span><i class="fa fa-plus-circle"></i></span> Add work experience</a>
			  	    <p>Shout about your work experience. Even if it's not directly related to the role, it could show employers how you're a good fit for their industry.</p>
			  	 </div>
	  	  	 	</div>
	  	  	 	<div class="cv-section" v-if="candidateWorkInfo.length > 0">
	  	  	      <h3>
						<i class="fa fa-briefcase"></i>
							Work experience 
						<a href="javascript:void(0)" @click="redirectTo('/candidate/profile/add_work_exp')">Add<i class="fa fa-angle-right"></i></a>
					</h3>
	  	  	      <div class="cv-detail" id="workDetails">						  
                    <div class="row" v-for="value in candidateWorkInfo" :key="value">
                    	<div class="div-1-box1">
                    		<p>{{ value.from_month+' - '+value.from_year }} - {{ value.to_month+' - '+value.to_year }}</p>
                    	</div>
                    	<div class="div-1-box2">                    	
                        <div class="title">{{ value.job_title }}</div>
                        <div class="company">{{ value.company }}</div>
                        <div class="descriptionhidden-xs">{{ value.description }}</div>                   
                    	</div>
                    	<div class="div-1-box3">
                    		<div class="delete-btnicon" style="cursor:pointer" @click="deleteWork(value.id)">
                    			<i class="fa fa-trash"></i>
                    		</div>
							<router-link :to="'/candidate/profile/edit_work_exp/'+value.id"  class="edit-btnicon" style="cursor:pointer">
								<i class="fa fa-edit"></i>
							</router-link>                    		                 		
                    	</div>
                    </div>
				</div>
	  	  	 	</div>

	  	  	 	<div class="cv-section" v-if="candidateSkillInfo.length > 0">
	  	  	      <h3><i class="fa fa-briefcase"></i>Skill <a href="javascript:void(0)"  @click="redirectTo('/candidate/profile/add_skills')">Edit <i class="fa fa-angle-right"></i></a></h3>
	  	  	      <div class="cv-detail">
                    <div class="existing-skills">
						<a href="javascript:void(0)" class="lozenge skill"  v-for="value in candidateSkillInfo" :key="value">
							<span class="skill-name">{{ value.skill }}</span>
                        </a>						
                    </div>
			  	 </div>
	  	  	 	</div>

	  	  	 	<div class="cv-section" v-if="candidateSkillInfo.length == 0">
	  	  	      <h3><i class="fa fa-pencil"></i> Skills</h3>
	  	  	      <div class="cv-detail">
			  	    <a href="javascript:void(0)" @click="redirectTo('/candidate/profile/add_skills')"><span><i class="fa fa-plus-circle"></i></span> Add skills & expertise</a>
			  	    <p>What set your apart - and what will employers love about you? Think of practical examples - whether it's at work, school, or even in your hobbies.</p>
			  	 </div>
	  	  	 	</div>
	  	  	 </div>
	  	  	 <div class="col-md-4">
	  	  	 	<div class="cv-disaible profile-info">
	  	  	 	  <h3>Recommended Jobs <a href="javascript:void(0)">See all</a></h3>
	  	  	 	  <div class="cv-disaible-detail">
	  	  	 	  	<ul>
	  	  	 	  		<li>
	  	  	 	  			<a href="javascript:void(0)">
	  	  	 	  			  <h4>Work From Home</h4>
	  	  	 	  			  <span>Competitive salary</span>	
	  	  	 	  			  <span>Birmingham, West Midlands</span>	
	  	  	 	  			</a>
	  	  	 	  		</li>
	  	  	 	  		<li>
	  	  	 	  			<a href="#">
	  	  	 	  			  <h4>Partner</h4>
	  	  	 	  			  <span>£85,000 - £135,000 per annum</span>	
	  	  	 	  			  <span>Birmingham, West Midlands</span>	
	  	  	 	  			</a>
	  	  	 	  		</li>
	  	  	 	  		<li>
	  	  	 	  			<a href="#">
	  	  	 	  			  <h4>Tax Partner Designate </h4>
	  	  	 	  			  <span>Competitive salary</span>	
	  	  	 	  			  <span>Birmingham, West Midlands</span>	
	  	  	 	  			</a>
	  	  	 	  		</li>
	  	  	 	  		<li>
	  	  	 	  			<a href="#">
	  	  	 	  			  <h4>Senior Tax Manager</h4>
	  	  	 	  			  <span>Competitive salary</span>	
	  	  	 	  			  <span>Birmingham, West Midlands</span>	
	  	  	 	  			</a>
	  	  	 	  		</li>
	  	  	 	  	</ul>
	  	  	 	  </div>
	  	  	 	</div>
	  	  	 	<div class="cv-disaible profile-info">
	  	  	 	  <h3>Featured/Urgent Jobs <a href="#">See all</a></h3>
	  	  	 	  <div class="cv-disaible-detail">
	  	  	 	  	<ul>
	  	  	 	  		<li>
	  	  	 	  			<a href="#">
	  	  	 	  			  <h4>Work From Home</h4>
	  	  	 	  			  <span>Competitive salary</span>	
	  	  	 	  			  <span>Birmingham, West Midlands</span>	
	  	  	 	  			</a>
	  	  	 	  		</li>
	  	  	 	  		<li>
	  	  	 	  			<a href="#">
	  	  	 	  			  <h4>Partner</h4>
	  	  	 	  			  <span>£85,000 - £135,000 per annum</span>	
	  	  	 	  			  <span>Birmingham, West Midlands</span>	
	  	  	 	  			</a>
	  	  	 	  		</li>
	  	  	 	  		<li>
	  	  	 	  			<a href="#">
	  	  	 	  			  <h4>Tax Partner Designate </h4>
	  	  	 	  			  <span>Competitive salary</span>	
	  	  	 	  			  <span>Birmingham, West Midlands</span>	
	  	  	 	  			</a>
	  	  	 	  		</li>
	  	  	 	  		<li>
	  	  	 	  			<a href="#">
	  	  	 	  			  <h4>Senior Tax Manager</h4>
	  	  	 	  			  <span>Competitive salary</span>	
	  	  	 	  			  <span>Birmingham, West Midlands</span>	
	  	  	 	  			</a>
	  	  	 	  		</li>
	  	  	 	  	</ul>
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
	data()
	{
		return {
			candidateProfile: [],
			candidateWorkInfo: [],
			candidateSkillInfo: [],
		}
	},
	mounted()
	{
		this.getData();
		$('body').on('click','.showPDF',function(){
			
           var fileName = $(this).attr('data-id');		  
           var url = '../../uploads/csv/';
           var finalUrl = url+fileName;		   
           $('#pdfFile').attr('src',finalUrl);
           $('#myModalPDF').modal('show');
           $('#myModalPDF').css('display','flex');
        }); 
		// $('#btnUploadCV').click(function()
		// {
		// 	$('#cv_file').trigger('click');
		// });
		//  jQuery("#cv_file").on('change',function (e) {           
        //         var labelVal = jQuery(".u-title").text();
        //         var oldfileName = jQuery(this).val();
        //         var fileName = e.target.value.split( '\\' ).pop();

        //             if (oldfileName == fileName) {return false;}
        //             var extension = fileName.split('.').pop();
        //             var size = this.files[0].size;              
        //         if ((extension == 'pdf' || extension == 'doc' || extension == 'docx') && size <= 5242880) 
        //         { 
        //             jQuery('#fileMsg').text('');								
        //         }
        //         else
        //         {
        //             jQuery('#fileMsg').text('Only files with the following extensions are allowed: .doc, .docx, .pdf under 5 MB');                    
        //         }
        //     });
	},
	methods: {
		
		redirectTo(url)
		{
			let self = this;
			$('.loaderBck').show();
			setTimeout(function(){
					$('.loaderBck').hide();
					var path = url;
					console.log('path '+path);
					self.$router.push(path);
				}, 2000);
			
		},
		getData()
		{
			axios.get('/api/front/candidate/profile/getCandidateProfile').then(response => {				
				this.candidateProfile = response.data;
				if(response.data.candidate_work_info)
				{
					this.candidateWorkInfo = response.data.candidate_work_info;
				}
				if(response.data.candidate_skill_info)
				{
					this.candidateSkillInfo = response.data.candidate_skill_info;
				}				
				
			});
		},
		readUrl(event)
           {
             
              if (event.target.files && event.target.files[0]) 
              {
                  var fileName = event.target.value.split( '\\' ).pop();
				  var extension = fileName.split('.').pop();
        		  var size = event.target.files[0].size;             
				  if ((extension == 'pdf' || extension == 'doc' || extension == 'docx') && size <= 5242880) 
                  { 
                      this.uploadCV(event.target.files[0]);								
    	          }
        	      else
                  {
                      jQuery('#fileMsg').text('Only files with the following extensions are allowed: .doc, .docx, .pdf under 5 MB');                    
                  }
                  
              }
           },
		uploadCV(event)
		{
			
			$('.btnLoading').show();
			let formData = new FormData(this.$refs.frm_uploadCV);
			formData.append('cv_file',event);
			axios.post('/api/front/candidate/profile/uploadCV',formData).then(response => {
				$('.btnLoading').hide();
				if(response.data.status == 200)
				{
					this.getData();
					this.flashMessage.success({                                   
								message: response.data.message
							});	
				}
			});
		},
		deleteCV()
		{
			//var self = this;
			this.$confirm(
			{
			message: `Are you sure you want to delete cv?`,
			button: {
				no: 'No',
				yes: 'Yes'
			},        
			callback: confirm => {
				if (confirm)
				{
					 axios.post('/api/front/candidate/profile/deleteCV').then(response => {
					 if(response.data.status == 200)
					 {
						 this.getData();
						 this.flashMessage.success({                                   
									message: response.data.message
								});	
						}
				 	})	
				}
			}
			});
			
		},
		deleteWork(id)
		{
			this.$confirm(
			{
				message: `Are you sure want to delte this work experience?`,
				button: {
					no: 'No',
					yes: 'Yes'
				},        
				callback: confirm => {
					if (confirm)
					{
						axios.post('/api/front/candidate/profile/deleteWorkExp/'+id).then(response => {
						if(response.data.status == 200)
						{
							this.getData();
							this.flashMessage.success({                                   
										message: response.data.message
									});	
							}
						}) 	
					}
				}
			});
		},
	
	}
}
</script>
<style>
  #myModalPDF {
    padding-left: 17px;
    align-items: center;
}
#myModalPDF .modal-lg, #myModalPDF .modal-xl {
    width: 99%;
    max-width: 99%;
    margin: 10vh 0 0;
}
#myModalPDF .modal-body embed {
    height: 70vh;
}

#myModal .modal-header {
    background: #2c2c85;
    position: relative;
    border-color: #2c2c85;
    box-shadow: none;
}
#myModal .modal-title {
    font-size: 18px;
    font-weight: 600;
    color: #fff;
    display: inline-block;
}
#myModal .modal-header .close {
    position: absolute;
    top: 11px;
    right: 15px;
    color: #fff;
    opacity: .7;
    font-weight: 300;
    font-size: 30px;
}
#myModal label .chk {
    margin-right: 10px;
}
#myModal label {
    display: block;
    width: 100%;
    font-weight: 500;
    margin-bottom: 15px;
}
.btn.perple-btn {
    background: #6a49a4;
    color: #fff;
    border-radius: 3px;
    padding: 8px 20px;
    font-size: 16px;
    border: solid 1px#6a49a4;
}
.btn.perple-btn:hover{
  background: #fff;
  color: #6a49a4;
  border-color: #6a49a4;
}
</style>
