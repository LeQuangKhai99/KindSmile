@extends('layouts.admin')

@section('title', 'Thêm Dịch Vụ Mới - Admin Parkway')
@section('header_title', 'Thêm Dịch Vụ Nha Khoa Mới')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('admin.services.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold text-parkway-navy">Tên Dịch Vụ *</label>
                        <input type="text" name="title" class="form-control form-control-parkway" placeholder="Ví dụ: Niềng Răng Mắc Cài Sứ Tự Động" value="{{ old('title') }}" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-parkway-navy">Danh Mục *</label>
                            <select name="category_id" class="form-select form-select-parkway" required>
                                <option value="">-- Chọn danh mục --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-parkway-navy">Giá Khởi Điểm</label>
                            <input type="text" name="price_from" class="form-control form-control-parkway" placeholder="Ví dụ: 35.000.000 VNĐ" value="{{ old('price_from') }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-parkway-navy">Thời Gian Bảo Hành</label>
                        <input type="text" name="warranty_period" class="form-control form-control-parkway" placeholder="Ví dụ: 10 năm hoặc Trọn đời" value="{{ old('warranty_period') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-parkway-navy">Mô Tả Tóm Tắt (Hiển thị ngoài thẻ)</label>
                        <textarea name="summary" rows="3" class="form-control form-control-parkway" placeholder="Tóm tắt ngắn gọn ưu điểm dịch vụ...">{{ old('summary') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-parkway-navy">Nội Dung Chi Tiết Dịch Vụ (HTML / Văn bản)</label>
                        <textarea name="description" rows="8" class="form-control form-control-parkway" placeholder="Nhập chi tiết phác đồ, quy trình thực hiện, công nghệ...">{{ old('description') }}</textarea>
                    </div>

                    <div class="d-flex gap-4 mb-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="isFeatured" checked>
                            <label class="form-check-label fw-semibold" for="isFeatured">Hiển thị nổi bật trang chủ</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" value="1" id="status" checked>
                            <label class="form-check-label fw-semibold" for="status">Kích hoạt hiển thị</label>
                        </div>
                    </div>

                    <div class="d-flex gap-3">
                        <button type="submit" class="btn-parkway py-3 px-4">
                            <i class="fa-solid fa-floppy-disk"></i> Lưu Dịch Vụ
                        </button>
                        <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary rounded-pill py-3 px-4">Hủy bỏ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
