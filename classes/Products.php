<?php

    require_once (dirname(__DIR__).'/classes/Dbh.config.php');

    class Products extends Dbh{

        private const PRODUCTS_TABLE = ["TableName" => "products"];
        private const CARTS_TABLE = ["TableName" => "carts"];
        private const WISHLISTS_TABLE = ["TableName" => "wishlists"];
        private const BILLINGS_TABLE = ["TableName" => "billing"];

        public function UserHasCartDB($user_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing variables
            $user_id = $this->SanitizeVariable($user_id);

            //operations
            $sql = "SELECT CartID FROM ".self::CARTS_TABLE["TableName"]." WHERE UserID = ? AND ISNULL(IsOrder) AND Paid = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$user_id, 0]);

            $user_has_cart = ($prepared_statement->rowCount() == 1);

            if($user_has_cart){

                return [$user_has_cart, $prepared_statement->fetchAll()[0]["CartID"]];

            }else{

                return [$user_has_cart];

            }

        }

        public function GetOrdersDB($user_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing variables
            $user_id = $this->SanitizeVariable($user_id);

            //operations
            $sql = "SELECT * FROM ".self::CARTS_TABLE["TableName"]." WHERE UserID = ? AND IsOrder = ? AND Paid = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$user_id, 1, 0]);

            return $prepared_statement->fetchAll() ;

		}

        public function GetPurchasedCartsDB($user_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing variables
            $user_id = $this->SanitizeVariable($user_id);

            //operations
            $sql = "SELECT * FROM ".self::CARTS_TABLE["TableName"]." WHERE UserID = ? AND ISNULL(IsOrder) AND Paid = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$user_id, 1]);

            return $prepared_statement->fetchAll();

		}

        public function InUserCartDB($cart_id, $product_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $cart_id = $this->SanitizeVariable($cart_id);
            $product_id = $this->SanitizeVariable($product_id);

            //operations
            $sql = "SELECT ProductID FROM ".self::BILLINGS_TABLE["TableName"]." WHERE ProductID = ? AND CartID = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$product_id, $cart_id]);

            return ($prepared_statement->rowCount() == 1);

        }


        public function GetBillingDetailsDB($cart_id, $product_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $cart_id = $this->SanitizeVariable($cart_id);
            $product_id = $this->SanitizeVariable($product_id);

            //operations
            $sql = "SELECT * FROM ".self::BILLINGS_TABLE["TableName"]." WHERE ProductID = ? AND CartID = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$product_id, $cart_id]);

            return $prepared_statement->fetchAll()[0];

        }

        public function UpdateBillingDatumDB($cart_id, $product_id, $datum_key, $datum_value){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $cart_id = $this->SanitizeVariable($cart_id);
            $product_id = $this->SanitizeVariable($product_id);
            $datum_key = $this->SanitizeVariable($datum_key);
            $datum_value = $this->SanitizeVariable($datum_value);

            //sql
            $sql = "UPDATE ".self::BILLINGS_TABLE["TableName"]." SET $datum_key = ? WHERE CartID = ? AND ProductID = ?";
            $prepared_statement = $db_object->prepare($sql);

            return ($prepared_statement->execute([$datum_value, $cart_id, $product_id]));

        }


        public function InUserWishlistDB($user_id, $product_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $user_id = $this->SanitizeVariable($user_id);
            $product_id = $this->SanitizeVariable($product_id);

            //operations
            $sql = "SELECT * FROM ".self::WISHLISTS_TABLE["TableName"]." WHERE UserID = ? AND ProductID = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$user_id, $product_id]);

            return ($prepared_statement->rowCount() == 1);

        }

        public function GetNumWishlistProductsDB($user_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing variables
            $user_id = $this->SanitizeVariable($user_id);

            //operations
            $sql = "SELECT ProductID FROM ".self::WISHLISTS_TABLE["TableName"]." WHERE UserID = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$user_id]);

            return $prepared_statement->rowCount();

        }


        public function GetNumCartProductsDB($cart_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing variables
            $cart_id = $this->SanitizeVariable($cart_id);

            //operations
            $sql = "SELECT ProductID FROM ".self::BILLINGS_TABLE["TableName"]." WHERE CartID = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$cart_id]);

            return $prepared_statement->rowCount();

        }

        public function GetTotalCartBillDB($cart_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing variables
            $cart_id = $this->SanitizeVariable($cart_id);

            //operations
            $sql = "SELECT Sum(BillAmount) AS Sum FROM ".self::BILLINGS_TABLE["TableName"]." WHERE CartID = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$cart_id]);

            return $prepared_statement->fetchAll()[0]["Sum"];

		}


        public function GetCartProductsDB($cart_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing variables
            $cart_id = $this->SanitizeVariable($cart_id);

            //operations
            $sql = "SELECT * FROM ".self::BILLINGS_TABLE["TableName"]." WHERE CartID = ? ORDER BY DateTimeAdded DESC";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$cart_id]);

            return $prepared_statement->fetchAll();

        }


        public function UpdateCartDatumDB($cart_id, $datum_key, $datum_value){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $cart_id = $this->SanitizeVariable($cart_id);
            $datum_key = $this->SanitizeVariable($datum_key);
            $datum_value = $this->SanitizeVariable($datum_value);

            //operations
            $sql = "UPDATE ".self::CARTS_TABLE["TableName"]." SET $datum_key = ? WHERE CartID = ?";
            $prepared_statement = $db_object->prepare($sql);

            return ($prepared_statement->execute([$datum_value, $cart_id]));

        }


        public function GetWishlistProductsDB($user_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing variables
            $user_id = $this->SanitizeVariable($user_id);

            //operations
            $sql = "SELECT * FROM ".self::WISHLISTS_TABLE["TableName"]." WHERE UserID = ? ORDER BY DateTimeAdded DESC";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$user_id]);

            return $prepared_statement->fetchAll();

        }

        public function AddNewUserCartDB($user_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing variables
            $user_id = $this->SanitizeVariable($user_id);

            //operations
            $sql = "INSERT INTO ".self::CARTS_TABLE["TableName"]."(UserID, Paid) VALUES(?, ?)";
            $prepared_statement = $db_object->prepare($sql);

            $user_cart_added = ($prepared_statement->execute([$user_id, 0]));

            if($user_cart_added){

                return [$user_cart_added, $db_object->lastInsertId()];

            }else{

                return [$user_cart_added];

            }

        }

        public function AddProductToCartDB($cart_id, $product_id, $price, $quantity){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $cart_id = $this->SanitizeVariable($cart_id);
            $product_id = $this->SanitizeVariable($product_id);
            $price = $this->SanitizeVariable($price);
            $quantity = $this->SanitizeVariable($quantity);

            //operations
            $sql = "INSERT INTO ".self::BILLINGS_TABLE["TableName"]."(CartID, ProductID, Price, Quantity, BillAmount, DateTimeAdded) VALUES(?, ?, ?, ?, ?, ?)";
            $prepared_statement = $db_object->prepare($sql);

            return ($prepared_statement->execute([$cart_id, $product_id, $price, $quantity, $price*$quantity, time()]));

        }

        public function RemoveProductFromCartDB($cart_id, $product_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $cart_id = $this->SanitizeVariable($cart_id);
            $product_id = $this->SanitizeVariable($product_id);

            //operations
            $sql = "DELETE FROM ".self::BILLINGS_TABLE["TableName"]." WHERE CartID = ? AND ProductID = ?";
            $prepared_statement = $db_object->prepare($sql);

            return ($prepared_statement->execute([$cart_id, $product_id]));

        }


        public function AddProductToWishlistDB($user_id, $product_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $user_id = $this->SanitizeVariable($user_id);
            $product_id = $this->SanitizeVariable($product_id);

            //operations
            $sql = "INSERT INTO ".self::WISHLISTS_TABLE["TableName"]."(UserID, ProductID, DateTimeAdded) VALUES(?, ?, ?)";
            $prepared_statement = $db_object->prepare($sql);

            return ($prepared_statement->execute([$user_id, $product_id, time()]));

        }

        public function RemoveProductFromWishlistDB($user_id, $product_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $user_id = $this->SanitizeVariable($user_id);
            $product_id = $this->SanitizeVariable($product_id);

            //operations
            $sql = "DELETE FROM ".self::WISHLISTS_TABLE["TableName"]." WHERE UserID = ? AND ProductID = ?";
            $prepared_statement = $db_object->prepare($sql);

            return ($prepared_statement->execute([$user_id, $product_id]));

        }

        public function GetProductDetailsDB($product_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing variables
            $product_id = $this->SanitizeVariable($product_id);

            //operations
            $sql = "SELECT * FROM ".self::PRODUCTS_TABLE["TableName"]." WHERE ProductID = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$product_id]);

            return ($prepared_statement->fetchAll()[0]);

        }

        public function GetProductDatumDB($product_id, $datum_key){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing variables
            $product_id = $this->SanitizeVariable($product_id);
            $datum_key = $this->SanitizeVariable($datum_key);

            //operations
            $sql = "SELECT $datum_key FROM ".self::PRODUCTS_TABLE["TableName"]." WHERE ProductID = ?";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([$product_id]);

            return ($prepared_statement->fetchAll()[0][$datum_key]);

        }

        public function GetProductsDB(){

            //database object
            $db_object = $this->GetConnection();

            //operations
            $products = [];

            $sql = "SELECT * FROM ".self::PRODUCTS_TABLE["TableName"]." ORDER By ProductID DESC";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([]);

            $products = $prepared_statement->fetchAll();

            return $products;

        }

        public function GetNumProductsDB(){

            //database object
            $db_object = $this->GetConnection();

            //operations
            $sql = "SELECT ProductID FROM ".self::PRODUCTS_TABLE["TableName"];
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([]);

            return $prepared_statement->rowCount();

        }

        public function GetLimitedProductsDB($limit){

            //database object
            $db_object = $this->GetConnection();

            //sanitize variables
            $limit = $this->SanitizeVariable($limit);

            //operations
            $products = [];

            $sql = "SELECT * FROM ".self::PRODUCTS_TABLE["TableName"]." ORDER By ProductID DESC LIMIT $limit";
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([]);

            $products = $prepared_statement->fetchAll();

            return $products;

        }

        public function GetCategoryQueryDB($category){

            $category_query = "";

            switch($category){

                case "all":
                    $category_query = 1;
                    break;
                default:
                    $category_query = "Category = " . $category;

            }

            return $category_query;

        }

        public function GetBrandQueryDB($brand){

            $brand_query = "";

            switch($brand){

                case "all":
                    $brand_query = 1;
                    break;
                default:
                    $brand_query = "Brand = " . $brand;

            }

            return $brand_query;

        }

        public function GetSearchQueryDB($search_keyword){

            $search_query = "";

            switch($search_keyword){

                case "all":
                    $search_query = 1;
                    break;
                default:
                    $search_query = "Name LIKE '%" . $search_keyword . "%'";

            }

            return $search_query;

        }

        public function GetPriceQueryDB($price){

            $price_query = "";

            switch($price){

                case "all":
                    $price_query = 1;
                    break;
                case "1":
                    $price_query = "Price < " . 20;
                    break;
                case "2":
                    $price_query = "Price >= " . 20 . " AND Price <= " . 50;
                    break;
                case "3":
                    $price_query = "Price >= " . 51 . " AND Price <= " . 100;
                    break;
                case "4":
                    $price_query = "Price > " . 100;
                    break;


            }

            return $price_query;

        }

        public function AdvancedGetProductsDB($category, $brand, $price, $search_keyword){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing variables
            $category = $this->SanitizeVariable($category);
            $brand = $this->SanitizeVariable($brand);
            $price = $this->SanitizeVariable($price);
            $search_keyword = $this->SanitizeVariable($search_keyword);

            //operations
            $sql = "SELECT * FROM ".self::PRODUCTS_TABLE["TableName"]." WHERE ".$this->GetCategoryQueryDB($category)." AND ".$this->GetBrandQueryDB($brand)." AND ".$this->GetPriceQueryDB($price)." AND ".$this->GetSearchQueryDB($search_keyword);
            $prepared_statement = $db_object->prepare($sql);
            $prepared_statement->execute([]);

            return $prepared_statement->fetchAll();

        }

        public function GetNumCategoryProductsDB($category_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $category_id = $this->SanitizeVariable($category_id);

            //operations
            $sql = "SELECT * FROM ".self::PRODUCTS_TABLE["TableName"]." WHERE Category = ?";
            $prepared_statement = $db_object -> prepare($sql);
            $prepared_statement->execute([$category_id]);

            return $prepared_statement->rowCount();

        }

        public function GetNumBrandProductsDB($brand_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $brand_id = $this->SanitizeVariable($brand_id);

            //operations
            $sql = "SELECT * FROM ".self::PRODUCTS_TABLE["TableName"]." WHERE Brand = ?";
            $prepared_statement = $db_object -> prepare($sql);
            $prepared_statement->execute([$brand_id]);

            return $prepared_statement->rowCount();

		}

        public function GetBrandProductsDB($brand_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $brand_id = $this->SanitizeVariable($brand_id);

            //operations
            $sql = "SELECT * FROM ".self::PRODUCTS_TABLE["TableName"]." WHERE Brand = ?";
            $prepared_statement = $db_object -> prepare($sql);
            $prepared_statement->execute([$brand_id]);

            return $prepared_statement->fetchAll();

		}

        public function ProductExistsByIDDB($product_id){

            //database object
            $db_object = $this->GetConnection();

            //sanitizing fields
            $product_id = $this->SanitizeVariable($product_id);

            //operations
            $sql = "SELECT * FROM ".self::PRODUCTS_TABLE["TableName"]." WHERE ProductID = ?";
            $prepared_statement = $db_object -> prepare($sql);
            $prepared_statement->execute([$product_id]);

            return ($prepared_statement->rowCount() == 1);

        }

        public function AddProductDB($product_name, $product_description, $price, $stock, $brand_id, $category_id, $launch_date){

            //database object
            $db_object = $this->GetConnection();

            //sanitize fields
            $product_name = $this->SanitizeVariable($product_name);
            $product_description = $this->SanitizeVariable($product_description);
            $price = $this->SanitizeVariable($price);
            $stock = $this->SanitizeVariable($stock);
            $brand_id = $this->SanitizeVariable($brand_id);
            $category_id = $this->SanitizeVariable($category_id);
            $launch_date = $this->SanitizeVariable($launch_date);

            //operation
            $sql = "INSERT INTO ".self::PRODUCTS_TABLE["TableName"]."(Name, Description, Price, Stock,
            Brand, Category, LaunchDate) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $prepared_statement = $db_object->prepare($sql);

            $product_added = ($prepared_statement->execute([$product_name, $product_description, $price, $stock, $brand_id, $category_id, $launch_date]));

            if($product_added){

                return [$product_added, $db_object->lastInsertId()];

            }else{

                return [$product_added];

            }

        }

        public function UpdateProductDatumDB($product_id, $datum_key, $datum_value){

            //database connection
            $db_object = $this->GetConnection();

            //sanitizing fields
            $product_id = $this->SanitizeVariable($product_id);
            $datum_key = $this->SanitizeVariable($datum_key);
            $datum_value = $this->SanitizeVariable($datum_value);

            //operations
            $sql = "UPDATE ".self::PRODUCTS_TABLE["TableName"]." SET $datum_key = ? WHERE ProductID = ?";
            $prepared_statement = $db_object->prepare($sql);

            return ($prepared_statement->execute([$datum_value, $product_id]));

        }

        public function DeleteProductDB($product_id){

            //database connection
            $db_object = $this->GetConnection();

            //sanitizing fields
            $product_id = $this->SanitizeVariable($product_id);

            //operations
            $sql = "DELETE FROM ".self::PRODUCTS_TABLE["TableName"]." WHERE ProductID = ?";
            $prepared_statement = $db_object->prepare($sql);

            return ($prepared_statement->execute([$product_id]));

        }

    }

?>
