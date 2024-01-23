<template>
    
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  
            <!-- <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
            </ul> -->

        
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link"  @click.prevent="logout" style="cursor:pointer">
                <i class="nav-icon fa fa-power-off"></i>
                <span>Logout</span>
                </a>
            </li>
            </ul>
        </nav>
    
</template>

<script>
export default {
    data()
    {
        return {
            
        }
    },
    methods:
    {
        logout(){
            axios.post('/api/admin/logout').then((res)=>{
               const authUser = JSON.parse(localStorage.getItem('authUser'));
                if(authUser)
                {
                    localStorage.removeItem('authUser');
                }
               this.$router.push("/admin/login");
            });
        }
    }

}
</script>