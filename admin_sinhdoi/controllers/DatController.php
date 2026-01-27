<?php
require_once __DIR__ . '/../models/BaiDangModel.php';
require_once __DIR__ . '/../core/Auth.php';

class DatController
{
    // ===============================
    // CHI TIẾT BÀI ĐẤT
    // ===============================
    public function detail()
    {
        checkLogin();

        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id <= 0) die('ID không hợp lệ');

        // Lấy dữ liệu (Dùng chung hàm get_baidang_by_id)
        $nha = get_baidang_by_id($id); // <--- Đặt tên biến là $nha

        // Kiểm tra đúng loại Đất
        if (!$nha || $nha['loai'] !== 'dat') {
            die('Bài đăng không tồn tại hoặc không phải đất nền');
        }

        // Gọi View chung (View này dùng biến $nha nên giờ sẽ hoạt động)
        require_once __DIR__ . '/../views/baidang/detail.php';
    }

    // ===============================
    // SỬA BÀI ĐẤT
    // ===============================
    public function edit()
    {
        checkLogin();

        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id <= 0) die('ID không hợp lệ');

        $nha = get_baidang_by_id($id); // <--- Đặt tên biến là $nha
        
        if (!$nha || $nha['loai'] !== 'dat') {
            die('Bài đăng không tồn tại');
        }

        // Kiểm tra quyền sở hữu
        checkOwner($nha['user_id']);

        require_once __DIR__ . '/../views/baidang/edit.php';
    }
}