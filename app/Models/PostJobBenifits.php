<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostJobBenifits extends Model
{
    protected $table = 'post_job_benifits';

    public function postJob()
    {
        return $this->belongsTo('App\Models\PostJobs','post_job_id');
    }
}
