<template>
    <main>
        <div class="mainSearchSection">
            <section class="abcd slider-sec mt-75">
                <div class="banner-img d-none d-sm-none d-md-block d-lg-block d-xl-block"></div>
                <div></div>
                <div class="container">
                    <div class="w3-animate-bottom slider-content">
                        <h1 class="slide-hide-txt">You're just one click away from your dream job!</h1>
                        <p class="slide-hide-txt">Search 176,567 new jobs - 6,845 added in the last 24 hours </p>
                        <form class="slider-form">
                            <div class="form-row row">
                                <div class="form-group col-md-3 col-sm-12 keyword-container">
                                <label>What</label>
                                <input type="text" class="form-control" placeholder="eg. UI Designer
                                ">
                                </div>
                                <div class="form-group col-md-3 col-sm-12 location-container">
                                    <div class="form-group input-icon industries-fields">
                                    <label>Industries</label>
                                    <div class="select-bx class-box lblClasi" id="lblClasi">
                                        <ul>
                                        <li>
                                            <label class="form-check-label lblDrp" for="same-address">Choose Industry</label>
                                            <div class="select-direction">
                                                <span class="selectSpan">
                                                <i class="fa fa-angle-down"></i>
                                                </span>
                                                <div class="right-cros"><img class="default-cross" src="img/cross.svg">
                                                    <img class="show-hover" src="img/crosson-hover.svg"></div>
                                                </div>
                                        </li>
                                        </ul>
                                    </div>
                                        <div class="select-heading-list hide" style="display: none;">
                                        <p style="display:none">{{ childCount = 0 }}</p>
                                            <ul v-if="dataCategory" v-for="(value, key) in dataCategory">       
                                                                
                                                <li class="dropdown mainLi"  :id="'mainLi_'+key" :data-id="key">                                           
                                                <div class="form-check">
                                                <input type="checkbox" class="form-check-input mainChk indChk" :data-id="key" :id="'mainChk_'+key">
                                                <label class="form-check-label" :for="'mainChk_'+key">{{  value.parent.value }}</label>
                                                </div>
                                                <ul class="nestedMenu" :id="'nestedMenu_'+key" style="display: none;" :data-id="key">
                                                    <div class="all-heading">
                                                        <div class="form-check">
                                                        <input type="checkbox" class="form-check-input all indChk" :id="'all_'+key" checked="checked" :data-id="key">
                                                        <label class="form-check-label" :for="'all_'+key">All {{  value.parent.value }}</label>
                                                        <span class="all_count" :id="'all_count_'+key">4217</span>
                                                    </div>
                                                    </div>                                                      
                                                                                                        
                                                        <li v-if="value.child" v-for="(value11, key11) in value.child">
                                                        <div class="form-check">
                                                        <input type="checkbox" class="form-check-input child indChk" :id="`child_${childCount}`" :data-id="`${childCount}`" name="child[]">
                                                        <label class="form-check-label" :data-labelfor="`child_${childCount}`"  :for="`${childCount}`">{{ value11.value }} </label>
                                                        <span :class="`${childCount}`" :id="`child_count_${childCount}`">1014</span>
                                                        <p style="display:none">{{ childCount++ }}</p>
                                                    </div>
                                                    </li>                                                
                                                                                                                  
                                                    </ul>
                                                    </li>
                                                        
                                            </ul>
                                        </div>
                                        <!-- <label>Industries</label>
                                        <select multiple data-style="bg-white rounded-pill px-4 py-3 shadow-sm " class="selectpicker w-100" id="drpIndrusty" title="Choose Industry">
                                            <option id="accouting" value="">Accounting</option>                 
                                            <option class="accouting hider padd" style="display:none">Account Officer/Clerks</option>
                                            

                                        </select> -->
                                    </div>
                                </div>
                                <div class="form-group col-md-3 col-sm-12 location-container choose-location-list">
                                    <div class="form-group input-icon industries-fields">
                                    <label>Where</label>
                                    <div class="select-bx class-box lblLocation" id="lblLocation">
                                        <ul>
                                        <li>
                                            <label class="form-check-label lblDrpLocation" for="same-address">Choose Location</label>
                                            <div class="select-direction">
                                                <span class="selectSpan1">
                                                <i class="fa fa-angle-down"></i>
                                                </span>
                                                <div class="right-cros1"><img class="default-cross" src="img/cross.svg">
                                                    <img class="show-hover" src="img/crosson-hover.svg"></div>
                                        </div>
                                        </li>
                                        </ul>
                                    </div>
                                        <div class="locationList hide" style="display: none;">
                                            <ul>			                  	 
                                                <li class="dropdown mainLi1" id="mainLi1_1" data-id="1">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input mainChk1 locChk" data-id="1" id="mainChk1_1">
                                                    <label class="form-check-label" for="mainChk1_1">Nicosia</label>
                                                </div>							          
                                            </li>
                                            <li class="dropdown mainLi1" id="mainLi1_2" data-id="2">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input mainChk1 locChk" data-id="2" id="mainChk1_2">
                                                    <label class="form-check-label" for="mainChk1_2">Larnaca</label>
                                                </div>							          
                                            </li>
                                            <li class="dropdown mainLi1" id="mainLi1_3" data-id="3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input mainChk1 locChk" data-id="3" id="mainChk1_3">
                                                    <label class="form-check-label" for="mainChk1_3">Limassol</label>
                                                </div>							          
                                            </li>
                                            <li class="dropdown mainLi1" id="mainLi1_4" data-id="4">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input mainChk1 locChk" data-id="4" id="mainChk1_4">
                                                    <label class="form-check-label" for="mainChk1_4">Paphos</label>
                                                </div>							          
                                            </li>
                                            <li class="dropdown mainLi1" id="mainLi1_5" data-id="5">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input mainChk1 locChk" data-id="5" id="mainChk1_5">
                                                    <label class="form-check-label" for="mainChk1_5">Famagusta</label>
                                                </div>							          
                                            </li>

                                            </ul>
                                        </div>							
                                    </div>
                                </div>
                                <div class="form-group  col-xs-12 col-sm-12 col-md-3 serach-btn-slider">
                                    <label>&nbsp;</label>
                                    <p id="searchJob" @click="search" class="btn calc-btn"> Search Jobs</p>
                                </div>
                            </div>
                        </form>
                        <span class="trend-span slide-hide-txt">Trending Keyword:  ui designer, developer, it company, design, call center</span>
                    </div>
                </div>

            <div class="job-search-container">
            <div class="">
            <div class="filter-bar">
                <div class="accordion" id="accordionExample">
                    <div class="row mx-0 ">
                    <div class="card-header col" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#job1" aria-expanded="true" aria-controls="job1">
                            All Work Types
                            </button>
                        </h5>
                    </div>
                <div class="card-header col" id="headingTwo">
                    <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#job2" aria-expanded="false" aria-controls="job2">
                    Salary Estimate
                    </button>
                    </h5>
                </div>
                <div class="card-header col" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#job3" aria-expanded="false" aria-controls="job3">
                        Date Posted
                        </button>
                    </h5>
                </div>
                <div class="card-header col" id="headingFour">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#job4" aria-expanded="false" aria-controls="job4">
                        Experience Level
                        </button>
                    </h5>
                </div>
                </div>
                <div class="card-description">
                <div id="job1" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <ul class="work-type">
                            <li>
                                <span class="radio_yes-1">
                                    <input type="checkbox" class="predefine_img" name="predefine-img2" checked="checked">
                                    <span>Full Time</span>
                                </span>
                            </li>
                            <li>
                                <span class="radio_yes-1">
                                    <input type="checkbox" class="predefine_img" name="predefine-img2">
                                    <span>Part Time</span>
                                </span>
                            </li>
                            <li>
                                <span class="radio_yes-1">
                                    <input type="checkbox" class="predefine_img" name="predefine-img2">
                                    <span>Temporary</span>
                                </span>
                            </li>
                            <li>
                                <span class="radio_yes-1">
                                    <input type="checkbox" class="predefine_img" name="predefine-img2">
                                    <span>Contract</span>
                                </span>
                            </li>
                            <li>
                                <span class="radio_yes-1">
                                    <input type="checkbox" class="predefine_img" name="predefine-img2">
                                    <span>Internship</span>
                                </span>
                            </li>
                        </ul>
                </div>
                </div>
                <div id="job2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <ul class="paying">
                        <li>
                            <span class="radio_yes-1">
                                <input type="radio" class="predefine_radio" name="paying-start" checked="true">
                                <span>up to €10K</span>
                            </span>
                        </li>
                        <li>
                            <span class="radio_yes-1">
                                <input type="radio" class="predefine_radio" name="paying-start">
                                <span>up to €15K</span>
                            </span>
                        </li>
                        <li>
                            <span class="radio_yes-1">
                                <input type="radio" class="predefine_radio" name="paying-start">
                                <span>up to €20K</span>
                            </span>
                        </li>
                        <li>
                            <span class="radio_yes-1">
                                <input type="radio" class="predefine_radio" name="paying-start">
                                <span>up to €25K</span>
                            </span>
                        </li>
                        <li>
                            <span class="radio_yes-1">
                                <input type="radio" class="predefine_radio" name="paying-start">
                                <span>up to €30K</span>
                            </span>
                        </li>
                        <li>
                            <span class="radio_yes-1">
                                <input type="radio" class="predefine_radio" name="paying-start">
                                <span>up to €35K</span>
                            </span>
                        </li>
                        <li>
                            <span class="radio_yes-1">
                                <input type="radio" class="predefine_radio" name="paying-start">
                                <span>up to €40K</span>
                            </span>
                        </li>
                        <li>
                            <span class="radio_yes-1">
                                <input type="radio" class="predefine_radio" name="paying-start">
                                <span>over €40K</span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            </div>
            <div id="job3" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                <ul class="work-type listed-today">
                    <li>
                        <span class="radio_yes-1">
                            <input type="radio" class="predefine_radio" name="predefine-img2" checked="true">
                            <span>Any Time</span>
                        </span>
                    </li>
                    <li>
                        <span class="radio_yes-1">
                            <input type="radio" class="predefine_radio" name="predefine-img2">
                            <span>Today</span>
                        </span>
                    </li>
                    <li>
                        <span class="radio_yes-1">
                            <input type="radio" class="predefine_radio" name="predefine-img2">
                            <span>Last 3 days</span>
                        </span>
                    </li>
                    <li>
                        <span class="radio_yes-1">
                            <input type="radio" class="predefine_radio" name="predefine-img2">
                            <span>Last 7 days</span>
                        </span>
                    </li>
                    <li>
                        <span class="radio_yes-1">
                            <input type="radio" class="predefine_radio" name="predefine-img2">
                            <span>Last 14 days</span>
                        </span>
                    </li>
                    <li>
                        <span class="radio_yes-1">
                            <input type="radio" class="predefine_radio" name="predefine-img2">
                            <span>Last 30 days</span>
                        </span>
                    </li>
                </ul>
            </div>
            </div>
            <div id="job4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <ul class="work-type listed-today">
                        <li>
                            <span class="radio_yes-1">
                                <input type="radio" class="predefine_radio" name="predefine-img2" checked="true">
                                <span>Entry Level</span>
                            </span>
                        </li>
                        <li>
                            <span class="radio_yes-1">
                                <input type="radio" class="predefine_radio" name="predefine-img2">
                                <span>Mid Level</span>
                            </span>
                        </li>
                        <li>
                            <span class="radio_yes-1">
                                <input type="radio" class="predefine_radio" name="predefine-img2">
                                <span>Senior Level</span>
                            </span>
                        </li>
                </ul>
                </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </section>
        </div>
        
    </main>
</template>
<script>
export default {
    data()
    {
        return{
            dataCategory: [],
        }
    },
    mounted(){
        this.getCategory();
    },
    methods:
    {
        getCategory() {
           axios.get('/api/front/getCategory')
                .then( (response) => { 
                 this.dataCategory = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            search()
            {
                let self = this;
                $('.loaderBck').show();               
                setTimeout(function(){
                 $('.loaderBck').hide();
                 $('.slider-animation').slideUp( 300 ).delay( 500 ).fadeOut( 400 );                
                 self.$router.push("/search");
                }, 500);
              
                
            },
    },
}
</script>