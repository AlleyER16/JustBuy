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

        if($products_view_instance->InUserWishlist($user_id, $product_id)){

            echo json_encode(["Product already in wishlist"]);

        }else{

            if($products_controller_instance->AddProductToWishlist($user_id, $product_id)){

                echo json_encode(["Product added to wishlist successfully", $products_view_instance->GetNumWishlistProducts($user_id)]);

            }else{

                echo json_encode(["An error product to wishlist. Try again"]);

                die();

            }

        }

    }else{

        echo json_encode(["An error occured. Try again"]);

        die();

    }

?>
