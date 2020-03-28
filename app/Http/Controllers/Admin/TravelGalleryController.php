<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TravelGalleryRequest;
use App\TravelGallery;
use App\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TravelGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TravelGallery::with(['travel_package'])->get();

        return view ('pages.admin.travel-gallery.index', [
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
        $travel_packages = TravelPackage::all();
        return view ('pages.admin.travel-gallery.create', [
            'travel_packages' => $travel_packages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelGalleryRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/travel-gallery', 'public'
        );

        TravelGallery::create($data);
        Alert::success('Selamat!', 'Data Galeri Travel Sukses ditambahkan');
        return redirect()->route('travel-gallery.index');
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
        $item = TravelGallery::findOrFail($id);
        $travel_packages = TravelPackage::all();

        return view ('pages.admin.travel-gallery.edit', [
            'item' => $item,
            'travel_packages' => $travel_packages

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
        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );

        $item = TravelGallery::findOrFail($id);

        $item->update($data);
        Alert::success('Selamat!', 'Data Galeri Travel Sukses diupdate');
        return redirect()->route('travel-gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = TravelGallery::findOrFail($id);
        $item->delete();
        Alert::success('Selamat!', 'Data Galeri Travel Sukses dihapus');
        return redirect()->route('travel-gallery.index');
    }
}
