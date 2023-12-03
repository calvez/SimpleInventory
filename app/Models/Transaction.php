<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'note'
    ];

    /**
     * The items that belong to the Transaction
     */
    public function items(): HasMany
    {
        return $this->hasMany(TransactionItem::class, 'transaction_id', 'id');
    }
}
