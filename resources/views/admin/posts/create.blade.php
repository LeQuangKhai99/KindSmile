@extends('layouts.admin')

@section('title', 'Viết Bài Mới - Admin Parkway')
@section('header_title', 'Tạo Bài Viết Tư Vấn Nha Khoa Mới')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('admin.posts.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold text-parkway-navy">Tiêu Đề Bài Viết *</label>
                        <input type="text" name="title" class="form-control form-control-parkway" placeholder="Ví dụ: Quy Trình Niềng Răng Invisalign Chuẩn 5 Bước Tại Parkway" value="{{ old('title') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-parkway-navy">Chuyên Mục / Chủ Đề *</label>
                        <select name="category" class="form-select form-select-parkway" required>
                            <option value="Kinh nghiệm niềng răng">Kinh nghiệm niềng răng</option>
                            <option value="Kiến thức Implant">Kiến thức Implant</option>
                            <option value="Răng sứ thẩm mỹ">Răng sứ thẩm mỹ</option>
                            <option value="Nha khoa tổng quát">Nha khoa tổng quát</option>
                            <option value="Tin tức Parkway">Tin tức Parkway</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-parkway-navy">Tóm Tắt Bài Viết (Mô tả ngắn SEO)</label>
                        <textarea name="summary" rows="3" class="form-control form-control-parkway" placeholder="Mô tả tóm tắt nội dung gây ấn tượng...">{{ old('summary') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-parkway-navy">Nội Dung Chi Tiết Bài Viết (Hỗ trợ HTML)</label>
                        <textarea name="content" rows="10" class="form-control form-control-parkway" placeholder="Soạn thảo nội dung bài viết chia sẻ kiến thức nha khoa...">{{ old('content') }}</textarea>
                    </div>

                    <div class="d-flex gap-4 mb-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="postFeatured" checked>
                            <label class="form-check-label fw-semibold" for="postFeatured">Đánh dấu bài viết Nổi bật</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" value="1" id="postStatus" checked>
                            <label class="form-check-label fw-semibold" for="postStatus">Xuất bản ngay</label>
                        </div>
                    </div>

                    <div class="d-flex gap-3">
                        <button type="submit" class="btn-parkway py-3 px-4">
                            <i class="fa-solid fa-floppy-disk"></i> Xuất Bản Bài Viết
                        </button>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary rounded-pill py-3 px-4">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
