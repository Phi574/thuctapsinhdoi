<?php
require_once __DIR__ . '/../config/database.php';

/* =====================================================
   1. DANH SÁCH PHÂN LOẠI (Thêm ID 3 cho Chung cư)
===================================================== */
function get_all_phanloai() {
    return [
        ['id' => 1, 'ten_loai' => 'Nhà phố'],
        ['id' => 2, 'ten_loai' => 'Đất nền'],
        ['id' => 3, 'ten_loai' => 'Chung cư'] // <--- Đã thêm dòng này
    ];
}

function phanloai_exists($id) {
    $list = get_all_phanloai();
    foreach ($list as $item) {
        if ($item['id'] == $id) return true;
    }
    return false;
}
function insert_baidang($data) {
    global $conn;

    // Escape dữ liệu để tránh lỗi SQL Injection
    $user_id   = (int)$data['user_id'];
    $tieude    = mysqli_real_escape_string($conn, $data['tieude']);
    $diachi    = mysqli_real_escape_string($conn, $data['diachi']);
    $gia       = (int)$data['gia'];
    $dientich  = (float)$data['dientich'];
    $mota      = mysqli_real_escape_string($conn, $data['mota']);
    $img       = mysqli_real_escape_string($conn, $data['img_1']);
    
    // Dữ liệu mới
    $so_phong  = (int)($data['phong_ngu'] ?? 0);
    $so_tang   = (int)($data['so_tang'] ?? 0);
    $huong     = mysqli_real_escape_string($conn, $data['huong'] ?? '');

    // Nếu là NHÀ (id_loai = 1)
    if ($data['id_loai'] == 1) {
        $sql = "INSERT INTO batdongsa_nha (user_id, tieude_nha, dia_chi_nha, gia_nha, dientich_nha, mota_nha, img_1, trang_thai, so_phong, so_tang, huong) 
                VALUES ($user_id, '$tieude', '$diachi', $gia, $dientich, '$mota', '$img', 0, $so_phong, $so_tang, '$huong')";
    } 
    // Nếu là ĐẤT (id_loai = 2)
    else {
        // Đất thì không cần lưu số phòng, số tầng (hoặc lưu là 0)
        $sql = "INSERT INTO batdongsan_dat (user_id, tieude_dat, diachi_dat, gia_dat, dientich_dat, mota_dat, img_1, trang_thai, huong) 
                VALUES ($user_id, '$tieude', '$diachi', $gia, $dientich, '$mota', '$img', 0, '$huong')";
    }

    return mysqli_query($conn, $sql);
}

/* =====================================================
   2. THÊM MỚI BÀI ĐĂNG (Xử lý cả 3 loại)
===================================================== */
function insert_nha($data) {
    global $conn;
    $user_id  = mysqli_real_escape_string($conn, $data['user_id']);
    $tieude   = mysqli_real_escape_string($conn, $data['tieude']);
    $diachi   = mysqli_real_escape_string($conn, $data['diachi']);
    $gia      = (float)$data['gia'];
    $dientich = (float)$data['dientich'];
    $mota     = mysqli_real_escape_string($conn, $data['mota']);
    $img      = mysqli_real_escape_string($conn, $data['img']);
    $loai     = (int)$data['id_loai'];

    // LOGIC: Lưu Nhà (1) và Chung cư (3) vào bảng NHÀ
    if ($loai == 1 || $loai == 3) { 
        $ten_loai_nha = ($loai == 3) ? 'Chung cư' : 'Nhà phố';

        $sql = "INSERT INTO batdongsa_nha (user_id, tieude_nha, dia_chi_nha, gia_nha, dientich_nha, mota_nha, img_1, loai_nha, trang_thai) 
                VALUES ('$user_id', '$tieude', '$diachi', '$gia', '$dientich', '$mota', '$img', '$ten_loai_nha', 1)";
    
    // LOGIC: Lưu Đất (2) vào bảng ĐẤT
    } elseif ($loai == 2) { 
        $sql = "INSERT INTO batdongsan_dat (user_id, tieude_dat, diachi_dat, gia_dat, dientich_dat, mota_dat, img_1, trang_thai) 
                VALUES ('$user_id', '$tieude', '$diachi', '$gia', '$dientich', '$mota', '$img', 1)";
    } else {
        return false;
    }
    
    if (mysqli_query($conn, $sql)) {
        return mysqli_insert_id($conn);
    }
    // Debug lỗi nếu cần: echo mysqli_error($conn); 
    return false;
}

/* =====================================================
   3. XỬ LÝ ẢNH PHỤ
===================================================== */
function insert_baidang_image($baidang_id, $img) {
    return true; 
}

function delete_baidang_images($baidang_id) {
    global $conn;
    $check = mysqli_query($conn, "SHOW TABLES LIKE 'baidang_images'");
    if (mysqli_num_rows($check) > 0) {
        mysqli_query($conn, "DELETE FROM baidang_images WHERE baidang_id = $baidang_id");
    }
}

/* =====================================================
   4. LẤY DANH SÁCH (Sửa để hiển thị đúng loại)
===================================================== */
function get_all_baidang() {
    global $conn;
    
    // Lấy Nhà & Chung cư (Dựa vào cột loai_nha để phân biệt nếu cần)
    $sql = "SELECT id_nha AS id, user_id, tieude_nha AS tieude, dia_chi_nha AS diachi, gia_nha AS gia, img_1 AS img, 'nha' AS loai, loai_nha AS ten_loai, trang_thai FROM batdongsa_nha
            UNION ALL
            SELECT id_dat AS id, user_id, tieude_dat AS tieude, diachi_dat AS diachi, gia_dat AS gia, img_1 AS img, 'dat' AS loai, 'Đất nền' AS ten_loai, trang_thai FROM batdongsan_dat
            ORDER BY id DESC";
            
    $rs = mysqli_query($conn, $sql);
    return mysqli_fetch_all($rs, MYSQLI_ASSOC);
}

/* =====================================================
   LẤY BÀI ĐĂNG THEO ID (SỬA LẠI CHO KHỚP VIEW)
===================================================== */
function get_baidang_by_id($id)
{
    global $conn;
    $id = (int)$id;
    if ($id <= 0) return null;

    $sql = "
        SELECT 
            id_nha AS id, user_id, 
            tieude_nha AS tieude,  -- Sửa title -> tieude
            mota_nha AS mota,      -- Sửa mo_ta -> mota
            gia_nha AS gia, 
            dientich_nha AS dientich, -- Sửa dien_tich -> dientich
            dia_chi_nha AS diachi,    -- Sửa dia_chi -> diachi
            img_1, 
            'nha' AS loai, 
            loai_nha 
        FROM batdongsa_nha WHERE id_nha = $id
        
        UNION ALL
        
        SELECT 
            id_dat AS id, user_id, 
            tieude_dat AS tieude, 
            mota_dat AS mota, 
            gia_dat AS gia, 
            dientich_dat AS dientich, 
            diachi_dat AS diachi, 
            img_1, 
            'dat' AS loai, 
            'Đất nền' AS loai_nha 
        FROM batdongsan_dat WHERE id_dat = $id
        LIMIT 1
    ";

    $result = mysqli_query($conn, $sql);
    if (!$result || mysqli_num_rows($result) === 0) return null;
    return mysqli_fetch_assoc($result);
}

function get_baidang_by_user($user_id) {
    global $conn;
    $id = (int)$user_id;
    $sql = "SELECT id_nha AS id, tieude_nha AS tieude, dia_chi_nha AS diachi, gia_nha AS gia, img_1 AS img, 'nha' AS loai, trang_thai FROM batdongsa_nha WHERE user_id = $id
            UNION ALL
            SELECT id_dat AS id, tieude_dat AS tieude, diachi_dat AS diachi, gia_dat AS gia, img_1 AS img, 'dat' AS loai, trang_thai FROM batdongsan_dat WHERE user_id = $id
            ORDER BY id DESC";
    $rs = mysqli_query($conn, $sql);
    return mysqli_fetch_all($rs, MYSQLI_ASSOC);
}

function delete_baidang($id) {
    global $conn;
    $id = (int)$id;
    
    $sql1 = "DELETE FROM batdongsa_nha WHERE id_nha = $id";
    mysqli_query($conn, $sql1);
    
    $sql2 = "DELETE FROM batdongsan_dat WHERE id_dat = $id";
    mysqli_query($conn, $sql2);
    
    return mysqli_affected_rows($conn) > 0;
}
function update_baidang($id, $data) {
    global $conn;
    $id = (int)$id;
    $old_data = get_baidang_by_id($id);
    if (!$old_data) return false;

    $tieude   = mysqli_real_escape_string($conn, $data['tieude']);
    $diachi   = mysqli_real_escape_string($conn, $data['diachi']);
    $gia      = (int)$data['gia'];
    $dientich = (float)$data['dientich'];
    $mota     = mysqli_real_escape_string($conn, $data['mota']);
    $img      = mysqli_real_escape_string($conn, $data['img']);

    if ($old_data['loai'] == 'nha') {
        $sql = "UPDATE batdongsa_nha SET 
                tieude_nha='$tieude', dia_chi_nha='$diachi', 
                gia_nha=$gia, dientich_nha=$dientich, 
                mota_nha='$mota', img_1='$img' 
                WHERE id_nha=$id";
    } else {
        $sql = "UPDATE batdongsan_dat SET 
                tieude_dat='$tieude', diachi_dat='$diachi', 
                gia_dat=$gia, dientich_dat=$dientich, 
                mota_dat='$mota', img_1='$img' 
                WHERE id_dat=$id";
    }

    return mysqli_query($conn, $sql);
}

?>