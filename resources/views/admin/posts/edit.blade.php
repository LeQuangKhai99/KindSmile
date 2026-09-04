@extends('layouts.admin')

@section('title', 'Sửa Bài Viết - Admin Parkway')
@section('header_title', 'Chỉnh Sửa Bài Viết #' . $post->id)

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold text-parkway-navy">Tiêu Đề Bài Viết *</label>
                        <input type="text" name="title" class="form-control form-control-parkway" value="{{ old('title', $post->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-parkway-navy">Chuyên Mục *</label>
                        <select name="category" class="form-select form-select-parkway" required>
                            <option value="Kinh nghiệm niềng răng" {{ $post->category == 'Kinh nghiệm niềng răng' ? 'selected' : '' }}>Kinh nghiệm niềng răng</option>
                            <option value="Kiến thức Implant" {{ $post->category == 'Kiến thức Implant' ? 'selected' : '' }}>Kiến thức Implant</option>
                            <option value="Răng sứ thẩm mỹ" {{ $post->category == 'Răng sứ thẩm mỹ' ? 'selected' : '' }}>Răng sứ thẩm mỹ</option>
                            <option value="Nha khoa tổng quát" {{ $post->category == 'Nha khoa tổng quát' ? 'selected' : '' }}>Nha khoa tổng quát</option>
                            <option value="Tin tức Parkway" {{ $post->category == 'Tin tức Parkway' ? 'selected' : '' }}>Tin tức Parkway</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-parkway-navy">Tóm Tắt Bài Viết</label>
                        <textarea name="summary" rows="3" class="form-control form-control-parkway">{{ old('summary', $post->summary) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-parkway-navy">Nội Dung Chi Tiết</label>
                        <textarea name="content" rows="10" class="form-control form-control-parkway">{{ old('content', $post->content) }}</textarea>
                    </div>

                    <div class="d-flex gap-4 mb-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="postFeatured" {{ $post->is_featured ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="postFeatured">Đánh dấu bài viết Nổi bật</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" value="1" id="postStatus" {{ $post->status ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="postStatus">Xuất bản</label>
                        </div>
                    </div>

                    <div class="d-flex gap-3">
                        <button type="submit" class="btn-parkway py-3 px-4">
                            <i class="fa-solid fa-floppy-disk"></i> Cập Nhật Bài Viết
                        </button>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary rounded-pill py-3 px-4">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
