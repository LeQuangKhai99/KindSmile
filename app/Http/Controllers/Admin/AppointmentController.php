<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Branch;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Appointment::with(['service', 'branch']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('fullname', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('booking_code', 'like', "%{$search}%");
            });
        }

        $appointments = $query->latest()->paginate(15);
        $branches = Branch::all();

        return view('admin.appointments.index', compact('appointments', 'branches'));
    }

    public function show($id)
    {
        $appointment = Appointment::with(['service', 'branch'])->findOrFail($id);
        return view('admin.appointments.show', compact('appointment'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'admin_note' => 'nullable|string',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->update([
            'status' => $request->status,
            'admin_note' => $request->admin_note,
        ]);

        return back()->with('success', 'Đã cập nhật trạng thái lịch hẹn #' . $appointment->booking_code . ' thành công!');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $code = $appointment->booking_code;
        $appointment->delete();

        return redirect()->route('admin.appointments.index')->with('success', 'Đã xóa lịch hẹn ' . $code);
    }
}
