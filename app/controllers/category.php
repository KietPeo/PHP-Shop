<?php 
class category extends DController{
    public function __construct()  {
            $message=array();
            $data=array();
        parent::__construct();
    }
    public function list_category() {
        $this->load->view('header');
        $categorymodel=$this->load->model('categorymodel');
        $table_category_product="tbl_category_product";
        $data['category']=$categorymodel->category($table_category_product);
        $this->load->view('category',$data);
        $this->load->view('footer');
       }
       public function catebyid() {
          $this->load->view('header');
          $categorymodel=$this->load->model('categorymodel');
          $id=4;
          $table_category_product="tbl_category_product";
          $data['categorybyid']=$categorymodel->categorybyid($table_category_product,$id);
          $this->load->view('categorybyid',$data);
          $this->load->view('footer');
       }
       public function addcategory() {
        $this->load->view('addcategory');
        
       }
       public function insertcategory() {
        $categorymodel = $this->load->model("categorymodel");
        $table_category_product = "tbl_category_product";
        if (isset($_POST['title'], $_POST['description'])) {
            $title = $_POST['title'];
            $desc = $_POST['description'];
    
            $data = array(
                "title_category_product" => $title,
                "desc_category_product" => $desc,
            );
            $result=$categorymodel->insertcategory($table_category_product, $data);
            if($result){
                $message['msg']="Thêm dữ liệu thành công";
            }else{
                $message['msg']="Thêm dữ liệu thất bại";
            }
            $this->load->view('addcategory',$message);
        }
    }
    public function updatecategory() {
        $categorymodel = $this->load->model("categorymodel");
        $table_category_product = "tbl_category_product";
            // $title = $_POST['title'];
            // $desc = $_POST['description'];
            $id=3;
            $cond="tbl_category_product.id_category_product='$id'";
            $data = array(
                "title_category_product" => 'macbook',
                "desc_category_product" => 'macbook tot'
            );
            $result=$categorymodel->updatecategory($table_category_product, $data,$cond);
            if($result==1){
                echo "cập nhật dữ liệu thành công";
            }else{
                echo "cập nhật dữ liệu thất bại";
            }
    }
    public function deletecategory() {
        $categorymodel = $this->load->model("categorymodel");
        $table_category_product = "tbl_category_product";
            $id=1;
            $cond="tbl_category_product.id_category_product='$id'";
            $result=$categorymodel->deletecategory($table_category_product,$cond);
            if($result==1){
                echo "Xoá dữ liệu thành công";
            }else{
                echo "Xoá dữ liệu thất bại";
            }
    }
    
}

?>