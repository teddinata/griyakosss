<?php

namespace App\Http\Controllers;

use App\RoomPackage;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request, $slug)
    {
        $item = RoomPackage::with(['galleries'])
                    ->where('slug', $slug)
                    ->firstOrFail();
        return view('pages.detail',[
            'item' => $item
        ]);
    }
}
