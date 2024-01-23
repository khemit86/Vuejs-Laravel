<template>
   <main>
      <employerlayout>
         <div class="content-wrapper" style="min-height: 902.8px;" slot="employerbody">
            <div class="dashboard_right_detail">
               <div class="myprofile-heading-main">
                  <div class="personal-details">
                     <div class="row">
                        <div class="col-md-3">
                           <form id="frm_logo" ref="frm_logo" @submit.prevent="uploadLogo" >
                           <div class="profile-info">
                              <div class="personal-profile">                                 
                                 <img  @error="onImageLoadFailure($event)" :src="'/../uploads/company_logo/' + dataUser.company_logo" id="blah">
                              </div>
                               <label class="filelabel">
                                 <span class="upload-icon">
                                 <i class="fa fa-upload"></i></span>
                                 <span class="u-title">
                                  Upload Logo
                                 </span>
                                 <input @change="readUrl" style="display:none" class="FileUpload1" id="company_logo" ref="company_logo" name="company_logo" type="file"/>
                                 <span class="check-icon" style="display:none">
                                 <i class="fa fa-check-square-o"></i>
                                 </span>
                                 </label> 
                              <h4>Hello, {{ dataUser.company_name }}</h4>
                              <span id="profileError" style="color:red"></span>
                               <span id="profileSuccess" style="color:green"></span>
                           </div>
                           </form>
                        </div>
                        <div class="col-md-9">
                           <div class="personal-detail-right">
                              <h3>Personal Details<a id="edit-btn" style="cursor:pointer"><span class="mr-1"><i class="fa fa-edit"></i></span>Edit</a></h3>
                              <div class="personal-details-body">
                                 <div class="profile-static-detail">
                                    <div class="row align-items-center">
                                       <p class="col-sm-3 text-muted text-sm-right">Company Representative Name:</p>
                                       <p class="col-sm-9 text-3">{{ dataUser.name }}</p>
                                    </div>
                                    <div class="row align-items-center">
                                       <p class="col-sm-3 text-muted text-sm-right">Email:</p>
                                       <p class="col-sm-9 text-3">{{ dataUser.email }}</p>
                                    </div>
                                    <div class="row align-items-center">
                                       <p class="col-sm-3 text-muted text-sm-right">Mobile Number:</p>
                                       <p class="col-sm-9 text-3">{{ dataUser.mobile }}</p>
                                    </div>
                                    <div class="row align-items-center">
                                       <p class="col-sm-3 text-muted text-sm-right">Location:</p>
                                       <p class="col-sm-9 text-3">{{ dataUser.location }}</p>
                                    </div>
                                    <div class="row align-items-center">
                                       <p class="col-sm-3 text-muted text-sm-right">Address:</p>
                                       <p class="col-sm-9 text-3" v-if="dataUser.address">{{ dataUser.address }}</p>
                                       <p class="col-sm-9 text-3" v-else>---</p>
                                    </div>
                                 </div>
                                 <form id="frm_personal" @submit.prevent="editPersonalInfo" ref="frm_personal" >
                                    <div class="detail-form detail-formmm" style="display: none;">
                                       <div class="row">
                                          <div class="form-group">
                                             <label class="control-label col-md-12">Company Representative Name</label>
                                             <div class="col-md-12">
                                                <input type="text" class="form-control" placeholder="Name" name="name" id="name" :value="dataUser.name">
                                                <div v-if="laravelErrors && laravelErrors.name" class="text-danger">{{ laravelErrors.name[0] }}</div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label col-md-12">Email</label>
                                             <div class="col-md-12">
                                                <input type="text" class="form-control" placeholder="Email" readonly="true" name="email" id="email" :value="dataUser.email">
                                                <div v-if="laravelErrors && laravelErrors.email" class="text-danger">{{ laravelErrors.email[0] }}</div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label col-md-12">Mobile</label>
                                             <div class="col-md-12">
                                                <input type="text" class="form-control" placeholder="Mobile" name="mobile" id="mobile" :value="dataUser.mobile">
                                                <div v-if="laravelErrors && laravelErrors.mobile" class="text-danger">{{ laravelErrors.mobile[0] }}</div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label col-md-12">Location</label>
                                             <div class="col-md-12">
                                                <select class="form-control" name="location" id="location" v-model="location">
                                                    <option value="" selected="selected">Select Location*</option>
                                                    <option value="Nicosia">Nicosia</option>
                                                    <option value="Larnaca">Larnaca</option>
                                                    <option value="Limassol">Limassol</option>
                                                    <option value="Paphos">Paphos</option>
                                                    <option value="Famagusta">Famagusta</option>
                                                </select>
                                                <div v-if="laravelErrors && laravelErrors.location" class="text-danger">{{ laravelErrors.location[0] }}</div>
                                             </div>
                                          </div>
                                           <div class="form-group">
                                             <label class="control-label col-md-12">Address</label>
                                             <div class="col-md-12">
                                                <textarea name="address" class="form-control" id="address" v-model="address"></textarea>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <div class="col-md-12">
                                                <button class="btn save-btn" type="submit" name="btnPersonal">Save</button>
                                                <button class="btn save-btn cancel" type="button" id="close-btn1">Cancel</button>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    </form>
                              </div>
                           </div>   
                           <div class="personal-detail-right">
                        <h3>Comapany Details<a id="edit-btn1" style="cursor:pointer"><span class="mr-1"><i class="fa fa-edit"></i></span>Edit</a></h3>
                        <div class="personal-details-body">
                           <div class="profile-static-detail11">
                              <div class="row align-items-center">
                                 <p class="col-sm-3 text-muted text-sm-right">Comapany Name:</p>
                                 <p class="col-sm-9 text-3">{{ dataUser.company_name }}</p>
                              </div>
                              <div class="row align-items-center">
                                 <p class="col-sm-3 text-muted text-sm-right">Vat Number:</p>
                                 <p class="col-sm-9 text-3" v-if="dataUser.vat_no">{{ dataUser.vat_no }}</p>
                                 <p class="col-sm-9 text-3" v-else>----</p>
                              </div>
                              <div class="row align-items-center">
                                 <p class="col-sm-3 text-muted text-sm-right">Company Description:</p>
                                 <p class="col-sm-9 text-3" v-if="dataUser.description">{{ dataUser.description }}</p>
                                 <p class="col-sm-9 text-3" v-else>----</p>
                              </div>                             
                           </div>
                           <form id="frm_personal" @submit.prevent="editCompanyInfo" ref="frm_company" >
                           <div class="detail11 detail-formmm" style="display: none;">
                              <div class="row">
                                 <div class="form-group">
                                    <label class="control-label col-md-12">Company Name</label>
                                    <div class="col-md-12">
                                       <input type="text" class="form-control" placeholder="Company Name" name="company_name" id="company_name" :value="dataUser.company_name">
                                       <div v-if="laravelErrors && laravelErrors.company_name" class="text-danger">{{ laravelErrors.company_name[0] }}</div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-12">Vat Number</label>
                                    <div class="col-md-12">
                                       <input type="text" class="form-control" placeholder="Vat Number" name="vat_no" id="vat_no" :value="dataUser.vat_no">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-12">Company Description</label>
                                    <div class="col-md-12">
                                       <input type="text" class="form-control" placeholder="Company Description" name="company_description" id="company_description" :value="dataUser.company_description">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="col-md-12">
                                       <button class="btn save-btn" type="submit">Save</button>
                                       <button class="btn save-btn cancel" type="button" id="close-btn2">Cancel</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <input type="hidden" name="checkImg" id="checkImg" value="0"/>
                           </form>
                        </div>
                     </div>                       
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </employerlayout>
   </main>
</template>
<script>
   export default {
     data()
       {
           return{
             dataUser: [],
             location: '',
             laravelErrors: {},
             imgHeight: 0,
             imgWidth: 0,
             address: '',
             
           }
       },
     mounted()
     {
        this.getData();
        $("#edit-btn").click(function(){
           $(".profile-static-detail").hide();
           $(".detail-form").show();
   
         });
         $("#close-btn1").click(function(){
           $(".profile-static-detail").show();
           $(".detail-form").hide();
   
         });
     
        $("#edit-btn1").click(function(){
           $(".profile-static-detail11").hide();
           $(".detail11").show();
         });
   
        $("#close-btn2").click(function(){
           $(".profile-static-detail11").show();
           $(".detail11").hide();
   
         });

         
     },
     methods: {
           readUrl(event)
           {          
              
                  
                 if (event.target.files && event.target.files[0]) 
                  {
                     if(event.target.files[0].type == 'image/jpeg' || event.target.files[0].type == 'image/jpg' || event.target.files[0].type == 'image/png')
                     {
                        var fileSize = event.target.files[0].size;
                        fileSize = parseInt(fileSize/1024);
                        if(fileSize <= 1024)
                        {
                           var reader = new FileReader();
                           var height = 0;
                           var width = 0;
                           
                              reader.onload = function (e) 
                              {                               
                                 $('#blah').attr('src', e.target.result);
                              }                       
                              reader.readAsDataURL(event.target.files[0]);
                              this.uploadLogo();
                          $('#profileError').text('')
                        }
                        else
                        {
                           $('#profileError').text('Max file size allowed: Under 1MB ')
                              this.flashMessage.error({
                                             message: 'Max file size allowed: Under 1MB ',                              
                                    });
                        }                    
                     }
                     else
                     {
                        this.flashMessage.error({
                                             message: 'We only accept .jpeg and .png',                            
                                    });
                                     $('#profileError').text('We only accept .jpeg and .png')
                     }                  
                  }
              
              
              
           },
           checkImgSize(event)
           {
               var _URL = window.URL || window.webkitURL;
               var image = new Image();
               image.src = _URL.createObjectURL(event.target.files[0]);  
               console.log('withd image '+image.width);                          
               image.onload = function () 
               {   
                  alert('a');
                  if(this.height > 150 && this.width > 150)
                  {                        
                     $('#checkImg').val(1);
                  }                   
               } 
               this.readUrl(event); 
           },
           getData()
           {
              axios.post('/api/front/employer/getEmployerData').then((response)=>{
               this.dataUser = response.data;
               this.location = response.data.location;
               this.address = response.data.address;
              });
           },
           onImageLoadFailure(event)
           {
              $('.u-title').text('Replace Logo');
              event.target.src = '/../img/no-image.png';
           },
           uploadLogo()
           {
            //   $('#blah').each(function() 
            //   {
            //       $(this).attr('height',$(this).height());
            //       $(this).attr('width',$(this).width());
            //       console.log($(this).width());
            //    });
              let formData = new FormData(this.$refs.frm_logo);
              axios.post('/api/front/employer/uploadLogo',formData).then((response)=>
              {
                  this.flashMessage.success({
                                          message: 'Company logo uploaded successfully'                           
                                    });
                  $('#profileError').text('');
                  $('#profileSuccess').text('Company logo uploaded successfully');
                  $('.u-title').text('Replace Logo');
                  
              }).catch(error => {
                              if (error.response.status === 422) 
                              {                                
                                  
                                  this.flashMessage.error({
                                          message: 'Logo Size: Minimum 150px x 150px'                           
                                    });
                                    $('.u-title').text('Upload Logo')
                                    $('#profileSuccess').text('');
                                    $('#profileError').text('Logo Size: Minimum 150px x 150px')
                              }
                          });;;
           },
           editPersonalInfo()
           {
              this.laravelErrors = {};
              let formData = new FormData(this.$refs.frm_personal);
              axios.post('/api/front/employer/editPersonalInfo',formData).then((response)=>{
               if(response.data.status == 200)
               {
                   this.flashMessage.success({
                        message: 'Personal Information updated successfully',                            
                    });
                    this.getData();
               }
               else
               {
                    this.flashMessage.success({
                        message: 'Personal Information not updated!',                            
                    });
               }
              }).catch(error => {
                              if (error.response.status === 422) 
                              {
                                  this.laravelErrors = error.response.data.errors || {};
                              }
                          });;
           },
           editCompanyInfo()
           {
              this.laravelErrors = {};
              let formData = new FormData(this.$refs.frm_company);
              axios.post('/api/front/employer/editCompanyInfo',formData).then((response)=>{
               if(response.data.status == 200)
               {
                   this.flashMessage.success({
                        message: 'Company Information updated successfully',                            
                    });
                    this.getData();
               }
               else
               {
                    this.flashMessage.success({
                        message: 'Company Information not updated!',                            
                    });
               }
              }).catch(error => {
                              if (error.response.status === 422) 
                              {
                                  this.laravelErrors = error.response.data.errors || {};
                              }
                          });;
           },           
           logout(){           
               axios.post('/api/admin/logout').then((res)=>{
                 // const authUser = JSON.parse(localStorage.getItem('authUser'));
                 // if(authUser)
                 // {
                 // 	localStorage.removeItem('authUser');
                 // }
                 localStorage.removeItem('authUser');
                 this.flashMessage.success({
                 message: 'Logout successfully',                            
                 });
                 window.location.replace('/login');
             });
           },
           redirect(type)
           {
              let self = this;	
              if(type == 'home')
              {
                  $('.loaderBck').show();
                   setTimeout(function(){
                     $('.loaderBck').hide();
                     window.location.replace('/')
                   }, 2000);
              }
           },
       },
   }
</script>
