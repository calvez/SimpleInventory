<?php

namespace App\Models;

use Database\Factories\StorageFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Lecturize\Addresses\Traits\HasAddresses;

class Storage extends Model
{
    use HasAddresses;
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return StorageFactory::new();
    }
}
