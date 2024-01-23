/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
import FlashMessage from '@smartweb/vue-flash-message';

import * as VeeValidate from 'vee-validate';
import "./frontvalidation.js";
import { ValidationProvider, ValidationObserver } from "vee-validate";
import Autocomplete from 'v-autocomplete';
import 'v-autocomplete/dist/v-autocomplete.css';
import 'jquery-ui/ui/widgets/autocomplete.js';
import CKEditor from '@ckeditor/ckeditor5-vue2';
import moment from 'moment';
import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';
import VueConfirmDialog from 'vue-confirm-dialog';

Vue.use(Autocomplete);
 Vue.use('CKEditor',CKEditor);
Vue.component('ValidationProvider', ValidationProvider);
Vue.component('ValidationObserver', ValidationObserver);

Vue.use(FlashMessage);
Vue.use(VeeValidate);
Vue.use(VueRouter);
Vue.use(VueConfirmDialog)
Vue.component('VueCtkDateTimePicker', VueCtkDateTimePicker);
Vue.component('vue-confirm-dialog', VueConfirmDialog.default);
Vue.config.productionTip = false
Vue.filter('formatDate', function(value) {
  if (value) {

    return moment(String(value)).format('DD-MM-YYYY')

  }

});

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('employerlayout', require('./components/frontend/layouts/employerlayout.vue').default);
const routes = 
[   
  
    {
      name: 'dashboard', 
      path: '/employer/index',
      component: require('./components/frontend/Employers/index.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    }, 
    {
      name: 'profile', 
      path: '/employer/profile',
      component: require('./components/frontend/Employers/profile.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    }, 
    {
      name: 'jobs', 
      path: '/employer/jobs',
      component: require('./components/frontend/Employers/jobs.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },  
    {
      name: 'questionindex', 
      path: '/employer/question/index',
      component: require('./components/frontend/Employers/Questions/index.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    }, 
    {
      name: 'questionadd', 
      path: '/employer/question/add',
      component: require('./components/frontend/Employers/Questions/add.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },  
    {
      name: 'questionedit', 
      path: '/employer/question/edit/:id',
      component: require('./components/frontend/Employers/Questions/edit.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },  
    {
      name: 'optionindex', 
      path: '/employer/option/index',
      component: require('./components/frontend/Employers/Options/index.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    }, 
    {
      name: 'optionadd', 
      path: '/employer/option/add',
      component: require('./components/frontend/Employers/Options/add.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },  
    {
      name: 'optionedit', 
      path: '/employer/option/edit/:id',
      component: require('./components/frontend/Employers/Options/edit.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },   

    {
      name: 'subscriptionindex', 
      path: '/employer/subscription/index',
      component: require('./components/frontend/Employers/Subscriptions/index.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'subscriptionview', 
      path: '/employer/subscription/view/:id',
      component: require('./components/frontend/Employers/Subscriptions/view.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'transactoinindex', 
      path: '/employer/transaction/index',
      component: require('./components/frontend/Employers/Transactions/index.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },

    {
      name: 'pricing', 
      path: '/employer/pricing',
      component: require('./components/frontend/Employers/pricing.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },

    {
      name: 'payment', 
      path: '/employer/payment',
      component: require('./components/frontend/Employers/payment.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },

    {
      name: 'add_addon', 
      path: '/employer/add_addon',
      component: require('./components/frontend/Employers/add_addon.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
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
        if(to.path == '/employer_register' || to.path == '/login' || to.path == '/forgot')
        {
          next('/employer/index');
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
    el: '#appEmployer',
    router,
    
});

//// Tooltip ///////////////////
$(() => {
  $('#appEmployer').tooltip({
    selector: '[data-toggle="tooltip"]'
  })
})
