<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function findAll()
    {
        return User::all();
    }

    public function find($id)
    {
        return User::find($id);
    }
}
