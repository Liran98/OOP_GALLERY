<?php

//spl_autoload_register
function classAutoloader($class)
{

    $class = strtolower($class);

    $the_path = 'includes/'.$class.'.php';

    // if (file_exists($the_path)) {

    //     require_once($the_path);

    // }else{
    //     die("file not found");
    // }

    if(is_file($the_path) && !class_exists($class)){
        include $the_path;
    }
}
spl_autoload_register('classAutoloader');



function relocate($redirect){

return header("Location :" .strtolower($redirect). '.php');
}

