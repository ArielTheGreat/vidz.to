<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Comment;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'uid';
    }

    public function getThumbnailAttribute()
    {

            return  "/videos/" . $this->uid . '/' . $this->thumbnail_image;
       
    }

    public function getUploadedDateAttribute()
    {
        $d = new Carbon($this->created_at);
        return $d->toFormattedDateString();
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function dislikes()
    {
        return $this->hasMany(Dislike::class);
    }

    public function doesUserLikedVideo()
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }

    public function doesUserDislikedVideo()
    {
        return $this->dislikes()->where('user_id', auth()->id())->exists();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('reply_id');
    }

    public function AllCommentsCount()
    {
        return $this->hasMany(Comment::class)->count();
    }
}
