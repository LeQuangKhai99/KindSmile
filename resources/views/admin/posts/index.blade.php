@extends('layouts.admin')

@section('title', 'Quản Lý Bài Viết - Admin Parkway')
@section('header_title', 'Danh Sách Bài Viết & Kiến Thức Nha Khoa')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <p class="text-secondary mb-0">Viết bài tư vấn, chia sẻ kinh nghiệm niềng răng, implant và nâng cao nhận diện thương hiệu</p>
    <a href="{{ route('admin.posts.create') }}" class="btn-parkway">
        <i class="fa-solid fa-pen-nib"></i> Viết Bài Mới
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">ID</th>
                    <th>Tiêu Đề Bài Viết</th>
                    <th>Chủ Đề</th>
                    <th>Lượt Xem</th>
                    <th>Nổi Bật</th>
                    <th>Trạng Thái</th>
                    <th>Ngày Đăng</th>
                    <th class="pe-4 text-end">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                <tr>
                    <td class="ps-4 text-muted">#{{ $post->id }}</td>
                    <td>
                        <strong class="text-parkway-navy d-block" style="max-width: 350px;">{{ $post->title }}</strong>
                        <small class="text-muted">{{ Str::limit($post->summary, 60) }}</small>
                    </td>
                    <td><span class="badge-kindsmile">{{ $post->category }}</span></td>
                    <td><i class="fa-regular fa-eye me-1 text-muted"></i>{{ $post->views }}</td>
                    <td>
                        @if($post->is_featured)
                            <span class="badge bg-warning text-dark"><i class="fa-solid fa-star me-1"></i>Hot</span>
                        @else
                            <span class="text-muted small">-</span>
                        @endif
                    </td>
                    <td>
                        @if($post->status)
                            <span class="badge bg-success">Đã xuất bản</span>
                        @else
                            <span class="badge bg-secondary">Bản nháp</span>
                        @endif
                    </td>
                    <td><small class="text-muted">{{ $post->created_at->format('d/m/Y') }}</small></td>
                    <td class="pe-4 text-end">
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-outline-teal me-1">
                            <i class="fa-solid fa-pen"></i> Sửa
                        </a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Xóa bài viết này?')">
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
                    <td colspan="8" class="text-center py-4 text-muted">Chưa có bài viết nào.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-3 border-top">
        {{ $posts->links() }}
    </div>
</div>

@endsection
