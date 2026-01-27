<?php
require_once __DIR__ . '/../models/BaiDangModel.php';
require_once __DIR__ . '/../core/Auth.php';

class NhaController
{
    public function detail()
    {
        checkLogin();

        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id <= 0) {
            die('ID không hợp lệ');
        }

        $nha = get_baidang_by_id($id);
        if (!$nha) {
            die('Bài đăng không tồn tại');
        }

        require_once __DIR__ . '/../views/baidang/detail.php';
    }

    public function edit()
    {
        checkLogin();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            

            $img_name = $_POST['old_img']; 
            
            if (isset($_FILES['img_1']) && $_FILES['img_1']['error'] == 0) {

                $target_dir = __DIR__ . '/../public/uploads/';
                $new_name = time() . '_' . basename($_FILES["img_1"]["name"]);
                $target_file = $target_dir . $new_name;
                
                if (move_uploaded_file($_FILES["img_1"]["tmp_name"], $target_file)) {
                    $img_name = $new_name;
                    
                    if (!empty($_POST['old_img']) && file_exists($target_dir . $_POST['old_img'])) {
                        unlink($target_dir . $_POST['old_img']);
                    }
                }
            }

            $data = [
                'tieude'   => $_POST['tieude'],
                'diachi'   => $_POST['diachi'],
                'gia'      => $_POST['gia'],
                'dientich' => $_POST['dientich'],
                'mota'     => $_POST['mota'],
                'img'      => $img_name
            ];

            if (update_baidang($id, $data)) {
                echo "<script>
                        alert('Cập nhật thành công!');
                        window.location.href = 'index.php?action=nha_edit&id=$id';
                      </script>";
            } else {
                echo "<script>alert('Lỗi cập nhật!');</script>";
            }
        }

        $nha = get_baidang_by_id($id);
        require_once __DIR__ . '/../views/baidang/edit.php';
    }
}
