<?php

namespace App\Models;

use Database\Factories\StorageFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Lecturize\Addresses\Traits\HasAddresses;
use Illuminate\Database\Eloquent\Factories\Factory;

class Storage extends Model
{
    use HasFactory;
    use HasAddresses;

    protected static function newFactory(): Factory
    {
        return StorageFactory::new();
    }
}
