<template>
    <div>
        <admindashboard>
        <div class="content-header" slot="adminbody" style="margin-left:18%">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Employer</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Employer Add</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <section class="contener" slot="adminbody" style="margin-left:20%;margin-right:1.5%">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title" style="float:left">Create Employer</h3>
                <router-link to="/admin/employer/index" style="floa:right;margin-left:78%">
                    <button class="btn btn-success">Back</button>
                </router-link>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="submit" ref="frm_employer" enctype="multipart/form-data">
                  
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Company Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="company_name" id="company_name" v-model="fields.company_name" placeholder="Company Name">
                      <div v-if="errors && errors.company_name" class="text-danger">{{ errors.company_name[0] }}</div>
                    </div>
                  </div>              

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" id="email" readonly="true" v-model="fields.email" placeholder="Email">
                      <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" id="name" v-model="fields.name" placeholder="Company Representative Full Name">
                      <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
                    </div>
                  </div>
                
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input readonly="true" type="password" class="form-control" name="password" id="password" v-model="fields.password" placeholder="Password">
                       <p class="re-note" id="phoneLength">-At least 8 characters and a maximum of 20 characters</p>
                        <p class="re-note" id="oneSpecial">-At least 1 special character (. ! @ # & ( ).+)</p>
                        <p class="re-note" id="oneNumber">-At least 1 number [0-9]</p>
                        <p class="re-note" id="oneSmallLetter">-At least one lowercase Latin character [a-z]</p>
                        <p class="re-note" id="oneCapLetter">-At least one uppercase Latin character [A-Z]</p>
                      <div v-if="errors && errors.password" class="text-danger">{{ errors.password[0] }}</div>
                    </div>
                  </div>

                     <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Industries Of Operation</label>
                    <div class="col-sm-10">
                         <div class="form-group input-icon industries-fields">                        
                        <div class="select-bx class-box lblClasi" id="lblClasi">
                        <ul>
                        <li>
                        <label class="form-check-label lblDrp" for="same-address">Industries Of Operation</label>
                        <div class="select-direction">
                            <span class="selectSpan">
                            <i class="fa fa-angle-down"></i>
                            </span>
                            <div class="right-cros"><img class="default-cross" src="/img/cross.svg" style="margin-bottom:10px">
                                <img class="show-hover" src="/img/crosson-hover.svg" style="margin-bottom:10px"></div>
                            </div>
                        </li>
                        </ul>
                        </div>
                        <div class="select-heading-list hide" style="display: none;">
                        <p style="display:none">{{ childCount = 0 }}</p>
                            <ul v-if="dataCategory" v-for="(value, key) in dataCategory">  
                                <li class="dropdown mainLi"  :id="'mainLi_'+key" :data-id="key">                                           
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input mainChk indChk" :data-id="key" :id="'mainChk_'+key" :name="`category[${value.parent.id}]`" :checked="parentCatIds.includes(value.parent.id)? true: false">
                                <label class="form-check-label" :for="'mainChk_'+key">{{  value.parent.value }}</label>
                                </div>
                                <ul class="nestedMenu" :id="'nestedMenu_'+key" style="display: none;" :data-id="key">
                                    <div class="all-heading">
                                        <div class="form-check">
                                        <input type="checkbox"  class="form-check-input all indChk" :id="'all_'+key" checked="checked" :data-id="key">
                                        <label class="form-check-label" :for="'all_'+key">All {{  value.parent.value }}</label>
                                        <span class="all_count" :id="'all_count_'+key">4217</span>
                                    </div>
                                    </div>                                                      
                                                                                                
                                    <li v-if="value.child" v-for="(value11, key11) in value.child">
                                    <div class="form-check">
                                    <input type="checkbox" class="form-check-input child indChk" :id="`child_${childCount}`" :data-id="`${childCount}`" :name="`category[${value.parent.id}][]`" :value="value11.id" :checked="parentCatIds.includes(value11.id)? true: false">
                                    <label class="form-check-label" :data-labelfor="`child_${childCount}`"  :for="`${childCount}`">{{ value11.value }} </label>
                                    <span :class="`${childCount}`" :id="`child_count_${childCount}`">1014</span>
                                    <p style="display:none">{{ childCount++ }}</p>
                                </div>
                                </li>                                                                                            
                                </ul>
                                </li>
                                </ul>
                            </div>
                          </div>
                    <div class="text-danger"></div>
                    <div v-if="errors && errors.category" class="text-danger">{{ errors.category[0] }}</div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="mobile" id="mobile" v-model="fields.mobile" placeholder="Phone Number">
                    <div class="text-danger"></div>
                      <div v-if="errors && errors.mobile" class="text-danger">{{ errors.mobile[0] }}</div>
                      <div class="help-block" style="color:red">
                        <span id="phoneerror"></span>
                      </div> 
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Country</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="country_id" id="country_id" v-model="country_id">
                            <option value="">Select Country</option>
                            <option v-if="dataCountry" v-for="(valueC, keyC) in dataCountry" :value="valueC.id">{{ valueC.name }}</option>
                        </select>
                        <span class="help-block" style="color:red">{{ errors[0] }}</span>
                        <div class="help-block" style="color:red"  v-if="errors && errors.country_id">
                                <span>{{ errors.country_id[0] }}</span>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="location" id="location" v-model="location">
                        <option value="" selected="selected">Please Select Location*</option>
                        <option value="Nicosia">Nicosia</option>
                        <option value="Larnaca">Larnaca</option>
                        <option value="Limassol">Limassol</option>
                        <option value="Paphos">Paphos</option>
                        <option value="Famagusta">Famagusta</option>
                    </select>                       
                      <div v-if="errors && errors.location" class="text-danger">{{ errors.location[0] }}</div>
                    </div>
                </div>

                <!-- <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Verification Method</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="verification_type" id="verification_type" v-model="verification_type">
                        <option value="" selected="selected">Please Select Verification Method*</option>
                        <option value="1">Email Verification</option>
                        <option value="2" id="otpV">SMS Verification</option>
                    </select>                       
                      <div v-if="errors && errors.verification_type" class="text-danger">{{ errors.verification_type[0] }}</div>
                    </div>
                </div> -->

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Vat Number</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="vat_no" id="vat_no" v-model="fields.vat_no" placeholder="Vat Number">
                       <div class="text-danger"></div>                      
                    </div>
                </div>

                 <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Company Description</label>
                    <div class="col-sm-10">
                    <textarea  :maxlength="max" v-model="company_description" class="form-control" name="company_description" id="company_description" placeholder="Company Description"></textarea>
                    <div style="float:right" class="input-group-addon" v-text="(max - company_description.length)"></div>
                       <div class="text-danger"></div>                      
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
                        location: '',
                        verification_type: '',
                        dataCountry: [],
                        dataCategory: [],
                        max: 800,
                        company_description: '',
                        country_id: '', 
                        parentCatIds: [],
                        childCatIds: [],
                         
                    }
                },
            mounted()
            {            
                this.getRecord();
                this.getCountries();
                this.getCategories();               
                this.getSelectedCategory();
                $('#location').on('mousedown',function()
                {
                    $("option[value='']").hide();
                });
                $('#verification_type').on('mousedown',function()
                {
                    $("option[value='']").hide();
                });
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

                $('#mobile').keyup(function()
                {
                    var phone  = $(this).val(); 
                    if(phone != '')
                    {                   
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
                            if($('#vue_mobile_error').text().length  == '')
                            {
                                $('#phoneerror').text('Phone number is not valid!');
                            }
                            else
                            {
                                    $('#phoneerror').text('');
                            }                            
                            //$(this).next().next().text('');
                            $('#btnSubmit').attr('disabled',true);
                        }
                    }
                    else
                    {
                            $('#phoneerror').text('');
                    }
                });
                $('#imgConfirm').click(function()
                {
                    var dataId = $(this).attr('data-id');
                    if(dataId == 1)
                    {
                            var url = "/img/ic_show_24_dark.png";
                        $(this).attr('src',url);
                        $(this).attr('data-id',2);
                        $('#password').attr('type','text');
                    }
                    else
                    {
                        var url = "/img/ic_hide_24_dark.png";                        
                        $(this).attr('src',url);
                        $(this).attr('data-id',1);
                        $('#password').attr('type','password');
                    }
                });
            },
             methods: {
                        
                        getRecord()
                        {
                            var id = window.location.href.split('/').pop();
                            axios.get('/api/admin/employer/edit/'+id)
                            .then( (response) => { 
                                console.log(response.data)
                                this.dataRecord = response.data;  
                                if(this.dataRecord.company_description)
                                {
                                    this.company_description = this.dataRecord.company_description;
                                }           
                                this.fields = {
                                        company_name: this.dataRecord.company_name, 
                                        email: this.dataRecord.email, 
                                        name: this.dataRecord.name,    
                                        mobile: this.dataRecord.mobile,
                                        vat_no: this.dataRecord.vat_no,
                                        password: this.dataRecord.password,                       
                                    },
                                    
                                   
                                    this.country_id = this.dataRecord.country_id;
                                    this.location = this.dataRecord.location;
                                    
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                        },
                        getCountries()
                        {
                            axios.get('/api/front/getCountries').then(response => {
                            this.dataCountry = response.data;
                            });
                        },
                        getCategories()
                        {
                            axios.get('/api/front/getCategory').then(response => {
                                //console.log(response.data)
                                this.dataCategory = response.data;
                            });
                        },
                        getSelectedCategory()
                        {
                            var id = window.location.href.split('/').pop();
                            axios.get('/api/front/getCategoryEdit/'+id).then(response => {
                                //console.log(response.data)
                                var dataCat = response.data;
                                for (let cats of dataCat) 
                                {
                                    if(cats.parent_category_id > 0 && cats.child_category_id > 0)
                                    {
                                      this.childCatIds.push(cats.child_category_id);
                                    }
                                    else
                                    {
                                        this.parentCatIds.push(cats.parent_category_id);
                                    }
                                }
                            });                           
                        },
                        submit() {
                        this.errors = {};
                        var id = window.location.href.split('/').pop();
                        let formData = new FormData(this.$refs.frm_employer);
                        axios.post('/api/admin/employer/update/'+id, formData).then(response => {
                        this.fields = {}
                        this.$router.push("/admin/employer/index");
                           this.flashMessage.success({                                   
                                    message: 'Record Added Successfully!'
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