<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    /**
     * Get all of the transaction for the Storage
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'storage_from', 'id');
    }

    /**
     * Get all of the products for the Storage
     */
    public function products(): HasMany
    {
        return $this->hasMany(StorageProducts::class);
    }
}
