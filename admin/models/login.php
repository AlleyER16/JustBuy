<?php

    if(isset($_POST["email"]) && isset($_POST["password"])){

        $email = $_POST["email"];
        $password = $_POST["password"];

        if(!empty($email) && !empty($password)){

            if($email == "admin@justbuy.com" && $password == "admin"){

                session_start();

                $_SESSION["admin_logged"] = true;

                echo "Authenticated";

            }else{

                echo "Invalid login credentials";

            }

        }else{

            echo "Fill in all fields";

        }

    }else{

        echo "All fields not set";

    }

?>
