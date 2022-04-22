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

    if(isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["email_address"])){

        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email_address = $_POST["email_address"];

        include_once $classes_redirect."UsersController.php";

        $users_controller_instance = new UsersController();

        if(!empty($first_name)){

            if($users_controller_instance->UpdateUserDatum($user_id, "FirstName", $first_name)){

                echo "First Name Updated Successfully<br/>";

            }else{

                echo "Error changing first name. Try again<br/>";

            }

        }

        if(!empty($last_name)){

            if($users_controller_instance->UpdateUserDatum($user_id, "LastName", $last_name)){

                echo "Last Name Updated Successfully<br/>";

            }else{

                echo "Error changing last name. Try again<br/>";

            }

        }

        if(!empty($email_address)){

            if($email_address == $users_view_instance->GetUserDatum($user_id, "EmailAddress")){

                echo "Inputed email address is the same as current email address<br/>";

            }else{

                if($users_view_instance->EmailExists($email_address)){

                    echo "Inputed email address has been used<br/>";

                }else{

                    if($users_controller_instance->UpdateUserDatum($user_id, "EmailAddress", $email_address)){

                        echo "Email Address Updated Successfully<br/>";

                    }else{

                        echo "Error changing email address. Try again<br/>";

                    }

                }

            }

        }

    }else{

        echo "An error occurred. Try again";

    }

?>
