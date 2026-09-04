<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang Quản Trị - Nha Khoa Kind Smile')</title>
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

    <!-- ADMIN SIDEBAR -->
    <aside class="admin-sidebar d-flex flex-column">
        <div class="p-4 border-bottom border-secondary border-opacity-25 text-center">
            <a href="{{ route('admin.dashboard') }}" class="text-decoration-none d-flex align-items-center justify-content-center gap-2">
                <img src="{{ asset('images/kindsmile-logo.svg') }}" alt="Logo Kind Smile" style="width: 38px; height: 38px;">
                <span class="fs-5 fw-bold text-white">KIND SMILE ADMIN</span>
            </a>
        </div>

        <nav class="flex-grow-1 py-3">
            <a href="{{ route('admin.dashboard') }}" class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-chart-line fs-5"></i> Bảng điều khiển
            </a>
            <a href="{{ route('admin.appointments.index') }}" class="admin-nav-link {{ request()->routeIs('admin.appointments.*') ? 'active' : '' }}">
                <i class="fa-solid fa-calendar-check fs-5"></i> Quản lý Lịch hẹn
                @php $pendingCount = \App\Models\Appointment::where('status', 'pending')->count(); @endphp
                @if($pendingCount > 0)
                    <span class="badge bg-danger ms-auto rounded-pill">{{ $pendingCount }}</span>
                @endif
            </a>
            <a href="{{ route('admin.services.index') }}" class="admin-nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                <i class="fa-solid fa-tooth fs-5"></i> Quản lý Dịch vụ
            </a>
            <a href="{{ route('admin.doctors.index') }}" class="admin-nav-link {{ request()->routeIs('admin.doctors.*') ? 'active' : '' }}">
                <i class="fa-solid fa-user-doctor fs-5"></i> Quản lý Bác sĩ
            </a>
            <a href="{{ route('admin.branches.index') }}" class="admin-nav-link {{ request()->routeIs('admin.branches.*') ? 'active' : '' }}">
                <i class="fa-solid fa-hospital-user fs-5"></i> Mạng lưới Chi nhánh
            </a>
            <a href="{{ route('admin.price.index') }}" class="admin-nav-link {{ request()->routeIs('admin.price.*') ? 'active' : '' }}">
                <i class="fa-solid fa-file-invoice-dollar fs-5"></i> Bảng giá Dịch vụ
            </a>
            <a href="{{ route('admin.posts.index') }}" class="admin-nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                <i class="fa-solid fa-newspaper fs-5"></i> Quản lý Bài viết
            </a>
        </nav>

        <div class="p-3 border-top border-secondary border-opacity-25">
            <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-light w-100 btn-sm mb-2 rounded-3">
                <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Xem trang Client
            </a>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger w-100 btn-sm rounded-3">
                    <i class="fa-solid fa-right-from-bracket me-1"></i> Đăng xuất
                </button>
            </form>
        </div>
    </aside>

    <!-- ADMIN CONTENT WRAPPER -->
    <div class="admin-content">
        <!-- TOP NAV HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-4 bg-white p-3 rounded-4 shadow-sm border">
            <div>
                <h4 class="mb-0 fw-bold text-kindsmile-dark">@yield('header_title', 'Bảng điều khiển Quản trị')</h4>
                <small class="text-secondary">Xin chào, <strong>{{ Auth::user()->name ?? 'Admin' }}</strong> (Hệ thống quản lý Nha Khoa Kind Smile - 340 Phố Huế, Hà Nội)</small>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div class="bg-light p-2 px-3 rounded-3 text-secondary border">
                    <i class="fa-solid fa-calendar me-1 text-kindsmile-orange"></i> {{ now()->format('d/m/Y') }}
                </div>
            </div>
        </div>

        <!-- FLASH MESSAGES -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 shadow-sm d-flex align-items-center gap-3" role="alert">
                <i class="fa-solid fa-circle-check fs-4 text-success"></i>
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show rounded-3 border-0 shadow-sm d-flex align-items-center gap-3" role="alert">
                <i class="fa-solid fa-triangle-exclamation fs-4 text-danger"></i>
                <div>{{ session('error') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CKEditor 5 Rich Text Editor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.editor-rich, textarea[name="content"], textarea[name="description"]').forEach(function(el) {
                if (typeof ClassicEditor !== 'undefined' && !el.dataset.ckeditorInitialized) {
                    ClassicEditor.create(el, {
                        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertTable', 'undo', 'redo' ]
                    }).then(editor => {
                        el.dataset.ckeditorInitialized = "true";
                    }).catch(error => {
                        console.error('CKEditor init error:', error);
                    });
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
