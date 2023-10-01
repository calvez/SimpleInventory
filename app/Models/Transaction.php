<?php

namespace App\Models;

use Database\Factories\TransactionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class Transaction extends Model
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return TransactionFactory::new();
    }
}
