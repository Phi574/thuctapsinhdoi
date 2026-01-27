<?php
require_once __DIR__ . '/../core/Auth.php';
require_once __DIR__ . '/../models/DashboardModel.php';

checkLogin(); // đảm bảo đã đăng nhập

$user = $_SESSION['user'];

// phân quyền dashboard
if ($user['role'] === 'admin') {
    $thongke = admin_dashboard();
} else {
    $thongke = user_dashboard($user['id']);
}

// load view
require_once __DIR__ . '/../views/dashboard.php';
