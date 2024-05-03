<div class="container-fluid">

    <?php
    //     $res = $database->query("SELECT * FROM users WHERE id = 1");

    //    while ($row = mysqli_fetch_assoc($res)){
    //     echo $row['id'] . "<br>";
    //    }


    // find all users has $database->query in its function
    //if its a public function then $user->find_all_users();

    // $res = User::find_all_users();

    // echo "data below:" . "<br>";


    // while($row = mysqli_fetch_array($res)){
    //   $user = $row['username'];
    // };




    // $results_user = User::find_user_by_id(1);
    // $user = User::instant($results_user);

    // $user->username = $results_user['username'];
    // $user->id = $results_user['id'];
    // $user->password = $results_user['password'];
    // $user->first_name = $results_user['first_name'];
    // $user->last_name = $results_user['last_name'];

    // echo $user->id;
    // echo $user->username;



    $user = User::find_all_users();
    foreach($user as $users){
        echo $users->username . "<br>";
    }



    // $uid = User::find_user_by_id(1);
    // echo $uid->username;


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