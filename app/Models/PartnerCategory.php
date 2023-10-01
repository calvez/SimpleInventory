<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\PartnerCategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerCategory extends Model
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return PartnerCategoryFactory::new();
    }
}
