<?php require_once __DIR__ . '/../../core/Auth.php'; checkLogin(); ?>
<?php
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../layout/sidebar.php';
?>
<style>
        :root {
            --primary-color: #4a90e2;
            --danger-color: #e74c3c;
            --success-color: #2ecc71;
            --warning-color: #f39c12;
            --dark-color: #2c3e50;
            --bg-body: #f4f7f6;
        }

      

        .container {
            max-width: 1100px;
            margin: 0 auto;
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        h2 {
            color: var(--dark-color);
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background-color: #f8f9fa;
            color: #666;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 13px;
            padding: 15px;
            text-align: left;
            border-bottom: 2px solid #dee2e6;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }

        tr:hover {
            background-color: #fafafa;
        }

        /* Badge Styles */
        .badge {
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }

        .badge-admin { background: #fee2e2; color: #dc2626; }
        .badge-user { background: #e0f2fe; color: #0284c7; }
        .badge-active { background: #dcfce7; color: #16a34a; }
        .badge-locked { background: #f3f4f6; color: #6b7280; }

        /* Action Buttons */
        .btn {
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
        }

        .btn-outline {
            border: 1px solid #ddd;
            color: #555;
            margin-left: 8px;
        }

        .btn-outline:hover {
            background: #eee;
            border-color: #ccc;
        }

        .btn-lock {
            background-color: #fff1f0;
            color: #cf1322;
            border: 1px solid #ffa39e;
        }

        .btn-lock:hover {
            background-color: #cf1322;
            color: #fff;
        }

        .btn-unlock {
            background-color: #f6ffed;
            color: #389e0d;
            border: 1px solid #b7eb8f;
        }

        .btn-unlock:hover {
            background-color: #389e0d;
            color: #fff;
        }

        .me-label {
            font-style: italic;
            color: #999;
            font-size: 13px;
        }
    </style>


<div class="container">
    <h2>👤 Quản lý người dùng</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Thông tin cơ bản</th>
                <th>Quyền hạn</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($ds_user)): ?>
            <?php foreach ($ds_user as $u): ?>
            <tr>
                <td>#<?= $u['id'] ?></td>
                <td>
                    <strong><?= htmlspecialchars($u['name']) ?></strong><br>
                    <small style="color: #888;"><?= htmlspecialchars($u['email']) ?></small>
                </td>

                <td>
                    <span class="badge <?= $u['role'] == 'admin' ? 'badge-admin' : 'badge-user' ?>">
                        <?= ucfirst($u['role']) ?>
                    </span>
                    
                    <?php if ($u['id'] != $_SESSION['user']['id']): ?>
                        <a href="index.php?action=user_role&id=<?= $u['id'] ?>&role=<?= $u['role'] == 'admin' ? 'user' : 'admin' ?>" 
                           class="btn btn-outline" title="Đổi quyền">
                            ⇄ Đổi
                        </a>
                    <?php endif; ?>
                </td>

                <td>
                    <span class="badge <?= $u['status'] == 1 ? 'badge-active' : 'badge-locked' ?>">
                        ● <?= $u['status'] == 1 ? 'Hoạt động' : 'Bị khóa' ?>
                    </span>
                </td>

                <td>
                    <?php if ($u['id'] != $_SESSION['user']['id']): ?>
                        <?php if ($u['status'] == 1): ?>
                            <a href="index.php?action=user_trangthai&id=<?= $u['id'] ?>&tt=0" 
                               class="btn btn-lock" onclick="return confirm('Bạn chắc chắn muốn khóa người dùng này?')">
                                🔒 Khóa
                            </a>
                        <?php else: ?>
                            <a href="index.php?action=user_trangthai&id=<?= $u['id'] ?>&tt=1" 
                               class="btn btn-unlock">
                                🔓 Mở khóa
                            </a>
                        <?php endif; ?>
                    <?php else: ?>
                        <span class="me-label">(Đang đăng nhập)</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" style="text-align: center; padding: 30px; color: #999;">Không có người dùng nào.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
