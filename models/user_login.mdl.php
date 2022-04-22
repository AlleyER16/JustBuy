<?php

    if(isset($_POST["email_address"]) && isset($_POST["password"])){

        $email_address = $_POST["email_address"];
        $password = $_POST["password"];

        if(!empty($email_address) && !empty($password)){

            $classes_redirect = "../classes/";

            include_once $classes_redirect."UsersView.php";

            $users_view_instance = new UsersView();

            if($users_view_instance->UserExists($email_address, $password)){

                session_start();

                $_SESSION["user_logged"] = $users_view_instance->GetUserID($email_address, $password);

                echo "Account Verified";

            }else{

                echo "Invalid email address or password";

            }

        }else{

            echo "Fill in all fields";

        }

    }else{

        echo "All fields not set";

    }

?>
