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
        $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
       
    }
}

$database = new Database();