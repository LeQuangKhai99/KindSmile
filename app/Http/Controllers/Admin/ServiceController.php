<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('category')->latest()->paginate(15);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $categories = ServiceCategory::where('status', true)->get();
        return view('admin.services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:service_categories,id',
            'summary' => 'nullable|string',
            'description' => 'nullable|string',
            'price_from' => 'nullable|string',
            'warranty_period' => 'nullable|string',
        ]);

        Service::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'category_id' => $request->category_id,
            'summary' => $request->summary,
            'description' => $request->description,
            'price_from' => $request->price_from,
            'warranty_period' => $request->warranty_period,
            'is_featured' => $request->has('is_featured'),
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Đã thêm dịch vụ thành công!');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $categories = ServiceCategory::where('status', true)->get();
        return view('admin.services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:service_categories,id',
            'summary' => 'nullable|string',
            'description' => 'nullable|string',
            'price_from' => 'nullable|string',
            'warranty_period' => 'nullable|string',
        ]);

        $service->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'summary' => $request->summary,
            'description' => $request->description,
            'price_from' => $request->price_from,
            'warranty_period' => $request->warranty_period,
            'is_featured' => $request->has('is_featured'),
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Cập nhật dịch vụ thành công!');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Đã xóa dịch vụ thành công!');
    }
}
