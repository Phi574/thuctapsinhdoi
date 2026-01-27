<?php
require_once __DIR__ . '/../models/BaiDangModel.php';

$id = $_GET['id'] ?? 0;
$baidang = get_baidang_by_id($id);

if (!$baidang) {
    die('Bài đăng không tồn tại');
}

require_once __DIR__ . '/../views/baidang/detail.php';
