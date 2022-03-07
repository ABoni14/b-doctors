<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Premium_option extends Model
{

    protected $table = 'premium_options';

    protected $fillable = [
        'name',
        'level',
        'price',
        'duration',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_premium_option');
    }
}
