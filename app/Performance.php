<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{

    protected $table = 'performances';

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}

