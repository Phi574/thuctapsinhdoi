<?php
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../layout/sidebar.php';
?>

<style>
    .tuvan-container {
        padding: 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .table-responsive {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        overflow: hidden;
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1000px;
    }

    thead {
        background-color: #f8f9fa;
        border-bottom: 2px solid #eee;
    }

    th {
        text-align: left;
        padding: 15px;
        color: #555;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
    }

    td {
        padding: 15px;
        border-bottom: 1px solid #f1f1f1;
        color: #444;
        vertical-align: middle;
        font-size: 0.95rem;
    }

    tr:hover { background-color: #fcfcfc; }

    /* Trạng thái Badge */
    .badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: bold;
        display: inline-block;
    }
    .badge-pending { background: #e9ecef; color: #6c757d; } /* Chưa gọi */
    .badge-calling { background: #cce5ff; color: #004085; } /* Đã gọi */
    .badge-success { background: #d4edda; color: #155724; } /* Đã chốt */

    /* Nút hành động */
    .btn-group {
        display: flex;
        gap: 5px;
    }

    .btn-action {
        padding: 7px 12px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 0.8rem;
        font-weight: 500;
        transition: 0.2s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
    }

    .btn-view { background: #f1f3f5; color: #495057; }
    .btn-call { background: #007bff; color: white; }
    .btn-done { background: #28a745; color: white; }

    .btn-action:hover {
        opacity: 0.85;
        transform: translateY(-1px);
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .info-sub {
        font-size: 0.85rem;
        color: #888;
        display: block;
        margin-top: 3px;
    }
</style>

<div class="tuvan-container">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h2>📞 Danh sách yêu cầu tư vấn</h2>
        <span style="color: #666;">Tổng số: <strong><?= count($ds_tuvan) ?></strong> bản ghi</span>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th width="50">#</th>
                    <th>Khách hàng</th>
                    <th>Nội dung tư vấn</th>
                    <th>Người phụ trách</th>
                    <th>Phân loại</th>
                    <th>Trạng thái</th>
                    <th>Thời gian</th>
                    <th width="250">Thao tác nhanh</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($ds_tuvan)): ?>
                <tr>
                    <td colspan="8" style="text-align: center; padding: 40px; color: #999;">
                        Hiện chưa có yêu cầu tư vấn nào từ khách hàng.
                    </td>
                </tr>
                <?php else: ?>
                    <?php $count = 0; foreach ($ds_tuvan as $tv): ?>
                    <tr>
                        <td><?= ++$count ?></td>
                        <td>
                            <strong><?= htmlspecialchars($tv['ten_khach'] ?? '') ?></strong>
                            <span class="info-sub">📱 <?= htmlspecialchars($tv['phone'] ?? '') ?></span>
                        </td>
                        <td>
                            <div style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="<?= htmlspecialchars($tv['noi_dung'] ?? '') ?>">
                                <?= htmlspecialchars($tv['noi_dung'] ?? '') ?>
                            </div>
                        </td>
                        <td>
                            <span style="font-weight: 500; color: #2c3e50;">
                                <?= htmlspecialchars($tv['ten_user'] ?? 'Hệ thống') ?>
                            </span>
                        </td>
                        <td>
                            <small style="background: #eee; padding: 2px 6px; border-radius: 4px;">
                                <?= ($tv['loai'] ?? 1) == 1 ? '🌐 Toàn site' : '📄 Bài đăng' ?>
                            </small>
                        </td>
                        <td>
                            <?php
                            $st = $tv['trang_thai'] ?? 0;
                            if ($st == 0) echo '<span class="badge badge-pending">⏳ Chưa gọi</span>';
                            elseif ($st == 1) echo '<span class="badge badge-calling">📞 Đã gọi</span>';
                            else echo '<span class="badge badge-success">✅ Đã chốt</span>';
                            ?>
                        </td>
                        <td>
                            <span class="info-sub"><?= date('H:i d/m/Y', strtotime($tv['created_at'] ?? 'now')) ?></span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="index.php?action=tuvan_detail&id=<?= $tv['id'] ?>" class="btn-action btn-view">Xem</a>

                                <?php 
                                $user = $_SESSION['user'];
                                // Quyền Admin hoặc người được giao bài đăng mới được sửa
                                if ($user['role'] == 'admin' || ($tv['user_nhan_id'] ?? 0) == $user['id']): 
                                ?>
                                    <form method="post" action="index.php?action=tuvan_update" style="margin:0;">
                                        <input type="hidden" name="id" value="<?= $tv['id'] ?>">
                                        <input type="hidden" name="trang_thai" value="1">
                                        <button type="submit" class="btn-action btn-call">Đã gọi</button>
                                    </form>

                                    <form method="post" action="index.php?action=tuvan_update" style="margin:0;">
                                        <input type="hidden" name="id" value="<?= $tv['id'] ?>">
                                        <input type="hidden" name="trang_thai" value="2">
                                        <button type="submit" class="btn-action btn-done">đã cọc</button>
                                    </form>

                                    <form method="post" action="index.php?action=tuvan_update" style="margin:0;">
                                        <input type="hidden" name="id" value="<?= $tv['id'] ?>">
                                        <input type="hidden" name="trang_thai" value="3">
                                        <button type="submit" class="btn-action btn-done">Chốt</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>