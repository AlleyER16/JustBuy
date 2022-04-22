<?php

require_once (dirname(__DIR__).'/classes/Users.php');

    class UsersView extends Users{

        public function GetNumUsers(){

            return $this->GetNumUsersDB();

        }

        public function GetUsers(){

            return $this->GetUsersDB();

        }

        public function GetAddressDatum($address_id, $datum_key){

            return $this->GetAddressDatumDB($address_id, $datum_key);

        }

        public function GetUserAddresses($user_id){

            return $this->GetUserAddressesDB($user_id);

        }

        public function GetUserAddressExists($user_id, $address_type){

            return $this->GetUserAddressExistsDB($user_id, $address_type);

        }

        public function UserExists($email_address, $password){

            return $this->UserExistsDB($email_address, $password);

        }

        public function GetUserID($email_address, $password){

            return $this->GetUserIDDB($email_address, $password);

        }

        public function EmailExists($email_address){

            return $this->EmailExistsDB($email_address);

        }

        public function UserExistsByID($user_id){

            return $this->UserExistsByIDDB($user_id);

        }

        public function GetUserDetails($user_id){

            return $this->GetUserDetailsDB($user_id);

        }

        public function GetUserDatum($user_id, $datum_key){

            return $this->GetUserDatumDB($user_id, $datum_key);

        }

        public function UserLoggedInVerified(){

            if(isset($_SESSION["user_logged"]) && !empty($_SESSION["user_logged"])){

                $user_id = $_SESSION["user_logged"];

                if($this->UserExistsByID($user_id)){

                    return true;

                }else{

                    return false;

                }

            }else{

                return false;

            }

        }

        public function GetUserLoggedID(){

            return $_SESSION["user_logged"];

        }

    }

?>
