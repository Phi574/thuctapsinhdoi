<?php
require_once __DIR__ . '/../core/Auth.php';
checkLogin();

require_once __DIR__ . '/../models/TuVanModel.php';

$user = $_SESSION['user'];

if ($user['role'] == 'admin') {
    // Admin: xem tất
    $ds_tuvan = get_all_tuvan();
} else {
    // User: chỉ xem tư vấn của mình
    $ds_tuvan = get_tuvan_by_user($user['id']);
}

require_once __DIR__ . '/../views/tuvan/list.php';
