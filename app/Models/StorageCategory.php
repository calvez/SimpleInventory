<?php

namespace App\Models;

use Database\Factories\StorageCategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class StorageCategory extends Model
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return StorageCategoryFactory::new();
    }
}
