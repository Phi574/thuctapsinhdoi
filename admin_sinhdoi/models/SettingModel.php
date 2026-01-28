<?php
// FILE: admin_sinhdoi/models/SettingModel.php
require_once __DIR__ . '/../config/database.php';

function get_setting() {
    global $conn;
    // Luôn lấy dòng ID = 1
    $sql = "SELECT * FROM cauhinh WHERE id = 1 LIMIT 1";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function update_setting($data) {
    global $conn;
    
    $title   = mysqli_real_escape_string($conn, $data['site_title']);
    $hotline = mysqli_real_escape_string($conn, $data['hotline']);
    $email   = mysqli_real_escape_string($conn, $data['email']);
    $address = mysqli_real_escape_string($conn, $data['address']);
    $fb      = mysqli_real_escape_string($conn, $data['facebook']);
    $zalo    = mysqli_real_escape_string($conn, $data['zalo']);
    $mota    = mysqli_real_escape_string($conn, $data['mota_footer']);
    $logo    = mysqli_real_escape_string($conn, $data['logo']);

    $sql = "UPDATE cauhinh SET 
            site_title = '$title',
            hotline = '$hotline',
            email = '$email',
            address = '$address',
            facebook = '$fb',
            zalo = '$zalo',
            mota_footer = '$mota',
            logo = '$logo'
            WHERE id = 1";

    return mysqli_query($conn, $sql);
}
?>