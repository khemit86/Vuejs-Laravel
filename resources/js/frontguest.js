/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
import FlashMessage from '@smartweb/vue-flash-message';
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
import * as VeeValidate from 'vee-validate';
import "./frontvalidation.js";
import { ValidationProvider, ValidationObserver } from "vee-validate";
import Autocomplete from 'v-autocomplete';
import 'v-autocomplete/dist/v-autocomplete.css';
import 'jquery-ui/ui/widgets/autocomplete.js';
import CKEditor from '@ckeditor/ckeditor5-vue2';
import VueConfirmDialog from 'vue-confirm-dialog';



Vue.use(Autocomplete);
 Vue.use('CKEditor',CKEditor);
Vue.component('ValidationProvider', ValidationProvider);
Vue.component('ValidationObserver', ValidationObserver);
Vue.component('loading-overlay', Loading)
Vue.use(FlashMessage);
Vue.use(VeeValidate);
Vue.use(VueRouter);
Vue.use(VueConfirmDialog)
Vue.component('vue-confirm-dialog', VueConfirmDialog.default);

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('homelayout', require('./components/frontend/layouts/homelayout.vue').default);
Vue.component('homewithsliderlayout', require('./components/frontend/layouts/homewithsliderlayout.vue').default);
Vue.component('login', require('./components/frontend/layouts/login.vue').default);
const routes = 
[
    { name: 'home', path: '/', component: require('./components/frontend/home.vue').default, meta:{requiresVisitor: true}, },
    {
      name: 'frontlogin', 
      path: '/login',
      component: require('./components/frontend/Auth/login.vue').default,
      meta:{requiresVisitor: true},
    },
    {
      name: 'candidateregister', 
      path: '/candidate_register',
      component: require('./components/frontend/Auth/candidate_register.vue').default,
      meta:{requiresVisitor: true},
    },
    {
      name: 'employerregister', 
      path: '/employer_register',
      component: require('./components/frontend/Auth/employer_register.vue').default,
      meta:{requiresVisitor: true},
    },
    {
      name: 'frontforgot', 
      path: '/forgot',
      component: require('./components/frontend/Auth/forgot.vue').default,
      meta:{requiresVisitor: true},
    },
    {
      name: 'resetpasword', 
      path: '/resetPassword/:email',
      component: require('./components/frontend/Auth/resetpassword.vue').default,
      meta:{requiresVisitor: true},
    },
    {
      name: 'emailverify', 
      path: '/emailverify/:email',
      component: require('./components/frontend/Auth/emailverify.vue').default,
      meta:{requiresVisitor: true},
    },    
    {
      name: 'otpverify', 
      path: '/otpverify',
      component: require('./components/frontend/Auth/otpverify.vue').default,
      meta:{requiresVisitor: true},
    },
    {
      name: 'search', 
      path: '/search',
      component: require('./components/frontend/search.vue').default,
      meta:{requiresVisitor: true},
    },
    {
      name: 'jobdetails', 
      path: '/job_details',
      component: require('./components/frontend/job_details.vue').default,
      meta:{requiresVisitor: true},
    },
    {
      name: 'pricing', 
      path: '/pricing',
      component: require('./components/frontend/pricing.vue').default,
      meta:{requiresVisitor: true},
    },
    {
      name: 'profile', 
      path: '/candidate/profile',
      component: require('./components/frontend/Candidate/Profile/profile.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'edit_details', 
      path: '/candidate/account/edit_details',
      component: require('./components/frontend/Candidate/Account/edit_details.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'addworkexperiance', 
      path: '/candidate/profile/add_work_exp',
      component: require('./components/frontend/Candidate/Profile/add_work_exp.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'editworkexperiance', 
      path: '/candidate/profile/edit_work_exp/:id',
      component: require('./components/frontend/Candidate/Profile/edit_work_exp.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'addcv', 
      path: '/candidate/profile/add_cv',
      component: require('./components/frontend/Candidate/Profile/add_cv.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'addskill', 
      path: '/candidate/profile/add_skills',
      component: require('./components/frontend/Candidate/Profile/add_skills.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'addinfo', 
      path: '/candidate/profile/candidate_info',
      component: require('./components/frontend/Candidate/Profile/candidate_info.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },

    

    //////////        Employer Pages    \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

    
    {
      name: 'postjob', 
      path: '/employer/postjob',
      component: require('./components/frontend/Employers/postjob.vue').default,
      meta:{requiresVisitor: false,requiresAuth: true},
    },

    // { 
    //   path: '/employer',
    //   meta:{requiresVisitor: true},
    //   children: [
    //     {
    //       path: '/postjob',
    //       component: require('./components/frontend/Employers/postjob.vue').default,
    //       meta:{requiresVisitor: true},
    //     },
    //   ]
    // }
]

  const router = new VueRouter({
    mode: "history",
    routes,
    
  })


  router.beforeEach((to, from, next) =>
  {    
    if (to.matched.some(record => record.meta.requiresAuth)) 
    {
      axios.post('/api/front/checkAuth').then((res)=>
      {
        
         if(res.data.status === 501)
         {
            localStorage.removeItem('authUser');            
         }
         else if(res.data.status === 200)
         {                   
            localStorage.setItem('authUser', JSON.stringify(res.data.data));
         }
      });
    }
    else
    {
      next();
    }
    
      //loader.loaderStart();     
      const isLogged = JSON.parse(localStorage.getItem('authUser'));     
      if (isLogged) 
      {        
        if(to.path == '/candidate_register' || to.path == '/employer_register' || to.path == '/login' || to.path == '/forgot' || to.path == '/otpverify' || to.path == '/emailverify' )
        {
          next('/');
        }
        else
        {
          next();
        }
      }
      else
      {
        
        if(to.meta.requiresVisitor)
        {          
           next();      
        }
        else
        {
          next('/login?url='+to.path);          
        }        
      }
  })

  
  
const app = new Vue({
    el: '#app',
    router,
    
});

//// Tooltip ///////////////////
$(() => {
  $('#app').tooltip({
    selector: '[data-toggle="tooltip"]'
  })
})
