<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin System - SinhDoiLand</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/admin.css"> 
</head>
<body>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="wrapper">
    <div style="flex: 1; display: flex; flex-direction: column; width: 100%;">
        
        <div class="topbar">
            <div class="toggle-sidebar">
                <i class="fa-solid fa-bars" style="font-size: 20px; cursor: pointer; color: #64748b;"></i>
            </div>

            <div class="user-info">
                <?php if (isset($_SESSION['user'])): ?>
                    <div style="text-align: right;">
                        <div style="font-weight: 600;"><?= htmlspecialchars($_SESSION['user']['name']) ?></div>
                        <div style="font-size: 11px; color: #6b7280; text-transform: uppercase;"><?= $_SESSION['user']['role'] ?></div>
                    </div>
                    <div style="width: 35px; height: 35px; background: #e0e7ff; color: #4f46e5; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                        <?= strtoupper(substr($_SESSION['user']['name'], 0, 1)) ?>
                    </div>
                    <a href="index.php?action=logout" class="logout-btn" title="Đăng xuất">
                        <i class="fa-solid fa-power-off"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>