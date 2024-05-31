<?php include("includes/header.php"); ?>


<?php if (!$session->is_signed_in()) redirect("login"); ?>

<?php

if (empty($_GET['comment_id'])) {
    redirect("comments");
}

$comments = Comment::find_by_id($_GET['comment_id']);
// not needed cause photo class has a delete method that gets the id
if ($comments) {
    $comments->delete();
    redirect("photo_comment") . '?photo_id='. $comments->photo_id;
} else {
    redirect("photo_comment");
}

?>
