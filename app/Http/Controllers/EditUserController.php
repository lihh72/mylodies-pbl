<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditUserController extends Controller
{
    public function index()
    {
        return view('edit-user');
    }
}
