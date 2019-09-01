<?php

namespace LaravelForum;


class Disccussion extends Model
{
    public function author()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function bestReply()
    {
        return  $this->belongsTo(Reply::class , 'reply_id');
    }

    public function markAzBestReply($reply)
    {
        $this->update([
            'reply_id' => $reply->id,
        ]);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
