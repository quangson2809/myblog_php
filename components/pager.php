                <div class="pager glass-panel">
                    <div>
                        <?php if ($baiTruoc !== null): ?>
                            <a class="button button--ghost" href="?bai=<?= $baiTruoc ?>">← Bài <?= $baiTruoc ?></a>
                        <?php endif; ?>
                    </div>

                    <span class="pager__status">Bài <?= $baiHienTai ?> / <?= $tongSoBai ?></span>

                    <div>
                        <?php if ($baiSau !== null): ?>
                            <a class="button button--primary" href="?bai=<?= $baiSau ?>">Bài <?= $baiSau ?> →</a>
                        <?php endif; ?>
                    </div>
                </div>
