<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    public function post_owner()
    {
        return $this->belongsTo('App\User');
    }
}
