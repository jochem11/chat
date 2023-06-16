<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;

    protected $fillable = [
        'friends_id',
        'user_id',
        'message',
        'created_at'
    ];
}
