@extends('layouts.admin')

@section('title', 'Bảng Điều Khiển Admin - Nha Khoa Parkway')
@section('header_title', 'Tổng Quan Hoạt Động Hệ Thống')

@section('content')

<!-- STATS COUNTER CARDS -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card">
            <div>
                <div class="text-secondary small fw-semibold">TỔNG LỊCH HẸN</div>
                <div class="fs-2 fw-bold text-parkway-navy">{{ $stats['total_appointments'] }}</div>
            </div>
            <div class="stat-icon bg-parkway-light-teal text-parkway-teal">
                <i class="fa-solid fa-calendar-check"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div>
                <div class="text-secondary small fw-semibold">CHỜ XÁC NHẬN</div>
                <div class="fs-2 fw-bold text-warning">{{ $stats['pending_appointments'] }}</div>
            </div>
            <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                <i class="fa-solid fa-hourglass-half"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div>
                <div class="text-secondary small fw-semibold">ĐÃ XÁC NHẬN KHÁM</div>
                <div class="fs-2 fw-bold text-success">{{ $stats['confirmed_appointments'] }}</div>
            </div>
            <div class="stat-icon bg-success bg-opacity-10 text-success">
                <i class="fa-solid fa-circle-check"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div>
                <div class="text-secondary small fw-semibold">TỔNG BÁC SĨ</div>
                <div class="fs-2 fw-bold text-info">{{ $stats['total_doctors'] }}</div>
            </div>
            <div class="stat-icon bg-info bg-opacity-10 text-info">
                <i class="fa-solid fa-user-doctor"></i>
            </div>
        </div>
    </div>
</div>

<!-- RECENT APPOINTMENTS TABLE -->
<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
    <div class="card-header bg-white p-4 border-bottom d-flex justify-content-between align-items-center">
        <div>
            <h5 class="fw-bold text-parkway-navy mb-0"><i class="fa-solid fa-list-check text-parkway-teal me-2"></i>Lịch Hẹn Khám Mới Nhất</h5>
            <small class="text-muted">Danh sách khách hàng đăng ký khám trực tuyến cần xử lý</small>
        </div>
        <a href="{{ route('admin.appointments.index') }}" class="btn btn-sm btn-outline-teal rounded-pill px-3">
            Xem tất cả lịch hẹn <i class="fa-solid fa-arrow-right me-1"></i>
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">Mã Lịch Hẹn</th>
                    <th>Khách Hàng</th>
                    <th>Số Điện Thoại</th>
                    <th>Dịch Vụ Regist</th>
                    <th>Chi Nhánh</th>
                    <th>Ngày & Giờ Hẹn</th>
                    <th>Trạng Thái</th>
                    <th class="pe-4 text-end">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentAppointments as $app)
                <tr>
                    <td class="ps-4">
                        <span class="badge bg-parkway-navy text-warning font-monospace">{{ $app->booking_code }}</span>
                    </td>
                    <td><strong class="text-parkway-navy">{{ $app->fullname }}</strong></td>
                    <td>{{ $app->phone }}</td>
                    <td><span class="badge-parkway">{{ $app->service->title ?? 'Tư vấn tổng quát' }}</span></td>
                    <td><small class="text-muted">{{ $app->branch->name ?? 'Parkway Phố Huế' }}</small></td>
                    <td>
                        <div><i class="fa-regular fa-calendar me-1 text-parkway-teal"></i>{{ \Carbon\Carbon::parse($app->preferred_date)->format('d/m/Y') }}</div>
                        <small class="text-muted"><i class="fa-regular fa-clock me-1"></i>{{ $app->preferred_time }}</small>
                    </td>
                    <td>
                        @if($app->status == 'pending')
                            <span class="badge bg-warning text-dark"><i class="fa-solid fa-hourglass-start me-1"></i>Chờ xác nhận</span>
                        @elseif($app->status == 'confirmed')
                            <span class="badge bg-success"><i class="fa-solid fa-check me-1"></i>Đã xác nhận</span>
                        @elseif($app->status == 'completed')
                            <span class="badge bg-primary"><i class="fa-solid fa-flag-checkered me-1"></i>Hoàn tất</span>
                        @else
                            <span class="badge bg-secondary">Đã hủy</span>
                        @endif
                    </td>
                    <td class="pe-4 text-end">
                        <a href="{{ route('admin.appointments.show', $app->id) }}" class="btn btn-sm btn-light border text-parkway-teal" title="Xem chi tiết & Cập nhật">
                            <i class="fa-solid fa-eye"></i> Xử lý
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-4 text-muted">Chưa có lịch hẹn nào.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
