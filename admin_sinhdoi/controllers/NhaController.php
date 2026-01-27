<?php
require_once __DIR__ . '/../models/BaiDangModel.php';
require_once __DIR__ . '/../core/Auth.php';

class NhaController
{
    public function detail()
    {
        checkLogin();

        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id <= 0) {
            die('ID không hợp lệ');
        }

        $nha = get_baidang_by_id($id);
        if (!$nha) {
            die('Bài đăng không tồn tại');
        }

        require_once __DIR__ . '/../views/baidang/detail.php';
    }

    public function edit()
    {
        checkLogin();

        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id <= 0) {
            die('ID không hợp lệ');
        }

        $nha = get_baidang_by_id($id);
        if (!$nha) {
            die('Bài đăng không tồn tại');
        }

        checkOwner($nha['user_id']);

        require_once __DIR__ . '/../views/baidang/edit.php';
    }
}
