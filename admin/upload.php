<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) redirect("login"); ?>

<?php
$message = "";
if (isset($_FILES['file'])) {

    $photo = new Photo();
    $photo->title = $_POST['title'];
    $photo->set_file($_FILES['file']);

    if ($photo->save()) {
        $message = "photo uploaded successfully";
    } else {
        $message = join("<br>", $photo->custom_errors);
    }
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
                UPLOADS
                <small>Subheading</small>
            </h1>

            <div class="row">
            <div class="col-md-6">
                <?php
                
                echo $message;
                
                ?>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <input class="hidden" type="file" name="file">
                    </div>
                    <input class="hidden" type="submit" name="submit" class="btn btn-primary">
                </form>


            </div>
        </div>
        </div> 
        <!-- end of row -->
        <div class="row">
            <div class="col-lg-12">
                <form action="upload.php" class='dropzone'>
                    
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->


</div>



<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>