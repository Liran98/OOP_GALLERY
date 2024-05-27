<?php include("includes/header.php"); ?>


<?php if (!$session->is_signed_in()) redirect("login"); ?>

<?php

if (empty($_GET['del'])) {
    redirect("photos");
}



 $photos = Photo::find_by_id("photo_id", $_GET['del']);
// not needed cause photo class has a delete method that gets the photo_id
if ($photos) {
    $photos->delete_pic($_GET['del']);
    redirect("photos");
} else {
    redirect("photos");
}

?>
