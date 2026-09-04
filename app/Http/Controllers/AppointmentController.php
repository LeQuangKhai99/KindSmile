<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\Branch;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create()
    {
        $services = Service::where('status', true)->get();
        $branches = Branch::where('status', true)->get();

        return view('client.appointment.create', compact('services', 'branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'preferred_date' => 'required|date|after_or_equal:today',
            'preferred_time' => 'required|string',
            'service_id' => 'nullable|exists:services,id',
            'branch_id' => 'nullable|exists:branches,id',
            'notes' => 'nullable|string',
        ], [
            'fullname.required' => 'Vui lòng nhập họ và tên.',
            'phone.required' => 'Vui lòng nhập số điện thoại liên hệ.',
            'preferred_date.required' => 'Vui lòng chọn ngày khám dự kiến.',
            'preferred_time.required' => 'Vui lòng chọn khung giờ khám.',
        ]);

        $bookingCode = Appointment::generateBookingCode();

        $appointment = Appointment::create([
            'booking_code' => $bookingCode,
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'email' => $request->email,
            'service_id' => $request->service_id,
            'branch_id' => $request->branch_id,
            'preferred_date' => $request->preferred_date,
            'preferred_time' => $request->preferred_time,
            'notes' => $request->notes,
            'status' => 'pending',
        ]);

        return redirect()->route('appointment.success', ['code' => $bookingCode])
            ->with('success', 'Đăng ký đặt lịch hẹn thành công! Mã hẹn của bạn là: ' . $bookingCode);
    }

    public function success(Request $request)
    {
        $code = $request->query('code');
        $appointment = Appointment::with(['service', 'branch'])->where('booking_code', $code)->firstOrFail();

        return view('client.appointment.success', compact('appointment'));
    }
}
