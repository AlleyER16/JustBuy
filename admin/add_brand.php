<?php

    session_start();

    $classes_redirect = "../classes/";

    require_once $classes_redirect."__WebAppConfig.php";

    require_once $app_conf->get_inc_file("", "auth_func");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add Brand | JustBuy Admin </title>

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
                                        Add brand
                                        <div class="page-title-subheading">
                                            Add a new brand
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <a href="<?php echo $app_conf->admin_url(); ?>all_brands" class="btn btn-primary">View all brands</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">
                                        Add Brand
                                    </div>
                                    <form id="add_brand_form">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Brand Name</label>
                                                <input type="text" class="form-control" name="brand_name" placeholder="Enter brand name"/>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button type="submit" class="btn btn-primary">Add brand</button>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="server_response"></span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <?php include_once $app_conf->get_inc_file("", "javascripts"); ?>
        <script type="text/javascript" src="<?php echo $app_conf->base_url(); ?>assets/js/jquery-3-5-1.min.js"></script>
        <script type="text/javascript" src="<?php echo $app_conf->admin_url(); ?>controllers/base_urls.js"></script>

        <?php $app_conf->load_admin_controller("brand_func"); ?>
    </body>
</html>
