<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Branch;
use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\Doctor;
use App\Models\PriceItem;
use App\Models\Post;
use App\Models\Testimonial;
use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Admin Account for Kind Smile
        User::updateOrCreate(
            ['email' => 'admin@kindsmile.com'],
            [
                'name' => 'Quản trị viên Kind Smile',
                'password' => Hash::make('admin123'),
                'is_admin' => true,
            ]
        );

        // 2. Seed Branches (Main Clinic: 340 Phố Huế, Hà Nội)
        $branchMain = Branch::create([
            'name' => 'Nha Khoa Kind Smile - 340 Phố Huế',
            'address' => '340 Phố Huế, P. Phố Huế, Q. Hai Bà Trưng, Hà Nội',
            'city' => 'Hà Nội',
            'phone' => '098 888 8340 / 024 3999 8340',
            'map_embed_url' => 'https://maps.app.goo.gl/Cae3odcvVeHQDjMN7',
            'working_hours' => '08:30 - 19:30 (Thứ 2 - Chủ Nhật)',
            'status' => true,
        ]);

        // 3. Seed Service Categories
        $catNiengRang = ServiceCategory::create([
            'name' => 'Chỉnh Nha - Niềng Răng',
            'slug' => 'nieng-rang-chinh-nha',
            'description' => 'Khôi phục nụ cười chuẩn tỉ lệ vàng với công nghệ niềng răng khay trong suốt Invisalign và hệ thống mắc cài sứ cao cấp.',
            'icon' => 'fa-teeth-open',
            'sort_order' => 1,
        ]);

        $catImplant = ServiceCategory::create([
            'name' => 'Trồng Răng Implant',
            'slug' => 'trong-rang-implant',
            'description' => 'Giải pháp cấy ghép Implant khôi phục răng đã mất với cam kết nhẹ nhàng, an toàn và bảo hành chính hãng trọn đời.',
            'icon' => 'fa-tooth',
            'sort_order' => 2,
        ]);

        $catRangSu = ServiceCategory::create([
            'name' => 'Răng Sứ Thẩm Mỹ',
            'slug' => 'rang-su-tham-my',
            'description' => 'Bọc răng sứ và Dán sứ Veneer Emax mỏng 0.2mm, bảo tồn tối đa răng thật mang lại nụ cười rạng rỡ.',
            'icon' => 'fa-smile-beam',
            'sort_order' => 3,
        ]);

        $catTongQuat = ServiceCategory::create([
            'name' => 'Nha Khoa Tổng Quát & Trẻ Em',
            'slug' => 'nha-khoa-tong-quat',
            'description' => 'Dịch vụ chăm sóc sức khỏe răng miệng tận tâm như người thân trong gia đình: Nhổ răng khôn không đau, Tẩy trắng răng, Trám răng.',
            'icon' => 'fa-heart-pulse',
            'sort_order' => 4,
        ]);

        // 4. Seed Services
        $s1 = Service::create([
            'category_id' => $catNiengRang->id,
            'title' => 'Niềng Răng Khay Trong Suốt Invisalign',
            'slug' => 'nieng-rang-khay-trong-suot-invisalign',
            'summary' => 'Giải pháp nắn chỉnh răng vô hình đỉnh cao Hoa Kỳ. Tháo lắp tiện lợi, thẩm mỹ tuyệt đối.',
            'image' => 'images/invisalign-1.jpg',
            'description' => '<div class="mb-4"><img src="/images/invisalign-1.jpg" alt="Niềng Răng Khay Trong Suốt Invisalign tại Kind Smile" class="img-fluid rounded-4 shadow-sm w-100 mb-2" style="max-height: 450px; object-fit: cover;"><p class="text-center text-muted small fst-italic">Hình ảnh khách hàng thăm khám & trải nghiệm khay niềng trong suốt Invisalign tại Nha Khoa Kind Smile 340 Phố Huế</p></div><h3 class="font-display text-kindsmile-dark fw-bold mb-3">1. Invisalign Là Gì? Tại Sao Nên Chọn Khay Trong Suốt?</h3><p>Công nghệ niềng răng trong suốt <strong>Invisalign (Hoa Kỳ)</strong> sử dụng hệ thống khay nhựa y tế cao cấp SmartTrack độc quyền, được thiết kế cá nhân hóa 100% theo khuôn hàm của từng khách hàng. Bạn có thể tự do tháo lắp khi ăn uống, vệ sinh răng miệng mà không lo lộ mắc cài hay vướng víu.</p><div class="row g-4 my-4"><div class="col-md-6"><div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100"><img src="/images/invisalign-2.jpg" alt="Tháo lắp khay niềng dễ dàng" class="card-img-top" style="height: 220px; object-fit: cover;"><div class="card-body p-3"><h5 class="fw-bold text-kindsmile-dark mb-1">Tháo Lắp Linh Hoạt & Thẩm Mỹ</h5><p class="small text-secondary mb-0">Khay nhựa trong suốt gần như vô hình giúp bạn tự tin giao tiếp mọi lúc mọi nơi.</p></div></div></div><div class="col-md-6"><div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100"><img src="/images/invisalign-3.jpg" alt="Quét mẫu hàm iTero 5D" class="card-img-top" style="height: 220px; object-fit: cover;"><div class="card-body p-3"><h5 class="fw-bold text-kindsmile-dark mb-1">Công Nghệ Quét 3D iTero 5D</h5><p class="small text-secondary mb-0">Xem trước kết quả nụ cười ClinCheck chuẩn xác chỉ sau 60 giây quét mẫu hàm.</p></div></div></div></div><h3 class="font-display text-kindsmile-dark fw-bold mb-3">2. Quy Trình Niềng Răng Invisalign Tận Tâm Tại Kind Smile</h3><div class="p-4 bg-light rounded-4 border border-warning mb-4"><ul class="list-unstyled mb-0"><li class="mb-3 d-flex gap-3"><span class="badge bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; flex-shrink: 0;">1</span><div><strong class="text-kindsmile-dark">Thăm khám & Quét mẫu hàm 3D iTero Element 5D miễn phí:</strong><div class="small text-secondary">Bác sĩ trực tiếp kiểm tra tình trạng khớp cắn và phân tích dữ liệu hàm trên phần mềm AI.</div></div></li><li class="mb-3 d-flex gap-3"><span class="badge bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; flex-shrink: 0;">2</span><div><strong class="text-kindsmile-dark">Lập phác đồ điều trị ClinCheck 3D độc quyền:</strong><div class="small text-secondary">Khách hàng được quan sát từng bước răng dịch chuyển và kết quả nụ cười hoàn thiện trước khi sản xuất khay từ Mỹ.</div></div></li><li class="mb-3 d-flex gap-3"><span class="badge bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; flex-shrink: 0;">3</span><div><strong class="text-kindsmile-dark">Bàn giao bộ khay Invisalign chính hãng & Hướng dẫn sử dụng:</strong><div class="small text-secondary">Bộ khay khép kín nhập khẩu từ Align Technology (USA) có mã QR vạch kiểm định chính hãng.</div></div></li><li class="d-flex gap-3"><span class="badge bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; flex-shrink: 0;">4</span><div><strong class="text-kindsmile-dark">Theo dõi & Thăm khám định kỳ 1:1 cùng Thạc sĩ Bác sĩ:</strong><div class="small text-secondary">Lịch tái khám linh hoạt 6-8 tuần/lần, hỗ trợ theo dõi từ xa cho khách hàng bận rộn.</div></div></li></ul></div><h3 class="font-display text-kindsmile-dark fw-bold mb-3">3. Đã Có Hàng Ngàn Khách Hàng Kiến Tạo Nụ Cười Tại Kind Smile</h3><p>Nha Khoa Kind Smile (340 Phố Huế, Hà Nội) tự hào mang lại hơn 3.000 nụ cười rạng rỡ với cam kết <em>"Tận tâm như người thân trong gia đình"</em>, chính sách trả góp 0% lãi suất và hợp đồng bảo hành minh bạch.</p>',
            'price_from' => '42.000.000 VNĐ',
            'warranty_period' => 'Trọn đời',
            'is_featured' => true,
            'status' => true,
        ]);

        $s2 = Service::create([
            'category_id' => $catNiengRang->id,
            'title' => 'Niềng Răng Mắc Cài Kim Loại / Mắc Cài Sứ',
            'slug' => 'nieng-rang-mac-cai-kim-loai-mac-cai-su',
            'summary' => 'Giải pháp niềng răng truyền thống nắp trượt thông minh giúp dịch chuyển răng nhanh chóng, êm ái.',
            'description' => '<p>Mắc cài tự buộc giúp giảm thiểu lực ma sát, hạn chế cảm giác đau buốt và tiết kiệm thời gian tái khám.</p>',
            'price_from' => '25.000.000 VNĐ',
            'warranty_period' => '5 năm',
            'is_featured' => true,
            'status' => true,
        ]);

        $s3 = Service::create([
            'category_id' => $catImplant->id,
            'title' => 'Trồng Răng Implant Straumann Thụy Sĩ',
            'slug' => 'trong-rang-implant-straumann-thuy-si',
            'summary' => 'Trụ Implant sinh học số 1 thế giới, khả năng tích hợp xương vượt trội trong 3-4 tuần.',
            'description' => '<p>Implant Straumann SLA Active thích hợp cho các trường hợp mất răng lâu năm hoặc tiêu xương phức tạp. Đảm bảo khả năng ăn nhai chắc chắn như răng thật.</p>',
            'price_from' => '20.000.000 VNĐ / Trụ',
            'warranty_period' => 'Trọn đời',
            'is_featured' => true,
            'status' => true,
        ]);

        $s4 = Service::create([
            'category_id' => $catRangSu->id,
            'title' => 'Dán Sứ Thẩm Mỹ Veneer Emax Super Thin',
            'slug' => 'dan-su-tham-my-veneer-emax-super-thin',
            'summary' => 'Mặt dán sứ siêu mỏng 0.2mm, không mài nhỏ răng, không sưng đau, bảo tồn 98% răng thật.',
            'description' => '<p>Mặt dán sứ Veneer Emax chế tác công nghệ CAD/CAM mang lại sắc trắng trong tự nhiên, chịu lực gấp 4-5 lần răng thật.</p>',
            'price_from' => '6.000.000 VNĐ / Răng',
            'warranty_period' => '15 năm',
            'is_featured' => true,
            'status' => true,
        ]);

        $s5 = Service::create([
            'category_id' => $catTongQuat->id,
            'title' => 'Nhổ Răng Khôn Piezotome Êm Ái Không Đau',
            'slug' => 'nho-rang-khon-piezotome-em-ai-khong-dau',
            'summary' => 'Sử dụng sóng siêu âm Piezotome bóc tách êm ái, hạn chế tổn thương mô mềm và lành thương siêu tốc.',
            'description' => '<p>Công nghệ sóng siêu âm tác động chính xác vào dây chằng quanh răng giúp loại bỏ răng khôn mọc lệch nhẹ nhàng mà không gây tổn thương xương hàm.</p>',
            'price_from' => '1.200.000 VNĐ / Răng',
            'warranty_period' => 'Tái khám kiểm tra miễn phí',
            'is_featured' => false,
            'status' => true,
        ]);

        // 5. Seed Doctors for Kind Smile
        Doctor::create([
            'branch_id' => $branchMain->id,
            'name' => 'ThS.BS Trần Đức Minh',
            'title' => 'Giám đốc Chuyên môn Kind Smile',
            'specialization' => 'Chuyên gia Chỉnh nha & Niềng răng Invisalign',
            'experience_years' => 15,
            'bio' => 'Thạc sĩ Bác sĩ tu nghiệp chuyên sâu về Chỉnh nha tại Pháp và Mỹ. Với triết lý "Tận tâm như gia đình", BS Minh đã đồng hành cùng hơn 3.000 khách hàng tìm lại nụ cười rạng rỡ.',
            'status' => true,
        ]);

        Doctor::create([
            'branch_id' => $branchMain->id,
            'name' => 'BS.CKII Nguyễn Thị Thanh Hà',
            'title' => 'Trưởng Khoa Trồng Răng Implant',
            'specialization' => 'Chuyên gia Cấy ghép Implant & Phục hình Sứ',
            'experience_years' => 17,
            'bio' => 'Hơn 17 năm kinh nghiệm điều trị các ca mất răng phức tạp, cấy ghép trụ Implant chính hãng Thụy Sĩ và Mỹ an toàn tuyệt đối.',
            'status' => true,
        ]);

        Doctor::create([
            'branch_id' => $branchMain->id,
            'name' => 'BS. Lê Vũ Hoàng',
            'title' => 'Chuyên gia Răng Sứ Thẩm Mỹ',
            'specialization' => 'Thiết kế nụ cười DSD & Mặt dán sứ Veneer',
            'experience_years' => 11,
            'bio' => 'Bác sĩ trẻ tài năng trong lĩnh vực kiến tạo nụ cười chuẩn tỉ lệ vàng, kết hợp kỹ thuật chế tác CAD/CAM hiện đại.',
            'status' => true,
        ]);

        // 6. Seed Price Items
        PriceItem::create([
            'category_id' => $catNiengRang->id,
            'name' => 'Gói Niềng Răng Invisalign Comprehensive (Không giới hạn khay)',
            'unit' => 'Trọn gói',
            'price' => 95000000,
            'discount_price' => 85000000,
            'warranty' => 'Trọn đời',
            'note' => 'Tặng 01 bộ khay duy trì & khám tổng quát miễn phí',
        ]);

        PriceItem::create([
            'category_id' => $catNiengRang->id,
            'name' => 'Niềng Răng Mắc Cài Sứ Tự Buộc',
            'unit' => 'Trọn gói',
            'price' => 45000000,
            'discount_price' => 38000000,
            'warranty' => '5 năm',
            'note' => 'Hỗ trợ trả góp 0% lãi suất',
        ]);

        PriceItem::create([
            'category_id' => $catImplant->id,
            'name' => 'Trụ Implant Dentium (Hàn Quốc) + Mão sứ',
            'unit' => 'Răng / Trụ',
            'price' => 14000000,
            'discount_price' => 11500000,
            'warranty' => '10 năm',
            'note' => 'Miễn phí chụp phim 3D CT ConeBeam',
        ]);

        PriceItem::create([
            'category_id' => $catImplant->id,
            'name' => 'Trụ Implant Straumann SLA Active (Thụy Sĩ)',
            'unit' => 'Răng / Trụ',
            'price' => 30000000,
            'discount_price' => 26000000,
            'warranty' => 'Trọn đời',
            'note' => 'Tích hợp xương siêu tốc',
        ]);

        PriceItem::create([
            'category_id' => $catRangSu->id,
            'name' => 'Răng sứ Cercon HT (Đức)',
            'unit' => 'Chiếc',
            'price' => 4500000,
            'discount_price' => 3800000,
            'warranty' => '10 năm',
            'note' => 'Khả năng chịu lực gấp 5 lần răng thật',
        ]);

        PriceItem::create([
            'category_id' => $catTongQuat->id,
            'name' => 'Tẩy trắng răng Laser Whitening',
            'unit' => 'Liệu trình',
            'price' => 2800000,
            'discount_price' => 1900000,
            'warranty' => '12 tháng',
            'note' => 'Miễn phí cạo vôi đánh bóng răng',
        ]);

        // 7. Seed Blog Posts
        Post::create([
            'title' => 'Tại sao Nha Khoa Kind Smile được đông đảo gia đình tại 340 Phố Huế tin chọn?',
            'slug' => 'tai-sao-nha-khoa-kind-smile-duoc-tin-chon',
            'summary' => 'Với phương châm "Tận tâm như gia đình", Kind Smile mang đến dịch vụ chăm sóc răng miệng êm ái, chu đáo và chi phí minh bạch nhất.',
            'content' => '<p>Tọa lạc tại địa chỉ 340 Phố Huế, Q. Hai Bà Trưng, Hà Nội, Nha Khoa Kind Smile là địa chỉ khám nha khoa uy tín hàng đầu cho cả gia đình. Chúng tôi đầu tư hệ thống ghế nha hiện đại, phòng vô trùng khép kín cùng đội ngũ bác sĩ tận tụy.</p>',
            'category' => 'Tin tức Kind Smile',
            'views' => 1560,
            'is_featured' => true,
            'status' => true,
        ]);

        Post::create([
            'title' => 'Niềng răng Invisalign có đau không? Chia sẻ từ bác sĩ chuyên khoa Kind Smile',
            'slug' => 'nieng-rang-invisalign-co-dau-khong-chia-se-kind-smile',
            'summary' => 'Giải đáp chi tiết cảm giác khi niềng răng trong suốt và lộ trình dịch chuyển răng theo chuẩn 3D ClinCheck.',
            'content' => '<p>Nhờ lực di chuyển lực sinh học nhẹ nhàng từ khay niềng Invisalign, bệnh nhân tại Kind Smile hầu như không cảm thấy đau đớn buốt nhức như mắc cài truyền thống.</p>',
            'category' => 'Kinh nghiệm niềng răng',
            'views' => 980,
            'is_featured' => true,
            'status' => true,
        ]);

        // 8. Seed Testimonials
        Testimonial::create([
            'client_name' => 'Chị Thanh Huyền (Phố Huế, Hà Nội)',
            'service_name' => 'Niềng răng Invisalign',
            'comment' => 'Nhà mình ở ngay phố Huế nên qua Kind Smile 340 Phố Huế rất tiện. Bác sĩ Minh làm việc cực kỳ nhẹ nhàng, coi khách hàng chu đáo như người nhà vậy!',
            'rating' => 5,
        ]);

        Testimonial::create([
            'client_name' => 'Bác Hoàng Nam (Hai Bà Trưng, Hà Nội)',
            'service_name' => 'Trồng răng Implant Straumann',
            'comment' => 'Tôi làm 2 trụ Implant tại Kind Smile 340 Phố Huế, ăn nhai chắc chắn tốt lắm. Cảm ơn đội ngũ y bác sĩ tận tâm!',
            'rating' => 5,
        ]);

        // 9. Seed Sample Appointments
        Appointment::create([
            'booking_code' => 'KSD-998811',
            'fullname' => 'Nguyễn Thu Trang',
            'phone' => '0987654321',
            'email' => 'thutrang.nguyen@gmail.com',
            'service_id' => $s1->id,
            'branch_id' => $branchMain->id,
            'preferred_date' => now()->addDays(1)->format('Y-m-d'),
            'preferred_time' => '09:30',
            'notes' => 'Hẹn khám tư vấn niềng răng Invisalign tại địa chỉ 340 Phố Huế.',
            'status' => 'pending',
        ]);
    }
}
