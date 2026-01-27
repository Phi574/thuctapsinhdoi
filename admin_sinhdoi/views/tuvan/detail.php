<?php require_once __DIR__ . '/../layout/header.php'; ?>

<style>
    .detail-wrapper {
        max-width: 700px;
        margin: 30px auto;
        font-family: 'Segoe UI', sans-serif;
    }

    .info-card {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
        border: 1px solid #eee;
    }

    .card-header {
        background: #f8f9fa;
        padding: 20px;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-header h2 { margin: 0; font-size: 1.4rem; color: #2c3e50; }

    .card-body { padding: 30px; }

    .info-row {
        display: flex;
        margin-bottom: 20px;
        border-bottom: 1px dashed #f0f0f0;
        padding-bottom: 10px;
    }

    .info-label {
        width: 150px;
        font-weight: 600;
        color: #666;
    }

    .info-value {
        flex: 1;
        color: #333;
    }

    .content-box {
        background: #fdfdfd;
        border: 1px solid #f1f1f1;
        padding: 15px;
        border-radius: 8px;
        margin-top: 5px;
        line-height: 1.6;
    }

    /* Status Badges */
    .status-badge {
        padding: 6px 15px;
        border-radius: 20px;
        font-weight: bold;
        font-size: 0.9rem;
    }
    .status-0 { background: #e9ecef; color: #6c757d; }
    .status-1 { background: #e3f2fd; color: #0d6efd; }
    .status-2 { background: #d1e7dd; color: #0f5132; }

    .footer-actions {
        padding: 20px;
        background: #f8f9fa;
        display: flex;
        gap: 10px;
        justify-content: center;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: 0.3s;
        border: none;
        cursor: pointer;
    }

    .btn-back { color: #666; background: #eee; }
    .btn-call { background: #0d6efd; color: white; }
    .btn-done { background: #198754; color: white; }
    .btn:hover { opacity: 0.85; transform: translateY(-2px); }
</style>

<div class="detail-wrapper">
    <a href="index.php?action=tuvan_list" style="display: inline-block; margin-bottom: 15px; text-decoration: none; color: #0d6efd;">← Quay lại danh sách</a>

    <div class="info-card">
        <div class="card-header">
            <h2>📞 Chi tiết yêu cầu</h2>
            <span class="status-badge status-<?= $tuvan['trang_thai'] ?? 0 ?>">
                <?php
                if ($tuvan['trang_thai'] == 0) echo '⏳ Chưa xử lý';
                elseif ($tuvan['trang_thai'] == 1) echo '📞 Đã liên hệ';
                else echo '✅ Đã chốt thành công';
                ?>
            </span>
        </div>

        <div class="card-body">
            <div class="info-row">
                <div class="info-label">👤 Khách hàng:</div>
                <div class="info-value"><strong><?= htmlspecialchars($tuvan['ten_khach'] ?? '') ?></strong></div>
            </div>

            <div class="info-row">
                <div class="info-label">📱 Số điện thoại:</div>
                <div class="info-value"><a href="tel:<?= $tuvan['phone'] ?>" style="color: #0d6efd; font-weight: bold;"><?= htmlspecialchars($tuvan['phone'] ?? '') ?></a></div>
            </div>

            <div class="info-row">
                <div class="info-label">📧 Email:</div>
                <div class="info-value"><?= htmlspecialchars($tuvan['email'] ?? 'Không cung cấp') ?></div>
            </div>

            <div class="info-row" style="flex-direction: column; border: none;">
                <div class="info-label" style="width: 100%; margin-bottom: 10px;">💬 Nội dung yêu cầu:</div>
                <div class="content-box">
                    <?= nl2br(htmlspecialchars($tuvan['noi_dung'] ?? '')) ?>
                </div>
            </div>
            
            <div class="info-row" style="margin-top: 20px; border: none;">
                <div class="info-label">⏰ Gửi lúc:</div>
                <div class="info-value"><?= date('H:i - d/m/Y', strtotime($tuvan['created_at'] ?? 'now')) ?></div>
            </div>
        </div>

        <div class="footer-actions">
            <form method="post" action="index.php?action=tuvan_update">
                <input type="hidden" name="id" value="<?= $tuvan['id'] ?>">
                <input type="hidden" name="trang_thai" value="1">
                <button type="submit" class="btn btn-call">Đánh dấu: Đã gọi</button>
            </form>

            <form method="post" action="index.php?action=tuvan_update">
                <input type="hidden" name="id" value="<?= $tuvan['id'] ?>">
                <input type="hidden" name="trang_thai" value="2">
                <button type="submit" class="btn btn-done">Đánh dấu: Đã chốt</button>
            </form>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>