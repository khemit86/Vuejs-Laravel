<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostJobs extends Model
{
    protected $table = 'post_jobs';

    public function postJobUser()
    {
        return $this->belongsTo('App\Models\Users','user_id');
    }

    public function postJobTasks()
    {
        return $this->hasMany('App\Models\PostJobTasks','post_job_id');
    }

    public function postJobBenifits()
    {
        return $this->hasMany('App\Models\PostJobBenifits','post_job_id');
    }

    public function postJobQualifications()
    {
        return $this->hasMany('App\Models\PostJobQualifications','post_job_id');
    }

    public function postJobQuestions()
    {
        return $this->hasMany('App\Models\PostJobQuestions','post_job_id');
    }

    public function postJobCategory()
    {
        return $this->belongsTo('App\Models\Categories','category_id');
    }

    public function userSubscriptionPlan()
    {
        return $this->belongsTo('App\Models\UserSubscriptionPlans','user_subscription_plan_id');
    }
    
}
