<?php

    require_once (dirname(__DIR__).'/classes/Feedback.php');

    class FeedbackController extends Feedback{

        public function AddFeedback($full_name, $subject, $message){

            return $this->AddFeedbackDB($full_name, $subject, $message);

        }

    }

?>
