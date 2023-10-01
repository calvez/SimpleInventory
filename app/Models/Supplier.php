<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Lecturize\Addresses\Traits\HasAddresses;
use Lecturize\Addresses\Traits\HasContacts;

class Supplier extends Model
{
    use HasAddresses;
    use HasContacts;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];
}
