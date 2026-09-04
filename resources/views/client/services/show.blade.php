@extends('layouts.client')

@section('title', $service->title . ' - Nha Khoa Kind Smile 340 Phố Huế')

@section('content')

<!-- BREADCRUMB -->
<div class="bg-light py-3 border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-kindsmile-dark">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('services.index') }}" class="text-decoration-none text-kindsmile-dark">Dịch vụ</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $service->title }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    <div class="row g-5">
        <div class="col-lg-8">
            <span class="badge-kindsmile mb-2">{{ $service->category->name ?? 'Dịch vụ nha khoa' }}</span>
            <h1 class="font-display fw-bold text-kindsmile-dark display-6 mb-3">{{ $service->title }}</h1>
            
            <div class="d-flex flex-wrap gap-4 align-items-center bg-light p-3 rounded-4 mb-4 border border-warning">
                <div>
                    <span class="text-muted small d-block">CHI PHÍ ĐIỀU TRỊ:</span>
                    <strong class="text-kindsmile-orange fs-4">{{ $service->price_from ?? 'Liên hệ bác sĩ' }}</strong>
                </div>
                <div class="border-end style-divider" style="height: 35px;"></div>
                <div>
                    <span class="text-muted small d-block">BẢO HÀNH CHÍNH HÃNG:</span>
                    <strong class="text-kindsmile-dark fs-6">{{ $service->warranty_period ?? 'Theo phác đồ' }}</strong>
                </div>
            </div>

            <div class="lead text-secondary mb-4 p-3 bg-light rounded-3 border-start border-4 border-warning">
                {{ $service->summary }}
            </div>

            <div class="service-content-body fs-6 text-secondary mb-5">
                {!! $service->description !!}
            </div>

            <!-- CTA BOX IN ARTICLE -->
            <div class="p-4 bg-kindsmile-dark text-white rounded-4 shadow mb-5 text-center">
                <h3 class="fw-bold mb-2">Đăng Ký Tư Vấn Trực Tiếp Cùng Thạc Sĩ Bác Sĩ</h3>
                <p class="opacity-75 mb-3">Miễn phí chụp phim X-quang 3D CT ConeBeam & Quét mẫu hàm iTero 5D trị giá 2.500.000đ.</p>
                <a href="{{ route('appointment.create', ['service' => $service->id]) }}" class="btn-kindsmile fs-6">
                    <i class="fa-solid fa-calendar-check"></i> Đặt Lịch Hẹn Ngay
                </a>
            </div>
        </div>

        <!-- SIDEBAR -->
        <div class="col-lg-4">
            <div class="sidebar-sticky">
                <div class="quick-booking-card mb-4">
                    <h4 class="fw-bold text-kindsmile-dark mb-3"><i class="fa-solid fa-clock text-kindsmile-orange me-2"></i>Đặt Lịch Dịch Vụ Này</h4>
                    <form action="{{ route('appointment.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                        <div class="mb-3">
                            <input type="text" name="fullname" class="form-control form-control-parkway" placeholder="Họ và tên *" required>
                        </div>
                        <div class="mb-3">
                            <input type="tel" name="phone" class="form-control form-control-parkway" placeholder="Số điện thoại *" required>
                        </div>
                        <div class="mb-3">
                            <select name="branch_id" class="form-select form-select-parkway">
                                <option value="">-- Chọn cơ sở khám --</option>
                                @foreach($branches as $b)
                                    <option value="{{ $b->id }}">{{ $b->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <input type="date" name="preferred_date" class="form-control form-control-parkway" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="col-6">
                                <select name="preferred_time" class="form-select form-select-parkway" required>
                                    <option value="09:00">09:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="16:30">16:30</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn-parkway w-100 justify-content-center">Xác Nhận Đặt Lịch</button>
                    </form>
                </div>

                <!-- RELATED SERVICES -->
                @if($relatedServices->count() > 0)
                <div class="p-4 bg-white rounded-4 border shadow-sm">
                    <h5 class="fw-bold text-parkway-navy mb-3">Dịch Vụ Cùng Danh Mục</h5>
                    <ul class="list-unstyled mb-0">
                        @foreach($relatedServices as $rel)
                        <li class="mb-2 pb-2 border-bottom">
                            <a href="{{ route('services.show', $rel->slug) }}" class="text-decoration-none text-parkway-navy hover-teal fw-semibold">
                                <i class="fa-solid fa-chevron-right me-1 text-parkway-teal small"></i> {{ $rel->title }}
                            </a>
                            <div class="small text-muted ms-3">Giá từ: {{ $rel->price_from ?? 'Liên hệ' }}</div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
