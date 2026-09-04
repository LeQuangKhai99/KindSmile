@extends('layouts.admin')

@section('title', 'Quản Lý Dịch Vụ - Admin Parkway')
@section('header_title', 'Danh Sách Dịch Vụ Nha Khoa')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <p class="text-secondary mb-0">Quản lý toàn bộ danh mục dịch vụ hiển thị ngoài trang khách hàng</p>
    <a href="{{ route('admin.services.create') }}" class="btn-parkway">
        <i class="fa-solid fa-plus"></i> Thêm Dịch Vụ Mới
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">ID</th>
                    <th>Tên Dịch Vụ</th>
                    <th>Danh Mục</th>
                    <th>Giá Khởi Điểm</th>
                    <th>Bảo Hành</th>
                    <th>Nổi Bật</th>
                    <th>Trạng Thái</th>
                    <th class="pe-4 text-end">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $serv)
                <tr>
                    <td class="ps-4 text-muted">#{{ $serv->id }}</td>
                    <td><strong class="text-parkway-navy">{{ $serv->title }}</strong></td>
                    <td><span class="badge bg-light text-dark border">{{ $serv->category->name ?? 'Không phân loại' }}</span></td>
                    <td><span class="fw-bold text-parkway-teal">{{ $serv->price_from ?? 'Liên hệ' }}</span></td>
                    <td>{{ $serv->warranty_period ?? '-' }}</td>
                    <td>
                        @if($serv->is_featured)
                            <span class="badge bg-warning text-dark"><i class="fa-solid fa-star me-1"></i>Nổi bật</span>
                        @else
                            <span class="text-muted small">Thường</span>
                        @endif
                    </td>
                    <td>
                        @if($serv->status)
                            <span class="badge bg-success">Hiển thị</span>
                        @else
                            <span class="badge bg-secondary">Ẩn</span>
                        @endif
                    </td>
                    <td class="pe-4 text-end">
                        <a href="{{ route('admin.services.edit', $serv->id) }}" class="btn btn-sm btn-outline-teal me-1">
                            <i class="fa-solid fa-pen"></i> Sửa
                        </a>
                        <form action="{{ route('admin.services.destroy', $serv->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có muốn xóa dịch vụ này?')">
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
                    <td colspan="8" class="text-center py-4 text-muted">Chưa có dịch vụ nào.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-3 border-top">
        {{ $services->links() }}
    </div>
</div>

@endsection
