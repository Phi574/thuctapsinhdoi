<?php
// models/TuVanModel.php
require_once __DIR__ . '/../config/database.php';

/* ================= THÊM TƯ VẤN ================= */
function insert_tuvan($data) {
    global $conn;
    $ten_khach = mysqli_real_escape_string($conn, $data['ten_khach']);
    $phone     = mysqli_real_escape_string($conn, $data['phone']);
    $email     = mysqli_real_escape_string($conn, $data['email']);
    $noi_dung  = mysqli_real_escape_string($conn, $data['noi_dung']);
    $bai_dang_id = !empty($data['bai_dang_id']) ? (int)$data['bai_dang_id'] : 0;
    $user_nhan_id = (int)$data['user_nhan_id'];
    $loai = ($bai_dang_id > 0) ? 2 : 1;

    $sql = "INSERT INTO tuvan (ten_khach, phone, email, noi_dung, loai, bai_dang_id, user_nhan_id, trang_thai, created_at) 
            VALUES ('$ten_khach', '$phone', '$email', '$noi_dung', $loai, $bai_dang_id, $user_nhan_id, 0, NOW())";
    return mysqli_query($conn, $sql);
}

/* ================= ADMIN: LẤY TẤT CẢ (Đã sửa lỗi hiển thị) ================= */
function get_all_tuvan() {
    global $conn;
    // Dùng LEFT JOIN để lấy cả những tin nhắn chung (user_nhan_id = 0)
    $sql = "SELECT tuvan.*, users.name AS ten_user, users.phone AS phone_user, users.email AS email_user
            FROM tuvan
            LEFT JOIN users ON tuvan.user_nhan_id = users.id
            ORDER BY tuvan.created_at DESC";
            
    $result = mysqli_query($conn, $sql);
    $data = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $data;
}

/* ================= USER: LẤY THEO ID ================= */
function get_tuvan_by_user($user_id) {
    global $conn;
    $user_id = (int)$user_id;
    $sql = "SELECT * FROM tuvan WHERE user_nhan_id = $user_id ORDER BY created_at DESC";
    $result = mysqli_query($conn, $sql);
    $data = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $data;
}

/* ================= CHI TIẾT & CẬP NHẬT ================= */
function get_tuvan_by_id($id) {
    global $conn;
    $id = (int)$id;
    $sql = "SELECT * FROM tuvan WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) return mysqli_fetch_assoc($result);
    return null;
}

function update_trang_thai_tuvan($id, $trang_thai) {
    global $conn;
    $id = (int)$id;
    $trang_thai = (int)$trang_thai;
    $sql = "UPDATE tuvan SET trang_thai = $trang_thai WHERE id = $id";
    return mysqli_query($conn, $sql);
}

function delete_tuvan($id) {
    global $conn;
    $id = (int)$id;
    return mysqli_query($conn, "DELETE FROM tuvan WHERE id = $id");
}
?>