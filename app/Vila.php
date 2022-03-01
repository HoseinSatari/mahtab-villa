<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Vila extends Model
{
    use Sluggable;
    protected $fillable = ['title' , 'slug' ,'short_descrip' , 'descrip' , 'is_active' , 'price' , 'video' , 'qty' , 'price2'];

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'attribute_villa', 'villa_id')->withPivot(['value_id']);
    }
    public function Gallery()
    {
        return $this->hasMany(gallery_villa::class, 'Villa_id', 'id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function visit()
    {
        return $this->morphMany(visit::class, 'visitable');
    }

    public function visitor()
    {
        return collect($this->visit()->get())->sum(function ($vist) {
            return $vist['qty'];
        });
    }

    public function order()
    {
        return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id')->withPivot(['quantity']);
    }

    public function favourite()
    {
        return $this->hasMany(Favourite::class);
    }

}
