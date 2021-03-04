<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddMoneyWalletRequest;
use App\Http\Requests\EditAnnonceRequest;
use App\Http\Requests\CreateAnnouncementRequest;
use App\Models\Announcement;
use App\Services\AnnouncementService;

class UserController extends Controller
{   

    /**
     * @var \App\Services\AnnouncementService
     */
    protected $announcementService;

    public function __construct(AnnouncementService $announcementService)
    {
        $this->announcementService = $announcementService;
    }


    public function settings(Request $request)
    {
        $user = $request->user();

        return view('users.settings', ['user' => $user]);
    }

    public function addMoney(AddMoneyWalletRequest $request)
    {
        $user = $request->user();

        $user->update([
           'wallet' => $user->wallet + $request->get('amount'),
        ]);

        return redirect()->back();
    }

    public function reservations(Request $request)
    {
        $user = $request->user();

        $reservations = $user->vehicles;

        return view('users.reservations', ['reservations' => $reservations]);
    }

    public function annonces(Request $request)
    {
        $user = $request->user();
        $annonces = Announcement::all()->where('user_id', '=', $user->id);
        return view('users.annonces', ['annonces' => $annonces]);
    }

    public function deleteAnnonce(Request $request, $id)
    {   
        $annonce = Announcement::find($id);
        $annonce->delete();
        return redirect()->back();
    }

    public function annonce($id){
        $annonce = Announcement::find($id);
        return view('users.editAnnonce', ['annonce' => $annonce]);
    }

    public function editAnnonce(EditAnnonceRequest $request, $id)
    {
        $annonce = Announcement::find($id);
        
        $annonce->update([
           'title' => $request->get('title'),
           'price' => $request->get('price'),
           'content' => $request->get('content'),
        ]);

        return redirect()->back();
    }

    public function create(Request $request)
    {
        $user = $request->user();
        return view('users.createAnnonce', ['user' => $user]);
    }

    public function store(CreateAnnouncementRequest $request){

        $user = $request->user();

        $this->announcementService->createAnnouncement($user, $request->all());

        return redirect()->route('user.annonce');
    }
    

}
