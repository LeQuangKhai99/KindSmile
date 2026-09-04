@extends('layouts.admin')

@section('title', 'Quản Lý Chi Nhánh - Admin Parkway')
@section('header_title', 'Quản Lý Mạng Lưới Chi Nhánh Phòng Khám')

@section('content')

<div class="row g-4 mb-4">
    <!-- ADD BRANCH FORM -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white p-4 border-bottom">
                <h5 class="fw-bold text-parkway-navy mb-0"><i class="fa-solid fa-plus-circle text-parkway-teal me-2"></i>Thêm Chi Nhánh Mới</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.branches.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold text-parkway-navy small">Tên Chi Nhánh *</label>
                        <input type="text" name="name" class="form-control form-control-parkway" placeholder="Ví dụ: Parkway Ba Đình" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-parkway-navy small">Tỉnh / Thành Phố *</label>
                        <input type="text" name="city" class="form-control form-control-parkway" placeholder="Ví dụ: Hà Nội" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-parkway-navy small">Địa Chỉ Đầy Đủ *</label>
                        <input type="text" name="address" class="form-control form-control-parkway" placeholder="Ví dụ: 123 Kim Mã, Q. Ba Đình" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-parkway-navy small">Số Điện Thoại Cơ Sở *</label>
                        <input type="text" name="phone" class="form-control form-control-parkway" placeholder="Ví dụ: 024 9999 1111" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-parkway-navy small">Giờ Làm Việc</label>
                        <input type="text" name="working_hours" class="form-control form-control-parkway" value="08:30 - 19:30 hàng ngày">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-parkway-navy small">Link Google Maps (Nếu có)</label>
                        <input type="url" name="map_embed_url" class="form-control form-control-parkway" placeholder="https://maps.google.com/?q=...">
                    </div>

                    <div class="form-check form-switch mb-4">
                        <input class="form-check-input" type="checkbox" name="status" value="1" id="branchStatus" checked>
                        <label class="form-check-label fw-semibold small" for="branchStatus">Kích hoạt hoạt động</label>
                    </div>

                    <button type="submit" class="btn-parkway w-100 justify-content-center py-2">
                        <i class="fa-solid fa-floppy-disk"></i> Lưu Chi Nhánh
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- BRANCH LIST -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Tên Chi Nhánh</th>
                            <th>Tỉnh/Thành</th>
                            <th>Địa Chỉ</th>
                            <th>Hotline</th>
                            <th>Trạng Thái</th>
                            <th class="pe-4 text-end">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($branches as $b)
                        <tr>
                            <td class="ps-4"><strong class="text-parkway-navy">{{ $b->name }}</strong></td>
                            <td><span class="badge-kindsmile">{{ $b->city }}</span></td>
                            <td><small class="text-muted">{{ $b->address }}</small></td>
                            <td><strong class="text-parkway-teal">{{ $b->phone }}</strong></td>
                            <td>
                                @if($b->status)
                                    <span class="badge bg-success">Hoạt động</span>
                                @else
                                    <span class="badge bg-secondary">Tạm đóng</span>
                                @endif
                            </td>
                            <td class="pe-4 text-end">
                                <form action="{{ route('admin.branches.destroy', $b->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Xóa chi nhánh này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fa-solid fa-trash"></i> Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">Chưa có chi nhánh nào.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
