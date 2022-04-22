<?php

    session_start();

    $classes_redirect = "../classes/";

    include_once $classes_redirect."UsersView.php";

    $users_view_instance = new UsersView();

    if(!$users_view_instance->UserLoggedInVerified()){

        echo json_encode(["You are not logged in"]);

        die();

    }

    $user_id = $users_view_instance->GetUserLoggedID();

    if(isset($_POST["product_id"])){

        $product_id = $_POST["product_id"];

        if($product_id >= 1){

            include_once $classes_redirect."ProductsView.php";

            $products_view_instance = new ProductsView();

            $user_has_cart = $products_view_instance->UserHasCart($user_id);

            if($user_has_cart[0]){

                $cart_id = $user_has_cart[1];

                if($products_view_instance->InUserCart($cart_id, $product_id)){

                    include_once $classes_redirect."ProductsController.php";

                    $products_controller_instance = new ProductsController();

                    if($products_controller_instance->RemoveProductFromCart($cart_id, $product_id)){

                        echo "Product removed successfully";

                    }else{

                        echo "Error removing product from cart. Try again";

                    }

                }else{

                    echo "Product not in cart.";

                }

            }else{

                echo "You have no cart";

            }

        }else{

            echo "Fill in all fields";

        }

    }else{

        echo "All fields not set";

    }

?>
