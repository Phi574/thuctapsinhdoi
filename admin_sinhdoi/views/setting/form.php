<?php
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../layout/sidebar.php';
?>

<div class="main-content">
    <div class="edit-container" style="max-width:800px; margin:20px auto; background:#fff; padding:30px; border-radius:10px; box-shadow:0 5px 15px rgba(0,0,0,0.1);">
        <h2 style="border-bottom:2px solid #eee; padding-bottom:15px; margin-bottom:20px;">⚙️ Cấu hình Website</h2>

        <form method="post" enctype="multipart/form-data">
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                
                <div>
                    <div class="form-group mb-3">
                        <label><b>Tên Website:</b></label>
                        <input type="text" name="site_title" class="form-control" value="<?= $setting['site_title'] ?? '' ?>" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                    </div>

                    <div class="form-group mb-3">
                        <label><b>Hotline:</b></label>
                        <input type="text" name="hotline" class="form-control" value="<?= $setting['hotline'] ?? '' ?>" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                    </div>

                    <div class="form-group mb-3">
                        <label><b>Email liên hệ:</b></label>
                        <input type="email" name="email" class="form-control" value="<?= $setting['email'] ?? '' ?>" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                    </div>
                </div>

                <div>
                    <div class="form-group mb-3">
                        <label><b>Link Facebook:</b></label>
                        <input type="text" name="facebook" class="form-control" value="<?= $setting['facebook'] ?? '' ?>" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                    </div>

                    <div class="form-group mb-3">
                        <label><b>Link Zalo:</b></label>
                        <input type="text" name="zalo" class="form-control" value="<?= $setting['zalo'] ?? '' ?>" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                    </div>

                    <div class="form-group mb-3">
                        <label><b>Logo Website:</b></label><br>
                        <?php if(!empty($setting['logo'])): ?>
                            <img src="uploads/<?= $setting['logo'] ?>" style="height:60px; margin-bottom:10px; border:1px solid #eee;">
                        <?php endif; ?>
                        <input type="file" name="logo">
                    </div>
                </div>

                <div style="grid-column: span 2;">
                    <label><b>Địa chỉ văn phòng:</b></label>
                    <input type="text" name="address" value="<?= $setting['address'] ?? '' ?>" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px; margin-bottom:15px;">

                    <label><b>Mô tả chân trang (Footer):</b></label>
                    <textarea name="mota_footer" rows="4" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;"><?= $setting['mota_footer'] ?? '' ?></textarea>
                </div>

            </div>

            <button type="submit" style="background:#27ae60; color:white; padding:12px 30px; border:none; border-radius:5px; font-weight:bold; cursor:pointer; margin-top:20px; width:100%;">
                💾 LƯU CẤU HÌNH
            </button>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>