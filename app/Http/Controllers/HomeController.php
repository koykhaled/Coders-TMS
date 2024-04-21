<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function redirect(Request $request)
    {
        return to_route('profile.show');
    }

}