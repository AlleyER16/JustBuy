<?php

	require_once (dirname(__DIR__).'/classes/Products.php');

	class ProductsController extends Products{

		public function UpdateCartDatum($cart_id, $datum_key, $datum_value){

            return $this->UpdateCartDatumDB($cart_id, $datum_key, $datum_value);

        }

		public function AddNewUserCart($user_id){

            return $this->AddNewUserCartDB($user_id);

        }

		public function RemoveProductFromWishlist($user_id, $product_id){

            return $this->RemoveProductFromWishlistDB($user_id, $product_id);

        }

		public function RemoveProductFromCart($cart_id, $product_id){

            return $this->RemoveProductFromCartDB($cart_id, $product_id);

        }

		public function UpdateBillingDatum($cart_id, $product_id, $datum_key, $datum_value){

            return $this->UpdateBillingDatumDB($cart_id, $product_id, $datum_key, $datum_value);

        }

		public function AddProductToWishlist($user_id, $product_id){

            return $this->AddProductToWishlistDB($user_id, $product_id);

        }

        public function AddProductToCart($cart_id, $product_id, $price, $quantity){

            return $this->AddProductToCartDB($cart_id, $product_id, $price, $quantity);

        }

		public function DeleteProduct($product_id){

            return $this->DeleteProductDB($product_id);

        }

		public function AddProduct($product_name, $product_description, $price, $stock, $brand_id, $category_id, $launch_date){

        	return $this->AddProductDB($product_name, $product_description, $price, $stock, $brand_id, $category_id, $launch_date);

        }

        public function UpdateProductDatum($product_id, $datum_key, $datum_value){

            return $this->UpdateProductDatumDB($product_id, $datum_key, $datum_value);

        }

	}

?>
