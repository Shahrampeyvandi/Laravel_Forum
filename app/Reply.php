<?php

namespace LaravelForum;


class Reply extends Model
{
    public function auther()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function disccussion()
    {
        return $this->belongsTo(Disccussion::class,'disccussion_id');
    }
}
