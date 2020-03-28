<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TravelTransactionRequest;
use App\TravelTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TravelTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TravelTransaction::with([
            'details', 'travel_package', 'user'
        ])->get();

        return view ('pages.admin.travel-transaction.index', [
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
    public function store(TravelTransactionRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        TravelTransaction::create($data);
        Alert::success('Selamat!', 'Data Pengguna Sukses diupdate');
        return redirect()->route('travel-transaction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = TravelTransaction::with([
            'details', 'travel_package', 'user'
        ])->findOrFail($id);

        return view ('pages.admin.travel-transaction.detail', [
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
        $item = TravelTransaction::findOrFail($id);

        return view ('pages.admin.travel-transaction.edit', [
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

        $item = TravelTransaction::findOrFail($id);

        $item->update($data);

        return redirect()->route('travel-transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = TravelTransaction::findOrFail($id);
        $item->delete();

        Alert::success('Selamat!', 'Data Transaksi Travel Sukses dihapus');
        return redirect()->route('travel-transaction.index');
    }
}
