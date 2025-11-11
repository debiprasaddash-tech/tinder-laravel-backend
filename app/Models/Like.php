<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'liked_user_id',
    ];

    // 👇 Add this relation
    public function likedUser()
    {
        return $this->belongsTo(User::class, 'liked_user_id');
    }

    // (Optional) Add this if you ever need to access the user who liked others
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
