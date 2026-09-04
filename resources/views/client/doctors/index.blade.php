@extends('layouts.client')

@section('title', 'Đội Ngũ Bác Sĩ - Nha Khoa Kind Smile 340 Phố Huế')

@section('content')

<div class="page-header-banner">
    <div class="container text-center">
        <h1 class="page-header-title mb-3">Đội Ngũ Thạc Sĩ Bác Sĩ Chuyên Khoa</h1>
        <p class="page-header-subtitle" style="max-width: 750px; margin: 0 auto;">
            Hội tụ hơn 30 chuyên gia bác sĩ hàng đầu về Niềng răng Invisalign, Trồng răng Implant và Phục hình Răng sứ Thẩm mỹ tại Việt Nam.
        </p>
    </div>
</div>

<div class="container py-5">
    <div class="row g-4">
        @foreach($doctors as $doc)
        <div class="col-md-6 col-lg-4">
            <div class="doctor-card d-flex flex-column">
                <div class="doctor-img-wrap">
                    <div class="doctor-avatar-circle">
                        <i class="fa-solid fa-user-doctor"></i>
                    </div>
                    <h3 class="font-display text-kindsmile-dark fw-bold fs-4 mb-1">{{ $doc->name }}</h3>
                    <div class="badge bg-warning text-dark fw-bold mb-2">{{ $doc->title }}</div>
                </div>
                <div class="doctor-info d-flex flex-column flex-grow-1">
                    <div class="p-3 bg-light rounded-3 mb-3 border border-warning">
                        <p class="small text-kindsmile-orange fw-bold mb-1"><i class="fa-solid fa-star me-1"></i>Chuyên khoa chính:</p>
                        <p class="small text-dark fw-semibold mb-0">{{ $doc->specialization }}</p>
                    </div>
                    <p class="small text-secondary mb-3"><i class="fa-solid fa-award text-kindsmile-orange me-2"></i>{{ $doc->experience_years }} năm kinh nghiệm lâm sàng</p>
                    <p class="small text-muted mb-4 flex-grow-1">{{ $doc->bio }}</p>
                    
                    <div class="pt-3 border-top mt-auto">
                        <div class="d-flex align-items-center text-muted small mb-3">
                            <i class="fa-solid fa-location-dot text-kindsmile-orange me-2"></i>
                            <span class="text-truncate" title="{{ $doc->branch->name ?? 'Kind Smile 340 Phố Huế' }}">
                                {{ $doc->branch->name ?? 'Kind Smile 340 Phố Huế' }}
                            </span>
                        </div>
                        <a href="{{ route('appointment.create') }}" class="btn-kindsmile w-100 justify-content-center text-white py-2.5 px-3 fs-6 text-nowrap">
                            <i class="fa-solid fa-calendar-check me-1"></i> Đặt Lịch Khám Bác Sĩ
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
