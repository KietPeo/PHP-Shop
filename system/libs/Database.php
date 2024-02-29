<?php 

 class Database extends PDO{

    public function __construct($connect,$user,$pass) {
        parent::__construct($connect,$user,$pass);
    }

    public function select($sql,$data=array(),$fetchStyle=PDO::FETCH_ASSOC) {
        $statement=$this->prepare($sql);

        foreach ($data as $key => $value) {
            $statement->bindParam($key,$value);
        }

        $statement->execute();
        return $statement->fetchAll($fetchStyle);
    }
    public function insert($table,$data=array()) {

        $keys=implode(',',array_keys($data));
        $values=':'.implode(', :',array_keys($data));

        $sql="INSERT INTO $table($keys) VALUES($values)";
        $statement=$this->prepare($sql);
        
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key",$value);
        }

        return $statement->execute();
    }
    public function delete($table,$cond,$limit=1) {
        $sql="DELETE FROM $table WHERE $cond Limit $limit";
        return $this->exec($sql);
    }
    function update($table,$data,$cond) {
        $updateKeys=NULL;

        foreach ($data as $key => $value) {
            $updateKeys.="$key=:$key,"; 
        }

        $updateKeys=rtrim($updateKeys,",");

        $sql="UPDATE $table SET $updateKeys where $cond";
        $statement=$this->prepare($sql);
        $statement->bindValue(":$key",$value);

        foreach ($data as $key => $value) {
            $statement->bindValue(":$key",$value);
        }
        return $statement->execute();
    }
    public function affectedRows($sql,$username,$password) {
        $statement=$this->prepare($sql);
        $statement->execute(array($username,$password));
        return $statement->rowCount();
    }

    public function selectUser($sql,$username,$password){
        $statement=$this->prepare($sql);
        $statement->execute(array($username,$password));
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }
}
?>
