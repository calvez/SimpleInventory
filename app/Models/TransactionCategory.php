<?php

namespace App\Models;

use Database\Factories\TransactionCategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionCategory extends Model
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return TransactionCategoryFactory::new();
    }
}
