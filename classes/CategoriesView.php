<?php

    require_once (dirname(__DIR__).'/classes/Categories.php');

    class CategoriesView extends Categories{

        public function GetNumCategories(){

            return $this->GetNumCategoriesDB();

        }

        public function GetCategoryName($category_id){

            return $this->GetCategoryNameDB($category_id);

        }

        public function CategoryExistsByName($category_name){

            return $this->CategoryExistsByNameDB($category_name);

        }

        public function GetCategories(){

            return $this->GetCategoriesDB();

        }

    }

?>
