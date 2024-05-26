<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()) redirect("login");?>

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
                            <th>File Name</th>
                            <th>Title</th>
                            <th>Size</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                        </tr>
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