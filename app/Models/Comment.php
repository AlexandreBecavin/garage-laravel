<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $primaryKey = 'id';

    protected $fillable = [
        'content', 'enabled',
    ];

    // public function Announcement()
    // {
    //     return $this->hasMany(Announcement::class);
    // }
}
