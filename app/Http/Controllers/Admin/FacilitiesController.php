<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FacilitiesRequest;
use App\Facilities;
use App\RoomPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class FacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Facilities::with(['room_package'])->get();

        return view ('pages.admin.facilities.index', [
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
        return view ('pages.admin.facilities.create', [
            'room_packages' => $room_packages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacilitiesRequest $request)
    {
        $data = $request->all();
        

        Facilities::create($data);
        Alert::success('Upload Sukses!', 'Fasilitas Sukses di Upload');
        return redirect()->route('facilities.index');
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
        $item = Facilities::findOrFail($id);
        $room_packages = RoomPackage::all();

        return view ('pages.admin.facilities.edit', [
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
        

        $item = Facilities::findOrFail($id);
        Alert::success('Update Sukses!', 'Fasilitas Sukses di Update');
        $item->update($data);
        
       

        return redirect()->route('facilities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Facilities::findOrFail($id);
        $item->delete();
        Alert::success('Delete Sukses!', 'Fasilitas Sukses di Hapus');
        return redirect()->route('facilities.index');
    }
}
