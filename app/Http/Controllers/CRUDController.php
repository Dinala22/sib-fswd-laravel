<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CRUDController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function readuser()
    {
        return view('readuser');
    }

    public function update()
    {
        return view('update');
    }

    public function detail()
    {
        return view('detail');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function landing()
    {
        return view('landing');
    }
}
