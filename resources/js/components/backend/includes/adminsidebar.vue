<template>
    
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/img/backend-logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Proslipsi Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/img/default-avatar.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <router-link to="/admin/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </router-link>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                User Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/admin/candidate/index" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Candidates</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/admin/employer/index" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Employer</p>
                </router-link>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <router-link to="/admin/job/index" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Jobs</p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/admin/category/index" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Category</p>
            </router-link>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Pricing Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/admin/subscription/index" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Subscription Plans</p>
                </router-link>
              </li>
               <li class="nav-item">
                <router-link to="/admin/subscription/singlejob" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Single Job</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/admin/addons/index" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Addons</p>
                </router-link>
              </li>
            </ul>
          </li>

           <li class="nav-item">
            <router-link to="/admin/payment/index" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Payments</p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/admin/question/index" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
             <p>Questions</p>
            </router-link>
          </li>


          <li class="nav-item">
            <router-link to="/admin/discount/index" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
             <p>Discount Management</p>
            </router-link>
          </li>
          
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Post Job Questions
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/admin/question/index" class="nav-link">
                   <i class="nav-icon fa fa-cog"></i>
                  <p>Questions</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/admin/option/index" class="nav-link">
                   <i class="nav-icon fa fa-cog"></i>
                  <p>Question Options</p>
                </router-link>
              </li>
            </ul>
          </li> -->

          <li class="nav-item">
            <router-link to="/admin/settings" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>Settings</p>
            </router-link>
          </li>
           
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
    
</template>
<script>

export default {
  data()
  {
     return {

     }
  },
  mounted()
  {
    var url = window.location.href;
    $('ul.nav-sidebar a').filter(function () {
       console.log('ab')
        return this.href == url;
    }).addClass('active');

       $('ul.nav-treeview a').filter(function () {
         console.log('bbb')
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview")
        .css({'display': 'block'})
        .addClass('menu-open').prev('a')
        .addClass('active');

    //  $('.has-treeview').click(function(e)
    //  {  
              
    //        if($(this).hasClass('menu-open'))
    //         {            
    //           $(this).removeClass('menu-open')
    //         }
    //         else
    //         {                  
    //           $(this).addClass('menu-open');
    //         }
          
        
    //  });
    // let recaptchaScript = document.createElement('script')
    //   recaptchaScript.setAttribute('src', 'http://localhost/proslipsi_vue/public/backend/js/adminlte.js')
    //   document.head.appendChild(recaptchaScript)

      
  
  },
  created() {
      // window.addEventListener('beforeunload', function(event) {
      //    localStorage.setItem('isLoadPage',1)
      // })

      // window.onbeforeunload = function(event) {
      //  event.returnValue = 'page close'
      // }
      // window.onbeforeunload = function() {
      //         localStorage.setItem("isLoadPage", $('#inputName').val());
      //     };
    },
}
</script>