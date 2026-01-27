<?php
require_once __DIR__ . '/../core/Auth.php';
require_once __DIR__ . '/../core/Flash.php';
require_once __DIR__ . '/../models/TuvanModel.php';

checkLogin();
check_Admin();

// LẤY ID
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$type = $_GET['type'] ?? '';

if ($id <= 0 || !in_array($type, ['done', 'pending'], true)) {
    set_flash('error', 'Dữ liệu không hợp lệ');
    header("Location: index.php?action=tuvan_list");
    exit;
}

// UPDATE
if ($type === 'done') {
    update_trang_thai_tuvan($id, 1);
    set_flash('success', 'Đã duyệt tư vấn');
}

if ($type === 'pending') {
    update_trang_thai_tuvan($id, 0);
    set_flash('success', 'Đã chuyển về chờ xử lý');
}

header("Location: index.php?action=tuvan_list");
exit;
