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

    if(isset($_POST["address_type"]) && isset($_POST["address"]) && isset($_POST["city"])
     && isset($_POST["state"]) && isset($_POST["zip_code"])){

         $address_type = $_POST["address_type"];
         $address = $_POST["address"];
         $city = $_POST["city"];
         $state = $_POST["state"];
         $zip_code = $_POST["zip_code"];

         if(!empty($address_type) && !empty($address) && !empty($city) && !empty($state) && !empty($zip_code)){

             if($users_view_instance->GetUserAddressExists($user_id, $address_type)){

                 echo "Address type has been added";

             }else{

                 include_once $classes_redirect."UsersController.php";

                 $users_controller_instance = new UsersController();

                 if($users_controller_instance->AddUserAddress($user_id, $address_type, $address, $city, $state, $zip_code)){

                    echo "Address added successfully";

                 }else{

                     echo "Error adding address. Try again";

                 }

             }

         }else{

             echo "Fill in all fields";

         }

     }else{

         echo "All fields not set";

     }

?>
