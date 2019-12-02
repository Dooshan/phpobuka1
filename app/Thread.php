<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    //Don't auto-apply mass assignment protection.
    protected $guarded = [];

    public function path()
    {
        return "/threads/{$this->category->slug}/{$this->id}";
    }



    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }


    public function avatar()
    {
        return $this->belongsTo(User::class, 'avatar');
    }
}
