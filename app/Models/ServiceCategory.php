<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'status',
        'sort_order',
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'category_id');
    }

    public function priceItems()
    {
        return $this->hasMany(PriceItem::class, 'category_id');
    }
}
