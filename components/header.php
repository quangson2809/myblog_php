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
                <a href="https://www.w3schools.com/html/" target="_blank">HTML</a>
                <a href="https://www.w3schools.com/css/" target="_blank">CSS</a>
                <a href="https://www.w3schools.com/js/" target="_blank">JavaScript</a>
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
