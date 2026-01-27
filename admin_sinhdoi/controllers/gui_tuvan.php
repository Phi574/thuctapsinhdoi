<?php
require_once __DIR__ . '/../models/TuVanModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $bai_dang_id = $_POST['bai_dang_id'] ?? null;

    $data = [
        'ten_khach'    => $_POST['ten_khach'] ?? '',
        'phone'        => $_POST['phone'] ?? '',
        'email'        => $_POST['email'] ?? '',
        'noi_dung'     => $_POST['noi_dung'] ?? '',
        'loai'         => $bai_dang_id ? '2' : '1',
        'bai_dang_id'  => $bai_dang_id ?? 0,
        'user_nhan_id' => $_POST['user_nhan_id'] ?? 1
    ];

    insert_tuvan($data);

    echo json_encode([
        'status'  => 'success',
        'message' => 'Gửi yêu cầu tư vấn thành công!'
    ]);
}
