<template>
    <div>
      <admindashboard>
        <div class="content-header" slot="adminbody" style="margin-left:18%">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Candidate List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Candidate List</li>
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
                <input style="float:left"  type="text" name="search" id="search" v-model="search" class="form-control col-md-3" placeholder="Search by first,last name, email" />
                <!-- <button style="float:left;margin-left:10px" class="btn btn-success" id="showDate">Filter By Date</button> -->
                <!-- <date-range-picker  id="dataPicker" style="width: 100px !important;float:left"  :from="$route.query.from" :to="$route.query.to" :panel="$route.query.panel" @update="update"/> -->
                <!-- <button class="btn btn-success" @click="btnCaldender" style="margin-left:10px">Choose Date</button> -->
                <VueCtkDateTimePicker @input="getDate" @destroy="removeDate"  style="float:left;max-width:25%" v-model="exportdDteRangeValue" 
                  id="RangeDatePicker" 
                  label="Choose Date" 
                  color="#6cb2eb" 
                  format="YYYY-MM-DD"
                  formatted="ll"
                  :range="true"
                  input="abcd"
                  />
                <div class="card-tools">                  
                   <router-link to="/admin/candidate/add" class="btn btn-success">
                   Add New Candidate <i class="fas fa-user-plus"></i>
                  </router-link>
                  <a data-toggle="modal" data-target="#myModal" href="#"><button class="btn btn-success" style="width:100px;">Export</button></a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                        <th>UID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <!-- <th>Candidate Registration</th> -->
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="data in dataCandidate.data" :key="data.id">
                      <td><router-link :to="`/admin/payment/index?uid=${data.u_id}`">{{ data.u_id }}</router-link></td>
                      <td>{{ data.first_name }}</td>
                      <td>{{ data.last_name }}</td>
                      <td>{{ data.email }}</td>
                       <td>{{ data.mobile }}</td>                      
                      <td>                        
                        <select class="form-control" name="is_verified" id="is_verified" @change="changeStatus($event, data.id)">
                          <option value="1" :selected="data.is_verified==1?true : false">Verified</option>
                          <option value="2" :selected="data.is_verified==0?true : false">Not Verified</option>
                        </select>                
                      </td>
                      <td>
                        <a href="javascript:void(0)" @click="deleteCandidate(data.id)" class="btn btn-danger delete_candidate"><i class="fas fa-trash-alt"></i></a>
                        <router-link :to="'/admin/candidate/edit/'+data.id" class="btn btn-info" style="color:#fff !important"><i class="fas fa-pen-alt"></i></router-link>                        
                        <router-link :to="'/admin/candidate/view/'+data.id" class="btn btn-info" style="color:#fff !important"><i class="fas fa-eye"></i></router-link>
                         <!-- <a v-if="data.cv_file" :href="'../../uploads/csv/'+data.cv_file" target="_blank"><button type="button" class="btn btn-info" style="color:#fff !important">CV</button></a> -->
                         <a v-if="data.cv_file" :data-id="data.cv_file" class="showPDF" href="javascript:void(0)"><button type="button" class="btn btn-info"  style="color:#fff !important">CV</button></a>
                      </td>
                    </tr>              
                  </tbody>
                </table>
                <pagination align="right"   :data="dataCandidate"  @pagination-change-page="getCandidate" style="margin-top:2px;margin-right:4%">
                   <span slot="prev-nav">&lt; Previous</span>
                   <span slot="next-nav">Next &gt;</span>
                </pagination>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>


        <div id="myModalPDF" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <!-- <h4 class="modal-title">CV File</h4> -->
                    </div>
                    <div class="modal-body">

                        <embed id="pdfFile" src="" frameborder="0" width="100%">

                        <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div> -->
                    </div>

                </div>
            </div>
        </div>

        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Export Candidates</h4>
                <button type="button" class="close" data-dismiss="modal">
                &times;
              </button>
              </div>
              <form name="frm_export" ref="frm_export" @submit.prevent="exportCandidate">                
              <div class="modal-body">
                <h6>Please Select Candidates Fields</h6>
                <input type="hidden" class="chk" name="fields[u_id]" value="UID">
                <div class="row"> 
                <div class="col-md-6">
                  <label><input type="checkbox" class="chk" name="fields[first_name]" value="First Name"> First Name</label>
                </div> 
                <div class="col-md-6">
                  <label><input type="checkbox" class="chk" name="fields[last_name]" value="Last Name"> Last Name</label>
                </div>              
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <label><input type="checkbox" class="chk" name="fields[email]" value="Email"> Email</label>
                  </div> 

                  <div class="col-md-6">
                    <label><input type="checkbox" class="chk" name="fields[mobile]" value="Mobile"> Phone Number</label>
                  </div>          
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <label><input type="checkbox" class="chk" name="fields[postal_code]" value="Postal Code"> Postal Code</label>
                  </div>

                  <div class="col-md-6">
                    <label><input type="checkbox" class="chk" name="fields[location]" value="Location"> Location</label>
                  </div>          
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <label><input type="checkbox" class="chk" name="fields[verification_type]" value="Verification Type"> Verification Type</label>
                  </div>

                  <div class="col-md-6">
                    <label><input type="checkbox" class="chk" name="fields[cv_file]" value="Uplaoded CV Path"> Uploaded CV</label>
                  </div>
                </div>

                <!-- <div class="row col-md-12">
                  <div class="col-md-6">
                    <span style="margin-left:10px">From Date</span>
                    <p><input type="date" id="fromDate" class="form-control" name="filter[from_date]" value="Date From"></p>
                  </div>

                  <div class="col-md-6">
                    <span style="margin-left:10px">To Date</span>
                    <p><input type="date" id="toDate" min="<?= date('Y-m-d'); ?>"  class="form-control" name="filter[to_date]" value="Date To"></p>
                  </div>
                </div> -->
                <VueCtkDateTimePicker @input="getDateExport" v-model="exportDateRangeValue" id="exportDatePicker" 
                  label="Choose Date" 
                  color="#6cb2eb" 
                  format="YYYY-MM-DD"
                  formatted="ll"
                  :range="true"
                  input="abcdefg"
                  style="margin-left:-10px"
                  />
                <input type="hidden" name="filter[from_date]" id="export_from_date" />
                <input type="hidden" name="filter[to_date]" id="export_to_date" />

              <!--  <div class="row col-md-12">
                  <div class="col-md-6">
                    <select class="form-control" name="limit">
                      <option value="">Records Limits</option>
                      <option value="1">All Records</option>
                      <option value="10">10</option>
                      <option value="10">50</option>
                      <option value="10">100</option>
                      <option value="10">200</option>
                      <option value="10">500</option>
                    </select>           
                  </div>
                  <div class="col-md-6">
                    <select class="form-control" name="order">
                      <option value="">Sort Type</option>
                      <option value="1">New Records</option>
                      <option value="2">Old Records</option>
                    </select>           
                  </div>
                </div> -->
                <div class="row">
                  <div class="col-md-4">
                    <input type="submit" id="btnSubmit" style="margin-top:20px" name="btnSubmit" class="btn perple-btn" value="Submit">
                  </div>
                </div>
              </div>
              </form>
            </div>

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
              dataCandidate: [],
              search: '',
              dateRangeValue: null,
              exportDateRangeValue: null,
              start_date: '',
              end_date: '',
          }
      },
      watch: {
        search(after, before)
        {
          this.getCandidate();
        }
      },
      mounted(){ 
        $('#fromDate').change(function()
        {
          var date = $(this).val();
          $('#toDate').attr('min',date);
        });
        
    $('body').on('click','.showPDF',function(){
           var fileName = $(this).attr('data-id');
           var url = '../../uploads/csv/';
           var finalUrl = url+fileName
           $('#pdfFile').attr('src',finalUrl);
           $('#myModalPDF').modal('show');
           $('#myModalPDF').css('display','flex');
        }); 
      $('#showDate').click(function()
      {
         $('#dataPicker').show();
      });

      },
      methods: {
        getDate(events)
        {
           if(events != null)
           {
              this.start_date = events.start;
              this.end_date = events.end;
              this.getCandidate();
           }
           else
           {
              this.start_date = '';
              this.end_date = '';
              this.getCandidate();
           }
           
        },
        getDateExport(events)
        {
          if(events != null)
           {
              $('#export_from_date').val(events.start);
              $('#export_to_date').val(events.end);
           }
           else
           {
              this.start_date = '';
              this.end_date = '';
              this.getCandidate();
           }
        },
        getCandidate(page) {
           axios.get('/api/admin/candidate/index?page='+ page+'&search='+this.search+'&start_date='+this.start_date+'&end_date='+this.end_date)
                .then( (response) => { 
                  
                  this.dataCandidate = response.data
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        deleteCandidate(id){
          if(confirm("Are you sure want to delte this record?"))
          {
            axios.delete('/api/admin/candidate/delete/'+id)
                .then( (response) => { 
                  this.flashMessage.success({                                   
                    message: 'Record Deleted Successfully!'
                  });              
                  this.getCandidate();
                })
                .catch(function (error) {
                    console.log(error);
                });
          }
        },
        changeStatus(event, id){
          axios.get('/api/admin/candidate/changeStatus/'+id)
              .then( (response) => { 
                this.flashMessage.success({                                   
                  message: response.data.message
                });  
              })
              .catch(function (error) {
                   console.log(error);
              });
         
        },
        exportCandidate()
        {
            var isSelect = 0;
            $('.chk').each(function()
            {
                  if($(this).prop('checked') == true)
                  {
                    isSelect = 1;
                  }
            });
            if(isSelect == 1)
            {
               let formData = new FormData(this.$refs.frm_export);
                axios.post('/api/admin/candidate/export',formData)
                .then( (response) => { 
                  //this.downloadFile(response, 'candidate');
                  $('#myModal').modal('hide');
                  var link = document.createElement('a')
                  link.href = response.data.path
                  link.click();
                  console.log(response.data)
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
            else if(isSelect == 0)
            {
               this.flashMessage.error({                                   
                  message: 'Please select at least one column to export!'
                });  
            }
        
        },
        downloadFile(response, filename) 
        {        
          var newBlob = new Blob([response.body], {type: 'application/vnd.ms-excel'});
          if (window.navigator && window.navigator.msSaveOrOpenBlob) 
          {
            window.navigator.msSaveOrOpenBlob(newBlob)
            return
          }
          const data = window.URL.createObjectURL(newBlob)
          var link = document.createElement('a')
          link.href = data
          link.download = filename + '.xlsx'
          link.click()
          setTimeout(function () {
            window.URL.revokeObjectURL(data)
          }, 100)
        },        
      },
      created() {
         this.getCandidate();
      }
    }
</script>
<style>
  #myModalPDF {
    padding-left: 270px !important;
    align-items: center;
}
#myModalPDF .modal-lg, #myModalPDF .modal-xl {
    width: 99%;
    max-width: 99%;
    margin: 10vh 0 0;
}
#myModalPDF .modal-body embed {
    height: 70vh;
}

#myModal .modal-header {
    background: #2c2c85;
    position: relative;
    border-color: #2c2c85;
    box-shadow: none;
}
#myModal .modal-title {
    font-size: 18px;
    font-weight: 600;
    color: #fff;
    display: inline-block;
}
#myModal .modal-header .close {
    position: absolute;
    top: 11px;
    right: 15px;
    color: #fff;
    opacity: .7;
    font-weight: 300;
    font-size: 30px;
}
#myModal label .chk {
    margin-right: 10px;
}
#myModal label {
    display: block;
    width: 100%;
    font-weight: 500;
    margin-bottom: 15px;
}
.btn.perple-btn {
    background: #6a49a4;
    color: #fff;
    border-radius: 3px;
    padding: 8px 20px;
    font-size: 16px;
    border: solid 1px#6a49a4;
}
.btn.perple-btn:hover{
  background: #fff;
  color: #6a49a4;
  border-color: #6a49a4;
}
</style>
