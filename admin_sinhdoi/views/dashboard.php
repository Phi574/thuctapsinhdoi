<?php
require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/layout/sidebar.php';
?>

<style>
    :root {
        --primary: #3b82f6;
        --success: #22c55e;
        --warning: #f59e0b;
        --danger: #ef4444;
        --text-main: #1e293b;
        --bg-body: #f8fafc;
    }

    .dashboard-container {
        padding: 25px;
        background: var(--bg-body);
        font-family: 'Inter', sans-serif;
    }

    .dashboard-header {
        margin-bottom: 30px;
    }

    .dashboard-header h2 {
        font-size: 1.6rem;
        color: var(--text-main);
        font-weight: 700;
        margin: 0;
    }

    /* Stat Cards Layout */
    .stat-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: #fff;
        padding: 24px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        border: 1px solid #f1f5f9;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    .stat-info h3 {
        margin: 0;
        font-size: 0.85rem;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .stat-info .number {
        display: block;
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--text-main);
        margin-top: 5px;
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    /* Colors for icons */
    .bg-light-blue { background: #eff6ff; color: var(--primary); }
    .bg-light-orange { background: #fffbeb; color: var(--warning); }
    .bg-light-green { background: #f0fdf4; color: var(--success); }
    .bg-light-red { background: #fef2f2; color: var(--danger); }

    /* Chart Layout */
    .chart-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 25px;
    }

    .chart-box {
        background: #fff;
        padding: 25px;
        border-radius: 16px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        border: 1px solid #f1f5f9;
    }

    .chart-box h4 {
        margin-top: 0;
        margin-bottom: 20px;
        color: var(--text-main);
        font-size: 1.1rem;
        font-weight: 600;
    }

    @media (max-width: 1024px) {
        .chart-grid { grid-template-columns: 1fr; }
    }
</style>

<div class="dashboard-container">
    <div class="dashboard-header">
        <h2>📊 Dashboard Quản trị</h2>
    </div>

    <div class="stat-grid">
        <?php if ($_SESSION['user']['role'] == 'admin'): ?>
            <div class="stat-card">
                <div class="stat-info">
                    <h3>Tổng bài đăng</h3>
                    <span class="number"><?= $thongke['tong_baidang'] ?? 0 ?></span>
                </div>
                <div class="stat-icon bg-light-blue">🏠</div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    <h3>Chờ duyệt</h3>
                    <span class="number"><?= $thongke['cho_duyet'] ?? 0 ?></span>
                </div>
                <div class="stat-icon bg-light-orange">⏳</div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    <h3>Tổng tư vấn</h3>
                    <span class="number"><?= $thongke['tong_tuvan'] ?? 0 ?></span>
                </div>
                <div class="stat-icon bg-light-green">📞</div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    <h3>Hôm nay</h3>
                    <span class="number"><?= $thongke['tuvan_homnay'] ?? 0 ?></span>
                </div>
                <div class="stat-icon bg-light-red">📅</div>
            </div>

        <?php else: ?>
            <div class="stat-card">
                <div class="stat-info">
                    <h3>Bài của tôi</h3>
                    <span class="number"><?= $thongke['my_baidang'] ?? 0 ?></span>
                </div>
                <div class="stat-icon bg-light-blue">👤</div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    <h3>Đã duyệt</h3>
                    <span class="number"><?= $thongke['baidang_duyet'] ?? 0 ?></span>
                </div>
                <div class="stat-icon bg-light-green">✅</div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    <h3>Tư vấn nhận</h3>
                    <span class="number"><?= $thongke['my_tuvan'] ?? 0 ?></span>
                </div>
                <div class="stat-icon bg-light-orange">🎧</div>
            </div>
        <?php endif; ?>
    </div>

    <div class="chart-grid">
        <div class="chart-box">
            <h4>📈 Biểu đồ thống kê chung</h4>
            <div style="height: 300px;">
                <canvas id="barChart"></canvas>
            </div>
        </div>

        <div class="chart-box">
            <h4>🍩 Tỷ lệ xử lý tư vấn</h4>
            <div style="height: 300px; display: flex; align-items: center; justify-content: center;">
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Cấu hình font chung cho ChartJS
    Chart.defaults.font.family = "'Inter', sans-serif";
    Chart.defaults.color = '#64748b';

    /* ================= BIỂU ĐỒ CỘT ================= */
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: ['Bài đăng', 'Chờ duyệt', 'Tư vấn', 'Hôm nay'],
            datasets: [{
                label: 'Số lượng',
                data: [
                    <?= $_SESSION['user']['role'] == 'admin' ? ($thongke['tong_baidang'] ?? 0) : ($thongke['my_baidang'] ?? 0) ?>,
                    <?= $thongke['cho_duyet'] ?? 0 ?>,
                    <?= $_SESSION['user']['role'] == 'admin' ? ($thongke['tong_tuvan'] ?? 0) : ($thongke['my_tuvan'] ?? 0) ?>,
                    <?= $thongke['tuvan_homnay'] ?? 0 ?>
                ],
                backgroundColor: '#3b82f6',
                borderRadius: 8,
                maxBarThickness: 50
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { 
                    beginAtZero: true, 
                    grid: { color: '#f1f5f9', drawBorder: false } 
                },
                x: { 
                    grid: { display: false, drawBorder: false } 
                }
            }
        }
    });

    /* ================= BIỂU ĐỒ TRÒN ================= */
    new Chart(document.getElementById('pieChart'), {
        type: 'doughnut',
        data: {
            labels: ['Đã xong', 'Chờ xử lý'],
            datasets: [{
                data: [
                    <?= max(0, ($thongke['tong_tuvan'] ?? 0) - ($thongke['cho_duyet'] ?? 0)) ?>,
                    <?= $thongke['cho_duyet'] ?? 0 ?>
                ],
                backgroundColor: ['#22c55e', '#f1f5f9'],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '75%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { usePointStyle: true, padding: 20 }
                }
            }
        }
    });
</script>

<?php require_once __DIR__ . '/layout/footer.php'; ?>