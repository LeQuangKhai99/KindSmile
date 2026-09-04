@extends('layouts.admin')

@section('title', 'Thêm Bác Sĩ Mới - Admin Parkway')
@section('header_title', 'Hồ Sơ Bác Sĩ Mới')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('admin.doctors.store') }}" method="POST">
                    @csrf
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-parkway-navy">Họ và tên Bác sĩ *</label>
                            <input type="text" name="name" class="form-control form-control-parkway" placeholder="Ví dụ: ThS.BS Nguyễn Lê Hùng" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-parkway-navy">Chức Danh Học Vị *</label>
                            <input type="text" name="title" class="form-control form-control-parkway" placeholder="Ví dụ: Thạc sĩ Bác sĩ / BS.CKII" value="{{ old('title') }}" required>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-parkway-navy">Chuyên Khoa Điều Trị *</label>
                            <input type="text" name="specialization" class="form-control form-control-parkway" placeholder="Ví dụ: Chỉnh nha Invisalign Red Diamond" value="{{ old('specialization') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-parkway-navy">Số Năm Kinh Nghiệm *</label>
                            <input type="number" name="experience_years" class="form-control form-control-parkway" value="{{ old('experience_years', 10) }}" min="0" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-parkway-navy">Chi Nhánh Trực Thuộc</label>
                        <select name="branch_id" class="form-select form-select-parkway">
                            <option value="">-- Tất cả chi nhánh / Luân chuyển --</option>
                            @foreach($branches as $b)
                                <option value="{{ $b->id }}">{{ $b->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-parkway-navy">Tiểu Sử & Thành Tựu Bác Sĩ</label>
                        <textarea name="bio" rows="5" class="form-control form-control-parkway" placeholder="Giới thiệu quá trình đào tạo, bằng cấp quốc tế và kinh nghiệm lâm sàng...">{{ old('bio') }}</textarea>
                    </div>

                    <div class="form-check form-switch mb-4">
                        <input class="form-check-input" type="checkbox" name="status" value="1" id="status" checked>
                        <label class="form-check-label fw-semibold" for="status">Kích hoạt làm việc</label>
                    </div>

                    <div class="d-flex gap-3">
                        <button type="submit" class="btn-parkway py-3 px-4">
                            <i class="fa-solid fa-floppy-disk"></i> Lưu Hồ Sơ Bác Sĩ
                        </button>
                        <a href="{{ route('admin.doctors.index') }}" class="btn btn-outline-secondary rounded-pill py-3 px-4">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
