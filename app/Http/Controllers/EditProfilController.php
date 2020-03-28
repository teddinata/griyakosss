<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\EditProfilRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class EditProfilController extends Controller
{
    public function index ()
    {
    
          $item = auth()->user();
          
                    
                 
        return view ('pages.editprofil ',[
            'item' => $item
           
        ]);
    }

    public function edit($id)
    {
        $item = User::findOrFail($id);

        return view ('editprofil.edit', [
            'item' => $item
        ]);
    }



    public function update(EditProfilRequest $Request, $id)
    {
        $item = User::findOrFail($id);
        
       
        //dd($Request->all());
        $item->avatar = $Request->avatar;
        $item->name = $Request->name;
        $item->username = $Request->username;
        $item->email = $Request->email;
        $item->phone = $Request->phone;
        $item->birth = $Request->birth;
        $item->gender = $Request->gender;
        if ($Request->hasFile('avatar')){
            $Request->file('avatar')->move('images/',$Request->file('avatar')->getClientOriginalName());
            $item->avatar = $Request->file('avatar')->getClientOriginalName();
            $item->save();
        }
       

        
      
        $item->save();
        
        

        Alert::success('Update Sukses!', 'Profil Sukses di Update');

        return redirect()->route('editprofil');
       
    }

    }
        

