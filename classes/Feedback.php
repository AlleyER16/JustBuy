<?php

    require_once (dirname(__DIR__).'/classes/Dbh.config.php');

    class Feedback extends Dbh{

        private const FEEDBACKS_TABLE = ["TableName" => "feedbacks"];

        public function GetFeedbacksDB(){

            //database object
            $db_object = $this->GetConnection();

            //operations
            $sql = "SELECT * FROM ".self::FEEDBACKS_TABLE["TableName"];
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([]);

            return $prepared_statement->fetchAll();

        }

        public function GetNumFeedbacksDB(){

            //database object
            $db_object = $this->GetConnection();

            //operations
            $sql = "SELECT FeedbackID FROM ".self::FEEDBACKS_TABLE["TableName"];
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([]);

            return $prepared_statement->rowCount();

        }

        public function AddFeedbackDB($full_name, $subject, $message){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $full_name = $this->SanitizeVariable($full_name);
            $subject = $this->SanitizeVariable($subject);
            $message = $this->SanitizeVariable($message);

            //operations
            $sql = "INSERT INTO ".self::FEEDBACKS_TABLE["TableName"]."(FullName, Subject, Message) VALUES(?, ?, ?)";
            $prepared_statement = $db_object->prepare($sql);

            return ($prepared_statement->execute([$full_name, $subject, $message]));

        }

    }

?>
