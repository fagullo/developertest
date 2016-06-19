<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * REmoves a product form the wish list.
     * @param $productId the target product.
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function removeFromWishlist($productId) {
        $user = Auth::user();

        if (!$user->isWished($productId))  {
            return abort(400, 'Error');
        }
    
        $user->wishes()->detach($productId);

        return redirect()->back();
    }

    /**
     * Adds a new product to the wish list.
     * @param $productId the id of the target product.
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function addToWishlist($productId) {
        $user = Auth::user();

        if ($user->isWished($productId))  {
            return abort(400, 'Error');
        }

        $user->wishes()->attach($productId);

        return redirect()->back();
    }

    /**
     * Shows a product.
     * @param $productId the id of the target product.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($productId) {
        $product = \App\Product::find($productId);
        return view('product.show', compact('product'));
    }
}
