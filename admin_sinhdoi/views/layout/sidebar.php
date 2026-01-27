<?php $act = $_GET['action'] ?? 'dashboard'; ?>

<div class="sidebar">
    <div class="sidebar-header">
        SINHDOI ADMIN
    </div>

    <a href="index.php?action=dashboard" class="<?= $act=='dashboard' ? 'active' : '' ?>">
        <i class="fa-solid fa-chart-pie"></i> Tổng quan
    </a>

    <a href="index.php?action=baidang" class="<?= strpos($act, 'baidang') !== false ? 'active' : '' ?>">
        <i class="fa-solid fa-house-chimney"></i> Quản lý Bài đăng
    </a>

    <a href="index.php?action=tuvan" class="<?= strpos($act, 'tuvan') !== false ? 'active' : '' ?>">
        <i class="fa-solid fa-headset"></i> Yêu cầu Tư vấn
    </a>

    <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin'): ?>
        <div style="padding: 15px 24px; font-size: 11px; text-transform: uppercase; letter-spacing: 1px; font-weight: bold; color: #64748b;">Hệ thống</div>
        
        <a href="index.php?action=user_list" class="<?= strpos($act, 'user') !== false ? 'active' : '' ?>">
            <i class="fa-solid fa-users-gear"></i> Quản lý Người dùng
        </a>
        
        <a href="index.php?action=setting" class="<?= $act=='setting' ? 'active' : '' ?>">
            <i class="fa-solid fa-gear"></i> Cấu hình
        </a>
    <?php endif; ?>
</div>

<div class="content">