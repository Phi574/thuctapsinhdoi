<?php
require_once __DIR__ . '/../models/BaiDangModel.php';
require_once __DIR__ . '/../core/Auth.php';


checkLogin();


$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {

    $baidang = get_baidang_by_id($id);

    if ($baidang) {

        if ($_SESSION['user']['role'] !== 'admin' && $_SESSION['user']['id'] != $baidang['user_id']) {
            echo "<script>alert('Bạn không có quyền xóa bài này!'); window.location.href='index.php?action=baidang';</script>";
            exit;
        }


        $img_name = $baidang['img_1'] ?? $baidang['img'] ?? '';
        
        if (!empty($img_name)) {

            $file_path = __DIR__ . '/../public/uploads/' . $img_name;
            

            if (file_exists($file_path)) {
                unlink($file_path); 
            }
        }

        $result = delete_baidang($id);

        if ($result) {
            echo "<script>alert('Xóa bài đăng và ảnh thành công!'); window.location.href='index.php?action=baidang';</script>";
        } else {
            echo "<script>alert('Lỗi: Không thể xóa bài đăng trong CSDL.'); window.location.href='index.php?action=baidang';</script>";
        }
    } else {
        echo "<script>alert('Bài đăng không tồn tại!'); window.location.href='index.php?action=baidang';</script>";
    }
} else {
    header('Location: index.php?action=baidang');
}
?>