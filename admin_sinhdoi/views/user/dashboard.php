<?php
require_once __DIR__ . '/../../core/Auth.php';
check_user();
?>

<h2>USER DASHBOARD</h2>
<p>Xin chào: <b><?= $_SESSION['user']['name'] ?></b></p>

<ul>
    <a href="index.php?action=baidang">Bài đăng của tôi</a>

    <li><a href="index.php?action=tuvan&$id=<?=  $_SESSION['user']['id']?>">Danh sách tư vấn</a>
</ul>

<a href="index.php?action=logout">Đăng xuất</a>
