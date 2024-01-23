<template>
    <main>
        <adminlogin>
        <div class="col-md-5" style="min-height: 496.8px;margin-top:10%;margin-left:27%" cz-shortcut-listen="true">
        <div class="login-logo">
            <a href="#">Proslipsi Admin</a>
         </div>
        <div class="card">
            <!-- <loading-overlay :active="isLoading" :is-full-page="fullPage" :loader="loader" /> -->
            <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form @submit.prevent="submit" ref="fmr_admin_login">
                <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
                <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email" id="email" v-model="fields.email">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>               
                </div>     
                <div v-if="errors && errors.password" class="text-danger">{{ errors.password[0] }}</div>            
                <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" v-model="fields.password">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>                
                </div>
                <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">                   
                    <label for="remember">
                        
                    </label>
                    </div>
                </div>               
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>               
                </div>
            </form>
           
            </div>
            <!-- /.login-card-body -->
        </div>
        </div>
        </adminlogin>
    </main>
</template>
<script>
	import adminlogin from './layouts/adminlogin.vue'; 
	export default {
         data() {
                    return {
                        fields: {},
                        errors: {},                                  
                    }
                },
            mounted()
            {

                var authUser = localStorage.getItem('authUser');
                console.log(authUser)
                if(authUser)
                {
                    //this.$router.push("/admin/dashboard");
                    window.location.href = '/admin/dashboard';
                }
            },
        methods: 
        {
            submit() {
                
                this.errors = {};
                let formData = new FormData(this.$refs.fmr_admin_login);
                axios.post('/api/admin/loginPost', formData).then(response => {
                        this.fields = {}
                        if(response.data.status == 200)
                        {                            
                            localStorage.setItem('authUser', JSON.stringify(response.data.data));
                            window.location.href = '/admin/dashboard';
                            //this.$router.push("/admin/dashboard");
                        }                        
                        }).catch(error => {
                            if (error.response.status === 422) 
                            {
                                this.errors = error.response.data.errors || {};
                            }
                            if(error.response.status === 501)
                            {
                                this.flashMessage.error({
                                     message: 'Invalid login credentials!',                            
                                });
                            }
                            
                        });
            }
        },
        components:
        {
            adminlogin,
        }
	}
</script>