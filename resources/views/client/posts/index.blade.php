@extends('layouts.client')

@section('title', 'Kinh Nghiệm & Kiến Thức Nha Khoa - Kind Smile 340 Phố Huế')

@section('content')

<div class="page-header-banner">
    <div class="container text-center">
        <h1 class="page-header-title mb-3">Kiến Thức & Kinh Nghiệm Nha Khoa</h1>
        <p class="page-header-subtitle" style="max-width: 750px; margin: 0 auto;">
            Cập nhật những lời khuyên hữu ích từ bác sĩ chuyên khoa giúp bạn bảo vệ sức khỏe răng miệng tốt nhất.
        </p>
    </div>
</div>

<div class="container py-5">
    <!-- CATEGORY FILTER -->
    <div class="d-flex flex-wrap gap-2 mb-5 justify-content-center">
        <a href="{{ route('posts.index') }}" class="btn {{ !request('category') ? 'btn-kindsmile' : 'btn-outline-secondary' }} rounded-pill px-4">Tất cả bài viết</a>
        @foreach($categories as $cat)
            <a href="{{ route('posts.index', ['category' => $cat]) }}" class="btn {{ request('category') == $cat ? 'btn-kindsmile' : 'btn-outline-secondary' }} rounded-pill px-4">{{ $cat }}</a>
        @endforeach
    </div>

    <div class="row g-4 mb-5">
        @foreach($posts as $post)
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 d-flex flex-column">
                <div class="bg-light p-4 text-center text-kindsmile-orange">
                    <i class="fa-solid fa-newspaper fs-1 opacity-50"></i>
                </div>
                <div class="card-body p-4 d-flex flex-column">
                    <span class="badge-kindsmile mb-2 me-auto">{{ $post->category }}</span>
                    <h3 class="font-display fw-bold text-kindsmile-dark fs-5 mb-2">
                        <a href="{{ route('posts.show', $post->slug) }}" class="text-decoration-none text-kindsmile-dark hover-orange">{{ $post->title }}</a>
                    </h3>
                    <p class="text-secondary small flex-grow-1 mb-3">{{ Str::limit($post->summary, 110) }}</p>
                    <div class="d-flex justify-content-between align-items-center text-muted small border-top pt-3 mt-auto">
                        <span><i class="fa-regular fa-calendar me-1"></i>{{ $post->created_at->format('d/m/Y') }}</span>
                        <span><i class="fa-regular fa-eye me-1"></i>{{ $post->views }} lượt xem</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- PAGINATION -->
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>

@endsection
