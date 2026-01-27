<?php require_once __DIR__.'/../layout/header.php'; ?>

<h2>🏠 Bài đăng mới</h2>

<?php foreach ($list as $row): ?>
    <div class="card">
        <h3><?= $row['tieude'] ?></h3>
        <p>📍 <?= $row['diachi'] ?></p>
        <p>💰 <?= number_format($row['gia']) ?> đ</p>
        <a class="btn" href="index.php?action=detail&id=<?= $row['id'] ?>">Xem chi tiết</a>
    </div>
<?php endforeach; ?>

<?php require_once __DIR__.'/../layout/footer.php'; ?>
