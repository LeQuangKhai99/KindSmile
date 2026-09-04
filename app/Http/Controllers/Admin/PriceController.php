<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PriceItem;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index()
    {
        $priceItems = PriceItem::with('category')->latest()->paginate(20);
        $categories = ServiceCategory::where('status', true)->get();
        return view('admin.price.index', compact('priceItems', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:service_categories,id',
            'unit' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'warranty' => 'nullable|string',
            'note' => 'nullable|string',
        ]);

        PriceItem::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'unit' => $request->unit,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'warranty' => $request->warranty,
            'note' => $request->note,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.price.index')->with('success', 'Đã thêm đơn giá mới vào bảng giá!');
    }

    public function update(Request $request, $id)
    {
        $item = PriceItem::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
        ]);

        $item->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'unit' => $request->unit,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'warranty' => $request->warranty,
            'note' => $request->note,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.price.index')->with('success', 'Cập nhật bảng giá thành công!');
    }

    public function destroy($id)
    {
        PriceItem::findOrFail($id)->delete();
        return redirect()->route('admin.price.index')->with('success', 'Đã xóa mục giá khỏi hệ thống!');
    }
}
