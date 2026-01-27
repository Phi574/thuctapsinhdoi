<?php $act = $_GET['action'] ?? 'dashboard'; ?>

<div class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <i class="fa-solid fa-shield-halved mr-2"></i> ADMIN
    </div>
    
    <div class="sidebar-menu">
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
            <div style="margin: 20px 15px 10px; font-size: 11px; text-transform: uppercase; font-weight: bold; color: #64748b; letter-spacing: 1px;">Hệ thống</div>
            <a href="index.php?action=user_list" class="<?= strpos($act, 'user') !== false ? 'active' : '' ?>">
                <i class="fa-solid fa-users-gear"></i> Người dùng
            </a>
            <a href="index.php?action=setting" class="<?= $act=='setting' ? 'active' : '' ?>">
                <i class="fa-solid fa-gear"></i> Cấu hình
            </a>
        <?php endif; ?>
    </div>
</div>

<div class="main-panel">
    
    <div class="topbar">
        <div class="toggle-btn" onclick="toggleMenu()">
            <i class="fa-solid fa-bars"></i>
        </div>

        <div class="user-box" style="margin-left: auto;">
            <?php if (isset($_SESSION['user'])): ?>
                <div class="user-info">
                    <b><?= htmlspecialchars($_SESSION['user']['name']) ?></b>
                    <span><?= $_SESSION['user']['role'] ?></span>
                </div>
                <div class="avatar">
                    <?= strtoupper(substr($_SESSION['user']['name'], 0, 1)) ?>
                </div>
                <a href="index.php?action=logout" style="color: #ef4444; font-size: 1.2rem;" title="Đăng xuất">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="content">