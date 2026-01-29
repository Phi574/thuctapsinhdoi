<?php
require_once __DIR__ . '/../core/Auth.php';
require_once __DIR__ . '/../models/BaiDangModel.php';
checkLogin();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$action = $_GET['action'] ?? '';

$baidang = null;

// Phân biệt rõ đang xem Nhà hay Đất
if ($action == 'nha_detail') {
    $baidang = get_nha_by_id($id);
} elseif ($action == 'dat_detail') {
    $baidang = get_dat_by_id($id);
} else {
    // Trường hợp chung chung (ít dùng)
    $baidang = get_baidang_by_id($id);
}

if (!$baidang) {
    echo "<script>alert('Bài đăng không tồn tại!'); window.history.back();</script>";
    exit;
}

require_once __DIR__ . '/../views/baidang/detail.php';
?>