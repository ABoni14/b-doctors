<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Performance;
use Illuminate\Http\Request;
use App\User;
use App\Specialization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        return view('admin.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $id = Auth::id();
        $user = User::find($id);
        return view('admin.dashboard.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $id = Auth::id();
        $user = User::find($id);
        $specializations = Specialization::all();
        $performances = Performance::all();
        return view('admin.dashboard.edit', compact("user", "specializations", "performances"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, User $user )
    {
        $user = User::find($id);
        $data = $request->all();

        $request->validate([
            'phone' => 'nullable| regex:/^([0-9\s\-\+\(\)]*)$/ | max:20',
            'email' => 'required| max:50',
            'address' => 'required| min:5 | max:255',
            'cv' => 'nullable| min:5 | max:2000',
            'photo' => 'nullable|mimes:jpeg,jpg,bmp,svg,webp,png|max:32000',
            'specializations' => 'required',
        ],[
            'phone.regex' => 'Il campo telefono può contenere solamente i seguenti caratteri speciali ( - , + , (), )',
            'phone.max' => 'Il Numero di telefono no deve superare i :max caratteri',
            'email.required' => 'Il campo email è obbligatorio',
            'email.min' => 'Il campo email deve contenere al minimo :min caratteri',
            'email.max' => 'Il campo email deve contenere al massimo :max caratteri',
            'cv.min' => 'Il campo deve contenere una descrizione minima di almeno :min caratteri',
            'cv.max' => 'Il campo deve contenere una descrizione di massimo :max caratteri',
            'photo.mimes' => 'Il formato deve essere: (jpeg,jpg,bmp,svg,webp,png)',
            'photo.max' => 'Il file non deve pesare più di :max',
            'specializations.required' => 'Il campo è obbligatorio',
        ]);


        if (array_key_exists('photo', $data)) {
            if ($user->photo) {
                Storage::delete($user->photo);
            }
            $img_path = Storage::put('image', $data['photo']);
            $data['photo'] = $img_path;
        }
        dd($data);
        $user->update($data);

        if(array_key_exists('specializations', $data)){
            $user->specializations()->sync($data['specializations']);
        }else{
            $user->specializations()->detach();
        }

        return redirect()->route("admin.dashboard.show", $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $id = Auth::id();
        $user = User::find($id);
        Auth::logout();
        $user->delete();

        return redirect()->route("login");
    }
}
