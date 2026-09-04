<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\Doctor;
use App\Models\Branch;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_appointments' => Appointment::count(),
            'pending_appointments' => Appointment::where('status', 'pending')->count(),
            'confirmed_appointments' => Appointment::where('status', 'confirmed')->count(),
            'completed_appointments' => Appointment::where('status', 'completed')->count(),
            'total_services' => Service::count(),
            'total_doctors' => Doctor::count(),
            'total_branches' => Branch::count(),
            'total_posts' => Post::count(),
        ];

        $recentAppointments = Appointment::with(['service', 'branch'])->latest()->take(10)->get();

        return view('admin.dashboard', compact('stats', 'recentAppointments'));
    }
}
