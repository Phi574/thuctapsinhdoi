<?php
require_once __DIR__ . '/../config/database.php';

/* =====================================================
| ADMIN DASHBOARD
===================================================== */
function admin_dashboard()
{
    global $conn;

    return [
        'tong_baidang' =>
            fetch_count("SELECT COUNT(*) FROM batdongsa_nha"),

        'cho_duyet' =>
            fetch_count("SELECT COUNT(*) FROM batdongsa_nha WHERE trang_thai = 0"),

        'tong_tuvan' =>
            fetch_count("SELECT COUNT(*) FROM tuvan"),

        'tuvan_homnay' =>
            fetch_count("SELECT COUNT(*) FROM tuvan WHERE DATE(created_at)=CURDATE()"),

        'user_active' =>
            fetch_count("SELECT COUNT(*) FROM users WHERE status = 1"),
    ];
}

/* =====================================================
| USER DASHBOARD
===================================================== */
function user_dashboard($user_id)
{
    global $conn;

    return [
        'my_baidang' =>
            fetch_count("SELECT COUNT(*) FROM batdongsa_nha WHERE user_id = $user_id"),

        'baidang_duyet' =>
            fetch_count("SELECT COUNT(*) FROM batdongsa_nha 
                         WHERE user_id = $user_id AND trang_thai = 1"),

        'my_tuvan' =>
            fetch_count("SELECT COUNT(*) FROM tuvan WHERE user_nhan_id = $user_id"),

        'tuvan_pending' =>
            fetch_count("SELECT COUNT(*) FROM tuvan 
                         WHERE user_nhan_id = $user_id AND trang_thai = 0"),
    ];
}

/* =====================================================
| TƯ VẤN – THỐNG KÊ CHI TIẾT
===================================================== */
function thongke_tuvan()
{
    return [
        'total'   => fetch_count("SELECT COUNT(*) FROM tuvan"),
        'today'   => fetch_count("SELECT COUNT(*) FROM tuvan WHERE DATE(created_at)=CURDATE()"),
        'pending' => fetch_count("SELECT COUNT(*) FROM tuvan WHERE trang_thai = 0"),
        'done'    => fetch_count("SELECT COUNT(*) FROM tuvan WHERE trang_thai = 1"),
    ];
}

/* =====================================================
| HELPER
===================================================== */
function fetch_count($sql)
{
    global $conn;
    return (int) mysqli_fetch_assoc(mysqli_query($conn, $sql))['COUNT(*)'];
}
