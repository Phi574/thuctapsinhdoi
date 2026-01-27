<?php
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../layout/sidebar.php';

// Merge data để tránh lỗi undefined index
$nha = array_merge([
    'tieude' => '', 'diachi' => '', 'gia' => '', 
    'dientich' => '', 'mota' => '', 'img_1' => '', 'loai' => 'nha'
], $nha ?? []);

// Xác định loại để select option
$id_loai = ($nha['loai'] === 'dat') ? 2 : 1; 
?>

<style>
/* Giữ nguyên CSS cũ của bạn */
.main-content{margin-left:260px;padding:20px}
.edit-container{max-width:900px;background:#fff;padding:30px;border-radius:12px;box-shadow:0 5px 25px rgba(0,0,0,.1)}
.form-grid{display:grid;grid-template-columns:1fr 1fr;gap:20px}
.full-width{grid-column:span 2}
.form-group{display:flex;flex-direction:column}
.form-group label{font-weight:600;margin-bottom:8px}
.form-group input,.form-group select,.form-group textarea{padding:12px;border:1px solid #ccc;border-radius:8px}
.image-edit-section{display:flex;gap:20px;align-items:center;background:#f9f9f9;padding:15px;border-radius:10px;border:1px dashed #ddd}
.current-img-wrapper img{width:120px;height:120px;object-fit:cover;border-radius:8px;border:1px solid #ccc}
.btn-update{background:#27ae60;color:#fff;padding:15px;border:none;border-radius:8px;font-weight:bold;cursor:pointer;width:100%;margin-top:20px}
.btn-back{display:inline-block;margin-bottom:15px;color:#666;text-decoration:none}
</style>

<div class="main-content">
    <div class="edit-container">
        <a href="index.php?action=baidang" class="btn-back">⬅ Quay lại danh sách</a>
        <h2>✏️ Chỉnh sửa bài đăng</h2>

        <form method="post" enctype="multipart/form-data">
            <div class="form-grid">
                <div class="form-group">
                    <label>Loại BĐS</label>
                    <select name="id_loai">
                        <option value="1" <?= $id_loai == 1 ? 'selected' : '' ?>>🏠 Nhà ở</option>
                        <option value="2" <?= $id_loai == 2 ? 'selected' : '' ?>>🌱 Đất nền</option>
                    </select>
                </div>

                <div class="form-group full-width">
                    <label>Tiêu đề</label>
                    <input type="text" name="tieude" value="<?= htmlspecialchars($nha['tieude']) ?>" required>
                </div>

                <div class="form-group full-width">
                    <label>Địa chỉ</label>
                    <input type="text" name="diachi" value="<?= htmlspecialchars($nha['diachi']) ?>" required>
                </div>

                <div class="form-group">
                    <label>Giá (VNĐ)</label>
                    <input type="number" name="gia" value="<?= $nha['gia'] ?>" required>
                </div>

                <div class="form-group">
                    <label>Diện tích (m²)</label>
                    <input type="number" name="dientich" value="<?= $nha['dientich'] ?>" required>
                </div>

                <div class="form-group full-width">
                    <label>Mô tả chi tiết</label>
                    <textarea name="mota" rows="6"><?= htmlspecialchars($nha['mota']) ?></textarea>
                </div>

                <div class="form-group full-width">
                    <label>Hình ảnh bài đăng</label>
                    <div class="image-edit-section">
                        <?php 
                            // Logic hiển thị ảnh giống Detail và List
                            $img_name = $nha['img_1'] ?? $nha['img'] ?? '';
                            $img_src = "uploads/" . $img_name;
                            $file_check = __DIR__ . "/../../public/uploads/" . $img_name;
                        ?>
                        
                        <?php if (!empty($img_name) && file_exists($file_check)): ?>
                            <div class="current-img-wrapper">
                                <small>Ảnh hiện tại:</small><br>
                                <img src="<?= $img_src ?>" alt="Ảnh cũ">
                            </div>
                        <?php else: ?>
                            <div class="text-gray-500 italic text-sm">Chưa có ảnh hoặc ảnh lỗi</div>
                        <?php endif; ?>

                        <div style="flex-grow:1">
                            <small>Tải ảnh mới để thay thế (nếu muốn):</small>
                            <input type="file" name="img_1">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn-update">💾 CẬP NHẬT THAY ĐỔI</button>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>