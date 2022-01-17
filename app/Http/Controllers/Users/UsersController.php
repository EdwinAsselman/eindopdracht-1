<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Render the list view for users.
     * 
     * @return Illuminate\Http\View
     */
    public function render ()
    {
        return view('pages.users.list');
    }
}
