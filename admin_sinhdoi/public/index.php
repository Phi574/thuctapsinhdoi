<?php
session_start();
$action = $_GET['action'] ?? 'login';

switch ($action) {

    // ===== ĐĂNG NHẬP / ĐĂNG XUẤT =====
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once '../controllers/auth.php';
        } else {
            require_once '../views/auth/login.php';
        }
        break;

    case 'logout':
        require_once '../controllers/auth.php';
        break;

    // ===== DASHBOARD =====
    case 'dashboard':
    case 'admin_dashboard':
    case 'home': // Gộp chung về dashboard
        require_once '../controllers/dashboard.php';
        break;

    // ===== QUẢN LÝ BÀI ĐĂNG (CHUNG) =====
    case 'baidang': // Danh sách
        require_once '../controllers/baidang.php';
        break;

    case 'baidang_add': // Thêm mới
        require_once '../controllers/baidang_add.php';
        break;

    case 'baidang_delete': // Xóa
    case 'delete_baidang':
        require_once '../controllers/baidang_delete.php';
        break;
    
    case 'baidang_duyet': // Duyệt (nếu có)
        require_once '../controllers/baidang_duyet.php';
        break;

    // ===== NHÀ PHỐ (Xử lý chi tiết/sửa) =====
    case 'nha_detail':
        require_once '../controllers/NhaController.php';
        $controller = new NhaController();
        $controller->detail();
        break;

    case 'nha_edit':
        require_once '../controllers/NhaController.php';
        $controller = new NhaController();
        $controller->edit();
        break;

    // ===== ĐẤT NỀN (Xử lý chi tiết/sửa) =====
    case 'dat_detail':
        require_once '../controllers/DatController.php';
        $controller = new DatController();
        $controller->detail();
        break;

    case 'dat_edit':
        require_once '../controllers/DatController.php';
        $controller = new DatController();
        $controller->edit();
        break;

    // ===== TƯ VẤN KHÁCH HÀNG =====
    case 'tuvan':
    case 'tuvan_list':
        require_once '../controllers/tuvan_list.php';
        break;

    case 'tuvan_detail':
        require_once __DIR__ . '/../controllers/tuvan_detail.php';
        break;

    case 'tuvan_update':
        require_once '../controllers/tuvan_update.php';
        break;
    
    case 'gui_tuvan':
        require_once '../controllers/gui_tuvan.php';
        break;

    // ===== QUẢN LÝ USER =====
    case 'user_list':
    case 'user_dashboard':
        require_once '../controllers/user_list.php';
        break;

    case 'user_trangthai':
        require_once '../controllers/user_trangthai.php';
        break;

    case 'user_role':
        require_once '../controllers/user_role.php';
        break;

    case 'user_update':
        require_once '../controllers/user_update.php';
        break;

    // ===== MẶC ĐỊNH =====
    default:
        echo "<h1>404 - Không tìm thấy chức năng '$action'</h1>";
        break;
}