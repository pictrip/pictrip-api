<?php

namespace App\Controllers;

use App\Features\Foursquare\FoursquareMethods;
use App\Features\Foursquare\FoursquareService;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke(FoursquareService $foursquare)
    {
        $res = $foursquare->get(FoursquareMethods::CATEGORIES);
        dd($res);

        return ['hello' => 'World'];
    }
}