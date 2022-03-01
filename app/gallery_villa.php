<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gallery_villa extends Model
{

    protected $fillable = ['image', 'alt'];

    public function vila()
    {
        return $this->belongsTo(Vila::class );
    }
}
