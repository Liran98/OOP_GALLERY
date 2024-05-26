<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()) redirect("login");?>

<?php

$photos = Photo::find_all();


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
            <div class="cold-md-12">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>File Name</th>
                            <th>Type</th>
                            <th>Size</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($photos as $photo) : ?>
                        <tr>
                            <td><img style="width: 50px;" src="<?php echo $photo->picture_path(); ?>" alt=""></td>
                            <td><?php echo $photo->photo_id; ?></td>
                            <td><?php echo $photo->title; ?></td>
                            <td><?php echo $photo->description; ?></td>
                            <td><?php echo $photo->filename; ?></td>
                            <td><?php echo $photo->type; ?></td>
                            <td><?php echo $photo->size; ?></td>
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