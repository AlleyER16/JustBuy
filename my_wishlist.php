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
                        <div class="col-12 text-center">
                            <h2>My wishlist</h2>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-stripped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">S/N</th>
                                            <th class="text-center">Image</th>
                                            <th>Name</th>
                                            <th>Unit Price</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            $counter = 0;

                                            $user_wishlists = $products_view_instance->GetWishlistProducts($user_id);

                                            foreach($user_wishlists as $wishlist){

                                                $counter++;

                                                $product_details = $products_view_instance->GetProductDetails($wishlist["ProductID"]);

                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $counter; ?></td>
                                                    <td class="text-center"><img src="<?php echo $app_conf->base_url(); ?><?php echo $product_details["Image"]; ?>" width="60px" height="60px;"/></td>
                                                    <td><?php echo $product_details["Name"]; ?></td>
                                                    <td>
                                                        $<?php echo $product_details["Price"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php

                                                            $user_has_cart = $products_view_instance->UserHasCart($user_details["UserID"]);

                                                            if($user_has_cart[0]){

                                                                $cart_id = $user_has_cart[1];

                                                                if($products_view_instance->InUserCart($cart_id, $product_details["ProductID"])){

                                                                    ?>
                                                                    <button class="btn btn-success" onclick="show_popup('Add to cart', 'Product already in cart');"><span class="fas fa-shopping-cart"></span></button>
                                                                    <?php

                                                                }else{

                                                                    ?>
                                                                    <button class="btn btn-outline-success" onclick="add_product_to_cart($(this), <?php echo $product_details["ProductID"]; ?>);"><span class="fas fa-shopping-cart"></span></button>
                                                                    <?php

                                                                }

                                                            }else{

                                                                ?>
                                                                <button class="btn btn-outline-success" onclick="add_product_to_cart($(this), <?php echo $product_details["ProductID"]; ?>);"><span class="fas fa-shopping-cart"></span></button>
                                                                <?php

                                                            }

                                                        ?>
                                                        <button class="btn btn-danger" onclick="remove_product_from_wishlist($(this), <?php echo $product_details["ProductID"]; ?>)"><span class="fas fa-trash"></span></button>
                                                    </td>
                                                </tr>
                                                <?php

                                            }

                                            if($counter == 0){

                                                ?>
                                                <td colspan="5" class="text-center">No product in wishlist</td>
                                                <?php

                                            }

                                        ?>
                                    </tbody>
                                </table>
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
        <?php $app_conf->load_controller("products_func"); ?>

        <?php include_once $app_conf->get_view("popup_modal"); ?>
        <?php $app_conf->load_controller("popup"); ?>
    </body>
</html>
