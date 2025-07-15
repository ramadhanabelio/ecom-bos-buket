<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice',
        'user_id',
        'id_product',
        'date_order',
        'other_address',
        'notes',
        'payment_method',
        'qty',
        'total',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }
}
