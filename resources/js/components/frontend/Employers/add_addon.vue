<template>
   <main>
      <employerlayout>
         <div class="content-wrapper" style="min-height: 902.8px;" slot="employerbody">
            <div class="dashboard_right_detail">
               <div class="dashboard-heading-main">
                  <div class="row">
                    <div class="col-md-12">
                        <div class="left-dashboard">
                           <h2>Select Addon</h2>
                        </div>
                        </div>
                  </div>
               </div>
               <div class="mycompany-heading-main">

                  <form @submit.prevent="validate().then(submit)" ref="frm_pricing" v-if="planType == 1">
                     <input type="hidden" name="plan_type" id="plan_type" :value="1" />
                     <input type="hidden" name="id" id="id" :value="this.id" />
                     <input type="hidden" name="addon_id" id="addon_id" :value="addOnDataSingle[0].id" />           
                     <input type="hidden" name="amount" id="amount" :value="addOnDataSingle[0].amount" />
                     <input type="hidden" name="plan_amount" id="plan_amount" :value="0" />
                     <input type="hidden" name="addon_amount" id="addon_amount" :value="addOnDataSingle[0].amount*qty" />
                     <input type="hidden" name="qty" id="qty" :value="qty"  />
                  </form>

                   <form @submit.prevent="validate().then(submit)" ref="frm_pricing" v-if="planType == 3 || planType == 4">
                     <input type="hidden" name="plan_type" id="plan_type" :value="3" />
                     <input type="hidden" name="id" id="id" :value="this.id" />
                     <input type="hidden" name="addon_id" id="addon_id" :value="addOnDataPlan[0].id" />           
                     <input type="hidden" name="amount" id="amount" :value="addOnDataPlan[0].amount" />
                     <input type="hidden" name="plan_amount" id="plan_amount" :value="0" />
                     <input type="hidden" name="addon_amount" id="addon_amount" :value="addOnDataPlan[0].amount*qty" />
                     <input type="hidden" name="qty" id="qty" :value="qty"  />
                  </form>

                  <div class="row mt-5">
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-1">
                        <div class="pricing-table">
                           
                           <div class="row dashboard-feature-pricebox">

                              <div class="col-lg-9 col-md-9" id="singleJobAddon" v-if="selectOnlyAddon == 1 && planType == 1">
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
                                                      <input type="radio" :checked="k == 2" :id="`addon${k}`" v-if="valueAdd.with_premium == 1" data-withpremium="1" :data-id="valueAdd.id" name="addon" class="addon" @click="addon(valueAdd.amount)" :value="`${valueAdd.amount}`">
                                                      <input type="radio" :checked="k == 2"  :id="`addon${k}`" v-if="valueAdd.with_premium == 0" data-withpremium="0" :data-id="valueAdd.id" name="addon" class="addon" @click="addon(valueAdd.amount)" :value="`${valueAdd.amount}`">
                                                      <label :for="`'addon'${ k }`"></label>
                                                   </div>
                                                    <div class="ptable-title">
                                                     <h2>
                                                      <label>{{ valueAdd.title }}
                                                        <span>
                                                      <i data-toggle="tooltip" data-placement="top" title="Add-On for Subscription Plans" class="fa fa-info-circle"></i>
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

                              <div class="col-lg-9 col-md-9" id="subscriptionPlanAddon" v-if="selectOnlyAddon == 1 && (planType == 3 || planType == 4)">
                                 <div class="ptable-item featured-item">
                                    <div class="ptable-single">
                                       <div class="ptable-header">
                                          <div class="ptable-status status-0">
                                             <h1>Select an add-on</h1>
                                          </div>
                                       </div>
                                       <div class="ptable-body">
                                          <div class="ptable-description row mx-0">
                                             <p style="display:none">{{ j = 2 }}</p>
                                             <div class="col-lg-6" v-if="addOnDataPlan" v-for="(valueAdd, keyAdd) in addOnDataPlan">
                                               <div class="pricingTable ">
                                                <div class="ptable-title22 premium-div rd-boxx">
                                                   <div class="radio-plan">
                                                 
                                                      <input type="radio">
                                                      <input type="radio" :checked="j == 2" :id="`addon${j}`" v-if="valueAdd.with_premium == 1" data-withpremium="1" :data-id="valueAdd.id" name="addon" class="addon" @click="addon(valueAdd.amount)" :value="`${valueAdd.amount}`">
                                                      <input type="radio" :checked="j == 2" :id="`addon${j}`" v-if="valueAdd.with_premium == 0" data-withpremium="0" :data-id="valueAdd.id" name="addon" class="addon" @click="addon(valueAdd.amount)" :value="`${valueAdd.amount}`">
                                                      <label :for="`'addon'${ j }`"></label>
                                                   </div>
                                                    <div class="ptable-title">
                                                     <h2>
                                                      <label>{{ valueAdd.title }}
                                                        <span>
                                                      <i data-toggle="tooltip" data-placement="top" title="Add-On for Subscription Plans" class="fa fa-info-circle"></i>
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
                                                <p style="display:none">{{ j++ }}</p>
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
                                                      <!-- <span class="minus" @click="btnMinus">-</span> -->
                                                      <input type="number" class="count" name="qty" :value="qty">                                                     
                                                      <!-- <span class="plus" @click="btnPlus">+</span> -->
                                                   </div>
                                                </div>
                                                <!-- <h6 id="totalSaved">Save with multiple adverts</h6> -->
                                                <table>
                                                   <tr>
                                                      <th>Total</th>                                                      
                                                         <th v-if="selectOnlyAddon == 1 && planType == 1" style="width: 100%; text-align: right;">
                                                         <div class="ptable-price" style="text-align: right;">
                                                            <h2 id="totalAmount"><small>€</small>{{ addOnDataSingle[0]['amount']*qty }}<span>+VAT</span>
                                                            </h2>
                                                         </div>
                                                         </th>
                                                         <th v-else-if="selectOnlyAddon == 1 && (planType == 3 || planType == 4)">
                                                         <div class="ptable-price">
                                                            <h2 id="totalAmount"><small>€</small>{{ addOnDataPlan[0]['amount']*qty }}<span>+VAT</span>
                                                            </h2>
                                                         </div>
                                                         </th>
                                                         <th v-else>
                                                            <div class="ptable-price">
                                                               <h2><small>€</small>0<span>+VAT</span>
                                                               </h2>
                                                            </div>
                                                         </th>                                                                                                         
                                                   </tr>
                                                </table>
                                             </div>
                                             <div class="ptable-footer">                                               
                                                <div class="ptable-action">                                                   
                                                   <a class="back-btn" style="margin-right:50px" href="#" @click="makePayment">Payment</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
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
               
               addOnDataSingle: [],
               addOnDataPlan: [],    
               addOnDataFeaturesSingle: [],
               addOnDataFeaturesPlan: [],               
               withPremium:0,
               addonId : 0,
               isContinue: 0,               
               selectOnlyAddon: 0,
               id: 0,
               qty:1,
               planType: 0,
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
            });
            
          },
          checkselectOnlyAddon()
          {
             let searchParams = new URLSearchParams(window.location.search);
             var planId = searchParams.get('planid');
             var planType = searchParams.get('planType');
             var id = searchParams.get('id');
             if(planId > 0)
             {
                this.selectOnlyAddon = 1;
                this.planType = planType;
                this.id = id;
               
                
             }             
          },
           setPricing()
           {               
               this.submit();              
           },                      
           addon: function(amount)
           {             
               $('.qty').show();              
               var isWithPremium = event.target.getAttribute('data-withpremium');              
               var addOnAmount = amount;
               this.addonId = parseInt(event.target.getAttribute('data-id'));
               if(this.planType == 1)
               {
                  $('#id').val(this.id);
                  $('#plan_type').val(1);
                  $('#addon_id').val(this.addonId);
                  $('#qty').val(this.qty); 
               } 
               else if(this.planType == 3 || this.planType == 4)
               {
                  $('#id').val(this.id);
                  $('#plan_type').val(3);
                  $('#addon_id').val(this.addonId);
                  $('#qty').val(this.qty);  
               }                        
               $('#amount').val(addOnAmount*this.qty);
               $('#plan_amount').val(0);
               $('#addon_amount').val(addOnAmount*this.qty);
               $('.count').val(this.qty);               
               $('#totalAmount').html('<small>€</small>'+addOnAmount*this.qty+'<span>+VAT</span>');
               $('.rd-boxx').removeClass('active');
               $('.ptable-title22').removeClass('active');
               event.target.parentElement.parentElement.classList.toggle('active');
              
           },       
           getData()
           {
              let searchParams = new URLSearchParams(window.location.search);
              var planId = searchParams.get('planid');
               axios.get('/api/front/getPricing11?planId='+planId).then(response => {
                           this.singleJobData = response.data.data.singleJobData;
                           this.addOnDataSingle = response.data.data.addOnData.singlejob;
                           this.addOnDataPlan = response.data.data.addOnData.plan;                 
                            this.qty = response.data.qty;
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
                           
                          
                       })
                        
           },
       },
   }
</script>


