<?php
session_start();

require_once __DIR__ . '/../core/Auth.php';
require_once __DIR__ . '/../models/BaiDangModel.php';

checkLogin(); // bắt buộc đăng nhập
update_trang_thai($id, $status);
// CHỈ ADMIN MỚI ĐƯỢC DUYỆT
if ($_SESSION['user']['role'] !== 'admin') {
    die('Bạn không có quyền duyệt bài');
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$status = isset($_GET['status']) ? (int)$_GET['status'] : -1;

// STATUS HỢP LỆ: 0 = chờ duyệt, 1 = đã duyệt, 2 = từ chối (tuỳ bạn)
if ($id <= 0 || !in_array($status, [0, 1, 2])) {
    die('Dữ liệu không hợp lệ');
}

// KIỂM TRA BÀI ĐĂNG CÓ TỒN TẠI KHÔNG
$nha = get_nha_by_id($id);
if (!$nha) {
    die('Bài đăng không tồn tại');
}

// CẬP NHẬT TRẠNG THÁI
update_trang_thai($id, $status);

// QUAY LẠI DANH SÁCH
header("Location: index.php?action=baidang");
exit;
