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
                        <div class="col-4 offset-4 col-md-4 offset-md-4 col-lg-2 offset-lg-5">
                            <img src="<?php echo $app_conf->base_url(); ?><?php echo $user_profile_picture; ?>" width="100%" class="rounded"/>
                        </div>
                        <div class="col-12 text-center mt-2">
                            <?php echo $user_details["FirstName"]." ".$user_details["LastName"]; ?>
                        </div>
                        <div class="col-12 text-center mt-2">
                            Email Address: <?php echo $user_details["EmailAddress"]; ?>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="card mb-3">
                                <div class="card-header">
                                    Edit User Details
                                </div>
                                <form id="user_details_edit">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" name="first_name" class="form-control" placeholder="<?php echo $user_details["FirstName"]; ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" name="last_name" class="form-control" placeholder="<?php echo $user_details["LastName"]; ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" name="email_address" class="form-control" placeholder="<?php echo $user_details["EmailAddress"]; ?>"/>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Edit User Details</button>
                                        <br/><br/>
                                        <span class="server_response"></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    Change Password
                                </div>
                                <form id="password_edit">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input type="password" name="o_pwd" class="form-control" placeholder="Enter old password"/>
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" name="n_pwd" class="form-control" placeholder="Enter new password"/>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="server_response"></span>
                                    </div>
                                </form>
                            </div>

                            <div class="card mt-3">
                                <div class="card-header">
                                    Change Profile Picture
                                </div>
                                <form id="profile_picture_edit">
                                    <div class="card-body">
                                        <div class="input-group mb-3">
                                            <input type="file" name="profile_picture" class="form-control"/>
                                            <div class="input-group-append">
                                              <button type="submit" class="btn btn-primary">Change</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <span class="server_response"></span>
                                    </div>
                                </form>
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
        <?php $app_conf->load_controller("profile_func"); ?>
    </body>
</html>
