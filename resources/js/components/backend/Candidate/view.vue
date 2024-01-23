<template>
    <div>
      <admindashboard>
        <div class="content-header" slot="adminbody"  style="margin-left:20%;margin-right:1.5%">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Candidate</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Candidate Details</li>
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
                <h3 class="card-title">Candidate Details</h3>

                <div class="card-tools">
                   <router-link to="/admin/candidate/index" class="btn btn-success">
                   Back <i class="fa fa-arrow-left"></i>
                  </router-link>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                   <tr>
                      <th>First Name</th>
                      <td>{{ dataCandidate.first_name }}</td>         

                      <th>Last Name</th>
                      <td>{{ dataCandidate.last_name }}</td>
                      <th><td></td></th>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <td>{{ dataCandidate.email }}</td>         

                      <th>Phone</th>
                      <td>{{ dataCandidate.mobile }}</td>
                      <th><td></td></th>
                    </tr>
                    <tr>
                      <th>Postal Code</th>
                      <td>{{ dataCandidate.postal_code }}</td>         

                      <th>Location</th>
                      <td>{{ dataCandidate.location }}</td>
                      <th><td></td></th>
                    </tr>
                    <tr>
                      <th>Verification Type</th>
                      <td v-if="dataCandidate.is_verified === 1">Verified</td>         
                      <td v-if="dataCandidate.is_verified === 0">Not Verified</td> 
                      <th>Status</th>
                      <td v-if="dataCandidate.status == 1">Active</td>
                      <td v-if="dataCandidate.status === 0">In-Active</td>
                      <th><td></td></th>
                    </tr>

                     <tr>
                      <th>Candidate Created</th>
                      <td>{{ dataCandidate.created_at }}</td>
                      <th>Last Login</th>
                      <td v-if="dataCandidate.last_login">{{ dataCandidate.last_login }}</td>
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
              dataCandidate: []
          }
      },
      methods: {
        getCandidate() {
          var id = window.location.href.split('/').pop();
          axios.get('/api/admin/candidate/view/'+id).then(({ data }) => (this.dataCandidate = data));         
        },        
      },
      created() {
         this.getCandidate();
      }
    }
</script>