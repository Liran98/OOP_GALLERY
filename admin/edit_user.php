<?php include("includes/header.php"); ?>
<?php include("includes/photo_library_modal.php"); ?>
<?php if (!$session->is_signed_in()) redirect("login"); ?>

<?php

if (empty($_GET['edit'])) {
    redirect("users");
}


$user = User::find_by_id($_GET['edit']);

// if(isset($_POST['delete'])){
//     $user->delete_photo_user();
//     redirect("users");
// }

if (isset($_POST['update'])) {
    if ($user) {
        $user->username = $_POST['username'];
        $user->password = $_POST['password'];
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];


        if (empty($_FILES['user_image'])) {
            $session->message("The user has been updated");
            $user->save();
            redirect("users");
          

        } else {
            $user->set_file($_FILES['user_image']);
            $user->save_user_and_image();
            $user->save();

            // redirect("edit_user") . "?edit=$user->id";
            redirect("users");



        }
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
                USERS
                <small>Subheading</small>
            </h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="col-md-4 user_image_box">
                    <div class="form-group">
                        <a data-toggle="modal" data-target="#photo-library" class="rounded" href="#">
                            <img class="img-responsive" src="<?php echo $user->image_path_and_placeholder(); ?>" alt=""></a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="username">username:</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">password:</label>
                        <input type="password" name="password" class="form-control" value="<?php echo $user->password; ?>">
                    </div>


                    <div class=" form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" class="form-control" value="<?php echo $user->first_name; ?>">
                    </div>
                    <div class=" form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" class="form-control" value="<?php echo $user->last_name; ?>">
                    </div>
                    <div class=" form-group">
                        <label for="user image">user image</label>
                        <input type="file" name="user_image">
                        <img src="<?php $user->image_path_and_placeholder();?>" alt="">
                    </div>
                    <div class=" form-group">
                        <input type="submit" value="update" name="update" class="btn btn-primary">
                    </div>
                    <div class=" form-group">
                        <a id="user_id"  class="btn btn-danger"  href="delete_user.php?del=<?php echo $user->id; ?>">Delete</a>
                        <!-- <input id="user-id" type="submit" value="delete" name="delete" class="btn btn-danger"> -->
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