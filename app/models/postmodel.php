<?php
class postmodel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }
    // function product
    public function category_post($table)
    {
        $sql = "SELECT * FROM $table order by id_category_post desc";
        return $this->db->select($sql);
    }
    //hàm thêm bài viết 
    function insertpost($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    public function post($table_post, $table_category)
    {
        $sql = "SELECT * FROM $table_post ,$table_category 
            where $table_post.id_category_post=$table_category.id_category_post 
            order by $table_post.id_post desc";
        return $this->db->select($sql);
    }

    public function postbyid($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
    }

    //hàm cập nhật9bài viết 
    public function updatepost($table, $data, $cond)
    {
        return $this->db->update($table, $data, $cond);
    }

    //hàm xoá bài viết 
    public function deletepost($table, $cond)
    {
        return $this->db->delete($table, $cond);
    }

    //hàm truy vấn lấy tất cả sản phẩm
    public function list_post_home($post)
    {
        $sql = "SELECT * FROM $post order by $post.id_post desc ";
        return $this->db->select($sql);
    }
}
