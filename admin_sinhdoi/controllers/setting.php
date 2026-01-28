<?php
// FILE: admin_sinhdoi/controllers/setting.php
require_once __DIR__ . '/../core/Auth.php';
require_once __DIR__ . '/../models/SettingModel.php';

checkLogin(); // Chỉ Admin mới được vào

// Lấy thông tin hiện tại
$setting = get_setting();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 1. Xử lý Logo (Giữ logo cũ nếu không up mới)
    $logo_name = $setting['logo'] ?? ''; 
    
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {
        $ext = strtolower(pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'webp', 'svg'];
        
        if (in_array($ext, $allowed)) {
            $new_name = 'logo_' . time() . '.' . $ext;
            $path = __DIR__ . '/../public/uploads/' . $new_name;
            
            if (move_uploaded_file($_FILES['logo']['tmp_name'], $path)) {
                $logo_name = $new_name;
            }
        }
    }

    // 2. Gom dữ liệu
    $data = [
        'site_title'  => $_POST['site_title'] ?? '',
        'hotline'     => $_POST['hotline'] ?? '',
        'email'       => $_POST['email'] ?? '',
        'address'     => $_POST['address'] ?? '',
        'facebook'    => $_POST['facebook'] ?? '',
        'zalo'        => $_POST['zalo'] ?? '',
        'mota_footer' => $_POST['mota_footer'] ?? '',
        'logo'        => $logo_name
    ];

    // 3. Update
    if (update_setting($data)) {
        echo "<script>alert('Cập nhật cấu hình thành công!'); window.location.href='index.php?action=setting';</script>";
    } else {
        echo "<script>alert('Lỗi cập nhật!');</script>";
    }
}

// Load View
require_once __DIR__ . '/../views/setting/form.php';
?>