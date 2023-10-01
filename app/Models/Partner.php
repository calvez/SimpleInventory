<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Lecturize\Addresses\Traits\HasAddresses;
use Lecturize\Addresses\Traits\HasContacts;

class Partner extends Model
{
    use HasAddresses;
    use HasContacts;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'message',
        'partner_category',
    ];

    /**
     * Get the category that owns the Partner
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(PartnerCategory::class);
    }
}
