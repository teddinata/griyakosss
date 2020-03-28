<?php

namespace App\Http\Controllers;

use App\TravelPackage;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index (Request $request, $slug)
    {
        $item = TravelPackage::with(['travel_galleries'])
                ->where('slug', $slug)
                ->firstOrFail();
        return view('pages.travel',[
        'item' => $item
            ]);
    }
}
