<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostJobTasks extends Model
{
    protected $table = 'post_job_tasks';
    
    public function postJob()
    {
        return $this->belongsTo('App\Models\PostJobs','post_job_id');
    }
   
}
