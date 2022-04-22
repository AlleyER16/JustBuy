<?php
    session_start();

    $classes_redirect = "classes/";

    include_once $classes_redirect."__WebAppConfig.php";

    include_once $classes_redirect."UsersView.php";
    include_once $classes_redirect."CategoriesView.php";

    $users_view_instance = new UsersView();
    $categories_view_instance = new CategoriesView();

    if($users_view_instance->UserLoggedInVerified()){

        $user_details = $users_view_instance->GetUserDetails($users_view_instance->GetUserLoggedID());

        $user_profile_picture = ($user_details["ProfilePicture"] != null) ?  $user_details["ProfilePicture"]: "assets/images/avatar.jpg";

    }else{

        $redirect_url = $app_conf->base_url()."404";

        header("location: $redirect_url");

    }

    include_once $classes_redirect."ProductsView.php";

    $products_view_instance = new ProductsView();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title><?php echo $user_details["FirstName"]." ".$user_details["LastName"]; ?> | <?php $app_conf->app_name(); ?></title>

        <?php include_once $app_conf->get_inc_file("", "meta_tags"); ?>
        <?php include_once $app_conf->get_inc_file("", "font"); ?>

        <?php $app_conf->load_stylesheet("css/bootstrap.min.css"); ?>
        <?php $app_conf->load_stylesheet("css/style.css"); ?>
        <?php $app_conf->load_stylesheet("css/fontawesome.min.css"); ?>
    </head>
    <body>

        <?php include_once $app_conf->get_view("header"); ?>
        <?php include_once $app_conf->get_view("header2"); ?>
        <?php include_once $app_conf->get_view("navbar"); ?>

        <div class="container" style="margin-top: 50px; margin-bottom: 50px;">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12" style="margin-bottom: 20px;">
                    <?php include_once $app_conf->get_view("user_sidebar"); ?>
                </div>

                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2>My addresses</h2>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-stripped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">S/N</th>
                                            <th class="text-center">Address Type</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>ZipCode</th>
                                            <!--
                                            <th></th>
                                            -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            $counter = 0;

                                            $user_addresses = $users_view_instance->GetUserAddresses($user_details["UserID"]);

                                            foreach($user_addresses as $address){

                                                $counter++;

                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $counter; ?></td>
                                                    <td class="text-center"><?php echo $address["AddressType"]; ?></td>
                                                    <td><?php echo $address["Address"]; ?></td>
                                                    <td><?php echo $address["City"]; ?></td>
                                                    <td><?php echo $address["State"]; ?></td>
                                                    <td><?php echo $address["ZipCode"]; ?></td>
                                                    <!--
                                                    <td>
                                                        <button class="btn btn-danger"><span class="fas fa-trash"></span></button>
                                                    </td>
                                                    -->
                                                </tr>
                                                <?php

                                            }

                                            if($counter == 0){

                                                ?>
                                                <tr>
                                                    <td colspan="7" class="text-center">No address added</td>
                                                </tr>
                                                <?php

                                            }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3 text-center">
                                <button class="btn btn-primary" onclick="$('#add_address_modal').modal()">Add address</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include_once $app_conf->get_view("info"); ?>
        <?php include_once $app_conf->get_view("footer"); ?>

        <?php $app_conf->load_javascript("js/jquery-3-5-1.min.js"); ?>
        <?php $app_conf->load_javascript("js/popper.min.js"); ?>
        <?php $app_conf->load_javascript("js/bootstrap.min.js"); ?>

        <?php $app_conf->load_controller("super"); ?>

        <?php include_once $app_conf->get_view("add_address_modal"); ?>
        <?php $app_conf->load_controller("address_func"); ?>
    </body>
</html>
