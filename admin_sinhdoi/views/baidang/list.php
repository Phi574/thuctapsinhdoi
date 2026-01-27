<?php
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../layout/sidebar.php';

function renderTrangThai($value) {
    switch ((int)$value) {
        case 1: return '<span class="badge badge-coc">📌 Đã cọc</span>';
        case 2: return '<span class="badge badge-ban">✅ Đã bán</span>';
        default: return '<span class="badge badge-chua">🕓 Chưa bán</span>';
    }
}
?>

<style>
/* ... (Giữ nguyên CSS của bạn) ... */
.container { padding: 20px; max-width: 1200px; margin: 0 auto; font-family: 'Segoe UI', sans-serif; }
.header-flex { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
.btn-add { background-color: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 8px; font-weight: bold; }
.grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 25px; }
.card { background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.08); display: flex; flex-direction: column; }
.card img { width: 100%; height: 200px; object-fit: cover; background: #f5f5f5; }
.card-content { padding: 15px; flex-grow: 1; }
.card h3 { font-size: 1.1rem; margin-bottom: 8px; height: 2.8em; overflow: hidden; }
.info { color: #666; font-size: 0.9rem; }
.price { color: #e74c3c; font-weight: bold; margin-top: 8px; }
.badge { display: inline-block; padding: 3px 8px; border-radius: 6px; font-size: 0.75rem; margin-bottom: 6px; }
.badge-nha { background: #e3f2fd; color: #1976d2; }
.badge-dat { background: #e8f5e9; color: #2e7d32; }
.badge-coc { background: #fff3cd; color: #856404; }
.badge-ban { background: #e8f5e9; color: #2e7d32; }
.badge-chua { background: #eceff1; color: #37474f; }
.actions { display: flex; gap: 8px; padding: 10px; border-top: 1px solid #eee; background: #fafafa; }
.actions a { flex: 1; text-align: center; font-size: 0.85rem; padding: 6px; text-decoration: none; border-radius: 4px; }
.btn-view { background: #e3f2fd; color: #1976d2; }
.btn-edit { background: #fff3e0; color: #f57c00; }
.btn-delete { background: #ffebee; color: #d32f2f; }
</style>

<div class="container">
    <div class="header-flex">
        <h2>📋 Danh sách bài đăng</h2>
        <a href="index.php?action=baidang_add" class="btn-add">➕ Đăng bài mới</a>
    </div>

    <div class="grid">
        <?php if (empty($list)): ?>
            <p style="grid-column:1/-1;text-align:center;color:#999">Chưa có bài đăng nào</p>
        <?php else: ?>
            <?php foreach ($list as $row): ?>
                <?php
                // SỬA LỖI QUAN TRỌNG: Dùng 'loai' thay vì 'loai_bds'
                $isNha = ($row['loai'] ?? '') === 'nha';

                // Tạo link đúng Controller
                $link_view = $isNha ? "index.php?action=nha_detail&id={$row['id']}" : "index.php?action=dat_detail&id={$row['id']}";
                $link_edit = $isNha ? "index.php?action=nha_edit&id={$row['id']}"   : "index.php?action=dat_edit&id={$row['id']}";

                // Xử lý ảnh
                $img_name = $row['img'] ?? ''; 
                $img_src = "public/uploads/" . $img_name;
                $file_check = __DIR__ . "/../../public/uploads/" . $img_name;
                
                $image_url = (!empty($img_name) && file_exists($file_check)) 
                             ? $img_src 
                             : "public/assets/images/no-image.jpg";
                ?>
                
                <div class="card">
                    <img src="<?= $image_url ?>" alt="Ảnh bài đăng" onerror="this.src='public/assets/images/no-image.jpg'">
                    
                    <div class="card-content">
                        <div style="display:flex; gap:6px; flex-wrap:wrap; margin-bottom:6px">
                            <span class="badge <?= $isNha ? 'badge-nha' : 'badge-dat' ?>">
                                <?= $isNha ? '🏠 Nhà' : '🌱 Đất' ?>
                            </span>
                            <?= renderTrangThai($row['trang_thai'] ?? 0) ?>
                        </div>

                        <h3><?= htmlspecialchars($row['tieude'] ?? '') ?></h3>
                        <p class="info">📍 <?= htmlspecialchars($row['diachi'] ?? '') ?></p>
                        <p class="price">💰 <?= number_format($row['gia'] ?? 0, 0, ',', '.') ?> đ</p>
                    </div>

                    <div class="actions">
                        <a href="<?= $link_view ?>" class="btn-view">Xem</a>
                        <?php if ($_SESSION['user']['role'] === 'admin' || $_SESSION['user']['id'] == ($row['user_id'] ?? 0)): ?>
                            <a href="<?= $link_edit ?>" class="btn-edit">Sửa</a>
                            <a href="index.php?action=baidang_delete&id=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('Xoá bài này?')">Xoá</a>
                        <?php endif; ?>
                    </div>
                </div> 
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>