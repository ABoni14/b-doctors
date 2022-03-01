<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Message;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $success = true;

        $validator = Validator::make($data, [
            'email' => 'required | max:255',
            'first_name' => 'required | min:2 | max:255',
            'content' => 'required | max:2000',
        ],[
            'email.required' => 'email è un campo obbligatorio',
            'email.max' => "l'email può contenere solamente :max caratteri",
            'first_name.required' => 'il nome è un campo obbligatorio',
            'first_name.min' => 'il nome deve contenere almeno :min caratteri',
            'first_name.max' => 'il nome deve contenere massimo :max caratteri',
            'content.required' => 'il contenuto è un campo obbligatorio',
            'content.max' => 'il contenuto può contenere massimo :max caratteri',
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $new_message = new Message();
        $new_message->fill($data);
        $new_message->user_id = $data['user_id'];
        $new_message->save();

        return response()->json(compact('success'));
    }
}
