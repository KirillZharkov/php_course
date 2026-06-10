<?php
class Database{
    private $db_conn;
    private $db_error = null;

    public function __construct($host, $username, $password, $dbname){
      $this->db_conn = mysqli_connect($host, $username, $password, $dbname);
        if (!$this->db_conn) {
            $this->db_error = mysqli_connect_error(); 
        }
      //  echo "Успешное подключение к базе данных!";
    }

    public function executeQuery($sql){
        return mysqli_query($this->db_conn, $sql);
    }

    public function getDbError(){
        return $this->db_error;
    }

    public function getIdError(){
        return mysqli_insert_id($this->db_conn);
    }

    public function getConnection(){
    return $this->db_conn;
}
}
?>