<template>
    <div>
      <admindashboard>
        <div class="content-header" slot="adminbody"  style="margin-left:20%;margin-right:1.5%">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Post Job</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Post Job</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
        <section class="content" slot="adminbody"  style="margin-left:20%;margin-right:1.5%">
            <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Post Job</h3>

                <div class="card-tools">
                   <router-link to="/admin/job/index" class="btn btn-success">
                   Back <i class="fa fa-arrow-left"></i>
                  </router-link>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                   <tr>
                      <th>Post Job Title</th>
                      <td>{{ dataRecord.title }}</td>  

                      <th>Employer Name</th>
                      <td>{{ employerName }}</td>       

                      <th>Location</th>
                      <td>{{ dataRecord.location }}</td>
                     
                    </tr>
                    <tr>
                      <th>Work Type</th>
                      <td v-if="dataRecord.work_type == 1">Full Time</td> 
                      <td v-else-if="dataRecord.work_type == 2">Part Time</td> 
                      <td v-else-if="dataRecord.work_type == 3">Temporary</td>        
                      <td v-else-if="dataRecord.work_type == 4">Contract</td> 
                      <td v-else-if="dataRecord.work_type == 5">Internship</td>
                      <th>Category</th>
                      <td>{{ categoryName }}</td>           

                       <th>Estimated Salary</th>
                      <td>{{ dataRecord.estimated_salary }}</td>
                    </tr>

                    <tr>
                      <th>Salary From</th>
                      <td v-if="dataRecord.salary_from != 0">{{ dataRecord.salary_from }}</td>  
                      <td v-else>---</td>

                      <th>Salary To</th>
                      <td v-if="dataRecord.salary_to != 0">{{ dataRecord.salary_to }}</td>  
                      <td v-else>---</td>       

                      <th>Job Reference</th>
                      <td v-if="dataRecord.job_reference != ''">{{ dataRecord.job_reference }}</td>  
                      <td v-else>---</td>                     
                    </tr>

                    <!-- <tr v-if="tasks.length > 0">
                      <th>Task<th>
                    </tr> -->

                    <tr>
                      <th>Approved Status</th>
                      <td v-if="dataRecord.approved ==1">Approved</td>  
                      <td v-else>Pending for Approval</td>

                      <th>Job Status</th>
                      <td v-if="dataRecord.step == 4 && dataRecord.is_expired == 0">Open</td>  
                      <td v-else-if="dataRecord.step == 4 && dataRecord.is_expired == 1">Expired</td>       
                      <td v-else-if="dataRecord.step < 4">Draft</td>

                      <th>Visibility</th>
                      <td v-if="dataRecord.status ==1">Show</td>
                      <td v-else>Hide</td>                     
                    </tr>

                    <tr v-if="dataRecord.write_job_type == 1">                      
                     
                    </tr>

                    <tr v-if="dataRecord.write_job_type == 2">               
                     <th>Job Description</th>
                      <td v-if="dataRecord.job_description != ''">{{ dataRecord.job_description  }}</td>  
                      <td v-else>---</td>

                      <th>Job Summary</th>
                      <td v-if="dataRecord.job_summary != ''">{{ dataRecord.job_summary }}</td>  
                      <td v-else>---</td>
                    </tr>

                    <tr>
                      <th>Job Created</th>
                      <td>{{ dataRecord.created_at }}</td>                        

                      <th>Job Modified</th>
                      <td>{{ dataRecord.updated_at }}</td>
                     
                    </tr>

                </table>
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
              dataRecord: [],
              categoryName: '',
              employerName: '',
              tasks: [],
          }
      },
      mounted()
      {
         this.getRecord();
      },
      methods: {
        getRecord() {
          var id = window.location.href.split('/').pop();
           axios.get('/api/admin/job/view/'+id)
              .then( (response) => { 
                
                this.dataRecord = response.data;
                if(response.post_job_tasks)
                {
                  this.tasks = response.post_job_tasks;
                }
                
                if(response.data.post_job_user.name)
                {
                  this.employerName = response.data.post_job_user.name;
                }
                if(response.data.post_job_category.name)
                {
                  this.categoryName = response.data.post_job_category.name;
                }
                
              })
              .catch(function (error) {
                   console.log(error);
              });         
        },        
      }
    }
</script>