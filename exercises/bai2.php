<?php
// BÀI 2: Kiểm tra số hoàn hảo
// Gọi hàm kiemTraSoHoanHao($n) từ functions.php

$nhap = trim($_POST['so'] ?? '');
$loi = '';
$daKiemTra = false;
$laSoHoanHao = false;
$so = 0;

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    if ($nhap === '' || !is_numeric($nhap) || (int)$nhap <= 0) {
        $loi = 'Vui lòng nhập một số nguyên dương lớn hơn 0!';
    } else {
        $so = (int)$nhap;
        $laSoHoanHao = kiemTraSoHoanHao($so);
        $daKiemTra = true;
    }
}
?>

<section class="exercise-heading">
    <div class="exercise-heading__title-row">
        <div class="exercise-heading__title">
            <span class="exercise-heading__icon">📘</span>
            <h2>Bài 2</h2>
        </div>
        <span class="pill">Hàm kiểm tra</span>
    </div>
    <p class="exercise-heading__subtitle">Kiểm tra số hoàn hảo</p>
    <small class="exercise-heading__description">Kiểm tra một số nguyên dương có bằng tổng các ước số thực sự (nhỏ hơn nó) hay không.</small>
</section>

<section class="exercise-grid">
    <article class="work-card glass-panel">
        <span class="eyebrow">DỮ LIỆU VÀO</span>
        <h3>Kiểm tra một số nguyên dương</h3>

        <?php if ($loi !== ''): ?>
            <div class="alert alert--error"><?= escape($loi) ?></div>
        <?php endif; ?>

        <form method="post" action="?bai=2" class="form-stack">
            <label class="field">
                <span>Số cần kiểm tra</span>
                <input type="number" name="so" min="1" value="<?= escape($nhap) ?>" placeholder="Ví dụ: 6, 28, 496" autofocus required>
                <small>Một số số hoàn hảo quen thuộc: 6, 28, 496, 8128.</small>
            </label>
            <button class="button button--primary" type="submit">Kiểm tra →</button>
        </form>
    </article>

    <article class="result-card glass-panel">
        <span class="eyebrow">KẾT QUẢ</span>
        <h3>Phân tích số</h3>

        <?php if (!$daKiemTra): ?>
            <div class="empty-state">
                <span>?</span>
                <p>Nhập một số nguyên dương rồi bấm "Kiểm tra".</p>
            </div>
        <?php else: ?>
            <div class="verdict <?= $laSoHoanHao ? 'verdict--yes' : 'verdict--no' ?>">
                <span><?= $laSoHoanHao ? '✓' : '×' ?></span>
                <div>
                    <small>Số <?= escape($so) ?></small>
                    <strong><?= $laSoHoanHao ? 'Là số hoàn hảo' : 'Không phải số hoàn hảo' ?></strong>
                </div>
            </div>
        <?php endif; ?>
    </article>
</section>
