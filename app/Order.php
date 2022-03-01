<?php

namespace App;

use DatePeriod;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['qty', 'start', 'end', 'code', 'status', 'price', 'descrip', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function discount()
    {
        return $this->belongsToMany(Discount::class, 'discounts_user');
    }

    public function statuss()
    {
        switch ($this->status) {
            case 'paid' :
                return 'پرداخت شده';
            case 'unpaid' :
                return 'پرداخت نشده';
            case 'prepartion' :
                return 'در حال اجرا';
            case 'end' :
                return ' تمام شده ';
            case 'cancel' :
                return 'لغو شده';
        }
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
