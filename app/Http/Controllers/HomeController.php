<?php

namespace App\Http\Controllers;

use App\RoomPackage;
use App\TravelPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = RoomPackage::with(['galleries'])->get();
        $details = TravelPackage::with(['travel_galleries'])->get();
    
        return view('pages.home',[
            'items' => $items,
            'details' => $details
        ]);
        
        
        
    }
}
