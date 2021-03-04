<?php

namespace App\Http\Controllers\Admin;

use App\Models\Announcement;
use App\Http\Controllers\Controller;
use App\Http\Requests\updateStatusRequest;

class AnnouncementController extends Controller
{
    public function index()
    {
        $annonces = Announcement::all();

        return view('admin.annonce.index', ['annonces' => $annonces]);
    }

    // public function show($id)
    // {
    //     $vehicle = Vehicle::find($id);

    //     $statues = VehiculeConstantes::STATUES;

    //     return view('admin.vehicle.edit', ['vehicle' => $vehicle, 'statues' => $statues]);
    // }

    public function update($id)
    {
        $annonce = Announcement::find($id);

        if($annonce->enabled == 1){
            $annonce->enabled = 0;
        }else{
            $annonce->enabled = 1; 
        }
        $annonce->save();

        return redirect()->route('admin.annonce.index');
    }
}
