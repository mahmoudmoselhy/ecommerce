<?php

namespace App\Models;
Use App\Models\Order;
Use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $table= 'order_items';
    protected $guarded= [
'order_id',
'product_id',
'price',
'quantity',
'product_title',
'product_image',
];

protected $fillable= [
    'order_id',
    'product_id',
    'price',
    'quantity',
    'product_title',
    'product_image',
    ];
    public function products():BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
