<?php include("includes/header.php"); ?>


<?php if (!$session->is_signed_in()) redirect("login"); ?>

<?php

if (empty($_GET['edit_id'])) {
    redirect("comments");
}

$comment = Comment::find_by_id($_GET['edit_id']);

if (isset($_POST['Update'])) {
    $comment->author = $_POST['author'];
    $comment->body = $_POST['body'];

    if ($comment) {
        $comment->save();
        // redirect("comments");
    }
}

if (isset($_POST['delete'])) {
    redirect("comments");
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
                COMMENTS
                <small>Subheading</small>
            </h1>
            <form action="" method="post">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="author">Author:</label>
                        <input type="text" name="author" class="form-control" value="<?php echo $comment->author; ?>">
                    </div>

                    <div class=" form-group">
                        <label for="body">Body:</label>
                        <textarea id="summernote" name="body" cols="30" rows="10">
                        <?php echo $comment->body; ?>
                    </textarea>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="photo-info-box">

                        <div class="info-box-footer clearfix">
                            <div class="info-box-delete pull-left">
                                <a href="delete_comment.php?del=<?php echo $comment->id; ?>" class="btn btn-danger btn-lg ">Delete</a>
                            </div>
                            <div class="info-box-update pull-right ">
                                <input type="submit" name="Update" value="Update" class="btn btn-primary btn-lg ">
                            </div>
                        </div>
                    </div>
                </div>
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