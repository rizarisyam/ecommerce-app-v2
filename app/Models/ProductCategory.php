<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'desc', 'image_url'];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function getNameAttribute($value) {
        return ucwords($value);
    }
}
