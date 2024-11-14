<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Policies\UserPolicy;

use Response;


class UsersController extends Controller
{
    
    public function index() {
        $this->authorize('viewAny', User::class);
        $users = User::all()->toArray();
        var_dump($users);
        return $users;
    }
}
