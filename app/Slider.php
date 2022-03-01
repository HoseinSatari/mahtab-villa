<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['image' , 'text' , 'text2' , 'is_active' , 'order'];
}
