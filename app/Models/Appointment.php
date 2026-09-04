<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_code',
        'fullname',
        'phone',
        'email',
        'service_id',
        'branch_id',
        'preferred_date',
        'preferred_time',
        'notes',
        'status',
        'admin_note',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public static function generateBookingCode()
    {
        return 'PKW-' . strtoupper(substr(uniqid(), -6));
    }
}
