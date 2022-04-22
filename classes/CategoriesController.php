<?php

    require_once (dirname(__DIR__).'/classes/Categories.php');

    class CategoriesController extends Categories{

        public function AddCategory($category_name){

            return $this->AddCategoryDB($category_name);

        }

    }

?>
