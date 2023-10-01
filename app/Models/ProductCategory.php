<?php

namespace App\Models;

use Database\Factories\ProductCategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCategory extends Model
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return ProductCategoryFactory::new();
    }
}
