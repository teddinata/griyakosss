<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\TransactionSuccess;

use App\User;
use App\Transaction;
use App\TransactionDetail;
use App\RoomPackage;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
        $item = Transaction::with(['details', 'room_package', 'user'])->findOrFail($id);
        return view ('pages.checkout',[

            'item' => $item
        ]);
    }

    public function process(Request $request, $id)
    {
        $room_package = RoomPackage::findOrFail($id);

        $transaction = Transaction::create([
            'room_packages_id' => $id,
            'users_id' => Auth::user()->id,
            'transaction_total' => $room_package->price,
            'transaction_status' => 'IN_CART'
        ]);

        TransactionDetail::create([
            'transactions_id' => $transaction->id,
            
            'avatar' => Auth::user()->avatar,
            'username' => Auth::user()->username,
            'nationality' => 'Belum diisi',
            'job' => 'Belum diisi',
            'checkin' => Carbon::now()->addDays(+1)
        ]);

        return redirect()->route('checkout', $transaction->id);
    }

    public function remove(Request $request, $detail_id)
    {
        $item = TransactionDetail::findOrFail($detail_id);

        $transaction = Transaction::with(['details', 'room_package'])
            ->findOrFail($item->transactions_id);

            $transaction->transaction_total -= $transaction->room_package->price;

            $transaction->save();
            $item->delete();

            return redirect()->route('checkout', $item->transactions_id);
    
            
    }

    public function create(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'checkin' => 'required'
        ]);

        $data = $request->all();
        $data['transactions_id'] = $id;

        TransactionDetail::create($data);
        $transaction = Transaction::with(['room_package'])->find($id);

        $transaction->transaction_total += $transaction->room_package->price;
        

        $transaction->save();

        return redirect()->route('checkout', $id);
    }

   

    public function success(Request $request, $id)
    {
        $transaction = Transaction::with(['details', 'room_package.galleries',
        'user'])->findOrFail($id);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();

   //set konfigurasi midtrans
        //Config::$serverKey = config('midtrans.serverKey');
        //Config::$isProduction = config('midtrans.isProduction');
        //Config::$isSanitized = config('midtrans.isSanitized');
        //Config::$is3ds = config('midtrans.is3ds');

        //Buat array untuk di kirim ke midtrans
       // $midtrans_param = [
           // 'transaction_details' => [
             //   'order_id' => 'MIDTRANS-' . $transaction->id,
              //  'gross_amount' => (int) $transaction->transaction_total
           // ],
            //'customer_details' => [
            //    'first_name' => $transaction->user->name,
            //    'email' => $transaction->user->email 
           // ],
           // 'enabled_payments' => ['gopay'],
           // 'vtweb' => []
       // ];

      //  try {
      //      //Ambil Halman Payment di midtrans
       //     $paymentUrl = Snap::createTransaction($midtrans_params)->redirect_url;

            //Redirect ke halaman midtrans
        //    header('Location: ' . $paymentUrl);
     //   } catch (Exception $e) {
            //throw $th;
        //    echo $e->getMessage();
      //  }



        //return $transaction;

        //Kirim email ke user e-bookingnya
            Mail::to($transaction->user)->send(
                new TransactionSuccess($transaction)
            );

        return view ('pages.success');
    }
}
