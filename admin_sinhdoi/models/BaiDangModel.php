<?php
// FILE: admin_sinhdoi/models/BaiDangModel.php
require_once __DIR__ . '/../config/database.php';

/* =====================================================
   1. DANH SÁCH PHÂN LOẠI
===================================================== */
function get_all_phanloai() {
    return [
        ['id' => 1, 'ten_loai' => 'Nhà phố'],
        ['id' => 2, 'ten_loai' => 'Đất nền'],
        ['id' => 3, 'ten_loai' => 'Chung cư']
    ];
}

function phanloai_exists($id) {
    $list = get_all_phanloai();
    foreach ($list as $item) {
        if ($item['id'] == $id) return true;
    }
    return false;
}

/* =====================================================
   2. THÊM MỚI BÀI ĐĂNG (INSERT)
===================================================== */
function insert_nha($data) {
    global $conn;

    $user_id  = (int)$data['user_id'];
    $tieude   = mysqli_real_escape_string($conn, $data['tieude']);
    $diachi   = mysqli_real_escape_string($conn, $data['diachi']);
    $gia      = (float)$data['gia'];
    $dientich = (float)$data['dientich'];
    $mota     = mysqli_real_escape_string($conn, $data['mota']);
    $img      = mysqli_real_escape_string($conn, $data['img']);
    $loai     = (int)$data['id_loai'];
    
    // Các trường mới
    $so_phong = (int)($data['so_phong'] ?? 0);
    $so_tang  = (int)($data['so_tang'] ?? 0);
    $huong    = mysqli_real_escape_string($conn, $data['huong'] ?? '');

    if ($loai == 1 || $loai == 3) { 
        // Bảng Nhà
        $ten_loai_nha = ($loai == 3) ? 'Chung cư' : 'Nhà phố';
        $sql = "INSERT INTO batdongsa_nha 
                (user_id, tieude_nha, dia_chi_nha, gia_nha, dientich_nha, mota_nha, img_1, loai_nha, trang_thai, so_phong, so_tang, huong) 
                VALUES 
                ($user_id, '$tieude', '$diachi', $gia, $dientich, '$mota', '$img', '$ten_loai_nha', 1, $so_phong, $so_tang, '$huong')";
    } else { 
        // Bảng Đất
        $sql = "INSERT INTO batdongsan_dat 
                (user_id, tieude_dat, diachi_dat, gia_dat, dientich_dat, mota_dat, img_1, trang_thai, huong) 
                VALUES 
                ($user_id, '$tieude', '$diachi', $gia, $dientich, '$mota', '$img', 1, '$huong')";
    }

    if (mysqli_query($conn, $sql)) {
        return mysqli_insert_id($conn);
    }
    return false;
}

/* =====================================================
   3. CÁC HÀM LẤY DỮ LIỆU (SELECT)
===================================================== */
function get_all_baidang() {
    global $conn;
    $sql = "SELECT id_nha AS id, user_id, tieude_nha AS tieude, dia_chi_nha AS diachi, gia_nha AS gia, img_1 AS img, 'nha' AS loai, loai_nha AS ten_loai, trang_thai FROM batdongsa_nha
            UNION ALL
            SELECT id_dat AS id, user_id, tieude_dat AS tieude, diachi_dat AS diachi, gia_dat AS gia, img_1 AS img, 'dat' AS loai, 'Đất nền' AS ten_loai, trang_thai FROM batdongsan_dat
            ORDER BY id DESC";
    $rs = mysqli_query($conn, $sql);
    return mysqli_fetch_all($rs, MYSQLI_ASSOC);
}

function get_baidang_by_id($id) {
    global $conn;
    $id = (int)$id;
    if ($id <= 0) return null;

    $sql = "SELECT id_nha AS id, user_id, tieude_nha AS tieude, mota_nha AS mota, gia_nha AS gia, dientich_nha AS dientich, dia_chi_nha AS diachi, img_1, 'nha' AS loai, loai_nha, so_phong, so_tang, huong 
            FROM batdongsa_nha WHERE id_nha = $id
            UNION ALL
            SELECT id_dat AS id, user_id, tieude_dat AS tieude, mota_dat AS mota, gia_dat AS gia, dientich_dat AS dientich, diachi_dat AS diachi, img_1, 'dat' AS loai, 'Đất nền' AS loai_nha, 0 AS so_phong, 0 AS so_tang, huong 
            FROM batdongsan_dat WHERE id_dat = $id LIMIT 1";

    $result = mysqli_query($conn, $sql);
    if (!$result || mysqli_num_rows($result) === 0) return null;
    return mysqli_fetch_assoc($result);
}

/* =====================================================
   4. CẬP NHẬT & XÓA (UPDATE & DELETE)
===================================================== */
function update_baidang($id, $data) {
    global $conn;
    $id = (int)$id;
    
    // Lấy thông tin cũ
    $old_data = get_baidang_by_id($id);
    if (!$old_data) return false;

    $tieude   = mysqli_real_escape_string($conn, $data['tieude']);
    $diachi   = mysqli_real_escape_string($conn, $data['diachi']);
    $gia      = (float)$data['gia'];
    $dientich = (float)$data['dientich'];
    $mota     = mysqli_real_escape_string($conn, $data['mota']);
    $img      = mysqli_real_escape_string($conn, $data['img']);
    $huong    = mysqli_real_escape_string($conn, $data['huong'] ?? '');
    $so_phong = (int)($data['phong_ngu'] ?? 0);
    $so_tang  = (int)($data['so_tang'] ?? 0);

    if ($old_data['loai'] == 'nha') {
        $sql = "UPDATE batdongsa_nha SET 
                tieude_nha='$tieude', dia_chi_nha='$diachi', 
                gia_nha=$gia, dientich_nha=$dientich, 
                mota_nha='$mota', img_1='$img',
                so_phong=$so_phong, so_tang=$so_tang, huong='$huong'
                WHERE id_nha=$id";
    } else {
        $sql = "UPDATE batdongsan_dat SET 
                tieude_dat='$tieude', diachi_dat='$diachi', 
                gia_dat=$gia, dientich_dat=$dientich, 
                mota_dat='$mota', img_1='$img',
                huong='$huong'
                WHERE id_dat=$id";
    }

    return mysqli_query($conn, $sql);
}

function delete_baidang($id) {
    global $conn;
    $id = (int)$id;
    
    // Xóa trong cả 2 bảng cho chắc ăn
    mysqli_query($conn, "DELETE FROM batdongsa_nha WHERE id_nha = $id");
    mysqli_query($conn, "DELETE FROM batdongsan_dat WHERE id_dat = $id");
    
    return mysqli_affected_rows($conn) > 0;
}
?>