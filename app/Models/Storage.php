<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Lecturize\Addresses\Traits\HasAddresses;

class Storage extends Model
{
    use HasAddresses;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];
}
