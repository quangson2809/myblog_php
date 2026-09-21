<?php
// BÀI 5: Đếm phần tử âm và dương trong mảng 10 phần tử
// Gọi hàm phanLoaiMang($mangSo) từ functions.php

$giaTriMacDinh = '-12, 7, 0, 3, -4, 18, -1, 6, 0, 9';
$nhap = trim($_POST['mang'] ?? $giaTriMacDinh);
$loi = '';
$daPhanTich = false;
$mangSo = [];
$nhom = [];

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    // Tách chuỗi nhập vào theo dấu phẩy, chấm phẩy hoặc khoảng trắng
    $phanTu = preg_split('/[\s,;]+/', $nhap, -1, PREG_SPLIT_NO_EMPTY) ?: [];

    if (count($phanTu) !== 10) {
        $loi = 'Vui lòng nhập đúng 10 phần tử (hiện có: ' . count($phanTu) . ' phần tử)!';
    } else {
        $hopLe = true;
        $tam = [];

        foreach ($phanTu as $pt) {
            if (!is_numeric($pt) || (int)$pt != $pt) {
                $loi = 'Tất cả các phần tử phải là số nguyên! Phát hiện: "' . escape($pt) . '"';
                $hopLe = false;
                break;
            }
            $tam[] = (int)$pt;
        }

        if ($hopLe) {
            $mangSo = $tam;
            $nhom = phanLoaiMang($mangSo);
            $daPhanTich = true;
        }
    }
}
?>

<section class="exercise-heading">
    <div class="exercise-heading__title-row">
        <div class="exercise-heading__title">
            <span class="exercise-heading__icon">📘</span>
            <h2>Bài 5</h2>
        </div>
        <span class="pill">Mảng 10 phần tử</span>
    </div>
    <p class="exercise-heading__subtitle">Đếm số âm và số dương trong mảng</p>
    <small class="exercise-heading__description">Khởi tạo mảng gồm đúng 10 số nguyên, sau đó phân loại và đếm các phần tử âm, dương (số 0 được thống kê riêng).</small>
</section>

<section class="exercise-grid">
    <article class="work-card glass-panel">
        <span class="eyebrow">DỮ LIỆU VÀO</span>
        <h3>Nhập mảng 10 số nguyên</h3>

        <?php if ($loi !== ''): ?>
            <div class="alert alert--error"><?= escape($loi) ?></div>
        <?php endif; ?>

        <form method="post" action="?bai=5" class="form-stack">
            <label class="field">
                <span>Các phần tử mảng</span>
                <textarea name="mang" rows="4" required><?= escape($nhap) ?></textarea>
                <small>Ngăn cách các số bằng dấu phẩy, dấu chấm phẩy hoặc dấu cách.</small>
            </label>
            <button class="button button--primary" type="submit">Phân tích mảng →</button>
        </form>
    </article>

    <article class="result-card glass-panel">
        <span class="eyebrow">KẾT QUẢ</span>
        <h3>Phân loại phần tử</h3>

        <?php if (!$daPhanTich): ?>
            <div class="empty-state">
                <span>[ ]</span>
                <p>Nhấn "Phân tích mảng" để xem kết quả.</p>
            </div>
        <?php else: ?>
            <div class="array-preview">
                <?php foreach ($mangSo as $item): ?>
                    <span><?= escape($item) ?></span>
                <?php endforeach; ?>
            </div>

            <div class="group-result group-result--positive">
                <div><span>Số dương (> 0)</span><strong><?= count($nhom['duong']) ?></strong></div>
                <p><?= empty($nhom['duong']) ? 'Không có' : escape(implode(', ', $nhom['duong'])) ?></p>
            </div>

            <div class="group-result group-result--negative">
                <div><span>Số âm (< 0)</span><strong><?= count($nhom['am']) ?></strong></div>
                <p><?= empty($nhom['am']) ? 'Không có' : escape(implode(', ', $nhom['am'])) ?></p>
            </div>

            <div class="group-result">
                <div><span>Bằng 0</span><strong><?= count($nhom['khong']) ?></strong></div>
                <p><?= empty($nhom['khong']) ? 'Không có' : escape(implode(', ', $nhom['khong'])) ?></p>
            </div>
        <?php endif; ?>
    </article>
</section>
