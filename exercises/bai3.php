<?php
// BÀI 3: Tính n giai thừa bằng đệ quy
// Gọi hàm tinhGiaiThua($n) từ functions.php

$nhap = trim($_POST['n'] ?? '');
$loi = '';
$daTinh = false;
$giaiThua = 0;
$n = 0;

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    if ($nhap === '' || !is_numeric($nhap) || (int)$nhap < 0) {
        $loi = 'Vui lòng nhập số nguyên n không âm (n ≥ 0)!';
    } elseif ((int)$nhap > 20) {
        $loi = 'Vui lòng nhập n ≤ 20 để tránh tràn số nguyên!';
    } else {
        $n = (int)$nhap;
        $giaiThua = tinhGiaiThua($n);
        $daTinh = true;
    }
}
?>

<section class="exercise-heading">
    <div class="exercise-heading__title-row">
        <div class="exercise-heading__title">
            <span class="exercise-heading__icon">📘</span>
            <h2>Bài 3</h2>
        </div>
        <span class="pill">Đệ quy</span>
    </div>
    <p class="exercise-heading__subtitle">Tính n giai thừa (n!)</p>
    <small class="exercise-heading__description">Sử dụng giải thuật đệ quy: n! = n × (n - 1)!, điều kiện dừng: 0! = 1! = 1.</small>
</section>

<section class="exercise-grid">
    <article class="work-card glass-panel">
        <span class="eyebrow">DỮ LIỆU VÀO</span>
        <h3>Nhập giá trị n</h3>

        <?php if ($loi !== ''): ?>
            <div class="alert alert--error"><?= escape($loi) ?></div>
        <?php endif; ?>

        <form method="post" action="?bai=3" class="form-stack">
            <label class="field">
                <span>Số nguyên n</span>
                <input type="number" name="n" min="0" max="20" value="<?= escape($nhap) ?>" placeholder="Ví dụ: 5" autofocus required>
                <small>Giới hạn: 0 ≤ n ≤ 20 để kết quả chính xác.</small>
            </label>
            <button class="button button--primary" type="submit">Tính giai thừa →</button>
        </form>
    </article>

    <article class="result-card glass-panel">
        <span class="eyebrow">KẾT QUẢ</span>
        <h3>Giá trị n!</h3>

        <?php if (!$daTinh): ?>
            <div class="empty-state">
                <span>n!</span>
                <p>Nhập số n rồi bấm "Tính giai thừa" để xem kết quả.</p>
            </div>
        <?php else: ?>
            <div class="metric-result">
                <span><?= escape($n) ?>!</span>
                <strong><?= number_format($giaiThua, 0, ',', '.') ?></strong>
            </div>
            <p class="result-note">Công thức đệ quy tính toán thành công.</p>
        <?php endif; ?>
    </article>
</section>
