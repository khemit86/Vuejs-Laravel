<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RecordingModel.
 */
class UserCategories extends Model
{
    protected $table = 'user_categories';

    public function institutions() {
        return $this->belongsTo('App\Models\Users', 'user_id');
    }

    public function users() {
        return $this->belongsTo('App\Models\Users', 'user_id');
    }

    public function categories()
    {
        return $this->belongsTo('App\Models\Categories', 'parent_category_id');
    }

}