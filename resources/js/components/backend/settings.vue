<template>
    <main>
        <admindashboard>
            <div class="content-header" slot="adminbody" style="margin-left:18%">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">General Settings</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><router-link to="/admin/dashboard">Home</router-link></li>
                        <li class="breadcrumb-item active">Settings</li>
                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <section class="contener" slot="adminbody"  style="margin-left:20%;margin-right:1.5%">
               <div class="row mt-4">
                    <div class="col">
                        <form class="form-horizontal" role="form"  @submit.prevent="submit" ref="frm_settings">
                            <div class="card card-accent-primary">
                                <div class="card-header">
                                <i class="fas fa-cube"></i>
                                General
                                </div>
                                <div class="card-body">
                                <p class="text-muted">All the general settings for application.</p>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group ">
                                            <label for="app_name"> <strong>App Name</strong> (app_name)</label> <span class="text-danger"> <strong>*</strong> </span>
                                            <input type="text" name="app_name" v-model="fields.app_name" class="form-control  " id="app_name" placeholder="App Name" required="">
                                        </div>
                                        <div class="form-group ">
                                            <label for="vat"> <strong>VAT</strong> (vat)</label> <span class="text-danger"> <strong>*</strong> </span>
                                            <input type="text" name="vat" v-model="fields.vat" class="form-control  " id="vat" placeholder="VAT" required="">
                                        </div>
                                         <div class="form-group ">
                                            <label for="question_info"> <strong>Question Info</strong> (question_info)</label> <span class="text-danger"> <strong>*</strong> </span>
                                            <textarea class="form-control" name="question_info" v-model="fields.question_info" id="question_info" placeholder="Question Info" required=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="card card-accent-primary">
                                <div class="card-header">
                                <i class="fas fa-envelope"></i>
                                Email
                                </div>
                                <div class="card-body">
                                <p class="text-muted">Email settings for app</p>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group ">
                                            <label for="email"> <strong>Email</strong> (email)</label> <span class="text-danger"> <strong>*</strong> </span>
                                            <input type="email" name="email" v-model="fields.email" class="form-control  " id="email" placeholder="Email" required="">
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="card card-accent-primary">
                                <div class="card-header">
                                <i class="fas fa-users"></i>
                                Social Profiles
                                </div>
                                <div class="card-body">
                                <p class="text-muted">Link of all the social profiles.</p>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group ">
                                            <label for="facebook_url"> <strong>Facebook Page URL</strong> (facebook_url)</label> <span class="text-danger"> <strong>*</strong> </span>
                                            <input type="text" name="facebook_url" v-model="fields.facebook_url" class="form-control  " id="facebook_url" placeholder="Facebook Page URL" required="">
                                        </div>
                                        <div class="form-group ">
                                            <label for="twitter_url"> <strong>Twitter Profile URL</strong> (twitter_url)</label> <span class="text-danger"> <strong>*</strong> </span>
                                            <input type="text" name="twitter_url" v-model="fields.twitter_url" class="form-control  " id="twitter_url" placeholder="Twitter Profile URL" required="">
                                        </div>
                                        <div class="form-group ">
                                            <label for="instagram_url"> <strong>Instagram Account URL</strong> (instagram_url)</label> <span class="text-danger"> <strong>*</strong> </span>
                                            <input type="text" name="instagram_url" v-model="fields.instagram_url" class="form-control  " id="instagram_url" placeholder="Instagram Account URL" required="">
                                        </div>
                                        <div class="form-group ">
                                            <label for="linkedin_url"> <strong>LinkedIn URL</strong> (linkedin_url)</label> <span class="text-danger"> <strong>*</strong> </span>
                                            <input type="text" name="linkedin_url"  v-model="fields.linkedin_url" class="form-control  " id="linkedin_url" placeholder="LinkedIn URL" required="">
                                        </div>
                                        <div class="form-group ">
                                            <label for="youtube_url"> <strong>Youtube Channel URL</strong> (youtube_url)</label> <span class="text-danger"> <strong>*</strong> </span>
                                            <input type="text" name="youtube_url" v-model="fields.youtube_url" class="form-control  " id="youtube_url" placeholder="Youtube Channel URL" required="">
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="card card-accent-primary">
                                <div class="card-header">
                                <i class="fas fa-globe-asia"></i>
                                Meta 
                                </div>
                                <div class="card-body">
                                <p class="text-muted">Application Meta Data</p>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group ">
                                            <label for="meta_site_name"> <strong>Meta Site Name</strong> (meta_site_name)</label> <span class="text-danger"> <strong>*</strong> </span>
                                            <input type="text" name="meta_site_name" v-model="fields.meta_site_name" class="form-control  " id="meta_site_name" placeholder="Meta Site Name" required="">
                                        </div>
                                        <div class="form-group ">
                                            <label for="meta_description"> <strong>Meta Description</strong> (meta_description)</label> <span class="text-danger"> <strong>*</strong> </span>
                                            <input type="text" name="meta_description" v-model="fields.meta_description" class="form-control  " id="meta_description" placeholder="Meta Description" required="">
                                        </div>
                                        <div class="form-group ">
                                            <label for="meta_keyword"> <strong>Meta Keyword</strong> (meta_keyword)</label> <span class="text-danger"> <strong>*</strong> </span>
                                            <input type="text" name="meta_keyword" v-model="fields.meta_keyword"  class="form-control  " id="meta_keyword" placeholder="Meta Keyword" required="">
                                        </div>
                                        <!-- <div class="form-group ">
                                            <label for="meta_image"> <strong>Meta Image</strong> (meta_image)</label> <span class="text-danger"> <strong>*</strong> </span>
                                            <input type="text" name="meta_image" v-model="fields.meta_image"  class="form-control  " id="meta_image" placeholder="Meta Image" required="">
                                        </div>
                                        <div class="form-group ">
                                            <label for="meta_fb_app_id"> <strong>Meta Facebook App Id</strong> (meta_fb_app_id)</label> 
                                            <input type="text" name="meta_fb_app_id" v-model="fields.meta_fb_app_id" class="form-control  " id="meta_fb_app_id" placeholder="Meta Facebook App Id">
                                        </div>
                                        <div class="form-group ">
                                            <label for="meta_twitter_site"> <strong>Meta Twitter Site Account</strong> (meta_twitter_site)</label> 
                                            <input type="text" name="meta_twitter_site" v-model="fields.meta_twitter_site" class="form-control  " id="meta_twitter_site" placeholder="Meta Twitter Site Account">
                                        </div>
                                        <div class="form-group ">
                                            <label for="meta_twitter_creator"> <strong>Meta Twitter Creator Account</strong> (meta_twitter_creator)</label> 
                                            <input type="text" name="meta_twitter_creator"  v-model="fields.meta_twitter_creator" class="form-control  " id="meta_twitter_creator" placeholder="Meta Twitter Creator Account">
                                        </div> -->
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="card card-accent-primary">
                                <div class="card-header">
                                <i class="fas fa-chart-line"></i>
                                Analytics
                                </div>
                                <div class="card-body">
                                <p class="text-muted">Application Analytics</p>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group ">
                                            <label for="google_analytics"> <strong>Google Analytics</strong> (google_analytics)</label> 
                                            <input type="text" name="google_analytics" v-model="fields.google_analytics" class="form-control  " id="google_analytics" placeholder="Google Analytics">
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="row m-b-md">
                                <div class="col-md-12">
                                <button class="btn-primary btn" style="margin-bottom:15px">
                                <i class="fas fa-save"></i> Save                            </button>
                                </div>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </section>
        </admindashboard>
    </main>
</template>
<script>
export default {
    data(){
        return {
            fields: [],
        }
    },
    mounted()
    {
        this.getRecord();
    },
    methods: {
        getRecord()
        {
            axios.get('/api/admin/settings/index').then(response => {
                console.log(response.data)
               this.fields = response.data;
            });
        },
        submit() 
        {
            this.errors = {};
            let formData = new FormData(this.$refs.frm_settings);
            axios.post('/api/admin/settings/store',formData).then(response => {
                this.flashMessage.success({                                   
                                    message: response.data.message
                                });
            });
        }   
    },
}
</script>