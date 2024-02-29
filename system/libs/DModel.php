<?php 

 class DModel  {
    protected $db=array();
    public function __construct() {
        $connect='mysql:dbname=project;host:localhost;charset=utf-';
        $user="root";
        $pass="";
        $this->db=new Database($connect,$user,$pass);
    }
}
?>
