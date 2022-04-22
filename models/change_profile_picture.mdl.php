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

    if(isset($_FILES["profile_picture"])){

        $profile_picture = $_FILES["profile_picture"];

        if(!empty($profile_picture)){

            $destination_dir = "dc/users/".$user_id."/";

            if(move_uploaded_file($profile_picture["tmp_name"], "../".$destination_dir.$profile_picture["name"])){

                $file_path = $destination_dir.$profile_picture["name"];

                include_once $classes_redirect."UsersController.php";

                $users_controller_instance = new UsersController();

                if($users_controller_instance->UpdateUserDatum($user_id, "ProfilePicture", $file_path)){

                    echo "Profile picture updated successfully";

                }else{

                    echo "Error updating profile picture. Try again.";

                }

            }else{

                echo "Error uploading file. Try again.";

            }

        }else{

            echo "Fill in all fields";

        }

    }else{

        echo "An error occurred. Try again";

    }

?>
