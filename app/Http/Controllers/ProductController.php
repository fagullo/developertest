<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    public function removeFromWishlist($productId) {
        $user = Auth::user();

        if (!$user->isWished($productId))  {
            return abort(400, 'Error');
        }
    
        $user->wishes()->detach($productId);

        return redirect()->back();
    }

    public function addToWishlist($productId) {
        $user = Auth::user();

        if ($user->isWished($productId))  {
            return abort(400, 'Error');
        }
    
        $user->wishes()->attach($productId);

        return redirect()->back();
    }
}
