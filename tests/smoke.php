<?php

declare(strict_types=1);

require_once __DIR__ . '/../functions.php';

function expect(bool $condition, string $message): void
{
    if (!$condition) {
        fwrite(STDERR, "[FAIL] {$message}" . PHP_EOL);
        exit(1);
    }

    echo "[PASS] {$message}" . PHP_EOL;
}

// 1. Kiểm tra số hoàn hảo
expect(kiemTraSoHoanHao(6), '6 là số hoàn hảo');
expect(kiemTraSoHoanHao(28), '28 là số hoàn hảo');
expect(!kiemTraSoHoanHao(12), '12 không phải số hoàn hảo');

// 2. Tính giai thừa
expect(tinhGiaiThua(0) === 1, '0! = 1');
expect(tinhGiaiThua(5) === 120, '5! = 120');

// 3. Liệt kê ước số
expect(
    timUocSo(12) === [1, 2, 3, 4, 6, 12],
    'Ước của 12 được liệt kê đúng [1, 2, 3, 4, 6, 12]'
);

// 4. Phân loại mảng số
$groups = phanLoaiMang([-3, -1, 0, 2, 5]);
expect($groups['am'] === [-3, -1], 'Phân loại số âm đúng [-3, -1]');
expect($groups['duong'] === [2, 5], 'Phân loại số dương đúng [2, 5]');
expect($groups['khong'] === [0], 'Phân loại số 0 đúng [0]');

// 5. Đổi giây sang giờ
expect(doiGiaySangGio(3769) === '01:02:49', '3769 giây = 01:02:49');

// 6. OOP Kế thừa: SinhVien extends Person
$sv = new SinhVien('Nguyễn Văn A', '2005-01-15', 'Hà Nội', 'CNTT01');
expect($sv->getHoTen() === 'Nguyễn Văn A', 'SINHVIEN kế thừa họ tên từ PERSON');
expect($sv->getQueQuan() === 'Hà Nội', 'SINHVIEN kế thừa quê quán từ PERSON');
expect($sv->getLop() === 'CNTT01', 'SINHVIEN có thêm thuộc tính lớp');

// 7. Tìm kiếm bài học
$danhSachBaiTest = [
    1 => [
        'tieuDe' => 'Nhập số đến khi gặp 0',
        'tuKhoa' => 'nhap so session vong lap',
    ],
    3 => [
        'tieuDe' => 'Tính n giai thừa',
        'tuKhoa' => 'giai thua factorial de quy',
    ],
    7 => [
        'tieuDe' => 'PERSON và SINHVIEN',
        'tuKhoa' => 'person sinh vien oop ke thua',
    ],
];

expect(
    array_keys(timKiemBaiHoc($danhSachBaiTest, 'giai thua')) === [3],
    'Tìm "giai thua" trả về bài 3'
);
expect(
    array_keys(timKiemBaiHoc($danhSachBaiTest, 'OOP')) === [7],
    'Tìm "OOP" không phân biệt chữ hoa/thường'
);
expect(
    array_keys(timKiemBaiHoc($danhSachBaiTest, 'so')) === [1],
    'Tìm theo từ không khớp nhầm "so" trong PERSON'
);
expect(
    timKiemBaiHoc($danhSachBaiTest, '') === $danhSachBaiTest,
    'Từ khóa rỗng trả về toàn bộ bài học'
);

echo PHP_EOL . 'Tất cả smoke test cho functions.php đã chạy THÀNH CÔNG.' . PHP_EOL;
