<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RecordingModel.
 */
class Users extends Model
{
    protected $table = 'users';

    public function country()
    {
        return $this->belongsTo('App\Models\Countries','country_id');
    }

    public function userCategories()
    {
        return $this->hasMany('App\Models\UserCategories','user_id');
    }

    public function userPayments()
    {
        return $this->hasMany('App\Models\Payments','user_id');
    }

    public function candidateLookingInfo()
    {
        return $this->hasMany('App\Models\CandidateLookingInfo','user_id');
    }

    public function candidateSkillInfo()
    {
        return $this->hasMany('App\Models\CandidateSkillInfo','user_id');
    }

    public function candidateWorkInfo()
    {
        return $this->hasMany('App\Models\CandidateWorkInfo','user_id');
    }

    public function userSubscriptionPlans()
    {
        return $this->hasMany('App\Models\UserSubscriptionPlans','user_id');
    }

}