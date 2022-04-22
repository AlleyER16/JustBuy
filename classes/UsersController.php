<?php

    require_once (dirname(__DIR__).'/classes/Users.php');

    class UsersController extends Users{

        public function AddUserAddress($user_id, $address_type, $address, $city, $state, $zip_code){

            return $this->AddUserAddressDB($user_id, $address_type, $address, $city, $state, $zip_code);

        }

        public function AddUserDirectories($user_id){

            return $this->AddUserDirectoriesDB($user_id);

        }

        public function AddUser($first_name, $last_name, $email_address, $password){

            return $this->AddUserDB($first_name, $last_name, $email_address, $password);

        }

        public function DeleteUser($user_id){

            return $this->DeleteUserDB($user_id);

        }

        public function UpdateUserDatum($user_id, $datum_key, $datum_value){

            return $this->UpdateUserDatumDB($user_id, $datum_key, $datum_value);

        }

    }

?>
