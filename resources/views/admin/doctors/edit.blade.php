@extends('layouts.admin')

@section('title', 'Sửa Bác Sĩ - Admin Parkway')
@section('header_title', 'Sửa Hồ Sơ Bác Sĩ: ' . $doctor->name)

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-parkway-navy">Họ và tên Bác sĩ *</label>
                            <input type="text" name="name" class="form-control form-control-parkway" value="{{ old('name', $doctor->name) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-parkway-navy">Chức Danh Học Vị *</label>
                            <input type="text" name="title" class="form-control form-control-parkway" value="{{ old('title', $doctor->title) }}" required>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-parkway-navy">Chuyên Khoa Điều Trị *</label>
                            <input type="text" name="specialization" class="form-control form-control-parkway" value="{{ old('specialization', $doctor->specialization) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-parkway-navy">Số Năm Kinh Nghiệm *</label>
                            <input type="number" name="experience_years" class="form-control form-control-parkway" value="{{ old('experience_years', $doctor->experience_years) }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-parkway-navy">Chi Nhánh Trực Thuộc</label>
                        <select name="branch_id" class="form-select form-select-parkway">
                            <option value="">-- Tất cả chi nhánh / Luân chuyển --</option>
                            @foreach($branches as $b)
                                <option value="{{ $b->id }}" {{ $doctor->branch_id == $b->id ? 'selected' : '' }}>{{ $b->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-parkway-navy">Tiểu Sử & Thành Tựu</label>
                        <textarea name="bio" rows="5" class="form-control form-control-parkway">{{ old('bio', $doctor->bio) }}</textarea>
                    </div>

                    <div class="form-check form-switch mb-4">
                        <input class="form-check-input" type="checkbox" name="status" value="1" id="status" {{ $doctor->status ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold" for="status">Kích hoạt làm việc</label>
                    </div>

                    <div class="d-flex gap-3">
                        <button type="submit" class="btn-parkway py-3 px-4">
                            <i class="fa-solid fa-floppy-disk"></i> Cập Nhật Hồ Sơ
                        </button>
                        <a href="{{ route('admin.doctors.index') }}" class="btn btn-outline-secondary rounded-pill py-3 px-4">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
