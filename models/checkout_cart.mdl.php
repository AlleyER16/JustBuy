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

    if(isset($_POST["address"])){

        $address_id = $_POST["address"];

        if($address_id >= 1){

            include_once $classes_redirect."ProductsView.php";

            $products_view_instance = new ProductsView();

            $user_has_cart = $products_view_instance->UserHasCart($user_id);

            if($user_has_cart[0]){

                $cart_id = $user_has_cart[1];

                if($products_view_instance->GetNumCartProducts($cart_id) >= 1){

                    include_once $classes_redirect."ProductsController.php";

                    $products_controller_instance = new ProductsController();

                    $products_controller_instance->UpdateCartDatum($cart_id, "Paid", 1);
                    $products_controller_instance->UpdateCartDatum($cart_id, "Address", $address_id);
                    $products_controller_instance->UpdateCartDatum($cart_id, "PurchaseDate", time());

                    echo "Checkout successful";

                }else{

                    echo "Cart has no products";

                }

            }else{

                echo "You have no cart";

            }

        }else{

            echo "Select an address to deliver products";

        }

    }else{

        echo "Select an address to deliver products";

    }

?>
