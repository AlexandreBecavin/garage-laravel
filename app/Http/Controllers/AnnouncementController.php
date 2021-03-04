<?php

namespace App\Http\Controllers;

use App\Models\Announcement;

use App\Services\AnnouncementService;

use App\Http\Requests\SearchAnnouncementRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class AnnouncementController extends Controller
{
    /**
     * @var \App\Services\AnnouncementService
     */
    protected $announcementService;

    public function __construct(AnnouncementService $announcementService)
    {
        $this->announcementService = $announcementService;
    }

    public function index(Request $request)
    {
        $announcements = Announcement::all()->where('enabled', '=', true);

        return view('announcements.index', ['announcements' => $announcements]);
    }

    public function search(SearchAnnouncementRequest $request)
    {
        $user = $request->user();

        $announcements = Announcement::where('title', 'LIKE', '%'.$request->get('search').'%')->get();
        return view('announcements.index', ['announcements' => $announcements]);
    }
}
