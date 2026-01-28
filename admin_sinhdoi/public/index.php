<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$action = $_GET['action'] ?? 'login';

switch ($action) {

    case 'login':
        // NẾU submit form → xử lý login
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once '../controllers/auth.php';
        } else {
            require_once '../views/auth/login.php';
        }
        break;

    case 'admin_dashboard':
        require_once '../views/admin/dashboard.php';
        break;
    


    case 'user_dashboard':
        require_once __DIR__ . '/../controllers/user_list.php';
        break;
    case 'dashboard':
        require_once __DIR__ . '/../controllers/dashboard.php';
        break;

    case 'logout':
        require_once '../controllers/auth.php';
        break;


    case 'baidang_edit':
        require_once '../controllers/baidang_edit.php';
        break;

    case 'baidang_delete':
        require_once '../controllers/baidang_delete.php';
        break;


    case 'baidang':
    case 'delete_baidang':
        require_once '../controllers/baidang.php';
        break;

    case 'baidang_add':
        require_once '../controllers/baidang_add.php';
        break;
    
    case 'baidang_duyet':
        require_once '../controllers/baidang_duyet.php';
        break;

    
    case 'gui_tuvan':
        require_once '../controllers/gui_tuvan.php';
        break;

        /* ===== NHÀ ===== */
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

/* ===== ĐẤT ===== */
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


    case 'tuvan':
    require_once '../controllers/tuvan_list.php';
    break;

    case 'tuvan_detail':
        require_once __DIR__ . '/../controllers/tuvan_detail.php';
        break;

    case 'tuvan_update':
        require_once '../controllers/tuvan_update.php';
        break;

    case 'dashboard':
        require_once '../controllers/dashboard.php';
        break;

    // ===== USER =====
case 'user_list':
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
case 'detail':
    require_once '../controllers/baidang_detail.php';
    break;



case 'baidang':
    require_once '../controllers/baidang.php';
    break;

    

case 'dashboard':
    require_once '../controllers/dashboard.php';
    break;

        case 'home':
        require_once '../controllers/dashboard.php';
        break;

    case 'baidang':
        require_once '../controllers/baidang_list.php';
        break;

    case 'detail':
        require_once '../controllers/baidang_detail.php';
        break;

    case 'tuvan_list':
        require_once '../controllers/tuvan_list.php';
        break;

    default:
        echo '404';
        break;

}