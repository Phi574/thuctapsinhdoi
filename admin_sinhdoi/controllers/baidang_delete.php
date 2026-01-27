<?php

require_once __DIR__ . '/../core/Auth.php';
require_once __DIR__ . '/../models/BaiDangModel.php';

checkLogin();

// ===== LẤY ID =====
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    die('ID bài đăng không hợp lệ');
}

// ===== USER =====
$user = $_SESSION['user'];

// ===== LẤY BÀI ĐĂNG =====
$baidang = get_baidang_by_id($id);
if (!$baidang) {
    die('Bài đăng không tồn tại');
}

// ===== PHÂN QUYỀN =====
if ($user['role'] !== 'admin' && $user['id'] != $baidang['user_id']) {
    die('Bạn không có quyền xoá bài này');
}

// ===== XOÁ ẢNH ĐẠI DIỆN =====
if (!empty($baidang['img'])) {
    $imgPath = __DIR__ . '/../public/uploads/' . $baidang['img'];
    if (file_exists($imgPath)) {
        unlink($imgPath);
    }
}

// ===== XOÁ GALLERY =====
delete_baidang_images($id);

// ===== XOÁ BÀI ĐĂNG =====
delete_baidang($id, $baidang['loai']);

// ===== QUAY LẠI DANH SÁCH =====
header("Location: index.php?action=baidang");
exit;
