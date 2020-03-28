<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoomTypeRequest;
use App\RoomType;
use App\RoomPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = RoomType::with(['room_package'])->get();

        return view ('pages.admin.room-type.index', [
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
        $room_packages = RoomPackage::all();
        return view ('pages.admin.room-type.create', [
            'room_packages' => $room_packages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomTypeRequest $request)
    {
        $data = $request->all();
        

        RoomType::create($data);
        Alert::success('Upload Sukses!', 'Harga Kamar Sukses di Upload');
        return redirect()->route('room-type.index');
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
        $item = RoomType::findOrFail($id);
        $room_packages = RoomPackage::all();

        return view ('pages.admin.room-type.edit', [
            'item' => $item,
            'room_packages' => $room_packages

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
        

        $item = RoomType::findOrFail($id);
        Alert::success('Update Sukses!', 'Harga Kamar Sukses di Update');
        $item->update($data);
        
       

        return redirect()->route('room-type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = RoomType::findOrFail($id);
        $item->delete();
        Alert::success('Delete Sukses!', 'Harga Kamar Sukses di Hapus');
        return redirect()->route('room-type.index');
    }
}
