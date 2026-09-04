<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'name',
        'title',
        'specialization',
        'experience_years',
        'avatar',
        'bio',
        'status',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
