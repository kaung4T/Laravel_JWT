<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiControlle extends Controller
{
    public function create_user (Request $request) {
        $user = User::create([
                'name'=> $request->name,
                'email'=> $request->email,
                'password'=> $request->password,
            ]);

        return response()->json($user, 201);
    }

    public function all_user(Request $request) {
        $user = User::all();

        return response()->json($user, 201);
    }
}
