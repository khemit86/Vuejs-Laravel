<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostJobQualifications extends Model
{
    protected $table = 'post_job_qualifications';

    public function postJob()
    {
        return $this->belongsTo('App\Models\PostJobs','post_job_id');
    }
}
