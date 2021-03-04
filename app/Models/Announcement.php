<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Announcement extends Model
{
    use HasFactory;

    protected $table = 'announcements';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'content', 'price', 'user_id', 'enabled'
    ];


    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
