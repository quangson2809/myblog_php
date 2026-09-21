            <aside class="sidebar">
                <div class="sidebar__heading">
                    <div class="sidebar__title-wrap">
                        <span class="sidebar__icon">&lt;/&gt;</span>
                        <div>
                            <h2>Bài tập PHP</h2>
                            <small>Danh sách bài thực hành</small>
                        </div>
                    </div>
                </div>

                <nav class="exercise-nav" aria-label="Danh sách bài tập">
                    <?php if ($tuKhoaTimKiem !== '' && empty($danhSachHienThi)): ?>
                        <div class="alert alert--error">
                            Không tìm thấy bài học phù hợp.
                        </div>
                    <?php endif; ?>

                    <?php foreach ($danhSachBai as $id => $bai): ?>
                        <a class="exercise-link <?= $id === $baiHienTai ? 'active' : '' ?>" href="?bai=<?= $id ?>">
                            <span class="exercise-link__dot">▶</span>
                            <span class="exercise-link__text">
                                <strong>Bài tập <?= $id ?></strong>
                                <small><?= escape($bai['tieuDe']) ?></small>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </nav>
            </aside>
