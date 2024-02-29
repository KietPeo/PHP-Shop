<?php
class giohang extends DController
{
    // $load;
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function index()
    {
        $this->giohang();
    }
    public function giohang()
    {
        Session::init();
        $table = "tbl_category_product";
        $post = "tbl_post";
        $table_post = "tbl_category_post";

        $categorymodel = $this->load->model('categorymodel');
        
        $data['category'] = $categorymodel->category_home($table);
        $data['category_post'] = $categorymodel->categorypost_home($table_post);
        $data['post_index'] = $categorymodel->post_index($post);

        $this->load->view("header", $data);
        $this->load->view("cart");
        $this->load->view("footer");
    }
    public function themgiohang()
    {
        Session::init();

        if (isset($_SESSION['shopping_cart'])) {
            $aviable = 0;
            foreach ($_SESSION['shopping_cart'] as $key => $value) {
                if ($_SESSION['shopping_cart'][$key]['product_id'] == $_POST['product_id']) {
                    $aviable++;
                    $_SESSION['shopping_cart'][$key]['product_quanlity'] = $_SESSION['shopping_cart'][$key]['product_quanlity'] + 
                    $_POST['product_quanlity'];
                }
            }
            if ($aviable == 0) {
                $item = array(
                    'product_id' => $_POST['product_id'],
                    'product_title' => $_POST['product_title'],
                    'product_image' => $_POST['product_image'],
                    'product_price' => $_POST['product_price'],
                    'product_quanlity' => $_POST['product_quanlity']
                );
                $_SESSION['shopping_cart'][] = $item;
            }
        } else {
            $item = array(
                'product_id' => $_POST['product_id'],
                'product_title' => $_POST['product_title'],
                'product_image' => $_POST['product_image'],
                'product_price' => $_POST['product_price'],
                'product_quanlity' => $_POST['product_quanlity']
            );
            $_SESSION['shopping_cart'][] = $item;
        }
        header("Location:" . BASE_URL . '/giohang');
    }
    public function updategiohang()
    {
        Session::init();
        if (isset($_POST['delete_cart'])) {
            if (isset($_SESSION["shopping_cart"])) {
                foreach ($_SESSION["shopping_cart"] as $key => $values) {
                    if ($_SESSION["shopping_cart"][$key]['product_id'] == $_POST['delete_cart']) {
                        unset($_SESSION["shopping_cart"][$key]);
                    }
                }
                header("Location:" . BASE_URL . '/giohang');
            } else {
                header("Location:" . BASE_URL);
            }
        } else {
            foreach ($_POST['qty'] as $key => $qty) {
                foreach ($_SESSION["shopping_cart"] as $session => $values) {
                    if ($values['product_id'] == $key && $qty >= 1) {
                        $_SESSION["shopping_cart"][$session]['product_quanlity'] = $qty;
                    } else if ($values['product_id'] == $key && $qty <= 0) {
                        unset($_SESSION["shopping_cart"][$session]);
                    }
                }
            }
            header("Location:" . BASE_URL . '/giohang');
        }
    }
    public function dathang()
    {
        Session::init();
        $table_order = 'tbl_order';
        $table_order_details = 'tbl_order_details';
        $ordermodel = $this->load->model("ordermodel");

        $name = $_POST['name'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $noidung = $_POST['noidung'];
        $diachi = $_POST['diachi'];
        $order_code = rand(0, 1000);

        date_default_timezone_set('asia/ho_chi_minh');
        $date = date('d/m/Y');
        $hour = date('h:i:sa');
        $order_date = $date . $hour;
        $data_order = array(
            'order_status' => 0,
            'order_code' => $order_code,
            'order_date' => $date . " " . $hour,
        );
        $result_order = $ordermodel->insert_order($table_order, $data_order);

        if (Session::get('shopping_cart') == true) {
            foreach (Session::get('shopping_cart') as $key => $value) {
                var_dump(Session::get('shopping_cart'));
                $data_details = array(
                    'order_code' => $order_code,
                    'product_id' => $value['product_id'],
                    'product_quanlity' => $value['product_quanlity'],
                    'name' => $name,
                    'email' => $email,
                    'sdt' => $sdt,
                    'noidung' => $noidung,
                    'diachi' => $diachi,
                );
                $result_order_details = $ordermodel->insert_order_details($table_order_details, $data_details);
            }
            unset($_SESSION['shopping_cart']);
        }
        header('Location:' . BASE_URL . '/giohang');
    }
}
