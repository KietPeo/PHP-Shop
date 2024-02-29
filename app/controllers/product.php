<?php 
class product extends DController{
    public function __construct()  {
        parent::__construct();
    }
    public function index() {
        $this->add_category();
    }
    public function add_category() {
        $this->load->view("cpanal/header");
        $this->load->view("cpanal/menu");
        $this->load->view("cpanal/product/add_category");
        $this->load->view("cpanal/footer");
    }
    public function add_product() {
        $this->load->view("cpanal/header");
        $this->load->view("cpanal/menu");
        $table="tbl_category_product";
        $categorymodel=$this->load->model('categorymodel');
        $data['category']=$categorymodel->category($table);

        $this->load->view("cpanal/product/add_product",$data);
        $this->load->view("cpanal/footer");
    }
    public function insert_product() {
        $title=$_POST['title_product'];
        $desc=$_POST['desc_product'];
        $price=$_POST['price_product'];
        $hot=$_POST['product_hot'];
        $quanlity=$_POST['quanlity_product'];
        $image=$_FILES['image_product']['name'];
        $tmp_image=$_FILES['image_product']['tmp_name'];

        $div=explode('.',$image);
        $file_ext=strtolower(end($div));
        $unique_image=$div[0].time().'.'.$file_ext;
        $path_uploads="public/uploads/product/".$unique_image;
        $category=$_POST['category_product'];
        $table="tbl_product";
        $data = array(
            'title_product' => $title,
            'desc_product' => $desc,
            'price_product' => $price,
            'product_hot' => $hot,
            'quanlity_product' => $quanlity,
            'image_product' => $unique_image,
            'id_category_product' => $category
        );
        
        $categorymodel = $this->load->model('categorymodel');
        $result = $categorymodel->insertproduct($table, $data);
        
        if ($result==1) {
            move_uploaded_file($tmp_image,$path_uploads);
            $massage['msg']="Thêm sản phẩm thành công";
            header("Location:".BASE_URL."/product/add_product?msg=".urldecode(serialize($massage)));
        }else{
            $massage['msg']="Thêm sản phẩm thất bại";
            header("Location:".BASE_URL."/product/add_product?msg=".urldecode(serialize($massage)));
        }
    }
    public function insert_category() {
        $title=$_POST['title_category_product'];
        $desc=$_POST['desc_category_product'];
        $table="tbl_category_product";
        $data=array(
            'title_category_product'=>$title,
            'desc_category_product'=>$desc
        );;
        $categorymodel=$this->load->model('categorymodel');
        $resutl=$categorymodel->insertcategory($table,$data);
        if ($resutl==1) {
            $massage['msg']="Thêm danh mục sản phẩm thành công";
            header("Location:".BASE_URL."/product/list_category?msg=".urldecode(serialize($massage)));
        }else{
            $massage['msg']="Thêm danh mục sản phẩm thất bại";
            header("Location:".BASE_URL."/product/list_category?msg=".urldecode(serialize($massage)));
        }
    }
    public function list_product() {
        $this->load->view("cpanal/header");
        $this->load->view("cpanal/menu");

        $table="tbl_product";
        $table_category="tbl_category_product";
        $categorymodel=$this->load->model('categorymodel');
        $data['product']=$categorymodel->product($table,$table_category);

        $this->load->view("cpanal/product/list_product",$data);
        $this->load->view("cpanal/footer");
    
    }
    public function list_category() {
        $this->load->view("cpanal/header");
        $this->load->view("cpanal/menu");

        $table="tbl_category_product";
        $categorymodel=$this->load->model('categorymodel');
        $data['category']=$categorymodel->category($table);


        $this->load->view("cpanal/product/list_category",$data);
        $this->load->view("cpanal/footer");
    
    }
    public function delete_product($id){
        $table="tbl_product";
        $cond="id_product='$id'";
        $categorymodel=$this->load->model('categorymodel');
        $resutl=$categorymodel->deleteproduct($table,$cond);
        if ($resutl==1) {
            $massage['msg']="Xoá sản phẩm thành công";
            header("Location:".BASE_URL."/product/list_product?msg=".urldecode(serialize($massage)));
        }else{
            $massage['msg']="Xoá sản phẩm thất bại";
            header("Location:".BASE_URL."/product/list_product?msg=".urldecode(serialize($massage)));
        }
    }
    public function delete_category($id){
        $table="tbl_category_product";
        $cond="id_category_product='$id'";
        $categorymodel=$this->load->model('categorymodel');
        $resutl=$categorymodel->deletecategory($table,$cond);
        if ($resutl==1) {
            $massage['msg']="Xoá danh mục sản phẩm thành công";
            header("Location:".BASE_URL."/product/list_category?msg=".urldecode(serialize($massage)));
        }else{
            $massage['msg']="Xoá danh mục sản phẩm thất bại";
            header("Location:".BASE_URL."/product/list_category?msg=".urldecode(serialize($massage)));
        }
    }
    public function edit_product($id){
        $table="tbl_product";
        $table_category="tbl_category_product";
        $cond="id_product='$id'";
        $categorymodel=$this->load->model('categorymodel');
        $data['productbyid']=$categorymodel->productbyid($table,$cond);
        $data['category']=$categorymodel->category($table_category);

        $this->load->view("cpanal/header");
        $this->load->view("cpanal/menu");
        $this->load->view("cpanal/product/edit_product",$data);
        $this->load->view("cpanal/footer");
    }
    public function edit_category($id){
        $table="tbl_category_product";
        $cond="id_category_product='$id'";
        $categorymodel=$this->load->model('categorymodel');
        $data['categorybyid']=$categorymodel->categorybyid($table,$cond);

        $this->load->view("cpanal/header");
        $this->load->view("cpanal/menu");
        $this->load->view("cpanal/product/edit_category",$data);
        $this->load->view("cpanal/footer");
    }
    public function update_product($id) {
        $table="tbl_product";
        $cond="tbl_product.id_product='$id'";
        $categorymodel = $this->load->model('categorymodel');

        $title=$_POST['title_product'];
        $desc=$_POST['desc_product'];
        $hot=$_POST['product_hot'];
        $price=$_POST['price_product'];
        $quanlity=$_POST['quanlity_product'];
        $category=$_POST['category_product'];

        $image=$_FILES['image_product']['name'];
        $tmp_image=$_FILES['image_product']['tmp_name'];

        $div=explode('.',$image);
        $file_ext=strtolower(end($div));
        $unique_image=$div[0].time().'.'.$file_ext;
        $path_uploads="public/uploads/product/".$unique_image;

        if ($image) {
            $data['productbyid']=$categorymodel->productbyid($table,$cond);
            foreach ($data['productbyid'] as $key => $value) {
                $path_unlink="public/uploads/product/";
                    unlink($path_unlink.$value['image_product']);
            }
            $data = array(
            'title_product' => $title,
                'desc_product' => $desc,
                'price_product' => $price,
                'product_hot' => $hot,
                'quanlity_product' => $quanlity,
                'image_product' => $unique_image,
                'id_category_product' => $category
            );
            move_uploaded_file($tmp_image,$path_uploads);
        }else{
            $data = array(
                'title_product' => $title,
                'desc_product' => $desc,
                'product_hot' => $hot,
                'price_product' => $price,
                'quanlity_product' => $quanlity,
                'id_category_product' => $category
            );
        }
        
        $result = $categorymodel->updateproduct($table, $data,$cond);
        
        if ($result!==0) {
            $massage['msg']="Cập nhật sản phẩm thành công";
            header("Location:".BASE_URL."/product/list_product?msg=".urldecode(serialize($massage)));
        }else{
            $massage['msg']="Cập nhật sản phẩm thất bại";
            header("Location:".BASE_URL."/product/list_product?msg=".urldecode(serialize($massage)));
        }
    }
    public function update_category_product($id) {
        $table="tbl_category_product";
        $cond="id_category_product='$id'";
        $title=$_POST['title_category_product'];
        $desc=$_POST['desc_category_product'];
        $data=array(
            'title_category_product'=>$title,
            'desc_category_product'=>$desc
        );

        $categorymodel=$this->load->model('categorymodel');
        $resutl=$categorymodel->updatecategory($table, $data,$cond);
        if ($resutl==1) {
            $massage['msg']="Cập nhật danh mục sản phẩm thành công";
            header("Location:".BASE_URL."/product/list_category?msg=".urldecode(serialize($massage)));
        }else{
            $massage['msg']="Cập nhật danh mục sản phẩm thất bại";
            header("Location:".BASE_URL."/product/list_category?msg=".urldecode(serialize($massage)));
        }
    }
    
}

?>