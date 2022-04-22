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

        <div class="containr-fluid" style="padding: 0px;">
            <img src="<?php echo $app_conf->base_url(); ?>assets/images/banner.jpg" style="width: 100%; height: 400px;"/>
        </div>
        <div class="container text-center" style="padding: 30px;">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12 card-container">
                    <div class="card mycard">Affordable Delivery</div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 card-container">
                    <div class="card mycard">24/7 Access</div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 card-container">
                    <div class="card mycard">Affordable Prices</div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 card-container">
                    <div class="card mycard">Best Shopping Site</div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-lg-12 col-md-12 col-12 text-center">
                <h1>All Products</h1>
            </div>

            <div class="row product_instance_category">

                <?php

                    $products = $products_view_instance->GetProducts();

                    foreach($products as $product){

                        ?>
                        <div class="col-10 offset-1 col-md-4 offset-md-0 col-lg-3 offset-lg-0 product_instance">
                            <div class="card" style="cursor: pointer">
                                <img class="card-img-top product_image" src="<?php echo $app_conf->base_url(); ?><?php echo $product["Image"]; ?>">
                                <div class="card-body text-center">
                                    <h4 class="card-title"><?php echo $product["Name"]; ?></h4>
                                    <p>$<?php echo $product["Price"]; ?> (<?php echo $product["Stock"]; ?> stocks)</p>
                                    <div class="row">
                                        <?php
                                            if($users_view_instance->UserLoggedInVerified()){

                                                $a2c_flag = false;

                                                $user_has_cart = $products_view_instance->UserHasCart($users_view_instance->GetUserLoggedID());

                                                if($user_has_cart[0]){

                                                    $cart_id = $user_has_cart[1];

                                                    if($products_view_instance->InUserCart($cart_id, $product["ProductID"])){

                                                        ?>
                                                        <div class="col-3">
                                                            <button class="btn btn-success" onclick="show_popup('Add to cart', 'Product already in cart');">
                                                                <?php $app_conf->get_font_awesome_icon("fas fa-shopping-cart"); ?>
                                                            </button>
                                                        </div>
                                                        <?php

                                                    }else{

                                                        $a2c_flag = true;

                                                    }


                                                }else{

                                                    $a2c_flag = true;

                                                }

                                                if($a2c_flag){

                                                    ?>
                                                    <div class="col-3">
                                                        <button class="btn btn-outline-success" onclick="add_product_to_cart($(this), <?php echo $product["ProductID"]; ?>);">
                                                            <?php $app_conf->get_font_awesome_icon("fas fa-shopping-cart"); ?>
                                                        </button>
                                                    </div>
                                                    <?php

                                                }

                                                if($products_view_instance->InUserWishlist($users_view_instance->GetUserLoggedID(), $product["ProductID"])){

                                                    ?>
                                                    <div class="col-3">
                                                        <button class="btn btn-success" onclick="show_popup('Add to wishlist', 'Product already in wishlist');">
                                                            <?php $app_conf->get_font_awesome_icon("fas fa-heart"); ?>
                                                        </button>
                                                    </div>
                                                    <?php

                                                }else{

                                                    ?>
                                                    <div class="col-3">
                                                        <button class="btn btn-outline-success" onclick="add_product_to_wishlist($(this), <?php echo $product["ProductID"]; ?>);">
                                                            <?php $app_conf->get_font_awesome_icon("fas fa-heart"); ?>
                                                        </button>
                                                    </div>
                                                    <?php

                                                }


                                            }else{

                                                ?>
                                                <div class="col-3">
                                                    <button class="btn btn-outline-success" onclick="show_popup('Add to cart', 'Login or register to add product to cart');">
                                                        <?php $app_conf->get_font_awesome_icon("fas fa-shopping-cart"); ?>
                                                    </button>
                                                </div>
                                                <div class="col-3">
                                                    <button class="btn btn-outline-success" onclick="show_popup('Add to wishlist', 'Login or register to add product to wishlist');">
                                                        <?php $app_conf->get_font_awesome_icon("fas fa-heart"); ?>
                                                    </button>
                                                </div>
                                                <?php

                                            }
                                        ?>
                                        <div class="col-6">
                                            <a href="<?php echo $app_conf->base_url(); ?>product/<?php echo $product["ProductID"]; ?>" class="btn btn-outline-success btn-block">View</a>
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
        <?php $app_conf->load_controller("products_func"); ?>

        <?php include_once $app_conf->get_view("popup_modal"); ?>
        <?php $app_conf->load_controller("popup"); ?>

    </body>
</html>
