<?php

namespace App\Http\Controllers;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing');
    }

    public function tentang()
    {
        return view('tentang');
    }

    public function keunggulan()
    {
        return view('keunggulan');
    }

    public function panduan()
    {
        return view('panduan');
    }
}