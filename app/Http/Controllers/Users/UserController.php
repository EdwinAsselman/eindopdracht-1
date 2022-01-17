<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Render the form view for users.
     * 
     * @return Illuminate\Http\View
     */
    public function render ($userId = null)
    {
        // Get user by its given id.
        $user = $this->getUser($userId);

        return view('pages.users.details')
            ->with('user', $user);
    }

    /**
     * Get user by it's given id.
     * 
     * @return Collection
     */
    private function getUser ($userId)
    {   
        /**
         * Try to find the user by its given id.
         * If id has been given, but no user found, abort mission.
         * If no id has been given, return to the create version of the form view.
         */
        try {

            $user = User::findOrFail($userId);
        } catch (ModelNotFoundException $err) {
                
            abort(404);
        }

        return $user;
    }
}
