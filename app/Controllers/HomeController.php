<?php

namespace App\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        return ['message' => 'API for '.config('app.name')];
    }
}