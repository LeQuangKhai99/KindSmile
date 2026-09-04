@extends('layouts.admin')

@section('title', 'Quản Lý Bác Sĩ - Admin Parkway')
@section('header_title', 'Danh Sách Đội Ngũ Bác Sĩ')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <p class="text-secondary mb-0">Quản lý hồ sơ bác sĩ, bằng cấp và phân công chi nhánh làm việc</p>
    <a href="{{ route('admin.doctors.create') }}" class="btn-parkway">
        <i class="fa-solid fa-user-plus"></i> Thêm Bác Sĩ Mới
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">ID</th>
                    <th>Họ và Tên</th>
                    <th>Chức Danh</th>
                    <th>Chuyên Khoa</th>
                    <th>Kinh Nghiệm</th>
                    <th>Chi Nhánh làm việc</th>
                    <th>Trạng Thái</th>
                    <th class="pe-4 text-end">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @forelse($doctors as $doc)
                <tr>
                    <td class="ps-4 text-muted">#{{ $doc->id }}</td>
                    <td><strong class="text-parkway-navy fs-6">{{ $doc->name }}</strong></td>
                    <td><span class="badge bg-warning text-dark">{{ $doc->title }}</span></td>
                    <td><span class="text-parkway-teal fw-semibold">{{ $doc->specialization }}</span></td>
                    <td>{{ $doc->experience_years }} năm</td>
                    <td><small class="text-muted">{{ $doc->branch->name ?? 'Tất cả chi nhánh' }}</small></td>
                    <td>
                        @if($doc->status)
                            <span class="badge bg-success">Đang làm việc</span>
                        @else
                            <span class="badge bg-secondary">Tạm ẩn</span>
                        @endif
                    </td>
                    <td class="pe-4 text-end">
                        <a href="{{ route('admin.doctors.edit', $doc->id) }}" class="btn btn-sm btn-outline-teal me-1">
                            <i class="fa-solid fa-pen"></i> Sửa
                        </a>
                        <form action="{{ route('admin.doctors.destroy', $doc->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Xóa bác sĩ này?')">
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
                    <td colspan="8" class="text-center py-4 text-muted">Chưa có dữ liệu bác sĩ.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-3 border-top">
        {{ $doctors->links() }}
    </div>
</div>

@endsection
