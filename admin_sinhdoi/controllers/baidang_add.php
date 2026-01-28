<?php
// FILE: admin_sinhdoi/controllers/baidang_add.php

require_once __DIR__ . '/../core/Auth.php';
// require_once __DIR__ . '/../core/Flash.php'; // Bỏ comment nếu bạn dùng Flash message
require_once __DIR__ . '/../models/BaiDangModel.php';

// Lấy danh sách loại BĐS để hiển thị ra View (Select option)
$phanloai = get_all_phanloai();

/* ===============================
   XỬ LÝ KHI NGƯỜI DÙNG BẤM LƯU (POST)
   =============================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1. Lấy dữ liệu cơ bản từ form
    $id_loai   = (int)($_POST['id_loai'] ?? 0);
    $tieude    = trim($_POST['tieude'] ?? '');
    $diachi    = trim($_POST['diachi'] ?? '');
    $gia       = (float)($_POST['gia'] ?? 0);
    $dientich  = (float)($_POST['dientich'] ?? 0);
    $mota      = trim($_POST['mota'] ?? '');
    
    // 2. Lấy dữ liệu các trường mới (Tầng, Phòng, Hướng)
    // Lưu ý: View gửi lên 'phong_ngu' nhưng Model cần 'so_phong'
    $so_phong  = (int)($_POST['phong_ngu'] ?? 0);
    $so_tang   = (int)($_POST['so_tang'] ?? 0);
    $huong     = trim($_POST['huong'] ?? '');

    /* ===== VALIDATE CƠ BẢN ===== */
    if ($tieude === '' || $gia <= 0) {
        echo "<script>alert('Vui lòng nhập tiêu đề và giá hợp lệ!'); window.history.back();</script>";
        exit;
    }

    /* ===== UPLOAD ẢNH ĐẠI DIỆN ===== */
    $upload_dir = __DIR__ . '/../public/uploads/';
    $img_daidien = ''; // Mặc định rỗng nếu không up ảnh

    if (isset($_FILES['img_1']) && $_FILES['img_1']['error'] === 0) {
        $ext = strtolower(pathinfo($_FILES['img_1']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        
        if (in_array($ext, $allowed)) {
            // Tạo tên file ngẫu nhiên để tránh trùng
            $new_name = time() . '_' . uniqid() . '.' . $ext;
            
            if (move_uploaded_file($_FILES['img_1']['tmp_name'], $upload_dir . $new_name)) {
                $img_daidien = $new_name;
            }
        }
    }

    /* ===== GÓI DỮ LIỆU ĐỂ GỬI SANG MODEL ===== */
    $data = [
        'user_id'   => $_SESSION['user']['id'],
        'id_loai'   => $id_loai,
        'tieude'    => $tieude,
        'diachi'    => $diachi,
        'gia'       => $gia,
        'dientich'  => $dientich,
        'mota'      => $mota,
        'img'       => $img_daidien,
        
        'so_phong'  => $so_phong, 
        'so_tang'   => $so_tang,
        'huong'     => $huong
    ];
    if (function_exists('insert_nha')) {
        $new_id = insert_nha($data);

        if ($new_id) {
            echo "<script>alert('Đăng bài thành công!'); window.location.href='index.php?action=baidang';</script>";
            exit;
        } else {
            echo "<script>alert('Lỗi: Không thể lưu vào CSDL. Vui lòng kiểm tra lại Model!'); window.history.back();</script>";
            exit;
        }
    } else {
        die("Lỗi: Không tìm thấy hàm insert_nha trong Model. Hãy kiểm tra file BaiDangModel.php");
    }
}

// Nếu không phải POST (mới vào trang) thì hiển thị Form
require_once __DIR__ . '/../views/baidang/add.php';
?>