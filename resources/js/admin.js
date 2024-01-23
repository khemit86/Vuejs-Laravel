/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
import FlashMessage from '@smartweb/vue-flash-message';
import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';
import loader from "./loader";
import 'jquery-ui/ui/widgets/autocomplete.js';
// import DateRangePicker from 'vue-mj-daterangepicker'
// import 'vue-mj-daterangepicker/dist/vue-mj-daterangepicker.css'

Vue.use(FlashMessage);
Vue.use(VueRouter);
// Vue.use(DateRangePicker);
Vue.component('VueCtkDateTimePicker', VueCtkDateTimePicker);
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('admindashboard', require('./components/backend/layouts/admindashboard.vue').default);


const routes = [
    {
       name: 'login', 
       path: '/admin/login', 
       component: require('./components/backend/login.vue').default,
       meta:{requiresVisitor: true},
    },
    {
      
      path: '/admin', 
      component: require('./components/backend/login.vue').default,
      meta:{requiresVisitor: true},
   },
    {
      name: 'dashboard',
      path: '/admin/dashboard', 
      component: require('./components/backend/dashboard.vue').default,  
      // beforeEnter: (to, from, next) => {
      //   axios.get('/api/admin/checkAuth').then((res)=>
      //   {
      //     console.log('abcd')
      //     next();
      //   }).catch(()=>
      //   {
      //     console.log('eeeeeeeeeeeee')
      //     next({ name: 'login' })
      //   });
      // }
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'candidatelist', 
      path: '/admin/candidate/index',
      params: true, 
      component: require('./components/backend/Candidate/index.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'candidateadd',
      path: '/admin/candidate/add',
      component: require('./components/backend/Candidate/add.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'candidateview',
      path: '/admin/candidate/view/:id',
      component: require('./components/backend/Candidate/view.vue').default,
      params: true,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'candidateedit',
      path: '/admin/candidate/edit/:id',
      component: require('./components/backend/Candidate/edit.vue').default,
      params: true,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'employerlist', 
      path: '/admin/employer/index',
      params: true, 
      component: require('./components/backend/Employer/index.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'employeradd',
      path: '/admin/employer/add',
      component: require('./components/backend/Employer/add.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'employerview',
      path: '/admin/employer/view/:id',
      component: require('./components/backend/Employer/view.vue').default,
      params: true,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'employereedit',
      path: '/admin/employer/edit/:id',
      component: require('./components/backend/Employer/edit.vue').default,
      params: true,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'categorylist',
      path: '/admin/category/index',
      component: require('./components/backend/Category/index.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'categoryadd',
      path: '/admin/category/add',
      component: require('./components/backend/Category/add.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'categoryedit',
      path: '/admin/category/edit/:id',
      component: require('./components/backend/Category/edit.vue').default,
      params: true,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'subscriptionlist',
      path: '/admin/subscription/index',
      component: require('./components/backend/Subscription/index.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'subscriptionadd',
      path: '/admin/subscription/add',
      component: require('./components/backend/Subscription/add.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'subscriptionedit',
      path: '/admin/subscription/edit/:id',
      component: require('./components/backend/Subscription/edit.vue').default,
      params: true,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'singlejob',
      path: '/admin/subscription/singlejob',
      component: require('./components/backend/Subscription/singlejob.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'addonsindex',
      path: '/admin/Addons/index',
      component: require('./components/backend/Addons/index.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'addonsadd',
      path: '/admin/Addons/edit/:id',
      component: require('./components/backend/Addons/edit.vue').default,
      params: true,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'settings',
      path: '/admin/settings',
      component: require('./components/backend/settings.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'questionlist',
      path: '/admin/question/index',
      component: require('./components/backend/Questions/index.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'questioncategoryadd',
      path: '/admin/question/add',
      component: require('./components/backend/Questions/add.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'questioncategoryedit',
      path: '/admin/question/edit/:id',
      component: require('./components/backend/Questions/edit.vue').default,
      params: true,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'dicountindex',
      path: '/admin/discount/index',
      component: require('./components/backend/Discount/index.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'discountadd',
      path: '/admin/discount/add',
      component: require('./components/backend/Discount/add.vue').default,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'discountdit',
      path: '/admin/discount/edit/:id',
      component: require('./components/backend/Discount/edit.vue').default,
      params: true,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'jobindex',
      path: '/admin/job/index',
      component: require('./components/backend/Jobs/index.vue').default,
      params: true,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'jobadd',
      path: '/admin/job/add',
      component: require('./components/backend/Jobs/add.vue').default,
      params: true,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'jobedit',
      path: '/admin/job/edit',
      component: require('./components/backend/Jobs/edit.vue').default,
      params: true,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'jobview',
      path: '/admin/job/view/:id',
      component: require('./components/backend/Jobs/view.vue').default,
      params: true,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'paymentindex',
      path: '/admin/payment/index',
      component: require('./components/backend/Payments/index.vue').default,
      params: true,
      meta:{requiresVisitor: false, requiresAuth: true},
    },
    {
      name: 'paymentview',
      path: '/admin/payment/view/:id',
      component: require('./components/backend/Payments/view.vue').default,
      params: true,
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
       axios.post('/api/admin/checkAuth').then((res)=>
      {
         if(res.data.status === 501)
         {
            localStorage.removeItem('authUser');
            const isLogged = JSON.parse(localStorage.getItem('authUser'));
            console.log(isLogged)
         }
      });

    }
    else
    {
      next();
    }
    
      //loader.loaderStart();     
      const isLogged = JSON.parse(localStorage.getItem('authUser'));
      console.log(isLogged)
      if (isLogged) 
      {
        setTimeout(() => {              
        }, 100);       
        next();
      }
      else
      {
        if(to.meta.requiresVisitor)
        {         
          next();         
        }
        else
        {
          next('/admin/login');          
        }        
      }
  })

//   router.afterEach((to, from) => {
//     loader.loaderEnd();
//  });
  
const app = new Vue({
    el: '#app',
    router
});
