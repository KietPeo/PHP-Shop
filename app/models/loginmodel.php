<?php
class loginmodel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }
    public function login($table, $username, $password)
    {
        $sql = "SELECT * FROM $table  where username=? AND password=?";
        return $this->db->affectedRows($sql, $username, $password);
    }
    public function getLogin($table_customer, $username, $password)
    {
        $sql = "SELECT * FROM $table_customer where username=? AND password=?";
        return $this->db->selectUser($sql, $username, $password);
    }
    public function dashboard()
    {
        // Tạo truy vấn SQL để lấy dữ liệu từ bảng order_details
        $sql = "SELECT a.product_id,b.id_product,b.title_product,sum(a.product_quanlity) as soluong FROM tbl_order_details a ,tbl_product b WHERE a.product_id=b.id_product GROUP by a.product_id,b.title_product"; // Chọn các cột bạn muốn hiển thị trong biểu đồ
        // Thực hiện truy vấn và trả về kết quả
        return $this->db->query($sql); //cái view checkout đâu
    }
}
