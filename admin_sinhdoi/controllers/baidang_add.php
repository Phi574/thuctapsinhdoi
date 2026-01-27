<?php

require_once __DIR__ . '/../core/Auth.php';
require_once __DIR__ . '/../core/Flash.php';
require_once __DIR__ . '/../models/BaiDangModel.php';

checkLogin();

/* ===============================
   HIỂN THỊ FORM
   =============================== */
$phanloai = get_all_phanloai();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_loai   = (int)($_POST['id_loai'] ?? 0);
    $tieude    = trim($_POST['tieude'] ?? '');
    $diachi    = trim($_POST['diachi'] ?? '');
    $gia       = (float)($_POST['gia'] ?? 0);
    $dientich  = (float)($_POST['dientich'] ?? 0);
    $mota      = trim($_POST['mota'] ?? '');

    /* ===== VALIDATE ===== */
    if ($tieude === '' || $gia <= 0 || !phanloai_exists($id_loai)) {
        set_flash('error', 'Dữ liệu không hợp lệ hoặc loại BĐS không tồn tại');
        header("Location: index.php?action=baidang_add");
        exit;
    }

    /* ===== UPLOAD NHIỀU ẢNH ===== */
    $upload_dir = __DIR__ . '/../public/uploads/';
    $allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];
    $images = $_FILES['images'] ?? null;

    $img_daidien = null;
    $gallery = [];

    if ($images && !empty($images['name'][0])) {
        foreach ($images['name'] as $i => $name) {
            if ($images['error'][$i] !== 0) continue;

            $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            if (!in_array($ext, $allowed_ext)) continue;

            $new_name = time() . '_' . uniqid() . '.' . $ext;
            move_uploaded_file(
                $images['tmp_name'][$i],
                $upload_dir . $new_name
            );

            if ($img_daidien === null) {
                $img_daidien = $new_name;
            }

            $gallery[] = $new_name;
        }
    }

    /* ===== INSERT ===== */
    $data = [
        'user_id'  => $_SESSION['user']['id'],
        'id_loai'  => $id_loai,
        'tieude'   => $tieude,
        'diachi'   => $diachi,
        'gia'      => $gia,
        'dientich' => $dientich,
        'mota'     => $mota,
        'img'      => $img_daidien,
        'phong_ngu' => $_POST['phong_ngu'] ?? 0,
        'so_tang'   => $_POST['so_tang'] ?? 0,
        'huong'     => $_POST['huong'] ?? ''
    ];

    $baidang_id = insert_nha($data);

    foreach ($gallery as $img) {
        insert_baidang_image($baidang_id, $img);
    }

    set_flash('success', 'Đăng bài thành công');
    header("Location: index.php?action=baidang");
    exit;
    
    if (insert_baidang($data)) {
        echo "<script>alert('Thêm bài đăng thành công!'); window.location.href='index.php?action=baidang';</script>";
    } else {
        echo "<script>alert('Lỗi khi thêm bài đăng!');</script>";
    }

} else {
    require_once __DIR__ . '/../views/baidang/add.php';
}
?>