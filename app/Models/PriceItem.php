<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'unit',
        'price',
        'discount_price',
        'warranty',
        'note',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }
}
