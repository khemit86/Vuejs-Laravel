<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateSkillInfo extends Model
{
    protected $table = 'candidate_skill_info';

    public function user()
    {
        return $this->belongsTo('App\Models\Users','user_id');
    }
}
