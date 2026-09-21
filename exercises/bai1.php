<?php
// BÀI 1: Nhập số cho đến khi gặp 0
// Sử dụng $_SESSION để lưu dãy số qua các lần gửi form

if (!isset($_SESSION['bai1_day_so'])) {
    $_SESSION['bai1_day_so'] = [];
    $_SESSION['bai1_da_dung'] = false;
}

$loi = '';
$thongBao = '';

// Xử lý khi người dùng nhấn nút gửi form
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $action = $_POST['action'] ?? 'them';

    if ($action === 'lam_moi') {
        // Làm mới dãy số
        $_SESSION['bai1_day_so'] = [];
        $_SESSION['bai1_da_dung'] = false;
        $thongBao = 'Đã làm mới dãy số. Bạn có thể nhập lại từ đầu!';
    } elseif (!$_SESSION['bai1_da_dung']) {
        // Thêm số vào dãy
        $nhap = trim($_POST['so'] ?? '');

        if ($nhap === '' || !is_numeric($nhap)) {
            $loi = 'Vui lòng nhập một số nguyên hợp lệ!';
        } else {
            $so = (int)$nhap;
            $_SESSION['bai1_day_so'][] = $so;

            if ($so === 0) {
                $_SESSION['bai1_da_dung'] = true;
                $thongBao = 'Đã gặp số 0 — Chương trình dừng nhận thêm dữ liệu!';
            }
        }
    }
}

$daySo = $_SESSION['bai1_day_so'];
$daDung = $_SESSION['bai1_da_dung'];
?>

<section class="exercise-heading">
    <div class="exercise-heading__title-row">
        <div class="exercise-heading__title">
            <span class="exercise-heading__icon">📘</span>
            <h2>Bài 1</h2>
        </div>
        <span class="pill">Vòng lặp & Session</span>
    </div>
    <p class="exercise-heading__subtitle">Nhập số cho đến khi gặp 0</p>
    <small class="exercise-heading__description">Mỗi lần gửi form là một lần nhập số. Session lưu giữ dãy số giữa các request; khi nhập 0, chương trình dừng nhận thêm số mới.</small>
</section>

<section class="exercise-grid">
    <article class="work-card glass-panel">
        <div class="card-title-row">
            <div>
                <span class="eyebrow">DỮ LIỆU VÀO</span>
                <h3>Nhập từng số nguyên</h3>
            </div>
            <span class="status-chip <?= $daDung ? 'status-chip--done' : '' ?>">
                <?= $daDung ? 'Đã dừng' : 'Đang nhận dữ liệu' ?>
            </span>
        </div>

        <?php if ($loi !== ''): ?>
            <div class="alert alert--error"><?= escape($loi) ?></div>
        <?php endif; ?>

        <?php if ($thongBao !== ''): ?>
            <div class="alert alert--success"><?= escape($thongBao) ?></div>
        <?php endif; ?>

        <form method="post" action="?bai=1" class="form-stack">
            <input type="hidden" name="action" value="them">
            <label class="field">
                <span>Số nguyên</span>
                <input type="number" name="so" placeholder="Ví dụ: 12" <?= $daDung ? 'disabled' : '' ?> autofocus>
                <small>Nhập <strong>0</strong> để kết thúc dãy số.</small>
            </label>
            <button class="button button--primary" type="submit" <?= $daDung ? 'disabled' : '' ?>>
                Thêm vào dãy →
            </button>
        </form>

        <form method="post" action="?bai=1" class="inline-form">
            <input type="hidden" name="action" value="lam_moi">
            <button class="button button--ghost" type="submit">Làm mới bài</button>
        </form>
    </article>

    <article class="result-card glass-panel">
        <span class="eyebrow">KẾT QUẢ</span>
        <h3>Dãy số đã nhập</h3>

        <?php if (empty($daySo)): ?>
            <div class="empty-state">
                <span>∅</span>
                <p>Chưa có số nào được nhập.</p>
            </div>
        <?php else: ?>
            <div class="number-stream">
                <?php foreach ($daySo as $index => $item): ?>
                    <span class="number-chip <?= $item === 0 ? 'number-chip--stop' : '' ?>">
                        <small>#<?= $index + 1 ?></small><?= escape($item) ?>
                    </span>
                <?php endforeach; ?>
            </div>
            <div class="result-summary">
                <div><span>Số lượng đã nhập</span><strong><?= count($daySo) ?></strong></div>
                <div><span>Trạng thái</span><strong><?= $daDung ? 'Đã gặp 0' : 'Tiếp tục' ?></strong></div>
            </div>
        <?php endif; ?>
    </article>
</section>
