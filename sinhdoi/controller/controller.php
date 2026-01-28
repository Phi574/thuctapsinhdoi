<?php
require_once 'models/model.php';

class controller
{
    public $model;

    public function __construct()
    {
        $this->model = new model();
    }

    public function dieuhuong()
    {
        $action = $_GET['action'] ?? 'trangchu';

        switch ($action) {
            case 'trangchu':
                $data_index_nha = $this->model->get_nha();
                $data_index_dat = $this->model->get_dat();
                include 'views/index.php';
                break;

            case 'list_product':
                $list_product = $this->model->get_batdongsan();
                include 'views/list_product.php';
                break;

            case 'contact':
                include 'views/contact.php';
                break;

            case 'introduce':
                include 'views/introduce.php';
                break;

            case 'sanpham':
                $id   = isset($_GET['id']) ? (int)$_GET['id'] : 0;
                $loai = $_GET['loai'] ?? '';
                $product = $this->model->get_product_detail($id, $loai);
                include 'views/product.php';
                break;

            /* =========================================
               XỬ LÝ GỬI TƯ VẤN (TỪ TRANG CHI TIẾT)
               ========================================= */
            case 'gui_tuvan':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $data = [
                        'ten_khach'    => $_POST['ten_khach'] ?? '',
                        'phone'        => $_POST['phone'] ?? '',
                        'email'        => $_POST['email'] ?? '',
                        'noi_dung'     => $_POST['noi_dung'] ?? '',
                        'bai_dang_id'  => $_POST['bai_dang_id'] ?? 0,
                        'user_nhan_id' => $_POST['user_nhan_id'] ?? 0
                    ];

                    if ($this->model->insert_tuvan($data)) {
                        echo "<script>alert('Gửi yêu cầu thành công! Chúng tôi sẽ liên hệ lại sớm.'); window.history.back();</script>";
                    } else {
                        echo "<script>alert('Lỗi gửi đi. Vui lòng thử lại!'); window.history.back();</script>";
                    }
                }
                break;

            /* =========================================
               XỬ LÝ GỬI LIÊN HỆ (TỪ TRANG CONTACT)
               ========================================= */
            case 'gui_lien_he':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Mapping dữ liệu từ form Contact sang cấu trúc DB
                    $tieu_de = $_POST['tieu_de'] ?? '';
                    $noi_dung_goc = $_POST['noi_dung'] ?? '';
                    
                    $data = [
                        'ten_khach'    => $_POST['ho_ten'] ?? '', // Form là ho_ten -> DB là ten_khach
                        'phone'        => $_POST['so_dien_thoai'] ?? '',
                        'email'        => $_POST['email'] ?? '',
                        'noi_dung'     => "Tiêu đề: $tieu_de \nNội dung: $noi_dung_goc", // Gộp tiêu đề vào nội dung
                        'bai_dang_id'  => 0, // Liên hệ chung
                        'user_nhan_id' => 0
                    ];

                    if ($this->model->insert_tuvan($data)) {
                        echo "<script>alert('Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm.'); window.location.href='index.php?action=contact&status=success';</script>";
                    } else {
                        echo "<script>alert('Lỗi hệ thống!'); window.history.back();</script>";
                    }
                }
                break;

            default:
                $data_index_nha = $this->model->get_nha();
                $data_index_dat = $this->model->get_dat();
                include 'views/index.php';
                break;
        }
    }
}
?>