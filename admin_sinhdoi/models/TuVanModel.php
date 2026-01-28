<?php
// FILE: admin_sinhdoi/models/TuVanModel.php
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

/* ================= LỌC VÀ TÌM KIẾM NÂNG CAO (NEW) ================= */
function get_tuvan_advanced($keyword = '', $status = -1, $user_id = 0, $sort = 'DESC') {
    global $conn;
    
    // Câu lệnh cơ bản
    $sql = "SELECT tuvan.*, users.name AS ten_user 
            FROM tuvan 
            LEFT JOIN users ON tuvan.user_nhan_id = users.id 
            WHERE 1=1";

    // 1. Lọc theo User (Nếu không phải Admin thì chỉ xem của mình)
    if ($user_id > 0) {
        $sql .= " AND tuvan.user_nhan_id = $user_id";
    }

    // 2. Lọc theo Trạng thái (Nếu chọn)
    if ($status != -1) {
        $sql .= " AND tuvan.trang_thai = $status";
    }

    // 3. Tìm kiếm từ khóa (Tên, SĐT, Nội dung)
    if (!empty($keyword)) {
        $keyword = mysqli_real_escape_string($conn, $keyword);
        $sql .= " AND (tuvan.ten_khach LIKE '%$keyword%' 
                       OR tuvan.phone LIKE '%$keyword%' 
                       OR tuvan.noi_dung LIKE '%$keyword%')";
    }

    // 4. Sắp xếp
    $sql .= " ORDER BY tuvan.created_at $sort";

    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

/* ================= CÁC HÀM CŨ (Giữ lại để tương thích) ================= */
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