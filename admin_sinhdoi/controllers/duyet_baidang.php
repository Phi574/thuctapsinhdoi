<?php
require_once __DIR__ . '/../core/Auth.php';
require_once __DIR__ . '/../models/BaiDangModel.php';

checkLogin();

if ($_SESSION['user']['role'] !== 'admin') {
    die('Không có quyền');
}

$id = (int)$_GET['id'];
$status = (int)$_GET['status'];

update_trang_thai($id, $status);

header("Location: index.php?action=baidang");
exit;
