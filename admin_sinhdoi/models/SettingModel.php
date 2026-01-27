<?php
require_once __DIR__ . '/../config/database.php';

function get_setting()
{
    global $conn;
    $sql = "SELECT * FROM settings LIMIT 1";
    $rs = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($rs);
}

function update_setting($data)
{
    global $conn;

    $sql = "UPDATE settings SET
        logo = '{$data['logo']}',
        site_name = '{$data['site_name']}',
        site_color = '{$data['site_color']}',
        hotline = '{$data['hotline']}',
        email = '{$data['email']}',
        address = '{$data['address']}',
        seo_title = '{$data['seo_title']}',
        seo_description = '{$data['seo_description']}',
        enable_tuvan = {$data['enable_tuvan']}
        WHERE id = 1
    ";

    return mysqli_query($conn, $sql);
}
