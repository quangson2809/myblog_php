<?php
// BÀI 7: Lập trình hướng đối tượng (OOP)
// Class SINHVIEN kế thừa class PERSON từ functions.php

$hoTen = trim($_POST['ho_ten'] ?? '');
$ngaySinh = trim($_POST['ngay_sinh'] ?? '');
$queQuan = trim($_POST['que_quan'] ?? '');
$lop = trim($_POST['lop'] ?? '');

$loi = '';
$sinhVien = null;

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    if ($hoTen === '' || $ngaySinh === '' || $queQuan === '' || $lop === '') {
        $loi = 'Vui lòng điền đầy đủ tất cả 4 trường thông tin!';
    } else {
        // Khởi tạo đối tượng SinhVien kế thừa từ Person
        $sinhVien = new SinhVien($hoTen, $ngaySinh, $queQuan, $lop);
    }
}

// Hàm lấy chữ cái đầu làm avatar
function layChuDau($chuoi) {
    $chuoi = trim($chuoi);
    if (function_exists('mb_substr')) {
        return mb_strtoupper(mb_substr($chuoi, 0, 1, 'UTF-8'), 'UTF-8');
    }
    return strtoupper(substr($chuoi, 0, 1));
}
?>

<section class="exercise-heading">
    <div class="exercise-heading__title-row">
        <div class="exercise-heading__title">
            <span class="exercise-heading__icon">📘</span>
            <h2>Bài 7</h2>
        </div>
        <span class="pill">Kế thừa OOP</span>
    </div>
    <p class="exercise-heading__subtitle">Class PERSON và SINHVIEN</p>
    <small class="exercise-heading__description">SINHVIEN kế thừa các thuộc tính Họ tên, Ngày sinh, Quê quán từ PERSON và bổ sung thuộc tính Lớp.</small>
</section>

<section class="exercise-grid">
    <article class="work-card glass-panel">
        <span class="eyebrow">TẠO ĐỐI TƯỢNG</span>
        <h3>Thông tin sinh viên</h3>

        <?php if ($loi !== ''): ?>
            <div class="alert alert--error"><?= escape($loi) ?></div>
        <?php endif; ?>

        <form method="post" action="?bai=7" class="form-stack">
            <label class="field">
                <span>Họ và tên</span>
                <input type="text" name="ho_ten" value="<?= escape($hoTen) ?>" placeholder="Ví dụ: Nguyễn Văn A" required>
            </label>
            <div class="form-row">
                <label class="field">
                    <span>Ngày sinh</span>
                    <input type="date" name="ngay_sinh" value="<?= escape($ngaySinh) ?>" required>
                </label>
                <label class="field">
                    <span>Lớp</span>
                    <input type="text" name="lop" value="<?= escape($lop) ?>" placeholder="Ví dụ: CNTT01" required>
                </label>
            </div>
            <label class="field">
                <span>Quê quán</span>
                <input type="text" name="que_quan" value="<?= escape($queQuan) ?>" placeholder="Ví dụ: Hà Nội" required>
            </label>
            <button class="button button--primary" type="submit">Tạo đối tượng SINHVIEN →</button>
        </form>
    </article>

    <article class="result-card glass-panel">
        <span class="eyebrow">THÔNG TIN CÁ NHÂN</span>
        <h3>Hồ sơ sinh viên</h3>

        <?php if ($sinhVien === null): ?>
            <div class="empty-state">
                <span>👤</span>
                <p>Nhập thông tin bên trái để khởi tạo đối tượng SINHVIEN.</p>
            </div>
        <?php else: ?>
            <div class="student-card">
                <div class="student-card__avatar"><?= escape(layChuDau($sinhVien->getHoTen())) ?></div>
                <div class="student-card__name">
                    <small>SINHVIEN extends PERSON</small>
                    <strong><?= escape($sinhVien->getHoTen()) ?></strong>
                    <span><?= escape($sinhVien->getLop()) ?></span>
                </div>
                <dl class="student-details">
                    <div>
                        <dt>Ngày sinh (kế thừa)</dt>
                        <dd><?= escape(date('d/m/Y', strtotime($sinhVien->getNgaySinh()))) ?></dd>
                    </div>
                    <div>
                        <dt>Quê quán (kế thừa)</dt>
                        <dd><?= escape($sinhVien->getQueQuan()) ?></dd>
                    </div>
                    <div>
                        <dt>Lớp học (mở rộng)</dt>
                        <dd><?= escape($sinhVien->getLop()) ?></dd>
                    </div>
                </dl>
            </div>
        <?php endif; ?>
    </article>
</section>
