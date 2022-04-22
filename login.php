<?php
    session_start();

    $classes_redirect = "classes/";

    include_once $classes_redirect."__WebAppConfig.php";

    include_once $classes_redirect."UsersView.php";
    include_once $classes_redirect."CategoriesView.php";
    include_once $classes_redirect."ProductsView.php";

    $users_view_instance = new UsersView();
    $categories_view_instance = new CategoriesView();
    $products_view_instance = new ProductsView();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>Login | <?php $app_conf->app_name(); ?></title>

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
                <h1>Login</h1>
                <p>Login to your account</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-3 col-1"></div>
                <div class="col-lg-4 col-md-6 col-10">
                    <form id="login_form">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" id="lg_email" name="email_address" class="form-control" placeholder="Enter Email Address"/>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="lg_pwd" name="password" class="form-control" placeholder="Enter Password"/>
                        </div>
                        <button type="submit" id="login_button" class="btn btn-outline-success btn-block">Login</button>
                    </form>
                    <div style="margin-top: 10px;">
                        Do not have an account? <a href="<?php echo $app_conf->base_url(); ?>register">Create Account</a>
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
        <?php $app_conf->load_controller("login"); ?>
    </body>
</html>
