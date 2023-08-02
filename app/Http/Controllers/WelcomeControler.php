<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class WelcomeControler extends Controller
{
    public function __invoke()
    {
        $categories =Category::All();
        return view('welcome',compact('categories'));
    }
}
