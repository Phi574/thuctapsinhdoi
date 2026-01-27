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

            default:
                $data_index_nha = $this->model->get_nha();
                $data_index_dat = $this->model->get_dat();
                include 'views/index.php';
                break;
        }
    }
}
