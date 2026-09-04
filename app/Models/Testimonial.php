<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'service_name',
        'comment',
        'rating',
        'avatar',
        'before_after_image',
        'status',
    ];
}
