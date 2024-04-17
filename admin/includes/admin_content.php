<div class="container-fluid">

    <?php
    $res = $database->query("SELECT * FROM users WHERE id = 1");

   while ($row = mysqli_fetch_assoc($res)){
    echo $row['id'];
   }
?>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    ADMIN 
                    <small>Subheading</small>
                </h1>
         



            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
            </div>
        </div>
        <!-- /.row -->