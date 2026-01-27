<?php
session_start();

require_once __DIR__ . '/../core/Auth.php';
require_once __DIR__ . '/../models/BaiDangModel.php';

checkLogin(); 

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    die('ID không hợp lệ');
}

$nha = get_nha_by_id($id);
if (!$nha) {
    die('Bài đăng không tồn tại');
}

$user = $_SESSION['user'];
if ($user['role'] !== 'admin' && $user['id'] != $nha['user_id']) {
    die('Bạn không có quyền sửa bài này');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $img_name = $nha['img_1'] ?? '';

    if (!empty($_FILES['img_1']['name'])) {
        $img_name = time() . '_' . basename($_FILES['img_1']['name']);
        $upload_path = __DIR__ . '/../public/uploads/' . $img_name;
        move_uploaded_file($_FILES['img_1']['tmp_name'], $upload_path);
    }

    $data = [
        'id_loai'  => (int)($_POST['id_loai'] ?? 1),
        'tieude'   => trim($_POST['tieude'] ?? ''),
        'diachi'   => trim($_POST['diachi'] ?? ''),
        'gia'      => (float)($_POST['gia'] ?? 0),
        'dientich' => (float)($_POST['dientich'] ?? 0),
        'mota'     => trim($_POST['mota'] ?? ''),
        'img'      => $img_name
    ];

    update_nha($id, $data);

    header("Location: index.php?action=baidang");
    exit;
}

// VIEW
require_once __DIR__ . '/../views/baidang/edit.php';
