<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* ===============================
   BẮT BUỘC ĐĂNG NHẬP
================================ */
function checkLogin() {
    if (!isset($_SESSION['user'])) {
        header("Location: index.php?action=login");
        exit;
    }
}


/* ===============================
   CHỈ ADMIN
================================ */
function check_admin()
{
    checkLogin();

    if ($_SESSION['user']['role'] !== 'admin') {
        die('❌ Bạn không có quyền truy cập');
    }
}

/* ===============================
   KIỂM TRA CHỦ SỞ HỮU
================================ */
function checkOwner($owner_id)
{
    checkLogin();

    // admin luôn có quyền
    if ($_SESSION['user']['role'] === 'admin') {
        return true;
    }

    // không phải chủ bài
    if ((int)$_SESSION['user']['id'] !== (int)$owner_id) {
        die('❌ Bạn không có quyền thao tác');
    }

    return true;
}
