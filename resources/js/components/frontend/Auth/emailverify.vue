<template>
    <main>
        <div class="loaderBck">
            <span style="marign-top:23%">Please Wait...</span>
            <div class="loader1">Loading...</div>
        </div>
    </main>
</template>

<script>
export default {   
    data()
    {
        return{

        }
    },
    mounted()
    {
        this.emailverify();
    },
    methods: 
    {
        emailverify()
        {
             var email = window.location.href.split('/').pop();
            axios.get('/api/front/emailVerify/'+email).then(response => {
                
               if(response.data.status == 200)
               {
                   localStorage.setItem('authUser', JSON.stringify(response.data.data));
                   $('.loader1').hide();
                    this.flashMessage.success({                                   
                                        message: response.data.message
                                    });
                    if(response.data.role_id == 2)
                    {
                         window.location.replace('/employer/index')
                    }
                    else if(response.data.role_id == 3)
                    {
                         this.$router.push("/candidate/profile");
                    }
                    
               }
               else if(response.data.status == 501)
               {                
                this.flashMessage.error({                                   
                                        message: response.data.message
                                    });
                    this.$router.push('/login');
               }
            });
        }
        
    }
    
}
</script>