<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) redirect("login"); ?>

<?php
$message = "";
$active_class = "";

$user = new User();

if (isset($_POST['submit'])) {

    if ($user) {
        $user->username = $_POST['username'];
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];

        $user->password = $_POST['password'];
        $confirm_pass = $_POST['password2'];

        
        // if ($user->password == $confirm_pass && !empty($user->password) && !empty($confirm_pass)) {
        //     $user->password = password_hash($user->password, PASSWORD_BCRYPT, array("cost" => 12));
        //     $message = "passwords match";
        //     $active_class = "success";
        // }else{
        //     $message = "passwords do not match";
        //     $active_class = "danger";
        // }

        $user->set_file($_FILES['user_image']);

        $user->save_user_and_image();
        $session->message("user added successfully");
        $user->save();

        redirect("users");
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
                ADD Users
                <small>Subheading</small>
            </h1>

            <div class="col-md-6 col-md-offset-3">

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" name="first_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" name="last_name" class="form-control">
                    </div>
                    <div class="bg-<?php echo $active_class; ?>">
                        <?php
                        echo $message;
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password2">Confrim Password</label>
                        <input type="password" name="password2" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="user image">User Image</label>
                        <input type="file" name="user_image">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary">
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