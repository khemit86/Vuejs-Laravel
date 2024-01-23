<template>
    <main>
        <div class="login-box employer-register-section">
            <div class="login-box-body">
                <header>
                    <nav class="navbar navbar-expand-lg fixed-top header-navbar">
                        <div class="container">
                            <router-link class="navbar-brand headerLogo" to="/">
                                <svg fill="#fff" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 35"><defs></defs><title>Untitled-1</title><path d="M38.1745,8.3927H33.55V21.3481h1.8275V16.743h2.7972a4.1763,4.1763,0,1,0,0-8.35Zm0,6.6056H35.3773V10.1374h2.7972a2.3371,2.3371,0,0,1,2.4464,2.4391A2.329,2.329,0,0,1,38.1745,14.9983Z"/><path d="M48.203,11.7214h-.4487a3.5955,3.5955,0,0,0-2.4814.8569v-.7361H43.498v9.5059h1.7749V16.1122a2.3781,2.3781,0,0,1,2.4814-2.6807h.4487Z"/><path d="M53.0178,11.6524a4.9438,4.9438,0,1,0,5.0458,4.9427A4.9509,4.9509,0,0,0,53.0178,11.6524Zm0,8.1753a3.2326,3.2326,0,1,1,3.2534-3.2326A3.2174,3.2174,0,0,1,53.0178,19.8277Z"/><path d="M62.6012,15.7723c-1.3672-.3441-2.0114-.5777-2.0114-1.23,0-.8152.8321-1.18,1.6568-1.18a1.8549,1.8549,0,0,1,1.83,1.0349l.1925.4685,1.5349-.8623-.164-.364a3.5506,3.5506,0,0,0-3.3931-1.9873c-1.9884,0-3.4316,1.2155-3.4316,2.89,0,2.0022,1.8147,2.4642,3.2729,2.8353,1.389.3536,2.0435.5942,2.0435,1.27,0,1.1232-1.5117,1.18-1.8147,1.18a2.0851,2.0851,0,0,1-2.1534-1.2162l-.1745-.5145-1.559.8911.1331.349a3.75,3.75,0,0,0,3.7538,2.2007c2.1134,0,3.59-1.1884,3.59-2.89C65.9062,16.6043,64.0737,16.143,62.6012,15.7723Z"/><rect x="67.0438" y="7.8752" width="1.7748" height="13.4729"/><rect x="70.623" y="11.8422" width="1.7748" height="9.5059"/><path d="M71.51,8.3927A1.1227,1.1227,0,1,0,72.661,9.5065,1.1339,1.1339,0,0,0,71.51,8.3927Z"/><path d="M79.3006,11.6524A4.6652,4.6652,0,0,0,75.977,12.95V11.8422H74.2022V24.7975H75.977V20.24a4.6647,4.6647,0,0,0,3.3236,1.298,4.943,4.943,0,1,0,0-9.8854Zm-.0526,1.71a3.2328,3.2328,0,1,1-3.271,3.2325A3.2172,3.2172,0,0,1,79.248,13.3626Z"/><path d="M88.8488,15.7723c-1.3671-.3441-2.0113-.5777-2.0113-1.23,0-.8152.8321-1.18,1.6567-1.18a1.8548,1.8548,0,0,1,1.83,1.0348l.1924.4687,1.5349-.8624-.1638-.364a3.5505,3.5505,0,0,0-3.3932-1.9873c-1.9883,0-3.4315,1.2155-3.4315,2.89,0,2.0022,1.8147,2.4642,3.2729,2.8353,1.389.3536,2.0434.5942,2.0434,1.27,0,1.1232-1.5115,1.18-1.8146,1.18a2.0852,2.0852,0,0,1-2.1535-1.2162l-.1745-.5145-1.559.8911.1331.349a3.7508,3.7508,0,0,0,3.7539,2.2007c2.1134,0,3.5895-1.1884,3.5895-2.89C92.1539,16.6043,90.3213,16.143,88.8488,15.7723Z"/><path d="M94.1789,10.6375a1.1227,1.1227,0,1,0-1.1506-1.131A1.1422,1.1422,0,0,0,94.1789,10.6375Z"/><rect x="93.2915" y="11.8422" width="1.7748" height="9.5059"/><path d="M24.94,16.3364l-.0319.0078a6.9469,6.9469,0,0,1-.9234,2.0107,6.7668,6.7668,0,0,0,.9076-1.8529C24.9074,16.455,24.92,16.4073,24.94,16.3364Z"/><path d="M25.0124,11.9986c-.131-.018-.2515-.0417-.3726-.0477-.263-.0132-.5266-.0227-.79-.0227q-4.8263,0-9.6524.0033c-.8406.0006-1.6812.0065-2.5218.01a5.596,5.596,0,0,0-1.2438.1327,6.3294,6.3294,0,0,0-3.2111,1.8262,6.6911,6.6911,0,0,0-1.9035,4.4871c-.0231.5718-.0234,1.1448-.0228,1.7172.0015,1.34.0128,2.6809.0145,4.0214.0012,1.027-.01,2.0539-.0087,3.0809.0009.8723.01,1.7447.0185,2.6171a2.3926,2.3926,0,0,0,.14.7745,2.068,2.068,0,0,0,1.1961,1.3029A2.1315,2.1315,0,0,0,7.78,32.018,1.9212,1.9212,0,0,0,9.21,31.1009a2.3274,2.3274,0,0,0,.2816-.72,4.492,4.492,0,0,0,.0714-.9493q.0174-1.4108.0281-2.8215.0146-1.6084.0271-3.2169c.0086-1.195.0122-2.39.0238-3.5851.004-.4086.017-.8176.0421-1.2254a2.9669,2.9669,0,0,1,.2122-.9395,1.62,1.62,0,0,1,.9133-.9231,3.0293,3.0293,0,0,1,.7364-.19,7.183,7.183,0,0,1,1.02-.0562q5.8079-.0009,11.6156-.0022a3.6813,3.6813,0,0,0,.7848-.0791c.0617-.0134.124-.0293.2025-.0484A7.6179,7.6179,0,0,0,25.0124,11.9986Z"/><g class="cls-1"><image width="311" height="319" transform="translate(-11.52 -24) scale(0.24)" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATcAAAE/CAYAAAAjcYRfAAAACXBIWXMAAC4jAAAuIwF4pT92AAAGd0lEQVR4Xu3cS5LbNhRAUSuV/W9ZGcVJJW6rW02CD5fnjDkiHi5A+fN4Pp8/AGr+ePUAwI7EDUgSNyBJ3IAkcQOSxA1IEjcgSdyAJHEDksQNSBI3IEncgCRxA5LEDUgSNyBJ3IAkcQOSxA1IEjcgSdyAJHEDksQNSBI3IEncgCRxA5LEDUgSNyBJ3IAkcQOSxA1IEjcgSdyAJHEDksQNSBI3IEncgCRxA5LEDUgSNyBJ3IAkcQOSxA1IEjcgSdyAJHEDksQNSBI3IEncgCRxA5LEDUgSNyBJ3IAkcQOSxA1IEjcgSdyAJHEDksQNSBI3IEncgCRxA5LEDUgSNyBJ3IAkcQOSxA1IEjcgSdyAJHEDksQNSBI3IEncgCRxA5LEDUgSNyBJ3IAkcQOSxA1IEjcgSdyApD9fPQBf9Xg8Hq+e+a/n8/l89Qx8xcNM8Y53AvYO0eNd4sanrIrZZwgenyFufGhS0D4idHxE3Phph5j9jtDxb+J2c7sH7SNCh7jdUDVoHxG6exK3G7lb1H5F6O5D3G5A1P5P5PrELUzUXhO5LnELErWvEbgmcYsRtveJXIu4RYjaMQSuQ9wChO14Irc/cduYqJ1L4PYmbpsStnVEbk/+s8oNCdta3vee3Nw2YpNdzy1uH25umxC2GazDPsRtAzbULNZjD+I2nI00k3WZz29uQ9k8e/Ab3FziNpCw7Ufk5vFZOoyw7cm6zSNug9ggcBxxG0LY9mcNZxE3OJDAzSFuA9gQLdZzBnG7mI3QZF2vJ24XsgHarO+1xO0iBh/OJW5wIofYdcTtAgb+Xqz3NcRtMYMOa4gbLOBQW0/cFjLg92b91xK3RQw2rCVusJBDbh1xW8BA82/mYQ1xO5lBhmuIG1zAoXc+cTuRAeZ3zMe5xO0kBheuJW5wIYfgecTtBAYWriducDGH4TnE7WAGFWYQNxjAoXg8cQOSxO1ATl+YQ9xgCIfjscQNSBK3gzh1YRZxg0EckscRNyBJ3A7gtIV5xA2GcVgeQ9yAJHH7JqcszCRuMJBD8/vEDUgSNyBJ3L7BpwPMJW4wlMPze8QNSBI3IEncgCRxe5PfQ2A2cQOSxA0G84XwPnEDksQNSBI3IEncgCRxA5LE7Q3+BAvmEzcgSdyAJHEDksQNSBI3IEnc3vB8Pp+vngGuJW5AkrgBSeIGJIkbkCRuQJK4AUniBoP5a0fvE7c3GTqYTdyAJHEDksQNSBI3GMrvut8jbt9g+GAucQOSxA1IEjcYyE8e3ydu32QIYSZxA5LEDYbxNXAMcTuAYYR5xA1IEjcYxFfAccTtIIYSZhE3IEncYAi3/2OJ24EMJ8whbkCSuMEAbv3HE7eDGVKYQdyAJHE7gdsbX2FeziFuQJK4ncRpzGeYk/OIG1xE2M4lbicyvHAdcTuZwPEr5uJ84gaLCdsa4raAYYb1xG0RgePHD3OwkrjBIsK2lrgtZLhhHXFbTODuybqvJ24XMOj3Yr2vIW5AkrhdxGl+D9b5OuJ2IYPfZn2vJW4XswGarOv1xA0OJmwziNsANgMcT9yGELgG6ziHuA1iY+zN+s0ibsPYIHuybvOI20A2yl6s10ziNpQNswfrNNfD2sz2eDwer55hPVGbT9w2IXJzCNsefJZuwoaawTrsQ9w2YmNdy/vfi8/STflMXUfU9uTmtikbbg3veV9ubgFucccTtf25uQXYiMfyPhvc3GLc4t4nai1ubjE26Hu8tx43tzC3uNdErcvNLczG/T3vp83N7Sbc4v4havcgbjd0x9AJ2v2I282VQydo9yZu/FQInaDxN3Hjl3YKnaDxK+LGSxNDJ2i8Im582RWxEzO+Stw4zBHREzGOIm5Akn+hACSJG5AkbkCSuAFJ4gYkiRuQJG5AkrgBSeIGJIkbkCRuQJK4AUniBiSJG5AkbkCSuAFJ4gYkiRuQJG5AkrgBSeIGJIkbkCRuQJK4AUniBiSJG5AkbkCSuAFJ4gYkiRuQJG5AkrgBSeIGJIkbkCRuQJK4AUniBiSJG5AkbkCSuAFJ4gYkiRuQJG5AkrgBSeIGJIkbkCRuQJK4AUniBiSJG5AkbkCSuAFJ4gYkiRuQJG5AkrgBSeIGJIkbkCRuQJK4AUniBiSJG5AkbkCSuAFJ4gYkiRuQJG5AkrgBSeIGJIkbkCRuQJK4AUniBiSJG5AkbkCSuAFJ4gYkiRuQJG5AkrgBSeIGJP0FcZXn6Op5bQAAAAAASUVORK5CYII="/></g><path d="M29.4261,12.7875a13.4883,13.4883,0,0,0-1.08-3.6025,9.9948,9.9948,0,0,0-2.9275-3.7787A11.1084,11.1084,0,0,0,18.6522,2.985c-.8722-.0166-1.7447-.02-2.6171-.0243q-1.4382-.0075-2.8765-.0059-2.488.0006-4.9761.0054c-.3272.0005-.6546-.0044-.9814.0079a5.2152,5.2152,0,0,0-.704.0678,1.9839,1.9839,0,0,0-1.4091.9329,3.493,3.493,0,0,0-.1963.358,2.1619,2.1619,0,0,0-.0493,1.7973A2.16,2.16,0,0,0,6.357,7.4955a3.5676,3.5676,0,0,0,.8927.0869q2.8562.0029,5.7123.0047c1.9314.0012,3.8628-.0011,5.7941.0052a6.9971,6.9971,0,0,1,.951.063,5.9614,5.9614,0,0,1,2.0054.67,6.2364,6.2364,0,0,1,2.66,2.7266c-.0221-.044-.0348-.067-.0348-.067s.0127.023.0348.067a7.5645,7.5645,0,0,1,.3714.8634c.0086.024.013.0494.0223.0852l-.0134-.0019a7.62,7.62,0,0,1,.1558,4.3456l.0319-.0078c-.02.0709-.0328.1186-.0477.1656a6.7668,6.7668,0,0,1-.9076,1.8529v0a6.7479,6.7479,0,0,1-1.8841,1.793,6.2344,6.2344,0,0,1-3.2354,1.0159c-.3949.013-.7906.0065-1.1859.0068-.9634.0007-1.9268-.0022-2.89.0023a3.7576,3.7576,0,0,0-.624.0442A2.2465,2.2465,0,0,0,12.6627,24.68a2.1887,2.1887,0,0,0,1.9079,1.0044c1.2131.014,2.4266.0076,3.64.0072.5224,0,1.0447.0006,1.5661-.0482a9.6221,9.6221,0,0,0,2.6306-.6161,10.8659,10.8659,0,0,0,4.529-3.3289,11.4575,11.4575,0,0,0,2.5592-6.22A10.6438,10.6438,0,0,0,29.4261,12.7875Z"/></svg>
                            </router-link>
                        </div>
                    </nav>
                </header>
             <div class="job-steps-section mt-60">
			  <div class="container-fluid">
			    <div class="row justify-content-center">			
			        <div class="col-sm-8 text-center p-0">
			            <div class="login-form-body card" style="display:block">
			                <h2 id="heading">Create a job ad</h2>
			                <form id="msform" @submit.prevent="submit" ref="msform">
			                    <!-- progressbar -->
			                    <ul id="progressbar">
			                        <li class="active" id="account"><strong>Classify</strong></li>
			                        <li id="personal"><strong>Write</strong></li>
			                        <li id="payment"><strong>Shortlist</strong></li>
			                        <li id="confirm"><strong>Pay & Post</strong></li>
			                    </ul>
			                    <div class="progress">
			                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
		                    </div> <br> <!-- fieldsets -->
		                    <fieldset class="fieldsteps">
		                        <div class="form-card">
		                            <div class="row">
		                                <div class="col">
		                                    <h2 class="fs-title">Classify your role</h2>
		                                </div>
		                            </div> 
		                            <div class="row g-3 step-form">
	                            	<h4>Role Information</h4>
					              <div class="col-md-12">				                 
					                <div class="form-group has-feedback ">
					                  <input autofocus="autofocus"  type="text" name="title" id="title" class="form-control" placeholder="Title*"  @keyup="getSuggestCategory($event)" v-model="title">
					                  <span class="glyphicon glyphicon-user form-control-icon"></span> 
                                       <span class="help-block errorTitle" style="color:red"></span>                                     
                                        <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.title">
                                            <span>{{ laravelErrors.title[0] }}</span>
                                        </div>
                                    </div>
                                    				                
					              </div>
					              <div class="col-md-12">
					                <div class="form-group has-feedback ">
					                    <select class="form-control" name="location" id="location" v-model="location">
                                            <option value="" selected="selected">Select Location*</option>
                                            <option value="Nicosia">Nicosia</option>
                                            <option value="Larnaca">Larnaca</option>
                                            <option value="Limassol">Limassol</option>
                                            <option value="Paphos">Paphos</option>
                                            <option value="Famagusta">Famagusta</option>
                                        </select>
					                    <span class="glyphicon glyphicon-user form-control-icon"></span>
                                         <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.location">
                                            <span>{{ laravelErrors.location[0] }}</span>
                                        </div>
                                        <span class="help-block errorLocation" style="color:red"></span> 
					                </div>
                                   
					              </div>
					            </div>
                                <div class="stap-form-loading">
                                    <span><img width="100px" src="/img/waiting.gif" class="btnLoading" style="display:none"  /></span>
                                </div>
                                <div class="row g-3 step-form category-box" style="display:none">                                                                  
                                    <h4>Industries Of Operation</h4>
                                    <h5>Suggested based on your job title.</h5>
                                    <div class="row">
                                        
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
                                       
                                        <div class="col-md-12 form-group radio-plan steps-radio">
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
                                    <div v-if="Object.keys(dataPostJobs).length > 0" class="row g-3 step-form category-box11">
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

					            <div class="row g-3 step-form">
                                    <ValidationProvider rules="required" v-slot="{ errors }">
	                            	<h4>Work Type*</h4>
						            <div class="row">
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
                                           
						            </div>
                                    <span class="help-block errorWorkType" style="color:red">{{ errors[0] }}</span>
                                    <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.worktype">
                                            <span>{{ laravelErrors.worktype[0] }}</span>
                                        </div>
                                    </ValidationProvider>
						            </div>
					            </div>

					            <!-- <div class="row g-3 step-form">
	                            	<h4>Pay Type</h4>
	                            	<div class="row">
					            		<div class="col-md-12 form-group radio-plan steps-radio">
						               		<p>
						                	<input type="radio" id="paytype" name="paytype" value="1"><label for="paytype">Annual Salary</label>
						               		</p>
						               	</div>
						            </div>
					            </div> -->

					            <div class="row g-3 step-form pay-form">
	                            	<h4>Estimated Salary (€EUR)*</h4>
						            <div class="col-md-12">
						                <div class="form-group ">
						                	<label>Select an estimated salary</label>
						                	<div class="row">
						                		<div class="col-md-12">									                
									                <div class="form-group has-feedback ">
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
                                            		</div>
                                                    <span class="help-block errorEstimatedSalary" style="color:red"></span> 
                                                    <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.estimated_salary">
                                                        <span>{{ laravelErrors.estimated_salary[0] }}</span>
                                                    </div>                                                    
									            </div>
									            <!-- <div class="col-md-1">
									            	<div class="form-group has-feedback to-txt">
									                     <label>to</label>
                                            		</div>
									            </div> -->
									            <!-- <div class="col-md-4">
									               <ValidationProvider rules="required" v-slot="{ errors }">
									                <div class="form-group has-feedback ">
									                     <select class="form-control" name="pay_range_max" id="pay_range_max" v-on:change="drpPayMax($event)">
									                     <option disabled selected="selected" value="">Maximum</option>
									                     <option value="19,999">19,999</option>
									                     <option value="24,999">24,999</option>
									                     <option value="34,999">34,999</option>
									                     <option value="49,999">49,999</option>
									                     <option value="59,999">59,999</option>
									                     </select>
                                            		</div>
                                                     <span class="help-block" style="color:red">{{ errors[0] }}</span> 
                                                    <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.pay_range_min">
                                                        <span>{{ laravelErrors.pay_range_min[0] }}</span>
                                                    </div>
                                                    </ValidationProvider>
									            </div> -->
						                	</div>						                	
						                </div>
						            </div>
					            </div>


                            <div class="row g-3 step-form pay-form">
                            <div class="col-md-12" id="payInfoDiv" v-if="is_hide_salary == 0">
                                <div class="form-group ">
                                    <label>Customize the salary information displayed on your job listing <span class="optional">(Optional)</span></label>
                                    <div class="row">
                                        <div class="col-md-4">                                               
                                            <div class="form-group has-feedback ">
                                                <input type="text" class="form-control numberType" name="salary_form" id="salary_from" placeholder="€10000" v-model="salary_from" @keyup="salaryFrom" />
                                            </div>                                           
                                            <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.salary_from">
                                                <span>{{ laravelErrors.salary_from[0] }}</span>
                                            </div>                                           
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group has-feedback to-txt">
                                                <label>to</label>
                                            </div>
                                        </div>
                                         <div class="col-md-4">                                               
                                            <div class="form-group has-feedback ">
                                                    <input type="text" class="form-control numberType" name="salary_to" id="salary_to" placeholder="€25000" v-model="salary_to" @keyup="salaryTo" />
                                            </div>                                            
                                            <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.salary_to">
                                                <span>{{ laravelErrors.salary_to[0] }}</span>
                                            </div>                                           
                                        </div>
                                         <p class="re-note" id="phoneLength">e.g. €10,000 - €25,000</p>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="col-md-12" id="payInfoDiv" style="display:none" v-else>
                                <div class="form-group ">
                                    <label>Customize the salary information displayed on your job listing <span class="optional">(Optional)</span></label>
                                    <div class="row">
                                        <div class="col-md-4">                                               
                                            <div class="form-group has-feedback ">
                                                <input type="text" class="form-control numberType" name="salary_form" id="salary_from" placeholder="€10000" v-model="salary_from" />
                                            </div>                                           
                                            <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.salary_from">
                                                <span>{{ laravelErrors.salary_from[0] }}</span>
                                            </div>                                           
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group has-feedback to-txt">
                                                <label>to</label>
                                            </div>
                                        </div>
                                         <div class="col-md-4">                                               
                                            <div class="form-group has-feedback ">
                                                    <input type="text" class="form-control numberType" name="salary_to" id="salary_to" placeholder="€25000" v-model="salary_to" />
                                            </div>                                            
                                            <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.salary_to">
                                                <span>{{ laravelErrors.salary_to[0] }}</span>
                                            </div>                                           
                                        </div>
                                         <p class="re-note" id="phoneLength">e.g. €10,000 - €25,000</p>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="form-group has-feedback ">
                                <div class="checkbox icheck m-top10">
                                    <label>
                                        <span><input name="is_hide_salary" id="is_hide_salary" v-model="is_hide_salary" value="1" type="checkbox"></span>
                                        Hide salary on your ad
                                    </label>
                                </div>			                        
                            </div>
                        </div>

					            <div class="row g-3 step-form pay-form">
					              <!-- <div class="col-md-12" id="payInfoDiv">
					                <div class="form-group has-feedback ">
					                	<label>Customize the salary information displayed on your job listing <span class="optional">(Optional)</span></label>
					                  <input :maxlength="50" type="text" name="pay_information" v-model="payinfo" id="pay_information" class="form-control" placeholder="$0 - $0">
                                      <span class="text-num"><i v-text="(payinfo.length)"></i><i>/50</i></span>
					                </div>
					                <p class="re-note" id="phoneLength">e.g. $50,000 - $59,999 + car + annual bonus</p>
					              </div> -->

					              <div class="col-md-12">
					                <div class="form-group has-feedback ">
					                	<label>Job ad reference<span class="optional">(Optional)</span></label>
					                  <input type="text" name="job_reference" id="job_reference" class="form-control" v-model="job_reference">
					                </div>
					                <p class="re-note" id="phoneLength">Don’t worry, this won’t be displayed to candidates on your job ad.</p>					                
					              </div>
					            </div>

	                        <input type="button" name="next" class="next action-button btnNext1" value="Next" data-id="1"  />
	                        <input type="button" name="next" class="action-button btnSaveDraft" data-step="1" value="Save Draft" v-if="dataPostJobs.length == 0 || dataPostJobs.step <= 3" @click="saveDraf(1)" />
	                        <!-- <a href="#" class="draft-div">Save Draft</a> -->
	                    </fieldset>

	                    <fieldset class="fieldsteps">
	                        <div class="form-card">
	                            <div class="row">
	                                <div class="col">
	                                    <h2 class="fs-title">Write about your job</h2>
	                                </div>
	                            </div> 
	                            <div class="row g-3 job-steps">
	                            	<h4>Job description</h4>
	                            	<p>We can help you write your job ad or you can enter your own if you’ve got it sorted.</p>
					            </div>
					            <div class="write-tabs">
					            	<ul class="nav nav-tabs" v-if="dataPostJobs && dataPostJobs.write_job_type == 1">
									    <li class="active writetype" data-id="1"><a class="active" data-toggle="tab" href="#myad" @click="changeWriteType(1)"><i class="fa fa-pencil-square" aria-hidden="true"></i> Help me write my ad</a></li>
									    <li class="writetype" data-id="2"><a data-toggle="tab" href="#myown" @click="changeWriteType(2)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Write my own</a></li>
									</ul>
                                    <ul class="nav nav-tabs" v-else-if="dataPostJobs && dataPostJobs.write_job_type == 2">
									    <li class="active writetype" data-id="1"><a  data-toggle="tab" href="#myad" @click="changeWriteType(1)"><i class="fa fa-pencil-square" aria-hidden="true"></i> Help me write my ad</a></li>
									    <li class="writetype" data-id="2"><a  class="active" data-toggle="tab" href="#myown" @click="changeWriteType(2)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Write my own</a></li>
									</ul>
                                    <ul class="nav nav-tabs" v-else>
									    <li class="active writetype" data-id="1"><a class="active" data-toggle="tab" href="#myad" @click="changeWriteType(1)"><i class="fa fa-pencil-square" aria-hidden="true"></i> Help me write my ad</a></li>
									    <li class="writetype" data-id="2"><a data-toggle="tab" href="#myown" @click="changeWriteType(2)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Write my own</a></li>
									</ul>
                                    <input type="hidden" name="write_job_type" id="write_job_type" v-model="write_job_type" />
									<div class="tab-content">
										<div id="myad" class="tab-pane active">
											<div class="ad-main">
												<h5>Tasks & responsibilities</h5>
												<p>Let candidates know what they will be doing day-to-day.</p>												
												<div class="respons-data" id="respons-data" v-if="tasks.length == 0">
													<!-- <div class="form-group has-feedback ">
									                  <input autofocus type="text" name="post_job_task[]" id="post_job_task" class="form-control addtype" data-id="1" placeholder="New Task & Responsibility">
									                </div> -->
                                                    <div class="taskContainer">

                                                    </div>
                                                    <div class="add-respon add_button" data-type="task" id="addTask">
                                                        <i class="fa fa-plus"></i>
                                                        <span >Add tasks & responsibilities</span>
												    </div>
                                                    <div class="pagination1">
                                                       <span class="taskCount">0/10</span>
                                                   </div>
												</div>

                                                <div class="respons-data" id="respons-data" v-else>                                                    
													<div class="form-group has-feedback" v-if="tasks.length > 0" v-for="(valueTask, keyTask) in tasks">
									                  <input autofocus type="text" name="post_job_task[]" :value="valueTask.task" id="post_job_task" class="form-control addtype post_job_task" data-id="1" placeholder="New Task & Responsibility">
                                                      <div class="close" data-type="task"><i class="fa fa-close"></i></div>
									                </div>
                                                    <div class="form-group has-feedback" v-else>
									                  <input autofocus type="text" name="post_job_task[]" id="post_job_task" class="form-control" placeholder="New Task & Responsibility">
									                </div>
                                                    <div class="taskContainer">

                                                    </div>
                                                    <div class="add-respon add_button" data-type="task"  id="addTask">
                                                        <i class="fa fa-plus"></i>
                                                        <span >Add tasks & responsibilities</span>
												    </div>
                                                    <div class="pagination1">
                                                       <span class="taskCount"><span v-text="(tasks.length)"></span><span>/10</span></span>
                                                   </div>
												</div>

                                                <span class="help-block errorPostJobTask" style="color:red"></span>
											</div>

											<div class="ad-main">
												<h5>Qualifications & experience</h5>
												<p>What qualifications or skills must applicants have?</p>
												<p>How much experience (if any) do they need?</p>												
												<div class="respons-data" id="respons-data" v-if="qualifications.length == 0">
													<!-- <div class="form-group has-feedback">
									                  <input type="text" name="post_job_qualification[]" id="post_job_qualification" class="form-control addtype" data-id="2" placeholder="Qualification & Experience">
									                </div> -->
                                                    <div class="qualiContainer">
                                                    </div>
                                                    <div class="add-respon add_button" data-type="quali"  id="addQauli">
                                                        <i class="fa fa-plus"></i>
                                                        <span>Add qualifications & experience</span>
												    </div>
                                                    <div class="pagination1">
                                                       <span class="qualiCount">0/10</span>
                                                   </div>
												</div>

                                                <div class="respons-data" id="respons-data" v-else>
													<div class="form-group has-feedback" v-if="qualifications.length > 0" v-for="(valueQuali, keyQuali) in qualifications">
									                  <input type="text" name="post_job_qualification[]" :value="valueQuali.qaulification" id="post_job_qualification" class="form-control addtype post_job_qualification" data-id="2" placeholder="Qualification & Experience">
                                                      <div class="close" data-type="quali"><i class="fa fa-close"></i></div>
									                </div>
                                                    <div class="qualiContainer">
                                                    </div>
                                                    <div class="add-respon add_button" data-type="quali" id="addQauli">
                                                        <i class="fa fa-plus"></i>
                                                        <span>Add qualifications & experience</span>
												    </div>
                                                    <div class="pagination1">
                                                        <span class="qualiCount"><span v-text="(qualifications.length)"></span><span>/10</span></span>
                                                   </div>                                                   
												</div>
                                                <span class="help-block errorPostJobQaulification" style="color:red"></span>
											</div>

											<div class="ad-main">
												<h5>Benefits <span class="optional">(Optional)</span></h5>
												<p>There’s more to a job than just the pay. Attract candidates to apply for your role by letting them know what benefits you offer.</p>												
												<div class="respons-data" id="respons-data" v-if="benifits.length == 0">
													<!-- <div class="form-group has-feedback">
									                  <input type="text" name="post_job_benifit[]" id="post_job_benifit" class="form-control addtype" data-id="3" placeholder="New Benefit">
									                </div> -->
                                                    <div class="benifitContainer">
                                                    </div>
                                                    <div class="add-respon add_button" data-type="benifit" id="addBenifit">
                                                        <i class="fa fa-plus"></i>
                                                        <span>Add Benefits</span>
												    </div>
                                                       <div class="pagination1">
                                                       <span class="benifitCount">0/10</span>
                                                   </div>
												</div>

                                                <div class="respons-data" id="respons-data" v-else>
													<div class="form-group has-feedback" v-if="benifits.length > 0" v-for="(valueb, keyb) in benifits">
									                  <input type="text" name="post_job_benifit[]" :value="valueb.benifit" id="post_job_benifit" class="form-control addtype post_job_benifit" data-id="3" placeholder="New Benefit">
                                                      <div class="close" data-type="benifit"><i class="fa fa-close"></i></div>
									                </div>
                                                    <div class="benifitContainer">
                                                    </div>
                                                    <div class="add-respon add_button" data-type="benifit" id="addBenifit">
                                                        <i class="fa fa-plus"></i>
                                                        <span>Add Benefits</span>
												    </div>
                                                       <div class="pagination1">
                                                       <span class="benifitCount"><span v-text="(benifits.length)"></span><span>/10</span></span>
                                                   </div>
												</div>
                                                 <span class="help-block errorPostJobBenifit" style="color:red"></span>
											</div>

											<div class="ad-main">
												<h5>About the business<span class="optional">(Optional)</span></h5>
												<p>Candidates want to know who you are. What does your organisation do? What makes your business special? Why is your business a great place to work?</p>
												<div class="text-div">
													<textarea class="form-control" rows="4" name="about_business" id="about_business" required=""  v-model="about_business"></textarea>
                                                    <span class="text-num"><i v-text="(about_business.length)"></i><i>/150</i></span>
												</div>
											</div>

											<div class="ad-main">
												<h5>Job summary description<span class="optional">(Optional)</span></h5>
												<p>Write a small summary of your job listing</p>
												<div class="text-div">
													<textarea :maxlength="150" class="form-control" rows="4" name="job_summary" id="job_summary" v-model="job_summary"></textarea>
                                                    <span class="text-num"><i v-text="(job_summary.length)"></i><i>/150</i></span>
												</div>                                               
											</div>
										</div>
										<div id="myown" class="tab-pane">
											<div class="ad-main">
												<div class="text-editor">
                                                   <textarea class="ckdescription" id="ckdescription" name="description" v-model="job_description"></textarea> 
                                                  <span class="text-num"><i v-text="(job_description.length)"></i><i>/3500</i></span>
                                                  <input type="hidden" name="post_job_description" id="post_job_description" />
												</div>
                                                 <span class="help-block errorJobDesc" style="color:red"></span>
											</div>
											<div class="ad-main">
												<h5>Job summary description<span class="optional">(Optional)</span></h5>
												<p>Write a small summary of your job listing</p>
												<div class="text-div">
													<textarea :maxlength="150" class="form-control" rows="4" name="job_summary" id="job_summary" v-model="job_summary"></textarea>
                                                    <span class="text-num"><i v-text="(job_summary.length)"></i><i>/150</i></span>                                                  
												</div>
											</div>
										</div>
									</div>
					            </div>
	                        </div>
	                         <input type="button" name="next" class="next action-button btnNext2" value="Next" data-id="2"  /> 
                             <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
	                         <input type="button" name="next" class="btnSaveDraft action-button" data-step="2" value="Save Draft" @click="saveDraf(2)" v-if="dataPostJobs.length == 0 || dataPostJobs.step <= 3" />
	                    </fieldset>
                        <fieldset class="fieldsteps">
                        <div class="form-card">
                            <div class="row">
                                <div class="col">
                                    <h2 class="fs-title">Shortlist candidates faster<span>(Optional)</span></h2>
                                </div>
                            </div>
                            <div class="row g-3 job-steps shorlist-sec">
                                <h4>
                                    Questions for candidates <span class="free-txt">Free</span> 
                                    <div class="dropdown">
                                    <span>
                                    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" :title="`${question_info}`"></i>
                                    </span>
                                    <!-- <button class="btn dropdown-toggle toggle-display" type="button" data-toggle="dropdown"><i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu exclam-data">
                                            <h6>Here's how it works</h6>
                                            <p>Choose up to 5 questions and answers that meet your key requirements.</p>
                                            <p>Don't worry, you can still view all applications.We'll just place the most suitable ones at the top of the list.</p>
                                            <p>For selected questions, we'll also use Certsy, our trusted verification platform, to verify candidates’ credentials (if they have chosen to use it).</p>
                                            <p>For selected questions, we'll also use Certsy, our trusted verification platform, to verify candidates’ credentials (if they have chosen to use it).</p>
                                            <ul>
                                                <li>Certsy verified</li>
                                                <li>Match</li>
                                                <li>Partial / No Match</li>
                                            </ul>
                                            <p class="re-note">Your questions and answers can't be changed after you post your job ad.</p>
                                        </div> -->
                                    </div>
                                </h4>
                                <p>Include up to 5 easy-to-answer questions in your job ad.</p>
                                <p>Candidates that match your preferred answers go straight to the top of your list, so you know who to target first.</p>
                            </div>
                            <div class="select-ques">
                                <label id="selectedQuestions">0/5 questions selected</label>
                                <div class="form-group has-feedback ">
                                    <input type="text" name="questionsearch" class="form-control" placeholder="Find a question" id="findQuestion" v-on:keyup="questionKeyUp($event)">
                                    <span class="glyphicon glyphicon-envelope form-control-icon"></span>
                                </div>
                            </div>
                           <div class="question-collapse-main questionContainer">                                 
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

                            <!-- <div class="question-collapse-main questionContainerRec">
                                <h6>Employer Previous questions</h6>
                                <div class="panel-group driving-license-settings" id="accordion">
                                    <div class="panel panel-default" v-if="dataPreviousQuestions" v-for="(valueRec, keyRec) in dataPreviousQuestions">
                                    <div v-if="valueRec.employer_id > 0 && valueRec.uploaded_by == 2">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <div class="checkbox" data-toggle="collapse" data-parent="#accordion" :data-target="`#collapse${valueRec.id}`">
                                                <input type="checkbox" :name="`question_id_rec[${valueRec.question.id}]`" :value="`${valueRec..id}`" class="ui-checkbox mainCheckBox" :id="`chkMain${valueRec.id}`" :checked="selectedQuestions.includes(valueRec.id)"> 
                                                
                                                <label :for="`chkMain${valueRec.id}`">{{ valueRec.title }}</label>
                                            </div>
                                        </h4>
                                    </div>
                                    <div :id="`collapse${valueRec.id}`" class="panel-collapse collapse show" v-if="selectedPreviousQuestions.includes(valueRec.id)">
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
                            </div> -->


                            <div class="question-collapse-main questionContainerRec">
                                <h6>Employer Recommended questions</h6>
                                <div class="panel-group driving-license-settings" id="accordion">
                                    <div class="panel panel-default" v-if="dataQuestions" v-for="(valueRec, keyRec) in dataQuestions">
                                    <div v-if="valueRec.employer_id > 0 && valueRec.uploaded_by == 2">
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
                            

                            <div class="question-collapse-main questionContainerRec">
                                <h6>Admin Recommended questions</h6>
                                <div class="panel-group driving-license-settings" id="accordion">
                                    <div class="panel panel-default" v-if="dataQuestions" v-for="(valueRec, keyRec) in dataQuestions">
                                    <div v-if="valueRec.employer_id == 0 && valueRec.uploaded_by == 1">
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


                        </div>
                         <input type="button" name="next" class="btnSaveDraft action-button" data-step="4" value="Update" @click="saveDraf(4)" v-if="isEditMode == 1 && jobType == 'open'"/>
                         <input type="button" name="next" class="btnSaveDraft action-button" data-step="4" value="Save job" @click="saveDraf(4)" v-else-if="isHavePlan == 1" />
                         <input type="button" name="next" class="next action-button" value="Next" data-id="3" v-else />
                        <a data-toggle="modal" data-target="#exampleModalLong" name="previous" class="action-button-previous btnPreview">Preview</a>
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </fieldset>
                        <fieldset class="fieldsteps" id="paymentStep">
                        <div class="row justify-content-between">
                            <div class="col-sm-7">
                                <div class="form-group mt-3 has-feedback ">
                                    <div class="left-checout-page">
                                    <h1>Payment & Post</h1>
                                    <div id="dropin-container"></div>
                                        <div class="ptable-action">      
                                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" data-id="laststep" />
                                            <button type="button" class="payment-btn" id="submit-button">Payment</button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-card">
                                    <div class="pricintable-1">
                                    <div class="ptable-single">
                                        <div class="ptable-header">
                                            <div class="ptable-status">
                                                <h1>Checkout Details</h1>
                                            </div>
                                        </div>
                                        <div class="ptable-body">
                                            <table>
                                                <thead>
                                                <!--  <tr>
                                                    <th scope="col">Plan</th>
                                                    <th scope="col">Quantity
                                                    </th>
                                                    <th scope="col">Price</th>
                                                    </tr> -->
                                                </thead>
                                                <tbody>
                                                      <tr v-if="pricingDetails.plan_title != ''">
                                                         <td>Plan Title</td>
                                                         <td>
                                                            {{  pricingDetails.plan_title }}
                                                         </td> 
                                                         <td v-if="pricingDetails.plan_type == 1 || pricingDetails.plan_type == 2">
                                                            x {{  pricingDetails.plan_qty }}
                                                         </td>                             
                                                      </tr>
                                                      <tr  v-if="pricingDetails.addon_title">
                                                            <td>Addon Title</td>
                                                            <td>{{  pricingDetails.addon_title }}</td>
                                                            <td>
                                                                 x {{  pricingDetails.addon_qty }}
                                                            </td>
                                                         </tr>
                                                         
                                                         
                                                         <tr>
                                                            <td>Amount</td>
                                                            <td>€{{  pricingDetails.amount }}</td>
                                                         </tr>
                                                         <tr>
                                                         <td>
                                                            Vat %
                                                         </td>
                                                         <td>
                                                            <!-- <div class="number">
                                                               <span class="minus2">-</span>
                                                               <input type="text" value="1"/>
                                                               <span class="plus2">+</span>
                                                            </div> -->
                                                            {{  pricingDetails.vat }}%
                                                         </td>
                                                         </tr>
                                                         <tr>
                                                            <td>Vat Amount</td>
                                                            <td>€{{  (pricingDetails.amount*pricingDetails.vat/100).toFixed(2) }}</td>
                                                         </tr>
                                                   </tbody>
                                                <tr class=" footer-tble">
                                                <td colspan="1">Net Amount</td>
                                                <td>€{{  (Number(pricingDetails.amount*pricingDetails.vat/100) + Number(pricingDetails.amount)).toFixed(2)  }}</td>
                                                </tr>                                                
                                            </table>
                                            <div class="ptable-action">
                                                <a href="#" @click="changePlan">Change Plan</a>
                                            </div>                                             
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </fieldset>	               
	                </form>                   
	            </div>
	        </div>
	    </div>
	</div>
</div>
</div>
</div>



<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
   <div class="modal-dialog container" role="document">
      <div class="modal-content preview-page-proslips">
         <div class="modal-header">
            <div class="titl-proslips-previw">
               <h5 class="modal-title" id="exampleModalLongTitle">Preview</h5>
               <p>This is a preview of what your job and will look like to condidates</p>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="modal-body-proslips">
               <div class="row">
                  <div class="col-sm-8">
                     <div class="inner-body-prolips">
                        <div class="header-user-prolis">
                           <h5 v-text="(title)"></h5>
                           <p v-text="(location)"></p>
                        </div>
                        <div v-if="write_job_type == 1">
                            <div class="ul-part-content" style="margin-top:20px">
                                <h6>Tasks & Responsbilities</h6>
                                <ul class="divTask">

                                </ul>
                            </div>                        
                            <div class="ul-part-content">
                                <h6>Qualification & Experince </h6>
                                <ul class="divQuali">
                                   
                                </ul>
                            </div>
                            <div class="ul-part-content">
                                <h6>Benefits </h6>
                                <ul class="divBenifits">
                                  
                                </ul>
                            </div>
                            <div class="ul-part-content"  v-if="about_business">
                                <h6>About The Business </h6>
                                <ul>
                                  <li v-text="(about_business)"></li>
                                </ul>
                            </div>
                             <!-- <div class="ul-part-content"  v-if="job_summary">
                                <h6>Job summary </h6>
                                <ul>
                                  <li v-text="(job_summary)"></li>
                                </ul>
                            </div> -->
                        </div> 
                       
                         <div v-if="write_job_type == 2">
                             <div class="ul-part-content" style="margin-top:20px">
                                <h6>Job Description</h6>
                                <ul>
                                    <li id="job_desc_text"></li>
                                </ul>
                             </div>
                             <!-- <div class="ul-part-content"  v-if="job_summary">
                                <h6>Job summary </h6>
                                <ul>
                                  <li v-text="(job_summary)"></li>
                                </ul>
                            </div> -->
                         </div>                   
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="right-section1">
                        <div class="purplis-div-blank"></div>
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="gray-blank"></div>
                           </div>
                           <div class="col-lg-6">
                              <div class="gray-blank"></div>
                           </div>
                        </div>
                     </div>
                     <div class="right-section1">
                        <h6 v-text="(location)"></h6>
                        <h6 v-if="salary_from && salary_to" v-text="(salary_from+' - '+salary_to)"></h6>
                        <h6 v-else v-text="(estimated_salary)"></h6>
                        <h6 v-if="worktype == 1">Full Time</h6>
                        <h6 v-else-if="worktype == 2">Part Time</h6>
                        <h6 v-else-if="worktype == 3">Temporary</h6>
                        <h6 v-else-if="worktype == 4">Contract</h6>
                        <h6 v-else-if="worktype == 5">Intership</h6>
                        <h6 id="catNameI"></h6>
                        <p id="catNameII"></p>
                        <!-- <p>Networks & Systems Administration</p> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
         </div>
      </div>
   </div>
</div>
<div class="loaderBck">
	<div class="loader">Loading...</div>
</div>
<vue-confirm-dialog></vue-confirm-dialog>
<button @click="alertQuestion" style="display:none" id="btnAlert"/>
    </main>
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
            dataPreviousQuestions: [],
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
            selectedPreviousQuestions: [],
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
      
        // var button = document.querySelector('#submit-button');
        // braintree.dropin.create({
        //     authorization: "{{ Braintree_ClientToken::generate() }}",
        //     container: '#dropin-container'
        //     });       
        setTimeout(function() 
        {
            $('.loaderBck').hide();
        }, 4000);
        this.checkSubscriptionPackageFront();
        this.checkSubscription();
        this.getSessionPricing();
        this.intBraintree();
        this.getDataParentCategory();
        this.getQuestion();
        this.getSetting();    
        this.getData();          
        var maxFieldTask = 10; 
        var xTask = 0;
        var maxFieldQuali = 10; 
        var xQuali = 0;
        var maxFieldBenifit = 10; 
        var xbenifit = 0;
        var isCatSelected = 0;
        var stepOneValid = 1;
        var stepTwoValid = 1;
        var isSelectQuestion = 1;
        // $(document).ready(function() 
        // {
        //    $('.post_job_task').each(function()
        //    {
        //        alert('lsdfkj');
        //    });
        // })
        // $('.btnSaveDraft').click(function()
        // {
        //     var dataStep = $(this).attr('data-step');
        //     if(dataStep == 1)
        //     {
        //         this.isValidOne = stepOneValidation();
        //     }
        //     else if(dataStep == 2)
        //     {
        //         this.isValidTwo = stepTwoValidation();
        //     }
        // });

        // $('.questionContainerRec').on('click','input[type="checkbox"]',function(){
        //         e.preventDefault();
        //         e.stopPropagation();
        //         setTimeout(function() {
        //         this.checked = !this.checked;
        //         }.bind(this), 2000);
        // });
        $('.questionContainer').on('dblclick','.ui-checkbox',function(event)
        {
            event.preventDefault();
        });

        $('.questionContainer').on('click','.ui-checkbox',function()
        {         
            var countCheckedCheckboxes = $('input.mainCheckBox:checkbox:checked').length;
            var chkVal = $(this).attr('data-id');
            console.log('countCheckedCheckboxes '+countCheckedCheckboxes+' chkVal '+chkVal)
            if(countCheckedCheckboxes > 5)
            {
                $("#collapseAuto"+chkVal).css('display','none');
                $(this).prop('checked',false);
                isSelectQuestion = 0;
            } 
            else if(countCheckedCheckboxes <= 5)
            {
                isSelectQuestion = 1;
            }            
            
            if(isSelectQuestion == 1)
            {                 
                if(countCheckedCheckboxes <= 5)
                {
                    $('#selectedQuestions').text(countCheckedCheckboxes+'/5 questions selected');
                }
                if($(this).prop('checked') == false)
                {        
                        
                    $('#collapseAuto'+chkVal).removeClass('show');
                    $('#collapseAuto'+chkVal).find("input[type='radio']").each(function(){                        
                        $(this).prop('checked',false);
                    });
                    $('#collapseAuto'+chkVal).find("input[type='checkbox']").each(function(){
                        $(this).prop('checked',false);
                    });
                    $(this).prop('checked',false);
                    $("#collapseAuto"+chkVal).css('display','none');
                }
                else
                {
                    console.log('bbbb');  
                    $("#collapseAuto"+chkVal).css('display','block');
                    $('#chkMainAuto'+chkVal).prop('checked',true);
                }                  
                
            }
            else
            {          
                 $('#btnAlert').trigger('click');
            }
            
        });

        $('.questionContainerRec').on('dblclick','.ui-checkbox',function(event)
        {
            
            event.preventDefault();
        });
        
        $('.questionContainerRec').on('click','.ui-checkbox',function()
        {             
            var countCheckedCheckboxes = $('input.mainCheckBox:checkbox:checked').length;
            var chkVal = $(this).val();
            if(countCheckedCheckboxes > 5)
            {
                $("#collapse"+chkVal).css('display','none');
                $(this).prop('checked',false);
                isSelectQuestion = 0;
            } 
            else if(countCheckedCheckboxes <= 5)
            {
                isSelectQuestion = 1;
            }            
            
            if(isSelectQuestion == 1)
            {                 
                if(countCheckedCheckboxes <= 5)
                {
                    $('#selectedQuestions').text(countCheckedCheckboxes+'/5 questions selected');
                }
                if($(this).prop('checked') == false)
                {        
                        
                    $('#collapse'+chkVal).removeClass('show');
                    $('#collapse'+chkVal).find("input[type='radio']").each(function(){                        
                        $(this).prop('checked',false);
                    });
                    $('#collapse'+chkVal).find("input[type='checkbox']").each(function(){
                        $(this).prop('checked',false);
                    });
                    $(this).prop('checked',false);
                    $("#collapse"+chkVal).css('display','none');
                }
                else
                {
                    console.log('bbbb');  
                    $("#collapse"+chkVal).css('display','block');
                    $('#chkMain'+chkVal).prop('checked',true);
                }                  
                
            }
            else
            {          
                 $('#btnAlert').trigger('click');
            }
            
            
        });
        $('.btnPreview').click(function()
        {      
            
            var rdcategory = $('input[name=rdCategory]:checked').val();
            var rdcategoryText = $('input[name=rdCategory]:checked').next('label').text();
            var rdCategoryDiffrent = $('#rdCategoryDiffrent:checked').val();
            var parentText = $("#parent_category_id option:selected").text();
            var childCatId = $('#child_category_id').val();
            var childText = $("#child_category_id option:selected").text();
            var valuesTaks = $("input[name='post_job_task[]']")
              .map(function(){return $(this).val();}).get();

            var valueQualifications =  $("input[name='post_job_qualification[]']")
              .map(function(){return $(this).val();}).get();

             var valueBenifits =  $("input[name='post_job_benifit[]']")
              .map(function(){return $(this).val();}).get();

            var taskhtml = ''
            var qualihtml = '';
            var benifithtml = '';
            if(valuesTaks.length > 0)
            {
                for (var i = 0; i <valuesTaks.length; i++)
                {
                    if(valuesTaks[i] != '')
                    {
                         taskhtml += '<li class="">'+valuesTaks[i]+'</li>';
                    }                   
                }
                $('.divTask').html(taskhtml);
            }
            if(valueQualifications.length > 0)
            {
                for (var i = 0; i <valueQualifications.length; i++)
                {
                    if(valueQualifications[i] != '')
                    {
                        qualihtml += '<li class="">'+valueQualifications[i]+'</li>';
                    }                    
                }
                $('.divQuali').html(qualihtml);
            }
            if(valueBenifits.length > 0)
            {
                for (var i = 0; i <valueBenifits.length; i++)
                {
                    if(valueBenifits[i] != '')
                    {
                        benifithtml += '<li class="">'+valueBenifits[i]+'</li>';
                    }                    
                }
                $('.divBenifits').html(benifithtml);
            }
            var jobString = $('#post_job_description').val();
            $('#job_desc_text').text($(jobString).text());
            console.log('rdCategoryDiffrent '+rdCategoryDiffrent+'  rdcategory '+rdcategory+'  childCatId '+childCatId+' rdcategoryText '+rdcategoryText)
            if(typeof(rdCategoryDiffrent) === "undefined")
            {
                if (typeof(rdcategory) !== "undefined")
                {
                    var splitstring = rdcategoryText.split('>')
                    console.log('text '+splitstring[0])
                    $('#catNameI').text(splitstring[0]);
                    $('#catNameII').text(splitstring[1]);
                }                
            }
            else if(typeof(rdCategoryDiffrent) !== "undefined")
            {
               
                if(typeof(childCatId)  !== "undefined")
                {
                   $('#catNameI').text(parentText);
                   $('#catNameII').text(childText);
                }
            }
            
        });
        function stepOneValidation()
        {
            var title = $('#title').val();
            var location  = $('#location').val();
            var rdcategory = $('input[name=rdCategory]:checked').val();
            var parentcatId = $('#parent_category_id').val();
            var childCatId = $('#child_category_id').val();
            var workType = $('input[name=worktype]:checked').val();
            var estimatedSalary = $('#estimated_salary').val();
            var rdCategoryDiffrent = $('#rdCategoryDiffrent:checked').val();
            
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
        }
        function stepTwoValidation()
        {
            var writeType = $('#write_job_type').val();
            var postJobTask = $('#post_job_task').val();
            var postJobQaulification = $('#post_job_qualification').val();
            var postJobBenifit = $('#post_job_benifit').val();
            var jobdesc = $('#post_job_description').val();
            jobdesc = jobdesc.replace(/(<([^>]+)>)/ig,"");
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
        $('.btnNext1').click(function()
        {            
            stepOneValidation();
        });
        $('.btnNext2').click(function(){
            stepTwoValidation();
        });
        $(function() {
             
              $(".numberType").on("keydown", function(e) {
               
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
        // var editor = CKEDITOR.replace( 'ckdescription', {});
        // editor.setData(this.job_description);
		// editor.on( "pluginsLoaded", function( event )
		// {
		// 	editor.on( 'contentDom', function( evt ) {
		// 		var editable = editor.editable();                   
		// 		editable.attachListener( editable, 'keyup', function( e ) { 
		// 			//this.job_description = e.getData();
        //             this.job_description = this.getData();
        //             $('#post_job_description').val(this.job_description);
                   
		// 		});
		// 	}); 
		// });
        
        $(".tab-content").delegate(".add_button", "click", function(e)
        {           
            var dataId = $(this).attr('data-type');            
            if(dataId == 'task')
            {
                xTask = $('.post_job_task').length;
                if(xTask < maxFieldTask)
                {                    
                    xTask++;
                    $('.taskCount').text(xTask+'/10');
                    let fieldHTML = '<div class="form-group has-feedback"><input autofocus type="text" name="post_job_task[]"  class="form-control addtype post_job_task" data-id="1" placeholder="New Task & Responsibility"><div class="close" data-type="task"><i class="fa fa-close"></i></div></div>';
                    $('.taskContainer').append(fieldHTML);
                    $('.taskContainer input').focus();                    
                }
                if(xTask >= 10)
                {
                    $('#addTask').hide();
                }
                else
                {
                    $('#addTask').show();
                }
            }
            else if(dataId == 'quali')
            {
                xQuali = $('.post_job_qualification').length;
                if(xQuali < maxFieldTask)
                {                       
                    xQuali++;
                    $('.qualiCount').text(xQuali+'/10');
                    let fieldHTML = '<div class="form-group has-feedback"><input autofocus type="text" name="post_job_qualification[]" class="form-control addtype post_job_qualification" data-id="2" placeholder="Qualification & Experience"><div class="close" data-type="quali"><i class="fa fa-close"></i></div></div>';
                    
                    $('.qualiContainer').append(fieldHTML);
                    $('.qualiContainer input').focus();
                }
                if(xQuali >= 10)
                {
                    $('#addQauli').hide();
                }
                else
                {
                    $('#addQauli').show();
                }
            }
            else if(dataId == 'benifit')
            {
                xbenifit = $('.post_job_benifit').length;
                if(xbenifit < maxFieldBenifit)
                {                       
                    xbenifit++;
                    $('.benifitCount').text(xbenifit+'/10');
                    let fieldHTML = '<div class="form-group has-feedback"><input autofocus type="text" name="post_job_benifit[]" class="form-control addtype post_job_benifit" data-id="3" placeholder="New Benefit"><div class="close" data-type="benifit"><i class="fa fa-close"></i></div></div>';
                    $('.benifitContainer').append(fieldHTML);
                    $('.benifitContainer input').focus();
                   
                }
                if(xbenifit >= 10)
                {
                    $('#addBenifit').hide();
                }
                else
                {
                        $('#addBenifit').show();
                }
            }
            
        });

        $(".tab-content").delegate(".addtype", "keypress", function(e)
        {           
            var key = e.which;
            if(key == 13)
            {
                var dataId = parseInt($(this).attr('data-id'));
                if(dataId == 1)
                {
                    xTask = $('.post_job_task').length;
                    if(xTask < maxFieldTask)
                    {                    
                        xTask++;
                        $('.taskCount').text(xTask+'/10');
                        let fieldHTML = '<div class="form-group has-feedback"><input autofocus type="text" name="post_job_task[]"  class="form-control addtype post_job_task" data-id="1" placeholder="New Task & Responsibility"><div class="close" data-type="task"><i class="fa fa-close"></i></div></div>';
                        $('.taskContainer').append(fieldHTML);
                        $('.taskContainer input').focus();
                    }
                    if(xTask >= 10)
                    {
                        $('#addTask').hide();
                    }
                    else
                    {
                        $('#addTask').show();
                    }
                }
                else if(dataId == 2)
                {
                    xQuali = $('.post_job_qualification').length;
                    if(xQuali < maxFieldTask)
                    {                       
                        xQuali++;
                        $('.qualiCount').text(xQuali+'/10');
                        let fieldHTML = '<div class="form-group has-feedback"><input autofocus type="text" name="post_job_qualification[]" class="form-control addtype post_job_qualification" data-id="2" placeholder="Qualification & Experience"><div class="close" data-type="quali"><i class="fa fa-close"></i></div></div>';
                        
                        $('.qualiContainer').append(fieldHTML);
                        $('.qualiContainer input').focus();
                    }
                    if(xQuali >= 10)
                    {
                        $('#addQauli').hide();
                    }
                    else
                    {
                       $('#addQauli').show();
                    }
                }
                else if(dataId == 3)
                {
                    xbenifit = $('.post_job_benifit').length;
                    if(xbenifit < maxFieldBenifit)
                    {                       
                        xbenifit++;
                        $('.benifitCount').text(xbenifit+'/10');
                        let fieldHTML = '<div class="form-group has-feedback"><input autofocus type="text" name="post_job_benifit[]" class="form-control addtype post_job_benifit" data-id="3" placeholder="New Benefit"><div class="close" data-type="benifit"><i class="fa fa-close"></i></div></div>';
                        $('.benifitContainer').append(fieldHTML);
                        $('.benifitContainer input').focus();
                    }
                    if(xbenifit >= 10)
                    {
                        $('#addBenifit').hide();
                    }
                    else
                    {
                         $('#addBenifit').show();
                    }
                }
            }           
        });

        $('body').on('click','.close',function(e)
        {
            var dataId = $(this).attr('data-type');           
            if(dataId == 'task')
            {
                e.preventDefault();
                xTask = $('.post_job_task').length;
                $(this).parent('div').remove(); //Remove field html
                xTask--; //Decrement field counter
                $('.taskCount').text(xTask+'/10');
                console.log('xtask '+xTask)
                if(parseInt(xTask) >= 10)
                {
                   $('#addTask').hide();   
                }
                else
                {
                   $('#addTask').show();
                }
            }
            else if(dataId == 'quali')
            {
                 e.preventDefault();
                xQuali = $('.post_job_qualification').length;
                $(this).parent('div').remove(); //Remove field html
                xQuali--; //Decrement field counter
                 $('.qualiCount').text(xQuali+'/10');
                if(parseInt(xQuali) >= 10)
                {
                   $('#addQauli').hide();   
                }
                else
                {
                   $('#addQauli').show();
                }
            }
            else if(dataId == 'benifit')
            {
                xbenifit = $('.post_job_benifit').length;
                 e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                xbenifit--; //Decrement field counter
                 $('.benifitCount').text(xbenifit+'/10');
                if(parseInt(xbenifit) >= 10)
                {
                   $('#addBenifit').hide();   
                }
                else
                {
                   $('#addBenifit').show();
                }
            } 
           
        });
       
        $('#is_hide_salary').change(function()
        {
            if($(this).prop('checked'))
            {
               $('#payInfoDiv').hide();
            }
            else
            {
                $('#payInfoDiv').show();
            }
        });     
        $(document).ready(function()
        {
            let searchParams = new URLSearchParams(window.location.search);
            var lastshow = searchParams.get('lastshow');

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            var steps = $("fieldset").length;
            setProgressBar(current);
             
            if(lastshow == 1)
            {
                $('.loaderBck').show();                
                setTimeout(function()
                { 
                    $("#progressbar li").eq(3).addClass("active");
                    $('.fieldsteps').hide();               
                    setProgressBar(4);
                    $('#paymentStep').show();
                     $('.loaderBck').hide(); 
                     current = 4; 
                     current_fs = 4;
                     previous_fs = 3;
                }, 3000);
                // let searchParams = new URLSearchParams(window.location.search);
                // var jobId = searchParams.get('jobid');
                // history.replaceState(null, '?jobIdOnChange='+jobId+'', location.href.split("?")[0]);
            }
            
            $(".next").click(function()
            {
                var dataId = $(this).attr('data-id');
                
                var validStep = 0;
                if(parseInt(dataId) == 1)
                {
                    validStep = stepOneValid;
                }
                else if(parseInt(dataId) == 2)
                {
                    validStep = stepTwoValid;
                }
                else if(parseInt(dataId) == 3)
                {
                    validStep = 1;
                }
                else if(parseInt(dataId) == 4)
                {
                    validStep = 1;
                }
                // console.log('validStep '+validStep);
                if(validStep == 1)
                {
                    current_fs = $(this).parent();
                    next_fs = $(this).parent().next();
                   
                    //Add Class Active
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                    //show the next fieldset
                    next_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({opacity: 0}, 
                    {
                        step: function(now) 
                        {
                            // for making fielset appear animation
                            opacity = 1 - now;
                            current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                            });
                            next_fs.css({'opacity': opacity});
                        },
                        duration: 500
                    });
                    setProgressBar(++current);
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    return false;
                }
            });
            $(".previous").click(function()
            {        
                var dataId = $(this).attr('data-id');
                if(dataId == 'laststep')
                {
                    current_fs = $(this).parent().parent().parent().parent().parent().parent();
                    previous_fs = $(this).parent().parent().parent().parent().parent().parent().prev();
                }
                else
                {
                    current_fs = $(this).parent();
                    previous_fs = $(this).parent().prev();
                }
                
                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
                //show the previous fieldset
                previous_fs.show();
                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, 
                {
                    step: function(now) 
                    {
                        // for making fielset appear animation
                        opacity = 1 - now;
                        current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                        });
                        previous_fs.css({'opacity': opacity});
                    },
                    duration: 500
                });
                setProgressBar(--current);
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });
            function setProgressBar(curStep){
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
            .css("width",percent+"%")
            }
            $(".submit").click(function(){
                return false;
            });

            
        });
    },
    methods: {
        alertQuestion()
        {
            this.$confirm(
            {
                message: `You can select max 5 questions!`,
                button: {
                    yes: 'Ok'
                },        
                callback: confirm => {
                    if (confirm)
                    {
                        
                    }
                }
            });
        },
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
          //alert(this.write_job_type);
      },
       changePlan()
       {
        //    if(this.isEditMode == 1)
        //    {
        //        let searchParams = new URLSearchParams(window.location.search);
        //        var jobId = searchParams.get('jobid');
        //        var jobtype = searchParams.get('jobtype');
        //        this.$router.push('/pricing?jobid='+jobId+'&jobtype='+jobtype+'&step=4');
        //    }
        //    else if(this.isEditMode == 0)
        //    {
                
                let myform = document.getElementById('msform'); 
                let formData = new FormData(myform); 
                let searchParams = new URLSearchParams(window.location.search);
                var jobId = searchParams.get('jobid');
                if(jobId)
                {
                    formData.append('jobid',jobId); 
                }
                formData.append('step', 3);   
                axios.post('/api/front/employer/postjob/savePostJobOnPlanChange',formData).then(response => 
                {         
                   console.log(response.data)                       
                   if(response.data.status == 200)
                   {
                      let jobId = response.data.jobid;
                      let jobtype = response.data.jobtype;
                      let step = response.data.step;
                      window.location.replace('/employer/pricing?jobid='+jobId+'&jobtype='+jobtype+'&step=3')
                   }
                   else
                   {
                       this.flashMessage.error({
                                message: 'Post job not saved!',                            
                        });
                   }
                        
                }).catch(error => {
                    if (error.response.status === 422) 
                    {
                        this.laravelErrors = error.response.data.errors || {};
                    }   
                });       
           //}
       },
       checkSubscriptionPackageFront()
       {
           axios.post('/api/front/checkSubscriptionPackageFront').then(response => {
               if(response.data == 0)
               {
                   window.location.replace('/employer/pricing?isPlanAlready=1');
               }
           });
       },
       checkSubscription()
       {
           let searchParams = new URLSearchParams(window.location.search);
           var jobtype = searchParams.get('jobtype');
           var jobid = searchParams.get('jobid');
           var planid = searchParams.get('planid');
           if(jobtype != 'open')
           {
               axios.get('/api/front/employer/postjob/checkSubscription?planid='+planid).then(response => {
               if(response.data.status == 0)
               {
                    this.flashMessage.error({
                            message: 'Please choose a plan before post a job!',                            
                    });
                    if(parseInt(jobid) && jobtype != '')
                    {
                        window.location.replace('/employer/pricing?jobid='+jobid+'&jobtype='+jobtype);                        
                    }
                    else
                    {
                        window.location.replace('/employer/pricing');
                    }
                    
               }
               else if(response.data.status == 2)
               {
                    this.flashMessage.error({
                            message: 'Please login first to post a job!',                            
                    });
                    this.$router.push('/login')
               }
               else if(response.data.status == 200)
               {
                  this.isHavePlan = response.data.isPlan;
                  this.planid = response.data.planid;
               }
             });
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
                axios.get('/api/front/employer/postjob/editPostJob/'+id+'?jobtype='+jobtype).then(response => {    
                    if(response.data != 0)
                    {
                        console.log(response.data)
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
                        $('#post_job_description').val(response.data.job_description);
                        editor.setData(response.data.job_description);
                        if(response.data.write_job_type == 1)
                        {
                            $('#myown').removeClass('active');
                            $('#myad').addClass('active');                       
                        }
                        else if(response.data.write_job_type == 2)
                        {
                            $('#myad').removeClass('active');
                            $('#myown').addClass('active');
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
       getSessionPricing()
       {
           axios.get('/api/front/employer/postjob/getSessionPricing').then(response => {
               this.pricingDetails = response.data;
                console.log(response.data);            
             });
       },
       intBraintree()
       {
            axios.post('/api/front/employer/postjob/getBrainToken').then(response => {
                var button = document.querySelector('#submit-button');
                braintree.dropin.create({
                    authorization: response.data,
                    container: '#dropin-container'
                    }, function (createErr, instance) {
                    button.addEventListener('click', function () {
                        instance.requestPaymentMethod(function (err, payload) {  
                        var urlParams = new URLSearchParams(window.location.search);                    
                        var id = urlParams.get('jobid');  
                        var lastshow = urlParams.get('lastshow');                     
                        let myform = document.getElementById('msform'); 
                        let formData = new FormData(myform);
                        formData.append('step', 4);
                        if(id)
                        {
                            formData.append('jobid', id);                            
                        }   
                        if(lastshow)
                        {
                            formData.append('lastshow', lastshow)
                        }                    
                        formData.append('payload', JSON.stringify(payload));
                        if(!err)
                        {
                            axios.post('/api/front/employer/postjob/payments',formData).then(response => {
                               window.location.href = 'jobs';
                            });
                        }                       
                            
                    });
                    });
                    });
               
            });
       },
       saveDraf(step) {  
          
            $('.btnSaveDraft').prop('disabled', true);          
            let myform = document.getElementById('msform'); 
            let formData = new FormData(myform); 
            var urlParams = new URLSearchParams(window.location.search);                    
            var id = urlParams.get('jobid');
            formData.append('step', step);
            if(this.planid > 0)
            {
                 formData.append('planid', this.planid);
            }
            if(id)
            {    
                formData.append('jobid', id);
            }         
            axios.post('/api/front/employer/postjob/savePostJobAjax',formData).then(response => 
            {                                            
               if(response.data == 1)
               {
                   //console.log(response);
                   window.location.href = 'jobs';
               }
               else if(response.data == 2)
               {
                   this.flashMessage.error({
                            message: 'Post job not found!',                            
                    });
                    $('.btnSaveDraft').prop('disabled', false);
               }
               else
               {                    
                    this.flashMessage.error({
                            message: 'Post job not saved as draf! ',                            
                    });
                    $('.btnSaveDraft').prop('disabled', false);
                  
               }          
            }).catch(error => {
                if (error.response.status === 422) 
                {
                    this.laravelErrors = error.response.data.errors || {};
                    $('.btnSaveDraft').prop('disabled', false);
                }   
            });       
       },        
        checkValidation()
        {
            const valid = this.$refs.observer.validate()
            
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
            console.log(selected)
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
            console.log(questionArray)               
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
        // drpPayMax(event)
        // {
        //      this.payinfo = '€'+$('#pay_range_min').val()+' - €'+event.target.value;
        // },
        getDataParentCategory()
        {
            axios.get('/api/front/getParentCategory').then(response => {                
                this.dataParentCategory = response.data;
            });
            var userData = JSON.parse(localStorage.getItem('authUser'));
            if(userData.company_description)
            {
                this.about_business = userData.company_description;
            }
             
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
            axios.get('/api/front/employer/postjob/getQuestion?jobid='+id).then(response => {
              this.dataQuestions = response.data.question;
              //this.dataPreviousQuestions  = response.data.dataPreviousQuestions;
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
        
    }

}
</script>

<style>
.ck-editor__editable 
{
    min-height: 300px;
}
.ui-helper-hidden-accessible
{
    display: none;
}
</style>
        
    