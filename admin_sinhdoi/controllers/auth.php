<?php

require_once __DIR__ . '/../models/user_model.php';

$action = $_GET['action'] ?? 'login';

/* ================= ĐĂNG NHẬP ================= */
if ($action === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username'] ?? ''); 
    $password = $_POST['password'] ?? '';


    $user = user_login($username);


    $login_success = false;

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $login_success = true;
        } 
        elseif ($user['password'] === md5($password)) {
            $login_success = true;
        }
        elseif ($user['password'] === $password) {
            $login_success = true;
        }
    }

    if ($login_success) {
        $_SESSION['user'] = $user;
        header("Location: index.php?action=dashboard");
        exit;
    } else {
        header("Location: index.php?action=login&error=1");
        exit;
    }
}

/* ================= ĐĂNG XUẤT ================= */
if ($action === 'logout') {
    session_destroy();
    header("Location: index.php?action=login");
    exit;
}
?>sss