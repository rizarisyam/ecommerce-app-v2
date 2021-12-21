<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDiscount extends Model
{
    use HasFactory;
    protected $fillable = ['name','desc','discount_percent', 'active'];

    public function products() {
        return $this->hasMany(Product::class);
    }
}
