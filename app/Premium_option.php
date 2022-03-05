<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Premium_option extends Model
{

    protected $fillable = [
        'name',
        'level',
        'price',
        'duration',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
