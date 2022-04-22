<?php

    session_start();

    $classes_redirect = "classes/";

    include_once $classes_redirect."__WebAppConfig.php";

    if(
        (!isset($_GET["category"]) || empty($_GET["category"]))
        ||
        (!isset($_GET["brand"]) || empty($_GET["brand"]))
        ||
        (!isset($_GET["price"]) || empty($_GET["price"]))
        ||
        (!isset($_GET["search_keyword"]) || empty($_GET["search_keyword"]))

    ){

        $redirect_url = $app_conf->base_url() . "404";

        header("location: $redirect_url");

    }

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
            <div class="col-lg-12 col-md-12 col-12 text-center">
                <?php

                    if($_GET["search_keyword"] != "all"){
                        ?>
                        <h1>Search Results: <?php echo $_GET["search_keyword"]; ?></h1>
                        <?php
                    }else if($_GET["category"] != "all"){
                        ?>
                        <h1><?php echo $categories_view_instance->GetCategoryName($_GET["category"]); ?></h1>
                        <?php
                    }else if($_GET["brand"] != "all"){
                        ?>
                        <h1><?php echo $brands_view_instance->GetBrandName($_GET["brand"]); ?></h1>
                        <?php
                    }else{
                        ?>
                        <h1>Products</h1>
                        <?php

                    }

                ?>
            </div>

            <div class="row" style="margin-top: 50px; margin-bottom: 50px;">
                <div class="col-lg-3 col-md-4 col-12" style="margin-bottom: 20px;">
                    <div class="card">
                        <div class="card-header">Search</div>
                        <div class="card_body" style="padding: 20px;">
                            <div class="input-group mb-3">
                                <input id="search" type="text" class="form-control" placeholder="Enter search keyword" value="<?php echo ($_GET['search_keyword'] != 'all') ? $_GET['search_keyword']: ''; ?>"/>
                                <div class="input-group-append">
                                  <button type="submit" class="btn btn-primary search_btn"><span class="fas fa-search"></span></button>
                                </div>
                              </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">Price</div>
                        <div class="card_body" style="padding: 20px;">
                            <input type="radio" class="price_filter" name="price_filter" value="all" <?php echo ($_GET["price"] == "all") ? "checked" : ""; ?>/> All Price<br><br>
                            <input type="radio" class="price_filter" name="price_filter" value="1" <?php echo ($_GET["price"] == "1") ? "checked" : ""; ?>/> Less than $20<br><br>
                            <input type="radio" class="price_filter" name="price_filter" value="2" <?php echo ($_GET["price"] == "2") ? "checked" : ""; ?>/> $20 - $50<br><br>
                            <input type="radio" class="price_filter" name="price_filter" value="3" <?php echo ($_GET["price"] == "3") ? "checked" : ""; ?>/> $51 - $100<br><br>
                            <input type="radio" class="price_filter" name="price_filter" value="4" <?php echo ($_GET["price"] == "4") ? "checked" : ""; ?>/> Greater than $100<br><br>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">Brands</div>
                        <div class="card_body" style="padding: 20px;">
                            <input type="radio" class="brand_filter" name="brand_filter" value="all" <?php echo ($_GET["brand"] == "all") ? "checked" : ""; ?>/> All Brands<br><br>
                            <?php

                                $brands = $brands_view_instance->GetBrands();

                                foreach($brands as $brand){

                                    ?>
                                    <input type="radio" class="brand_filter" name="brand_filter" value="<?php echo $brand["BrandID"]; ?>" <?php echo ($_GET["brand"] == $brand["BrandID"]) ? "checked" : ""; ?>/> <?php echo $brand["BrandName"]; ?><br><br>
                                    <?php

                                }

                            ?>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">Category</div>
                        <div class="card_body" style="padding: 20px;">
                            <input type="radio" class="category_filter" name="category_filter" value="all" <?php echo ($_GET["category"] == "all") ? "checked" : ""; ?>/> All Categories<br><br>
                            <?php

                                $categories = $categories_view_instance->GetCategories();

                                foreach($categories as $category){

                                    ?>
                                    <input type="radio" class="category_filter" name="category_filter" value="<?php echo $category["CategoryID"]; ?>" <?php echo ($_GET["category"] == $category["CategoryID"]) ? "checked" : ""; ?>/> <?php echo $category["CategoryName"]; ?><br><br>
                                    <?php

                                }

                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-8">
                    <div class="row" id="products_pane">
                        <?php

                            $products = $products_view_instance->AdvancedGetProducts($_GET["category"], $_GET["brand"], $_GET["price"], $_GET["search_keyword"]);

                            $counter = 0;

                            foreach($products as $product){

                                $counter++;

                                ?>
                                <div class="col-lg-4 col-md-6 col-12 product_instance">
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
                                                    <button class="btn btn-outline-success btn-block">View</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php

                            }

                            if($counter == 0){
                                ?>
                                <div class="col-12 text-center">
                                    No product matches your selection
                                </div>
                                <?php
                            }

                        ?>
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
