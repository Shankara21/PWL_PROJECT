<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UserDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index', [
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'image' => 'image|file',
            'level' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('profile', 'public');
        }
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        return redirect('/dashboard/user')->with('toast_success', 'User Has Been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

       $rules = [
            'name' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'image' => 'image|file',
            'level' => 'required',
            'email' => 'required',
        ];

        $validateData = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('profile', 'public');
            // $validateData['image'] = $request->file('image')->store('user', 'public');
        }
        User::where('id', $user->id)->update($validateData);
        return redirect('/dashboard/user')->with('toast_success', 'User telah diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::where('id', $user->id)->delete();
        return redirect('/dashboard/user')->with('toast_success', 'User Has Been Deleted');
    }
}
