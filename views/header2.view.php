<div class="header2 container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-2" style="padding-top: 8px;">
                        <h1 class="site-name">J<?php $app_conf->get_font_awesome_icon("fas fa-shopping-cart"); ?></h1>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-6 search-form">
                        <div class="row">
                            <div class="col-3" style="padding: 0px;">
                                <select name="category" class="form-control r-form d_search_category">
                                    <option value="all">All</option>
                                    <?php
                                        $active_categories = $categories_view_instance->GetCategories("all");

                                        foreach($active_categories as $category){

                                            $category_name = $category["CategoryName"];
                                            $category_id = $category["CategoryID"];

                                            ?>
                                            <option value="<?php echo $category_id; ?>"><?php echo $category_name; ?></option>
                                            <?php

                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-7" style="padding: 0px;">
                                <input type="text" placeholder="Search for products..." class="form-control r-form d_search_keyword"/>
                            </div>
                            <div class="col-2" style="padding: 0px;">
                                <button type="button" class="btn btn-outline-primary btn-block r-form d_search_btn"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 text-right" style="padding-top: 15px;">
                        <div class="row">
                            <?php

                                if($users_view_instance->UserLoggedInVerified()){

                                    $user_id = $users_view_instance->GetUserLoggedID();

                                    ?>
                                    <div class="col-7 text-right">
                                        <a href="<?php echo $app_conf->base_url(); ?>my_wishlist">
                                            Wishlist
                                            <br/>
                                            <span class="badge bg-primary text-white __num_wishlist_products"><?php echo $products_view_instance->GetNumWishlistProducts($user_id); ?></span> items
                                        </a>
                                    </div>
                                    <?php

                                    $user_has_cart = $products_view_instance->UserHasCart($user_id);

                                    if($user_has_cart[0]){

                                        $cart_id = $user_has_cart[1];

                                        ?>
                                        <div class="col-5 text-right">
                                            <a href="<?php echo $app_conf->base_url(); ?>my_cart">
                                                Cart <span class="badge bg-primary text-white __num_cart_products"><?php echo $products_view_instance->GetNumCartProducts($cart_id); ?></span>
                                                <br/>
                                                $<span class="__total_cart_bill"><?php echo $products_view_instance->GetTotalCartBill($cart_id); ?></span>
                                            </a>
                                        </div>
                                        <?php

                                    }else{

                                        ?>
                                        <div class="col-5 text-right">
                                            <a href="<?php echo $app_conf->base_url(); ?>my_cart">
                                                Cart <span class="badge bg-primary text-white __num_cart_products">0</span>
                                                <br/>
                                                $<span class="__total_cart_bill">0</span>
                                            </a>
                                        </div>
                                        <?php

                                    }

                                }else{

                                    ?>
                                    <div class="col-7 text-right">
                                        <a href="<?php echo $app_conf->base_url(); ?>login">
                                            Wishlist
                                            <br/>
                                            <span class="badge bg-primary text-white">0</span> items
                                        </a>
                                    </div>
                                    <div class="col-5 text-right">
                                        <a href="<?php echo $app_conf->base_url(); ?>login">
                                            Cart <span class="badge bg-primary text-white">0</span>
                                            <br/>
                                            $0
                                        </a>
                                    </div>
                                    <?php

                                }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header2-mobile container-fluid">
            <div class="row">
                <div class="col-4 text-left">
                    <h1 class="site-name">J<?php $app_conf->get_font_awesome_icon("fas fa-shopping-cart"); ?></h1>
                </div>
                <div class="col-8 text-right">
                    <div class="row">
                        <?php

                            if($users_view_instance->UserLoggedInVerified()){

                                $user_id = $users_view_instance->GetUserLoggedID();

                                ?>
                                <div class="col-7 text-right">
                                    <a href="<?php echo $app_conf->base_url(); ?>my_wishlist">
                                        Wishlist
                                        <br/>
                                        <span class="badge bg-primary text-white __num_wishlist_products"><?php echo $products_view_instance->GetNumWishlistProducts($user_id); ?></span> items
                                    </a>
                                </div>
                                <?php

                                $user_has_cart = $products_view_instance->UserHasCart($user_id);

                                if($user_has_cart[0]){

                                    $cart_id = $user_has_cart[1];

                                    ?>
                                    <div class="col-5 text-right">
                                        <a href="<?php echo $app_conf->base_url(); ?>my_cart">
                                            Cart <span class="badge bg-primary text-white __num_cart_products"><?php echo $products_view_instance->GetNumCartProducts($cart_id); ?></span>
                                            <br/>
                                            $<span class="__total_cart_bill"><?php echo $products_view_instance->GetTotalCartBill($cart_id); ?></span>
                                        </a>
                                    </div>
                                    <?php

                                }else{

                                    ?>
                                    <div class="col-5 text-right">
                                        <a href="<?php echo $app_conf->base_url(); ?>my_cart">
                                            Cart <span class="badge bg-primary text-white __num_cart_products">0</span>
                                            <br/>
                                            $<span class="__total_cart_bill">0</span>
                                        </a>
                                    </div>
                                    <?php

                                }

                            }else{

                                ?>
                                <div class="col-7 text-right">
                                    <a href="<?php echo $app_conf->base_url(); ?>login">
                                        Wishlist
                                        <br/>
                                        <span class="badge bg-primary text-white">0</span> items
                                    </a>
                                </div>
                                <div class="col-5 text-right">
                                    <a href="<?php echo $app_conf->base_url(); ?>login">
                                        Cart <span class="badge bg-primary text-white">0</span>
                                        <br/>
                                        $0
                                    </a>
                                </div>
                                <?php

                            }

                        ?>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 15px;">
                <div class="col-3" style="padding-right: 0px">
                    <select name="category" class="form-control r-form m_search_category">
                        <option value="all">All</option>
                        <?php
                            $active_categories = $categories_view_instance->GetCategories("all");

                            foreach($active_categories as $category){

                                $category_name = $category["CategoryName"];
                                $category_id = $category["CategoryID"];

                                ?>
                                <option value="<?php echo $category_id; ?>"><?php echo $category_name; ?></option>
                                <?php

                            }
                        ?>
                    </select>
                </div>
                <div class="col-7" style="padding: 0px">
                    <input type="text" placeholder="Search for products..." class="form-control r-form m_search_keyword"/>
                </div>
                <div class="col-2" style="padding-left: 0px">
                    <button type="button" class="btn btn-outline-primary btn-block r-form m_search_btn"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
