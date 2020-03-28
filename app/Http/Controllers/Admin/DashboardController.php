<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RoomPackage;
use App\TravelPackage;
use App\Transaction;
use App\TravelTransaction;

class DashboardController extends Controller
{
    public function index (Request $request)
    {

        return view('pages.admin.dashboard',[
            'room_package' => RoomPackage::count(),
            'transaction' => Transaction::count(),
            'transaction_pending' => Transaction::where('transaction_status', 'PENDING')->count(),
            'transaction_success' => Transaction::where('transaction_status', 'SUCCESS')->count(),
            'travel_package' => TravelPackage::count(),
            'travel_transaction' => TravelTransaction::count(),
            'travel_transaction_pending' => TravelTransaction::where('travel_transaction_status', 'PENDING')->count(),
            'travel_transaction_success' => TravelTransaction::where('travel_transaction_status', 'SUCCESS')->count(),
        ]);
            
    }
}
