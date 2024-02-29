<?php
class sanpham extends DController
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
        $table_product = "tbl_product";
        $table_post = "tbl_category_post";

        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['category_post'] = $categorymodel->categorypost_home($table_post);
        $data['list_product'] = $categorymodel->list_product_home($table_product);

        $this->load->view("header", $data);
        $this->load->view("list_product", $data);
        $this->load->view("footer");
    }
    public function sanphamhot()
    {
        Session::init();
        $table = "tbl_category_product";
        $table_product = "tbl_product";
        $table_post = "tbl_category_post";

        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['category_post'] = $categorymodel->categorypost_home($table_post);
        $data['product_hot'] = $categorymodel->product_hot($table_product);
        // var_dump($data);  

        $this->load->view("header", $data);
        $this->load->view("product_hot", $data);
        $this->load->view("footer");
    }
    public function sanphammoi()
    {
        Session::init();
        $table = "tbl_category_product";
        $table_product = "tbl_product";
        $table_post = "tbl_category_post";

        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['category_post'] = $categorymodel->categorypost_home($table_post);
        $data['product_new'] = $categorymodel->product_new($table_product);
        // var_dump($data);  

        $this->load->view("header", $data);
        $this->load->view("product_new", $data);
        $this->load->view("footer");
    }

    function danhmuc($id)
    {
        Session::init();
        $table = "tbl_category_product";
        $table_product = "tbl_product";
        $table_post = "tbl_category_post";

        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['category_post'] = $categorymodel->categorypost_home($table_post);
        $data['category_by_id'] = $categorymodel->categorybyid_home($table, $table_product, $id);

        $this->load->view("header", $data);
        $this->load->view("categoryproduct", $data);
        $this->load->view("footer");
    }
    function chitietsanpham($id)
    {
        //các bảng 
        Session::init();
        $table = "tbl_category_product";
        $table_product = "tbl_product";
        $table_post = "tbl_category_post";

        //biến cond lưu giá trị truy vấn 
        $cond = "$table_product.id_category_product=$table.id_category_product AND $table_product.id_product='$id'";

        $categorymodel = $this->load->model('categorymodel');
        // dữ liệu được lưu trong biến data có tên là  $data['category'] khi sử dụng chỉ cần gọi ra $+tên trong data
        $data['category'] = $categorymodel->category_home($table);
        $data['category_post'] = $categorymodel->categorypost_home($table_post);
        $data['details_product'] = $categorymodel->details_product_home($table, $table_product, $cond);

        foreach ($data['details_product'] as $key => $cate) {
            $id_cate = $cate['id_category_product'];
        }
        $cond_related = "$table_product.id_category_product=$table.id_category_product AND $table.id_category_product='$id_cate'
            AND $table_product.id_product NOT IN ('$id')";
        $data['related'] = $categorymodel->related_product_home($table, $table_product, $cond_related);

        $this->load->view("header", $data);
        $this->load->view("details_product", $data);
        $this->load->view("footer");
    }
}
