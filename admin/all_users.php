<?php

    session_start();

    $classes_redirect = "../classes/";

    require_once $classes_redirect."__WebAppConfig.php";

    require_once $app_conf->get_inc_file("", "auth_func");

    require_once $classes_redirect."UsersView.php";

    $users_view_instance = new UsersView();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>All Users | JustBuy Admin </title>

        <?php require_once $app_conf->get_inc_file("", "meta_tags"); ?>

        <?php require_once $app_conf->get_inc_file("", "stylesheets"); ?>
    </head>
    <body>
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

            <?php include_once $app_conf->get_view("header"); ?>

            <div class="app-main">

                <?php include_once $app_conf->get_view("sidebar"); ?>

                <div class="app-main__outer">

                    <div class="app-main__inner">

                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                    <div>
                                        All users
                                        <div class="page-title-subheading">
                                            This shows all users
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">
                                        All users
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S/N</th>
                                                    <th class="text-center">Image</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email Address</th>
                                                    <th>Password</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                    $users = $users_view_instance->GetUsers();

                                                    $counter = 0;

                                                    foreach ($users as $user) {

                                                        $counter++;

                                                        $profile_picture = ($user["ProfilePicture"] == NULL) ? "assets/images/avatar.jpg": $user["ProfilePicture"];

                                                        ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $counter; ?></td>
                                                            <td class="text-center">
                                                                <img src="../<?php echo $profile_picture; ?>" width="60px" height="60px" class="rounded"/>
                                                            </td>
                                                            <td><?php echo $user["FirstName"]; ?></td>
                                                            <td><?php echo $user["LastName"]; ?></td>
                                                            <td><?php echo $user["EmailAddress"]; ?></td>
                                                            <td><?php echo "********"; ?></td>
                                                        </tr>
                                                        <?php

                                                    }

                                                    if($counter == 0){

                                                        ?>
                                                        <tr>
                                                            <td class="text-center" colspan="4">No users</td>
                                                        </tr>
                                                        <?php

                                                    }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <?php include_once $app_conf->get_inc_file("", "javascripts"); ?>
    </body>
</html>
