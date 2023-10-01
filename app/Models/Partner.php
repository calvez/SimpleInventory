<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\PartnerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Lecturize\Addresses\Traits\HasAddresses;

class Partner extends Model
{
    use HasFactory;
    use HasAddresses;


    protected static function newFactory(): Factory
    {
        return PartnerFactory::new();
    }
}
