@extends('layouts.client')

@section('title', 'Đặt Lịch Hẹn Khám - Kind Smile 340 Phố Huế')

@section('content')

<div class="page-header-banner">
    <div class="container text-center">
        <h1 class="page-header-title mb-3">Đăng Ký Khám & Tư Vấn Mới</h1>
        <p class="page-header-subtitle" style="max-width: 700px; margin: 0 auto;">
            Miễn phí 100% phí khám ban đầu, chụp phim X-quang 3D CT ConeBeam & Quét răng iTero 5D trị giá 2.500.000 VNĐ.
        </p>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="quick-booking-card shadow-lg p-4 p-md-5">
                <div class="d-flex align-items-center gap-3 mb-4 border-bottom pb-3">
                    <i class="fa-solid fa-calendar-check text-kindsmile-orange fs-2"></i>
                    <div>
                        <h3 class="font-display text-kindsmile-dark fw-bold fs-4 mb-0">Phiếu Đăng Ký Lịch Hẹn</h3>
                        <small class="text-secondary">Vui lòng điền đầy đủ thông tin bên dưới, nhân viên Kind Smile sẽ gọi điện xác nhận trong vòng 15 phút.</small>
                    </div>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger rounded-3 mb-4">
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('appointment.store') }}" method="POST">
                    @csrf
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-kindsmile-dark">Họ và tên của bạn *</label>
                            <input type="text" name="fullname" class="form-control form-control-parkway" placeholder="Ví dụ: Nguyễn Văn An" value="{{ old('fullname') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-kindsmile-dark">Số điện thoại *</label>
                            <input type="tel" name="phone" class="form-control form-control-parkway" placeholder="Ví dụ: 0912 345 678" value="{{ old('phone') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-kindsmile-dark">Địa chỉ Email (nếu có)</label>
                        <input type="email" name="email" class="form-control form-control-parkway" placeholder="Ví dụ: an.nguyen@gmail.com" value="{{ old('email') }}">
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-kindsmile-dark">Dịch vụ nha khoa cần khám</label>
                            <select name="service_id" class="form-select form-select-parkway">
                                <option value="">-- Chọn dịch vụ quan tâm --</option>
                                @foreach($services as $serv)
                                    <option value="{{ $serv->id }}" {{ request('service') == $serv->id ? 'selected' : '' }}>{{ $serv->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-kindsmile-dark">Chi nhánh mong muốn khám</label>
                            <select name="branch_id" class="form-select form-select-parkway">
                                <option value="">-- Chọn chi nhánh gần bạn --</option>
                                @foreach($branches as $b)
                                    <option value="{{ $b->id }}">{{ $b->name }} ({{ $b->city }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-kindsmile-dark">Ngày hẹn dự kiến *</label>
                            <input type="date" name="preferred_date" class="form-control form-control-parkway" value="{{ old('preferred_date', date('Y-m-d')) }}" min="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-kindsmile-dark">Khung giờ phù hợp *</label>
                            <select name="preferred_time" class="form-select form-select-parkway" required>
                                <option value="09:00">09:00 Sáng</option>
                                <option value="10:30">10:30 Sáng</option>
                                <option value="14:00">14:00 Chiều</option>
                                <option value="16:00">16:00 Chiều</option>
                                <option value="18:00">18:00 Tối</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-kindsmile-dark">Mô tả thêm tình trạng răng hoặc yêu cầu khác</label>
                        <textarea name="notes" rows="3" class="form-control form-control-parkway" placeholder="Ví dụ: Răng bị đau nhức khi ăn đồ lạnh, muốn khám niềng răng khay trong suốt...">{{ old('notes') }}</textarea>
                    </div>

                    <button type="submit" class="btn-kindsmile w-100 justify-content-center py-3 fs-5">
                        <i class="fa-solid fa-paper-plane"></i> XÁC NHẬN ĐẶT LỊCH HẸN
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
