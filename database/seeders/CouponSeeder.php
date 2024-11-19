<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tmp = Coupon::create([
            'code' => 'GIANGINH',
            'title' => ' Giáng sinh may mắn',
            'description' => 'Chỉ còn ít ngày nữa là đến Giáng sinh, thời điểm tuyệt vời để bày tỏ tình cảm với người thương. Bạn đã chuẩn bị những gì ?',
            'discount_amount' => 10000,
            'discount_percentage' => 10,
            'expires_at' => now()->addMonths(3),
        ]);
        $tmp->images()->create(['url' => '/images/blog_01.jpg']);

        $tmp = Coupon::create([
            'code' => '20-10',
            'title' => 'Phần quà tặng 20/10 giúp ngày Phụ nữ Việt Nam thêm phần ý nghĩa.',
            'description' => 'Chúc mừng năm mới 2022, chúc bạn một năm mới an khang thịnh vượng, hạnh phúc và thành công.',
            'discount_amount' => 20000,
            'discount_percentage' => 20,
            'expires_at' => now()->addMonths(3),
        ]);
        $tmp->images()->create(['url' => '/images/blog_03.jpg']);

        $tmp = Coupon::create([
            'code' => 'TET',
            'title' => 'Chúc mừng năm mới',
            'description' => 'Chúc mừng năm mới 2022, chúc bạn một năm mới an khang thịnh vượng, hạnh phúc và thành công.',
            'discount_amount' => 20000,
            'discount_percentage' => 20,
            'expires_at' => now()->addMonths(3),
        ]);
        $tmp->images()->create(['url' => '/images/blog_12.jpg']);

        $tmp = Coupon::create([
            'code' => 'TINHNHAN',
            'title' => 'Ngày lễ tình nhân',
            'description' => 'Ngày lễ tình nhân sắp đến, bạn đã chuẩn bị quà gì cho người ấy chưa ?',
            'discount_amount' => 30000,
            'discount_percentage' => 30,
            'expires_at' => now()->addMonths(3),
        ]);
        $tmp->images()->create(['url' => '/images/blog_09.jpg']);

        $tmp = Coupon::create([
            'code' => 'BANHMOI',
            'title' => 'Nạp năng lượng với bánh ngàn lớp ngay!',
            'description' => 'Bộ sưu tập 6 loại bánh ngàn lớp thơm ngon của Evermore Bakery chính là “vị cứu tinh” giúp bạn tiếp thêm năng lượng cho cả tuần làm việc',
            'discount_amount' => 50000,
            'discount_percentage' => 50,
            'expires_at' => now()->addMonths(3),
        ]);
        $tmp->images()->create(['url' => '/images/blog_05.jpg']);

        $tmp = Coupon::create([
            'code' => 'SINHNHAT',
            'title' => 'Chúc mừng sinh nhật',
            'description' => 'Chúc mừng sinh nhật bạn, chúc bạn một tuổi mới thêm xinh đẹp, thêm nhiều niềm vui và hạnh phúc.',
            'discount_amount' => 50000,
            'discount_percentage' => 50,
            'expires_at' => now()->addMonths(3),
        ]);
        $tmp->images()->create(['url' => '/images/blog_10.jpg']);
    }
}
