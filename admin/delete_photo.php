<?php include("includes/header.php"); ?>


<?php if (!$session->is_signed_in()) redirect("login"); ?>

<?php

if (empty($_GET['del'])) {
    redirect("photos");
}



$photos = Photo::find_by_id($_GET['del']);

if ($photos) {
    $photos->delete_pic($_GET['del']);
} else {
    redirect("photos");
}

?>
