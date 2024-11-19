<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function features()
    {
        return view('pages.features');
    }

    public function support()
    {
        return view('pages.support');
    }

    public function download()
    {
        return view('pages.download');
    }

    public function pricing()
    {
        return view('pages.pricing');
    }
}
