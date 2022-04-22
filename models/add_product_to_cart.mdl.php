<?php

    header("Content-Type: application/json");

    session_start();

    $classes_redirect = "../classes/";

    include_once $classes_redirect."UsersView.php";

    $users_view_instance = new UsersView();

    if(!$users_view_instance->UserLoggedInVerified()){

        echo json_encode(["You are not logged in"]);

        die();

    }

    $user_id = $users_view_instance->GetUserLoggedID();

    if(isset($_POST["product_id"]) && !empty($_POST["product_id"])){

        $product_id = $_POST["product_id"];

        include_once $classes_redirect."ProductsView.php";
        include_once $classes_redirect."ProductsController.php";

        $products_view_instance = new ProductsView();
        $products_controller_instance = new ProductsController();

        $user_has_cart = $products_view_instance->UserHasCart($user_id);

        $cart_id = 0;

        if($user_has_cart[0]){

            $cart_id = $user_has_cart[1];

        }else{

            $new_user_cart = $products_controller_instance->AddNewUserCart($user_id);

            if($new_user_cart[0]){

                $cart_id = $new_user_cart[1];

            }else{

                echo json_encode(["Error creating cart. Try again"]);

                die();

            }

        }

        if($products_view_instance->InUserCart($cart_id, $product_id)){

            echo json_encode(["Product already in cart"]);

            die();

        }else{

            $product_details = $products_view_instance->GetProductDetails($product_id);

            if($products_controller_instance->AddProductToCart($cart_id, $product_id, $product_details["Price"], $_POST["quantity"] ?? 1)){

                echo json_encode(["Product added to cart successfully", $products_view_instance->GetNumCartProducts($cart_id), $products_view_instance->GetTotalCartBill($cart_id)]);

            }else{

                echo json_encode(["Error adding product to cart. Try again"]);

            }

        }

    }else{

        echo json_encode(["An error occured. Try again"]);

        die();

    }

?>
