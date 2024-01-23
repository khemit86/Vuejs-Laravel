<template>
    <div>
      <admindashboard>
        <div class="content-header" slot="adminbody" style="margin-left:18%">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Subscription List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Subscription List</li>
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
                <input type="text" name="search" id="search" v-model="search" class="form-control col-md-3" placeholder="Search by name" />
                <div class="card-tools">                  
                   <router-link to="/admin/subscription/add" class="btn btn-success">
                   Add New Subscription <i class="fas fa-user-plus"></i>
                  </router-link>                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                        <th>Plan Title</th>
                        <th>Plan Amount</th>
                        <th>Plan Duration(Days)</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="data in dataRecord.data" :key="data.id">
                      <td>{{ data.title }}</td>
                      <td>{{ data.amount }}</td>
                      <td>{{ data.plan_duration }}</td>                                                                 
                      <td v-if="data.status == 1">Active</td>
                      <td v-else>In-Active</td>                                      
                      <td>
                        <a href="javascript:void(0)" @click="deleteRecord(data.id)" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        <router-link :to="'/admin/subscription/edit/'+data.id" class="btn btn-info" style="color:#fff !important"><i class="fas fa-pen-alt"></i></router-link>                   
                       
                      </td>
                    </tr>
              
                  </tbody>
                </table>
                <pagination align="right"  :data="dataRecord"  @pagination-change-page="getRecord" style="margin-top:2px;margin-right:4%">
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
              dataRecord: [],
              search: '',
          }
      },
      watch: {
        search(after, before)
        {
          this.getRecord();
        }
      },
      mounted(){ 
       
      },
      methods: {
        getRecord(page) {
           axios.get('/api/admin/subscription/index?page='+ page+'&search='+this.search)
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
            axios.delete('/api/admin/subscription/delete/'+id)
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
      },
      created() {
         this.getRecord();
      }
    }
</script>