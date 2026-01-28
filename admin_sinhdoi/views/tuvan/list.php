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

<?php
// FILE: admin_sinhdoi/views/tuvan/list.php
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../layout/sidebar.php';
?>

<div class="main-content">
    
    <div class="filter-bar glass-card" style="margin-bottom: 20px; padding: 20px;">
        <form action="index.php" method="GET" style="display:flex; gap:10px; flex-wrap:wrap; align-items:center;">
            <input type="hidden" name="action" value="tuvan">
            
            <div style="flex:1;">
                <input type="text" name="keyword" value="<?= htmlspecialchars($keyword) ?>" 
                       placeholder="🔍 Tìm tên, số điện thoại, nội dung..." 
                       style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

            <select name="status" style="padding:10px; border:1px solid #ddd; border-radius:8px;">
                <option value="-1">-- Tất cả trạng thái --</option>
                <option value="0" <?= ($status_filter === 0) ? 'selected' : '' ?>>✨ Mới gửi</option>
                <option value="1" <?= ($status_filter === 1) ? 'selected' : '' ?>>📞 Đã liên hệ</option>
                <option value="2" <?= ($status_filter === 2) ? 'selected' : '' ?>>💰 Đã chốt/Cọc</option>
            </select>

            <button type="submit" class="btn-primary" style="padding:10px 20px;">Lọc dữ liệu</button>
            <a href="index.php?action=tuvan" class="btn-secondary" style="padding:10px 20px; text-decoration:none; background:#eee; color:#333; border-radius:8px;">Reset</a>
        </form>
    </div>

    <h3 style="color:#2c3e50; margin-bottom:15px; display:flex; align-items:center; gap:10px;">
        <i class="fa-solid fa-bolt text-warning"></i> Yêu cầu cần xử lý (<?= count($list_active) ?>)
    </h3>
    
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Khách hàng</th>
                    <th>Nội dung tư vấn</th>
                    <th>Phân loại</th>
                    <th>Người phụ trách</th>
                    <th>Trạng thái</th>
                    <th>Thao tác nhanh</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($list_active)): ?>
                    <tr><td colspan="7" style="text-align:center; padding:20px;">Không có yêu cầu nào đang chờ xử lý.</td></tr>
                <?php else: ?>
                    <?php foreach ($list_active as $row): ?>
                        <tr>
                            <td>#<?= $row['id'] ?></td>
                            <td>
                                <b><?= htmlspecialchars($row['ten_khach']) ?></b><br>
                                <a href="tel:<?= $row['phone'] ?>" style="color:#e67e22; font-weight:bold;"><?= $row['phone'] ?></a>
                                <div style="font-size:11px; color:#888;"><?= date('d/m/Y H:i', strtotime($row['created_at'])) ?></div>
                            </td>
                            <td>
                                <div style="max-width:250px; white-space:pre-wrap; font-size:13px;"><?= htmlspecialchars($row['noi_dung']) ?></div>
                            </td>
                            <td>
                                <?php if($row['loai'] == 2): ?>
                                    <span class="badge bg-info">Bài đăng #<?= $row['bai_dang_id'] ?></span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Tư vấn chung</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?= !empty($row['ten_user']) ? $row['ten_user'] : '<span style="color:#999;">Chưa gán</span>' ?>
                            </td>
                            <td>
                                <?php 
                                    if ($row['trang_thai'] == 0) echo '<span class="badge bg-danger">Mới</span>';
                                    elseif ($row['trang_thai'] == 1) echo '<span class="badge bg-warning">Đã gọi</span>';
                                ?>
                            </td>
                            <td>
                                <div style="display:flex; gap:5px;">
                                    <a href="tel:<?= $row['phone'] ?>" class="btn-icon bg-success" title="Gọi ngay"><i class="fa fa-phone"></i></a>
                                    
                                    <?php if($row['trang_thai'] == 0): ?>
                                        <a href="index.php?action=tuvan_update&id=<?= $row['id'] ?>&status=1" class="btn-icon bg-warning" title="Đánh dấu đã gọi" onclick="return confirm('Đã liên hệ với khách này?')"><i class="fa fa-check"></i></a>
                                    <?php endif; ?>

                                    <a href="index.php?action=tuvan_update&id=<?= $row['id'] ?>&status=2" class="btn-icon bg-primary" title="Xác nhận Đã Cọc/Chốt" onclick="return confirm('Xác nhận khách đã chốt/cọc thành công? Yêu cầu này sẽ chuyển xuống mục lịch sử.')"><i class="fa fa-dollar-sign"></i></a>

                                    <a href="index.php?action=tuvan_delete&id=<?= $row['id'] ?>" class="btn-icon bg-danger" onclick="return confirm('Bạn chắc chắn muốn xóa vĩnh viễn?')" title="Xóa"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <details style="margin-top: 30px; background: #f8f9fa; border-radius: 8px; border: 1px solid #ddd;">
        <summary style="padding: 15px; cursor: pointer; font-weight: bold; color: #555;">
            📁 Lịch sử / Đã chốt (<?= count($list_done) ?>) <span style="font-weight:normal; font-size:12px; margin-left:10px;">(Bấm để mở rộng/thu gọn)</span>
        </summary>
        
        <div class="table-container" style="border-top: 1px solid #ddd;">
            <table style="background: #fdfdfd;">
                <thead>
                    <tr style="background: #eee;">
                        <th>#ID</th>
                        <th>Khách hàng</th>
                        <th>Kết quả</th>
                        <th>Thời gian gửi</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($list_done)): ?>
                        <tr><td colspan="5" style="text-align:center;">Chưa có dữ liệu lịch sử.</td></tr>
                    <?php else: ?>
                        <?php foreach ($list_done as $row): ?>
                            <tr style="opacity: 0.8;">
                                <td>#<?= $row['id'] ?></td>
                                <td><?= htmlspecialchars($row['ten_khach']) ?> - <?= $row['phone'] ?></td>
                                <td>
                                    <?php 
                                        if ($row['trang_thai'] == 2) echo '<span class="badge bg-success">💰 Đã Cọc / Chốt</span>';
                                        elseif ($row['trang_thai'] == 3) echo '<span class="badge bg-dark">Đã hủy</span>';
                                    ?>
                                </td>
                                <td><?= date('d/m/Y H:i', strtotime($row['created_at'])) ?></td>
                                <td>
                                    <a href="index.php?action=tuvan_update&id=<?= $row['id'] ?>&status=0" class="btn-icon bg-secondary" title="Khôi phục lại" onclick="return confirm('Khôi phục lại trạng thái Mới?')"><i class="fa fa-undo"></i></a>
                                    <a href="index.php?action=tuvan_delete&id=<?= $row['id'] ?>" class="btn-icon bg-danger" onclick="return confirm('Xóa vĩnh viễn?')" title="Xóa"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </details>

</div>

<style>
    /* CSS Bổ sung cho đẹp */
    .btn-icon { display: inline-flex; width: 30px; height: 30px; align-items: center; justify-content: center; border-radius: 5px; color: white; text-decoration: none; transition: 0.2s; }
    .btn-icon:hover { opacity: 0.8; transform: translateY(-2px); color: white; }
    .badge { padding: 4px 8px; border-radius: 4px; color: white; font-size: 11px; font-weight: bold; }
    .bg-danger { background: #e74c3c; }
    .bg-warning { background: #f39c12; }
    .bg-success { background: #27ae60; }
    .bg-info { background: #3498db; }
    .bg-secondary { background: #95a5a6; }
    .bg-primary { background: #2980b9; }
    .bg-dark { background: #34495e; }
    .text-warning { color: #f39c12; }
</style>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>