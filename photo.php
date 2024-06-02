<?php include("includes/header.php"); ?>

<?php

$message = "";



if (isset($_GET['photo_id'])) {
    $photo = Photo::find_by_id($_GET['photo_id']);
}


// echo $photo->title;

if (isset($_POST['add_comment'])) {


    $author = trim($_POST['author']);
    $body = trim($_POST['body']);

    $new_comment = Comment::create_comment($photo->id, $author, $body);

    if ($new_comment &&   $new_comment->save()) {
        redirect("photo");
        //  . "?photo_id=" . $photo->id;
    } else {
        $message = "There was some problem saving the comment";
    }
} else {
    $author = "";
    $body = "";
}


?>


<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-12 row">

            <!-- Blog Post -->

            <!-- Title -->
            <h1><?php echo $photo->title; ?></h1>

            <!-- Author -->
            <p class="lead">
                by <a href="#">Start Bootstrap</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-responsive" src="admin/<?php echo $photo->picture_path();  ?>" alt="">

            <hr>

            <!-- Post Content -->
            <p class="lead">
                <?php echo $photo->caption; ?>
            </p>
            <p>
                <?php echo $photo->description; ?>
            </p>
            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->

            <img class="img-thumbnail" src="<?php  "admin" . DS . $photo->picture_path();?>">

            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form" method="post">
                    <div class="form-group">
                        <textarea name="body" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="author">Author:</label>
                        <input class="form-control" type="text" name="author">
                    </div>
                    <button type="submit" name="add_comment" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->



            <!-- Comment -->
            <?php
           $comment = Comment::find_the_comments($_GET['photo_id']);
          

                foreach ($comment as $comments) {
            ?>
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <h2><small>👤</small><?php echo $comments->author; ?></h2>
                                <big>📅<?php echo date("d-m-y"); ?>📅</big>
                            </h4>
                            <h4>🗨️: <?php echo $comments->body; ?></h4>
                        </div>
                    </div>
                    <hr>
            <?php
                }
            ?>

        </div>


        <?php include("includes/footer.php"); ?>