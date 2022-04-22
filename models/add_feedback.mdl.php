<?php

    if(isset($_POST["full_name"]) && isset($_POST["subject"]) && isset($_POST["message"])){

        $full_name = $_POST["full_name"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        if(!empty($full_name) && !empty($subject) && !empty($message)){

            $classes_redirect = "../classes/";

            include_once $classes_redirect."FeedbackController.php";

            $feedback_controller_instance = new FeedbackController();

            if($feedback_controller_instance->AddFeedback($full_name, $subject, $message)){

                echo "Feedback sent successfully";

            }else{

                echo "Error adding feedback. Try again";

            }

        }else{

            echo "Fill in all fields";

        }

    }else{

        echo "All fields not set";

    }

?>
