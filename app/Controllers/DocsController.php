<?php

namespace App\Controllers;

use App\Http\Controllers\Controller;

class DocsController extends Controller
{
    public function __invoke()
    {
        return view('docs');
    }
}