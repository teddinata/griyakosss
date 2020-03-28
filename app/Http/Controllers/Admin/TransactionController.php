<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionRequest;
use App\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Transaction::with([
            'details', 'room_package', 'user'
        ])->get();

        return view ('pages.admin.transaction.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        Transaction::create($data);
        
        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Transaction::with([
            'details', 'room_package', 'user'
        ])->findOrFail($id);

        return view ('pages.admin.transaction.detail', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Transaction::findOrFail($id);

        return view ('pages.admin.transaction.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $item = Transaction::findOrFail($id);

        $item->update($data);
        Alert::success('Update Sukses!', 'Data Transaksi Sukses di Update');
        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Transaction::findOrFail($id);
        $item->delete();
        Alert::success('Delete Sukses!', 'Data Transaksi Sukses di Hapus');
        return redirect()->route('transaction.index');
    }

    public function lihat()
    {
        $id = Auth::user()->id;
        $items = Transaction::with([
            'details', 'room_package'
        ])->where('users_id', $id)->get();

        return view ('pages.history-order.index', [
            'items' => $items
        ]);
    }

    public function detail($id)
    {
        $item = Transaction::with([
            'details', 'room_package'
        ])->findOrFail($id);

        return view('pages.history-order.detail', [
            'item' => $item
        ]);
    }
}
