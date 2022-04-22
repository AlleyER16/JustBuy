<?php

    if(isset($_POST["first_name"]) && isset($_POST["last_name"]) &&
        isset($_POST["email_address"]) && isset($_POST["password"])){

        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email_address = $_POST["email_address"];
        $password = $_POST["password"];

        if(!empty($first_name) && !empty($last_name) &&
            !empty($email_address) && !empty($password)){

            $classes_redirect = "../classes/";

            include_once $classes_redirect."UsersView.php";

            $users_view_instance = new UsersView();

            if($users_view_instance->EmailExists($email_address)){

                echo "Email has been used";

            }else{

                include_once $classes_redirect."UsersController.php";

                $users_controller_instance = new UsersController();

                $user_add = $users_controller_instance->AddUserDB($first_name, $last_name, $email_address, $password);

                if($user_add[0]){

                    $user_id = $user_add[1];

                    $user_root_dir_path = "dc/users/".$user_id."/";

                    if(mkdir("../".$user_root_dir_path)){

                        session_start();

                        $_SESSION["user_logged"] = $user_id;

                        echo "Account Created Successfully";

                    }else{

                        $products_controller_instance->DeleteUser($user_id);

                        echo "Error adding product. Try again 2";

                    }

                }else{

                    echo "Error creating account. Try again";

                }

            }

        }else{

            echo "Fill in all fields";

        }

    }else{

        echo "All fields not set";

    }

?>
