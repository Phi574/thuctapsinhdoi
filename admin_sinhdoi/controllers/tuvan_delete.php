<?php
// FILE: admin_sinhdoi/controllers/tuvan_delete.php
require_once __DIR__ . '/../core/Auth.php';
require_once __DIR__ . '/../models/TuVanModel.php';

checkLogin();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    if (delete_tuvan($id)) {
        echo "<script>alert('Đã xóa yêu cầu tư vấn!'); window.location.href='index.php?action=tuvan';</script>";
    } else {
        echo "<script>alert('Lỗi: Không thể xóa!'); window.history.back();</script>";
    }
} else {
    header("Location: index.php?action=tuvan");
}
?>