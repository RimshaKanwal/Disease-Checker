<?php
class database{
    private $connString;
    private $user;
    private $pass;
    private $pdo;

    public function __construct($connString="mysql:host=localhost;dbname=projectdisease",$user="root",$pass=""){
        $this->pdo=new PDO($connString,$user,$pass);   
    }

    public function insertdata($sql)
    {
        if($this->pdo->exec($sql)){
            $error=$this->pdo->errorinfo();
//            echo"something went wrong with database".$error[2];
        }
    }
    public function fetchdata($sql)
    {
        $result=$this->pdo->query($sql);
        if(!$result){
            $error=$this->pdo->errorindo();
            echo "something wrong with database".$error[2];
        }
        return $result;
    }
    public function updatedata($sql){
        if(!$this->pdo->exec($sql)){
            $error=$this->pdo->errorindo();
            echo "something wrong with database".$error[2];
        }
        else{
            echo "<script type='text/javascript'>";
            echo "alert('Record Updated successfully');";
            echo "</script>";
        }
    }

    public function deletedata($sql){
        if(!$this->pdo->exec($sql)){
            $error=$this->pdo->errorindo();
            echo "something wrong with database".$error[2];
        }
        else{
            echo "<script type='text/javascript'>";
            echo "alert(' Record Deleted successfully');";
            echo "</script>";
        }
    }
}
?>