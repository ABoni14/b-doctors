<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'email',
        'content',
        'first_name',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
