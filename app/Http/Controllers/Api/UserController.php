<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Performance;
use Illuminate\Http\Request;
use App\User;
use App\Review;
use App\Specialization;
use App\Premium_option;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $user = User::with(['reviews','specializations','performances'])->get();

        return response()->json(compact('user'));
    }

    public function specializations()
    {
        $specialization = Specialization::all();

        return response()->json(compact('specialization'));
    }

    public function getDoctorBySpecialization($spec_slug){

        $specialization = Specialization::where('slug', $spec_slug)
        ->with('users.reviews', 'users.premium_options', 'users.specializations')->with(['users.premium_options' => function($query){
            $query->whereDate('user_premium_option.start_date', '<=', Carbon::now()->toDateTimeString())->whereDate('user_premium_option.end_date', '>=', Carbon::now()->toDateTimeString());
        }])->first();
        $premium_users = $specialization->users->sortByDesc(function ($item, $key){
            if($item->premium_options->count() > 0){
                return $item->premium_options[0]->level;
            }else{
                return 1;
            }
        })->values()->all();
        // dd($a);
        $success = true;
        $error = '';

        if(!$specialization){
            $success = false;
            $error = 'Specializzazione inesistente';
        }elseif($specialization && count($specialization->users) === 0){
            $success = false;
            $error = 'Non esistono dottori con questa specializzazione';
        }

        return response()->json(compact('specialization', 'success', 'error','premium_users'));
    }

    public function getDoctorById($slug){

        $doctor_profile = User::where('slug', $slug)->with(['reviews','specializations','performances'])->first();

        return response()->json($doctor_profile);
    }

    public function getPremium()
    {
        $doctors = User::whereHas('premium_options' , function(Builder $query){
            $query->where('premium_option_id', '>', 1);
        })->with(['premium_options', 'reviews', 'specializations'])->paginate(4);

        return response()->json($doctors);
    }

}
