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
        ->with('users.reviews', 'users.premium_options')->first();

        $success = true;
        $error = '';

        if(!$specialization){
            $success = false;
            $error = 'Specializzazione inesistente';
        }elseif($specialization && count($specialization['users']) === 0){
            $success = false;
            $error = 'Non esistono dottori con questa specializzazione';
        }

        return response()->json(compact('specialization', 'success', 'error'));
    }

    public function getDoctorById($slug){

        $doctor_profile = User::where('slug', $slug)->with(['reviews','specializations','performances'])->first();

        return response()->json($doctor_profile);
    }

    // public function getPremium(){

    //     $doctors = Premium_option::where('id', '>', 1)->with('users.specializations', 'users.performances')->paginate(5);

    //     return response()->json($doctors);
    // }

    public function getPremium()
    {
        $doctors = User::whereHas('premium_options' , function(Builder $query){
            $query->where('premium_option_id', '>', 1);
        })->with(['premium_options', 'reviews'])->paginate(4);

        return response()->json($doctors);
    }

    public function getDoctorByPerformance($slug_performance){

        $performance = Performance::where('slug', $slug_performance)->first();
        $success = true;
        $error = '';
        if(!$performance){
            $success = false;
            $error = 'Performance inesistente';
        }elseif($performance && count($performance['users']) === 0){
            $success = false;
            $error = 'Non ci sono dottori con queste performance';
        }

        return response()->json(compact('success', 'performance', 'error'));

    }


}
