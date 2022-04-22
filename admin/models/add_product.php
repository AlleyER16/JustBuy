<?php

    function recursive_rmdir($dir){

        if(is_dir($dir)){

            $objects = scandir($dir);

            foreach($objects as $object){

                if($object != "." && $object != ".."){

                    $path = $dir. DIRECTORY_SEPARATOR .$object;

                    if(is_dir($path) && !is_link($path)){

                        recursive_rmdir($path);

                    }else {

                        unlink($path);

                    }

                }

            }

            recursive_rmdir($dir);

        }

    }

    if(isset($_POST["product_name"]) && isset($_POST["description"]) && isset($_POST["price"])
    && isset($_POST["stock"]) && isset($_FILES["image"]) && isset($_POST["launch_date"])
    && isset($_POST["category"]) && isset($_POST["brand"])){

        $product_name = $_POST["product_name"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $stock = $_POST["stock"];
        $image = $_FILES["image"];
        $launch_date = $_POST["launch_date"];
        $category = $_POST["category"];
        $brand = $_POST["brand"];

        if(!empty($product_name) && !empty($description) && !empty($price) && !empty($stock)
        && !empty($image) && !empty($launch_date) && $category >= 1 && $brand >= 1){

            $classes_redirect = "../../classes/";

            require_once $classes_redirect."ProductsController.php";

            $products_controller_instance = new ProductsController();

            $add_product = $products_controller_instance->AddProduct($product_name, $description, $price, $stock, $brand, $category, strtotime($launch_date));

            if($add_product[0]){

                $product_id = $add_product[1];

                $product_root_dir_path = "dc/products/".$product_id."/";

                if(mkdir("../../".$product_root_dir_path)){

                    if(move_uploaded_file($image["tmp_name"], "../../".$product_root_dir_path.$image["name"])){

                        $product_image = $product_root_dir_path.$image["name"];

                        if($products_controller_instance->UpdateProductDatum($product_id, "Image", $product_image)){

                            echo "Product added successfully";

                        }else{

                            recursive_rmdir($classes_redirect.$product_root_dir_path);

                            $products_controller_instance->DeleteProduct($product_id);

                            echo "Error adding product. Try again 4";

                        }

                    }else{

                        recursive_rmdir($classes_redirect.$product_root_dir_path);

                        $products_controller_instance->DeleteProduct($product_id);

                        echo "Error adding product. Try again 3";

                    }

                }else{

                    $products_controller_instance->DeleteProduct($product_id);

                    echo "Error adding product. Try again 2";

                }

            }else{

                echo "Error adding product. Try again 1";

            }

        }else{

            echo "Fill in all fields";

        }

    }else{

        echo "All fields not set";

    }

?>
