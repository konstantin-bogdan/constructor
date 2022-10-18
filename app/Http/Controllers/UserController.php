<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        if(auth()->user()->is_admin){
        $users = User::all();
    } else {
            $users =  User::where('is_admin', false)->get();
    }
       return view('admin.users.index', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact(['roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $roles = $request->roles;
        if($roles) {
            $user->roles()->attach($roles);
        }
        return to_route('admin.users.index');
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
     */
    public function edit(User $user)
    {
        $user =User::where('id', $user->id)->with('roles')->first();
        $roles = Role::all();
        return view('admin.users.edit', compact(['user', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        if(!$user->is_admin) {
             $user->roles()->detach();
             if($request->roles) {
                 $user->roles()->attach($request->roles);
             }
        }

        return to_route('admin.users.edit', compact(['user']));
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
