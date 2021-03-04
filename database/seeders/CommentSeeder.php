<?php

namespace Database\Seeders;


use App\Models\Announcement;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::factory()
            ->count(10)
            ->for(User::all()->random())
            ->for(Announcement::all()->random())
            ->create();
    }
}
