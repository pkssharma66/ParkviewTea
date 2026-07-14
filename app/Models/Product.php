<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [

        'category_id',
        'name',
        'slug',
        'sku',
        'price',
        'sale_price',
        'stock',
        'thumbnail',
        'short_description',
        'description',
        'weight',
        'featured',
        'best_seller',
        'status',
        'meta_title',
        'meta_description',
        'weight',
        'stock_status',
        'tags'

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
