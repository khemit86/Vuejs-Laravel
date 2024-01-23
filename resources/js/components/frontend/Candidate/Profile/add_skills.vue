<template>
    <main>
        <homelayout>
	        <div class="inner-account-section" slot="frontbody">
                <div class="container">
                  <div class="work-experiance">
                    <router-link to="/candidate/profile"><i class="fa fa-angle-left"></i> Your profile</router-link>
                    <div class="profile-detail-form">
                     <h2>Add Your Skills</h2>
                      <form @submit.prevent="submit" ref="frm_skill" id="frm_skill" class="ajax-form" enctype='multipart/form-data'>
                        <div class="form-group row" style="display: flex;">
                            <label class="col-md-2" for="title">Skills</label>
                            <div class="col-md-10">
                            	<div class="row">
                            		<div class="col-md-9">
                                  <div class="existing-skills" id="skillContainer">
                                    <a href="javascript:void(0)" class="lozenge skill remove"  v-for="value in candidateSkillInfo" :key="value" :data-id="key">
                                      <span class="skill-name">{{ value.skill }}</span>
                                      <i class="fa fa-times"></i>
                                    </a>
                                  </div>
                              <input type="text" class="form-control" id="frmSkill">
                              <span style="color:red" id="errorMsg"></span>
                          </div>
                          <div class="col-md-3 classaddd-btn">
                          	<a href="javascript:void(0)" id="btnAddSkill" @click="addSkill" type="button"><i class="fa fa-plus-circle mr-2"></i>Add </a>
                          </div>
                      </div>
                      </div>
                    </div>   
                    <div id="inputContainer">
                      <input type="hidden" name="skills[]" :value="value.skill" :id="`skills_${key}`" v-for="value in candidateSkillInfo" :key="value">
                      
                    </div>                    
                    <div class="row pt-3 mt-4">
                      <div class="col-md-12">
                        <div class="btn btn-inline">
                            <button class="btn cancel-btn">Cancel</button>
                            <button class="btn cancel-btn blue-bg" type="submit">
                              <span><img src="/img/waiting.gif" width="21px" class="btnLoading" style="display:none"  /></span>
                              Save</button>                          
                        </div>
                      </div>
                    </div>
                    </form>
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
				  candidateSkillInfo: [],      
			}
		},
	mounted()
	{
     this.getData();
		 $('#skillContainer').on('click','.remove',function()
     {
        var dataId = $(this).attr('data-id');
        $('#skills_'+dataId).remove();
        $(this).remove();
     });
     $(document).ready(function () {
    
        $('html, body').animate({
            scrollTop: $('.inner-account-section').offset().top
        }, 'slow');
    });
	},
	methods: {
    getData()
    {
       axios.get('/api/front/candidate/profile/getSkills').then(response => {
          this.candidateSkillInfo = response.data;
       });
    },
    addSkill()
    {
        var inputValue = $('#frmSkill').val();
        if(inputValue != '')
        {
          var count = parseInt($("#skillContainer a").length);
          console.log(count)
          var html = '<a href="javascript:void(0)" class="lozenge skill remove" data-id="'+count+'"><span class="skill-name">'+inputValue+'</span><i class="fa fa-times"></i></a>';
          $('#skillContainer').append(html);
          var html11 = '<input type="hidden" name="skills[]" value="'+inputValue+'" id="skills_'+count+'">';
          $('#inputContainer').append(html11);
          $('#frmSkill').val('');
          count++;
        }
        else
        {
           $('#errorMsg').text('Please enter skill!')
        }
    },
		
		submit() {
					$('.btnLoading').show();
					this.laravelErrors = {};
					let formData = new FormData(this.$refs.frm_skill);
				  axios.post('/api/front/candidate/profile/addSkill', formData).then(response => {
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
									message: 'Oops! Something went wronge'                      
							});
						}
					});
        },
			
				
	},
}
</script>

