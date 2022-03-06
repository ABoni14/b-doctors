<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Message;
use App\Performance;
use App\Premium_option;
use App\Review;
use App\Specialization;
use App\User;
use Illuminate\Http\Request;


class PremiumController extends Controller
{
    public function index(){
        // $user_premium = User::with('specializations', 'premium_options')
        // ->join('user_premium_option', 'user_premium_option.user_id', '=', 'user_id')->get();
        // ->join('premium_options', 'premium_options.id', '=', 'user_premium_option.premium_option_id')->first();


        $level = 1;
        $premium_option = Premium_option::where( 'id', 'premium_option_id')
                                        // ->min($level)
                                        ->with('user_id')
                                        ->get();
                                        

        return response()->json(compact('premium_option'));


    }
}
