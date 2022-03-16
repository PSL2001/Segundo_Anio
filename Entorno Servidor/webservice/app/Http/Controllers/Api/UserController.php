<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users() {
        return User::orderBy('lastName')->get();
    }

    public function user($id) {
        return User::find($id);
    }
}
