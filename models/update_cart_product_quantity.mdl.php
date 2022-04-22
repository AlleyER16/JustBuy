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

    if(isset($_POST["product_id"]) && isset($_POST["quantity"])){

        $product_id = $_POST["product_id"];
        $quantity = $_POST["quantity"];

        if($product_id >= 1 && $quantity >= 1){

            include_once $classes_redirect."ProductsView.php";

            $products_view_instance = new ProductsView();

            $user_has_cart = $products_view_instance->UserHasCart($user_id);

            if($user_has_cart[0]){

                $cart_id = $user_has_cart[1];

                if($products_view_instance->InUserCart($cart_id, $product_id)){

                    $billing_details = $products_view_instance->GetBillingDetails($cart_id, $product_id);

                    $new_product_unit_price = $products_view_instance->GetProductDatum($product_id, "Price");
                    $new_quantity = $quantity;

                    $new_bill_amount = $new_product_unit_price * $new_quantity;

                    include_once $classes_redirect."ProductsController.php";

                    $products_controller_instance = new ProductsController();

                    $products_controller_instance->UpdateBillingDatum($cart_id, $product_id, "Price", $new_product_unit_price);
                    $products_controller_instance->UpdateBillingDatum($cart_id, $product_id, "Quantity", $new_quantity);
                    $products_controller_instance->UpdateBillingDatum($cart_id, $product_id, "BillAmount", $new_bill_amount);

                    echo "Quantity changed successfully";

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
