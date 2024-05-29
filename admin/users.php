<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) redirect("login"); ?>

<?php

$users = User::find_all();

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
                Users
            </h1>
            <a href="add_user.php">
                <input type="submit" value="Add User" class="btn btn-primary">
            </a>
            <div class="cold-md-12">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Photo</th>
                            <th>username</th>
                            <th>first name</th>
                            <th>last Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?php echo $user->id; ?></td>
                                <td><img class="admin-user-thumbnail user_image" src="<?php echo $user->image_path_and_placeholder()?>" alt="">

                                    <div class="actions_link">
                                        <a href="delete_user.php?del=<?php echo $user->id; ?>">Delete</a>
                                        <a href="edit_user.php?edit=<?php echo $user->id; ?>">Edit</a>
                                    </div>
                                </td>

                                <td><?php echo $user->username; ?></td>
                                <td><?php echo $user->first_name; ?></td>
                                <td><?php echo $user->last_name; ?></td>
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