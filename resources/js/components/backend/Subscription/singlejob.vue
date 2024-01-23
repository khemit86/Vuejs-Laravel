<template>
    <div>
         <admindashboard>
        <div class="content-header" slot="adminbody" style="margin-left:18%">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Subscription</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Single Job</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <section class="contener" slot="adminbody"  style="margin-left:20%;margin-right:1.5%">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title" style="float:left">Edit Single Job</h3>
                <router-link to="/admin/subscription/index"  style="float:right;margin-right:3px">
                    <button class="btn btn-success">Back</button>
                </router-link>
              </div>
             <form class="form-horizontal" @submit.prevent="submit" ref="frm_singlejob" enctype="multipart/form-data">
                  
                <div class="card-body">

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="title" id="title" v-model="fields.title" placeholder="Title">
                      <div v-if="errors && errors.title" class="text-danger">{{ errors.title[0] }}</div>
                    </div>
                  </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Plan Duration (In Days)</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" name="plan_duration" id="plan_duration" v-model="fields.plan_duration" placeholder="Plan Duration">
                      <div v-if="errors && errors.plan_duration" class="text-danger">{{ errors.plan_duration[0] }}</div>
                    </div>
                </div>

                 
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Advert Live Duration </label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" name="post_visibility" id="post_visibility" v-model="fields.post_visibility" placeholder="Advert Live Duration">
                      <div v-if="errors && errors.post_visibility" class="text-danger">{{ errors.post_visibility[0] }}</div>
                    </div>
                </div>

                <div v-if="keyfeatures">
                  <div v-for="(keyfeValue, itemObjKey) in keyfeatures">
                    <div class="form-group row">
                     <label for="inputEmail3" class="col-sm-2 col-form-label">Key Feature</label>
                     <div class="col-sm-9">
                      <input type="text" class="form-control" name="key_fetures[]" v-model="keyfeatures[itemObjKey]" id="key_fetures" placeholder="Key Feature">
                     </div>
                      <div class="col-md-1" v-if="itemObjKey == 0">
                        <button type="button" class="btn btn-success add_button"><i class="fa fa-plus"></i></button>
                      </div>
                      <div class="col-md-1" v-else>
                        <button type="button" class="btn btn-primary remove_button"><i class="fa fa-minus"></i></button>
                      </div>
                    </div>
                   </div>
                </div>              
                <div class="form-group row" v-else>
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Key Feature</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="key_fetures[]" id="key_fetures" placeholder="Key Feature">
                  </div>
                  <div class="col-md-1">
                    <button type="button" class="btn btn-success add_button"><i class="fa fa-plus"></i></button>
                  </div>
                </div>

                <div class="containerDiv">
                    
                </div>       

                 <p style="display:none">{{ j = 0 }}</p>
                
                  <div class="form-group row" v-if="singleJobs" v-for="(value11, key11) in singleJobs">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Plan Amount</label>
                    <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" name="amount[]" id="amount" placeholder="Plan Amount" :value="`${ value11.amount }`" />
                    </div>
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Plan Quantity</label>
                     <div class="col-sm-2">
                        <input type="text" step="0.01" class="form-control" name="quantity_from[]" id="qauntity" placeholder="Plan Quantity" :value="`${ value11.quantity_from }`" v-if="j == 0" readonly="true" />
                        <input type="text" step="0.01" class="form-control" name="quantity_from[]" id="qauntity" placeholder="Plan Quantity" :value="`${ value11.quantity_from }`" v-else />
                     </div>
                      <div class="col-sm-2">
                        <input type="text" step="0.01" class="form-control" name="quantity_to[]" id="qauntity" placeholder="Plan Quantity" :value="`${ value11.quantity_to }`" v-if="j == 0" readonly="true" />
                        <input type="text" step="0.01" class="form-control" name="quantity_to[]" id="qauntity" placeholder="Plan Quantity" :value="`${ value11.quantity_to }`" v-else  />
                     </div>
                     <div class="col-md-1" v-if="j == 0">
                      <button type="button" class="btn btn-success add_button1"><i class="fa fa-plus"></i></button>
                     </div>
                      <div class="col-md-1" v-else>
                        <button type="button" class="btn btn-primary remove_button1"><i class="fa fa-minus btnRemove"></i></button>
                      </div>
                       <p style="display:none">{{ j++}}</p>
                  </div>
                  <div v-if="singleJobs.length == 0">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Plan Amount</label>
                    <div class="col-sm-3">
                      <input type="number" step="0.01" class="form-control" name="amount[]" id="amount" placeholder="Plan Amount" />
                    </div>
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Plan Quantity</label>
                    <div class="col-sm-2">
                      <input type="text" step="0.01" class="form-control" name="quantity_from[]" id="qauntity" placeholder="Plan Quantity" value="1" readonly="true" />
                    </div>
                    <div class="col-sm-2">
                      <input type="text" step="0.01" class="form-control" name="quantity_to[]" id="qauntity" placeholder="Plan Quantity" value="1" readonly="true" />
                     </div>
                      <div class="col-md-1">
                        <button type="button" class="btn btn-success add_button1"><i class="fa fa-plus"></i></button>
                      </div>
                  </div>
                </div>

                <div class="containerDiv1">
                      
                    </div>
                   
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-success">Save</button>
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
                        plan_duration: '' ,
                        status: '', 
                        dataRecord: [],
                        keyfeatures: '', 
                        singleJobs: [],  
                        countAmount: 0, 
                               
                    }
                },
            mounted()
            {     
              this.getRecord();
              var self = this;
              var maxField = 10; 
              var x = 1;
              var wrapper = $('.containerDiv');
                $('.contener').on('click', '.add_button', function(e)
                {                 
                    if(x < maxField)
                    {                       
                        x++;
                        var fieldHTML = '<div class="form-group row"><label class="col-sm-2 form-control-label" for="key_fetures">Key Feature</label><div class="col-sm-9"><input class="form-control" type="text" name="key_fetures[]" id="key_fetures" placeholder="Key Feature"></div><div class="col-md-1"><button type="button" class="btn btn-primary remove_button"><i class="fa fa-minus"></i></button></div></div>';
                         console.log(fieldHTML)
                        $('.containerDiv').append(fieldHTML);
                    }
                });
                 $('.contener').on('click', '.remove_button', function(e){
                    e.preventDefault();
                    $(this).parent().parent('div').remove(); //Remove field html
                    x--; //Decrement field counter
                });
              
              var maxField1 = 10; 
              var x1 = 1;
              var wrapper1 = $('.containerDiv1');
                $('.contener').on('click', '.add_button1', function(e)
                {                 
                    if(x1 < maxField1)
                    {                       
                        x1++;
                        var fieldHTML = '<div class="form-group row"><label class="col-sm-2 form-control-label" for="amount">Plan Amount</label><div class="col-sm-3"><input class="form-control" type="number" name="amount[]" id="amount" placeholder="Plan Amount"></div><label class="col-sm-2 form-control-label" for="quantity">Plan Quantity</label><div class="col-sm-2"><input class="form-control" type="text" name="quantity_from[]" id="quantity_from" placeholder="Quantity From"></div><div class="col-sm-2"><input class="form-control" type="text" name="quantity_to[]" id="quantity_from" placeholder="Quantity From"></div><div class="col-md-1"><button type="button" class="btn btn-primary remove_button1"><i class="fa fa-minus"></i></button></div></div>';
                         console.log(fieldHTML)
                        $('.containerDiv1').append(fieldHTML);
                    }
                });
                 $('.contener').on('click', '.remove_button1', function(e){
                    e.preventDefault();
                    $(this).parent().parent('div').remove(); //Remove field html
                    x1--; //Decrement field counter
                });
            },
             methods: {                
                  getRecord() {
                        axios.get('/api/admin/subscription/singleJob')
                        .then( (response) => { 
                          console.log(response.data)
                            this.dataRecord = response.data.data;    
                            this.keyfeatures = response.data.data.key_fetures.split(",");
                            this.singleJobs =  response.data.data['single_job_amounts'];   
                            this.countAmount = response.data.data['single_job_amounts'].length;
                               
                            this.fields = {
                                    title: this.dataRecord.title,
                                    amount: this.dataRecord.amount,
                                    post_visibility: this.dataRecord.post_visibility, 
                                    plan_duration: this.dataRecord.plan_duration,                               
                                },                          
                                this.plan_duration = this.dataRecord.plan_duration;                           
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                         
                        },        
                submit() {
                this.errors = {};
                var id = window.location.href.split('/').pop();
                let formData = new FormData(this.$refs.frm_singlejob);
                axios.post('/api/admin/subscription/updateSingleJob',formData).then(response => {
                if(response.data.status == 501)
                {
                    this.flashMessage.error({                                   
                            message: response.data.message
                        });
                }
                else if(response.data.status === 200)
                {
                   
                   $('.containerDiv').html('');                   
                    this.flashMessage.success({                                   
                            message: response.data.message
                        });
                        this.getRecord();
                }               
                }).catch(error => {
                    if (error.response.status === 422) 
                    {
                        this.errors = error.response.data.errors || {};
                    }
                });
                },
            },
            
    }
</script>