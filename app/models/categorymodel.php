<?php
class categorymodel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }
    // function category product
    public function category($table)
    {
        $sql = "SELECT * FROM $table order by id_category_product desc";
        return $this->db->select($sql);
    }
    public function category_home($table)
    {
        $sql = "SELECT * FROM $table order by id_category_product desc";
        return $this->db->select($sql);
    }
    public function categorybyid_home($table, $table_product, $id)
    {
        $sql = "SELECT * FROM $table, $table_product WHERE $table.id_category_product=$table_product.id_category_product 
                AND $table_product.id_category_product='$id' ORDER BY $table_product.id_product DESC";
        return $this->db->select($sql);
    }
    public function categorybyid($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
    }
    function insertcategory($table_category_product, $data)
    {
        return $this->db->insert($table_category_product, $data);
    }
    public function updatecategory($table_category_product, $data, $cond)
    {
        return $this->db->update($table_category_product, $data, $cond);
    }
    public function deletecategory($table_category_product, $cond)
    {
        return $this->db->delete($table_category_product, $cond);
    }
    // function post
    function insertcategory_post($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    // 
    public function post_category($table)
    {
        $sql = "SELECT * FROM $table order by id_category_post desc";
        return $this->db->select($sql);
    }
    // 
    public function categorypost_home($table)
    {
        $sql = "SELECT * FROM $table order by id_category_post desc";
        return $this->db->select($sql);
    }
    // 
    public function postbyid_home($table_cate_post, $table_post, $id)
    {
        $sql = "SELECT * FROM $table_cate_post, $table_post WHERE $table_cate_post.id_category_post=$table_post.id_category_post 
            AND $table_post.id_category_post='$id' ORDER BY $table_post.id_post DESC";
        // echo $sql;
        return $this->db->select($sql);
    }
    // 
    public function updatecategory_post($table_category_product, $data, $cond)
    {
        return $this->db->update($table_category_product, $data, $cond);
    }
    // 
    public function deletecategory_post($table_category_product, $cond)
    {
        return $this->db->delete($table_category_product, $cond);
    }
    // 
    public function categorybyid_post($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
    }
    //
    public function related_post_home($post, $table_post, $cond_related)
    {
        $sql = "SELECT * FROM $table_post,$post where $cond_related order by $post.id_post desc";
        return $this->db->select($sql);
    }
    //product
    //sap xep tang dan
    public function list_product_up($table_product)
    {
        $sql = "SELECT * FROM $table_product ORDER BY price_product ASC";
        return $this->db->select($sql);
    }

    //sap xep giam dan
    public function list_product_down($table_product)
    {
        $sql = "SELECT * FROM $table_product ORDER BY price_product DESC";
        return $this->db->select($sql);
    }

    // lấy ra 5 sản phẩm mới nhất
    public function list_product_new($table_product)
    {
        $sql = "SELECT * FROM $table_product order by id_product desc limit 5";
        return $this->db->select($sql);
    }
    //lấy ra tất cả sản phẩm hot
    public function product_hot($table_product)
    {
        $sql = "SELECT * FROM $table_product WHERE product_hot=1 order by $table_product.id_product desc";
        return $this->db->select($sql);
    }
    //lấy ra tất cả sản phẩm mới
    public function product_new($table_product)
    {
        $sql = "SELECT * FROM $table_product order by id_product desc limit 8";
        return $this->db->select($sql);
    }

    //lấy ra chi tiết sản phẩm trang home
    public function details_product_home($table, $table_product, $cond)
    {
        $sql = "SELECT * FROM $table_product,$table where $cond ";
        return $this->db->select($sql);
    }
    //lấy ra chi tiết bài viết trang home
    public function details_post_home($table_post, $post, $cond)
    {
        $sql = "SELECT * FROM $table_post,$post  where $cond order by $post.id_post desc";
        return $this->db->select($sql);
    }
    //lấy ra tất cả sản phẩm trang home
    public function list_product_home($table_product)
    {
        $sql = "SELECT * FROM $table_product order by $table_product.id_product desc";
        return $this->db->select($sql);
    }
    //lấy ra tất cả sản phẩm trang index
    public function list_product_index($table_product)
    {
        $sql = "SELECT * FROM $table_product order by $table_product.id_product desc";
        return $this->db->select($sql);
    }
    function insertproduct($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    public function product($table_product, $table_category)
    {
        $sql = "SELECT * FROM $table_product ,$table_category 
            where $table_product.id_category_product=$table_category.id_category_product 
            order by $table_product.id_product desc";
        return $this->db->select($sql);
    }
    public function deleteproduct($table_product, $cond)
    {
        return $this->db->delete($table_product, $cond);
    }
    public function productbyid($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
    }
    public function related_product_home($table, $table_product, $cond_related)
    {
        $sql = "SELECT * FROM $table,$table_product WHERE $cond_related";
        return $this->db->select($sql);
    }
    public function updateproduct($table_category_product, $data, $cond)
    {
        return $this->db->update($table_category_product, $data, $cond);
    }
    //lấy ra bài viết mới đăng
    public function post_index($post)
    {
        $sql = "SELECT * FROM $post order by id_post desc limit 4";
        return $this->db->select($sql);
    }
    // lấy ra số lượng sản phẩm 
    public function quanlity($table_product)
    {
        $sql = "SELECT SUM(quanlity_product) AS total_quantity FROM $table_product";
        return $this->db->select($sql);
    }
}
