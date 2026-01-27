<?php require_once __DIR__ . '/../layout/header.php'; ?>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">


<style>
    :root {
        --primary-color: #27ae60;
        --secondary-color: #2c3e50;
        --text-main: #334155;
        --text-muted: #64748b;
        --bg-body: #f1f5f9;
        --card-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
    }
    body {
        background-color: var(--bg-body);
        color: var(--text-main);
        font-family: 'Inter', sans-serif;

        
    }

  
    /* ... Giữ nguyên phần :root và body cũ của bạn ... */

    .detail-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
        display: grid;
        grid-template-columns: 1fr 380px; /* Chia cột nội dung và sidebar */
        gap: 30px;
    }

    /* Nút quay lại */
    .back-btn {
        grid-column: 1 / -1;
        display: inline-block;
        text-decoration: none;
        color: var(--text-muted);
        font-weight: 500;
        margin-bottom: 10px;
        transition: color 0.3s;
    }
    .back-btn:hover {
        color: var(--primary-color);
    }

    /* Cột nội dung chính */
    .post-main {
        background: #fff;
        padding: 30px;
        border-radius: 16px;
        box-shadow: var(--card-shadow);
    }

    .post-image {
        width: 100%;
        height: 450px;
        object-fit: cover;
        border-radius: 12px;
        margin-bottom: 25px;
    }

    .post-main h2 {
        font-size: 28px;
        color: var(--secondary-color);
        line-height: 1.4;
        margin-bottom: 20px;
    }

    /* Grid thông số nhanh */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
        padding: 20px 0;
        border-top: 1px solid #e2e8f0;
        border-bottom: 1px solid #e2e8f0;
        margin-bottom: 25px;
    }

    .stat-item {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .stat-item span {
        font-size: 14px;
        color: var(--text-muted);
    }

    .stat-item b {
        font-size: 16px;
        color: var(--secondary-color);
    }

    .stat-price {
        color: #e74c3c !important; /* Màu đỏ nổi bật cho giá */
        font-size: 20px !important;
    }

    /* Phần mô tả */
    .description-title {
        font-size: 20px;
        margin-bottom: 15px;
        color: var(--secondary-color);
        position: relative;
        padding-left: 15px;
    }

    .description-title::before {
        content: "";
        position: absolute;
        left: 0;
        top: 4px;
        bottom: 4px;
        width: 4px;
        background: var(--primary-color);
        border-radius: 2px;
    }

    .description-content {
        line-height: 1.8;
        color: #475569;
        white-space: pre-line; /* Giữ các dòng xuống hàng */
    }

    /* Sidebar Form Tư Vấn */
    .consult-sidebar {
        background: #fff;
        padding: 30px;
        border-radius: 16px;
        box-shadow: var(--card-shadow);
        height: fit-content;
        position: sticky;
        top: 20px; /* Cuộn trang form vẫn dính ở đầu */
    }

    .consult-sidebar h3 {
        font-size: 22px;
        margin-bottom: 20px;
        text-align: center;
        color: var(--secondary-color);
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group input, 
    .form-group textarea {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        font-family: inherit;
        font-size: 15px;
        transition: all 0.3s;
        box-sizing: border-box; /* Quan trọng để không tràn viền */
    }

    .form-group input:focus, 
    .form-group textarea:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(39, 174, 96, 0.1);
    }

    .form-group textarea {
        height: 120px;
        resize: vertical;
    }

    .btn-submit {
        width: 100%;
        padding: 15px;
        background: var(--primary-color);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 700;
        cursor: pointer;
        transition: background 0.3s;
        letter-spacing: 0.5px;
    }

    .btn-submit:hover {
        background: #219150;
    }

    /* Responsive cho điện thoại */
    @media (max-width: 992px) {
        .detail-container {
            grid-template-columns: 1fr;
        }
        .consult-sidebar {
            position: static;
        }
        .post-image {
            height: 300px;
        }
        .stats-grid {
            grid-template-columns: 1fr;
        }
    }

</style>

<div class="detail-container">
    <a href="index.php?action=baidang" class="back-btn">← Quay lại danh sách</a>

    <?php if (isset($nha) && is_array($nha)): ?>
        <?php
            // ===== XỬ LÝ ẢNH (LOGIC CHUẨN) =====
            $img_name = $nha['img_1'] ?? $nha['img'] ?? '';
            // Đường dẫn hiển thị (Relative path từ index.php)
            $img_src = "uploads/" . $img_name; 
            // Đường dẫn kiểm tra file
            $file_check = __DIR__ . "/../../public/uploads/" . $img_name;
            
            $image_url = (!empty($img_name) && file_exists($file_check)) 
                         ? $img_src 
                         : "assets/images/no-image.jpg";
        ?>

        <div class="post-main">
            <img src="<?= $image_url ?>" class="post-image" alt="Hình ảnh bài đăng" 
                 onerror="this.src='assets/images/no-image.jpg'">

            <div class="post-content">
                <div class="post-header">
                    <div>
                        <div class="badge <?= ($nha['loai'] == 'dat') ? 'badge-dat' : 'badge-nha' ?> mb-2" style="display:inline-block">
                            <?= ($nha['loai'] == 'dat') ? '🌱 Đất nền' : '🏠 Nhà ở' ?>
                        </div>
                        <h1 class="post-title"><?= htmlspecialchars($nha['tieude']) ?></h1>
                        <div class="post-meta">
                            <span><i class="fa-solid fa-location-dot"></i> <?= htmlspecialchars($nha['diachi']) ?></span>
                        </div>
                    </div>
                </div>

                <div class="stats-grid">
                    <div class="stat-item">
                        <span>Diện tích</span>
                        <b><?= $nha['dientich'] ?> m²</b>
                    </div>
                    <div class="stat-item">
                        <span>Mức giá</span>
                        <b class="stat-price"><?= number_format($nha['gia'], 0, ',', '.') ?> đ</b>
                    </div>
                    <div class="stat-item">
                        <span>Trạng thái</span>
                        <b><?= ($nha['trang_thai'] ?? 0) == 1 ? 'Đã cọc' : (($nha['trang_thai'] ?? 0) == 2 ? 'Đã bán' : 'Chưa bán') ?></b>
                    </div>
                </div>

                <div class="description">
                    <h4 class="description-title">Mô tả chi tiết</h4>
                    <div class="description-content">
                        <?= nl2br(htmlspecialchars($nha['mota'])) ?>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <p class="text-center text-gray-500">Không tìm thấy dữ liệu bài đăng.</p>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>