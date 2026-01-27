<?php
require_once __DIR__ . '/../models/user_model.php';
require_once __DIR__ . '/../core/Flash.php'; // nếu bạn có set_flash

$action = $_GET['action'] ?? 'login';

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/
if ($action === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $email    = trim($_POST['email'] ?? '');
    $password = md5($_POST['password'] ?? '');

    $user = user_login($email);

    if ($user && $user['password'] === $password) {

        $_SESSION['user'] = $user;

        // Điều hướng theo role
        if ($user['role'] === 'admin') {
            header("Location: index.php?action=dashboard");
        } else {
            header("Location: index.php?action=dashboard");
        }
        exit;

    } else {
        set_flash('error', 'Sai tài khoản hoặc mật khẩu');
        header("Location: index.php?action=login");
        exit;
    }
}

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/
if ($action === 'logout') {
    session_destroy();
    header("Location: index.php?action=login");
    exit;
}
