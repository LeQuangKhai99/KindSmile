@extends('layouts.client')

@section('title', $post->title . ' - Nha Khoa Kind Smile 340 Phố Huế')

@section('content')

<!-- BREADCRUMB -->
<div class="bg-light py-3 border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-kindsmile-dark">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('posts.index') }}" class="text-decoration-none text-kindsmile-dark">Bài viết</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($post->title, 40) }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    <div class="row g-5">
        <div class="col-lg-8">
            <span class="badge-kindsmile mb-2">{{ $post->category }}</span>
            <h1 class="font-display fw-bold text-kindsmile-dark display-6 mb-3">{{ $post->title }}</h1>
            
            <div class="d-flex align-items-center gap-3 text-muted small mb-4 pb-3 border-bottom">
                <span><i class="fa-regular fa-calendar me-1"></i>Đăng ngày: {{ $post->created_at->format('d/m/Y H:i') }}</span>
                <span>•</span>
                <span><i class="fa-regular fa-eye me-1"></i>{{ $post->views }} lượt xem</span>
            </div>

            <div class="lead text-secondary mb-4 p-3 bg-light rounded-3 border-start border-4 border-warning fw-normal">
                {{ $post->summary }}
            </div>

            <div class="post-content-body fs-6 text-secondary mb-5">
                {!! $post->content !!}
            </div>

            <!-- SHARE BOX -->
            <div class="p-4 bg-light rounded-4 border border-warning d-flex align-items-center justify-content-between mb-5">
                <span class="fw-bold text-kindsmile-dark"><i class="fa-solid fa-share-nodes text-kindsmile-orange me-2"></i>Chia sẻ bài viết hữu ích này:</span>
                <div class="d-flex gap-2">
                    <a href="#" class="btn btn-primary btn-sm rounded-circle"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-info text-white btn-sm rounded-circle"><i class="fa-brands fa-twitter"></i></a>
                </div>
            </div>
        </div>

        <!-- SIDEBAR -->
        <div class="col-lg-4">
            <div class="sidebar-sticky">
                <div class="quick-booking-card mb-4">
                    <h4 class="fw-bold text-kindsmile-dark mb-2"><i class="fa-solid fa-calendar-check text-kindsmile-orange me-2"></i>Tư Vấn Miễn Phí</h4>
                    <p class="text-secondary small mb-3">Bạn có thắc mắc về nha khoa? Bác sĩ Kind Smile sẵn sàng giải đáp.</p>
                    <a href="{{ route('appointment.create') }}" class="btn-kindsmile w-100 justify-content-center">
                        Đặt Lịch Ngay
                    </a>
                </div>

                @if($relatedPosts->count() > 0)
                <div class="p-4 bg-white rounded-4 border shadow-sm">
                    <h5 class="fw-bold text-parkway-navy mb-3">Bài Viết Mới Nhất</h5>
                    <ul class="list-unstyled mb-0">
                        @foreach($relatedPosts as $rel)
                        <li class="mb-3 pb-2 border-bottom">
                            <a href="{{ route('posts.show', $rel->slug) }}" class="text-decoration-none text-parkway-navy hover-teal fw-semibold d-block mb-1">
                                {{ $rel->title }}
                            </a>
                            <small class="text-muted"><i class="fa-regular fa-calendar me-1"></i>{{ $rel->created_at->format('d/m/Y') }}</small>
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
