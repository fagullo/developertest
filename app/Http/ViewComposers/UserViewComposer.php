<?php

namespace App\Http\ViewComposers;

use Auth;
use Illuminate\View\View;

class UserViewComposer
{
    /**
     * User view composer.
     * 
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('is_logged_in', Auth::check());
        $view->with('user', Auth::user());
    }
}
