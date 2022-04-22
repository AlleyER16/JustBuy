<?php

    require_once (dirname(__DIR__).'/classes/Dbh.config.php');

    class Users extends Dbh{

        private const USERS_TABLE = ["TableName" => "users"];
        private const USERS_INFO_TABLE = ["TableName" => "users_info"];
        private const USERS_ADDRESSES_TABLE = ["TableName" => "addresses"];

        public function GetUsersDB(){

            //database object
            $db_object = $this->GetConnection();

            //operations
            $sql = "SELECT * FROM ".self::USERS_TABLE["TableName"]." ORDER BY UserID DESC";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([]);

            return $prepared_statement->fetchAll();

        }

        public function GetNumUsersDB(){

            //database object
            $db_object = $this->GetConnection();

            //operations
            $sql = "SELECT UserID FROM ".self::USERS_TABLE["TableName"];
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([]);

            return $prepared_statement->rowCount();

        }

        public function GetUserAddressesDB($user_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitize variable
            $user_id = $this->SanitizeVariable($user_id);

            //operations
            $sql = "SELECT * FROM ".self::USERS_ADDRESSES_TABLE["TableName"]." WHERE UserID = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$user_id]);

            return $prepared_statement->fetchAll();

        }

        public function GetUserAddressExistsDB($user_id, $address_type){

            //database object
            $db_object = $this->GetConnection();

            //sanitize variable
            $user_id = $this->SanitizeVariable($user_id);
            $address_type = $this->SanitizeVariable($address_type);

            //operations
            $sql = "SELECT * FROM ".self::USERS_ADDRESSES_TABLE["TableName"]." WHERE UserID = ? AND AddressType = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$user_id, $address_type]);

            return ($prepared_statement->rowCount() == 1);

        }

        public function GetAddressDatumDB($address_id, $datum_key){

            //database object
            $db_object = $this->GetConnection();

            //sanitize variable
            $address_id = $this->SanitizeVariable($address_id);
            $datum_key = $this->SanitizeVariable($datum_key);

            //operations
            $sql = "SELECT $datum_key FROM ".self::USERS_ADDRESSES_TABLE["TableName"]." WHERE AddressID = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$address_id]);

            return $prepared_statement->fetchAll()[0][$datum_key];

        }

        public function AddUserAddressDB($user_id, $address_type, $address, $city, $state, $zip_code){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing variables
            $user_id = $this->SanitizeVariable($user_id);
            $address_type = $this->SanitizeVariable($address_type);
            $address = $this->SanitizeVariable($address);
            $city = $this->SanitizeVariable($city);
            $state = $this->SanitizeVariable($state);
            $zip_code = $this->SanitizeVariable($zip_code);

            //operations
            $sql = "INSERT INTO ".self::USERS_ADDRESSES_TABLE["TableName"]."(UserID, AddressType, Address, City, State, ZipCode) VALUES(?, ?, ?, ?, ?, ?)";
            $prepared_statement = $db_object->prepare($sql);

            return ($prepared_statement->execute([$user_id, $address_type, $address, $city, $state, $zip_code]));

        }

        public function UserExistsByIDDB($user_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $user_id = $this->SanitizeVariable($user_id);

            //operations
            $sql = "SELECT * FROM ".self::USERS_TABLE["TableName"]." WHERE UserID = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$user_id]);

            return ($prepared_statement->rowCount() == 1);

        }

        public function EmailExistsDB($email_address){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $email_address = $this->SanitizeVariable($email_address);

            //operations
            $sql = "SELECT * FROM ".self::USERS_TABLE["TableName"]." WHERE EmailAddress = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$email_address]);

            return ($prepared_statement->rowCount() == 1);

        }

        public function UserExistsDB($email_address, $password){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $email_address = $this->SanitizeVariable($email_address);
            $password = $this->SanitizeVariable($password);

            //operations
            $sql = "SELECT * FROM ".self::USERS_TABLE["TableName"]." WHERE EmailAddress = ? AND Password = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$email_address, $password]);

            return ($prepared_statement->rowCount() == 1);

        }

        public function GetUserIDDB($email_address, $password){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $email_address = $this->SanitizeVariable($email_address);
            $password = $this->SanitizeVariable($password);

            //operations
            $sql = "SELECT UserID FROM ".self::USERS_TABLE["TableName"]." WHERE EmailAddress = ? AND Password = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$email_address, $password]);

            return $prepared_statement->fetchAll()[0]["UserID"];

        }

        public function GetUserDetailsDB($user_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $user_id = $this->SanitizeVariable($user_id);

            //prepared_statement
            $sql = "SELECT * FROM ".self::USERS_TABLE["TableName"]." WHERE UserID = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$user_id]);

            return $prepared_statement->fetchAll()[0];

        }

        public function GetUserDatumDB($user_id, $datum_key){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $user_id = $this->SanitizeVariable($user_id);
            $datum_key = $this->SanitizeVariable($datum_key);

            //prepared_statement
            $sql = "SELECT $datum_key FROM ".self::USERS_TABLE["TableName"]." WHERE UserID = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$user_id]);

            return $prepared_statement->fetchAll()[0][$datum_key];

        }

        public function AddUserDB($first_name, $last_name, $email_address, $password){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $first_name = $this->SanitizeVariable($first_name);
            $last_name = $this->SanitizeVariable($last_name);
            $email_address = $this->SanitizeVariable($email_address);
            $password = $this->SanitizeVariable($password);

            //operations
            $sql = "INSERT INTO ".self::USERS_TABLE["TableName"]."(FirstName, LastName, EmailAddress, Password) VALUES(?, ?, ?, ?)";
            $prepared_statement = $db_object->prepare($sql);

            $acc_created_status = ($prepared_statement->execute([$first_name, $last_name, $email_address, $password]));

            if($acc_created_status){

                return [$acc_created_status, $db_object->lastInsertId()];

            }else{

                return [$acc_created_status];

            }

        }

        public function DeleteUserDB($user_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $user_id = $this->SanitizeVariable($user_id);

            //operations
            $sql = "DELETE FROM ".self::USERS_TABLE["TableName"]." WHERE UserID = ?";
            $prepared_statement = $conn->prepare($sql);

            return ($prepared_statement->execute([$user_id]));

        }

        public function UpdateUserDatumDB($user_id, $datum_key, $datum_value){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $user_id = $this->SanitizeVariable($user_id);
            $datum_key = $this->SanitizeVariable($datum_key);
            $datum_value = $this->SanitizeVariable($datum_value);

            //operations
            $sql = "UPDATE ".self::USERS_TABLE["TableName"]." SET $datum_key = ? WHERE UserID = ?";
            $prepared_statement = $db_object->prepare($sql);

            return ($prepared_statement->execute([$datum_value, $user_id]));

        }

    }

?>
