<?php require_once("init.php"); ?>

<?php

$user = new User();
// $photo = new Photo();

if (isset($_POST['image_name']) && isset($_POST['user_id'])) {

    $user->ajax_save_user_image($_POST['image_name'], $_POST['user_id']);
}


if (isset($_POST['picid'])) {
  
Photo::display_sidebar_data($_POST['picid']); 
}



?>