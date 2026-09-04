<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nha Khoa Kind Smile - 340 Phố Huế, Hà Nội | Tận Tâm Như Gia Đình')</title>
    <meta name="description" content="Nha khoa Kind Smile địa chỉ 340 Phố Huế, Q. Hai Bà Trưng, Hà Nội. Hệ thống nha khoa uy tín chuyên niềng răng Invisalign, cấy ghép Implant, bọc răng sứ. Tận tâm như gia đình.">
    <link rel="icon" href="{{ asset('images/kindsmile-logo.svg') }}" type="image/svg+xml">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Kind Smile Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/parkway-custom.css') }}">
    @stack('styles')
</head>
<body>

    <!-- TOP BAR -->
    <div class="top-bar d-none d-md-block">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex gap-4">
                <span><i class="fa-solid fa-location-dot text-kindsmile-orange me-2"></i><strong>Địa chỉ:</strong> 340 Phố Huế, P. Phố Huế, Q. Hai Bà Trưng, Hà Nội</span>
                <span><i class="fa-solid fa-clock text-kindsmile-orange me-2"></i>08:30 - 19:30 (Thứ 2 - CN)</span>
            </div>
            <div class="d-flex gap-3 align-items-center">
                <a href="tel:0988888340" class="fw-bold text-white"><i class="fa-solid fa-phone me-1 text-kindsmile-orange"></i>Hotline: 098 888 8340</a>
            </div>
        </div>
    </div>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-parkway sticky-top">
        <div class="container">
            <a class="navbar-brand-logo text-decoration-none d-flex align-items-center gap-3" href="{{ route('home') }}" style="text-decoration: none !important;">
                <img src="{{ asset('images/kindsmile-logo.svg') }}" alt="Logo Nha Khoa Kind Smile" class="brand-logo-img">
                <div class="brand-text-wrapper">
                    <div class="brand-title">KIND <span>SMILE</span></div>
                    <div class="brand-slogan">TẬN TÂM NHƯ GIA ĐÌNH</div>
                </div>
            </a>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarParkwayContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarParkwayContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center gap-1">
                    <li class="nav-item">
                        <a class="nav-link nav-link-parkway {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-parkway {{ request()->routeIs('services.*') ? 'active' : '' }}" href="{{ route('services.index') }}">Dịch vụ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-parkway {{ request()->routeIs('doctors.*') ? 'active' : '' }}" href="{{ route('doctors.index') }}">Đội ngũ Bác sĩ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-parkway {{ request()->routeIs('price.*') ? 'active' : '' }}" href="{{ route('price.index') }}">Bảng giá</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-parkway {{ request()->routeIs('branches.*') ? 'active' : '' }}" href="{{ route('branches.index') }}">Cơ sở phòng khám</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-parkway {{ request()->routeIs('posts.*') ? 'active' : '' }}" href="{{ route('posts.index') }}">Kinh nghiệm Nha khoa</a>
                    </li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a href="{{ route('appointment.create') }}" class="btn-kindsmile">
                            <i class="fa-solid fa-calendar-check"></i> Đặt lịch hẹn
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- FLASH MESSAGES -->
    @if(session('success'))
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show rounded-4 border-0 shadow-sm d-flex align-items-center gap-3" role="alert">
                <i class="fa-solid fa-circle-check fs-4 text-success"></i>
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    <!-- MAIN CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- FLOATING CONTACT WIDGET -->
    <div class="floating-widget">
        <a href="tel:0988888340" class="floating-btn floating-btn-phone" title="Gọi Hotline 098 888 8340">
            <i class="fa-solid fa-phone"></i>
        </a>
        <a href="https://zalo.me" target="_blank" class="floating-btn floating-btn-zalo" title="Chat Zalo hỗ trợ">
            <i class="fa-solid fa-comment-dots"></i>
        </a>
        <a href="{{ route('appointment.create') }}" class="floating-btn floating-btn-book" title="Đặt lịch hẹn ngay">
            <i class="fa-solid fa-calendar-plus"></i>
        </a>
    </div>

    <!-- FOOTER - EXPLICIT HIGH CONTRAST DARK SLATE (#0F172A) -->
    <footer class="footer-parkway" style="background-color: #0F172A !important; color: #FFFFFF !important; padding-top: 4rem; padding-bottom: 2.5rem; margin-top: 3rem; border-top: 4px solid #F9571B;">
        <div class="container">
            <div class="row g-4 mb-5">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <img src="{{ asset('images/kindsmile-logo.svg') }}" alt="Logo Kind Smile" style="width: 50px; height: 50px;">
                        <div>
                            <div class="fs-4 fw-bold leading-tight" style="color: #FFFFFF !important;">NHA KHOA KIND SMILE</div>
                            <div class="small fw-bold" style="color: #F9571B !important;">TẬN TÂM NHƯ GIA ĐÌNH</div>
                        </div>
                    </div>
                    <p class="mb-4" style="color: #CBD5E1 !important; font-size: 0.95rem;">Hệ thống Nha khoa chuẩn quốc tế uy tín. Cơ sở chính trụ sở tại 340 Phố Huế, Q. Hai Bà Trưng, Hà Nội. Luôn lấy sự hài lòng và sức khỏe nụ cười của khách hàng làm trọng tâm.</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; border-color: rgba(255,255,255,0.3); color: #FFF;"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; border-color: rgba(255,255,255,0.3); color: #FFF;"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; border-color: rgba(255,255,255,0.3); color: #FFF;"><i class="fa-brands fa-tiktok"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4">
                    <h5 class="fw-bold mb-3" style="color: #FFFFFF !important; font-size: 1.1rem;">Dịch Vụ Chính</h5>
                    <ul class="ps-0 list-unstyled">
                        <li class="mb-2"><a href="{{ route('services.index') }}" style="color: #CBD5E1 !important; text-decoration: none;">Niềng răng Invisalign</a></li>
                        <li class="mb-2"><a href="{{ route('services.index') }}" style="color: #CBD5E1 !important; text-decoration: none;">Trồng răng Implant</a></li>
                        <li class="mb-2"><a href="{{ route('services.index') }}" style="color: #CBD5E1 !important; text-decoration: none;">Bọc răng sứ Cercon</a></li>
                        <li class="mb-2"><a href="{{ route('services.index') }}" style="color: #CBD5E1 !important; text-decoration: none;">Dán sứ Veneer Emax</a></li>
                        <li class="mb-2"><a href="{{ route('services.index') }}" style="color: #CBD5E1 !important; text-decoration: none;">Nhổ răng khôn Piezotome</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-4">
                    <h5 class="fw-bold mb-3" style="color: #FFFFFF !important; font-size: 1.1rem;">Thông Tin Liên Hệ</h5>
                    <ul class="ps-0 list-unstyled" style="color: #CBD5E1 !important;">
                        <li class="mb-2"><i class="fa-solid fa-location-dot me-2" style="color: #F9571B !important;"></i><strong>Cơ sở chính:</strong> 340 Phố Huế, P. Phố Huế, Q. Hai Bà Trưng, Hà Nội</li>
                        <li class="mb-2"><i class="fa-solid fa-phone me-2" style="color: #F9571B !important;"></i><strong>Hotline:</strong> 098 888 8340 / 024 3999 8340</li>
                        <li class="mb-2"><i class="fa-solid fa-envelope me-2" style="color: #F9571B !important;"></i><strong>Email:</strong> cskh@nhakhoakindsmile.com</li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-4">
                    <h5 class="fw-bold mb-3" style="color: #FFFFFF !important; font-size: 1.1rem;">Thời Gian Làm Việc</h5>
                    <div class="p-3 rounded-3" style="background-color: rgba(255, 255, 255, 0.08) !important; border: 1px solid rgba(255, 255, 255, 0.15) !important;">
                        <p class="mb-1 fw-bold" style="color: #FFFFFF !important;"><i class="fa-regular fa-clock me-2" style="color: #F9571B !important;"></i>Thứ 2 - Chủ Nhật</p>
                        <p class="mb-0 fs-6" style="color: #CBD5E1 !important;">08:30 - 19:30 (Phục vụ cả ngày lễ)</p>
                    </div>
                </div>
            </div>
            
            <div class="pt-4 text-center small" style="border-top: 1px solid rgba(255, 255, 255, 0.1) !important; color: #94A3B8 !important;">
                © 2026 Nha Khoa Kind Smile (340 Phố Huế, Hà Nội). Tất cả quyền được bảo lưu. Phát triển trên nền tảng PHP Laravel MVC.
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
