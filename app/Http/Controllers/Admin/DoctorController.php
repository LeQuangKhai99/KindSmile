<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Branch;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('branch')->latest()->paginate(15);
        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $branches = Branch::where('status', true)->get();
        return view('admin.doctors.create', compact('branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'experience_years' => 'required|integer|min:0',
            'branch_id' => 'nullable|exists:branches,id',
            'bio' => 'nullable|string',
        ]);

        Doctor::create([
            'name' => $request->name,
            'title' => $request->title,
            'specialization' => $request->specialization,
            'experience_years' => $request->experience_years,
            'branch_id' => $request->branch_id,
            'bio' => $request->bio,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.doctors.index')->with('success', 'Thêm mới bác sĩ thành công!');
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $branches = Branch::where('status', true)->get();
        return view('admin.doctors.edit', compact('doctor', 'branches'));
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'experience_years' => 'required|integer|min:0',
            'branch_id' => 'nullable|exists:branches,id',
            'bio' => 'nullable|string',
        ]);

        $doctor->update([
            'name' => $request->name,
            'title' => $request->title,
            'specialization' => $request->specialization,
            'experience_years' => $request->experience_years,
            'branch_id' => $request->branch_id,
            'bio' => $request->bio,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.doctors.index')->with('success', 'Cập nhật thông tin bác sĩ thành công!');
    }

    public function destroy($id)
    {
        Doctor::findOrFail($id)->delete();
        return redirect()->route('admin.doctors.index')->with('success', 'Đã xóa bác sĩ khỏi danh sách!');
    }
}
