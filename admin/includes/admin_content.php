<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                ADMIN
                <small>Dash Board</small>
            </h1>
           
            <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                            echo $session->count;
                                            ?>
                                        </div>
                                        <div>New Views</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                     <div>Page View from Gallery</div>
                                  <span class="pull-left">View Details</span> 
                               <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> 
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                     <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-photo fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                            // $photo = Photo::find_all();
                                            // echo count($photo);
                                            echo Photo::count_all();
                                            ?>
                                        </div>
                                        <div>Photos</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Total Photos in Gallery</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>


                     <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                        <?php
                                            $user = User::find_all();
                                            echo count($user);
                                            ?>
                                        </div>

                                        <div>Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Total Users</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                      <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                        <?php
                                            $comment = Comment::find_all();
                                            echo count($comment);
                                            ?>
                                        </div>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Total Comments</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>


                        </div> <!--First Row-->
           
        </div>
    </div>
    <!-- /.row -->




  
  


<div id="piechart" style="width: 800px; height: 500px;"></div>







    <?php
            // $user->username = "example";
            // $user->password = "12333";
            // $user->first_name = "e";
            // $user->last_name = "z";
            // $user->create();

            // $user = User::find_user_by_id(7);
            // $user->username = "wwf";
            // $user->update();

            // $user = User::find_user_by_id(16);
            // $user->delete();

            // $user = User::find_by_id(7);
            // $user->username = "WHATEVER jr";
            // $user->first_name = "jr jr";
            // $user->save();

            // $user = new User();
            // $user->username = "james bond";
            // $user->save();

            // $users = User::find_all();
            // foreach ($users as $user){
            //     echo $user->username ."<br>";
            // }


            // $photo = new Photo();
            // $photo->id = 11;
            // $photo->title = "example";
            // $photo->description = "12333";
            // $photo->filename = "photo.jpg";
            // $photo->type = "photo";
            // $photo->size = 100;
            // $photo->create();


            // $photo = Photo::find_all();
            // foreach ($photo as $pic) {
            //     echo $pic->title . "<br>";
            // }

            // if ($user = User::find_by_id("id", 10)) {
            //     $user->delete();
            //     echo $user->username . " : " . "deleted successfully";
            // } else {
            //     echo "User not found";
            // }
            ?>
