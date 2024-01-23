<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateLookingInfo extends Model
{
    protected $table = 'candidate_looking_info';

     public function user()
    {
        return $this->belongsTo('App\Models\Users','user_id');
    }
}
