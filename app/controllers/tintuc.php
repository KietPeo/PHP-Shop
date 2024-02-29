<?php
class tintuc extends DController
{
    // $load;
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function index()
    {
        $this->danhmuc();
    }
    public function tatca()
    {
        Session::init();

        $table = "tbl_category_product";
        $table_post = "tbl_category_post";
        $post = "tbl_post";
        //sử dụng cho categorymodel 
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['category_post'] = $categorymodel->categorypost_home($table_post);
        //sử dụng cho postmodel
        $postmodel = $this->load->model('postmodel');
        $data['list_post'] = $postmodel->list_post_home($post);
        $this->load->view("header", $data);
        $this->load->view("list_post", $data);
        $this->load->view("footer");
    }
    public function danhmuc($id)
    {
        Session::init();

        $table = "tbl_category_product";
        $table_post = "tbl_category_post";
        $post = "tbl_post";
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['category_post'] = $categorymodel->categorypost_home($table_post);
        $data['postbyid'] = $categorymodel->postbyid_home($table_post, $post, $id);

        $this->load->view("header", $data);
        $this->load->view("categorypost", $data);
        $this->load->view("footer");
    }
    function chitiettin($id)
    {
        $table = "tbl_category_product";
        $table_post = "tbl_category_post";
        $post = "tbl_post";
        $cond = "$table_post.id_category_post=$post.id_category_post AND $post.id_post='$id'";
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['category_post'] = $categorymodel->categorypost_home($table_post);
        $data['postbyid'] = $categorymodel->postbyid_home($table_post, $post, $id);
        $data['details_post'] = $categorymodel->details_post_home($table_post, $post, $cond);

        foreach ($data['details_post'] as $key => $cate) {
            $id_cate = $cate['id_category_post'];
        }
        $cond_related = "$table_post.id_category_post=$post.id_category_post AND $post.id_category_post='$id_cate'
        AND $post.id_post NOT IN ('$id')";
        $data['related'] = $categorymodel->related_post_home($post, $table_post, $cond_related);


        $this->load->view("header", $data);
        // $this->load->view("slider");
        $this->load->view("details_post", $data);
        $this->load->view("footer");
    }
}
