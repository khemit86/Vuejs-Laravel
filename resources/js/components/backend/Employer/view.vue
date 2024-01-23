<template>
    <div>
      <admindashboard>
        <div class="content-header" slot="adminbody"  style="margin-left:20%;margin-right:1.5%">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Employer</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Employer Details</li>
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
                <h3 class="card-title">Employer Details</h3>

                <div class="card-tools">
                   <router-link to="/admin/employer/index" class="btn btn-success">
                   Back <i class="fa fa-arrow-left"></i>
                  </router-link>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                   <tr>
                      <th>Company Name</th>
                      <td>{{ dataEmployer.company_name }}</td>         

                      <th>Email</th>
                      <td>{{ dataEmployer.email }}</td>
                      <th><td></td></th>
                    </tr>
                    <tr>
                      <th>Company Representative Full Name</th>
                      <td>{{ dataEmployer.name }}</td>         

                      <th>Phone</th>
                      <td>{{ dataEmployer.mobile }}</td>
                      <th><td></td></th>
                    </tr>
                    <tr>
                      <th>Industries Of Operation</th>
                      <td>{{ dataCategory }}</td>         

                      <th>Location</th>
                      <td>{{ dataEmployer.location }}</td>
                      <th><td></td></th>
                    </tr>

                     <tr>
                      <th>Country</th>
                      <td>{{ country_name }}</td>         

                      <th>Company Description</th>
                      <td>{{ dataEmployer.company_description }}</td>
                      <th><td></td></th>
                    </tr>

                    <tr>
                      <th>Verification Type</th>
                      <td v-if="dataEmployer.is_verified === 1">Verified</td>         
                      <td v-if="dataEmployer.is_verified === 0">Not Verified</td> 
                      <th>Status</th>
                      <td v-if="dataEmployer.status == 1">Active</td>
                      <td v-if="dataEmployer.status === 0">In-Active</td>
                      <th><td></td></th>
                    </tr>

                     <tr>
                      <th>Employer Created</th>
                      <td>{{ dataEmployer.created_at }}</td>
                      <th>Last Login</th>
                      <td v-if="dataEmployer.last_login">{{ dataEmployer.last_login }}</td>
                      <td v-else>Not Login Yet!</td>
                      <th><td></td></th>
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
              dataEmployer: [],
              country_name: '',
              dataCategory: [],
          }
      },
      mounted()
      {
        this.getEmployer();
      },
      methods: {
        getEmployer()
        {
            var id = window.location.href.split('/').pop();
            axios.get('/api/admin/employer/view/'+id).then(response => 
            {
               this.dataEmployer = response.data;
               this.country_name = response.data.country.name;
               var i = 0;              
               for (let category of response.data.user_categories) 
                {
                    if(category.child_category_id > 0)
                    {

                    }
                    else
                    {
                        if(i == 0)
                        {
                           this.dataCategory  = category.categories.name;
                        }
                        else
                        {
                           this.dataCategory = this.dataCategory+', '+category.categories.name;
                        }
                        
                    }
                    i++;
                }          
            });
        },    
      },
     
    }
</script>