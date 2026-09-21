<?php
// BÀI 4: Liệt kê tất cả các ước số của n
// Gọi hàm timUocSo($n) từ functions.php

$nhap = trim($_POST['n'] ?? '');
$loi = '';
$daTim = false;
$danhSachUoc = [];
$n = 0;

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    if ($nhap === '' || !is_numeric($nhap) || (int)$nhap <= 0) {
        $loi = 'Vui lòng nhập một số nguyên dương n > 0!';
    } else {
        $n = (int)$nhap;
        $danhSachUoc = timUocSo($n);
        $daTim = true;
    }
}
?>

<section class="exercise-heading">
    <div class="exercise-heading__title-row">
        <div class="exercise-heading__title">
            <span class="exercise-heading__icon">📘</span>
            <h2>Bài 4</h2>
        </div>
        <span class="pill">Ước số</span>
    </div>
    <p class="exercise-heading__subtitle">Liệt kê tất cả các ước số</p>
    <small class="exercise-heading__description">Tìm và hiển thị toàn bộ các ước số nguyên dương của n.</small>
</section>

<section class="exercise-grid">
    <article class="work-card glass-panel">
        <span class="eyebrow">DỮ LIỆU VÀO</span>
        <h3>Nhập số nguyên dương n</h3>

        <?php if ($loi !== ''): ?>
            <div class="alert alert--error"><?= escape($loi) ?></div>
        <?php endif; ?>

        <form method="post" action="?bai=4" class="form-stack">
            <label class="field">
                <span>Số nguyên n</span>
                <input type="number" name="n" min="1" value="<?= escape($nhap) ?>" placeholder="Ví dụ: 36" autofocus required>
                <small>Mỗi ước số đều chia hết cho n (dư bằng 0).</small>
            </label>
            <button class="button button--primary" type="submit">Liệt kê ước số →</button>
        </form>
    </article>

    <article class="result-card glass-panel">
        <span class="eyebrow">KẾT QUẢ</span>
        <h3>Danh sách ước số</h3>

        <?php if (!$daTim): ?>
            <div class="empty-state">
                <span>÷</span>
                <p>Nhập số n rồi bấm "Liệt kê ước số".</p>
            </div>
        <?php else: ?>
            <div class="number-stream number-stream--dense">
                <?php foreach ($danhSachUoc as $uoc): ?>
                    <span class="number-chip"><?= escape($uoc) ?></span>
                <?php endforeach; ?>
            </div>
            <div class="result-summary">
                <div><span>Số đang xét</span><strong><?= escape($n) ?></strong></div>
                <div><span>Số lượng ước</span><strong><?= count($danhSachUoc) ?></strong></div>
            </div>
        <?php endif; ?>
    </article>
</section>
