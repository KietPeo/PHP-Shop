<?php
class post extends DController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->add_category();
    }
    public function add_category()
    {
        Session::init();

        $this->load->view("cpanal/header");
        $this->load->view("cpanal/menu");
        $this->load->view("cpanal/post/add_category");
        $this->load->view("cpanal/footer");
    }
    public function insert_category()
    {
        Session::init();

        $title = $_POST['title_category_post'];
        $desc = $_POST['desc_category_post'];
        $table = "tbl_category_post";
        $data = array(
            'title_category_post' => $title,
            'desc_category_post' => $desc
        );;
        $categorymodel = $this->load->model('categorymodel');
        $resutl = $categorymodel->insertcategory_post($table, $data);
        if ($resutl == 1) {
            $massage['msg'] = "Thêm danh mục bài viết thành công";
            header("Location:" . BASE_URL . "/post/list_category?msg=" . urldecode(serialize($massage)));
        } else {
            $massage['msg'] = "Thêm danh mục bài viết thất bại";
            header("Location:" . BASE_URL . "/post/list_category?msg=" . urldecode(serialize($massage)));
        }
    }
    public function list_category()
    {
        Session::init();

        $this->load->view("cpanal/header");
        $this->load->view("cpanal/menu");
        $table = "tbl_category_post";
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->post_category($table);
        $this->load->view("cpanal/post/list_category", $data);
        $this->load->view("cpanal/footer");
    }
    public function delete_category($id)
    {
        Session::init();

        $table = "tbl_category_post";
        $cond = "id_category_post='$id'";
        $categorymodel = $this->load->model('categorymodel');
        $resutl = $categorymodel->deletecategory_post($table, $cond);
        if ($resutl == 1) {
            $massage['msg'] = "Xoá danh mục bài viết thành công";
            header("Location:" . BASE_URL . "/post/list_category?msg=" . urldecode(serialize($massage)));
        } else {
            $massage['msg'] = "Xoá danh mục bài viết thất bại";
            header("Location:" . BASE_URL . "/post/list_category?msg=" . urldecode(serialize($massage)));
        }
    }
    public function edit_category($id)
    {
        Session::init();

        $table = "tbl_category_post";
        $cond = "id_category_post='$id'";
        $categorymodel = $this->load->model('categorymodel');
        $data['categorybyid'] = $categorymodel->categorybyid_post($table, $cond);

        $this->load->view("cpanal/header");
        $this->load->view("cpanal/menu");
        $this->load->view("cpanal/post/edit_category", $data);
        $this->load->view("cpanal/footer");
    }
    public function update_category($id)
    {
        Session::init();

        $table = "tbl_category_post";
        $cond = "id_category_post='$id'";
        $title = $_POST['title_category_post'];
        $desc = $_POST['desc_category_post'];
        $data = array(
            'title_category_post' => $title,
            'desc_category_post' => $desc
        );

        $categorymodel = $this->load->model('categorymodel');
        $resutl = $categorymodel->updatecategory_post($table, $data, $cond);
        if ($resutl == 1) {
            $massage['msg'] = "Cập nhật danh mục bài viết thành công";
            header("Location:" . BASE_URL . "/post/list_category?msg=" . urldecode(serialize($massage)));
        } else {
            $massage['msg'] = "Cập nhật danh mục bài viết thất bại";
            header("Location:" . BASE_URL . "/post/list_category?msg=" . urldecode(serialize($massage)));
        }
    }
    public function add_post()
    {
        Session::init();

        $this->load->view("cpanal/header");
        $this->load->view("cpanal/menu");

        $table = "tbl_category_post";
        $postmodel = $this->load->model('postmodel');
        $data['category'] = $postmodel->category_post($table);

        $this->load->view("cpanal/post/add_post", $data);
        $this->load->view("cpanal/footer");
    }
    public function insert_post()
    {
        Session::init();

        $title = $_POST['title_post'];
        $content = $_POST['content_post'];
        $image = $_FILES['image_post']['name'];
        $tmp_image = $_FILES['image_post']['tmp_name'];

        $div = explode('.', $image);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0] . time() . '.' . $file_ext;
        $path_uploads = "public/uploads/post/" . $unique_image;
        $category = $_POST['category_post'];
        $table = "tbl_post";
        $data = array(
            'title_post' => $title,
            'content_post' => $content,
            'image_post' => $unique_image,
            'id_category_post' => $category
        );

        $postmodel = $this->load->model('postmodel');
        $result = $postmodel->insertpost($table, $data);

        if ($result == 1) {
            move_uploaded_file($tmp_image, $path_uploads);
            $massage['msg'] = "Thêm bài viết thành công";
            header("Location:" . BASE_URL . "/post/list_post?msg=" . urldecode(serialize($massage)));
        } else {
            $massage['msg'] = "Thêm bài viết thất bại";
            header("Location:" . BASE_URL . "/post/list_post?msg=" . urldecode(serialize($massage)));
        }
    }
    public function list_post()
    {
        Session::init();

        $this->load->view("cpanal/header");
        $this->load->view("cpanal/menu");
        $table_post = "tbl_post";
        $table_category = "tbl_category_post";

        $postmodel = $this->load->model('postmodel');
        $data['post'] = $postmodel->post($table_post, $table_category);

        $this->load->view("cpanal/post/list_post", $data);
        $this->load->view("cpanal/footer");
    }
    public function delete_post($id)
    {
        Session::init();

        $table_post = "tbl_post";
        $cond = "id_post='$id'";
        $postmodel = $this->load->model('postmodel');
        $resutl = $postmodel->deletepost($table_post, $cond);
        if ($resutl == 1) {
            $massage['msg'] = "Xoá bài viết thành công";
            header("Location:" . BASE_URL . "/post/list_post?msg=" . urldecode(serialize($massage)));
        } else {
            $massage['msg'] = "Xoá bài viết thất bại";
            header("Location:" . BASE_URL . "/post/list_post?msg=" . urldecode(serialize($massage)));
        }
    }
    public function edit_post($id)
    {
        Session::init();

        $table = "tbl_category_post";
        $table_post = "tbl_post";
        $cond = "id_post='$id'";
        $postmodel = $this->load->model('postmodel');
        $data['category'] = $postmodel->category_post($table);
        $data['postbyid'] = $postmodel->postbyid($table_post, $cond);

        $this->load->view("cpanal/header");
        $this->load->view("cpanal/menu");
        $this->load->view("cpanal/post/edit_post", $data);
        $this->load->view("cpanal/footer");
    }
    public function update_post($id)
    {
        Session::init();

        $table = "tbl_post";
        $cond = "id_post='$id'";
        $postmodel = $this->load->model('postmodel');

        $title = $_POST['title_post'];
        $content = $_POST['content_post'];
        $category = $_POST['category_post'];
        $image = $_FILES['image_post']['name'];

        $tmp_image = $_FILES['image_post']['tmp_name'];
        $div = explode('.', $image);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0] . time() . '.' . $file_ext;
        $path_uploads = "public/uploads/post/" . $unique_image;

        if ($image) {
            $data['postbyid'] = $postmodel->postbyid($table, $cond);
            foreach ($data['postbyid'] as $key => $value) {
                $path_unlink = "public/uploads/post/";
                unlink($path_unlink . $value['image_post']);
            }
            $data = array(
                'title_post' => $title,
                'content_post' => $content,
                'image_post' => $unique_image,
                'id_category_post' => $category
            );
            move_uploaded_file($tmp_image, $path_uploads);
        } else {
            $data = array(
                'title_post' => $title,
                'content_post' => $content,
                'id_category_post' => $category
            );
        }
        $result = $postmodel->updatepost($table, $data, $cond);

        if ($result == 1) {
            $massage['msg'] = "Cập nhật bài viết thành công";
            header("Location:" . BASE_URL . "/post/list_post?msg=" . urldecode(serialize($massage)));
        } else {
            $massage['msg'] = "Cập nhật bài viết thất bại";
            header("Location:" . BASE_URL . "/post/list_post?msg=" . urldecode(serialize($massage)));
        }
    }
}
