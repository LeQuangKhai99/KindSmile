@extends('layouts.client')

@section('title', 'Nha Khoa Kind Smile - 340 Phố Huế, Hà Nội | Tận Tâm Như Gia Đình')

@section('content')

<!-- HERO SECTION WITH CRISP CONTRAST & WARM DENTAL BRANDING -->
<section class="py-5" style="background-color: #FFF8F5; border-bottom: 1px solid #FFE8DD;">
    <div class="container py-2">
        <!-- OFFICIAL UPLOADED COVER BANNER IMAGE -->
        <div class="hero-banner-container mb-5 shadow-lg rounded-4 overflow-hidden border border-2 border-white">
            <img src="{{ asset('images/banner.png') }}" alt="Ảnh bìa Nha Khoa Kind Smile - 340 Phố Huế, Hà Nội" class="w-100 h-auto d-block" style="max-height: 520px; object-fit: contain; background: #F9571B;">
        </div>

        <!-- HERO CONTENT ROW -->
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <div class="badge-kindsmile mb-3 fs-6 px-3 py-2">
                    <i class="fa-solid fa-heart me-1 text-kindsmile-orange"></i> Tận Tâm Như Gia Đình • 340 Phố Huế, Hà Nội
                </div>
                
                <h1 class="display-4 font-display fw-extrabold mb-4" style="line-height: 1.25; color: #0F172A !important;">
                    Nha Khoa Kind Smile <br>
                    <span style="color: #F9571B !important;">Nụ Cười Rạng Rỡ</span> <br>
                    Cho Cả Gia Đình
                </h1>
                
                <p class="fs-5 mb-4" style="max-width: 620px; color: #475569 !important; font-weight: 500;">
                    Địa chỉ chăm sóc răng miệng uy tín tại số 340 Phố Huế, Q. Hai Bà Trưng, Hà Nội. Đội ngũ bác sĩ giàu kinh nghiệm, điều trị êm ái, cam kết bảo hành chính hãng.
                </p>

                <!-- SERVICE PILLS FROM COVER BANNER -->
                <div class="mb-4">
                    <div class="fw-bold small mb-2 text-uppercase" style="letter-spacing: 1px; color: #F9571B !important;">
                        <i class="fa-solid fa-star me-1"></i>Dịch Vụ Trọng Tâm Tại Kind Smile:
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('services.index') }}" class="btn btn-sm btn-outline-danger rounded-pill px-3 py-2 fw-bold" style="border-color: #F9571B; color: #F9571B;"><i class="fa-solid fa-tooth me-1"></i>Cấy Ghép Implant</a>
                        <a href="{{ route('services.index') }}" class="btn btn-sm btn-outline-danger rounded-pill px-3 py-2 fw-bold" style="border-color: #F9571B; color: #F9571B;"><i class="fa-solid fa-teeth-open me-1"></i>Nắn Chỉnh Răng</a>
                        <a href="{{ route('services.index') }}" class="btn btn-sm btn-outline-danger rounded-pill px-3 py-2 fw-bold" style="border-color: #F9571B; color: #F9571B;"><i class="fa-solid fa-heart-pulse me-1"></i>Phẫu Thuật Nha Chu</a>
                        <a href="{{ route('services.index') }}" class="btn btn-sm btn-outline-danger rounded-pill px-3 py-2 fw-bold" style="border-color: #F9571B; color: #F9571B;"><i class="fa-solid fa-notes-medical me-1"></i>Nhổ Răng Khôn</a>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3 mb-4">
                    <a href="{{ route('appointment.create') }}" class="btn-kindsmile fs-6">
                        <i class="fa-solid fa-calendar-check"></i> Đặt Lịch Khám Miễn Phí
                    </a>
                    <a href="{{ route('price.index') }}" class="btn-kindsmile-outline">
                        <i class="fa-solid fa-receipt"></i> Tra Cứu Bảng Giá
                    </a>
                </div>

                <div class="d-flex align-items-center gap-4 pt-4 border-top border-secondary border-opacity-25">
                    <div>
                        <div class="fs-3 fw-bold" style="color: #F9571B !important;">10.000+</div>
                        <div class="small fw-semibold text-secondary">Nụ cười hạnh phúc</div>
                    </div>
                    <div class="border-end border-secondary border-opacity-25" style="height: 40px;"></div>
                    <div>
                        <div class="fs-3 fw-bold" style="color: #F9571B !important;">100%</div>
                        <div class="small fw-semibold text-secondary">Tận tâm phục vụ</div>
                    </div>
                    <div class="border-end border-secondary border-opacity-25" style="height: 40px;"></div>
                    <div>
                        <div class="fs-3 fw-bold" style="color: #F9571B !important;">340 Phố Huế</div>
                        <div class="small fw-semibold text-secondary">Hai Bà Trưng, Hà Nội</div>
                    </div>
                </div>
            </div>

            <!-- QUICK BOOKING FORM -->
            <div class="col-lg-5">
                <div class="quick-booking-card shadow-lg" style="background: #FFFFFF !important; border: 2px solid #FFE4D6; border-radius: 20px; padding: 2rem;">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <img src="{{ asset('images/kindsmile-logo.png') }}" alt="Logo Kind Smile" class="rounded-circle" style="width: 48px; height: 48px; object-fit: contain;">
                        <div>
                            <h3 class="mb-0 fs-5" style="color: #0F172A !important; font-weight: 800;">ĐĂNG KÝ ĐẶT LỊCH KHÁM</h3>
                            <small class="fw-bold" style="color: #F9571B !important;">NHA KHOA KIND SMILE</small>
                        </div>
                    </div>
                    <p class="text-secondary small mb-4">Nhận tư vấn 1:1 cùng Thạc sĩ Bác sĩ, miễn phí chụp phim 3D CT ConeBeam & cạo vôi răng kiểm tra tổng quát.</p>
                    
                    <form action="{{ route('appointment.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold small" style="color: #0F172A !important;">Họ và tên khách hàng *</label>
                            <input type="text" name="fullname" class="form-control form-control-parkway" placeholder="Ví dụ: Nguyễn Văn An" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold small" style="color: #0F172A !important;">Số điện thoại *</label>
                            <input type="tel" name="phone" class="form-control form-control-parkway" placeholder="Ví dụ: 098 888 8340" required>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label fw-bold small" style="color: #0F172A !important;">Dịch vụ quan tâm</label>
                                <select name="service_id" class="form-select form-select-parkway">
                                    <option value="">-- Chọn dịch vụ --</option>
                                    @foreach($featuredServices as $serv)
                                        <option value="{{ $serv->id }}">{{ $serv->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold small" style="color: #0F172A !important;">Cơ sở khám</label>
                                <select name="branch_id" class="form-select form-select-parkway">
                                    @foreach($branches as $br)
                                        <option value="{{ $br->id }}">{{ $br->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row g-2 mb-4">
                            <div class="col-6">
                                <label class="form-label fw-bold small" style="color: #0F172A !important;">Ngày hẹn *</label>
                                <input type="date" name="preferred_date" class="form-control form-control-parkway" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold small" style="color: #0F172A !important;">Khung giờ *</label>
                                <select name="preferred_time" class="form-select form-select-parkway" required>
                                    <option value="09:00">09:00 Sáng</option>
                                    <option value="10:30">10:30 Sáng</option>
                                    <option value="14:00">14:00 Chiều</option>
                                    <option value="16:00">16:00 Chiều</option>
                                    <option value="18:00">18:00 Tối</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn-kindsmile w-100 justify-content-center py-3 fs-6">
                            <i class="fa-solid fa-paper-plane"></i> GỬI YÊU CẦU ĐẶT LỊCH HẸN
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SERVICES SECTION -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center mb-5 style-header" style="max-width: 700px; margin: 0 auto;">
            <span class="badge-kindsmile mb-2">DỊCH VỤ NỔI BẬT</span>
            <h2 class="font-display fw-bold fs-1" style="color: #0F172A !important;">Giải Pháp Nha Khoa Toàn Diện</h2>
            <p class="text-secondary fs-6">Ứng dụng công nghệ hiện đại mang lại cảm giác êm ái, bảo vệ tối đa nụ cười của bạn và gia đình.</p>
        </div>

        <div class="row g-4">
            @foreach($featuredServices as $service)
            <div class="col-md-6 col-lg-3">
                <div class="service-card">
                    <div class="service-icon-box">
                        <i class="fa-solid {{ $service->category->icon ?? 'fa-tooth' }}"></i>
                    </div>
                    <span class="badge-kindsmile mb-2 me-auto">{{ $service->category->name ?? 'Dịch vụ' }}</span>
                    <h4 class="font-display fs-5 fw-bold mb-2" style="color: #0F172A !important;">{{ $service->title }}</h4>
                    <p class="text-secondary small flex-grow-1 mb-4">{{ $service->summary }}</p>
                    <div class="border-top pt-3 d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted style-small" style="font-size: 0.75rem;">GIÁ CHỈ TỪ</div>
                            <div class="fw-bold fs-6" style="color: #F9571B !important;">{{ $service->price_from ?? 'Liên hệ' }}</div>
                        </div>
                        <a href="{{ route('services.show', $service->slug) }}" class="btn btn-sm btn-outline-danger rounded-circle p-2" style="width: 36px; height: 36px; border-color: #F9571B; color: #F9571B;" title="Xem chi tiết">
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- DOCTORS SECTION -->
<section class="py-5" style="background-color: #F8FAFC;">
    <div class="container py-4">
        <div class="row align-items-end mb-5">
            <div class="col-lg-8">
                <span class="badge-kindsmile mb-2">ĐỘI NGŨ BÁC SĨ</span>
                <h2 class="font-display fw-bold fs-1" style="color: #0F172A !important;">Bác Sĩ Giàu Kinh Nghiệm & Tận Tâm</h2>
                <p class="text-secondary fs-6 mb-0">Đội ngũ Thạc sĩ Bác sĩ tu nghiệp tại Pháp, Mỹ luôn coi sự an tâm của bệnh nhân như chính người thân.</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="{{ route('doctors.index') }}" class="btn-kindsmile-outline">
                    Xem Đội Ngũ Bác Sĩ <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="row g-4">
            @foreach($doctors as $doc)
            <div class="col-md-4">
                <div class="doctor-card">
                    <div class="doctor-img-wrap">
                        <div class="doctor-avatar-circle">
                            <i class="fa-solid fa-user-doctor"></i>
                        </div>
                        <h4 class="font-display fw-bold fs-5 mb-1" style="color: #0F172A !important;">{{ $doc->name }}</h4>
                        <div class="badge bg-warning text-dark fw-bold mb-2">{{ $doc->title }}</div>
                    </div>
                    <div class="doctor-info">
                        <p class="small fw-semibold mb-2" style="color: #F9571B !important;"><i class="fa-solid fa-certificate me-1"></i>{{ $doc->specialization }}</p>
                        <p class="small text-secondary mb-3"><i class="fa-solid fa-user-clock me-1"></i>{{ $doc->experience_years }} năm kinh nghiệm chuyên sâu</p>
                        <p class="small text-muted mb-3" style="min-height: 48px;">{{ Str::limit($doc->bio, 90) }}</p>
                        <div class="pt-2 border-top d-flex justify-content-between align-items-center">
                            <small class="text-muted"><i class="fa-solid fa-location-dot me-1"></i>{{ $doc->branch->name ?? 'Kind Smile 340 Phố Huế' }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- WHY CHOOSE KIND SMILE -->
<section class="py-5" style="background-color: #0F172A; color: #FFFFFF;">
    <div class="container py-4">
        <div class="text-center mb-5" style="max-width: 700px; margin: 0 auto;">
            <span class="badge bg-white bg-opacity-20 text-warning mb-2">TẠI SAO CHỌN KIND SMILE</span>
            <h2 class="font-display fw-bold text-white fs-1">4 Giá Trị Tận Tâm Của Kind Smile</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="p-4 rounded-4 bg-white bg-opacity-10 h-100 text-center border border-secondary border-opacity-25">
                    <i class="fa-solid fa-heart fs-1 mb-3" style="color: #F9571B !important;"></i>
                    <h4 class="fw-bold fs-5 mb-2 text-white">Tận Tâm Như Gia Đình</h4>
                    <p class="small text-light opacity-75 mb-0">Thăm khám êm ái, tư vấn chân thành, đồng hành chu đáo từng chặng đường điều trị.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 rounded-4 bg-white bg-opacity-10 h-100 text-center border border-secondary border-opacity-25">
                    <i class="fa-solid fa-location-dot fs-1 mb-3" style="color: #F9571B !important;"></i>
                    <h4 class="fw-bold fs-5 mb-2 text-white">Vị Trí Trung Tâm</h4>
                    <p class="small text-light opacity-75 mb-0">Cơ sở phòng khám hiện đại bậc nhất ngay tại số 340 Phố Huế, Q. Hai Bà Trưng, Hà Nội.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 rounded-4 bg-white bg-opacity-10 h-100 text-center border border-secondary border-opacity-25">
                    <i class="fa-solid fa-shield-halved fs-1 mb-3" style="color: #F9571B !important;"></i>
                    <h4 class="fw-bold fs-5 mb-2 text-white">Minh Bạch Chi Phí</h4>
                    <p class="small text-light opacity-75 mb-0">Bảng giá công khai trọn gói, cam kết không phát sinh phụ phí ẩn, hỗ trợ trả góp 0%.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 rounded-4 bg-white bg-opacity-10 h-100 text-center border border-secondary border-opacity-25">
                    <i class="fa-solid fa-award fs-1 mb-3" style="color: #F9571B !important;"></i>
                    <h4 class="fw-bold fs-5 mb-2 text-white">Bảo Hành Chính Hãng</h4>
                    <p class="small text-light opacity-75 mb-0">Sử dụng trụ Implant Straumann, khay Invisalign và sứ Emax chính hãng kèm thẻ bảo hành.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONIALS SECTION -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="badge-kindsmile mb-2">CẢM NHẬN KHÁCH HÀNG</span>
            <h2 class="font-display fw-bold fs-1" style="color: #0F172A !important;">Khách Hàng Nói Về Kind Smile</h2>
        </div>

        <div class="row g-4">
            @foreach($testimonials as $testi)
            <div class="col-md-6">
                <div class="p-4 bg-light rounded-4 shadow-sm border h-100">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; font-size: 1.25rem; background-color: #F9571B;">
                            {{ mb_substr($testi->client_name, 0, 1) }}
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0 fs-6" style="color: #0F172A !important;">{{ $testi->client_name }}</h5>
                            <small class="fw-semibold" style="color: #F9571B !important;">{{ $testi->service_name }}</small>
                        </div>
                        <div class="ms-auto text-warning">
                            @for($i=0; $i<$testi->rating; $i++)
                                <i class="fa-solid fa-star"></i>
                            @endfor
                        </div>
                    </div>
                    <p class="text-secondary small fst-italic mb-0">"{{ $testi->comment }}"</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- BLOG & ARTICLES -->
<section class="py-5" style="background-color: #F8FAFC;">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <span class="badge-kindsmile mb-2">KIẾN THỨC NHA KHOA</span>
                <h2 class="font-display fw-bold fs-1 mb-0" style="color: #0F172A !important;">Tin Tức & Lời Khuyên Bác Sĩ</h2>
            </div>
            <a href="{{ route('posts.index') }}" class="btn-kindsmile-outline">Xem Tất Cả Bài Viết</a>
        </div>

        <div class="row g-4">
            @foreach($featuredPosts as $post)
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                    <div class="card-body p-4">
                        <span class="badge bg-light fw-semibold mb-2 me-auto border" style="color: #F9571B !important;">{{ $post->category }}</span>
                        <h4 class="font-display fw-bold fs-5 mb-2">
                            <a href="{{ route('posts.show', $post->slug) }}" class="text-decoration-none" style="color: #0F172A !important;">{{ $post->title }}</a>
                        </h4>
                        <p class="text-secondary small mb-3">{{ Str::limit($post->summary, 120) }}</p>
                        <div class="d-flex justify-content-between align-items-center text-muted small border-top pt-2">
                            <span><i class="fa-regular fa-calendar me-1"></i>{{ $post->created_at->format('d/m/Y') }}</span>
                            <span><i class="fa-regular fa-eye me-1"></i>{{ $post->views }} lượt xem</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
