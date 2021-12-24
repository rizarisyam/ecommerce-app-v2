<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'desc', 'SKU', 'category_id', 'discount_id', 'inventory_id', 'price', 'image_url'];

    public function inventory() {
        return $this->belongsTo(ProductInventory::class, 'inventory_id', 'id', 'product_inventories');
    }

    public function category() {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id', 'product_categories');
    }

    public function discount() {
        return $this->belongsTo(ProductDiscount::class, 'discount_id', 'id', 'product_discounts');
    }
}
