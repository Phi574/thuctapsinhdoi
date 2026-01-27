<?php
require_once __DIR__ . '/../core/Auth.php';
checkLogin();

if ($_SESSION['user']['role'] != 'admin') {
    echo "Bạn không có quyền truy cập";
    exit;
}

require_once __DIR__ . '/../models/user_model.php';

$ds_user = get_all_user();

require_once __DIR__ . '/../views/user/user_list.php';
