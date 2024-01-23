<template>
    <main>
    <employerlayout>
        <div class="content-wrapper" style="min-height: 902.8px;" slot="employerbody">
          <div class="dashboard_right_detail">
          <div class="mycompany-heading-main">
              <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="display:none" id="btnModal">
                        Launch demo modal
                    </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog create-btnjob " role="document">
                            <div class="modal-content create-job-popup">
                             <div class="modal-header">
                              <h4 class="modal-title">Choose Plan</h4> 
                              <button type="button" data-dismiss="modal" class="close">×</button>
                             </div>
                              <div class="modal-body">
                               <div class="table-create-jobs-body">
                                 <table width="100%">
                                   <thead>
                                     <tr>
                                       <th>&nbsp;</th>                                       
                                       <th>Plan Name</th>
                                       <th>Plan Quantity</th>
                                       <th>Addon</th>
                                       <th>Addon Quantity</th>
                                     </tr>
                                   </thead>
                                   <tbody>
                                   
                                     <!-- <tr v-for="data in dataCurrentPlans" :key="data.id">
                                       <td>
                                          <div class="radio-plan">
                                            <input type="radio"> 
                                             <input v-if="data.plan_type == 1 && data.single_job_id > 0" :data-id="data.single_job.id" :data-planId="data.id" @change="choosePlan" type="radio" :id="`plan${data.id}`" name="planid"         :data-qty="data.addon_qty - data.addon_used_qty" :data-plantype="data.plan_type"  :value="data.id" class="planid" > 
                                             <input v-else-if="data.plan_type == 2 && data.addon_id > 0" :data-id="data.addon.id" :data-planId="data.id" @change="choosePlan" type="radio" :id="`plan${data.id}`"  name="planid"              :data-qty="data.addon_qty - data.addon_used_qty" :data-plantype="data.plan_type"  :value="data.id" class="planid" > 
                                             <input v-else-if="data.plan_type == 3 && data.addon_id > 0" :data-id="data.subscription_plan.id" :data-planId="data.id" @change="choosePlan" type="radio" :id="`plan${data.id}`"  name="planid"  :data-qty="data.addon_qty - data.addon_used_qty" :data-plantype="data.plan_type"  :value="data.id" class="planid" > 
                                             <input v-else-if="data.plan_type == 4 && data.addon_id == 0" :data-id="data.subscription_plan.id" :data-planId="data.id" @change="choosePlan" type="radio" :id="`plan${data.id}`"  name="planid" :data-qty="data.addon_qty - data.addon_used_qty" :data-plantype="data.plan_type"  :value="data.id" class="planid" >
                                             <label :for="`plan${data.id}`"></label>  
                                         </div>                                       
                                         </td>
                                         <td v-if="data.plan_type == 1 && data.single_job_id > 0">{{ data.single_job.title }}</td>
                                         <td v-else-if="data.plan_type == 2 && data.addon_id > 0">{{ data.addon.title }}</td>
                                         <td v-else-if="data.plan_type == 3 && data.addon_id > 0">{{ data.subscription_plan.title }}</td>
                                         <td v-else-if="data.plan_type == 4 && data.addon_id == 0">{{ data.subscription_plan.title }}</td>
                                         <td v-else-if="data.plan_type == 5">{{ data.offer.title }}</td>
                                         <td>{{ data.addon_qty - data.addon_used_qty }}</td>

                                     </tr> -->

                                      <tr  v-for="(data, key) in dataCurrentPlans">
                                       
                                       <td>                                         
                                          <div class="radio-plan">
                                            <input type="radio"> 
                                             <input v-if="data.plan_type == 1 && data.single_job_id > 0" :data-id="data.single_job_id" :data-planId="data.id" @change="choosePlan" type="radio" :id="`plan${data.id}`" name="planid"         :data-qty="data.addon_qty" :data-plan_qty="data.plan_qty" :data-plantype="data.plan_type"  :value="data.id" class="planid" > 
                                             <input v-else-if="data.plan_type == 2 && data.addon_id > 0" :data-id="data.addon_id" :data-planId="data.id" @change="choosePlan" type="radio" :id="`plan${data.id}`"  name="planid"              :data-qty="data.addon_qty" :data-plan_qty="data.plan_qty"  :data-plantype="data.plan_type"  :value="data.id" class="planid" > 
                                             <input v-else-if="data.plan_type == 3 && data.addon_id > 0" :data-id="data.subscription_plan_id" :data-planId="data.id" @change="choosePlan" type="radio" :id="`plan${data.id}`"  name="planid"  :data-qty="data.addon_qty" :data-plan_qty="data.plan_qty" :data-plantype="data.plan_type"  :value="data.id" class="planid" > 
                                             <input v-else-if="data.plan_type == 4 && data.addon_id == 0" :data-id="data.subscription_plan_id" :data-planId="data.id" @change="choosePlan" type="radio" :id="`plan${data.id}`"  name="planid" :data-qty="data.addon_qty" :data-plan_qty="data.plan_qty" :data-plantype="data.plan_type"  :value="data.id" class="planid" >
                                             <label :for="`plan${data.id}`"></label>  
                                         </div>                                       
                                        </td>
                                         
                                         <!-- <td v-if="data.plan_type == 1 && data.single_job_id > 0">{{ data.single_job.title }}</td>
                                         <td v-else-if="data.plan_type == 2 && data.addon_id > 0">{{ data.addon.title }}</td>
                                         <td v-else-if="data.plan_type == 3 && data.addon_id > 0">{{ data.subscription_plan.title }}</td>
                                         <td v-else-if="data.plan_type == 4 && data.addon_id == 0">{{ data.subscription_plan.title }}</td>
                                         <td v-else-if="data.plan_type == 5">{{ data.offer.title }}</td> -->
                                         <td>{{ data.plan_title }}</td>
                                         <td>{{ data.plan_qty }}</td>
                                         <td>{{ data.addon_title }}</td>
                                         <td>{{ data.addon_qty }}</td>

                                     </tr>
                                   </tbody>
                                 </table>
                               </div>
                              </div>
                              <div class="modal-footer">
                               <!--  <button type="button" class="btn btn-secondary" >Close</button> -->
                               <button type="button" class="btn browse-btn btnChooseAnother" @click="chooseAddon" id="btnChooseAddon" style="display:none">Choose Addon</button>
                              <button type="button" class="btn browse-btn btnChooseAnother" @click="btnChooseAnother">Choose Another Plan</button>
                              <button type="button" class="btn browse-btn" @click="createJob">Create Job</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      <br>                
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs" >
                          <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#openss" @click="tabClick(1)">Open</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#expried" @click="tabClick(2)">Expired</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#draft" @click="tabClick(3)">Draft</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#candidates">Your Candidates</a>
                          </li>
                      </ul>
                      <!-- Tab panes -->
                      <div class="tab-content">
                          <div id="openss" class="top-boxx-business tab-pane active">
                          <div class="document-file">
                            <div class="pull-left action-div">
                              <div class="left-dashboard">
                                 <h2>{{ dataPostJob.data.length }} Open Jobs</h2>                  
                             </div>
                      <button @click="redirect('postjob',0,'')" type="button" class="btn browse-btn">Create Jobs</button>
                      </div>
                    <div class="right-seaarch-box">
                      <div class="search-field">
                        <input type="text" class="form-control" placeholder="Search..." name="search" v-model="searchOpen">
                        <button class="btn search-btn"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                    <div class="table-box">
                      <table id="example" class=" table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>                              
                                <th>Status</th>
                                <th>Job Title</th>                                
                                <th>Expiry Date</th>
                                <th>Addon</th>
                                <th>Addon Expiration</th> 
                                <th>Job reference</th>                              
                                <th >Created</th>
                                <th></th>                              
                            </tr>
                        </thead>
                        <tbody>                         
                            <tr v-if="dataPostJob.data && value.step == 4 && value.is_expired == 0" v-for="(value, key) in dataPostJob.data">                            
                                <td v-if="value.approved == 0">
                                  <p>Pending Approval</p>
                                </td>
                                <td v-if="value.approved == 1">
                                  <p>Approved</p>
                                </td>
                                <td>
                                  <a href="#" @click="redirect('editpostjob',value.id,'open')">
                                  <h5>{{ value.title }} 
                                    <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="pencil-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-pencil-alt fa-w-16 fa-2x"><path fill="currentColor" d="M491.609 73.625l-53.861-53.839c-26.378-26.379-69.075-26.383-95.46-.001L24.91 335.089.329 484.085c-2.675 16.215 11.368 30.261 27.587 27.587l148.995-24.582 315.326-317.378c26.33-26.331 26.581-68.879-.628-96.087zM200.443 311.557C204.739 315.853 210.37 318 216 318s11.261-2.147 15.557-6.443l119.029-119.03 28.569 28.569L210 391.355V350h-48v-48h-41.356l170.259-169.155 28.569 28.569-119.03 119.029c-8.589 8.592-8.589 22.522.001 31.114zM82.132 458.132l-28.263-28.263 12.14-73.587L84.409 338H126v48h48v41.59l-18.282 18.401-73.586 12.141zm378.985-319.533l-.051.051-.051.051-48.03 48.344-88.03-88.03 48.344-48.03.05-.05.05-.05c9.147-9.146 23.978-9.259 33.236-.001l53.854 53.854c9.878 9.877 9.939 24.549.628 33.861z" class=""></path></svg></h5>
                                  <p>
                                    <strong>{{ value.location }}</strong>
                                    </p>
                                  </a>
                                </td>                                
                                
                                <td v-if="value.end_date">{{ value.end_date | formatDate}}</td>
                                <td  v-else>-</td>

                                <td v-if="value.user_subscription_plan && value.user_subscription_plan.addon">{{ value.user_subscription_plan.addon.title }}</td>
                                <td v-else style="">-</td>

                                <td v-if="value.addon_end">{{ value.addon_end | formatDate}}</td>
                                <td v-else style="">-</td>

                                <td v-if="value.job_reference">{{ value.job_reference }}</td>
                                <td v-else style="">-</td>
                              

                                <td>{{ value.created_at | formatDate}}</td>
                                <td style="cursor:pointer" @click="deleteRecord(value.id,1)"><svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-2x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg></td>
                            </tr>
                        </tbody>
                        </table>
                         <pagination align="right" :data="dataPostJob"  @pagination-change-page="getjobs" style="margin-top:2px;margin-right:4%">
                          <span slot="prev-nav">&lt; Previous</span>
                          <span slot="next-nav">Next &gt;</span>
                        </pagination>
                    </div>
                </div>
              </div>
              <div id="expried" class="top-boxx-business tab-pane ">
                  <div class="document-file">
                    <div class="pull-left action-div">
                      <div class="left-dashboard">
                        <h2>{{ dataPostJob.data.length }} Expired Jobs</h2>                  
                      </div>
                  <button @click="redirect('postjob',0,'')" type="button" class="btn browse-btn">Create Jobs</button>
                </div>
                <div class="right-seaarch-box">
                  <div class="search-field">
                    <input type="text" class="form-control" placeholder="Search..." name="search" v-model="searchExpired">
                    <button class="btn search-btn"><i class="fa fa-search"></i></button>
                  </div>
                </div>
                <div class="table-box">
                  <table id="example" class=" table-striped table-bordered" style="width:100%">
                    <thead>
                         <tr>                              
                                <th>Status</th>
                                <th>Job Title</th>                                
                                <th>Expiry Date</th>
                                <th>Addon</th>
                                <th>Addon Expiration</th>
                                <th >Created</th>
                                <th></th>                              
                            </tr>
                    </thead>
                      <tbody>
                            <tr v-if="dataPostJob.data && value.step == 4 && value.is_expired == 1" v-for="(value, key) in dataPostJob.data">                            
                                <td>
                                  <p>Expired</p>
                                </td>
                                <td>                                 
                                  <h5>{{ value.title }} 
                                    <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="pencil-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-pencil-alt fa-w-16 fa-2x"><path fill="currentColor" d="M491.609 73.625l-53.861-53.839c-26.378-26.379-69.075-26.383-95.46-.001L24.91 335.089.329 484.085c-2.675 16.215 11.368 30.261 27.587 27.587l148.995-24.582 315.326-317.378c26.33-26.331 26.581-68.879-.628-96.087zM200.443 311.557C204.739 315.853 210.37 318 216 318s11.261-2.147 15.557-6.443l119.029-119.03 28.569 28.569L210 391.355V350h-48v-48h-41.356l170.259-169.155 28.569 28.569-119.03 119.029c-8.589 8.592-8.589 22.522.001 31.114zM82.132 458.132l-28.263-28.263 12.14-73.587L84.409 338H126v48h48v41.59l-18.282 18.401-73.586 12.141zm378.985-319.533l-.051.051-.051.051-48.03 48.344-88.03-88.03 48.344-48.03.05-.05.05-.05c9.147-9.146 23.978-9.259 33.236-.001l53.854 53.854c9.878 9.877 9.939 24.549.628 33.861z" class=""></path></svg></h5>
                                  <p>
                                    <strong>{{ value.location }}</strong>
                                  </p>                                 
                                </td>

                                <td v-if="value.end_date">{{ value.end_date | formatDate}}</td>
                                <td v-else>-</td>

                                <td v-if="value.user_subscription_plan && value.user_subscription_plan.addon">{{ value.user_subscription_plan.addon.title }}</td>
                                <td v-else style="">-</td>

                                <td v-if="value.addon_end">{{ value.addon_end | formatDate}}</td>
                                <td v-else>-</td>

                                <td>{{ value.created_at | formatDate}}</td>
                                <td style="cursor:pointer" @click="deleteRecord(value.id,2)"><svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-2x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg></td>
                            </tr>
                        </tbody>
                    </table>
                     <pagination align="right"   :data="dataPostJob"  @pagination-change-page="getjobs" style="margin-top:2px;margin-right:4%">
                          <span slot="prev-nav">&lt; Previous</span>
                          <span slot="next-nav">Next &gt;</span>
                        </pagination>
                    </div>
                </div>
              </div>
              <div id="draft" class="top-boxx-business tab-pane">
                <div class="document-file">
                <div class="pull-left action-div">
                  <div class="left-dashboard">
                    <h2>{{ dataPostJob.data.length }} Draft Jobs</h2>                  
                  </div>
                  <button @click="redirect('postjob',0,'')" type="button" class="btn browse-btn">Create Jobs</button>
                </div>
                    <div class="right-seaarch-box">
                      <div class="search-field">
                        <input type="text" class="form-control search" placeholder="Search..." name="search" v-model="searchDraft">
                        <button class="btn search-btn"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                    <div class="table-box">
                      <table id="example" class=" table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                              
                                <th>Status</th>
                                <th>Job Title</th>
                                <th>Created</th>
                                <th></th>                              
                            </tr>
                        </thead>
                          <tbody>
                            <tr v-if="dataPostJob.data && value.step != 4" v-for="(value, key) in dataPostJob.data">                            
                                <td>
                                  <p>Draft</p>
                                </td>
                                <td>
                                   <a href="#" @click="redirect('editpostjob',value.id,'draft')">
                                  <h5>{{ value.title }} 
                                    <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="pencil-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-pencil-alt fa-w-16 fa-2x"><path fill="currentColor" d="M491.609 73.625l-53.861-53.839c-26.378-26.379-69.075-26.383-95.46-.001L24.91 335.089.329 484.085c-2.675 16.215 11.368 30.261 27.587 27.587l148.995-24.582 315.326-317.378c26.33-26.331 26.581-68.879-.628-96.087zM200.443 311.557C204.739 315.853 210.37 318 216 318s11.261-2.147 15.557-6.443l119.029-119.03 28.569 28.569L210 391.355V350h-48v-48h-41.356l170.259-169.155 28.569 28.569-119.03 119.029c-8.589 8.592-8.589 22.522.001 31.114zM82.132 458.132l-28.263-28.263 12.14-73.587L84.409 338H126v48h48v41.59l-18.282 18.401-73.586 12.141zm378.985-319.533l-.051.051-.051.051-48.03 48.344-88.03-88.03 48.344-48.03.05-.05.05-.05c9.147-9.146 23.978-9.259 33.236-.001l53.854 53.854c9.878 9.877 9.939 24.549.628 33.861z" class=""></path></svg></h5>
                                  <p>
                                    <strong>{{ value.location }}</strong>
                                    </p>
                                   </a>
                                </td>
                                <td>{{ value.created_at | formatDate}}</td>
                                <td style="cursor:pointer" @click="deleteRecord(value.id,3)"><svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-2x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg></td>
                            </tr>
                          </tbody>
                        </table>
                        <pagination align="right"   :data="dataPostJob"  @pagination-change-page="getjobs" style="margin-top:2px;margin-right:4%">
                          <span slot="prev-nav">&lt; Previous</span>
                          <span slot="next-nav">Next &gt;</span>
                        </pagination>
                    </div>
                </div>
              </div>
            <div id="candidates" class="top-boxx-business tab-pane ">
              <div class="document-file">
                  <div class="pull-left action-div">
                    <div class="left-dashboard">
                  <h2>Your Candidates</h2>                  
                  </div>
                      <button @click="redirect('postjob',0,'')" type="button" class="btn browse-btn">Create Jobs</button>
                      </div>
                    <div class="right-seaarch-box">
                      <div class="search-field">
                        <input type="text" class="form-control" placeholder="Search...">
                        <button class="btn search-btn"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                    <div class="table-box">
                      <table id="example" class=" table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>                              
                                <th>Status</th>
                                <th>Job Title</th>
                                <th>Created</th>
                                <th></th>                              
                            </tr>
                        </thead>
                        <tbody>

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
            dataPostJob: [],
            candidateCount: 0,
            searchOpen: '',
            searchDraft:'',
            searchExpired:'',
            plans: '',
            dataCurrentPlans: [],
        }
    },
    watch: {
        searchOpen(after, before)
        {
          this.getjobs(1,1);
        },
        searchExpired()
        {
          this.getjobs(1,2);
        },
        searchDraft(after, before)
        {
          this.getjobs(1,3);
        },
        
      },
  mounted()
  {    
    this.getjobs(1,1);
    
  },
  methods :
  {
    chooseAddon(event)
    {
       var planid = parseInt(event.target.getAttribute('data-planId'));
       var planType = parseInt(event.target.getAttribute('data-plantype'));
       var id = parseInt(event.target.getAttribute('data-id'));
       var qty = parseInt(event.target.getAttribute('data-planqty'));
       if(planid > 0)
       {          
           $('#exampleModal').modal('hide'); 
           this.$router.push('/employer/add_addon?planid='+planid+'&planType='+planType+'&id='+id+'&qty='+qty);
       }      
    },
    choosePlan(event)
    {
       var planType = parseInt(event.target.getAttribute('data-plantype'));
       var planId = parseInt(event.target.getAttribute('data-planId'));
       var qty = parseInt(event.target.getAttribute('data-qty'));
       var planqty = parseInt(event.target.getAttribute('data-plan_qty'));
       var id = parseInt(event.target.getAttribute('data-id'));
       
       if((planType == 1 || planType == 3 || planType == 4) && qty == 0)
       {
          $('#btnChooseAddon').show();
          $('#btnChooseAddon').attr('data-plantype',planType);
          $('#btnChooseAddon').attr('data-planId',planId);
          $('#btnChooseAddon').attr('data-id',id);
           $('#btnChooseAddon').attr('data-planqty',planqty);
       }
       else if(planType == 2 || qty > 0)
       {
          $('#btnChooseAddon').hide();
       }    
       
    },
    createJob()
    {
       var planId = $("input[name=planid]:checked").val();
       var self = this;
       if (typeof(planId) === "undefined")
       {
           self.flashMessage.error({
                            message: 'Please select plan first!',                            
                    });
       }
       else
       {
         window.location.replace('/employer/postjob?planid='+planId);
       }
      
    },
    btnChooseAnother()
    {
       $('#exampleModal').modal('hide');
       this.$router.push('/employer/pricing');
    },
    tabClick(event)
    {
       this.searchOpen = '';
       this.searchDraft = '';
       this.searchExpired = '';
       this.getjobs(1,event);
    },
    deleteRecord(event,type)
    {
         var id = event;
         var typeJOB = type;
         var self = this;
         this.$confirm(
         {
          message: `Are you sure you want to delete this job?`,
          button: {
            no: 'No',
            yes: 'Yes'
          },        
          callback: confirm => {
            if (confirm)
            {
               axios.get('/api/front/employer/jobs/deleteRecord/'+id).then(response =>
               {
                  self.flashMessage.success({
                          message: 'Record deleted Successfully',                            
                  });
                  this.getjobs(1,typeJOB)
               }).catch(function () 
                {
                    console.log('Clicked on cancel')
                });
            }
          }
        });
    },
    redirect(type,id,jobtype)
    { 
        if(type == 'postjob')
        {
          axios.get('/api/front/employer/jobs/getCurrentPlans').then(response => 
          {
              
              if(response.data != 0)
              {
                 //console.log(response.data[4].addon_id)
                 this.dataCurrentPlans = response.data;
                //  var result = [];
                //  $.each(response.data, function(idx, obj)
                //  { 
                //     result.push(obj);
                //  });
                 
                //  this.dataCurrentPlans = result;                
                 $('#btnModal').trigger('click');
              }
              else
              {
                 this.$router.push('/employer/pricing');
              }
          });
           
           //alert('slkjfdslkf');
          //window.location.replace('/employer/postjob');
        }
        else if(type == 'editpostjob')
        {
          window.location.replace('/employer/postjob?jobid='+id+'&jobtype='+jobtype);
        }
    },
      getjobs(page,type)
      {
        var search = '';
        if(type == 1)
        {
           search = this.searchOpen;
        }
        else if(type == 2)
        {
            search = this.searchExpired;
        }
        else if(type == 3)
        {
           search = this.searchDraft;
        }
       
        axios.get('/api/front/employer/jobs/getJobs?page='+page+'&search='+search+'&type='+type).then(response => 
        {           
          this.dataPostJob = response.data;
        });
      },
  }
}
</script>
