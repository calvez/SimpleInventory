<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'sku',
        'manufacturer_sku',
        'unit',
        'description',
        'message',
        'net_amount',
        'gross_amount',
        'product_category_id',
        'tax_id',
        'min_store',
        'barecode',
        'vtsz',
    ];

    /**
     * Get the category that owns the Product
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    // /**
    //  * Get the tax associated with the Product
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasOne
    //  */
    // public function tax(): HasOne
    // {
    //     return $this->hasOne(TaxGroup::class);
    // }

}
