<?php include("includes/header.php"); ?>


<?php if (!$session->is_signed_in()) redirect("login"); ?>

<?php

if (empty($_GET['del'])) {
    redirect("comments");
}

$comments = Comment::find_by_id($_GET['del']);
// not needed cause photo class has a delete method that gets the id
if ($comments) {
    $comments->delete();
    $session->message("the comment {$comments->id} has been deleted successfully");
    redirect("comments");
} else {
    redirect("comments");
}

?>
