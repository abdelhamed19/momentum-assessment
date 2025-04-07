<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected static function booted()
    {
        static::creating(function ($post) {
            $post->user_id = auth()->id();
        });
        static::deleting(function ($post) {
            if (auth()->check() && auth()->id() !== $post->user_id) {
                throw new \Exception('You are not allowed to delete this post.');
            }
        });
        static::updating(function ($post) {
            if (auth()->check() && auth()->id() !== $post->user_id) {
                throw new \Exception('You are not allowed to upadte this post.');
            }
        });
    }
}
