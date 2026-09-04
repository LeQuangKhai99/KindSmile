@extends('layouts.admin')

@section('title', 'Sửa Dịch Vụ - Admin Parkway')
@section('header_title', 'Chỉnh Sửa Dịch Vụ #' . $service->id)

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold text-parkway-navy">Tên Dịch Vụ *</label>
                        <input type="text" name="title" class="form-control form-control-parkway" value="{{ old('title', $service->title) }}" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-parkway-navy">Danh Mục *</label>
                            <select name="category_id" class="form-select form-select-parkway" required>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ $service->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-parkway-navy">Giá Khởi Điểm</label>
                            <input type="text" name="price_from" class="form-control form-control-parkway" value="{{ old('price_from', $service->price_from) }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-parkway-navy">Thời Gian Bảo Hành</label>
                        <input type="text" name="warranty_period" class="form-control form-control-parkway" value="{{ old('warranty_period', $service->warranty_period) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-parkway-navy">Mô Tả Tóm Tắt</label>
                        <textarea name="summary" rows="3" class="form-control form-control-parkway">{{ old('summary', $service->summary) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-parkway-navy">Nội Dung Chi Tiết</label>
                        <textarea name="description" rows="8" class="form-control form-control-parkway">{{ old('description', $service->description) }}</textarea>
                    </div>

                    <div class="d-flex gap-4 mb-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="isFeatured" {{ $service->is_featured ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="isFeatured">Hiển thị nổi bật trang chủ</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" value="1" id="status" {{ $service->status ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="status">Kích hoạt hiển thị</label>
                        </div>
                    </div>

                    <div class="d-flex gap-3">
                        <button type="submit" class="btn-parkway py-3 px-4">
                            <i class="fa-solid fa-floppy-disk"></i> Cập Nhật Dịch Vụ
                        </button>
                        <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary rounded-pill py-3 px-4">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
