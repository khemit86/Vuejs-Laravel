<template>
    <div>
      <admindashboard>
        <div class="content-header" slot="adminbody" style="margin-left:18%">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Jobs List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Jobs List</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
        <section class="content" slot="adminbody" style="margin-left:20%;margin-right:1.5%">
            <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <input style="float:left" type="text" name="search" id="search" v-model="search" class="form-control col-md-3" placeholder="Search by name" />
                 <!-- <VueCtkDateTimePicker @input="getDate" @destroy="removeDate"  style="float:left;max-width:25%" v-model="dateRangeValue" 
                  id="RangeDatePicker" 
                  label="Choose Date" 
                  color="#6cb2eb" 
                  format="YYYY-MM-DD"
                  formatted="ll"
                  :range="true"
                  input="abcd"
                  /> -->
                <div class="card-tools">                  
                   <router-link to="/admin/job/add" class="btn btn-success">
                   Add New Job <i class="fas fa-user-plus"></i>
                  </router-link>                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                        <th>Title</th>
                        <th>Employer Name</th>
                        <th>Location</th>
                        <th>Work Type</th> 
                        <th>Approved Status</th>                      
                        <th>Job Status</th>
                        <th>Visibility</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="data in dataRecord.data" :key="data.id">
                      <td>{{ data.title }}</td>
                      <td>{{ data.post_job_user.name }}</td>   
                      <td>{{ data.location }}</td>   
                      <td v-if="data.work_type == 1">Full Time</td>
                      <td v-else-if="data.work_type == 2">Part Time</td>
                      <td v-else-if="data.work_type == 3">Temporary</td>
                      <td v-else-if="data.work_type == 4">Contract</td>
                      <td v-else-if="data.work_type == 5">Internship</td>           
                      <td>                        
                          <select class="form-control" name="approved" id="approved" @change="changeApproved($event, data.id)">
                            <option value="1" :selected="data.approved==1?true : false">Approved</option>
                            <option value="0" :selected="data.approved==0?true : false">Pending for Approval</option>
                          </select>                
                        </td>
                      <td v-if="data.step == 4 && data.is_expired == 0">Open</td>
                      <td v-else-if="data.step == 4 && data.is_expired == 1">Expired</td>
                      <td v-else>Draft</td>  
                      <td>                        
                        <select class="form-control" name="status" id="status" @change="changeStatus($event, data.id)">
                          <option value="1" :selected="data.status==1?true : false">Show</option>
                          <option value="0" :selected="data.status==0?true : false">Hide</option>
                        </select>                
                      </td>                                      
                      <td>
                        <router-link :to="'/admin/job/edit?jobid='+data.id" class="btn btn-primary"><i class="fas fa-edit"></i></router-link>
                        <a href="javascript:void(0)" @click="deleteRecord(data.id)" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        <router-link :to="'/admin/job/view/'+data.id" class="btn btn-info" style="color:#fff !important"><i class="fas fa-eye"></i></router-link>                   
                       
                      </td>
                    </tr>
              
                  </tbody>
                </table>
                <pagination align="right" :limit="5"  :data="dataRecord"  @pagination-change-page="getRecord" style="margin-top:2px;margin-right:4%">
                   <span slot="prev-nav">&lt; Previous</span>
                   <span slot="next-nav">Next &gt;</span>
                </pagination>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        </section>
         <FlashMessage :position="'right bottom'"></FlashMessage>
          </admindashboard>           
    </div>    
</template>
<script>
    export default {
      data()
      {
          return{
              dataRecord: {},
              search: '',
              dateRangeValue: null,
              start_date: '',
              end_date: '',
          }
      },
      watch: {
        search(after, before)
        {
          this.getRecord();
        }
      },
      mounted(){ 
       this.getRecord();
      },
      methods: {
        changeApproved(event, id)
        {
           axios.get('/api/admin/job/changeApproved/'+id)
              .then( (response) => { 
                if(response.data.status == 200)
                {
                   this.flashMessage.success({                                   
                       message: response.data.message
                   });
                }
                else
                {
                   this.flashMessage.error({                                   
                       message: response.data.message
                   });
                }
                  
              })
              .catch(function (error) {
                   console.log(error);
              });
        },
        changeStatus(event, id)
        {
           axios.get('/api/admin/job/changeStatus/'+id)
              .then( (response) => { 
                if(response.data.status == 200)
                {
                   this.flashMessage.success({                                   
                       message: response.data.message
                   });
                }
                else
                {
                   this.flashMessage.error({                                   
                       message: response.data.message
                   });
                }
              })
              .catch(function (error) {
                   console.log(error);
              });
        },        
        getRecord(page) {
           axios.get('/api/admin/job/index?page='+ page+'&search='+this.search)
                .then( (response) => { 
                  this.dataRecord = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        // getParentCat(page) {
        //   console.log('id '+this.parent_cat_id)
        //    axios.get('/api/admin/category/getParentCat/'+ 17)
        //         .then( (response) => { 
                 
        //         })
        //         .catch(function (error) {
        //             console.log(error);
        //         });
        // },
        deleteRecord(id){
          if(confirm("Are you sure want to delte this record?"))
          {
            axios.get('/api/admin/job/delete/'+id)
                .then( (response) => { 
                  this.flashMessage.success({                                   
                    message: 'Record Deleted Successfully!'
                  });              
                  this.getRecord();
                })
                .catch(function (error) {
                    console.log(error);
                });
          }
        },
      }
    }
</script>