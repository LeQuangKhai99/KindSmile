@extends('layouts.client')

@section('title', 'Cơ Sở Phòng Khám - Nha Khoa Kind Smile 340 Phố Huế')

@section('content')

<div class="page-header-banner">
    <div class="container text-center">
        <h1 class="page-header-title mb-3">Cơ Sở Phòng Khám Kind Smile</h1>
        <p class="page-header-subtitle" style="max-width: 750px; margin: 0 auto;">
            Trụ sở chính duy nhất tại 340 Phố Huế, Q. Hai Bà Trưng, Hà Nội — Đẳng cấp 5 sao chuẩn Y tế Quốc tế.
        </p>
    </div>
</div>

<div class="container py-5">
    @php
        $mainBranch = $branches->first();
        $mapUrl = "https://maps.app.goo.gl/Cae3odcvVeHQDjMN7";
        $embedIframeUrl = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.520448107937!2d105.850401!3d21.011854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab8b15d2a93b%3A0xa62174eeeb797437!2zMzQwIFBo4buRIEh14bq_LCBQaOG7kSBIdeG6vywgSGFpIELDsyBUcsawbmcsIEjDoCBO4buZaQ!5e0!3m2!1svi!2svn!4v1710000000000!5m2!1svi!2svn";
    @endphp

    <div class="row g-4 align-items-stretch mb-5">
        <!-- Left Column: Detailed Branch Information -->
        <div class="col-lg-5">
            <div class="p-4 p-md-5 bg-white rounded-4 border shadow-sm h-100 d-flex flex-column" style="border-top: 5px solid #F9571B !important;">
                <div class="mb-3">
                    <span class="badge bg-warning text-dark px-3 py-2 fs-6 rounded-pill fw-bold">
                        <i class="fa-solid fa-star me-1 text-danger"></i> Cơ Sở Chính Tận Tâm
                    </span>
                </div>

                <h2 class="font-display text-kindsmile-dark fw-bold fs-3 mb-3">
                    {{ $mainBranch ? $mainBranch->name : 'Nha Khoa Kind Smile - 340 Phố Huế' }}
                </h2>

                <div class="mb-4 flex-grow-1">
                    <div class="d-flex align-items-start gap-3 mb-3">
                        <div class="service-icon-box flex-shrink-0" style="width: 44px; height: 44px;">
                            <i class="fa-solid fa-location-dot text-danger"></i>
                        </div>
                        <div>
                            <strong class="text-dark d-block mb-1">Địa chỉ phòng khám:</strong>
                            <span class="text-secondary fw-semibold">
                                {{ $mainBranch ? $mainBranch->address : '340 Phố Huế, P. Phố Huế, Q. Hai Bà Trưng, Hà Nội' }}
                            </span>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3 mb-3">
                        <div class="service-icon-box flex-shrink-0" style="width: 44px; height: 44px;">
                            <i class="fa-solid fa-phone text-kindsmile-orange"></i>
                        </div>
                        <div>
                            <strong class="text-dark d-block mb-1">Hotline tư vấn & Đặt hẹn:</strong>
                            <a href="tel:0988888340" class="text-decoration-none text-kindsmile-orange fs-5 fw-bold me-2">098 888 8340</a>
                            <span class="text-muted">/</span>
                            <a href="tel:02439998340" class="text-decoration-none text-kindsmile-orange fs-5 fw-bold ms-2">024 3999 8340</a>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="service-icon-box flex-shrink-0" style="width: 44px; height: 44px;">
                            <i class="fa-solid fa-clock text-warning"></i>
                        </div>
                        <div>
                            <strong class="text-dark d-block mb-1">Giờ mở cửa phục vụ:</strong>
                            <span class="text-secondary fw-semibold">
                                {{ $mainBranch ? $mainBranch->working_hours : '08:30 - 19:30 (Thứ 2 - Chủ Nhật)' }}
                            </span>
                            <div class="small text-success fw-bold mt-1">
                                <i class="fa-solid fa-circle-check me-1"></i> Phục vụ xuyên suốt tất cả các ngày trong tuần
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <h5 class="fw-bold text-kindsmile-dark mb-3 fs-6">Đặc quyền khi thăm khám tại 340 Phố Huế:</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2 d-flex align-items-center gap-2 text-dark small fw-medium">
                            <i class="fa-solid fa-check text-success fs-6"></i> Chụp phim 3D CT ConeBeam & Quét mẫu hàm iTero 5D miễn phí
                        </li>
                        <li class="mb-2 d-flex align-items-center gap-2 text-dark small fw-medium">
                            <i class="fa-solid fa-check text-success fs-6"></i> 100% Đội ngũ Thạc sĩ Bác sĩ Răng Hàm Mặt giàu kinh nghiệm
                        </li>
                        <li class="mb-2 d-flex align-items-center gap-2 text-dark small fw-medium">
                            <i class="fa-solid fa-check text-success fs-6"></i> Hỗ trợ trả góp 0% lãi suất — Hợp đồng cam kết rõ ràng
                        </li>
                    </ul>
                </div>

                <div class="d-flex flex-column flex-sm-row gap-3 pt-3">
                    <a href="{{ route('appointment.create') }}" class="btn-kindsmile justify-content-center text-nowrap">
                        <i class="fa-solid fa-calendar-plus me-2"></i> Đặt Hẹn Khám
                    </a>
                    <a href="{{ $mapUrl }}" target="_blank" class="btn-kindsmile-outline justify-content-center text-nowrap">
                        <i class="fa-solid fa-map-location-dot me-2"></i> Xem Google Maps
                    </a>
                </div>
            </div>
        </div>

        <!-- Right Column: Interactive Embedded Map -->
        <div class="col-lg-7">
            <div class="bg-white rounded-4 border shadow-sm p-3 h-100 d-flex flex-column">
                <div class="d-flex align-items-center justify-content-between mb-3 px-2">
                    <h4 class="font-display text-kindsmile-dark fw-bold fs-5 mb-0">
                        <i class="fa-solid fa-map-marked-alt text-danger me-2"></i>Bản Đồ Chỉ Đường Trực Tiếp
                    </h4>
                    <a href="{{ $mapUrl }}" target="_blank" class="btn btn-sm btn-light border fw-semibold text-secondary">
                        Mở tab mới <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                    </a>
                </div>

                <div class="position-relative flex-grow-1 rounded-4 overflow-hidden" style="min-height: 400px; border: 1px solid #E2E8F0;">
                    <iframe 
                        src="{{ $embedIframeUrl }}" 
                        width="100%" 
                        height="100%" 
                        style="border:0; min-height: 420px;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <div class="p-3 bg-light rounded-3 mt-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <span class="small text-secondary fw-semibold">
                        <i class="fa-solid fa-location-dot text-danger me-1"></i> 340 Phố Huế, P. Phố Huế, Q. Hai Bà Trưng, Hà Nội
                    </span>
                    <a href="{{ $mapUrl }}" target="_blank" class="small text-kindsmile-orange fw-bold text-decoration-none">
                        Chỉ đường tới phòng khám <i class="fa-solid fa-chevron-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
