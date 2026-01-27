<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'batdongsan'; // ⚠️ đúng tên database

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die('Lỗi kết nối database: ' . mysqli_connect_error());
}

// set charset UTF-8
mysqli_set_charset($conn, 'utf8mb4');

return $conn;
