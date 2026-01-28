<?php
// FILE: admin_sinhdoi/controllers/tuvan_list.php
require_once __DIR__ . '/../core/Auth.php';
checkLogin();
require_once __DIR__ . '/../models/TuVanModel.php';

$user = $_SESSION['user'];

// 1. Nhận tham số tìm kiếm
$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
$status_filter = isset($_GET['status']) ? (int)$_GET['status'] : -1; // -1 là tất cả

// 2. Xác định quyền xem (Admin xem hết, User xem của mình)
$user_id_filter = ($user['role'] == 'admin') ? 0 : $user['id'];

// 3. Lấy dữ liệu từ Model
$all_tuvan = get_tuvan_advanced($keyword, $status_filter, $user_id_filter);

// 4. Phân loại dữ liệu để hiển thị (Active vs Done)
$list_active = []; // Mới (0), Đã liên hệ (1)
$list_done   = []; // Đã chốt/Cọc (2), Hủy (3)

foreach ($all_tuvan as $item) {
    if ($item['trang_thai'] == 2 || $item['trang_thai'] == 3) {
        $list_done[] = $item;
    } else {
        $list_active[] = $item;
    }
}

// Load View
require_once __DIR__ . '/../views/tuvan/list.php';
?>