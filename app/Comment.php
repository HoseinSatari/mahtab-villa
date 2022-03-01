<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name', 'phone', 'user_id', 'comment', 'approved', 'parent_id' , 'commentable_id', 'commentable_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rel()
    {
        $this->morphTo();
    }

    public function child()
    {
        return $this->hasMany(Comment::class , 'parent_id');
    }
}
