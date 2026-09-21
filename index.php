<?php

session_start();

require_once __DIR__ . '/functions.php';

$thongTinSinhVien = require __DIR__ . '/data/student.php';
$danhSachBai = require __DIR__ . '/data/lessons.php';

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

require __DIR__ . '/components/header.php';
require __DIR__ . '/components/hero.php';
?>

        <div class="workspace">
            <?php require __DIR__ . '/components/sidebar.php'; ?>

            <main class="main-content">
                <?php
                $fileBai = __DIR__ . '/' . $danhSachBai[$baiHienTai]['file'];

                if (file_exists($fileBai)) {
                    include $fileBai;
                } else {
                    echo '<div class="alert alert--error">Không tìm thấy file bài tập.</div>';
                }
                ?>

                <?php require __DIR__ . '/components/pager.php'; ?>
            </main>
        </div>

<?php require __DIR__ . '/components/footer.php'; ?>
