<?php

    session_start();

    $classes_redirect = "../classes/";

    require_once $classes_redirect."__WebAppConfig.php";

    require_once $app_conf->get_inc_file("", "auth_func");

    include_once $classes_redirect."ProductsView.php";
    include_once $classes_redirect."CategoriesView.php";
    include_once $classes_redirect."BrandsView.php";
    include_once $classes_redirect."UsersView.php";
    include_once $classes_redirect."FeedbackView.php";

    $products_view_instance = new ProductsView();
    $categories_view_instance = new CategoriesView();
    $brands_view_instance = new BrandsView();
    $users_view_instance = new UsersView();
    $feedbacks_view_instance = new FeedbackView();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Analytics | JustBuy Admin </title>

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
                                        Site Analytics
                                        <div class="page-title-subheading">
                                            This shows site overview
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-night-fade">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Products</div>
                                            <div class="widget-subheading">Total products</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span><?php echo $products_view_instance->GetNumProducts(); ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Categories</div>
                                            <div class="widget-subheading">Total categories</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span><?php echo $categories_view_instance->GetNumCategories(); ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-happy-green">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Brands</div>
                                            <div class="widget-subheading">Total Brands</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span><?php echo $brands_view_instance->GetNumBrands(); ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Feedbacks</div>
                                            <div class="widget-subheading">Total feedbacks</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span><?php echo $feedbacks_view_instance->GetNumFeedbacks(); ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-premium-dark">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Clients</div>
                                            <div class="widget-subheading">Total Clients</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-warning"><span><?php echo $users_view_instance->GetNumUsers(); ?></span></div>
                                        </div>
                                    </div>
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

        <?php $app_conf->load_controller("category_func"); ?>
    </body>
</html>
