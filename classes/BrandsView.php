<?php

    require_once (dirname(__DIR__).'/classes/Brands.php');

    class BrandsView extends Brands{

        public function GetNumBrands(){

            return $this->GetNumBrandsDB();

        }

        public function BrandExistsByID($brand_id){

            return $this->BrandExistsByIDDB($brand_id);

        }

        public function BrandExistsByName($brand_name){

            return $this->BrandExistsByNameDB($brand_name);

        }

        public function GetBrandName($brand_id){

            return $this->GetBrandNameDB($brand_id);

        }

        public function GetBrands(){

            return $this->GetBrandsDB();

        }

    }

?>
