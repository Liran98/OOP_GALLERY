<?php

$db['db_host'] = 'localhost:8889';
$db['db_user'] = 'root';
$db['db_pass'] = 'root';
$db['db_name'] = 'photo_gallery';


foreach($db as $key => $value){
 define(strtoupper($key),$value);
}

//db 
?>