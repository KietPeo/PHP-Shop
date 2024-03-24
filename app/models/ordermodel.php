<?php
class ordermodel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }
    public function insert_order($table_order, $data_order)
    {
        return $this->db->insert($table_order, $data_order);
    }
    // thông tin đơn hàng 
    public function insert_order_details($table_order_details, $data_details)
    {
        return $this->db->insert($table_order_details, $data_details);
    }
    public function list_order($table_order)
    {
        $sql = "SELECT * FROM $table_order ORDER BY order_id DESC";
        return $this->db->select($sql);
    }

    public function list_order_customer($table_order, $email)
    {
        $sql = "SELECT * FROM $table_order WHERE email = :email";
        $params = array(':email' => $email);
        return $this->db->select($sql, $params);
    }

    public function list_order_details($table_product, $table_order_details, $cond)
    {
        $sql = "SELECT * FROM $table_order_details,$table_product WHERE $cond ";
        return $this->db->select($sql);
    }

    public function list_info($table_product,$table_order_details, $cond_info)
    {
        $sql = "SELECT * FROM  $table_product,$table_order_details WHERE $cond_info LIMIT 1";
        // echo $sql;
        return $this->db->select($sql);
    }
}
