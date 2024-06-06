<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) redirect("login"); ?>

<?php

$photos = Photo::find_all();
// $photos = User::find_by_id($_SESSION['user_id'])->photo();

if (isset($_POST['deletebtn'])) {

    $pic_id = $_POST['allpics'];

    foreach ($pic_id as $photo) {
        $current_picture = Photo::find_by_id($photo);
        $current_picture->delete_photo();
    }

    redirect("photos");
}
?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->


    <?php include("includes/top_nav.php") ?>
    <?php include("includes/side_nav.php") ?>
    <!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">
    <!-- <div class="container-fluid">
        <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                PHOTOS
                <small>Subheading</small>
            </h1>
            <p class="bg-success">
                <?php echo $message; ?>
            </p>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="cold-md-12">
                    <input type="submit" value="delete" name="deletebtn" class="del-btn btn btn-danger  hidden">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Actions <input class="checkboxes" type="checkbox"></th>
                                <th>Photo</th>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>File Name</th>
                                <th>Type</th>
                                <th>Size</th>
                                <th>Comments</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($photos as $photo) : ?>
                                <tr>
                                    <td><input value="<?php echo $photo->id; ?>" type="checkbox" class="check_per_image" name="allpics[]"></td>
                                    <td><img class="admin-photo-thumbnail" src="<?php echo $photo->picture_path(); ?>" alt="">

                                        <div class="actions_link">
                                            <a class="delete_link" href="delete_photo.php?del=<?php echo $photo->id; ?>">Delete</a>
                                            <a href="edit_photo.php?edit=<?php echo $photo->id; ?>">Edit</a>
                                            <a href="../photo.php?photo_id=<?php echo $photo->id; ?>">View</a>
                                        </div>
                                    </td>

                                    <td><?php echo $photo->id; ?></td>
                                    <td><?php echo $photo->title; ?></td>
                                    <td><?php echo $photo->description; ?></td>
                                    <td><?php echo $photo->filename; ?></td>
                                    <td><?php echo $photo->type; ?></td>
                                    <td><?php echo $photo->size; ?></td>
                                    <td>
                                        <a href="photo_comment.php?photo_id=<?php echo $photo->id; ?>">
                                            <?php
                                            $comment = Comment::find_the_comments($photo->id);
                                            echo count($comment);
                                            ?>
                                        </a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- end of table -->
                </div>
            </form>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>