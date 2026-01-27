<?php
require_once __DIR__ . '/../core/Auth.php';
require_once __DIR__ . '/../core/Flash.php';
require_once __DIR__ . '/../models/TuVanModel.php';

checkLogin(); // ❗ KHÔNG check_Admin nữa

// LẤY TỪ POST
$id         = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$trang_thai = isset($_POST['trang_thai']) ? (int)$_POST['trang_thai'] : -1;

// VALIDATE
if ($id <= 0 || !in_array($trang_thai, [0, 1, 2])) {
    set_flash('error', 'Dữ liệu không hợp lệ');
    header("Location: index.php?action=tuvan_list");
    exit;
}

// LẤY TƯ VẤN
$tuvan = get_tuvan_by_id($id);
if (!$tuvan) {
    die('Tư vấn không tồn tại');
}

// CHECK QUYỀN
if (
    $_SESSION['user']['role'] != 'admin' &&
    $_SESSION['user']['id'] != $tuvan['user_nhan_id']
) {
    die('Bạn không có quyền cập nhật tư vấn này');
}

// UPDATE
update_trang_thai_tuvan($id, $trang_thai);

set_flash('success', 'Cập nhật trạng thái thành công');
header("Location: index.php?action=tuvan_list");
exit;
