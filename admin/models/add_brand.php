<?php

    if(isset($_POST["brand_name"]) && !empty($_POST["brand_name"])){

        $brand_name = $_POST["brand_name"];

        $classes_redirect = "../../classes/";

        include_once $classes_redirect."BrandsView.php";

        $brands_view_instance = new BrandsView();

        if($brands_view_instance->BrandExistsByName($brand_name)){

            echo "Brand exists with inputed name";

        }else{

            include_once $classes_redirect."BrandsController.php";

            $brands_controller_instance = new BrandsController();

            if($brands_controller_instance->AddBrand($brand_name)){

                echo "Brand Added Successfully";

            }else{

                echo "Error adding category";

            }

        }

    }else{

        echo "Fill in all fields";

    }

?>
