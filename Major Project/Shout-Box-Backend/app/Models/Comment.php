<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CommentController;

class Comment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'text'
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function post()
    {
        return $this->belongsTo('App\Models\Post', 'post_id');
    }
}