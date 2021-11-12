<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $users = User::all();
        if($request->has('search')) {
            $users = User::where('username','like', "%{$request->search}%")
            ->orWhere('email' , 'like', '%' . $request->search . '%')->get();
        }

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }
    public function store(UserStoreRequest $request)
    {
        User::create([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('users.index')->with('message', 'User Added Successully');
    }

    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }


    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);
        return redirect()->route('users.index')->with('message', 'User Updated Successully');
    }

    public function destroy(User $user)
    {
        if(auth()->user()->id == $user->id){
            return redirect()->route('users.index')->with('message','You are deleting yourself');
        }
        $user->delete();
        return redirect()->route('users.index')->with('message','User Deleted Successfully.');

    }
}
