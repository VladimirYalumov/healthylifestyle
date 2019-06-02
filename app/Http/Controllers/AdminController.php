<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showUsers()
    {
        $users = User::get();
        return view('users_list',compact('users'));
    }

    public function deleteUser(Request $request)
    {
        DB::table('role_user')->where('userID', '=', $request['id'])->delete();
        DB::table('users')->where('id', '=', $request['id'])->delete();
        return redirect()->route('users_list');
    }
}
