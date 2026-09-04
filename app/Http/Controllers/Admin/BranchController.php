<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::latest()->paginate(15);
        return view('admin.branches.index', compact('branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'phone' => 'required|string|max:50',
            'working_hours' => 'nullable|string',
            'map_embed_url' => 'nullable|string',
        ]);

        Branch::create([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'phone' => $request->phone,
            'working_hours' => $request->working_hours ?? '08:30 - 19:30 hàng ngày',
            'map_embed_url' => $request->map_embed_url,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.branches.index')->with('success', 'Đã thêm cơ sở chi nhánh mới!');
    }

    public function update(Request $request, $id)
    {
        $branch = Branch::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'phone' => 'required|string|max:50',
        ]);

        $branch->update([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'phone' => $request->phone,
            'working_hours' => $request->working_hours,
            'map_embed_url' => $request->map_embed_url,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.branches.index')->with('success', 'Cập nhật thông tin chi nhánh thành công!');
    }

    public function destroy($id)
    {
        Branch::findOrFail($id)->delete();
        return redirect()->route('admin.branches.index')->with('success', 'Đã xóa chi nhánh!');
    }
}
