<template>
   <main>
      <employerlayout>
      
            <div class="content-wrapper" style="min-height: 902.8px;" slot="employerbody">
               <div class="dashboard_right_detail">
                  <div class="dashboard-heading-main">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="left-dashboard">
                              <h2>Questions List</h2>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="mycompany-heading-main">
                     <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                           <div>
                              <br>                           
                                <div class="document-file">
                                    <div class="tab-contentdisplay">
                                        <div class="right-seaarch-box">
                                            <div class="search-field"><input type="text" placeholder="Search..." name="search" id="search" v-model="search" class="form-control"> <button class="btn search-btn"><i class="fa fa-search"></i></button></div>
                                        </div>
                                        <div class=" action-div">                                     
                                            <router-link to="/employer/question/add"><button type="button" class="btn browse-btn">Add New Question <i class="fa fa-user-plus"></i></button></router-link>
                                        </div>                                   
                                    </div>
                                    <div class="table-box table-responsive ">
                                       <table id="example" class=" table-striped table-bordered" style="width: 100%;">
                                          <thead>
                                             <tr>
                                                <th>Question</th>
                                                <th>Type</th>
                                                <th width="" >Is Recommended</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                <th></th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr v-for="data in dataRecord.data" :key="data.id">
                                            <td>{{ data.title }}</td> 
                                            <td v-if="data.question_type == 1">Multi Select</td>
                                            <td v-else>Sigle Select</td> 
                                            <td v-if="data.is_recommended == 1">Yes</td>
                                            <td v-else>No</td>                                          
                                            <td v-if="data.status == 1">Active</td>
                                            <td v-else>In-Active</td>                                      
                                            <td class="icon-delet-view-edit">                                               
                                                 <a href="javascript:void(0)" style="background-color: #b91d19" @click="deleteRecord(data.id)">
                                                        <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-trash-alt fa-w-14 fa-2x"><path fill="currentColor" d="M268 416h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12zM432 80h-82.41l-34-56.7A48 48 0 0 0 274.41 0H173.59a48 48 0 0 0-41.16 23.3L98.41 80H16A16 16 0 0 0 0 96v16a16 16 0 0 0 16 16h16v336a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128h16a16 16 0 0 0 16-16V96a16 16 0 0 0-16-16zM171.84 50.91A6 6 0 0 1 177 48h94a6 6 0 0 1 5.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12z" class=""></path></svg>
                                                    </a> 
                                                <router-link :to="'/employer/question/edit/'+data.id" style="background-color:#6cb2eb">
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-pen-alt fa-w-16 fa-2x"><path fill="currentColor" d="M497.94 74.17l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.75 18.75-49.15 0-67.91zm-246.8-20.53c-15.62-15.62-40.94-15.62-56.56 0L75.8 172.43c-6.25 6.25-6.25 16.38 0 22.62l22.63 22.63c6.25 6.25 16.38 6.25 22.63 0l101.82-101.82 22.63 22.62L93.95 290.03A327.038 327.038 0 0 0 .17 485.11l-.03.23c-1.7 15.28 11.21 28.2 26.49 26.51a327.02 327.02 0 0 0 195.34-93.8l196.79-196.79-82.77-82.77-84.85-84.85z" class=""></path></svg>
                                                </router-link>
                                                <!-- <a href="javascript:void(0)" style="background-color: #38c172">
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-eye fa-w-18 fa-2x"><path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z" class=""></path></svg>
                                                </a> -->
                                            
                                            </td>
                                            </tr>                                    
                                          </tbody>
                                       </table>
                                 </div>
                              </div>
                           </div>
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
      data()
      {
          return{
              dataRecord: {},
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
       this.getRecord();
      },
      methods: {
        getRecord(page) {
           axios.get('/api/front/employer/question/index?page='+ page+'&search='+this.search)
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
        deleteRecord(id)
        {
          this.$confirm(
          {
            message: `Are you sure you want to delete this question ?`,
            button: {
               no: 'No',
               yes: 'Yes'
            },        
            callback: confirm => {
               if (confirm)
               {
                  axios.post('/api/front/employer/question/destroy/'+id)
                  .then( (response) => {
                     this.flashMessage.success({  
                        message: 'Record Deleted Successfully!'
                     });    
                     this.getRecord(); 
                     }).catch(function (error) { 
                        console.log(error);
                     });
               }
            }
         });

        },
      }
    }
</script>