<?php
    session_start();

    $classes_redirect = "classes/";

    include_once $classes_redirect."__WebAppConfig.php";

    include_once $classes_redirect."ProductsView.php";

    $products_view_instance = new ProductsView();

    if(!isset($_GET["product_id"]) || empty($_GET["product_id"])){

        $redirect_url = $app_conf->base_url() . "404";

        header("location: $redirect_url");

    }

    $product_id = $_GET["product_id"];

    if(!$products_view_instance->ProductExistsByID($product_id)){

        $redirect_url = $app_conf->base_url() . "404";

        header("location: $redirect_url");

    }

    $product_details = $products_view_instance->GetProductDetails($product_id);

    include_once $classes_redirect."UsersView.php";
    include_once $classes_redirect."CategoriesView.php";

    $users_view_instance = new UsersView();
    $categories_view_instance = new CategoriesView();


    include_once $classes_redirect."BrandsView.php";

    $brands_view_instance = new BrandsView();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>Products | <?php $app_conf->app_name(); ?></title>

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
                <div class="col-md-4 mb-4">
                    <div class="row">
                        <div class="col-10 offset-1 col-md-10 offset md-1">
                            <img src="<?php echo $app_conf->base_url(); ?><?php echo $product_details["Image"]; ?>" width="100%"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 text-center">
                    <h1><?php echo $product_details["Name"]; ?></h1>
                    <p><?php echo $product_details["Description"]; ?></p>
                    <p>Brand: <a href="<?php echo $app_conf->base_url(); ?>brand/<?php echo $product_details["Brand"]; ?>"><?php echo $brands_view_instance->GetBrandName($product_details["Brand"]); ?></a></p>
                    <p>Category: <a href="<?php echo $app_conf->base_url(); ?>products/<?php echo $product_details["Category"]; ?>/all/all/all"><?php echo $categories_view_instance->GetCategoryName($product_details["Category"]); ?></a></p>
                    <p>Stock: <?php echo $product_details["Stock"]; ?> stocks</p>
                    <p>Price: $<?php echo $product_details["Price"]; ?></p>
                    <p>
                        <button class="btn btn-outline-primary">Add to cart</button>
                        <button class="btn btn-outline-primary">Add to wishlist</button>
                    </p>
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
