@extends('layouts.client')

@section('title', 'Danh Sách Dịch Vụ Nha Khoa Chuyên Sâu - Kind Smile 340 Phố Huế')

@section('content')

<div class="page-header-banner">
    <div class="container text-center">
        <h1 class="page-header-title mb-3">Dịch Vụ Nha Khoa Chuyên Sâu</h1>
        <p class="page-header-subtitle" style="max-width: 700px; margin: 0 auto;">
            Cung cấp đầy đủ các giải pháp chỉnh nha niềng răng, cấy ghép Implant, răng sứ thẩm mỹ và chăm sóc răng miệng tổng quát theo chuẩn y khoa quốc tế.
        </p>
    </div>
</div>

<div class="container py-5">
    @foreach($categories as $cat)
        <div class="mb-5">
            <div class="d-flex align-items-center gap-3 mb-4 border-bottom pb-3">
                <div class="service-icon-box mb-0" style="width: 48px; height: 48px; font-size: 1.35rem;">
                    <i class="fa-solid {{ $cat->icon ?? 'fa-tooth' }}"></i>
                </div>
                <div>
                    <h2 class="font-display fw-bold text-kindsmile-dark fs-3 mb-0">{{ $cat->name }}</h2>
                    <p class="text-secondary small mb-0">{{ $cat->description }}</p>
                </div>
            </div>

            <div class="row g-4">
                @foreach($cat->services as $serv)
                    <div class="col-md-6 col-lg-4">
                        <div class="service-card">
                            <span class="badge-kindsmile mb-2 me-auto">{{ $cat->name }}</span>
                            <h3 class="font-display text-kindsmile-dark fs-5 fw-bold mb-2">{{ $serv->title }}</h3>
                            <p class="text-secondary small flex-grow-1 mb-4">{{ $serv->summary }}</p>
                            <div class="border-top pt-3 d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-muted style-small" style="font-size: 0.75rem;">GIÁ CHỈ TỪ</div>
                                    <div class="fw-bold text-kindsmile-orange fs-5">{{ $serv->price_from ?? 'Liên hệ' }}</div>
                                </div>
                                <a href="{{ route('services.show', $serv->slug) }}" class="btn-kindsmile text-white text-decoration-none py-2 px-3 fs-6">
                                    Chi tiết <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>

@endsection
