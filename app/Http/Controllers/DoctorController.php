<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Branch;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('branch')->where('status', true)->get();
        $branches = Branch::where('status', true)->get();

        return view('client.doctors.index', compact('doctors', 'branches'));
    }
}
