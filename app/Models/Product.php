<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_category',
        'name',
        'description',
        'price',
        'size',
        'image',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'id_product', 'id');
    }
}
