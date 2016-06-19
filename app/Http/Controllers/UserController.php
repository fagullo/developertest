<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\UserEditRequest;
use Auth;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller {
    /**
     * Shows user's profile and permits the updating of the data.
     *
     * @return view
     */
    public function edit() {
        $user = Auth::user();

        return view('user.edit', compact('user'));
    }

    /**
     * Updates the profile of a user.
     *
     * @param UserEditRequest $request the request with the data validation.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserEditRequest $request) {
        $user = Auth::user();
        $user->name = $request->get('name');

        if ($request->has('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        $user->save();

        return redirect()->route('user.show');
    }

    /**
     *
     */
    public function wishlist() {
        $user = Auth::user();
        $wishes = $user->wishes;
        return view('user.wishlist', compact('wishes'));
    }
}
