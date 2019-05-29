<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $title = trans('pages.home.title');

        return view('pages/feedback', compact('title'));
    }
}
