<?php
// BÀI 6: Đổi giây sang giờ:phút:giây
// Gọi hàm doiGiaySangGio($tongGiay) từ functions.php

$nhap = trim($_POST['so_giay'] ?? '');
$loi = '';
$daDoi = false;
$ketQuaGio = '';
$tongGiay = 0;

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    if ($nhap === '' || !is_numeric($nhap) || (int)$nhap < 0) {
        $loi = 'Vui lòng nhập số giây là số nguyên không âm (≥ 0)!';
    } else {
        $tongGiay = (int)$nhap;
        $ketQuaGio = doiGiaySangGio($tongGiay);
        $daDoi = true;
    }
}
?>

<section class="exercise-heading">
    <div class="exercise-heading__title-row">
        <div class="exercise-heading__title">
            <span class="exercise-heading__icon">📘</span>
            <h2>Bài 6</h2>
        </div>
        <span class="pill">Xử lý thời gian</span>
    </div>
    <p class="exercise-heading__subtitle">Đổi giây sang giờ:phút:giây</p>
    <small class="exercise-heading__description">Nhập tổng số giây và chuyển đổi sang định dạng HH:MM:SS (Ví dụ: 3769 giây → 01:02:49).</small>
</section>

<section class="exercise-grid">
    <article class="work-card glass-panel">
        <span class="eyebrow">DỮ LIỆU VÀO</span>
        <h3>Nhập tổng số giây</h3>

        <?php if ($loi !== ''): ?>
            <div class="alert alert--error"><?= escape($loi) ?></div>
        <?php endif; ?>

        <form method="post" action="?bai=6" class="form-stack">
            <label class="field">
                <span>Tổng số giây</span>
                <input type="number" name="so_giay" min="0" value="<?= escape($nhap) ?>" placeholder="Ví dụ: 3769" autofocus required>
                <small>Giá trị mẫu trong đề bài: 3769.</small>
            </label>
            <button class="button button--primary" type="submit">Chuyển đổi →</button>
        </form>
    </article>

    <article class="result-card glass-panel">
        <span class="eyebrow">KẾT QUẢ</span>
        <h3>Đồng hồ thời gian</h3>

        <?php if (!$daDoi): ?>
            <div class="empty-state">
                <span>00:00</span>
                <p>Nhập số giây rồi nhấn "Chuyển đổi".</p>
            </div>
        <?php else: ?>
            <div class="digital-clock" aria-label="Kết quả thời gian"><?= escape($ketQuaGio) ?></div>
            <p class="result-note"><?= number_format($tongGiay, 0, ',', '.') ?> giây = <?= escape($ketQuaGio) ?></p>
        <?php endif; ?>
    </article>
</section>
