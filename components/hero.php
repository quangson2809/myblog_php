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

        </section>
