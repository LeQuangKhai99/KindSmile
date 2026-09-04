@extends('layouts.admin')

@section('title', 'Chi Tiết Lịch Hẹn #' . $appointment->booking_code)
@section('header_title', 'Chi Tiết & Cập Nhật Lịch Hẹn #' . $appointment->booking_code)

@section('content')

<div class="row g-4">
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-header bg-white p-4 border-bottom">
                <h5 class="fw-bold text-parkway-navy mb-0"><i class="fa-solid fa-user-check text-parkway-teal me-2"></i>Thông Tin Khách Hàng Đăng Ký</h5>
            </div>
            <div class="card-body p-4">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 35%;" class="bg-light">Mã Đặt Hẹn</th>
                        <td><strong class="text-warning bg-parkway-navy px-2 py-1 rounded font-monospace">{{ $appointment->booking_code }}</strong></td>
                    </tr>
                    <tr>
                        <th class="bg-light">Họ và tên</th>
                        <td><strong class="fs-5 text-parkway-navy">{{ $appointment->fullname }}</strong></td>
                    </tr>
                    <tr>
                        <th class="bg-light">Số điện thoại</th>
                        <td><a href="tel:{{ $appointment->phone }}" class="fw-bold text-parkway-teal fs-5 text-decoration-none">{{ $appointment->phone }}</a></td>
                    </tr>
                    <tr>
                        <th class="bg-light">Email</th>
                        <td>{{ $appointment->email ?? 'Chưa cung cấp' }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">Dịch vụ yêu cầu</th>
                        <td><span class="badge-parkway fs-6">{{ $appointment->service->title ?? 'Tư vấn nha khoa tổng quát' }}</span></td>
                    </tr>
                    <tr>
                        <th class="bg-light">Chi nhánh đăng ký</th>
                        <td>{{ $appointment->branch->name ?? 'Mặc định Chi nhánh Phố Huế' }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">Thời gian hẹn khám</th>
                        <td><strong class="text-danger">{{ \Carbon\Carbon::parse($appointment->preferred_date)->format('d/m/Y') }}</strong> lúc <strong>{{ $appointment->preferred_time }}</strong></td>
                    </tr>
                    <tr>
                        <th class="bg-light">Ghi chú từ khách</th>
                        <td><em class="text-secondary">{{ $appointment->notes ?? 'Không có ghi chú' }}</em></td>
                    </tr>
                    <tr>
                        <th class="bg-light">Ngày khởi tạo</th>
                        <td>{{ $appointment->created_at->format('d/m/Y H:i:s') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-header bg-white p-4 border-bottom">
                <h5 class="fw-bold text-parkway-navy mb-0"><i class="fa-solid fa-list-check text-parkway-teal me-2"></i>Duyệt & Cập Nhật Trạng Thái</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.appointments.update-status', $appointment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold text-parkway-navy">Trạng Thái Hiện Tại *</label>
                        <select name="status" class="form-select form-select-parkway fs-6" required>
                            <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Chờ xác nhận (Mới tạo)</option>
                            <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>Đã gọi xác nhận xếp lịch</option>
                            <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Đã hoàn tất khám bệnh</option>
                            <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Đã hủy hẹn</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-parkway-navy">Ghi Chú Nội Bộ (Admin / Lễ Tân)</label>
                        <textarea name="admin_note" rows="4" class="form-control form-control-parkway" placeholder="Ví dụ: Đã gọi điện lúc 10h xác nhận hẹn với BS Hùng...">{{ old('admin_note', $appointment->admin_note) }}</textarea>
                    </div>

                    <button type="submit" class="btn-parkway w-100 justify-content-center py-3 fs-6">
                        <i class="fa-solid fa-floppy-disk"></i> LƯU CẬP NHẬT TRẠNG THÁI
                    </button>
                </form>
            </div>
        </div>

        <div class="text-end">
            <a href="{{ route('admin.appointments.index') }}" class="btn btn-outline-secondary rounded-pill">
                <i class="fa-solid fa-arrow-left me-1"></i> Quay lại danh sách lịch hẹn
            </a>
        </div>
    </div>
</div>

@endsection
