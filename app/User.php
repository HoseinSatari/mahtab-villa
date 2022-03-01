<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'is_staff' , 'is_superuser'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function activeCode()
    {
        return $this->hasMany(Token::class);
    }
    public function issuperuser()
    {
        return $this->is_superuser;
    }

    public function isstaff()
    {
        return $this->is_staff;
    }
    public function rolls()
    {
        return $this->belongsToMany(Role::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasroll($rolls)
    {
        return $rolls->intersect($this->rolls)->all();

    }

    public function haspermission($permission)
    {
        return $this->permissions->contains('name', $permission->name) || $this->hasroll($permission->rolls);
    }
    public function article()
    {
        return $this->hasMany(Article::class, 'user_id', 'id');
    }
    public function favourite()
    {
        return $this->hasMany(Favourite::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function slider()
    {
        return $this->hasMany(Slider::class);
    }
    public function discount()
    {
        return $this->belongsToMany(Discount::class, 'discounts_user')->withPivot(['discount_id']);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
