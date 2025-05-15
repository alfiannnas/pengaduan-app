<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function home()
    {
        return view('masyarakat.home');
    }
}
