<template>
    <div>
        <admindashboard>
        <div class="content-header" slot="adminbody" style="margin-left:18%">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Question</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Question Add</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <section class="contener" slot="adminbody" style="margin-left:20%;margin-right:1.5%">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title" style="float:left">Create Question</h3>
                <router-link to="/admin/question/index" style="floa:right;margin-left:78%">
                    <button class="btn btn-success">Back</button>
                </router-link>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="submit" ref="frm_question_category" enctype="multipart/form-data">
                  
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="title" id="title" v-model="fields.title" placeholder="Title">
                      <div v-if="errors && errors.title" class="text-danger">{{ errors.title[0] }}</div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Question Type</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="question_type" id="question_type" v-model="question_type">
                        <option value=1>Multi Select</option>
                        <option value="2">Single Select</option>
                    </select>                       
                    </div>
                </div>  

                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Recommended Question</label>
                  <div class="col-sm-10">
                  <select class="form-control" name="is_recommended" id="is_recommended" v-model="is_recommended">
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                  </select>                       
                  </div>
                </div>  

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Option Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="option[]" id="option" placeholder="Option Title" />
                    </div>                   
                    <div class="col-md-1">
                      <button type="button" class="btn btn-success add_button"><i class="fa fa-plus"></i></button>
                    </div>                    
                </div>
                <div class="containerDiv">
                      
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="status" id="status" v-model="status">
                        <option value="1">Active</option>
                        <option value="0">In-Active</option>
                    </select>                       
                      <div v-if="errors && errors.status" class="text-danger">{{ errors.status[0] }}</div>
                    </div>
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
                        status: 1 ,
                        categoryData: [],
                        is_recommended : 0, 
                        question_type: 1,
                        
                        
                    }
                },
                mounted()
                {
                  var maxField = 10; 
                  var x = 1;
                  var wrapper = $('.containerDiv');
                    $('.contener').on('click', '.add_button', function(e)
                    {                 
                        if(x < maxField)
                        {                       
                            x++;
                            var fieldHTML = '<div class="form-group row"><label for="inputEmail3" class="col-sm-2 col-form-label">Option Title</label><div class="col-sm-9"><input type="text" class="form-control" name="option[]" id="amount" placeholder="Option Title" /></div><div class="col-md-1"><button type="button" class="btn btn-primary remove_button"><i class="fa fa-minus"></i></button></div></div>';
                            console.log(fieldHTML)
                            $('.containerDiv').append(fieldHTML);
                        }
                    });
                    $('.contener').on('click', '.remove_button', function(e){
                        e.preventDefault();
                        $(this).parent().parent('div').remove(); //Remove field html
                        x--; //Decrement field counter
                    });
                },
             methods: {
                        submit() 
                        {
                          this.errors = {};
                          let formData = new FormData(this.$refs.frm_question_category);
                          axios.post('/api/admin/question/store', formData).then(response => {
                          if(response.data.status == 500)
                          {
                             this.flashMessage.error({                                   
                                        message: response.data.message
                                    });
                          }
                          else
                          {
                            this.fields = {}
                            this.$router.push("/admin/question/index");
                            this.flashMessage.success({                                   
                                        message: 'Record Added Successfully!'
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