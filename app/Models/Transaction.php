<?php

namespace App\Models;

use App\Models\Storage as Raktar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'storage_from',
        'storage_to',
        'name',
        'type',
        'note',
    ];

    /**
     * The items that belong to the Transaction
     */
    public function items(): HasMany
    {
        return $this->hasMany(TransactionItem::class, 'transaction_id', 'id');
    }

    /**
     * Get the storage that owns the Transaction
     */
    public function raktar(): BelongsTo
    {
        return $this->belongsTo(Raktar::class);
    }
}
