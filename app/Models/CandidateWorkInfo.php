<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateWorkInfo extends Model
{
    protected $table = 'candidate_work_info';

    public function user()
    {
        return $this->belongsTo('App\Models\Users','user_id');
    }
}
