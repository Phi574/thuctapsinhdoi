<?php
class model
{
    public $connect;

    public function __construct()
    {
        $this->connect = new mysqli("localhost", "root", "", "batdongsan");

        if ($this->connect->connect_error) {
            die("Kết nối CSDL thất bại: " . $this->connect->connect_error);
        }

        $this->connect->set_charset("utf8");
    }

    /* ================= TRANG CHỦ ================= */

    public function get_nha()
    {
        $sql = "SELECT * FROM batdongsa_nha ORDER BY id_nha DESC";
        $result = $this->connect->query($sql);

        $data = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function get_dat()
    {
        $sql = "SELECT * FROM batdongsan_dat ORDER BY id_dat DESC";
        $result = $this->connect->query($sql);

        $data = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    /* ================= DANH SÁCH CHUNG ================= */

    public function get_batdongsan()
    {
        $sql = "
            SELECT 
                id_dat        AS id,
                'dat'         AS loai,
                tieude_dat    AS tieu_de,
                mota_dat      AS mo_ta,
                gia_dat       AS gia,
                dientich_dat  AS dien_tich,
                diachi_dat    AS dia_chi,
                img_1         AS hinh_anh,
                NULL          AS so_phong,
                NULL          AS loai_nha
            FROM batdongsan_dat

            UNION ALL

            SELECT 
                id_nha        AS id,
                'nha'         AS loai,
                tieude_nha    AS tieu_de,
                mota_nha      AS mo_ta,
                gia_nha       AS gia,
                dientich_nha  AS dien_tich,
                dia_chi_nha   AS dia_chi,
                img_1         AS hinh_anh,
                so_phong,
                loai_nha
            FROM batdongsa_nha
        ";

        $result = $this->connect->query($sql);

        $data = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    /* ================= CHI TIẾT SẢN PHẨM ================= */

    public function get_product_detail($id, $loai)
{
    $id = (int)$id;

    if ($loai === 'dat') {
        $sql = "
            SELECT *
            FROM batdongsan_dat
            JOIN users ON batdongsan_dat.user_id = users.id
            WHERE batdongsan_dat.id_dat = $id
        ";
    } elseif ($loai === 'nha') {
        $sql = "
            SELECT *
            FROM batdongsa_nha
            JOIN users ON batdongsa_nha.user_id = users.id
            WHERE batdongsa_nha.id_nha = $id
        ";
    } else {
        return null;
    }

    $result = $this->connect->query($sql);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    }

    return null;
}

}
?>
