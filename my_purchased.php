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
                            <h2>My purchased</h2>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <?php

                            $purchased_carts = $products_view_instance->GetPurchasedCarts($user_id);

                            foreach($purchased_carts as $cart){

                                ?>
                                <div class="col-lg-12 mb-3">
                                    <h5>Cart ID: <?php echo $cart["CartID"]; ?> Address: <?php echo $users_view_instance->GetAddressDatum($cart["Address"], "AddressType"); ?> - <?php echo $users_view_instance->GetAddressDatum($cart["Address"], "Address"); ?></h5>
                                    <div class="table-responsive">
                                        <table class="table table-stripped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S/N</th>
                                                    <th class="text-center">Image</th>
                                                    <th>Name</th>
                                                    <th>Unit Price</th>
                                                    <th>Quantity</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                    $counter = 0;

                                                    $cart_id = $cart["CartID"];

                                                    $user_carts = $products_view_instance->GetCartProducts($cart_id);

                                                    foreach($user_carts as $cart){

                                                        $counter++;

                                                        $product_details = $products_view_instance->GetProductDetails($cart["ProductID"]);

                                                        ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $counter; ?></td>
                                                            <td class="text-center"><img src="<?php echo $app_conf->base_url(); ?><?php echo $product_details["Image"]; ?>" width="60px" height="60px;"/></td>
                                                            <td><?php echo $product_details["Name"]; ?></td>
                                                            <td>
                                                                $<?php echo $cart["Price"]; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $cart["Quantity"]; ?>
                                                            </td>
                                                            <td>$<?php echo $cart["BillAmount"]; ?></td>
                                                        </tr>
                                                        <?php

                                                    }

                                                ?>
                                                <tr>
                                                    <td colspan="5">Total</td>
                                                    <td>$<?php echo $products_view_instance->GetTotalCartBill($cart_id); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
