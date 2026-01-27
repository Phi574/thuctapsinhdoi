<?php
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../layout/sidebar.php';
?>

<style>
    .form-container {
        max-width: 800px;
        margin: 20px auto;
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-container h2 {
        margin-bottom: 25px;
        color: #2c3e50;
        border-bottom: 2px solid #eee;
        padding-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .full-width {
        grid-column: span 2;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 15px;
    }

    .form-group label {
        font-weight: 600;
        margin-bottom: 8px;
        color: #555;
        font-size: 0.95rem;
    }

    .form-group input, 
    .form-group select, 
    .form-group textarea {
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background-color: #fdfdfd;
    }

    .form-group input:focus, 
    .form-group select:focus, 
    .form-group textarea:focus {
        border-color: #3498db;
        outline: none;
        box-shadow: 0 0 0 3px rgba(52,152,219,0.1);
        background-color: #fff;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    /* Upload ảnh */
    .file-input-wrapper {
        border: 2px dashed #ddd;
        padding: 20px;
        text-align: center;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
    }

    .file-input-wrapper:hover {
        border-color: #3498db;
        background: #f7fbff;
    }

    .preview {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 15px;
    }

    .preview img {
        width: 120px;
        height: 90px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }

    .btn-submit {
        background: #3498db;
        color: white;
        padding: 14px 28px;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: 10px;
    }

    .btn-submit:hover {
        background: #2980b9;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(52,152,219,0.3);
    }

    @media (max-width: 600px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
        .full-width {
            grid-column: span 1;
        }
    }
<?php
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../layout/sidebar.php';
?>

<div class="main-content">
    <div class="edit-container">
        <a href="index.php?action=baidang" class="btn-back">⬅ Quay lại danh sách</a>
        <h2>➕ Thêm bài đăng mới</h2>

        <form action="index.php?action=baidang_add" method="post" enctype="multipart/form-data">
            <div class="form-grid">
                
                <div class="form-group">
                    <label>Loại bất động sản</label>
                    <select name="id_loai" id="loai_bds" onchange="toggleFields()">
                        <option value="1">🏠 Nhà ở / Chung cư</option>
                        <option value="2">🌱 Đất nền</option>
                    </select>
                </div>

                <div class="form-group full-width">
                    <label>Tiêu đề bài đăng <span style="color:red">*</span></label>
                    <input type="text" name="tieude" required placeholder="Ví dụ: Bán nhà 3 tầng mặt phố...">
                </div>

                <div class="form-group full-width">
                    <label>Địa chỉ chi tiết <span style="color:red">*</span></label>
                    <input type="text" name="diachi" required placeholder="Số nhà, đường, phường, quận...">
                </div>

                <div class="form-group">
                    <label>Giá bán (VNĐ) <span style="color:red">*</span></label>
                    <input type="number" name="gia" required min="0" placeholder="Nhập số tiền...">
                </div>

                <div class="form-group">
                    <label>Diện tích (m²) <span style="color:red">*</span></label>
                    <input type="number" name="dientich" required min="0" step="0.1" placeholder="Nhập diện tích...">
                </div>

                <div class="form-group" id="field-phong">
                    <label>Số phòng ngủ</label>
                    <input type="number" name="phong_ngu" min="0" value="0" placeholder="Số phòng...">
                </div>

                <div class="form-group" id="field-tang">
                    <label>Số tầng / Tầng số</label>
                    <input type="number" name="so_tang" min="0" value="0" placeholder="Số tầng...">
                </div>

                <div class="form-group">
                    <label>Hướng nhà/đất</label>
                    <select name="huong">
                        <option value="">-- Chọn hướng --</option>
                        <option value="Đông">Đông</option>
                        <option value="Tây">Tây</option>
                        <option value="Nam">Nam</option>
                        <option value="Bắc">Bắc</option>
                        <option value="Đông Nam">Đông Nam</option>
                        <option value="Đông Bắc">Đông Bắc</option>
                        <option value="Tây Nam">Tây Nam</option>
                        <option value="Tây Bắc">Tây Bắc</option>
                    </select>
                </div>
                <div class="form-group full-width">
                    <label>Mô tả chi tiết</label>
                    <textarea name="mota" rows="5" placeholder="Mô tả thêm về tiện ích, pháp lý..."></textarea>
                </div>

                <div class="form-group full-width">
                    <label>Hình ảnh (Ảnh đại diện)</label>
                    <div style="border: 2px dashed #ccc; padding: 20px; text-align: center; border-radius: 8px;">
                        <input type="file" name="img_1" required>
                    </div>
                </div>

            </div>
            <button type="submit" class="btn-update">🚀 ĐĂNG BÀI NGAY</button>
        </form>
    </div>
</div>

<script>
function toggleFields() {
    var loai = document.getElementById("loai_bds").value;
    var fieldPhong = document.getElementById("field-phong");
    var fieldTang = document.getElementById("field-tang");

    if (loai == "2") { // Nếu là Đất
        fieldPhong.style.display = "none";
        fieldTang.style.display = "none";
    } else { // Nếu là Nhà
        fieldPhong.style.display = "flex";
        fieldTang.style.display = "flex";
    }
}
</script>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>