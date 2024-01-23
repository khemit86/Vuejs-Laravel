<template>
    <div>
        <admindashboard>
        <div class="content-header" slot="adminbody" style="margin-left:18%">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Job</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Job Edit</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <section class="contener" slot="adminbody" style="margin-left:20%;margin-right:1.5%">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title" style="float:left">Edit job</h3>
                 <div class="card-tools">
                   <router-link to="/admin/job/index" class="btn btn-success">
                   Back <i class="fa fa-arrow-left"></i>
                  </router-link>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="submit" ref="frm_job" id="frm_job" enctype="multipart/form-data">
                  
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">job Title</label>
                    <div class="col-sm-10">
                      <input autofocus="autofocus"  type="text" name="title" id="title" class="form-control" placeholder="Title*"  @keyup="getSuggestCategory($event)" v-model="title">
                     <span class="help-block errorTitle" style="color:red"></span> 
                     <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.title">
                        <span>{{ laravelErrors.title[0] }}</span>
                    </div>
                    </div>
                  </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="location" id="location" v-model="location">
                      <option value="" selected="selected">Select Location*</option>
                      <option value="Nicosia">Nicosia</option>
                      <option value="Larnaca">Larnaca</option>
                      <option value="Limassol">Limassol</option>
                      <option value="Paphos">Paphos</option>
                      <option value="Famagusta">Famagusta</option>
                  </select>                       
                  <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.location">
                    <span>{{ laravelErrors.location[0] }}</span>
                  </div>
                   <span class="help-block errorLocation" style="color:red"></span> 
                    </div>
                </div>
                <div class="stap-form-loading">
                    <span><img width="100px" src="/img/waiting.gif" class="btnLoading" style="display:none"  /></span>
                </div>

                <div class="form-group category-box category-box22 col-lg-10 ml-auto" style="display:none;">                                                                  
                  <h4>Industries Of Operation</h4>
                  <h5>Suggested based on your job title.</h5>
                  <div class="row col-md-12">
                      
                      <div v-if="suggestCategory" v-for="(valueCatS, keyCatS) in suggestCategory">
                          
                          <div class="col-md-12 form-group radio-plan steps-radio"  v-if="valueCatS.parent.child" v-for="(valueCatC, keyCatC) in valueCatS.parent.child" >
                              <p>                                                    
                                  <input class="rdCat" v-on:change="changeCategory($event)" type="radio" :id="`rdCategory${valueCatC.id}`" name="rdCategory" :value="`${valueCatC.id}`" data-id="0"><label :for="`rdCategory${valueCatC.id}`">{{ valueCatS.parent.name }} > {{ valueCatC.name }}</label>
                              </p>
                          </div>
                            <div v-if="!valueCatS.parent.child" class="col-md-12 form-group radio-plan steps-radio">
                              <p>                                                    
                                  <input class="rdCat" v-on:change="changeCategory($event)" type="radio" :id="`rdCategory${valueCatS.id}`" name="rdCategory" :value="`${valueCatS.id}`" data-id="0"><label :for="`rdCategory${valueCatS.id}`">{{ valueCatS.parent.name }}</label>
                              </p>
                          </div>
                      </div>                                       
                      
                      <div class="form-group  radio-plan steps-radio">
                          <p>
                              <input type="radio" v-on:change="changeCategory($event)" id="rdCategoryDiffrent" name="rdCategory" data-id="1"><label for="rdCategoryDiffrent">Choose a different category</label>
                          </p>
                      </div>
                      </div>
                      <div class="industryDrp" style="display:none">
                          <select class="form-control" v-model="parent_category_id" name="parent_category_id" id="parent_category_id" v-on:change="getChildCategory($event)">
                              <option value="">Choose Industry</option>
                              <option v-if="dataParentCategory"  v-for="(valuePCat, keyPCat) in dataParentCategory" :value="valuePCat.id">{{ valuePCat.name }}</option>
                          </select>
                          <div id="childCatContainer" style="margin-top:3%;margin-left:10%">

                          </div>
                      </div>
                      <span class="help-block errorcategory" style="color:red"></span>
                  </div>

                  <div v-if="Object.keys(dataPostJobs).length > 0" class="form-group category-box11 category-box22 col-lg-10 ml-auto">
                    <h4>Industries Of Operation</h4>
                    <h5>Suggested based on your job title.</h5>
                    <div class="row">                                            
                        <div>                                            
                            <div class="col-md-12 form-group radio-plan steps-radio">
                                <p>                                                    
                                    <input class="rdCat"  type="radio" id="rdCategoryselected" name="rdCategory" :value="`${dataPostJobs.post_job_category.id}`" checked="checked" data-id="0"><label :for="`rdCategoryselected`">{{ dataPostJobs.post_job_category.name }}</label>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 pt-0 col-form-label">Work type</label>
                    <div class="col-sm-10 row">
                   <div class="col-md-3 form-group radio-plan steps-radio">
                      <p>
                          <input type="radio" id="worktype1" v-model="worktype" name="worktype" value="1"><label for="worktype1">Full Time</label>
                      </p>
                    </div>
                    <div class="col-md-3 form-group radio-plan steps-radio">
                      <p>
                        <input type="radio" id="worktype2" v-model="worktype" name="worktype" value="2"><label for="worktype2">Part Time</label>
                      </p>
                    </div>
                    <div class="col-md-3 form-group radio-plan steps-radio">
                      <p>
                        <input type="radio" id="worktype3" v-model="worktype" name="worktype" value="3"><label for="worktype3">Temporary</label>
                      </p>
                    </div>
                    <div class="col-md-3 form-group radio-plan steps-radio">
                      <p>
                        <input type="radio" id="worktype4" v-model="worktype" name="worktype" value="4"><label for="worktype4">Contract</label>
                      </p>
                    </div>
                    <div class="col-md-3 form-group radio-plan steps-radio">
                    <p>
                      <input type="radio" id="worktype4" v-model="worktype" name="worktype" value="5"><label for="worktype4">Internship</label>
                    </p>
                    </div>                     
                   <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.worktype">
                        <span>{{ laravelErrors.worktype[0] }}</span>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Estimated Salary (€EUR)*</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="estimated_salary" id="estimated_salary" v-model="estimated_salary" v-on:change="drpPayMin($event)">
                        <option disabled selected="selected" value="">Estimated Salary</option>
                        <option value="up to €10K">up to €10K</option>
                        <option value="up to €15K">up to €15K</option>
                        <option value="up to €20K">up to €20K</option>
                        <option value="up to €25K">up to €25K</option>
                        <option value="up to €30K">up to €30K</option>
                        <option value="up to €35K">up to €35K</option>
                        <option value="up to €40K">up to €40K</option>
                        <option value="over €40K">over €40K</option>
                      </select>      
                    <span class="help-block errorEstimatedSalary" style="color:red"></span> 
                    <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.estimated_salary">
                        <span>{{ laravelErrors.estimated_salary[0] }}</span>
                    </div>                                          
                </div>
              </div>

            <div class="form-group row payInfoDiv"  v-if="is_hide_salary == 0">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Salary From</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control numberType" name="salary_form" id="salary_from" placeholder="€10000" v-model="salary_from" @keyup="salaryFrom" />      
                    <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.salary_from">
                      <span>{{ laravelErrors.salary_from[0] }}</span>
                  </div>                                            
              </div>
            </div>

            <div class="form-group row payInfoDiv" v-if="is_hide_salary == 0">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Salary To</label>
              <div class="col-sm-10">
                <input type="text" class="form-control numberType" name="salary_to" id="salary_to" placeholder="€25000" v-model="salary_to" @keyup="salaryTo" />
                <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.salary_to">
                    <span>{{ laravelErrors.salary_to[0] }}</span>
                </div>                                           
              </div>
            </div>

            <div class="form-group row">
               <label for="inputEmail3" class="col-sm-2 col-form-label"> Hide salary on your ad</label>
              <div class="col-sm-10 panel panel-default">              
                <div data-toggle="collapse" data-parent="#accordion" data-target="#collapse5" class="checkbox">
                  <input type="checkbox" name="is_hide_salary" id="is_hide_salary" class="ui-checkbox" value="1">
                  <label for="is_hide_salary"></label>
                </div>                                          
              </div>          
            </div>

            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Job ad reference(Optional)</label>
              <div class="col-sm-10">
               <textarea  name="job_reference" id="job_reference" class="form-control" v-model="job_reference"></textarea>                                    
              </div>
            </div>

             <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Write Type</label>
              <div class="col-sm-10 write-tabs">                
                <ul class="nav nav-tabs" v-if="dataPostJobs && dataPostJobs.write_job_type == 1">
                      <li class="active writetype" data-id="1"><a class="active" data-toggle="tab" href="#myad" @click="changeWriteType(1)"><i class="fas fa-edit"  aria-hidden="true"></i> Help me write my ad</a></li>
                      <li class="writetype" data-id="2"><a data-toggle="tab" href="#myown" @click="changeWriteType(2)"><i class="fas fa-edit"  aria-hidden="true"></i>Write my own</a></li>
                  </ul>
                  <ul class="nav nav-tabs" v-else-if="dataPostJobs && dataPostJobs.write_job_type == 2">
                      <li class="active writetype" data-id="1"><a  data-toggle="tab" href="#myad" @click="changeWriteType(1)"><i class="fas fa-edit" aria-hidden="true"></i> Help me write my ad</a></li>
                      <li class="writetype" data-id="2"><a  class="active" data-toggle="tab" href="#myown" @click="changeWriteType(2)"><i class="fas fa-edit" aria-hidden="true"></i>Write my own</a></li>
                  </ul>
                  <ul class="nav nav-tabs" v-else>
                      <li class="active writetype" data-id="1"><a class="active" data-toggle="tab" href="#myad" @click="changeWriteType(1)"><i class="fas fa-edit" aria-hidden="true"></i> Help me write my ad</a></li>
                      <li class="writetype" data-id="2"><a data-toggle="tab" href="#myown" @click="changeWriteType(2)"><i class="fas fa-edit" aria-hidden="true"></i>Write my own</a></li>
                  </ul>
                  <input type="hidden" name="write_job_type" id="write_job_type" v-model="write_job_type" />                                     
              </div>
            </div>
            <div id="myad">
              <div v-if="tasks.length == 0">
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tasks & responsibilities</label>
                    <div class="col-sm-8">
                      <input autofocus type="text" name="post_job_task[]" id="post_job_task" class="form-control" placeholder="New Task & Responsibility">                                     
                    </div>              
                    <div class="col-md-2">
                      <button type="button" class="btn btn-success add_button" data-type="task"><i class="fa fa-plus"></i></button>
                    </div> 
                    <span class="help-block errorPostJobTask" style="color:red;margin-left:18%"></span>           
                  </div>
                  <div class="taskContainer">
                  </div>
              </div>
              <div v-else>
                <div class="form-group row" v-if="tasks.length > 0" v-for="(valueTask, keyTask) in tasks">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tasks & responsibilities</label>
                    <div class="col-sm-8">
                      <input autofocus type="text" name="post_job_task[]" id="post_job_task" :value="valueTask.task" class="form-control" placeholder="New Task & Responsibility">                                     
                    </div>              
                    <div class="col-md-2">
                      <button type="button" class="btn btn-success add_button" data-type="task"><i class="fa fa-plus"></i></button>
                    </div> 
                    <span class="help-block errorPostJobTask" style="color:red;margin-left:18%"></span>           
                  </div>
                  <div class="taskContainer">
                  </div>
              </div>

            <div v-if="qualifications.length == 0">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Qualifications & experience</label>
                <div class="col-sm-8">
                  <input type="text" name="post_job_qualification[]" id="post_job_qualification" class="form-control" placeholder="Qualification & Experience">
                </div>
                  <div class="col-md-2">
                  <button type="button" class="btn btn-success add_button" data-type="quali"><i class="fa fa-plus"></i></button>
                </div>  
                <span class="help-block errorPostJobQaulification" style="color:red;margin-left:18%"></span>          
              </div>
              <div class="qualiContainer">
              </div>
            </div>
            <div v-else>
              <div class="form-group row" v-if="qualifications.length > 0" v-for="(valueQuali, keyQuali) in qualifications">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Qualifications & experience</label>
                <div class="col-sm-8">
                  <input type="text" name="post_job_qualification[]" :value="valueQuali.qaulification" id="post_job_qualification" class="form-control" placeholder="Qualification & Experience">
                </div>
                  <div class="col-md-2">
                  <button type="button" class="btn btn-success add_button" data-type="quali"><i class="fa fa-plus"></i></button>
                </div>  
                <span class="help-block errorPostJobQaulification" style="color:red;margin-left:18%"></span>          
              </div>
              <div class="qualiContainer">
              </div>
            </div>
            
          <div v-if="benifits.length == 0">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Benefits(Optional)</label>
              <div class="col-sm-8">
                <input type="text" name="post_job_benifit[]" id="post_job_benifit" class="form-control" placeholder="New Benefit">
              </div>
                <div class="col-md-2">
                <button type="button" class="btn btn-success add_button" data-type="benifit"><i class="fa fa-plus"></i></button>
              </div>
              <span class="help-block errorPostJobBenifit" style="color:red;margin-left:18%"></span>            
            </div>
            <div class="benifitContainer">
            </div>
          </div>
          <div v-else>
              <div class="form-group row"  v-if="benifits.length > 0" v-for="(valueb, keyb) in benifits">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Benefits(Optional)</label>
              <div class="col-sm-8">
                <input type="text" name="post_job_benifit[]" :value="valueb.benifit" id="post_job_benifit" class="form-control" placeholder="New Benefit">
              </div>
                <div class="col-md-2">
                <button type="button" class="btn btn-success add_button" data-type="benifit"  v-if="keyb == 0">
                  <i class="fa fa-plus"></i>
                </button>
                 <button type="button" class="btn btn-danger remove_button" data-type="benifit"  v-if="keyb>0">
                  <i class="fa fa-minus"></i>
                </button>
              </div>
              <span class="help-block errorPostJobBenifit" style="color:red;margin-left:18%"></span>            
            </div>
            <div class="benifitContainer">
            </div>
          </div>
        

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">About the business(Optional)</label>
            <div class="col-sm-10">
              <textarea :maxlength="150" class="form-control" rows="4" name="about_business" id="about_business"  v-model="about_business"></textarea>
              <span class="text-num"><i v-text="(about_business.length)"></i><i>/150</i></span>
            </div>            
          </div>
        </div>

        <div id="myown" class="tab-pane">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Job Description</label>
            <div class="col-sm-10">
              <textarea class="ckdescription" id="ckdescription" name="description" v-model="job_description"></textarea> 
                <span class="text-num"><i v-text="(job_description.length)"></i><i>/3500</i></span>
              <input type="hidden" name="post_job_description" id="post_job_description" />
              <span class="help-block errorJobDesc" style="color:red"></span>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Job summary(Optional)</label>
            <div class="col-sm-10">
              <textarea :maxlength="150" class="form-control" rows="4" name="job_summary" id="job_summary" v-model="job_summary"></textarea>
              <span class="text-num"><i v-text="(job_summary.length)"></i><i>/150</i></span> 
            </div>
          </div>
        </div>

        <div  class="form-group row">
          <label for="inputEmail3" id="selectedQuestions" class="col-sm-2 col-form-label">0/5 questions selected</label> 
          <div class="col-sm-10">
              <input type="text" name="questionsearch" id="findQuestion" v-on:keyup="questionKeyUp($event)" placeholder="Find a Question" class="form-control">
          </div>
        </div>
        <div  class="form-group row">
          <div class="col-sm-2 ">
            &nbsp;
          </div>
        <div class="question-collapse-main questionContainer col-sm-10">
             <div v-if="selectedAutoCompleteQuestions.length > 0">
                  <div class="panel-group driving-license-settings" id="accordion">
                        <div class="panel panel-default"  v-for="(valueAuto, keyAuto) in selectedAutoCompleteQuestions">
                        <div class="panel-heading" v-if="valueAuto.question">
                            <h4 class="panel-title">
                                <div class="checkbox" data-toggle="collapse" data-parent="#accordion" :data-target="`#collapse${valueAuto.id}`">
                                    <input type="checkbox" :name="`question_id_auto[${valueAuto.question.id}]`" :value="`${valueAuto.question.id}`" class="ui-checkbox chkMainAuto mainCheckBox" :id="`chkMain${valueAuto.id}`" checked="checked"> 
                                    
                                    <label class="checkboxLbl" :for="`chkMain${valueAuto.id}`">{{ valueAuto.question.title }}</label>
                                </div>
                            </h4>
                        </div>
                        <div :id="`collapse${valueAuto.id}`" class="panel-collapse collapse show" v-if="valueAuto.question">
                            <div class="panel-body">
                                <div class="driving-license-kind">
                                    <span v-if="valueAuto.question.question_type == 1">I will accept any of these answers:</span>
                                    <span v-if="valueAuto.question.question_type == 2">I will only accept this answer:</span>
                                    
                                    <div class="checkbox" v-if="valueAuto.question.options && valueAuto.question.question_type == 1" v-for="(valueRecOption, keyRecOption) in valueAuto.question.options">
                                    <input type="checkbox" :name="`question_id_auto[${valueAuto.question.id}][]`" :value="valueRecOption.id" class="ui-checkbox" :id="`chkOption${valueRecOption.id}`" :checked="valueRecOption.id == valueAuto.option_id">
                                    <label :for="`chkOption${valueRecOption.id}`">{{ valueRecOption.title }}</label>
                                    </div>
                                    <div class="col-md-6 form-group radio-plan steps-radio" v-if="valueAuto.question.options && valueAuto.question.question_type == 2" v-for="(valueRecOption, keyRecOption) in valueAuto.question.options">
                                    <p>
                                        <input type="radio" :id="`chkOption${valueRecOption.id}`" :name="`question_id_auto[${valueAuto.question.id}][]`" :value="valueRecOption.id" :checked="valueRecOption.id == valueAuto.option_id">
                                        <label :for="`chkOption${valueRecOption.id}`">{{ valueRecOption.title }}</label>
                                    </p>
                                    </div>
                                </div>
                            </div>
                        </div>                                       
                        </div>
                    </div>
                </div>
             </div>
            </div>

            <div  class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Recommended questions</label>
             <div class="question-collapse-main questionContainerRec">
            
                <div class="panel-group driving-license-settings col-sm-10" id="accordion">
                    <div class="panel panel-default" v-if="dataQuestions" v-for="(valueRec, keyRec) in dataQuestions">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <div class="checkbox" data-toggle="collapse" data-parent="#accordion" :data-target="`#collapse${valueRec.id}`">
                                <input type="checkbox" :name="`question_id_rec[${valueRec.id}]`" :value="`${valueRec.id}`" class="ui-checkbox mainCheckBox" :id="`chkMain${valueRec.id}`" :checked="selectedQuestions.includes(valueRec.id)"> 
                                
                                <label :for="`chkMain${valueRec.id}`">{{ valueRec.title }}</label>
                            </div>
                        </h4>
                    </div>
                    <div :id="`collapse${valueRec.id}`" class="panel-collapse collapse show" v-if="selectedQuestions.includes(valueRec.id)">
                        <div class="panel-body">
                            <div class="driving-license-kind">
                                <span v-if="valueRec.question_type == 1">I will accept any of these answers:</span>
                                <span v-if="valueRec.question_type == 2">I will only accept this answer:</span>
                                <div class="checkbox" v-if="valueRec.options && valueRec.question_type == 1" v-for="(valueRecOption, keyRecOption) in valueRec.options">
                                <input type="checkbox" :name="`question_id_rec[${valueRec.id}][]`" :value="valueRecOption.id" class="ui-checkbox" :id="`chkOption${valueRecOption.id}`" :checked="selectedOptions.includes(valueRecOption.id)">
                                <label :for="`chkOption${valueRecOption.id}`">{{ valueRecOption.title }}</label>
                                </div>
                                <div class="col-md-6 form-group radio-plan steps-radio" v-if="valueRec.options && valueRec.question_type == 2" v-for="(valueRecOption, keyRecOption) in valueRec.options">
                                <p>
                                    <input type="radio" :id="`chkOption${valueRecOption.id}`" :name="`question_id_rec[${valueRec.id}][]`" :value="valueRecOption.id" :checked="selectedOptions.includes(valueRecOption.id)">
                                    <label :for="`chkOption${valueRecOption.id}`">{{ valueRecOption.title }}</label>
                                </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div :id="`collapse${valueRec.id}`" class="panel-collapse collapse" v-else>
                        <div class="panel-body">
                            <div class="driving-license-kind">
                                <span v-if="valueRec.question_type == 1">I will accept any of these answers:</span>
                                <span v-if="valueRec.question_type == 2">I will only accept this answer:</span>
                                <div class="checkbox" v-if="valueRec.options && valueRec.question_type == 1" v-for="(valueRecOption, keyRecOption) in valueRec.options">
                                <input type="checkbox" :name="`question_id_rec[${valueRec.id}][]`" :value="valueRecOption.id" class="ui-checkbox" :id="`chkOption${valueRecOption.id}`">
                                <label :for="`chkOption${valueRecOption.id}`">{{ valueRecOption.title }}</label>
                                </div>
                                <div class="col-md-6 form-group radio-plan steps-radio" v-if="valueRec.options && valueRec.question_type == 2" v-for="(valueRecOption, keyRecOption) in valueRec.options">
                                <p>
                                    <input type="radio" :id="`chkOption${valueRecOption.id}`" :name="`question_id_rec[${valueRec.id}][]`" :value="valueRecOption.id">
                                    <label :for="`chkOption${valueRecOption.id}`">{{ valueRecOption.title }}</label>
                                </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>

        <!-- <div  class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">0/5 questions selected</label> 
          <div class="col-sm-10">
              <input type="text" name="questions" id="find_question" placeholder="Find a Question" class="form-control numberType">
          </div>
        </div> -->
<!--           <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Recommended questions</label>
            <div class="col-sm-10">
              <div class="question-collapse-main">                
                <div class="panel-group driving-license-settings" id="accordion">
                    <div class="panel panel-default" v-if="dataQuestions" v-for="(valueRec, keyRec) in dataQuestions">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <div class="checkbox" data-toggle="collapse" data-parent="#accordion" :data-target="`#collapse${valueRec.id}`">
                                <input type="checkbox" :name="`question_id[${valueRec.id}]`" :value="`${valueRec.id}`" class="ui-checkbox" :id="`chkMain${valueRec.id}`" :checked="selectedQuestions.includes(valueRec.id)"> 
                                <label :for="`chkMain${valueRec.id}`">{{ valueRec.title }}</label>
                            </div>
                        </h4>
                    </div>
                    <div :id="`collapse${valueRec.id}`" class="panel-collapse collapse show" v-if="selectedQuestions.includes(valueRec.id)">
                        <div class="panel-body">
                            <div class="driving-license-kind">
                                <span v-if="valueRec.question_type == 1">I will accept any of these answers:</span>
                                <span v-if="valueRec.question_type == 2">I will only accept this answer:</span>
                                <div class="checkbox" v-if="valueRec.options && valueRec.question_type == 1" v-for="(valueRecOption, keyRecOption) in valueRec.options">
                                <input type="checkbox" :name="`question_id[${valueRec.id}][]`" :value="valueRecOption.id" class="ui-checkbox" :id="`chkOption${valueRecOption.id}`" :checked="selectedOptions.includes(valueRecOption.id)">
                                <label :for="`chkOption${valueRecOption.id}`">{{ valueRecOption.title }}</label>
                                </div>
                                <div class="col-md-6 form-group radio-plan steps-radio" v-if="valueRec.options && valueRec.question_type == 2" v-for="(valueRecOption, keyRecOption) in valueRec.options">
                                <p>
                                    <input type="radio" :id="`chkOption${valueRecOption.id}`" :name="`question_id[${valueRec.id}][]`" :value="valueRecOption.id" :checked="selectedOptions.includes(valueRecOption.id)">
                                    <label :for="`chkOption${valueRecOption.id}`">{{ valueRecOption.title }}</label>
                                </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div :id="`collapse${valueRec.id}`" class="panel-collapse collapse" v-else>
                        <div class="panel-body">
                            <div class="driving-license-kind">
                                <span v-if="valueRec.question_type == 1">I will accept any of these answers:</span>
                                <span v-if="valueRec.question_type == 2">I will only accept this answer:</span>
                                <div class="checkbox" v-if="valueRec.options && valueRec.question_type == 1" v-for="(valueRecOption, keyRecOption) in valueRec.options">
                                <input type="checkbox" :name="`question_id[${valueRec.id}][]`" :value="valueRecOption.id" class="ui-checkbox" :id="`chkOption${valueRecOption.id}`">
                                <label :for="`chkOption${valueRecOption.id}`">{{ valueRecOption.title }}</label>
                                </div>
                                <div class="col-md-6 form-group radio-plan steps-radio" v-if="valueRec.options && valueRec.question_type == 2" v-for="(valueRecOption, keyRecOption) in valueRec.options">
                                <p>
                                    <input type="radio" :id="`chkOption${valueRecOption.id}`" :name="`question_id[${valueRec.id}][]`" :value="valueRecOption.id">
                                    <label :for="`chkOption${valueRecOption.id}`">{{ valueRecOption.title }}</label>
                                </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div> 
            </div>
          </div> -->
          </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-success">Update</button>
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
           data()
            {
                return{
                    dataParentCategory: [],
                    laravelErrors: {},
                    suggestCategory: [],
                    parent_category_id:'',
                    payinfo: '',
                    estimated_salary: '',
                    pay_range_max: '',
                    job_summary:'',  
                    dataQuestions: [],
                    dataQuesitonAuto: [], 
                    about_business: '',
                    question_info : '', 
                    job_description: '',
                    worktype: '',
                    pricingDetails: [],   
                    dataPostJobs: [], 
                    location: '',  
                    is_hide_salary: '',  
                    job_reference: '',
                    salary_to: '',
                    salary_from: '',  
                    tasks: [], 
                    qualifications: [], 
                    benifits: [],
                    title: '', 
                    isEditMode: 0,
                    jobType: '',
                    isHavePlan : 0,
                    planid: 0,
                    write_job_type: 1,
                    selectedQuestions: [],
                    selectedOptions: [],
                    selectedAutoCompleteQuestions: [],
                    totalQuestionSelected: 0,
                }
            },
            beforeCreate()
            {
                  
                  axios.get('/api/front/employer/postjob/getQuestionAutoComplete').then(response => {
                        this.dataQuesitonAuto = response.data;                 
                    });
            },
            mounted()
            {
                this.getDataParentCategory();
                this.getQuestion();
                this.getSetting();    
                this.getData(); 
                var maxFieldTask = 10; 
                var xTask = 1;
                var maxFieldQuali = 10; 
                var xQuali = 1;
                var maxFieldBenifit = 10; 
                var xbenifit = 1;
                var isCatSelected = 0;
                var stepOneValid = 1;
                var stepTwoValid = 1;
                 $('.questionContainer').on('click','.ui-checkbox',function()
                 {
                    var countCheckedCheckboxes = $('input.mainCheckBox:checkbox:checked').length;
                    if(countCheckedCheckboxes <= 5)
                    {
                        $('#selectedQuestions').text(countCheckedCheckboxes+'/5 questions selected');
                    }            
                    if($(this).prop('checked') == false)
                    {
                        var chkVal = $(this).val();
                        $('#collapse'+chkVal).removeClass('show');
                        $('#collapse'+chkVal).find("input[type='radio']").each(function(){
                            console.log($(this).val())
                            $(this).prop('checked',false);
                        });
                        $('#collapse'+chkVal).find("input[type='checkbox']").each(function(){
                            $(this).prop('checked',false);
                        });
                    }
                    else if($(this).prop('checked') == true)
                    {                     
                        if(countCheckedCheckboxes > 5 )
                        {
                        $(this).prop('checked', false);
                        alert('You can select max 5 questions!')
                        }               
                    }
                    
                });
                $('.questionContainerRec').on('click','.ui-checkbox',function()
                {            
                    var countCheckedCheckboxes = $('input.mainCheckBox:checkbox:checked').length;  
                    if(countCheckedCheckboxes <= 5)
                    {
                        $('#selectedQuestions').text(countCheckedCheckboxes+'/5 questions selected');
                    }
                    if($(this).prop('checked') == false)
                    {                
                        var chkVal = $(this).val();
                        $('#collapse'+chkVal).removeClass('show');
                        $('#collapse'+chkVal).find("input[type='radio']").each(function(){
                            console.log($(this).val())
                            $(this).prop('checked',false);
                        });
                        $('#collapse'+chkVal).find("input[type='checkbox']").each(function(){
                            $(this).prop('checked',false);
                        });
                    }
                    else if($(this).prop('checked') == true)
                    {                       
                        if(countCheckedCheckboxes > 5 )
                        {
                        $(this).prop('checked', false);
                        alert('You can select max 5 questions!')
                        }               
                    }
                    
                });
                $('#is_hide_salary').change(function()
                {
                    if($(this).prop('checked'))
                    {
                      $('.payInfoDiv').hide();
                    }
                    else
                    {
                        $('.payInfoDiv').show();
                    }
                }); 

                $(function() 
                {             
                  $(".numberType").on("keydown", function(e) 
                  {               
                    if (
                      // backspace, delete, tab, escape, enter, comma and .
                      $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 188, 190]) !== -1 ||
                      // Ctrl/cmd+A, Ctrl/cmd+C, Ctrl/cmd+X
                      ($.inArray(e.keyCode, [65, 67, 88]) !== -1 && (e.ctrlKey === true || e.metaKey === true)) ||
                      // home, end, left, right
                      (e.keyCode >= 35 && e.keyCode <= 39)) { 

                      return;
                      
                    }
                    // block any non-number
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {

                      e.preventDefault();
                    }
                 });
                });

              $(".card-body").delegate(".add_button", "click", function(e)
              {           
                  var dataId = $(this).attr('data-type');
                  if(dataId == 'task')
                  {
                      if(xTask < maxFieldTask)
                      {                    
                          xTask++;
                          $('.taskCount').text(xTask+'/10');
                          let fieldHTML = '<div class="form-group row"><label for="inputEmail3" class="col-sm-2 col-form-label">Tasks & responsibilities</label><div class="col-sm-8"><input autofocus type="text" name="post_job_task[]" id="post_job_task" class="form-control" placeholder="New Task & Responsibility"></div> <div class="col-md-2"><button type="button" class="btn btn-danger remove_button" data-type="task"><i class="fa fa-minus"></i></button></div></div>';
                          $('.taskContainer').append(fieldHTML);
                          $('.taskContainer input').focus();
                      }
                  }
                  else if(dataId == 'quali')
                  {
                      if(xQuali < maxFieldTask)
                      {                       
                          xQuali++;
                          $('.qualiCount').text(xQuali+'/10');
                          let fieldHTML = '<div class="form-group row"><label for="inputEmail3" class="col-sm-2 col-form-label">Qualifications & experience</label><div class="col-sm-8"><input type="text" name="post_job_qualification[]" id="post_job_qualification" placeholder="Qualification &amp; Experience" class="form-control"></div> <div class="col-md-2"><button type="button" class="btn btn-danger remove_button" data-type="task"><i class="fa fa-minus"></i></button></div></div>';
                          
                          $('.qualiContainer').append(fieldHTML);
                          $('.qualiContainer input').focus();
                      }
                  }
                  else if(dataId == 'benifit')
                  {
                      if(xbenifit < maxFieldBenifit)
                      {                       
                          xbenifit++;
                          $('.benifitCount').text(xbenifit+'/10');
                          let fieldHTML = '<div class="form-group row"><label for="inputEmail3" class="col-sm-2 col-form-label">Benefits(Optional)</label><div class="col-sm-8"><input type="text" name="post_job_benifit[]" id="post_job_benifit" placeholder="New Benefit" class="form-control"></div> <div class="col-md-2"><button type="button" class="btn btn-danger remove_button" data-type="task"><i class="fa fa-minus"></i></button></div></div>';
                          $('.benifitContainer').append(fieldHTML);
                          $('.benifitContainer input').focus();
                      }
                  }
                  
              });

              $('.card-body').on('click','.remove_button',function(e)
              {
                  var dataId = $(this).attr('data-type');           
                  if(dataId == 'task')
                  {
                      e.preventDefault();
                      $(this).parent().parent().parent('div').remove(); //Remove field html
                      xTask--; //Decrement field counter
                      $('.taskCount').text(xTask+'/10');
                  }
                  else if(dataId == 'quali')
                  {
                      e.preventDefault();
                      $(this).parent().parent('div').remove(); //Remove field html
                      xQuali--; //Decrement field counter
                      $('.qualiCount').text(xQuali+'/10');
                  }
                  else if(dataId == 'benifit')
                  {
                      e.preventDefault();
                      $(this).parent().parent('div').remove(); //Remove field html
                      xbenifit--; //Decrement field counter
                      $('.benifitCount').text(xQuali+'/10');
                  } 
                
              });

            }, 
            methods:
            {
               salaryFrom(event)
              {
                var value11 = event.target.value;
                value11 = value11.replace(/[,€]/g,'');
                var n = value11.split('').reverse().join("");
                var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");  
                this.salary_from =  '€' + n2.split('').reverse().join('');
                event.target.value = '€' + n2.split('').reverse().join('');
              },
              salaryTo(event)
              {
                var value11 = event.target.value;
                value11 = value11.replace(/[,€]/g,'');
                var n = value11.split('').reverse().join("");
                var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");  
                this.salary_to =  '€' + n2.split('').reverse().join('');
                event.target.value = '€' + n2.split('').reverse().join('');
              },
              changeWriteType(writedataId)
              {
                  var dataId= writedataId;      
                  $('#write_job_type').val(dataId);
                  this.write_job_type = dataId; 
                  if(parseInt(writedataId) == 1)
                  {
                     $('#myown').hide();
                     $('#myad').show();
                  }
                  else
                  {
                      $('#myad').hide();
                      $('#myown').show();
                     
                  }
              },
              getData()
              {                
                  var editor = CKEDITOR.replace( 'ckdescription', {
                      toolbar: [
                                    {name: "styles", items: [ "Format", "Font", "FontSize"]},
                                    {name: "basicstyles", items: ["Bold", "Italic"]},
                                    {name: "paragraph", items: ["NumberedList", "BulletedList"]}, 
            
                              ]
                    });
                  editor.on( "pluginsLoaded", function( event )
                    {
                        editor.on( 'contentDom', function( evt ) {
                            var editable = editor.editable();                   
                            editable.attachListener( editable, 'keyup', function( e ) { 
                                //this.job_description = e.getData();
                                this.job_description = this.getData();
                                $('#post_job_description').val(this.job_description);
                            
                            });
                        }); 
                    });
                
                  var id = window.location.href.slice(window.location.href.indexOf('?') + 1);
                  let searchParams = new URLSearchParams(window.location.search);
                  var jobtype = searchParams.get('jobtype');
                  if(searchParams.has('jobid'))
                  {             
                        this.isEditMode =  1;
                        this.jobType = jobtype;
                        axios.get('/api/admin/job/editPostJob/'+id).then(response => {    
                            if(response.data != 0)
                            {
                                this.dataPostJobs = response.data;
                                this.title = response.data.title;
                                this.location = response.data.location;      
                                this.worktype = response.data.work_type;   
                                this.estimated_salary = response.data.estimated_salary;
                                this.salary_to = response.data.salary_to;
                                this.salary_from = response.data.salary_from;
                                this.is_hide_salary = response.data.is_hide_salary;
                                this.job_reference = response.data.job_reference;
                                this.tasks = response.data.post_job_tasks;
                                this.qualifications = response.data.post_job_qualifications;
                                this.benifits = response.data.post_job_benifits;
                                this.write_job_type = response.data.write_job_type;
                                this.job_summary = response.data.job_summary;
                                if(response.data.post_job_user)
                                {
                                  this.about_business = response.data.post_job_user.company_description;
                                }
                                
                                $('#post_job_description').val(response.data.job_description);
                                editor.setData(response.data.job_description);
                                if(response.data.write_job_type == 1)
                                {
                                    $('#myown').hide();
                                    $('#myad').show();                       
                                }
                                else if(response.data.write_job_type == 2)
                                {
                                    $('#myad').hide();
                                    $('#myown').show();
                                }
                            }
                            else if(response.data == 0)
                            {
                                this.flashMessage.error({
                                    message: 'Post job data not found!',                            
                                });
                                
                            }                   
                        });
                  }
              },
              getSetting()
              {
                  axios.get('/api/front/employer/postjob/getQuestionInfo').then(response => {
                      this.question_info = response.data;
                      
                  });
              },
              questionKeyUp(event)
              {
                    var selected = [];
                    $('.chkMainAuto').each(function() {                
                        selected.push(parseInt($(this).val()));
                    });                 
                    if(selected.length > 0)
                    {
                        var questionArray = $.grep(this.dataQuesitonAuto, function(e){ 
                            return jQuery.inArray(e.id, selected) == -1
                        });
                    } 
                    else
                    {
                        var questionArray = this.dataQuesitonAuto;
                    }                                
                    $("#findQuestion").autocomplete({
                        source: JSON.parse(JSON.stringify(questionArray)),
                        select: function(event, ui)
                        {
                            var e = ui.item;
                            var url = '<?php echo url('/'); ?>';
                            var id = e.id;
                            axios.get('/api/front/employer/postjob/getOptions/'+id).then(response => 
                            {
                                $('.questionContainer').append(response.data);
                                $('#findQuestion').val('');
                            })
                        }                  
                    });
                },
              drpPayMin(event)
              {
                  //$('#pay_range_max').prop('selectedIndex',0);
                  this.payinfo = event.target.value;
              },
              getDataParentCategory()
              {
                  axios.get('/api/front/getParentCategory').then(response => {                
                      this.dataParentCategory = response.data;
                  });
                                  
              },
              getChildCategory(event)
              {
                  var parent_category_id = event.target.value;
                  axios.get('/api/front/getChildCategory/'+parent_category_id).then(response => {
                    $('#childCatContainer').html(response.data);
                  });
              },
              getQuestion()
              {
                    var urlParams = new URLSearchParams(window.location.search);                    
                    var id = urlParams.get('jobid');
                    axios.get('/api/admin/job/getQuestion?jobid='+id).then(response => {
                    this.dataQuestions = response.data.question;
                    if(response.data.selectedQuestions)
                    {                        
                        this.selectedQuestions = response.data.selectedQuestions;
                    }
                    if(response.data.selectedOptions)
                    {
                        this.selectedOptions = response.data.selectedOptions;
                    }
                    if(response.data.selectedAuto)
                    {
                        this.selectedAutoCompleteQuestions = response.data.selectedAuto;
                    }                   
                    
                });
                    
              },
              getSuggestCategory(event)
              {
                  var keyword = event.target.value;
                  if(keyword.length >= 3)
                  {               
                      $('.category-box').hide();
                      $('.btnLoading').show();                    
                      axios.post('/api/front/postjob/getSuggestCategory',{keyword:keyword}).then(response => 
                      {                   
                          setTimeout(function()
                          {
                          $('.btnLoading').hide();
                          $('.category-box').show();
                          $('.category-box11').html('');
                          }, 1000);                                                  
                          this.suggestCategory = response.data;
                          
                      });
                  }                  
              },
              changeCategory(event)
              {
                  var dataId =  event.target.getAttribute("data-id");
                  if(parseInt(dataId) == 1)
                  {
                      $('.industryDrp').show();
                  }
                  else if(parseInt(dataId) == 0)
                  {
                      $('.industryDrp').hide();
                  }
              },
              submit()
              {
                var stepValidationOne = this.stepOneValidation();
                var stepValidationTwo = this.stepTwoValidation();
                if(stepValidationOne == 1 && stepValidationTwo == 1)
                {
                    let formData = new FormData(this.$refs.frm_job); 
                    var urlParams = new URLSearchParams(window.location.search);                    
                    var id = urlParams.get('jobid');
                    formData.append('jobid',id);
                    axios.post('/api/admin/job/updateJob',formData).then(response => {
                      
                      if(response.data.status == 501)
                      {
                          this.flashMessage.error({                                   
                                message: response.data.status
                            });
                      }
                      else if(response.data.status == 200)
                      {
                        this.flashMessage.success({                                   
                                message: 'Job updated successfully'
                            });
                          this.$router.push('/admin/job/index')
                      }
                    });
                }
               
              },
              stepOneValidation()
              {
                  var title = $('#title').val();
                  var location  = $('#location').val();
                  var rdcategory = $('input[name=rdCategory]:checked').val();
                  var parentcatId = $('#parent_category_id').val();
                  var childCatId = $('#child_category_id').val();
                  var workType = $('input[name=worktype]:checked').val();
                  var estimatedSalary = $('#estimated_salary').val();
                  var rdCategoryDiffrent = $('#rdCategoryDiffrent:checked').val();  
                  var stepOneValid = 1;                  
                  if(title == '')
                  {
                    $('.errorTitle').text('Please enter job title!');
                    stepOneValid = 0;
                  }
                  else
                  {
                    $('.errorTitle').text('');
                  }
                  if(location == '')
                  {
                    $('.errorLocation').text('Please select location!');
                    stepOneValid = 0;
                  }
                  else
                  {
                    $('.errorLocation').text('');
                      
                  }           

                  if(typeof(workType)  === "undefined")
                  {
                      $('.errorWorkType').text('Please choose work type!');
                      stepOneValid = 0;
                  }
                  else
                  {
                      $('.errorWorkType').text('');
                  }

                  if(estimatedSalary === null)
                  {
                      $('.errorEstimatedSalary').text('Please select estimated salary!');
                      stepOneValid = 0;
                  }
                  else
                  {
                      $('.errorEstimatedSalary').text('');
                  }

                  if(title != '' && location != '' && typeof(workType)  !== "undefined" && estimatedSalary !== null)
                  {
                      if(title.length >= 3)
                      {
                          if(typeof(rdCategoryDiffrent) === "undefined")
                          {
                              if (typeof(rdcategory) === "undefined")
                              {
                                  $('.errorcategory').text('Please choose category!');
                                  stepOneValid = 0;
                              }
                              else
                              {
                                  $('.errorcategory').text('');
                                  stepOneValid = 1;
                              }
                          }
                          else if(typeof(rdCategoryDiffrent) !== "undefined")
                          {
                              if(typeof(childCatId)  === "undefined")
                              {
                                  $('.errorcategory').text('Please choose category!');
                                  stepOneValid = 0;
                              }
                              else if(typeof(childCatId)  !== "undefined")
                              {
                                  $('.errorcategory').text('');
                                  stepOneValid = 1;
                              }
                          }
                      }
                  }
                  return stepOneValid; 
              },
              stepTwoValidation()
              {
                  var writeType = $('#write_job_type').val();
                  var postJobTask = $('#post_job_task').val();
                  var postJobQaulification = $('#post_job_qualification').val();
                  var postJobBenifit = $('#post_job_benifit').val();
                  var jobdesc = $('#post_job_description').val();
                  jobdesc = jobdesc.replace(/(<([^>]+)>)/ig,"");
                  var stepTwoValid = 1;
                    //console.log('postJobTask '+postJobTask+'  postJobQaulification  '+postJobQaulification+'  postJobBenifit'+postJobBenifit)
                    if(writeType == 1)
                    {
                        if(postJobTask == '')
                        {                    
                            $('.errorPostJobTask').text('Please select atleast one task & responsibilities!');
                            stepTwoValid = 0;
                        }
                        else
                        {
                            $('.errorPostJobTask').text('')
                        }

                        if(postJobQaulification == '')
                        {                    
                            $('.errorPostJobQaulification').text('Please select atleast one job qaulification!');
                            stepTwoValid = 0;
                        }
                        else
                        {
                            $('.errorPostJobQaulification').text('')
                        }

                        if(postJobQaulification == '')
                        {                    
                            $('.errorPostJobQaulification').text('Please select atleast one job qaulification!');
                            stepTwoValid = 0;
                        }
                        else
                        {
                            $('.errorPostJobQaulification').text('')
                        }
                        
                        if(postJobBenifit == '')
                        {                      
                            $('.errorPostJobBenifit').html('Please select atleast one job benifit!');
                            stepTwoValid = 0;
                        }
                        else
                        {
                            $('.errorPostJobBenifit').html('')
                            $('.errorPostJobBenifit').text('')
                        }

                        if(postJobTask != '' && postJobQaulification != '' && postJobBenifit != '')
                        {
                            stepTwoValid = 1;
                        }

                        
                    }
                    else if(writeType == 2)
                    {                
                        if(jobdesc == '')
                        {
                            $('.errorJobDesc').text('Please enter job description!');
                            stepTwoValid = 0;
                        }
                        else
                        {
                            $('.errorJobDesc').text('');
                        }

                        if(jobdesc != '')
                        {
                            stepTwoValid = 1;
                        }
                    }
                    return stepTwoValid;
              }
            },
            
     }
</script>
<style>
     .ck-editor__editable {
    min-height: 300px;
   }
</style>