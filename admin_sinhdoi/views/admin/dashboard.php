<?php
require_once __DIR__ . '/../../core/Auth.php';
check_admin();
?>

<h2>ADMIN DASHBOARD</h2>
<p>Xin chào Admin: <b><?= $_SESSION['user']['name'] ?></b></p>

<ul>
    <li>Quản lý user</li>
    <a href="index.php?action=baidang">Quản lý bài đăng</a>
    <li><a href="index.php?action=tuvan&$id=<?=  $_SESSION['user']['id']?>">Danh sách tư vấn</a>
</li>
</ul>

<a href="index.php?action=logout">Đăng xuất</a>
