<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['about' , 'phoneadmin' , 'location','address', 'sitename', 'description', 'keyword', 'image', 'phone', 'email', 'instagram', 'whatsup', 'telegram', 'is_active'];

    public $timestamps = false;

    public function keywords()
    {
        return explode(',', $this->keyword);
    }
}
