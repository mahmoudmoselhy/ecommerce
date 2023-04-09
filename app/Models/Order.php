<?php

namespace App\Models;
Use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table= 'orders';
    protected $fillabe= [
'user_id',
'fname',
'lname',
'email',
'lphone',
'address1',
'address2',
'city',
'state',
'country',
'pincode',
'total_price',
'status',
'message',
'tracking_no',
    ];
    public function orderitemes()
    {
        return $this->hasMany(OrderItem::class);
    }
}
