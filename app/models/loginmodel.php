<?php
class loginmodel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }
    public function login($table, $username, $password)
    {
        $sql = "SELECT * FROM $table  where username=? AND password=?";
        return $this->db->affectedRows($sql, $username, $password);
    }
    public function getLogin($table_customer, $username, $password)
    {
        $sql = "SELECT * FROM $table_customer where username=? AND password=?";
        return $this->db->selectUser($sql, $username, $password);
    }
}
