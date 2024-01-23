<template>
    <main>
        <homelayout>
            <div class="m_container" slot="frontbody">
                <div class="pg-price">
                    <!-- <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> -->
                    <div class="pricing-pg mt-100">
                        <div class="container-fluid ">
                            <div class="inner-heading">
                                <h2>Post a Job</h2>
                                <div class="right-text">
                                    <!-- <span>Questions? Call us</span>
                                    <a href="">+91 9876543210</a> -->
                                    <div class="ptable-action" v-if="!authUser">
                                        <router-link to="/employer_register">Register As Employer</router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                
                 </div>
                 <div class="pricing-main ">
                    <div class="container">
                        <div class="pricing-table">
                        <div class="ptable-item">
                           <div class="premium-job-box">
                            <div class="ptable-single">
                              <div class="ptable-header">
                                <div class="ptable-status">
                                    <span>1</span>
                                    <h1>Start with a  job advert</h1>
                                 </div>
                               </div>
                               <div class="premium-box">
                                <div class="radio-plan">
                                    <label>{{ singleJobData.title }}</label>
                                      <input type="radio"> 
                                      <input checked="checked" type="radio" id="plan1" data-id="1" name="plan" :data-tableid="singleJobData.id" :value="singleJobData.amount" @click="plan(singleJobData.amount)"> 
                                      <label for="plan1"></label>
                                </div>
                                <div class="ptable-price">
			                        <h2><small>€</small>{{ singleJobData.amount }}<span>+VAT</span></h2>
			                    </div>
                                <div class="ptable-bottom">
                                    <a href="">Preview  job</a>
                                </div>
                            
                             <div class="ptable-body">
                                <div class="ptable-description">
                                 <ul>
                                     <li v-if="singleJobFeatures" v-for="(value, key) in singleJobFeatures"> 
                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                        <p>{{ value }}</p>
                                    </li>
                                 </ul>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="urjent-job-box">
                        <div class="ptable-single">
                          <div class="ptable-header">
                            <div class="ptable-status">
                                <!-- <span>1</span> -->
                                <h1>{{ singleAddon.title }}</h1>
                             </div>
                           </div>
                          <div class="premium-box">
                            <div class="ptable-description">
                            <div class="radio-plan">
                                <label>
                                <span>
                                    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" :title="singleAddon.info"></i>
                                </span>
                                </label>
                                <input type="radio" >
                                <input type="radio" id="plan2" data-id="2" name="plan" :data-tableid="singleAddon.id" :value="singleAddon.amount" @click="plan(singleAddon.amount)" data-isseprate="1"> 
                                <label :for="`'addon'${ k }`"></label>
                            </div>                                            
                            <ul>
                                <li v-if="singleAddonFeatures" v-for="(valueAddF, keyAddF) in singleAddonFeatures"> 
                                   <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                    <p>{{ valueAddF }}</p>
                                </li>
                            </ul>
                            <div class="ptable-price">
                                <h2><small>+</small>€{{ singleAddon.amount }}<span>+VAT</span></h2>
                            </div>
                          </div>
                          </div>                                   
                        </div>
                      </div>
			        </div>
                    
                    <div class="ptable-item featured-item">
                        <div class="ptable-single">
                            <div class="ptable-header">
                                <div class="ptable-status">
                                    <span>2</span>
                                    <h1>Select an add-on</h1>                                    
                                </div>
                            </div>
                            <div class="ptable-body">
                                <div class="ptable-description">
                                    <div class="continue-div rd-boxx active">
                                        <div class="radio-plan">
                                            <label>Continue without an add-on 
                                                <!-- <span>
                                                    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="hover me"></i>                                                                                                        
                                                </span> -->
                                            </label>
                                            <input type="radio" id="addon1" name="addon" @click="addon(0)" checked value="0" data-withpremium="1" data-id="0">
                                            <label for="addon1"></label>
                                        </div>
                                    </div>
                                    <p style="display:none">{{ k = 2 }}</p>
                                    <div v-if="addOnData" v-for="(valueAdd, keyAdd) in addOnData">
                                        <div class="premium-div rd-boxx">
                                            <div class="radio-plan">
                                                <label>{{ valueAdd.title }}
                                                <span>
                                                    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" :title="valueAdd.info"></i>
                                                </span>
                                                </label>
                                                <input type="radio" >
                                                <input type="radio" :id="`addon${k}`" v-if="valueAdd.with_premium == 1" data-withpremium="1" :data-id="valueAdd.id" name="addon" @click="addon(valueAdd.amount)" :value="`${valueAdd.amount}`">
                                                <input type="radio" :id="`addon${k}`" v-if="valueAdd.with_premium == 0" data-withpremium="0" :data-id="valueAdd.id" name="addon" @click="addon(valueAdd.amount)" :value="`${valueAdd.amount}`">
                                                <label :for="`'addon'${ k }`"></label>
                                            </div>
                                            
                                            <ul>
                                                <li v-if="addOnDataFeatures[valueAdd.id]" v-for="(valueAddF, keyAddF) in addOnDataFeatures[valueAdd.id]"> 
                                                   <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                    <p>{{ valueAddF }}</p>
                                                </li>
                                            </ul>
                                            <div class="ptable-price">
                                                <h2><small>+</small>€{{ valueAdd.amount }}<span>+VAT</span></h2>
                                            </div>
                                        </div>
                                    <p style="display:none">{{ k++ }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ptable-item ptotal-item">
                        <div class="ptable-single">
                            <div class="ptable-header">
                                <div class="ptable-status">
                                    <span>3</span>
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
                                    <table>
                                        <tr>
                                            <th>Total</th>                                              
                                            <th v-if="singleJobData['single_job_amounts'][0]['amount']">
                                                <div class="ptable-price text-right">
                                                    <h2 id="totalAmount"><small>€</small>{{singleJobData['single_job_amounts'][0]['amount'] }}<span>+VAT</span>
                                                     </h2>
                                                </div>
                                            </th>
                                            <th v-else>
                                                <div class="ptable-price"><h2>
                                                    <small>€</small>0<span>+VAT</span>
                                                </h2></div>
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                                <div class="ptable-footer">
                                    <div class="ptable-action">
                                        <a href="#" v-on:click="setPricing(1,singleJobData.id,0,singleJobData.amount,1)">Continue</a>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="plan-offer-div rd-boxx" v-if="dataOffers">
                                <h5>Never posted a job with<br> proslipsi?</h5>
                                <p>{{ dataOffers.description }}</p>                                
                                <div class="ptable-price">
                                <h2>€{{ dataOffers.amount }}<span>+VAT <strike>(€{{ singleJobData['single_job_amounts'][0]['amount']+addOnData[0]['amount'] }} +VAT)</strike></span></h2>
                                </div>

                                <div class="ptable-footer">
                                    <div class="ptable-action">
                                    <a href="#" v-on:click="setPricing(3,dataOffers.id,0,dataOffers.amount,1)">Continue</a>
                                    </div>
                                </div>
                            </div> -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
	    <div class="or-div">
		    OR
	    </div>
        <section id="pricePlans" class="main-plan-sec">
            <div class="container">
                <div class="plan-heading">
                    <h2>Pricing Plan</h2>
                </div>
                <ul id="plans">
                    <li class="plan" v-if="dataSubscription" v-for="(valueSub, keySub) in dataSubscription">
					    <ul class="planContainer">
                            <li class="title"><h2>{{ valueSub.title }}</h2></li>
                            <li class="price" v-if="valueSub.plan_duration == 30"><p>€{{  valueSub.amount }}/<span>Monthly</span></p></li>
                            <li class="price" v-if="valueSub.plan_duration == 90"><p>€{{  valueSub.amount }}/<span>Quaterly</span></p></li>
                            <li class="price" v-if="valueSub.plan_duration == 365"><p>€{{  valueSub.amount }}/<span>Yearly</span></p></li>
                            <li>
								<ul class="options">
                                    <li v-if="dataSubscriptionKeyFeatures[valueSub.id]" v-for="(valueSubF, keySubF) in dataSubscriptionKeyFeatures[valueSub.id]">
                                        <i class="fa fa-check" aria-hidden="true"></i>{{ valueSubF }}
                                    </li>
                                </ul>
                           </li>
						   <li class="button">
                               <a href="#" v-on:click="setPricing(3,valueSub.id,0,valueSub.amount,1)">Continue</a>
                            </li>
						</ul>
					</li>
                </ul>
            </div>
        </section>
        <form @submit.prevent="validate().then(submit)" ref="frm_pricing">
        <input type="hidden" name="plan_type" id="plan_type" :value="1" />
        <input type="hidden" name="id" id="id" :value="singleJobData.id" />
        <input type="hidden" name="addon_id" id="addon_id" :value="0" />           
        <input type="hidden" name="amount" id="amount" :value="singleJobData.amount" />
        <input type="hidden" name="plan_amount" id="plan_amount" :value="singleJobData.amount" />         
        <input type="hidden" name="addon_amount" id="addon_amount" :value="0" />
        <input type="hidden" name="qty" id="qty" :value="1" />
    </form>
        <div class="about-section plan-step-section">
            <div class="heading">
                <h3>How to post a job with Proslipsi</h3>
            </div>
            <div class="container">
                  <div class="content-advertising">
                    <div class="row">
                    <div class="col-md-7">
                        <div class="about-img">
                            <img src="/img/describe.png">
                        </div>
                    </div>
                    <div class="col-md-5 pr-5">
                        <h2 class="about-heading">1. Describe</h2>
                        <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                   </div>
                   </div>

                   <div class="content-advertising">
                    <div class="row">
                    <div class="col-md-5 pl-5">
                        <h2 class="about-heading">2. Expand</h2>
                        <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                    <div class="col-md-7">
                        <div class="about-img">
                            <img src="/img/expand.png">
                        </div>
                    </div>
                    </div>
                    </div>

                    <div class="content-advertising">
                        <div class="row">
                    <div class="col-md-7">
                        <div class="about-img">
                            <img src="img/filter.png">
                        </div>
                    </div>
                    <div class="col-md-5 pr-5">
                        <h2 class="about-heading">3. Filter</h2>
                        <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                    </div>
                    </div>
                    <div class="content-advertising">
                     <div class="row">
                    <div class="col-md-5 pl-5">
                        <h2 class="about-heading">4. Preview & post job</h2>
                        <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                    <div class="col-md-7">
                        <div class="about-img">
                            <img src="img/post-job.png" />
                        </div>
                    </div>
                    </div>
                  </div>
                </div>
            </div>
	    </div>
        </homelayout>
    </main>
</template>
<script>
export default {
    data()
    {
        return{
            singleJobData: [],
            addOnData: [],
            dataOffers: [],
            dataSubscription: [],
            singleJobFeatures: [],
            addOnDataFeatures: [],
            dataSubscriptionKeyFeatures: [],
            withPremium:1,
            addonId : 0,
            isContinue: 0,
            authUser: [],
            singleAddon: [],
            singleAddonFeatures: [],
        }
    },
    mounted()
    {        
        this.getData();       
        $('.count').prop('disabled', true);     
        // Vue.nextTick(function () {
        //     $('[data-toggle="tooltip"]').tooltip()
        // });    
    },
    methods: 
    {
        setPricing(type,id,addonid,amount,qty)
        {
            if(type == 1)
            {
                if(this.isContinue == 0)
                {
                    $('#plan_type').val(type);
                    $('#id').val(id);
                    $('#addon_id').val(addonid);
                    $('#amount').val(amount);
                    $('#qty').val(qty);            
                    this.submit();
                }
                else if(this.isContinue == 1)
                {
                    this.submit();
                }
            }
            else
            {
                $('#plan_type').val(type);
                $('#id').val(id);
                $('#addon_id').val(addonid);
                $('#amount').val(amount);  
                $('#qty').val(qty);         
                this.submit();
            }       
           
        },
        submit()
        {
            let searchParams = new URLSearchParams(window.location.search);
            var jobid = searchParams.get('jobid');
            var jobtype = searchParams.get('jobtype');
            var step = searchParams.get('step');
            let formData = new FormData(this.$refs.frm_pricing);
                 axios.post('/api/front/addPricing', formData).then(response => {
                    if(response.data != 0)
                    {
                        if(parseInt(jobid) > 0 && jobtype != '')
                        {
                            this.$router.push('/employer/postjob?jobid='+jobid+'&jobtype='+jobtype+'&step='+step+'&lastshow=1');
                        }
                        else
                        {
                            this.$router.push('/employer/postjob');
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
            // axios.post('/api/front/checkSubscriptionPackage',data).then(response => 
            // {
            //     if(response.data == 1)
            //     {
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
                        $('input[name="addon"]').prop('checked',false);
                    }
                    else if(dataId == 2)
                    {
                        $('#plan_type').val(2);  
                        $('#subscriptionPlanAddon').hide();
                        $('#singleJobAddon').hide();
                        $('#totalSaved').show();
                        $('.qty').show();
                        $('#totalSaved').text('Save with multiple adverts');
                        $('input[name="addon"]').prop('checked',false);
                    
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
            //     }
            //     else
            //     {
            //         this.flashMessage.error({
            //                             message: 'You already have a subscription, Please choose another one to upgrade plan!',                            
            //                        });
            //     }
            // });

            
        },
        addon: function(amount)
        {           
            var isWithPremium = event.target.getAttribute('data-withpremium');
            var firstTotalAmount = this.singleJobData['amount'];
            var addOnAmount = amount;
            this.addonId = parseInt(event.target.getAttribute('data-id'));
            var plantype = $('input[name="plan"]:checked').attr('data-id');
            $('#addon_id').val(this.addonId);
            $('#qty').val(1);                
            this.isContinue = 1;

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
            this.isContinue = 1;
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
            event.target.parentElement.parentElement.classList.toggle('active');
            $('#plan1').prop('checked',true);
            $('#plan2').prop('checked',false);
           
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
                        this.addOnData = response.data.data.addOnData.singlejob;
                        this.dataOffers = response.data.data.dataOffers;
                        this.dataSubscription = response.data.data.dataSubscription;
                        this.singleJobFeatures = response.data.data.singleJobData.key_fetures.split(",");
                        this.singleAddon = response.data.data.singleAddon;
                        this.authUser = localStorage.getItem( 'authUser' );
                        for (let detail of this.addOnData) 
                        {
                           let keyFeature = detail.key_fetures;
                           this.addOnDataFeatures[detail.id] = keyFeature.split(",");
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