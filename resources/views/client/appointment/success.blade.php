@extends('layouts.client')

@section('title', 'Đặt Lịch Hẹn Thành Công - Nha Khoa Parkway')

@section('content')

<div class="container py-5 my-4">
    <div class="row justify-content-center">
        <div class="col-lg-7 text-center">
            <div class="p-5 bg-white rounded-5 shadow-lg border border-teal">
                <div class="mb-4">
                    <i class="fa-solid fa-circle-check text-parkway-teal display-1"></i>
                </div>
                <h1 class="font-display fw-bold text-parkway-navy fs-2 mb-2">ĐẶT LỊCH HẸN THÀNH CÔNG!</h1>
                <p class="text-secondary fs-6 mb-4">Cảm ơn quý khách <strong>{{ $appointment->fullname }}</strong> đã tin tưởng đăng ký khám tại Nha Khoa Parkway.</p>

                <div class="p-4 bg-parkway-mint rounded-4 text-start mb-4 border">
                    <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                        <span class="text-secondary fw-semibold">MÃ LỊCH HẸN TRUY XUẤT:</span>
                        <span class="badge bg-parkway-navy text-warning fs-5 px-3 py-2 fw-bold font-monospace">{{ $appointment->booking_code }}</span>
                    </div>
                    <div class="row g-2 small text-dark">
                        <div class="col-6"><strong>Họ và tên:</strong> {{ $appointment->fullname }}</div>
                        <div class="col-6"><strong>Số điện thoại:</strong> {{ $appointment->phone }}</div>
                        <div class="col-6"><strong>Ngày hẹn:</strong> {{ \Carbon\Carbon::parse($appointment->preferred_date)->format('d/m/Y') }}</div>
                        <div class="col-6"><strong>Giờ hẹn:</strong> {{ $appointment->preferred_time }}</div>
                        <div class="col-12 mt-2"><strong>Dịch vụ:</strong> {{ $appointment->service->title ?? 'Tư vấn tổng quát' }}</div>
                        <div class="col-12"><strong>Chi nhánh:</strong> {{ $appointment->branch->name ?? 'Parkway Phố Huế' }}</div>
                    </div>
                </div>

                <div class="alert alert-info rounded-3 text-start small mb-4">
                    <i class="fa-solid fa-info-circle me-1"></i> Nhân viên chăm sóc khách hàng của Nha khoa Parkway sẽ liên hệ qua SĐT <strong>{{ $appointment->phone }}</strong> trong vòng 15-30 phút để xác nhận lại lịch hẹn.
                </div>

                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('home') }}" class="btn-parkway-outline">
                        <i class="fa-solid fa-house"></i> Về Trang Chủ
                    </a>
                    <a href="{{ route('services.index') }}" class="btn-parkway">
                        Khám Phá Dịch Vụ Khác
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
