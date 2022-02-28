<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
     protected $fillable = [
         'vote',
         'content',
         'user_review_name',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
