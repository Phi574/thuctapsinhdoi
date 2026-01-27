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
        if ($id <= 0) {
            die('ID không hợp lệ');
        }

        // LẤY ĐÚNG 1 BÀI
        $dat = get_baidang_by_id($id);
        if (!$dat || $dat['loai'] !== 'dat') {
            die('Bài đăng không tồn tại');
        }

        require_once __DIR__ . '/../views/baidang/detail.php';
    }

    // ===============================
    // SỬA BÀI ĐẤT
    // ===============================
    public function edit()
    {
        checkLogin();

        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id <= 0) {
            die('ID không hợp lệ');
        }

        // LẤY ĐÚNG 1 BÀI
        $dat = get_baidang_by_id($id);
        if (!$dat || $dat['loai'] !== 'dat') {
            die('Bài đăng không tồn tại');
        }

        // KIỂM TRA QUYỀN
        checkOwner($dat['user_id']);

        require_once __DIR__ . '/../views/baidang/edit.php';
    }
}
