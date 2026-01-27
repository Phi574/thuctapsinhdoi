<?php
require_once __DIR__ . '/../core/Auth.php';
checkLogin();

if ($_SESSION['user']['role'] != 'admin') {
    exit('No permission');
}

require_once __DIR__ . '/../models/user_model.php';

$id   = (int)$_GET['id'];
$role = $_GET['role'];

update_role_user($id, $role);

header("Location: index.php?action=user_list");
exit;
