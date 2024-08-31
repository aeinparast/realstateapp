<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'assetType',
        'dealType',
        'buildingType',
        'price_private',
        'price_public',
        'prepaymant',
        'rent',
        'notes',
        'seller_name',
        'seller_mobile',
        'seller_phone',
        'city',
        'facilities_list',
        'area',
        'space',
        'floor',
        'direction',
        'beds',
        'wc',
        'cooks',
        'cooling',
        'heating',
        'water',
        'elec',
        'gas',
        'landline',
        'img',
        'user_id',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
