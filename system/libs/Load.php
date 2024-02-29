<?php
    class Load{
        function __construct() {
        }
        public function view($fileName,$data=false)  {
            if($data==true){
               extract($data);
            }
            include_once 'app/views/'.$fileName.'.php';
        }
        public function model($fileName)  {
            include_once 'app/models/'.$fileName.'.php';
            return new $fileName(); 
        }
    }
?>