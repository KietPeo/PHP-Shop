<?php
class user extends DController

{
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\SMTP;
    // $load;
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function index()
    {

        $this->user();
    }
    public function user()
    {
    }

    public function insert_user()
    {
        Session::init();
        $name = $_POST['txtHoTen'];
        $email = $_POST['txtEmail'];
        $phone = $_POST['txtDienThoai'];
        if (!ctype_digit($phone)) {
            $massage['msg'] = "Số điện thoại không được chứa chữ";
            // Thực hiện xử lý hoặc trả về lỗi tùy thuộc vào yêu cầu của bạn
        }
        $adress = $_POST['txtDiaChi'];
        $password = $_POST['password'];
        $password2 = $_POST['passwordConfirm'];

        $table = "tbl_custumer";
        if ($password == $password2) {
            $data = array(
                'custumer_name' => $name,
                'custumer_email' => $email,
                'custumer_phone' => $phone,
                'custumer_address' => $adress,
                'custumer_password' => md5($password)
            );
            $customermodel = $this->load->model('customermodel');
            $result = $customermodel->insertcustomer($table, $data);

            if ($result == 1) {
                $massage['msg'] = "Đăng kí thành công";
                header("Location:" . BASE_URL . "/user/dangnhap?msg=" . urldecode(serialize($massage)));
            } else {
                $massage['msg'] = "Đăng kí thất bại";
                header("Location:" . BASE_URL . "/user/dangnhap?msg=" . urldecode(serialize($massage)));
            }
        } else {
            $massage['msg'] = "Mật khẩu không trùng";
            header("Location:" . BASE_URL . "/user/dangnhap?msg=" . urldecode(serialize($massage)));
        }
    }
    public function login()
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $table_customer = 'tbl_custumer';
        $customermodel = $this->load->model('customermodel');
        $count = $customermodel->login($table_customer, $username, $password);

        if ($count == 0) {
            $massage['msg'] = "Mật khẩu sai";
            // echo '<script> alert("sai mật khẩu"); </script>';
            // Redirect to login page with a message
            header("Location: " . BASE_URL . "/user/dangnhap?msg=" . urlencode(serialize($massage)));
            exit();
        } else {
            $result = $customermodel->getLogin($table_customer, $username, $password);
            Session::init();
            Session::set('customer', true);
            Session::set("custumer_name", $result[0]['custumer_name']);
            Session::set("custumer_id", $result[0]['custumer_id']);
            Session::set("custumer_phone", $result[0]['custumer_phone']);
            Session::set("custumer_email", $result[0]['custumer_email']);
            Session::set("custumer_address", $result[0]['custumer_address']);
            $massage['msg'] = 'Đăng nhập thành công';
            Session::set("login_success_msg", $massage['msg']);
            header("Location: " . BASE_URL);
            exit();
        }
    }
    public function update_info()
    {
        Session::init();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Bắt dữ liệu từ form
            $update_name = $_POST['update_name'];
            $update_phone = $_POST['update_phone'];
            $update_email = $_POST['update_email'];
            $update_address = $_POST['update_address'];

            // Kiểm tra và xử lý dữ liệu nếu cần thiết

            // Gọi model để cập nhật thông tin trong cơ sở dữ liệu
            $customermodel = $this->load->model('customermodel');

            // Truyền dữ liệu cần cập nhật vào model
            $data = array(
                'update_name' => $update_name,
                'update_phone' => $update_phone,
                'update_email' => $update_email,
                'update_address' => $update_address
            );

            // Gọi phương thức để cập nhật thông tin khách hàng trong cơ sở dữ liệu
            $customermodel->update_customer($_SESSION['custumer_id'], $data);


            // Redirect sau khi cập nhật thành công
            header("Location: " . BASE_URL . "/user/profile");
            exit();
        }
    }

    public function dangxuat()
    {
        Session::init();
        Session::destroy();
        $massage['msg'] = 'Đăng xuất thành công';
        header("Location:" . BASE_URL . "/user/dangnhap?msg=" . urldecode(serialize($massage)));
        exit();
    }

    public function forgetpass()
    {
        $table = "tbl_category_product";
        $table_post = "tbl_category_post";
        $post = "tbl_post";

        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['category_post'] = $categorymodel->categorypost_home($table_post);
        $data['post_index'] = $categorymodel->post_index($post);
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $table_post = "tbl_category_post";

        $this->load->view("header", $data);
        $this->load->view("forgetpass");
        $this->load->view("footer");
    }
    public function change()
    {
        Session::init();
        $a = $_POST['selected_option'];
        $table = "tbl_category_product";
        $table_post = "tbl_category_post";
        $post = "tbl_post";

        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['category_post'] = $categorymodel->categorypost_home($table_post);
        $data['post_index'] = $categorymodel->post_index($post);
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $table_post = "tbl_category_post";

        $this->load->view("header", $data);
        switch ($a) {
            case '0':
                $this->load->view("profile");
                break;
            case '1':
                $this->load->view("forgetpass");
                break;
            default:
                break;
        }
        $this->load->view("footer");
    }

    public function profile()
    {
        Session::init();
        $table = "tbl_category_product";
        $table_post = "tbl_category_post";
        $post = "tbl_post";

        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['category_post'] = $categorymodel->categorypost_home($table_post);
        $data['post_index'] = $categorymodel->post_index($post);
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $table_post = "tbl_category_post";

        $this->load->view("header", $data);
        $this->load->view("resetpass");
        $this->load->view("footer");
    }

    public function sendmail()
    {
        session_start();
        $table = "tbl_category_product";
        $table_post = "tbl_category_post";
        $post = "tbl_post";

        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['category_post'] = $categorymodel->categorypost_home($table_post);
        $data['post_index'] = $categorymodel->post_index($post);
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $table_post = "tbl_category_post";

        include_once "app/models/class.smtp.php";
        include_once "app/models/class.phpmailer.php";

        if (isset($_POST['submit_email'])) {
            $table = "tbl_custumer";
            $email = $_POST['email'];
            $customermodel = $this->load->model('customermodel');
            $isExist = $customermodel->checkemail($table, $email);
            if ($isExist) {
                $code = random_int(1000, 100000);
                $_SESSION['code'] = $code;
                $_SESSION['email'] = $email;
                $mail = new PHPMailer();
                $mail->CharSet = "utf-8";
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->Username = "giakiet233@gmail.com";
                $mail->Password = "ghmr xugn ygya xdcu";
                $mail->SMTPSecure = "tls";
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 587;
                $mail->From = 'giakiet233@gmail.com';
                $mail->FromName = 'Kiet';
                $mail->addAddress($email, 'reciever_name');
                $mail->Subject = 'Reset Password';
                $mail->isHTML(true);
                $mail->Body = "Cấp lại mã code $code...";
            } else {
                echo '<script> alert("Email của bạn chưa đăng kí tài khoản"); </script>';
                $this->load->view("header", $data);
                $this->load->view("forgetpass");
                $this->load->view("footer");
            }
            if ($mail->send()) {
                echo '<script> alert("Hãy kiểm tra lại mail của bạn"); </script>';
                $this->load->view("header", $data);
                $this->load->view("checkcode");
                $this->load->view("footer");
            } else {
                echo "Mail Error" . $mail->ErrorInfo;
            }
        } else if (isset($_POST['submit_code'])) {
            if (isset($_SESSION['code']) && $_SESSION['code'] == $_POST['code']) {
                $this->load->view("header", $data);
                $this->load->view("resetpas");
                $this->load->view("footer");
            } else {
                echo '<script> alert("Không đúng mã code"); </script>';
                $this->load->view("header", $data);
                $this->load->view("checkcode");
                $this->load->view("footer");
            }
        } else {
            $table = "tbl_custumer";
            $email = $_SESSION['email'];
            $pass1 = $_POST['pasnew1'];
            $pass2 = $_POST['pasnew2'];

            if (!empty($pass1) && !empty($pass2)) {
                if ($pass1 == $pass2) {
                    $hashed_password = md5($pass1);
                    $customermodel = $this->load->model('customermodel');
                    $success = $customermodel->updatePasswordByEmail($table, $email, $hashed_password);

                    if ($success) {
                        echo "Đã Đổi mật khẩu thành công";
                    } else {
                        echo "Có lỗi xảy ra khi cập nhật mật khẩu";
                    }
                } else {
                    echo "Mật khẩu không khớp";
                }
            } else {
                echo "Vui lòng điền vào cả hai trường mật khẩu";
            }
            // $this->load->view("header", $data);
            // $this->load->view("customer_login");
            // $this->load->view("footer");
        }
    }

    public function dangnhap()
    {

        Session::init();

        $table = "tbl_category_product";
        $table_post = "tbl_category_post";
        $post = "tbl_post";

        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['category_post'] = $categorymodel->categorypost_home($table_post);
        $data['post_index'] = $categorymodel->post_index($post);
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $table_post = "tbl_category_post";

        $this->load->view("header", $data);
        $this->load->view("customer_login");
        $this->load->view("footer");
    }
}
