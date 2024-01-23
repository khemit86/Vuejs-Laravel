<template>
    <div>
        <admindashboard>
        <div class="content-header" slot="adminbody" style="margin-left:18%">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Subscription</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Subscription Add</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <section class="contener" slot="adminbody" style="margin-left:20%;margin-right:1.5%">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title" style="float:left">Create Subscription</h3>
                <router-link to="/admin/subscription/index" style="float:right;margin-right:3px">
                    <button class="btn btn-success">Back</button>
                </router-link>
              </div>
              <form class="form-horizontal" @submit.prevent="submit" ref="frm_subscription" enctype="multipart/form-data">
                  
                <div class="card-body">

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="title" id="title" v-model="fields.title" placeholder="Title">
                      <div v-if="errors && errors.title" class="text-danger">{{ errors.title[0] }}</div>
                    </div>
                  </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                    <textarea name="description" id="description" v-model="fields.description" class="form-control"></textarea>
                      <div v-if="errors && errors.description" class="text-danger">{{ errors.description[0] }}</div>
                    </div>
                </div>

                 
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Plan Amount</label>
                  <div class="col-sm-10">
                    <input type="number" step="0.01" class="form-control" name="amount" id="amount" v-model="fields.amount" placeholder="Plan Amount">
                    <div v-if="errors && errors.amount" class="text-danger">{{ errors.amount[0] }}</div>
                  </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Plan Duration</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="plan_duration" id="plan_duration" v-model="plan_duration">
                        <option value="" selected="selected">Select Plan Duration</option>
                        <option value="30">Monthly</option>
                        <option value="90">Quarterly</option>
                        <option value="365">Yearly</option>
                    </select>                       
                      <div v-if="errors && errors.plan_duration" class="text-danger">{{ errors.plan_duration[0] }}</div>
                    </div>
                </div>
                 
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Advert Live Duration (In Days)</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="post_visibility" id="post_visibility" v-model="fields.post_visibility" placeholder="Advert Live Duration">
                    <div v-if="errors && errors.post_visibility" class="text-danger">{{ errors.post_visibility[0] }}</div>
                  </div>
                </div>                 

                  
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Key Feature</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="key_fetures[]" id="key_fetures" v-model="fields.key_fetures" placeholder="Key Feature">
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
                        <option value="" selected="selected">Select Status</option>
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
                        description: '',
                        plan_duration: '' ,
                        status: '',                    
                    }
                },
            mounted()
            {
                var maxField = 10; 
                var x = 1;
                var addButton = $('.add_button');
                var wrapper = $('.containerDiv');
                $(addButton).click(function()
                {
                    if(x < maxField)
                    { 
                        x++;
                        var fieldHTML = '<div class="form-group row"><label class="col-sm-2 form-control-label" for="key_fetures">Key Feature</label><div class="col-sm-9"><input class="form-control" type="text" name="key_fetures[]" id="key_fetures" placeholder="Key Feature"></div><div class="col-md-1"><button type="button" class="btn btn-primary remove_button"><i class="fa fa-minus"></i></button></div></div>';
                        $(wrapper).append(fieldHTML);
                    }
                });
                 $(wrapper).on('click', '.remove_button', function(e){
                    e.preventDefault();
                    $(this).parent().parent('div').remove(); //Remove field html
                    x--; //Decrement field counter
                });
            },
             methods: {
                        submit() {
                        this.errors = {};
                        let formData = new FormData(this.$refs.frm_subscription);
                        axios.post('/api/admin/subscription/store', formData).then(response => {
                        this.fields = {}
                        this.$router.push("/admin/subscription/index");
                           this.flashMessage.success({                                   
                                    message: response.data.message
                                });
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