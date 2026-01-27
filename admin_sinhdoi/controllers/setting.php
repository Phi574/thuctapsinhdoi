<?php
require_once __DIR__ . '/../core/Auth.php';
require_once __DIR__ . '/../models/SettingModel.php';

checkAdmin();

$setting = get_setting();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $logo = $setting['logo'];

    if (!empty($_FILES['logo']['name'])) {
        $logo = time().'_'.$_FILES['logo']['name'];
        move_uploaded_file(
            $_FILES['logo']['tmp_name'],
            '../public/uploads/'.$logo
        );
    }

    $data = [
        'logo' => $logo,
        'site_name' => $_POST['site_name'],
        'site_color' => $_POST['site_color'],
        'hotline' => $_POST['hotline'],
        'email' => $_POST['email'],
        'address' => $_POST['address'],
        'seo_title' => $_POST['seo_title'],
        'seo_description' => $_POST['seo_description'],
        'enable_tuvan' => isset($_POST['enable_tuvan']) ? 1 : 0
    ];

    update_setting($data);

    header("Location: index.php?action=setting");
    exit;
}

require_once __DIR__ . '/../views/setting/form.php';
