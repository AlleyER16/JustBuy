<?php

    require_once (dirname(__DIR__).'/classes/Feedback.php');

    class FeedbackView extends Feedback{

        public function GetFeedbacks(){

            return $this->GetFeedbacksDB();

        }

        public function GetNumFeedbacks(){

            return $this->GetNumFeedbacksDB();

        }

    }

?>
