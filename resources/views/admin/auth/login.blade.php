<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập Quản Trị - Nha Khoa Kind Smile</title>
    <link rel="icon" href="{{ asset('images/kindsmile-logo.svg') }}" type="image/svg+xml">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/parkway-custom.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: #FFFFFF;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            width: 100%;
            max-width: 440px;
            padding: 2.5rem;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="text-center mb-4">
            <img src="{{ asset('images/kindsmile-logo.svg') }}" alt="Logo Kind Smile" class="mb-2" style="width: 70px; height: 70px;">
            <h3 class="font-display fw-extrabold text-kindsmile-dark mb-0">KIND SMILE ADMIN</h3>
            <p class="text-kindsmile-orange small fw-bold mt-1 mb-0">TẬN TÂM NHƯ GIA ĐÌNH</p>
            <small class="text-muted d-block mt-2">Hệ thống quản lý thông tin phòng khám 340 Phố Huế</small>
        </div>

        @if($errors->any())
            <div class="alert alert-danger rounded-3 mb-4 small">
                <i class="fa-solid fa-triangle-exclamation me-1"></i> {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold text-kindsmile-dark small">Tài khoản Email Admin</label>
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="fa-solid fa-envelope text-secondary"></i></span>
                    <input type="email" name="email" class="form-control form-control-parkway" placeholder="admin@kindsmile.com" value="{{ old('email', 'admin@kindsmile.com') }}" required autofocus>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold text-kindsmile-dark small">Mật khẩu</label>
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="fa-solid fa-lock text-secondary"></i></span>
                    <input type="password" name="password" class="form-control form-control-parkway" placeholder="••••••••" value="admin123" required>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="rememberMe">
                    <label class="form-check-label small text-secondary" for="rememberMe">Ghi nhớ đăng nhập</label>
                </div>
            </div>

            <button type="submit" class="btn-kindsmile w-100 justify-content-center py-3 fs-6 fw-bold">
                <i class="fa-solid fa-right-to-bracket"></i> ĐĂNG NHẬP HỆ THỐNG
            </button>
        </form>

        <div class="text-center mt-4 border-top pt-3 text-muted small">
            Dành riêng cho Ban Quản trị Nha Khoa Kind Smile
        </div>
    </div>

</body>
</html>
