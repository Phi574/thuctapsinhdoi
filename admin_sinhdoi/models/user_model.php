<?php
require_once __DIR__ . '/../config/database.php';

function user_login($email) {
    global $conn;
    $sql = "SELECT * FROM users 
            WHERE email = '$email' 
            AND status = 1 
            LIMIT 1";

    $query = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($query);
}


/*
|--------------------------------------------------------------------------
| LẤY DANH SÁCH USER
|--------------------------------------------------------------------------
*/
function get_all_user()
{
    global $conn;

    $sql = "SELECT id, name, email, role, status, created_at 
            FROM users 
            ORDER BY id DESC";

    $result = mysqli_query($conn, $sql);

    $data = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $data;
}

/*
|--------------------------------------------------------------------------
| CẬP NHẬT TRẠNG THÁI USER
|--------------------------------------------------------------------------
| 0 = khóa
| 1 = hoạt động
*/
function update_trangthai_user($id, $trang_thai)
{
    global $conn;

    $sql = "UPDATE users 
            SET status = $trang_thai
            WHERE id = $id";

    return mysqli_query($conn, $sql);
}

/*
|--------------------------------------------------------------------------
| CẬP NHẬT QUYỀN USER
|--------------------------------------------------------------------------
*/
function update_role_user($id, $role)
{
    global $conn;

    $sql = "UPDATE users 
            SET role = '$role'
            WHERE id = $id";

    return mysqli_query($conn, $sql);
}
