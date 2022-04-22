<?php

    require_once (dirname(__DIR__).'/classes/Dbh.config.php');

    class Categories extends Dbh{

        private const CATEGORIES_TABLE = ["TableName" => "categories"];

        public function CategoryExistsByNameDB($category_name){

            //database object
            $db_object = $this->GetConnection();

            //operations
            $category_name = $this->SanitizeVariable($category_name);

            $sql = "SELECT CategoryID FROM ".self::CATEGORIES_TABLE["TableName"]." WHERE CategoryName = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$category_name]);

            return ($prepared_statement->rowCount() == 1);

        }

        public function GetCategoryNameDB($category_id){

            //database object
            $db_object = $this->GetConnection();

            //operations
            $category_id = $this->SanitizeVariable($category_id);

            $sql = "SELECT CategoryName FROM ".self::CATEGORIES_TABLE["TableName"]." WHERE CategoryID = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$category_id]);

            return $prepared_statement->fetchAll()[0]["CategoryName"];

        }

        public function GetCategoriesDB(){

            //database object
            $db_object = $this->GetConnection();

            //operations
            $categories = [];

            $sql = "SELECT * FROM ".self::CATEGORIES_TABLE["TableName"]." ORDER By CategoryID DESC";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([]);

            $categories = $prepared_statement->fetchAll();

            return $categories;

        }

        public function GetNumCategoriesDB(){

            //database object
            $db_object = $this->GetConnection();

            //operations
            $sql = "SELECT CategoryID FROM ".self::CATEGORIES_TABLE["TableName"];
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([]);

            return $prepared_statement->rowCount();

        }

        public function AddCategoryDB($category_name){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $category_name = $this->SanitizeVariable($category_name);

            //operations
            $sql = "INSERT INTO ".self::CATEGORIES_TABLE["TableName"]."(CategoryName) VALUES (?)";
            $prepared_statement = $db_object->prepare($sql);

            return $prepared_statement->execute([$category_name]);

        }

    }

?>
