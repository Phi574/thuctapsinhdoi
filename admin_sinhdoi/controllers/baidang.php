<?php
require_once __DIR__ . '/../models/BaiDangModel.php';

if (isset($_GET['action'])) {
    switch ($_GET['action']) {

        case 'baidang':
            if ($_SESSION['user']['role'] == 'admin') {
                $list = get_all_baidang();
            } else {
                $list = get_baidang_by_user($_SESSION['user']['id']);
            }
            require_once '../views/baidang/list.php';
            break;

        case 'delete_baidang':
            $id = $_GET['id'];
            delete_baidang($id);
            header("Location: index.php?action=baidang");
            break;
    }
}
