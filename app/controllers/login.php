<?php
class login extends DController
{
    // $load;
    public function __construct()
    {
        $data = array();
        $mesage = array();
        parent::__construct();
    }
    public function index()
    {
        $this->login();
    }
    public function login()
    {
        // $this->load->view("header");
        Session::init();
        if (Session::get('login') == true) {
            header("Location:" . BASE_URL . '/login/dashboard');
        }
        $this->load->view("cpanal/login");
        // $this->load->view("footer");
    }
    public function dashboard()
    {
        Session::checkSession();
        $this->load->view("cpanal/header");
        $this->load->view("cpanal/menu");
        $this->load->view("cpanal/dashboard");
        $this->load->view("cpanal/footer");
    }
    public function authentication_login()
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $table_admin = 'tbl_admin';
        $loginmodel = $this->load->model('loginmodel');
        $count = $loginmodel->login($table_admin, $username, $password);

        if ($count == 0) {
            $mesage['msg'] = 'sai mật khẩu';
            header("Location:" . BASE_URL . '/login');
        } else {
            $result = $loginmodel->getLogin($table_admin, $username, $password);
            // echo $result[0]['username'];
            // echo $result[0]['password'];
            Session::init();
            Session::set('login', true);
            Session::set("username", $result[0]['username']);
            Session::set("userid", $result[0]['admin_id']);

            header("Location:" . BASE_URL . '/login/dashboard');
        }
    }
    public function logout()
    {
        Session::init();
        // Session::destroy();
        unset($_SESSION['login']);
        header("Location:" . BASE_URL . '/login');
    }
    public function forgotpas()
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $table_admin = 'tbl_admin';
        $loginmodel = $this->load->model('loginmodel');
        $count = $loginmodel->login($table_admin, $username, $password);

        if ($count == 0) {
            $mesage['msg'] = 'sai mật khẩu';
            header("Location:" . BASE_URL . '/login');
        } else {
            $result = $loginmodel->getLogin($table_admin, $username, $password);
            Session::init();
            Session::set('login', true);
            Session::set("username", $result[0]['username']);
            Session::set("userid", $result[0]['admin_id']);

            header("Location:" . BASE_URL . '/login/dashboard');
        }
    }
}
