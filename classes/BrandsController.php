<?php

    require_once (dirname(__DIR__).'/classes/Brands.php');

    class BrandsController extends Brands{

        public function AddBrand($brand_name){

            return $this->AddBrandDB($brand_name);

        }

    }

?>
