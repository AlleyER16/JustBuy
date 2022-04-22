<?php

    require_once (dirname(__DIR__).'/classes/Dbh.config.php');

    class Brands extends Dbh{

        private const BRANDS_TABLE = ["TableName" => "brands"];

        public function BrandExistsByNameDB($brand_name){

            //database object
            $db_object = $this->GetConnection();

            //operations
            $brand_name = $this->SanitizeVariable($brand_name);

            $sql = "SELECT BrandID FROM ".self::BRANDS_TABLE["TableName"]." WHERE BrandName = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$brand_name]);

            return ($prepared_statement->rowCount() == 1);

        }

        public function BrandExistsByIDDB($brand_id){

            //database object
            $db_object = $this->GetConnection();

            //operations
            $brand_id = $this->SanitizeVariable($brand_id);

            $sql = "SELECT BrandID FROM ".self::BRANDS_TABLE["TableName"]." WHERE BrandID = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$brand_id]);

            return ($prepared_statement->rowCount() == 1);

        }

        public function GetBrandNameDB($brand_id){

            //database object
            $db_object = $this->GetConnection();

            //operations
            $brand_id = $this->SanitizeVariable($brand_id);

            $sql = "SELECT BrandName FROM ".self::BRANDS_TABLE["TableName"]." WHERE BrandID = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$brand_id]);

            return $prepared_statement->fetchAll()[0]["BrandName"];

        }

        public function GetBrandsDB(){

            //database object
            $db_object = $this->GetConnection();

            //operations
            $brands = [];

            $sql = "SELECT * FROM ".self::BRANDS_TABLE["TableName"]." ORDER By BrandID DESC";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([]);

            $brands = $prepared_statement->fetchAll();

            return $brands;

        }

        public function GetNumBrandsDB(){

            //database object
            $db_object = $this->GetConnection();

            //operations
            $sql = "SELECT BrandID FROM ".self::BRANDS_TABLE["TableName"];
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([]);

            return $prepared_statement->rowCount();

        }

        public function AddBrandDB($brand_name){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $brand_name = $this->SanitizeVariable($brand_name);

            //operations
            $sql = "INSERT INTO ".self::BRANDS_TABLE["TableName"]."(BrandName) VALUES (?)";
            $prepared_statement = $db_object->prepare($sql);

            return $prepared_statement->execute([$brand_name]);

        }

    }

?>
