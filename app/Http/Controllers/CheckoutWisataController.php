<?php

namespace App\Http\Controllers;

use App\TravelTransaction;
use App\TravelTransactionDetail;
use App\TravelPackage;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CheckoutWisataController extends Controller
{
    public function index (Request $request, $id)
    {
        $item = TravelTransaction::with(['details', 'travel_package', 'user'])->findOrFail($id);
        return view('pages.checkoutwisata',[
            'item' => $item
        ]);
    }

    public function process(Request $request, $id)
    {
        $travel_package = TravelPackage::findOrFail($id);

        $travel_transaction = TravelTransaction::create([
            'travel_packages_id' => $id,
            'users_id' => Auth::user()->id,
            'travel_transaction_total' => $travel_package->price,
            'travel_transaction_status' => 'IN_CART'
        ]);

        TravelTransactionDetail::create([
            'travel_transactions_id' => $travel_transaction->id,
            'username' => Auth::user()->username,
            'nationality' => 'ID',
            'job' => '',
            'checkin' => Carbon::now()->addYears(5)
        ]);

        return redirect()->route('checkoutwisata', $travel_transaction->id);
    }

    public function remove(Request $request, $detail_id)
    {
        $item = TravelTransactionDetail::findOrFail($detail_id);

        $travel_transaction = TravelTransaction::with(['details', 'travel_package'])
            ->findOrFail($item->travel_transactions_id);

            $travel_transaction->travel_transaction_total -= $travel_transaction->travel_package->price;

            $travel_transaction->save();
            $item->delete();

            return redirect()->route('checkoutwisata', $item->travel_transactions_id);
    }

    public function create(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'checkin' => 'required'
        ]);

        $data = $request->all();
        $data['travel_transactions_id'] = $id;

        TravelTransactionDetail::create($data);
        $travel_transaction = TravelTransaction::with(['travel_package'])->find($id);

        $travel_transaction->travel_transaction_total += $travel_transaction->travel_package->price;
        

        $travel_transaction->save();

        return redirect()->route('checkoutwisata', $id);
    }

    public function success(Request $request, $id)
    {
        $travel_transaction = TravelTransaction::findOrFail($id);
        $travel_transaction->travel_transaction_status = 'PENDING';

        $travel_transaction->save();

        return view ('pages.success');
    }
}
