<?php

require_once("new_config.php");
class Database
{
    public $conn;

    function __construct()
    {
        $this->open_db_connection();
    }
    //new comment

    public function open_db_connection()
    {
        // $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        //same as mysqli_errno($this->conn);
        if($this->conn->connect_errno){
            die($this->conn->connect_error);
        }
    }

    public function query($sql)
    {
        // $results = mysqli_query($this->conn, $sql);
        $results = $this->conn->query($sql);

        $this->confirm_query($results);
        return $results;
    }

    private function confirm_query($result)
    {
        if (!$result) {
            die(mysqli_error($this->conn->error));
        }
    }

    public function escape_string($string)
    {
        // $escaped_string =  mysqli_real_escape_string($this->conn, $string);
        $escaped_string = $this->conn->real_escape_string($string);
        return $escaped_string;
    }

    public function the_insert_id(){
        // return mysqli_insert_id($this->conn);
        return $this->conn->insert_id;
    }
}//end of class 

$database = new Database();
