<?php include("includes/header.php"); ?>


<?php if (!$session->is_signed_in()) redirect("login"); ?>

<?php

if (empty($_GET['del'])) {
    redirect("users");
}

$users = User::find_by_id($_GET['del']);
// not needed cause photo class has a delete method that gets the id
if ($users) {
    $users->delete_photo_user();
    $session->message("user {$users->username} has been deleted successfully");
    redirect("users");
} else {
    redirect("users");
}

?>
