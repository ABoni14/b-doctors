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
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.dashboard.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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

        if (array_key_exists('photo', $data)) {
            // eliminare la vecchia immagine (se esiste)
            if ($user->photo) {
                Storage::delete($user->photo);
            }
            $img_path = Storage::put('uploads', $data['photo']);
            $data['photo'] = $img_path;
        }
        dd($data);
        $user->update($data);
        return redirect()->route("admin.dashboard.show", $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
