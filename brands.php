<?php
    session_start();

    $classes_redirect = "classes/";

    include_once $classes_redirect."__WebAppConfig.php";

    include_once $classes_redirect."UsersView.php";
    include_once $classes_redirect."CategoriesView.php";

    $users_view_instance = new UsersView();
    $categories_view_instance = new CategoriesView();

    include_once $classes_redirect."ProductsView.php";
    include_once $classes_redirect."BrandsView.php";

    $products_view_instance = new ProductsView();
    $brands_view_instance = new BrandsView();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>Home | <?php $app_conf->app_name(); ?></title>

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
                <h1>Newest Arrivals</h1>
            </div>

            <div class="row product_instance_category">

                <?php

                    $brands = $brands_view_instance->GetBrands(12);

                    foreach($brands as $brand){

                        ?>
                        <div class="col-lg-3 col-md-4 col-12 product_instance">
                            <div class="card" style="cursor: pointer">
                                <div class="card-body text-center">
                                    <h4 class="card-title">
                                        <?php echo $brand["BrandName"]; ?>
                                    </h4>
                                    <p><?php echo $products_view_instance->GetNumBrandProducts($brand["BrandID"]); ?> products</p>
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="<?php echo $app_conf->base_url(); ?>brand/<?php echo $brand["BrandID"]; ?>" class="btn btn-outline-success btn-block">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php

                    }

                ?>
            </div>

        </div>

        <?php include_once $app_conf->get_view("info"); ?>
        <?php include_once $app_conf->get_view("footer"); ?>

        <?php $app_conf->load_javascript("js/jquery-3-5-1.min.js"); ?>
        <?php $app_conf->load_javascript("js/popper.min.js"); ?>
        <?php $app_conf->load_javascript("js/bootstrap.min.js"); ?>

        <?php $app_conf->load_controller("super"); ?>

    </body>
</html>
