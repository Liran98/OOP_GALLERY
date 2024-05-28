<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) redirect("login"); ?>

<?php

if (empty($_GET['edit'])) {
    redirect("photos");
} else {
    $photo = Photo::find_by_id($_GET['edit']);

    if (isset($_POST['Update'])) {
        if ($photo) {

            $photo->title = $_POST['title'];
            $photo->caption = $_POST['caption'];
            $photo->alternate_text = $_POST['alternate_text'];
            $photo->description = $_POST['description'];

           $photo->save();
                echo "photo updated successfully";
            
        }
    }
}


// $photos = Photo::find_all();


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
            <form action="" method="post">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control" value="<?php echo $photo->title; ?>" >
                    </div>
                    <div class="form-group">
                        <a class="thumbnail" href=""><img src="<?php echo $photo->picture_path();?>" alt=""></a>
                    </div>

                    <div class=" form-group">
                        <label for="caption">Caption:</label>
                        <input type="text" name="caption" class="form-control" value="<?php echo $photo->caption; ?>">
                    </div>
                    <div class=" form-group">
                        <label for="alternate_text">Alternate text:</label>
                        <input type="text" name="alternate_text" class="form-control" value="<?php echo $photo->alternate_text; ?>">
                    </div>
                    <div class=" form-group">
                        <label for="Description">Description:</label>
                        <textarea id="summernote" name="description"  cols="30" rows="10">
                        <?php echo $photo->description; ?>
                    </textarea>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="photo-info-box">
                        <div class="info-box-header">
                            <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                        </div>
                        <div class="inside">
                            <div class="box-inner">
                                <p class="text">
                                    <span class="glyphicon glyphicon-calendar"></span> <?php echo date("d/m/y") ." " .date("h:i"); ?>
                                </p>
                                <p class="text ">
                                    Photo Id: <span class="data id_box"><?php echo $photo->id; ?></span>
                                </p>
                                <p class="text">
                                    File Name: <span class="data"><?php echo $photo->filename; ?></span>
                                </p>
                                <p class="text">
                                    File Type: <span class="data"><?php echo $photo->type; ?></span>
                                </p>
                                <p class="text">
                                    File Size: <span class="data"><?php echo $photo->size; ?></span>
                                </p>
                            </div>
                            <div class="info-box-footer clearfix">
                                <div class="info-box-delete pull-left">
                                    <a href="delete_photo.php?del=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg ">Delete</a>
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