@extends('layouts.admin')

@section('title', 'Quản Lý Bảng Giá - Admin Parkway')
@section('header_title', 'Bảng Giá Chi Tiết Các Hạng Mục Dịch Vụ')

@section('content')

<div class="row g-4 mb-4">
    <!-- ADD PRICE ITEM FORM -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white p-4 border-bottom">
                <h5 class="fw-bold text-parkway-navy mb-0"><i class="fa-solid fa-plus-circle text-parkway-teal me-2"></i>Thêm Mục Bảng Giá</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.price.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold text-parkway-navy small">Tên Hạng Mục / Gói *</label>
                        <input type="text" name="name" class="form-control form-control-parkway" placeholder="Ví dụ: Răng sứ Zirconia Dmax" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-parkway-navy small">Danh Mục Dịch Vụ</label>
                        <select name="category_id" class="form-select form-select-parkway">
                            <option value="">-- Chọn danh mục --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-bold text-parkway-navy small">Đơn Vị Tính *</label>
                            <input type="text" name="unit" class="form-control form-control-parkway" value="Chiếc / Răng" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-bold text-parkway-navy small">Giá Niêm Yết (VNĐ) *</label>
                            <input type="number" name="price" class="form-control form-control-parkway" placeholder="5000000" required>
                        </div>
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-bold text-parkway-navy small">Giá Ưu Đãi (VNĐ)</label>
                            <input type="number" name="discount_price" class="form-control form-control-parkway" placeholder="4200000">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-bold text-parkway-navy small">Bảo Hành</label>
                            <input type="text" name="warranty" class="form-control form-control-parkway" placeholder="10 năm">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-parkway-navy small">Ghi Chú</label>
                        <input type="text" name="note" class="form-control form-control-parkway" placeholder="Tặng kèm tẩy trắng...">
                    </div>

                    <div class="form-check form-switch mb-4">
                        <input class="form-check-input" type="checkbox" name="status" value="1" id="priceStatus" checked>
                        <label class="form-check-label fw-semibold small" for="priceStatus">Kích hoạt hiển thị</label>
                    </div>

                    <button type="submit" class="btn-parkway w-100 justify-content-center py-2">
                        <i class="fa-solid fa-floppy-disk"></i> Thêm Vào Bảng Giá
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- PRICE LIST -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Tên Hạng Mục</th>
                            <th>Đơn Vị</th>
                            <th>Đơn Giá</th>
                            <th>Bảo Hành</th>
                            <th class="pe-4 text-end">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($priceItems as $pi)
                        <tr>
                            <td class="ps-4">
                                <strong class="text-parkway-navy d-block">{{ $pi->name }}</strong>
                                <small class="text-muted">{{ $pi->category->name ?? 'Dịch vụ' }}</small>
                            </td>
                            <td><span class="badge bg-light text-dark border">{{ $pi->unit }}</span></td>
                            <td>
                                @if($pi->discount_price)
                                    <strong class="text-danger">{{ number_format($pi->discount_price, 0, ',', '.') }}đ</strong>
                                    <small class="text-muted text-decoration-line-through d-block">{{ number_format($pi->price, 0, ',', '.') }}đ</small>
                                @else
                                    <strong class="text-parkway-teal">{{ number_format($pi->price, 0, ',', '.') }}đ</strong>
                                @endif
                            </td>
                            <td><span class="badge-parkway">{{ $pi->warranty ?? '-' }}</span></td>
                            <td class="pe-4 text-end">
                                <form action="{{ route('admin.price.destroy', $pi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Xóa mục giá này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">Chưa có dữ liệu bảng giá.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-3 border-top">
                {{ $priceItems->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
