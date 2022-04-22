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

    if(isset($_POST["o_pwd"]) && isset($_POST["n_pwd"])){

        $o_pwd = $_POST["o_pwd"];
        $n_pwd = $_POST["n_pwd"];

        if(!empty($o_pwd) && !empty($n_pwd)){

            if($o_pwd == $users_view_instance->GetUserDatum($user_id, "Password")){

                include_once $classes_redirect."UsersController.php";

                $users_controller_instance = new UsersController();

                if($users_controller_instance->UpdateUserDatum($user_id, "Password", $n_pwd)){

                    echo "Password changed successfully";

                }else{

                    echo "Error changing password. Try again";

                }

            }else{

                echo "Inputed old password does not match current password";

            }

        }else{

            echo "Fill in all fields";

        }

    }else{

        echo "An error occurred. Try again";

    }

?>
