<?php include("includes/header.php"); ?>


<?php if (!$session->is_signed_in()) redirect("login"); ?>

<?php

if (empty($_GET['del'])) {
    redirect("photos");
}



 $photos = Photo::find_by_id($_GET['del']);
// not needed cause photo class has a delete method that gets the id
if ($photos) {
  
    $session->message("photo {$photos->filename} has been deleted successfully");
    $photos->delete_photo();
    redirect("photos");
} else {
    redirect("photos");
}

?>
