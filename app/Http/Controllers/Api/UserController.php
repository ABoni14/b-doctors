<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Review;
use App\Specialization;

class UserController extends Controller
{
    public function index()
    {
        $user = User::with(['reviews','specializations','performances'])->get();

        return response()->json(compact('user'));
    }

    public function getDoctorBySpecialization($spec_slug){

        $specialization = Specialization::where('slug', $spec_slug)->with('users')->first();

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


}
