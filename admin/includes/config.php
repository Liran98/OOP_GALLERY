<?php

$db['db_host'] = 'localhost:8889';
$db['db_user'] = 'root';
$db['db_pass'] = 'root';
$db['db_name'] = 'photo_gallery';


foreach($db as $key => $value){
 define(strtoupper($key),$value);
}

$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if(!$conn){
    echo "Error connecting";
}

?>