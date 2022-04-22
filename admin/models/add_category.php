<?php

    if(isset($_POST["category_name"]) && !empty($_POST["category_name"])){

        $category_name = $_POST["category_name"];

        $classes_redirect = "../../classes/";

        include_once $classes_redirect."CategoriesView.php";

        $categories_view_instance = new CategoriesView();

        if($categories_view_instance->CategoryExistsByName($category_name)){

            echo "Category exists with inputed name";

        }else{

            include_once $classes_redirect."CategoriesController.php";

            $categories_controller_instance = new CategoriesController();

            if($categories_controller_instance->AddCategory($category_name)){

                echo "Category Added Successfully";

            }else{

                echo "Error adding category";

            }

        }

    }else{

        echo "Fill in all fields";

    }

?>
