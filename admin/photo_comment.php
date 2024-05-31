<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) redirect("login"); ?>

<?php

if (empty($_GET['photo_id'])) {
    redirect("photos");
}

$comments = Comment::find_the_comments($_GET['photo_id']);
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
                COMMENTS :
                <small>Subheading</small>
            </h1>
            <div class="cold-md-12">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>ACTIONS</th>
                            <th>COMMENT_ID</th>
                            <th>AUTHOR</th>
                            <th>BODY</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($comments as $comment) : ?>
                            <tr>
                                <td>
                                    <div>
                                        <a href="delete_comment_photos.php?comment_id=<?php echo $comment->id; ?>">Delete</a>

                                    </div>
                                </td>
                                <td><?php echo $comment->id; ?></td>
                                <td><?php echo $comment->author; ?></td>
                                <td><?php echo $comment->body; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- end of table -->
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>