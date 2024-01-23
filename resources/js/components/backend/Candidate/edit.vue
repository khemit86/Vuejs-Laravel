<template>
    <div>
         <admindashboard>
        <div class="content-header" slot="adminbody" style="margin-left:18%">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Candidate</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Candidate Edit</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <section class="contener" slot="adminbody"  style="margin-left:20%;margin-right:1.5%">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title" style="float:left">Edit Candidate</h3>
                <router-link to="/admin/candidate/index"  style="float:right;margin-right:3px">
                    <button class="btn btn-success">Back</button>
                </router-link>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="submit" ref="frm_candidate" enctype="multipart/form-data">
                <input type="hidden" v-model="fields.cv_file" name="old_cv" id="old_cv" />
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="first_name" id="first_name" v-model="fields.first_name" placeholder="First Name">
                      <div v-if="errors && errors.first_name" class="text-danger">{{ errors.first_name[0] }}</div>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="last_name" id="last_name" v-model="fields.last_name" placeholder="Last Name">
                      <div v-if="errors && errors.last_name" class="text-danger">{{ errors.last_name[0] }}</div>
                    </div>
                  </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" id="email" v-model="fields.email" placeholder="Email">
                      <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
                    </div>
                  </div>
                
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="password" id="password" v-model="fields.password" placeholder="Password"  readonly="true">
                      <div v-if="errors && errors.password" class="text-danger">{{ errors.password[0] }}</div>
                    </div>
                  </div>
                
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="phone_number" id="phone_number" v-model="fields.phone_number" placeholder="Phone Number">
                       <div class="text-danger"></div>
                      <div v-if="errors && errors.phone_number" class="text-danger">{{ errors.phone_number[0] }}</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Postal Code</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="postal_code" id="postal_code" v-model="fields.postal_code" placeholder="Postal Code">
                       
                      <div v-if="errors && errors.postal_code" class="text-danger">{{ errors.postal_code[0] }}</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ dataCandidate.location }}</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="location" id="location" v-model="location">                        
                        <option  value="Nicosia">Nicosia</option>
                        <option  value="Larnaca">Larnaca</option>
                        <option  value="Limassol">Limassol</option>
                        <option  value="Paphos">Paphos</option>
                        <option  value="Famagusta">Famagusta</option>
                    </select>               
                      <div v-if="errors && errors.location" class="text-danger">{{ errors.location[0] }}</div>
                    </div>
                </div>

                <!-- <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Verification Method</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="verification_type" id="verification_type" v-model="verification_type">                        
                        <option value="1" >Email Verification</option>
                        <option value="2" id="otpV" >SMS Verification</option>
                    </select>                       
                      <div v-if="errors && errors.verification_type" class="text-danger">{{ errors.verification_type[0] }}</div>
                    </div>
                </div> -->

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Uplaod CV</label>  
                    <div class="col-md-10">                  
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="cv_file" name="cv_file" ref="cv_file">
                      <label class="custom-file-label" for="customFile">Choose file</label> 
                      <label class="custom-file-label" for="customFile" v-if="fields.cv_file">{{ fields.cv_file }}</label>     
                      <div class="text-danger" id="fileMsg"></div>                                       
                      <div v-if="errors && errors.cv_file" class="text-danger">{{ errors.cv_file[0] }}</div>
                    </div>
                    </div>
                </div>
                 
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-success">Save Candidate</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
        </section>
        <FlashMessage :position="'right bottom'"></FlashMessage>
         </admindashboard>
    </div>
</template>
<script>
     export default {
          data() {
                    return {
                        fields: {},
                        errors: {},
                        dataCandidate: [] ,
                       
                        location: '',                           
                    }
                },
            mounted()
            {        
               this.getCandidate();
               $('#password').on('keyup keydown', function(e) 
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

                $('#phone_number').keyup(function()
                {
                    var phone  = $(this).val();                    
                    $('#verification_type').val('');
                    if(phone.charAt(0) == '2' || phone.charAt(0) == '9')
                    {
                        if(phone.charAt(0) == '2')
                        {
                            $('#otpV').prop('disabled', true)
                        }
                        else
                        {
                            $('#otpV').prop('disabled', false);
                        }
                        $(this).next().text('');
                        $('#btnSubmit').attr('disabled',false);
                    }
                    else
                    {
                        console.log($(this).next().attr('class'));
                        $(this).next().text('Phone number is not valid!');
                        $('#btnSubmit').attr('disabled',true);
                    }
                });
                 $('#imgConfirm').click(function()
                {
                    var dataId = $(this).attr('data-id');
                    if(dataId == 1)
                    {
                        var url = "{{ url('/') }}/img/ic_show_24_dark.png";
                        $(this).attr('src',url);
                        $(this).attr('data-id',2);
                        $('#password').attr('type','text');
                    }
                    else
                    {
                        var url = "{{ url('/') }}/img/ic_hide_24_dark.png";
                        
                        $(this).attr('src',url);
                        $(this).attr('data-id',1);
                        $('#password').attr('type','password');
                    }
                });
                $("#cv_file").on('change',function (e) 
                {           
                    var labelVal = jQuery(".u-title").text();
                    var oldfileName = jQuery(this).val();
                    var fileName = e.target.value.split( '\\' ).pop();
                    if (oldfileName == fileName) {return false;}
                    var extension = fileName.split('.').pop();
                    var size = this.files[0].size;   
                    $('.custom-file-label').text(fileName);
                    if ((extension == 'pdf' || extension == 'doc' || extension == 'docx') && size <= 5242880) 
                    { 
                        jQuery('#fileMsg').text('');
                        jQuery("#btnSubmit").attr('disabled',false);
                        jQuery(".check-icon").show();
                    }
                    else
                    {
                        jQuery('#fileMsg').text('Only files with the following extensions are allowed: .doc, .docx, .pdf under 5 MB');
                        jQuery("#btnSubmit").attr('disabled',true);
                        jQuery(".check-icon").hide();
                    }
               
                });
            },
             methods: {
                  getCandidate() {
                        var id = window.location.href.split('/').pop();
                        axios.get('/api/admin/candidate/edit/'+id)
                        .then( (response) => { 
                            this.dataCandidate = response.data;                          
                           this.fields = {
                                    first_name: this.dataCandidate.first_name,
                                    last_name: this.dataCandidate.last_name,
                                    email: this.dataCandidate.email,
                                    password: this.dataCandidate.password,
                                    phone_number: this.dataCandidate.mobile,
                                    postal_code: this.dataCandidate.postal_code,
                                    cv_file: this.dataCandidate.cv_file,                                   
                                    
                                },
                                // this.verification_type = this.dataCandidate.verification_type;
                                this.location = this.dataCandidate.location;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                         
                        },        
                submit() {
                this.errors = {};
                var id = window.location.href.split('/').pop();
                let formData = new FormData(this.$refs.frm_candidate);
                formData.append('cv_file', this.cv_file);
                axios.post('/api/admin/candidate/update/'+id,formData).then(response => {
                this.$router.push("/admin/candidate/index");
                    this.flashMessage.success({                                   
                            message: response.data.message
                        });
                }).catch(error => {
                    if (error.response.status === 422) 
                    {
                        this.errors = error.response.data.errors || {};
                    }
                    else if(error.response.status === 501)
                    {
                        this.flashMessage.error({
                                message: 'This Email already exits, please try another one!',                            
                        });
                    }
                    
                });
                },
            },
            
    }
</script>