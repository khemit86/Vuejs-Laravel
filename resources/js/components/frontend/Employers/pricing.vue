<template>
   <main>
      <employerlayout>
         <div class="content-wrapper" style="min-height: 902.8px;" slot="employerbody">
            <div class="dashboard_right_detail">
               <div class="dashboard-heading-main">
                  <div class="row">
                    <div class="col-md-12">
                        <div class="left-dashboard text-center">
                           <h2>Pricing Plan</h2>
                        </div>
                        </div>
                  </div>
               </div>
               <div class="mycompany-heading-main">
                  <form @submit.prevent="validate().then(submit)" ref="frm_pricing" v-if="selectOnlyAddon == 0">
                     <input type="hidden" name="plan_type" id="plan_type" :value="1" />
                     <input type="hidden" name="id" id="id" :value="singleJobData.id" />
                     <input type="hidden" name="addon_id" id="addon_id" :value="0" />  
                     <input type="hidden" name="plan_amount" id="plan_amount" :value="singleJobData.amount" />         
                     <input type="hidden" name="addon_amount" id="addon_amount" :value="0" />
                     <input type="hidden" name="amount" id="amount" :value="singleJobData.amount" />
                     <input type="hidden" name="qty" id="qty" :value="1" />
                  </form>

                  <form @submit.prevent="validate().then(submit)" ref="frm_pricing" v-if="selectOnlyAddon == 1">
                     <input type="hidden" name="plan_type" id="plan_type" :value="2" />
                     <input type="hidden" name="id" id="id" :value="singleAddon.id" />
                     <input type="hidden" name="addon_id" id="addon_id" :value="singleAddon.id" /> 
                     <input type="hidden" name="plan_amount" id="plan_amount" :value="singleAddon.amount" />         
                     <input type="hidden" name="addon_amount" id="addon_amount" :value="0" />          
                     <input type="hidden" name="amount" id="amount" :value="singleAddon.amount" />
                     <input type="hidden" name="qty" id="qty" :value="1" />
                  </form>

                  <div class="row mt-5">
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-1">
                        <div class="pricing-table">
                         <div class="row dashboard-feature-pricebox" style="padding: 0 10px; margin-top: 10px;">
                           <div class="ptable-item" v-if="selectOnlyAddon == 0">
                              <div class="ptable-single">
                                 <div class="pricingTable-header ">
                                    <div class="ptable-status ">
                                       <h1>{{ singleJobData.title }}</h1>
                                         <div class="ptable-price">
                                          <h2><small>€</small>{{ singleJobData.amount }}<span>+VAT</span></h2>
                                       </div>
                                       <!-- <div class="ptable-bottom"><a href="">Preview  job</a></div> -->
                                    </div>
                                 </div>
                                    <div class="ptable-title22 active">
                                       <div class="radio-plan">
                                          <input type="radio"> 
                                          <input checked="checked" type="radio" id="plan1" data-id="1" name="plan" :data-tableid="singleJobData.id" :value="singleJobData.amount" @click="plan(singleJobData.amount)"> 
                                          <label for="plan1"></label>
                                       </div>
                                       <div class="ptable-title">
                                          <!-- <h2>
                                             <label>
                                             <span>
                                             <i data-toggle="tooltip" data-placement="top" title="Add-On for Subscription Plans" class="fa fa-info-circle"></i>
                                             </span>
                                             </label>
                                          </h2> -->
                                       </div>
                                     
                                    
                                       <div class="ptable-body">
                                          <div class="ptable-description">
                                             <ul class="pricing-content">
                                                <li v-if="singleJobFeatures" v-for="(value, key) in singleJobFeatures">
                                                 
                                                   {{ value }}
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    <div class="pricingTable-signup"></div>
                                 </div>
                              </div>
                           </div>

                           <div class="ptable-item" v-if="singleAddon">
                              <div class="ptable-single">
                                 <div class="pricingTable-header ">
                                    <div class="ptable-status">
                                       <h1 v-if="singleAddon.title">{{ singleAddon.title }}</h1>
                                         <div class="ptable-price">
                                          <h2><small>€</small>{{ singleAddon.amount }}<span>+VAT</span></h2>
                                       </div>
                                       <!-- <div class="ptable-bottom"><a href="">Preview  job</a></div> -->
                                    </div>
                                 </div>
                                    <div :class="['ptable-title22', (selectOnlyAddon == 1 ? 'active' : '')]">
                                       <div class="radio-plan">
                                          <input type="radio">                                          
                                          <input v-if="selectOnlyAddon == 1" checked="checked" type="radio" id="plan2" data-id="2" name="plan" :data-tableid="singleAddon.id" :value="singleAddon.amount" @click="plan(singleAddon.amount)" data-isseprate="1"> 
                                          <input v-if="selectOnlyAddon == 0"  type="radio" id="plan2" data-id="2" name="plan" :data-tableid="singleAddon.id" :value="singleAddon.amount" @click="plan(singleAddon.amount)" data-isseprate="1"> 
                                          <label for="plan2"></label>
                                       </div>
                                       <div class="ptable-title">
                                          <!-- <h2>
                                             <label>
                                             <span>
                                             <i data-toggle="tooltip" data-placement="top" title="Add-On for Subscription Plans" class="fa fa-info-circle"></i>
                                             </span>
                                             </label>
                                          </h2> -->
                                       </div>                                     
                                    
                                       <div class="ptable-body">
                                          <div class="ptable-description">
                                             <ul class="pricing-content">
                                                <li v-if="singleAddonFeatures" v-for="(value, key) in singleAddonFeatures">
                                                 
                                                   {{ value }}
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    <div class="pricingTable-signup"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                           <p style="display:none">{{ i = 3 }}</p>
                           <div class="row dashboard-feature-pricebox" style="padding: 0 10px; margin-top: 10px;">
                              <div class="ptable-item"  v-if="dataSubscription" v-for="(valueSub, keySub) in dataSubscription">
                                 <div class="ptable-single" v-if="selectOnlyAddon == 0">
                                    <div class="pricingTable-header ">
                                       <div class="ptable-status">
                                          <h1 v-if="valueSub.plan_duration == 30">Monthly Plan</h1>
                                          <h1 v-if="valueSub.plan_duration == 90">Quaterly Plan</h1>
                                          <h1 v-if="valueSub.plan_duration == 365">Yearly Plan</h1>
                                       </div>
                                        <div class="ptable-price">
                                             <h2><small>€</small>{{ valueSub.amount }}<span>+VAT</span></h2>
                                          </div>
                                          <!-- <div class="ptable-bottom"  v-if="valueSub.plan_duration == 30"><a href="">Monthly</a></div>
                                          <div class="ptable-bottom"  v-if="valueSub.plan_duration == 90"><a href="">Quaterly</a></div>
                                          <div class="ptable-bottom"  v-if="valueSub.plan_duration == 365"><a href="">Yearly</a></div> -->
                                    </div>
                                       <div class="ptable-title22">
                                          <div class="radio-plan">                                        
                                             <input type="radio"> 
                                             <input type="radio" :id="`plan${i}`" :data-id="`${i}`" name="plan" :data-tableid="valueSub.id" :value="valueSub.amount" @click="plan(valueSub.amount)"> 
                                             <label :for="`plan${i}`"></label>
                                          </div>
                                        
                                         <div class="ptable-title">
                                    <h2>&nbsp;
                                    </h2>
                                 </div>
                                          <div class="ptable-body">
                                             <div class="ptable-description">

                                                <ul class="pricing-content">
                                                   <li v-if="dataSubscriptionKeyFeatures[valueSub.id]" v-for="(valueSubF, keySubF) in dataSubscriptionKeyFeatures[valueSub.id]">
                                                     
                                                     {{ valueSubF }}
                                                   </li>
                                                </ul>

                                          </div>
                                       </div>
                                        <div class="pricingTable-signup"></div>
                                    </div>
                                 </div>
                                 <p style="display:none">{{ i++ }}</p>
                              </div>
                           </div>
                           <div class="row dashboard-feature-pricebox">
                              <div class="col-lg-7 col-md-7" id="singleJobAddon" v-if="selectOnlyAddon == 0">
                                 <div class="ptable-item featured-item">
                                    <div class="ptable-single">
                                       <div class="ptable-header">
                                          <div class="ptable-status status-0">
                                             <h1>Select an add-on</h1>
                                          </div>
                                       </div>
                                       <div class="ptable-body">
                                          <div class="ptable-description row mx-0">
                                             <p style="display:none">{{ k = 2 }}</p>
                                             <div class="col-lg-6" v-if="addOnDataSingle" v-for="(valueAdd, keyAdd) in addOnDataSingle">
                                                <div class="pricingTable ">
                                                <div class="ptable-title22 premium-div rd-boxx">
                                                   <div class="radio-plan">
                                                      
                                                      <input type="radio">
                                                      <input type="radio" :id="`addon${k}`" v-if="valueAdd.with_premium == 1" data-withpremium="1" :data-id="valueAdd.id" name="addon" class="addon" @click="addon(valueAdd.amount)" :value="`${valueAdd.amount}`">
                                                      <input type="radio" :id="`addon${k}`" v-if="valueAdd.with_premium == 0" data-withpremium="0" :data-id="valueAdd.id" name="addon" class="addon" @click="addon(valueAdd.amount)" :value="`${valueAdd.amount}`">
                                                      <label :for="`'addon'${ k }`"></label>
                                                   </div>
                                                    <div class="ptable-title">
                                                     <h2>
                                                      <label>{{ valueAdd.title }}
                                                        <span>
                                                         <i data-toggle="tooltip" data-placement="top" :title="valueAdd.info" class="fa fa-info-circle"></i>
                                                         </span>
                                                         </label>
                                                      </h2>
                                                   </div>
                                                   <ul class="pricing-content">
                                                      <li v-if="addOnDataFeaturesSingle[valueAdd.id]" v-for="(valueAddF, keyAddF) in addOnDataFeaturesSingle[valueAdd.id]">
                                                        
                                                         {{ valueAddF }}
                                                      </li>
                                                   </ul>
                                                    
                                                    
                                                   <div class="pricingTable-signup">
                                                   <div class="ptable-price">
                                                      <h2><small>+</small>€{{ valueAdd.amount }}<span>+VAT</span></h2>
                                                   </div>
                                                </div>
                                               </div>
                                               </div>
                                                <p style="display:none">{{ k++ }}</p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-lg-9 col-md-9" id="subscriptionPlanAddon" style="display:none" v-if="selectOnlyAddon == 0">
                                 <div class="ptable-item featured-item">
                                    <div class="ptable-single">
                                       <div class="ptable-header">
                                          <div class="ptable-status status-0">
                                             <h1>Select an add-on</h1>
                                          </div>
                                       </div>
                                       <div class="ptable-body">
                                          <div class="ptable-description row mx-0">
                                             <p style="display:none">{{ k = 2 }}</p>
                                             <div class="col-lg-6" v-if="addOnDataPlan" v-for="(valueAdd, keyAdd) in addOnDataPlan">
                                               <div class="pricingTable ">
                                                <div class="ptable-title22 premium-div rd-boxx">
                                                   <div class="radio-plan">
                                                 
                                                      <input type="radio">
                                                      <input type="radio" :id="`addon${k}`" v-if="valueAdd.with_premium == 1" data-withpremium="1" :data-id="valueAdd.id" name="addon" class="addon" @click="addon(valueAdd.amount)" :value="`${valueAdd.amount}`">
                                                      <input type="radio" :id="`addon${k}`" v-if="valueAdd.with_premium == 0" data-withpremium="0" :data-id="valueAdd.id" name="addon" class="addon" @click="addon(valueAdd.amount)" :value="`${valueAdd.amount}`">
                                                      <label :for="`'addon'${ k }`"></label>
                                                   </div>
                                                    <div class="ptable-title">
                                                     <h2>
                                                      <label>{{ valueAdd.title }}
                                                        <span>
                                                         <i data-toggle="tooltip" data-placement="top" :title="valueAdd.info" class="fa fa-info-circle"></i>
                                                         </span>
                                                         </label>
                                                      </h2>
                                                   </div>
                                                   <ul class="pricing-content">
                                                      <li v-if="addOnDataFeaturesPlan[valueAdd.id]" v-for="(valueAddF, keyAddF) in addOnDataFeaturesPlan[valueAdd.id]">
                                                        
                                                        {{ valueAddF }}
                                                      </li>
                                                   </ul>
                                                    <div class="pricingTable-signup">
                                                    <div class="ptable-price">
                                                      <h2><small>+</small>€{{ valueAdd.amount }}<span>+VAT</span></h2>
                                                   </div>
                                                </div>
                                                  
                                                </div>
                                             </div>
                                                <p style="display:none">{{ k++ }}</p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                      
                              <div class="col-lg-4 col-md-12 pricing-table11" style="position: relative;">
                                 <div class="ptable-item ptotal-item">
                                    <div class="ptable-single">
                                       <div class="fix-box">
                                          <div class="ptable-header">
                                             <div class="ptable-status status-0 ">
                                                <h1>See how much you could save</h1>
                                             </div>
                                          </div>
                                          <div class="pcount-div">
                                             <div class="product-count">
                                                <div class="qty">
                                                   <label>Quantity</label> 
                                                   <div class="count-input">
                                                      <span class="minus" @click="btnMinus">-</span>
                                                      <input v-if="singleJobData['single_job_amounts'][0]['quantity_from'] " type="number" class="count" name="qty" :value="`${ singleJobData['single_job_amounts'][0]['quantity_from'] }`">
                                                      <input v-else type="number" class="count" name="qty" value="0">
                                                      <span class="plus" @click="btnPlus">+</span>
                                                   </div>
                                                </div>
                                                <h6 id="totalSaved">Save with multiple adverts</h6>
                                                <div class="total-vat">
                                                   <h4>Total</h4>
                                                   <div class="totalvat-right" v-if="selectOnlyAddon == 0">
                                                         <div v-if="singleJobData['single_job_amounts'][0]['amount']">
                                                         <div class="ptable-price">
                                                            <h2 id="totalAmount"><small>€</small>{{singleJobData['single_job_amounts'][0]['amount'] }}<span>+VAT</span>
                                                            </h2>
                                                         </div>
                                                         </div>
                                                         <div class="totalvat-right" v-else>
                                                            <div class="ptable-price">
                                                               <h2><small>€</small>0<span>+VAT</span>
                                                               </h2>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div v-if="selectOnlyAddon == 1">
                                                         <div class="totalvat-right" v-if="singleAddon">
                                                         <div class="ptable-price">
                                                            <h2 id="totalAmount"><small>€</small>{{singleAddon.amount }}<span>+VAT</span>
                                                            </h2>
                                                         </div>
                                                         </div>
                                                         <div class="totalvat-right" v-else>
                                                            <div class="ptable-price">
                                                               <h2><small>€</small>0<span>+VAT</span>
                                                               </h2>
                                                            </div>
                                                         </div>
                                                      </div>   
                                                </div>
                                             </div>
                                             <div class="ptable-footer">
                                                <div class="ptable-action" v-if="selectOnlyAddon == 0">
                                                   <a class="right-side" href="#" v-on:click="setPricing">Post Job</a>
                                                   <a class="back-btn left-side" href="#" @click="makePayment">Payment</a>
                                                </div>
                                                <div class="ptable-action" v-if="selectOnlyAddon == 1">                                                   
                                                   <a class="back-btn" style="margin-right:50px" href="#" @click="makePayment">Payment</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- <div class="plan-offer-div rd-boxx">
                                          <h5>Never posted a job with<br> proslipsi?</h5>
                                          <p>Get your first job plus the Premium+ add-on for</p>
                                          <div class="ptable-price">
                                             <h2>€80<span>+VAT <strike>(€180 +VAT)</strike></span></h2>
                                          </div>
                                          <div class="ptable-footer">
                                             <div class="ptable-action"><a href="#">Continue</a></div>
                                          </div>
                                          </div> -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div>
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
               singleJobData: [],
               addOnDataSingle: [],
               addOnDataPlan: [],
               dataOffers: [],
               dataSubscription: [],
               singleJobFeatures: [],
               addOnDataFeaturesSingle: [],
               addOnDataFeaturesPlan: [],
               dataSubscriptionKeyFeatures: [],
               withPremium:0,
               addonId : 0,
               isContinue: 0,
               singleAddon: [],
               singleAddonFeatures: [],
               selectOnlyAddon: 0,
           }
       },
       mounted()
       {        
           this.getData();       
           this.checkselectOnlyAddon();
           $('.count').prop('disabled', true);     
           // Vue.nextTick(function () {
           //     $('[data-toggle="tooltip"]').tooltip()
           // });    
       },
       methods: 
       {
          makePayment()
          {               
            let formData = new FormData(this.$refs.frm_pricing);
            axios.post('/api/front/addPricing', formData).then(response => {   
              var urlParams = new URLSearchParams(window.location.search);
              var planid = urlParams.get('planid');              
              if(planid > 0)
              {
                 this.$router.push('/employer/payment?planid='+planid);
              }
              else
              {
                 this.$router.push('/employer/payment');
              }
               
            });
            
          },
          checkselectOnlyAddon()
          {
             let searchParams = new URLSearchParams(window.location.search);
             var planId = searchParams.get('planid');
             if(planId > 0)
             {
                this.selectOnlyAddon = 1;
             }             
          },
           setPricing()
           {               
               this.submit();              
           },
           submit()
           {
               let searchParams = new URLSearchParams(window.location.search);
               var jobid = searchParams.get('jobid');
               var jobtype = searchParams.get('jobtype');
               var step = searchParams.get('step');
               let formData = new FormData(this.$refs.frm_pricing);
                    axios.post('/api/front/addPricing', formData).then(response => {   
                       console.log(response.data);
                       if(response.data != 0)
                       {
                           if(parseInt(jobid) > 0 && jobtype != '')
                           {
                              window.location.replace('/employer/postjob?jobid='+jobid+'&jobtype='+jobtype+'&step='+step+'&lastshow=1');
                           }
                           else
                           {
                              window.location.replace('/employer/postjob');
                           }                         
                       }
                       else
                       {
                           this.flashMessage.error({
                                        message: 'Something went wrong!',                            
                                   });
                       }
                       console.log(response.data)
                       
                    })
           },
           plan(amount)
           {
              var dataId  = parseInt(event.target.getAttribute('data-id'));
              var tableid  = parseInt(event.target.getAttribute('data-tableid'));
              var data = [];
              data.push(tableid);
              data.push(dataId);
              axios.post('/api/front/checkSubscriptionPackage',data).then(response => 
              {                  
                 if(response.data == 1)
                 {
                     var planAmount = amount;
                     this.addonId = 0;
                     this.isContinue = 1;              
                        $('#addon_id').val(this.addonId);
                        $('#qty').val(1);
                        $('#id').val(tableid);
                     if(dataId == 1)
                     {               
                        $('#plan_type').val(1);  
                        $('#singleJobAddon').show();
                        $('#subscriptionPlanAddon').hide();
                        $('#totalSaved').show();
                        $('.qty').show();
                        $('#totalSaved').text('Save with multiple adverts');
                     }
                     else if(dataId == 2)
                     {
                           $('#plan_type').val(2);  
                           $('#subscriptionPlanAddon').hide();
                           $('#singleJobAddon').hide();
                           $('#totalSaved').show();
                           $('.qty').show();
                           $('#totalSaved').text('Save with multiple adverts');
                        
                     }
                     else if(dataId >= 3)
                     {
                        $('#plan_type').val(3);  
                        $('#subscriptionPlanAddon').show();
                        $('#singleJobAddon').hide();
                        $('#totalSaved').hide();
                        $('.qty').hide();
                        $('#totalSaved').text('');
                     }
                        $('.addon').prop('checked',false);
                        $('#amount').val(planAmount);
                        $('#plan_amount').val(planAmount);
                        $('#addon_amount').val(0);
                        $('.count').val(1);               
                        $('#totalAmount').html('<small>€</small>'+parseInt(planAmount).toFixed(2)+'<span>+VAT</span>');
                        $('.rd-boxx').removeClass('active');
                        $('.ptable-title22').removeClass('active');   
                        event.target.parentElement.parentElement.classList.toggle('active')
                 }
                 else
                 {
                    $('#plan1').prop('checked',true).trigger("click");;
                     this.$confirm(
                     {
                        message: `You have already an active subscription plan!`,
                        button: {
                           yes: 'Ok'
                        }
                     });

                 }
              });             
             
           },
           addon: function(amount)
           {           
               $('#totalSaved').show();
               $('.qty').show();
               $('#totalSaved').text('Save with multiple adverts');
               var isWithPremium = event.target.getAttribute('data-withpremium');
               var firstTotalAmount = $('input[name="plan"]:checked').val();
               var addOnAmount = amount;
               this.addonId = parseInt(event.target.getAttribute('data-id'));
               var plantype = $('input[name="plan"]:checked').attr('data-id');
               var planId = $('input[name="plan"]:checked').attr('data-tableid');
               var isSeprate = event.target.getAttribute('data-isseprate');
               if(plantype == 1)
               {                  
                  $('#addon_id').val(this.addonId);
                  $('#qty').val(1);                
                  this.isContinue = 1;
               }
               else if(plantype >= 3)
               {                
                  $('#addon_id').val(this.addonId);
                  $('#qty').val(1);                  
                  this.isContinue = 1;
               }
              
               if(parseInt(isWithPremium) == 1)
               {
                   this.withPremium = 1;
                   var totalAmount = parseInt(firstTotalAmount)+parseInt(addOnAmount);
               }
               else
               {
                   this.withPremium = 0;
                   var totalAmount = parseInt(addOnAmount);
               }  
               $('#amount').val(totalAmount);
               $('#plan_amount').val(firstTotalAmount);
               $('#addon_amount').val(addOnAmount);
               $('.count').val(1);
               $('#totalSaved').text('Save with multiple adverts');
               $('#totalAmount').html('<small>€</small>'+parseInt(totalAmount).toFixed(2)+'<span>+VAT</span>');
               $('.rd-boxx').removeClass('active');
               $('.ptable-title22').removeClass('active');
               event.target.parentElement.parentElement.classList.toggle('active')
              
           },       
           getData()
           {
              let searchParams = new URLSearchParams(window.location.search);
               var alreadyPlan = searchParams.get('isPlanAlready');
               if(alreadyPlan == 1)
               {
                  this.$confirm(
                        {
                           message: `You have already an active subscription plan!`,
                           button: {
                              yes: 'Ok'
                           }
                        });
               }
               axios.get('/api/front/getPricing').then(response => {
                           this.singleJobData = response.data.data.singleJobData;
                           this.addOnDataSingle = response.data.data.addOnData.singlejob;
                           this.addOnDataPlan = response.data.data.addOnData.plan;
                           this.dataOffers = response.data.data.dataOffers;
                           this.dataSubscription = response.data.data.dataSubscription;
                           this.singleJobFeatures = response.data.data.singleJobData.key_fetures.split(",");
                           this.singleAddon = response.data.data.singleAddon;
                           for (let detail of this.addOnDataSingle) 
                           {
                              let keyFeature = detail.key_fetures;
                              this.addOnDataFeaturesSingle[detail.id] = keyFeature.split(",");
                           }
                           for (let detail of this.addOnDataPlan) 
                           {
                              let keyFeature = detail.key_fetures;
                              this.addOnDataFeaturesPlan[detail.id] = keyFeature.split(",");
                           }
                           for (let detail1 of this.dataSubscription) 
                           {
                              let keyFeature = detail1.key_fetures;
                              this.dataSubscriptionKeyFeatures[detail1.id] = keyFeature.split(",");
                           }
                           var features = this.singleAddon.key_fetures.split(",");
                           var i = 0;
                           for (let detail2 of features) 
                           {
                              let keyFeature = detail2;
                              this.singleAddonFeatures[i] = detail2;
                              i++;
                           }
                       })
                        
           },
           btnPlus()
           {
               $('.loaderBck').show();
               var quantity = parseInt($('.count').val())+1;
               var addOnAmount = parseInt($('input[name="addon"]:checked').val());
               let planAmount = parseInt($('input[name="plan"]:checked').val());
               let planDataId = parseInt($('input[name="plan"]:checked').attr('data-id'));
               var planId = $('input[name="plan"]:checked').attr('data-tableid');
               var planType = 1;
               if(planDataId == 1)
               {
                  planType = 1;
                  var planTotalAmount = planAmount*quantity;                  
               }
               else if(planDataId == 2)
               {
                  planType = 2;
                  var planTotalAmount =planAmount*quantity;
               } 
               else if(planDataId >= 3)
               {
                  planType = 3;
                  var planTotalAmount =planAmount;
               }  
               if(addOnAmount > 0)
               {
                  var addonTotalAmount = addOnAmount*quantity;                 
               }
               else
               {
                  var addonTotalAmount = 0;
                   addOnAmount = 0;
               }            
               var totalAmountWithOutDiscount = planTotalAmount+addonTotalAmount;
               console.log('quantity '+quantity+' addOnAmount '+addOnAmount+' planType '+planType+' planTotalAmount '+planTotalAmount)
               var data = [];
               data.push(quantity);
               data.push(addOnAmount);
               data.push(this.withPremium);
               data.push(this.addonId);
               data.push(planType)
               data.push(planTotalAmount);
               data.push(planId);
               if(quantity > 1)
               {
                   $('.minus').css('background-color','');
                   $('.minus').addClass('bg-dark11');
               }
               else if(quantity <= 1)
               {
                   $('.minus').css('background-color','#a8aaad');
                   $('.minus').removeClass('bg-dark1');
               }
               axios.post('/api/front/getSingleJobAmounts',data).then(response => {
                   if(response.data.status == 200)
                   {               
                      if(planDataId == 1)
                      {
                           this.isContinue = 1;
                           $('#plan_type').val(1);                          
                      }
                      else if(planDataId == 2)
                      {
                           this.isContinue = 1;
                           $('#plan_type').val(2);                           
                      } 
                      else if(planDataId >= 3)
                      {
                          this.isContinue = 1;
                          $('#plan_type').val(3);  
                      }
                      $('#addon_id').val(this.addonId);
                      $('#id').val(planId);
                      $('#amount').val(response.data.amount);
                      $('#plan_amount').val(response.data.plan_amount);
                       $('#addon_amount').val(response.data.addon_amount);
                      $('#qty').val(quantity);  
                       
                       $('.plus').addClass('bg-dark1');
                       $('.plus').css('background-color','')
                       $('.count').val(parseInt($('.count').val()) + 1 );
                       $('#totalAmount').html('<small>€</small>'+parseInt(response.data.amount).toFixed(2)+'<span>+VAT</span>');
                       if(totalAmountWithOutDiscount > response.data.amount)
                       {
                           var totalSaved = parseInt(totalAmountWithOutDiscount)-parseInt(response.data.amount)
                           $('#totalSaved').text('save €'+totalSaved+'');
                       }
                       else
                       {
                           $('#totalSaved').text('Save with multiple adverts');
                       }
                   }
                   else if(response.data.status == 501)
                   {
                       $('.plus').removeClass('bg-dark1');
                       $('.plus').css('background-color','#a8aaad')
                       this.flashMessage.error({
                              message: 'Please contact us to add more add-ons!',                            
                        });   
                   }
               });      
               $('.loaderBck').hide();
           },
           btnMinus()
           {
               if(parseInt($('.count').val()) > 1)
               {
                     var quantity = parseInt($('.count').val())-1;
                     var addOnAmount = parseInt($('input[name="addon"]:checked').val());
                     let planAmount = parseInt($('input[name="plan"]:checked').val());
                     let planDataId = parseInt($('input[name="plan"]:checked').attr('data-id'));
                     var planId = $('input[name="plan"]:checked').attr('data-tableid');
                     var planType = 1;
                     if(planDataId == 1)
                     {
                        planType = 1;
                        var planTotalAmount = planAmount*quantity;                  
                     }
                     else if(planDataId == 2)
                     {
                        planType = 2;
                        var planTotalAmount =planAmount*quantity;
                     } 
                     else if(planDataId >= 3)
                     {
                        planType = 3;
                        var planTotalAmount =planAmount;
                     }  
                     if(addOnAmount > 0)
                     {
                        var addonTotalAmount = addOnAmount*quantity;                 
                     }
                     else
                     {
                        var addonTotalAmount = 0;
                        addOnAmount = 0;
                     }            
                     var totalAmountWithOutDiscount = planTotalAmount+addonTotalAmount;
                     var data = [];
                     var data = [];
                     data.push(quantity);
                     data.push(addOnAmount);
                     data.push(this.withPremium);
                     data.push(this.addonId);
                     data.push(planType)
                     data.push(planTotalAmount);
                     data.push(planId);
                      axios.post('/api/front/getSingleJobAmounts',data).then(response => {
                       if(response.data.status == 200)
                       {
                           if(planDataId == 1)
                           {
                              this.isContinue = 1;
                              $('#plan_type').val(1);                          
                           }
                           else if(planDataId == 2)
                           {
                              this.isContinue = 1;
                              $('#plan_type').val(2);                           
                           } 
                           else if(planDataId >= 3)
                           {
                              this.isContinue = 1;
                              $('#plan_type').val(3);  
                           }
                           $('#addon_id').val(this.addonId);
                           $('#id').val(planId);
                           $('#amount').val(response.data.amount);
                           $('#plan_amount').val(response.data.plan_amount);
                           $('#addon_amount').val(response.data.addon_amount);
                           $('#qty').val(quantity);
                       
                           $('.plus').addClass('bg-dark1');
                           $('.plus').css('background-color','')
                           $('.count').val(parseInt($('.count').val()) - 1 );
                           $('#totalAmount').html('<small>€</small>'+parseInt(response.data.amount).toFixed(2)+'<span>+VAT</span>')
                           if(totalAmountWithOutDiscount > response.data.amount)
                           {
                              var totalSaved = parseInt(totalAmountWithOutDiscount)-parseInt(response.data.amount)
                              $('#totalSaved').text('save €'+totalSaved+'');
                           }
                           else
                           {
                              $('#totalSaved').text('Save with multiple adverts');
                           }
                       }
                   });
                     if((parseInt($('.count').val()) - 1) <= 1)
                     {
                        $('.minus').css('background-color','#a8aaad');
                        $('.minus').removeClass('bg-dark1');
                     }  
   
               }
           },
       },
   }
</script>


