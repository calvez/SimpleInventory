<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Lecturize\Addresses\Traits\HasAddresses;

class Partner extends Model
{
    use HasAddresses;
    use HasFactory;

    protected $fillable = [
        'name',
    ];
}
