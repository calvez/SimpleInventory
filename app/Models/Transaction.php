<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The items that belong to the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(TransactionItem::class, 'transaction_id', 'id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(
            function ($model) {
                $number = Transaction::max('id') + 1;
                $model->reference = make_reference_id('ADJ', $number);
            }
        );
    }
}
