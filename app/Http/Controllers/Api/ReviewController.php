<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $success = true;

        $validator = Validator::make($data, [
            'vote' => 'required |min:1 | max:5',
            'user_review_name' => 'min:2 | max:50',
            'content' => 'required | max:2000',
        ],
        [
            'vote.required' => ' il voto è un campo obbligatorio',
            'vote.min' => "il voto minimo è :min",
            'vote.max' => "il voto massimo è :max",
            'user_review_name.min' => 'il nome deve contenere almeno :min caratteri',
            'user_review_name.max' => 'il nome deve contenere massimo :max caratteri',
            'content.required' => 'il contenuto è un campo obbligatorio',
            'content.max' => 'il contenuto può contenere massimo :max caratteri',
        ]);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $new_review = new Review();
        $new_review->fill($data);
        $new_review->user_id = $data['user_id'];
        dd($data);
        $new_review->save();

        return redirect()->back()->with('message', 'la recensione è stata correttamente postata');
    }
}
