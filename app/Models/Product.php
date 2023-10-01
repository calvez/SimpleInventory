<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class Product extends Model
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return ProductFactory::new();
    }
}
