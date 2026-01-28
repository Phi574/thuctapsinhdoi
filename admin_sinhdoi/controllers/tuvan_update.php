<?php
// FILE: admin_sinhdoi/controllers/tuvan_update.php
require_once __DIR__ . '/../core/Auth.php';
require_once __DIR__ . '/../models/TuVanModel.php';

checkLogin();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$status = isset($_GET['status']) ? (int)$_GET['status'] : 0;

if ($id > 0) {
    update_trang_thai_tuvan($id, $status);
    
    $msg = ($status == 2) ? "Đã chốt khách hàng thành công!" : "Cập nhật trạng thái thành công!";
    echo "<script>alert('$msg'); window.location.href='index.php?action=tuvan';</script>";
} else {
    header("Location: index.php?action=tuvan");
}
?>