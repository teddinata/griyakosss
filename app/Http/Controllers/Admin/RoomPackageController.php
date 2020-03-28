<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoomPackageRequest;
use App\RoomPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;


class RoomPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = RoomPackage::all();

        return view ('pages.admin.room-package.index', [
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
        return view ('pages.admin.room-package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomPackageRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        RoomPackage::create($data);
        Alert::success('Upload Data Kamar Sukses!', 'Data Kamar berhasil di tambahkan');

        return redirect()->route('room-package.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = RoomPackage::findOrFail($id);

        return view ('pages.admin.room-package.edit', [
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
    public function update(RoomPackageRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $item = RoomPackage::findOrFail($id);

        $item->update($data);
        Alert::success('Update Sukses!', 'Kamar Sukses di Update');

        return redirect()->route('room-package.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = RoomPackage::findOrFail($id);
        $item->delete();
        Alert::success('Delete Sukses!', 'Kamar Sukses di Hapus');
        return redirect()->route('room-package.index');
    }
}
