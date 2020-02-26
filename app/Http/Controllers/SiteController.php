<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function get_index()
    {
        $title = "Softlab Task";
        return view("index",compact('title'));
    }

    public function post_index(Request $request)
    {
        $degisken = $request->degisken;

        return Response::json($degisken);
    }
}
