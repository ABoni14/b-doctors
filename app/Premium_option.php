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

    public static function premium_option_duration($currentDate, $optionDuration)
    {
        $durationToAdd = $optionDuration;
       $data = $currentDate->add(new \DateInterval('PT{$durationToAdd}H'));

       $data->format('Y-m-d H:i:s');
       return $data;
    }
}
