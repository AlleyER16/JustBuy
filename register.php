<?php
    session_start();

    $classes_redirect = "classes/";

    include_once $classes_redirect."__WebAppConfig.php";

    include_once $classes_redirect."UsersView.php";
    include_once $classes_redirect."CategoriesView.php";
    include_once $classes_redirect."ProductsView.php";

    $products_view_instance = new ProductsView();
    $users_view_instance = new UsersView();
    $categories_view_instance = new CategoriesView();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>Register | <?php $app_conf->app_name(); ?></title>

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
            <div class="col-lg-12 col-md-12 col-12 text-center">
                <h1>Register</h1>
                <p>Create a new account</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-3 col-1"></div>
                <div class="col-lg-4 col-md-6 col-10">
                    <form id="signup_form">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="Enter First Name"/>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name"/>
                        </div>
                        <div class="form-group" id="auth_uid">
                            <label>Email address</label>
                            <input type="email" name="email_address" class="form-control" placeholder="Enter Email Address"/>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password"/>
                        </div>
                        <button type="submit" id="signup_button" class="btn btn-outline-success btn-block">Create Account</button>
                    </form>
                    <div style="margin-top: 10px;">
                        Already have an account? <a href="<?php echo $app_conf->base_url(); ?>login">Login</a>
                    </div>
                    <div class="text-center" id="server_response" style="margin-top: 15px;"></div>
                </div>
                <div class="col-lg-4 col-md-3 col-1"></div>
            </div>

        </div>

        <?php include_once $app_conf->get_view("info"); ?>
        <?php include_once $app_conf->get_view("footer"); ?>

        <?php $app_conf->load_javascript("js/jquery-3-5-1.min.js"); ?>
        <?php $app_conf->load_javascript("js/popper.min.js"); ?>
        <?php $app_conf->load_javascript("js/bootstrap.min.js"); ?>

        <?php $app_conf->load_controller("super"); ?>
        <?php $app_conf->load_controller("register"); ?>
    </body>
</html>
