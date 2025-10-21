<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get only the first 5 members (leaders)
        $leaders = Member::take(5)->get();

        return view('welcome', compact('leaders'));
    }
}
