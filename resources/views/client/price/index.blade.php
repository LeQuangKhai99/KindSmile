@extends('layouts.client')

@section('title', 'Bảng Giá Dịch Vụ Nha Khoa Minh Bạch - Kind Smile 340 Phố Huế')

@section('content')

<div class="page-header-banner">
    <div class="container text-center">
        <h1 class="page-header-title mb-3">Bảng Giá Dịch Vụ Minh Bạch 2026</h1>
        <p class="page-header-subtitle" style="max-width: 750px; margin: 0 auto;">
            Cam kết công khai bảng giá trọn gói, không phát sinh phụ phí ẩn. Hỗ trợ trả góp 0% lãi suất cùng hợp đồng bảo hành chính hãng.
        </p>
    </div>
</div>

<div class="container py-5">
    @foreach($categories as $cat)
        @if($cat->priceItems->count() > 0)
        <div class="mb-5">
            <div class="d-flex align-items-center gap-3 mb-3">
                <i class="fa-solid {{ $cat->icon ?? 'fa-receipt' }} text-kindsmile-orange fs-3"></i>
                <h2 class="font-display fw-bold text-kindsmile-dark fs-3 mb-0">{{ $cat->name }}</h2>
            </div>
            
            <div class="table-responsive">
                <table class="price-table">
                    <thead>
                        <tr>
                            <th style="width: 35%;">Tên Hạng Mục / Gói Điều Trị</th>
                            <th style="width: 15%;">Đơn Vị Tính</th>
                            <th style="width: 20%;">Giá Niêm Yết (VNĐ)</th>
                            <th style="width: 15%;">Bảo Hành</th>
                            <th style="width: 15%;">Ghi Chú</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cat->priceItems as $item)
                        <tr>
                            <td>
                                <strong class="text-kindsmile-dark">{{ $item->name }}</strong>
                            </td>
                            <td><span class="badge bg-light text-dark border">{{ $item->unit }}</span></td>
                            <td>
                                @if($item->discount_price)
                                    <div class="text-danger fw-bold fs-5">{{ number_format($item->discount_price, 0, ',', '.') }} VNĐ</div>
                                    <div class="text-muted text-decoration-line-through small">{{ number_format($item->price, 0, ',', '.') }} VNĐ</div>
                                @else
                                    <div class="text-kindsmile-orange fw-bold fs-5">{{ number_format($item->price, 0, ',', '.') }} VNĐ</div>
                                @endif
                            </td>
                            <td>
                                <span class="badge-kindsmile">{{ $item->warranty ?? 'Theo phác đồ' }}</span>
                            </td>
                            <td class="small text-secondary">{{ $item->note ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    @endforeach

    <div class="p-4 bg-light rounded-4 border border-warning text-center mt-5 shadow-sm">
        <h4 class="fw-bold text-kindsmile-dark mb-2"><i class="fa-solid fa-calculator text-kindsmile-orange me-2"></i>Cần Báo Giá Chi Tiết Theo Tình Trạng Răng Mới Nhất?</h4>
        <p class="text-secondary mb-3">Đăng ký hẹn khám để bác sĩ trực tiếp chụp X-quang 3D và đưa ra phác đồ điều trị kèm dự toán chính xác nhất.</p>
        <a href="{{ route('appointment.create') }}" class="btn-kindsmile fs-6">
            <i class="fa-solid fa-calendar-check"></i> Đặt Lịch Tư Vấn Miễn Phí
        </a>
    </div>
</div>

@endsection
