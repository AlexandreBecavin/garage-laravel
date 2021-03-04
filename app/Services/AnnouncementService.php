<?php

namespace App\Services;

use Exception;
use App\Models\Announcement;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AnnouncementService
{

    public function createAnnouncement($user, array $requestParameters): void
    {
        Announcement::create([
            'title' => $requestParameters['title'],
            'content' =>  $requestParameters['content'],
            'price' => $requestParameters['price'],
            'user_id' => $user->id,
            'enabled' => 1,
        ]);
    }

}
