<?php

session_start();

require_once __DIR__ . '/functions.php';

$thongTinSinhVien = [
    'hoTen' => 'Đặng Quang Sơn',
    'khoa' => 'Khoa Công nghệ thông tin',
    'lop' => 'CNTT3',
    'khoaHoc' => '64',
];

$menuLinks = [
    'Trang chủ' => '?bai=1',
    'C/C++' => '../Module1/index.php',
    'PHP' => '?bai=1',
    'HTML' => '../html/index.php',
    'JavaScript' => '../javascript/index.php',
];

$danhSachBai = [
    1 => [
        'tieuDe' => 'Nhập số đến khi gặp 0',
        'file' => 'exercises/bai1.php',
        'tuKhoa' => 'nhap so session vong lap input 0',
    ],
    2 => [
        'tieuDe' => 'Kiểm tra số hoàn hảo',
        'file' => 'exercises/bai2.php',
        'tuKhoa' => 'so hoan hao perfect number uoc so',
    ],
    3 => [
        'tieuDe' => 'Tính n giai thừa',
        'file' => 'exercises/bai3.php',
        'tuKhoa' => 'giai thua factorial de quy recursion',
    ],
    4 => [
        'tieuDe' => 'Liệt kê các ước số',
        'file' => 'exercises/bai4.php',
        'tuKhoa' => 'uoc so chia het divisor',
    ],
    5 => [
        'tieuDe' => 'Đếm số âm và số dương',
        'file' => 'exercises/bai5.php',
        'tuKhoa' => 'mang array so am so duong so 0',
    ],
    6 => [
        'tieuDe' => 'Đổi giây sang giờ:phút:giây',
        'file' => 'exercises/bai6.php',
        'tuKhoa' => 'giay gio phut time hh mm ss',
    ],
    7 => [
        'tieuDe' => 'PERSON và SINHVIEN',
        'file' => 'exercises/bai7.php',
        'tuKhoa' => 'person sinhvien sinh vien oop huong doi tuong ke thua inheritance class object',
    ],
];

$tuKhoaTimKiem = trim($_GET['q'] ?? '');
$danhSachHienThi = timKiemBaiHoc($danhSachBai, $tuKhoaTimKiem);

$baiHienTai = isset($_GET['bai']) ? (int) $_GET['bai'] : 1;
if (!isset($danhSachBai[$baiHienTai])) {
    $baiHienTai = 1;
}

if (
    $tuKhoaTimKiem !== '' &&
    !empty($danhSachHienThi) &&
    !isset($danhSachHienThi[$baiHienTai])
) {
    $baiHienTai = array_keys($danhSachHienThi)[0];
}

$tongSoBai = count($danhSachBai);
$baiTruoc = $baiHienTai > 1 ? $baiHienTai - 1 : null;
$baiSau = $baiHienTai < $tongSoBai ? $baiHienTai + 1 : null;
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= escape($danhSachBai[$baiHienTai]['tieuDe']) ?> | WEB Học Tập</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="app-shell">
        <header class="topbar">
            <a class="brand" href="?bai=1" aria-label="Trang chủ WEB Học Tập">
                <span class="brand__logo">✦</span>
                <span class="brand__text">
                    <strong>WEB Học Tập</strong>
                    <small>PHP Practice</small>
                </span>
            </a>

            <nav class="topbar__links" aria-label="Điều hướng chính">
                <a href="?bai=1" class="<?= $baiHienTai === 1 ? 'active' : '' ?>">Trang chủ</a>
                <a href="?bai=1" class="active">PHP</a>
                <a href="https://www.w3schools.com/html/" target="_blank">
                    HTML
                </a>

                <a href="https://www.w3schools.com/css/" target="_blank">
                    CSS
                </a>

                <a href="https://www.w3schools.com/js/" target="_blank">
                    JavaScript
                </a>
            </nav>

            <form class="search-box" method="get" action="">
                <input
                    type="search"
                    name="q"
                    value="<?= escape($tuKhoaTimKiem) ?>"
                    placeholder="Tìm bài học..."
                    aria-label="Tìm kiếm bài học"
                >
                <button class="search-box__button" type="submit" aria-label="Tìm kiếm">⌕</button>
            </form>
        </header>

        <section class="hero-banner">
            <div class="hero-banner__content">
                <div class="hero-mark">php</div>
                <h1>Học PHP</h1>
                <p>Khám phá thế giới lập trình web với những bài tập thực hành từ cơ bản đến nâng cao.</p>

                <div class="hero-stats" aria-label="Thông tin tổng quan">
                    <div>
                        <strong><?= $tongSoBai ?></strong>
                        <span>Bài tập</span>
                    </div>
                    <div>
                        <strong>100%</strong>
                        <span>PHP Thuần</span>
                    </div>
                    <div>
                        <strong>24/7</strong>
                        <span>Thực hành</span>
                    </div>
                </div>

                <div class="student-inline" aria-label="Thông tin sinh viên">
                    <span><?= escape($thongTinSinhVien['hoTen']) ?></span>
                    <span><?= escape($thongTinSinhVien['lop']) ?></span>
                    <span><?= escape($thongTinSinhVien['khoaHoc']) ?></span>
                </div>
            </div>

            <div class="hero-banner__visual" aria-hidden="true">
                <div class="hero-illustration">
                    <div class="hero-blob hero-blob--one"></div>
                    <div class="hero-blob hero-blob--two"></div>
                    <div class="hero-blob hero-blob--three"></div>
                    <div class="hero-core"></div>
                </div>
            </div>
        </section>

        <div class="workspace">
            <aside class="sidebar">
                <div class="sidebar__heading">
                    <div class="sidebar__title-wrap">
                        <span class="sidebar__icon">&lt;/&gt;</span>
                        <div>
                            <h2>Bài tập PHP</h2>
                            <small>
                                <?php if ($tuKhoaTimKiem !== ''): ?>
                                    <?= count($danhSachHienThi) ?> kết quả cho
                                    “<?= escape($tuKhoaTimKiem) ?>”
                                <?php else: ?>
                                    Danh sách bài thực hành
                                <?php endif; ?>
                            </small>
                        </div>
                    </div>
                </div>

                <nav class="exercise-nav" aria-label="Danh sách bài tập">
                    <?php foreach ($danhSachHienThi as $id => $bai): ?>
                        <a class="exercise-link <?= $id === $baiHienTai ? 'active' : '' ?>" href="?bai=<?= $id ?>">
                            <span class="exercise-link__dot">▶</span>
                            <span class="exercise-link__text">
                                <strong>Bài tập <?= $id ?></strong>
                                <small><?= escape($bai['tieuDe']) ?></small>
                            </span>
                        </a>
                    <?php endforeach; ?>

                    <?php if ($tuKhoaTimKiem !== '' && empty($danhSachHienThi)): ?>
                        <div class="alert alert--error">
                            Không tìm thấy bài học phù hợp.
                        </div>
                    <?php endif; ?>
                </nav>
            </aside>

            <main class="main-content">
                <?php
                $fileBai = __DIR__ . '/' . $danhSachBai[$baiHienTai]['file'];
                if (file_exists($fileBai)) {
                    include $fileBai;
                } else {
                    echo '<div class="alert alert--error">Không tìm thấy file bài tập.</div>';
                }
                ?>

                <div class="pager glass-panel">
                    <div>
                        <?php if ($baiTruoc !== null): ?>
                            <a class="button button--ghost" href="?bai=<?= $baiTruoc ?>">← Bài <?= $baiTruoc ?></a>
                        <?php endif; ?>
                    </div>
                    <span class="pager__status">Bài <?= $baiHienTai ?> / <?= $tongSoBai ?></span>
                    <div>
                        <?php if ($baiSau !== null): ?>
                            <a class="button button--primary" href="?bai=<?= $baiSau ?>">Bài <?= $baiSau ?> →</a>
                        <?php endif; ?>
                    </div>
                </div>
            </main>
        </div>

        <footer class="site-footer">
            <p>Thực hành cơ bản với HTML, CSS, PHP · Thiết kế tinh gọn cho sinh viên và người mới học.</p>
        </footer>
    </div>
</body>

</html>