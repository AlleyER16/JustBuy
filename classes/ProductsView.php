<?php

	require_once (dirname(__DIR__).'/classes/Products.php');

	class ProductsView extends Products{

		public function GetNumProducts(){

            return $this->GetNumProductsDB();

        }

		public function GetOrders($user_id){

			return $this->GetOrdersDB($user_id);

		}

		public function GetPurchasedCarts($user_id){

			return $this->GetPurchasedCartsDB($user_id);

		}

		public function GetBillingDetails($cart_id, $product_id){

            return $this->GetBillingDetailsDB($cart_id, $product_id);

        }

		public function InUserWishlist($user_id, $product_id){

            return $this->InUserWishlistDB($user_id, $product_id);

        }

        public function GetNumWishlistProducts($user_id){

            return $this->GetNumWishlistProductsDB($user_id);

        }

		public function UserHasCart($user_id){

            return $this->UserHasCartDB($user_id);

        }

        public function InUserCart($cart_id, $product_id){

            return $this->InUserCartDB($cart_id, $product_id);

        }

        public function GetNumCartProducts($cart_id){

            return $this->GetNumCartProductsDB($cart_id);

        }

		public function GetTotalCartBill($cart_id){

			return $this->GetTotalCartBillDB($cart_id);

		}

        public function GetLimitedCartProducts($cart_id, $limit){

            return $this->GetLimitedCartProductsDB($cart_id, $limit);

        }

        public function GetCartProducts($cart_id){

            return $this->GetCartProductsDB($cart_id);

        }

		public function GetWishlistProducts($user_id){

            return $this->GetWishlistProductsDB($user_id);

        }

		public function GetProductDatum($product_id, $datum_key){

            return $this->GetProductDatumDB($product_id, $datum_key);

        }

		public function GetProductDetails($product_id){

            return $this->GetProductDetailsDB($product_id);

        }

		public function GetProducts(){

            return $this->GetProductsDB();

        }

		public function GetBrandProducts($brand_id){

            return $this->GetBrandProductsDB($brand_id);

		}

		public function GetLimitedProducts($limit){

            return $this->GetLimitedProductsDB($limit);

        }

		public function AdvancedGetProducts($category, $brand, $price, $search_keyword){

            return $this->AdvancedGetProductsDB($category, $brand, $price, $search_keyword);

        }

		public function GetNumCategoryProducts($category_id){

			return $this->GetNumCategoryProductsDB($category_id);

		}

		public function GetNumBrandProducts($brand_id){

			return $this->GetNumBrandProductsDB($brand_id);

		}

        public function ProductExistsByID($product_id){

            return $this->ProductExistsByIDDB($product_id);

        }

	}

?>
