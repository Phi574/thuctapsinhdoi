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
</style>

<div class="form-container">
    <h2>➕ Thêm bài đăng mới</h2>

    <form method="post" enctype="multipart/form-data">
        <div class="form-grid">

            <div class="form-group">
                <label>Loại bất động sản</label>
                <select name="id_loai" required>
                    <option value="">-- Chọn loại --</option>
                    <option value="1">🏡 Nhà ở</option>
                    <option value="2">🌱 Đất nền</option>
                    <option value="3">🏢 Chung cư</option>
                </select>
            </div>

            <div class="form-group full-width">
                <label>Tiêu đề bài đăng</label>
                <input type="text" name="tieude" required>
            </div>

            <div class="form-group full-width">
                <label>Địa chỉ chính xác</label>
                <input type="text" name="diachi" required>
            </div>

            <div class="form-group">
                <label>Giá bán (VNĐ)</label>
                <input type="number" name="gia" required>
            </div>

            <div class="form-group">
                <label>Diện tích (m²)</label>
                <input type="number" name="dientich" required>
            </div>

            <div class="form-group full-width">
                <label>Mô tả chi tiết</label>
                <textarea name="mota"></textarea>
            </div>

            <!-- MULTI IMAGE UPLOAD -->
            <div class="form-group full-width">
                <label>Hình ảnh bất động sản</label>
                <div class="file-input-wrapper">
                    <input 
                        type="file" 
                        name="images[]" 
                        accept="image/*" 
                        multiple 
                        id="images"
                    >
                    <p style="font-size: 0.8rem; color: #888; margin-top: 5px;">
                        Chọn nhiều ảnh (JPG, PNG) – mỗi ảnh tối đa 2MB
                    </p>
                </div>

                <div class="preview" id="preview"></div>
            </div>

        </div>

        <div style="text-align: right;">
            <button type="submit" class="btn-submit">💾 Lưu bài đăng</button>
        </div>
    </form>
</div>

<script>
document.getElementById('images').addEventListener('change', function () {
    const preview = document.getElementById('preview');
    preview.innerHTML = '';

    Array.from(this.files).forEach(file => {
        if (!file.type.startsWith('image/')) return;

        const reader = new FileReader();
        reader.onload = e => {
            const img = document.createElement('img');
            img.src = e.target.result;
            preview.appendChild(img);
        };
        reader.readAsDataURL(file);
    });
});
</script>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
