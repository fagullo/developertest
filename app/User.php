<?php

namespace App;

use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    'password', 'remember_token',
    ];

    /**
     * Obtains the wish list of the user.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function wishes()
    {
        return $this->belongsToMany(Product::class, 'wishlist', 'user_id', 'product_id');
    }

    /**
     * Checks if a product is wished by the user.
     * @param $productId the id of the target product.
     * @return true if the product is wished by the user, false otherwise.
     */
    public function isWished($productId) {
        $user = Auth::user();

        return $user->wishes->contains($productId);
    }
}
