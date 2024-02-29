<?php
class customermodel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }
    // function category product
    // public function category($table)
    // {
    //     $sql = "SELECT * FROM $table order by id_category_product desc";
    //     return $this->db->select($sql);
    // }
    // public function category_home($table)
    // {
    //     $sql = "SELECT * FROM $table order by id_category_product desc";
    //     return $this->db->select($sql);
    // }
    // public function categorybyid_home($table, $table_product, $id)
    // {
    //     $sql = "SELECT * FROM $table, $table_product WHERE $table.id_category_product=$table_product.id_category_product 
    //             AND $table_product.id_category_product='$id' ORDER BY $table_product.id_product DESC";
    //     return $this->db->select($sql);
    // }
    // public function categorybyid($table, $cond)
    // {
    //     $sql = "SELECT * FROM $table WHERE $cond";
    //     return $this->db->select($sql);
    // }
    function insertcustomer($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    // cập nhật mật khẩu
    public function updatePasswordByEmail($table, $email, $hashed_password)
    {
        $sql = "UPDATE $table SET custumer_password = :password WHERE custumer_email = :email";
        $statement = $this->db->prepare($sql);
        return $statement->execute(['password' => $hashed_password, 'email' => $email]);
    }

    public function login($table_customer, $username, $password)
    {
        $sql = "SELECT * FROM $table_customer  where custumer_name=? AND custumer_password=?";
        return $this->db->affectedRows($sql, $username, $password);
    }
    public function getLogin($table_admin, $username, $password)
    {
        $sql = "SELECT * FROM $table_admin where custumer_name=? AND custumer_password=?";
        return $this->db->selectUser($sql, $username, $password);
    }
    public function checkemail($table, $email)
    {
        $sql = "SELECT * FROM $table WHERE custumer_email = :email LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? true : false;
    }
    // public function updatecategory($table_category_product, $data, $cond)
    // {
    //     return $this->db->update($table_category_product, $data, $cond);
    // }
    // public function deletecategory($table_category_product, $cond)
    // {
    //     return $this->db->delete($table_category_product, $cond);
    // }
}
