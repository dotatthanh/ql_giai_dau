<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        INSERT INTO `provinces` (`id`, `name`, `created_at`, `updated_at`) VALUES
			(1, 'Hà Nội', '2019-05-12 17:14:12', '2019-05-12 17:14:12'),
			(2, 'Hồ Chí Minh', '2019-05-12 21:10:37', '2019-05-12 21:10:37'),
			(3, 'An Giang', '2019-05-12 21:10:55', '2019-05-12 21:10:55'),
			(4, 'Bà Rịa - Vũng Tàu', '2019-05-12 21:11:03', '2019-05-12 21:11:03'),
			(5, 'Bắc Giang', '2019-05-12 21:11:08', '2019-05-12 21:11:08'),
			(6, 'Bắc Kạn', '2019-05-12 21:11:13', '2019-05-12 21:11:13'),
			(7, 'Bạc Liêu', '2019-05-12 21:11:18', '2019-05-12 21:11:18'),
			(8, 'Bắc Ninh', '2019-05-12 21:11:24', '2019-05-12 21:11:24'),
			(9, 'Bến Tre', '2019-05-12 21:11:35', '2019-05-12 21:11:35'),
			(10, 'Bình Định', '2019-05-12 21:11:41', '2019-05-12 21:11:41'),
			(11, 'Bình Dương', '2019-05-12 21:11:47', '2019-05-12 21:11:47'),
			(12, 'Bình Phước', '2019-05-12 21:11:55', '2019-05-12 21:11:55'),
			(13, 'Bình Thuận', '2019-05-12 21:12:04', '2019-05-12 21:12:04'),
			(14, 'Cà Mau', '2019-05-12 21:12:10', '2019-05-12 21:12:10'),
			(15, 'Cần Thơ', '2019-05-12 21:12:15', '2019-05-12 21:12:15'),
			(16, 'Cao Bằng', '2019-05-12 21:12:33', '2019-05-12 21:12:33'),
			(17, 'Đà Nẵng', '2019-05-12 21:12:39', '2019-05-12 21:12:39'),
			(18, 'Đắk Lắk', '2019-05-12 21:13:49', '2019-05-12 21:13:49'),
			(19, 'Đắk Nông', '2019-05-12 21:13:54', '2019-05-12 21:13:54'),
			(20, 'Điện Biên', '2019-05-12 21:13:59', '2019-05-12 21:13:59'),
			(21, 'Đồng Nai', '2019-05-12 21:14:04', '2019-05-12 21:14:04'),
			(22, 'Đồng Tháp', '2019-05-12 21:14:11', '2019-05-12 21:14:11'),
			(23, 'Gia Lai', '2019-05-12 21:14:15', '2019-05-12 21:14:15'),
			(24, 'Hà Giang', '2019-05-12 21:14:18', '2019-05-12 21:14:18'),
			(25, 'Hà Nam', '2019-05-12 21:14:22', '2019-05-12 21:14:22'),
			(26, 'Hà Tĩnh', '2019-05-12 21:14:26', '2019-05-12 21:14:26'),
			(27, 'Hải Dương', '2019-05-12 21:14:31', '2019-05-12 21:14:31'),
			(28, 'Hải Phòng', '2019-05-12 21:14:35', '2019-05-12 21:14:35'),
			(29, 'Hậu Giang', '2019-05-12 21:14:40', '2019-05-12 21:14:40'),
			(30, 'Hòa Bình', '2019-05-12 21:14:45', '2019-05-12 21:14:45'),
			(31, 'Hưng Yên', '2019-05-12 21:14:51', '2019-05-12 21:14:51'),
			(32, 'Khánh Hòa', '2019-05-12 21:14:57', '2019-05-12 21:14:57'),
			(33, 'Kiên Giang', '2019-05-12 21:15:01', '2019-05-12 21:15:01'),
			(34, 'Kon Tum', '2019-05-12 21:15:06', '2019-05-12 21:15:06'),
			(35, 'Lai Châu', '2019-05-12 21:15:10', '2019-05-12 21:15:10'),
			(36, 'Lâm Đồng', '2019-05-12 21:15:15', '2019-05-12 21:15:15'),
			(37, 'Lạng Sơn', '2019-05-12 21:15:18', '2019-05-12 21:15:18'),
			(38, 'Lào Cai', '2019-05-12 21:15:22', '2019-05-12 21:15:22'),
			(39, 'Long An', '2019-05-12 21:15:26', '2019-05-12 21:15:26'),
			(40, 'Nam Định', '2019-05-12 21:15:30', '2019-05-12 21:15:30'),
			(41, 'Nghệ An', '2019-05-12 21:15:35', '2019-05-12 21:15:35'),
			(42, 'Ninh Bình', '2019-05-12 21:15:42', '2019-05-12 21:15:42'),
			(43, 'Ninh Thuận', '2019-05-12 21:15:50', '2019-05-12 21:15:50'),
			(44, 'Phú Thọ', '2019-05-12 21:15:53', '2019-05-12 21:15:53'),
			(45, 'Phú Yên', '2019-05-12 21:15:57', '2019-05-12 21:15:57'),
			(46, 'Quảng Bình', '2019-05-12 21:16:01', '2019-05-12 21:16:01'),
			(47, 'Quảng Nam', '2019-05-12 21:16:04', '2019-05-12 21:16:04'),
			(48, 'Quảng Ngãi', '2019-05-12 21:16:07', '2019-05-12 21:16:07'),
			(49, 'Quảng Ninh', '2019-05-12 21:16:11', '2019-05-12 21:16:11'),
			(50, 'Quảng Trị', '2019-05-12 21:16:15', '2019-05-12 21:16:15'),
			(51, 'Sóc Trăng', '2019-05-12 21:16:18', '2019-05-12 21:16:18'),
			(52, 'Sơn La', '2019-05-12 21:16:21', '2019-05-12 21:16:21'),
			(53, 'Tây Ninh', '2019-05-12 21:16:25', '2019-05-12 21:16:25'),
			(54, 'Thái Bình', '2019-05-12 21:16:28', '2019-05-12 21:16:28'),
			(55, 'Thái Nguyên', '2019-05-12 21:16:34', '2019-05-12 21:16:34'),
			(56, 'Thanh Hóa', '2019-05-12 21:16:41', '2019-05-12 21:16:41'),
			(57, 'Thừa Thiên Huế', '2019-05-12 21:16:46', '2019-05-12 21:16:46'),
			(58, 'Tiền Giang', '2019-05-12 21:16:50', '2019-05-12 21:16:50'),
			(59, 'Trà Vinh', '2019-05-12 21:16:54', '2019-05-12 21:16:54'),
			(60, 'Tuyên Quang', '2019-05-12 21:16:58', '2019-05-12 21:16:58'),
			(61, 'Vĩnh Long', '2019-05-12 21:17:02', '2019-05-12 21:17:02'),
			(62, 'Vĩnh Phúc', '2019-05-12 21:17:06', '2019-05-12 21:17:06'),
			(63, 'Yên Bái', '2019-05-12 21:17:11', '2019-05-12 21:17:11');
    }
}