@extends('layouts.admin')

@section('title', 'Quản Lý Lịch Hẹn - Admin Parkway')
@section('header_title', 'Danh Sách Lịch Hẹn Khám Khách Hàng')

@section('content')

<div class="card border-0 shadow-sm rounded-4 mb-4">
    <div class="card-body p-4">
        <!-- FILTER FORM -->
        <form action="{{ route('admin.appointments.index') }}" method="GET" class="row g-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control form-control-parkway" placeholder="Tìm theo Tên, SĐT, Mã lịch hẹn..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select form-select-parkway">
                    <option value="">-- Tất cả trạng thái --</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Chờ xác nhận</option>
                    <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Đã xác nhận</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Hoàn tất khám</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn-parkway w-100 justify-content-center">
                    <i class="fa-solid fa-filter"></i> Lọc
                </button>
            </div>
            <div class="col-md-3 text-end">
                <a href="{{ route('admin.appointments.index') }}" class="btn btn-outline-secondary rounded-pill w-100">
                    <i class="fa-solid fa-rotate"></i> Làm mới
                </a>
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">Mã Hẹn</th>
                    <th>Khách Hàng</th>
                    <th>Số Điện Thoại</th>
                    <th>Dịch Vụ Khám</th>
                    <th>Chi Nhánh</th>
                    <th>Ngày Khám</th>
                    <th>Trạng Thái</th>
                    <th class="pe-4 text-end">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appointments as $app)
                <tr>
                    <td class="ps-4">
                        <span class="badge bg-parkway-navy text-warning font-monospace">{{ $app->booking_code }}</span>
                    </td>
                    <td><strong>{{ $app->fullname }}</strong></td>
                    <td><a href="tel:{{ $app->phone }}" class="text-parkway-teal fw-bold text-decoration-none">{{ $app->phone }}</a></td>
                    <td><span class="badge-parkway">{{ $app->service->title ?? 'Tổng quát' }}</span></td>
                    <td><small class="text-muted">{{ $app->branch->name ?? 'Parkway Phố Huế' }}</small></td>
                    <td>
                        <div>{{ \Carbon\Carbon::parse($app->preferred_date)->format('d/m/Y') }}</div>
                        <small class="text-muted">{{ $app->preferred_time }}</small>
                    </td>
                    <td>
                        @if($app->status == 'pending')
                            <span class="badge bg-warning text-dark">Chờ xác nhận</span>
                        @elseif($app->status == 'confirmed')
                            <span class="badge bg-success">Đã xác nhận</span>
                        @elseif($app->status == 'completed')
                            <span class="badge bg-primary">Hoàn tất</span>
                        @else
                            <span class="badge bg-secondary">Đã hủy</span>
                        @endif
                    </td>
                    <td class="pe-4 text-end">
                        <a href="{{ route('admin.appointments.show', $app->id) }}" class="btn btn-sm btn-outline-teal me-1">
                            <i class="fa-solid fa-pen-to-square"></i> Cập nhật
                        </a>
                        <form action="{{ route('admin.appointments.destroy', $app->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa lịch hẹn này?')">
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
                    <td colspan="8" class="text-center py-4 text-muted">Không tìm thấy lịch hẹn nào phù hợp.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-3 border-top">
        {{ $appointments->links() }}
    </div>
</div>

@endsection
