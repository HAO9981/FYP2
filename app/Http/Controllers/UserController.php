<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view()
    {
        $users = User::all();
        return view('account', ['users' => $users]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'userName' => 'required|string|max:255',
            'userEmail' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'currentPassword' => 'nullable|required_with:newPassword|current_password',
            'newPassword' => 'nullable|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->contactNum = $request->input('userContactNum');
        $user->address = $request->input('userAddress');
        if ($request->filled('newPassword')) {
            $user->password = Hash::make($request->input('newPassword'));
        }

        $user->save();

        return redirect()->back()->with('success', 'Account updated successfully');
    }
}
