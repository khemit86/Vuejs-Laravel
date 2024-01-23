<template>
    <main>
        <employerlayout>      
          <div class="content-wrapper" style="min-height: 902.8px;"  slot="employerbody">
              <div class="dashboard_right_detail">
                <div class="dashboard-heading-main">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="left-dashboard">
                        <h2>Edit Question</h2>
                      </div>
                    </div>
                  </div>
                </div>         
                <div class="mycompany-heading-main"><br>                            
                  <div class="document-file question-add">                  
                    <div class="personal-detail-right ">
                      <h3>Question Details
                        <a id="edit-btn">
                          <router-link to="/employer/question/index"><button type="button" class="btn browse-btn">Back</button></router-link>
                        </a>
                      </h3>
                  <form class="form-horizontal" @submit.prevent="submit" ref="frm_question_category" enctype="multipart/form-data">
                    <div class="personal-details-body">                  
                      <div class="detail-form detail-formmm" style="display: block;">
                        <div class="row">
                          <div class="form-group">
                              <label class="control-label col-md-12">Title</label>
                              <div class="col-md-12">
                                <input type="text" class="form-control"  name="title" id="title" v-model="fields.title" placeholder="Title">
                                <div v-if="errors && errors.title" class="text-danger">{{ errors.title[0] }}</div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-md-12">Question Type</label>
                              <div class="col-md-12">
                                <select class="form-control" name="question_type" id="question_type" v-model="question_type">
                                  <option value=1>Multi Select</option>
                                    <option value="2">Single Select</option>
                                </select>
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-12">Recommended Question</label>
                            <div class="col-md-12">
                              <select class="form-control" name="is_recommended" id="is_recommended" v-model="is_recommended">
                                 <option value="0">No</option>
                                 <option value="1">Yes</option>
                              </select>
                            </div>
                        </div>

                         <div v-if="dataOptions.length > 0">
                          <p style="display:none">{{ j = 0 }}</p>
                          <div class="form-group " v-for="option in dataOptions" :key="option.id">
                              <label for="inputEmail3" class="col-sm-2 col-form-label">Option Title</label>
                              <div class="col-sm-12">
                                <div class="add-btn-add">
                                  <input type="text" class="form-control" name="option[]" id="option" placeholder="Option Title" :value="option.title" />
                             

                              
                                  <button v-if="j == 0" type="button" class="btn btn-success add_button"><i class="fa fa-plus"></i></button>
                             
                             
                                  <button v-if="j > 0" type="button" class="btn btn-success remove_button"><i class="fa fa-minus"></i></button>
                              </div>
                               </div>  
                       
                              <p style="display:none">{{ j++}}</p>                    
                          </div>
                          <div class="containerDiv">                        
                          </div>
                        </div>

                        <div v-if="dataOptions.length == 0">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Option Title</label>
                            <div class="col-sm-12">
                              <div class="add-btn-add">
                                <input type="text" class="form-control" name="option[]" id="option" placeholder="Option Title" />
                                <button type="button" class="btn btn-success add_button"><i class="fa fa-plus"></i></button>
                                </div> 
                        </div>            
                        </div>
                        <div class="containerDiv">                        
                        </div>
                    </div>

                        <div class="form-group">
                          <label class="control-label col-md-12">Status</label>
                          <div class="col-md-12">
                            <select class="form-control" name="status" id="status" v-model="status">
                              <option value="1">Active</option>
                              <option value="0">In-Active</option>
                            </select>
                             <div v-if="errors && errors.status" class="text-danger">{{ errors.status[0] }}</div>
                          </div>
                       </div>                      
                       <div class="form-group">
                          <div class="col-md-12">
                             <button class="btn save-btn" name="btnSubmit" id="btnSubmit">Save</button>                             
                          </div>
                       </div>
                    </div>
                  </div>
                </div>
                </form>
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
          data() {
                    return {
                        fields: {},
                        errors: {},
                        status: '' ,
                        categoryData: [],    
                        dataRecord: [],
                        keywords: '',    
                        is_recommended: '',  
                        question_type: 1, 
                        dataOptions: [],                  
                    }
                },
            mounted()
            {            
              this.getRecord();                 
              var maxField = 10; 
              var x = 1;
              var wrapper = $('.containerDiv');
                $('.detail-formmm').on('click', '.add_button', function(e)
                {                 
                    if(x < maxField)
                    {                       
                        x++;
                        var fieldHTML = '<div class="form-group "><label for="inputEmail3" class="col-sm-2 col-form-label">Option Title</label><div class="col-sm-12"><div class="add-btn-add"><input type="text" class="form-control" name="option[]" id="amount" placeholder="Option Title" /><button type="button" class="btn btn-success remove_button"><i class="fa fa-minus"></i></button></div></div></div>';
                        console.log(fieldHTML)
                        $('.containerDiv').append(fieldHTML);
                    }
                });
                $('.detail-formmm').on('click', '.remove_button', function(e){
                    e.preventDefault();
                    $(this).parent().parent().parent('div').remove(); //Remove field html
                    x--; //Decrement field counter
                });
            },
             methods: {               
                  getRecord() {
                        var id = window.location.href.split('/').pop();
                        axios.get('/api/front/employer/question/edit/'+id)
                        .then( (response) => { 
                           this.dataRecord = response.data; 
                            this.dataOptions = response.data.options;
                            console.log(response.data)            
                            this.fields = {
                                    title: this.dataRecord.title,    
                                                                
                                },
                                this.is_recommended = this.dataRecord.is_recommended;
                                this.status = this.dataRecord.status;
                                this.question_type = this.dataRecord.question_type;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                         
                        },        
                submit() {
                this.errors = {};
                var id = window.location.href.split('/').pop();
                let formData = new FormData(this.$refs.frm_question_category);
                axios.post('/api/front/employer/question/update/'+id,formData).then(response => {
                if(response.data.status == 501)
                {
                    this.flashMessage.error({                                   
                            message: response.data.message
                        });
                }
                else if(response.data.status == 502)
                {
                    this.flashMessage.error({                                   
                            message: response.data.message
                        });
                }
                else if(response.data.status === 200)
                {
                    this.$router.push("/employer/question/index");
                    this.flashMessage.success({                                   
                            message: response.data.message
                        });
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

