<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\UserEditRequest;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit() {
        $user = Auth::user();

        return view('user.edit', compact('user'));
    }

    public function update(UserEditRequest $request) {
        $user = Auth::user();
        $user->name = $request->get('name');

        if ( $request->has('password') ) {
            $user->password = bcrypt($request->get('password'));            
        }

        $user->save();

        return redirect()->route('user.show');
    }

    public function show() {
        // return view('');
        dd("show");
    }
}
