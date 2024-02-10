<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    protected $fillable = [
        
        'content',
        'user_id_post',
        'user_id_react',
        'post_id',
        'react_photo',
        'watch'
     
    ];
}
