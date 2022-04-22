<?php
    session_start();

    $classes_redirect = "classes/";

    include_once $classes_redirect."__WebAppConfig.php";

    include_once $classes_redirect."UsersView.php";
    include_once $classes_redirect."CategoriesView.php";

    $users_view_instance = new UsersView();
    $categories_view_instance = new CategoriesView();

    include_once $classes_redirect."ProductsView.php";

    $products_view_instance = new ProductsView();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>Contact Us | <?php $app_conf->app_name(); ?></title>

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

                <div class="col-lg-8 col-md-6 col-12">

                    <form id="feedback_form">
                        <div class="row" style="width: 100%">

                            <div class="col-12">

                                <div class="form-group">

                                    <label>Full Name</label>

                                    <input type="text" name="full_name" placeholder="Enter full name" class="form-control"/>

                                </div>

                            </div>

                            <div class="col-12">

                                <div class="form-group">

                                    <label>Subject</label>

                                    <input type="text" name="subject" placeholder="Enter subject" class="form-control"/>

                                </div>

                            </div>

                            <div class="col-12">

                                <div class="form-group">

                                    <label>Message</label>

                                    <textarea rows="5" name="message" placeholder="Enter message" class="form-control"></textarea>

                                </div>

                            </div>

                            <div class="col-12">

                                <button type="submit" class="btn btn-success">Add Feedback</button>

                                &nbsp;&nbsp;&nbsp;&nbsp;

                                <span class="server_response"></span>

                            </div>

                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="mb-3">
                        <p><b>Telephone</b></p>
                        <p>+234 90128891092</p>
                    </div>

                    <div class="mb-3">
                        <p><b>Email Address</b></p>
                        <p>+justbuy@gmail.com</p>
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
        <?php $app_conf->load_controller("products_func"); ?>

        <?php include_once $app_conf->get_view("popup_modal"); ?>
        <?php $app_conf->load_controller("popup"); ?>
    </body>
</html>
