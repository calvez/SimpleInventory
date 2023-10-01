<?php

namespace App\Models;

use Database\Factories\SupplierFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Lecturize\Addresses\Traits\HasAddresses;

class Supplier extends Model
{
    use HasAddresses;
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return SupplierFactory::new();
    }
}
