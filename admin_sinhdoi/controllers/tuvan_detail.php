<?php
require_once __DIR__ . '/../core/Auth.php';
checkLogin();

require_once __DIR__ . '/../models/TuVanModel.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    die('ID không hợp lệ');
}

$tuvan = get_tuvan_by_id($id);
if (!$tuvan) {
    die('Tư vấn không tồn tại');
}

// phân quyền xem
$user = $_SESSION['user'];
if ($user['role'] !== 'admin' && $tuvan['user_nhan_id'] != $user['id']) {
    die('Bạn không có quyền xem tư vấn này');
}

require_once __DIR__ . '/../views/tuvan/detail.php';
