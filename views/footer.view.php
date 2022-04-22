<div class="container-fluid footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12" style="padding: 20px;">
                        <h1>AShoppy</h1>
                        <p style="text-align: justify;">This is a really slick e-commerce online web site where you can buy stuffs very very cool site
                        guess what it was made in JSP so it ain't basic at all</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12" style="padding: 20px;">
                        <h3>Categories</h3>
                        <a href="<?php echo $app_conf->base_url(); ?>products/all/all/all/all">All</a><br/>
                        <?php
                            $active_categories = $categories_view_instance->GetCategories("all");

                            foreach($active_categories as $category){

                                $category_name = $category["CategoryName"];
                                $category_id = $category["CategoryID"];

                                ?>
                                <a href="<?php echo $app_conf->base_url(); ?>products/<?php echo $category_id; ?>/all/all/all"><?php echo $category_name; ?></a><br/>
                                <?php

                            }
                        ?>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12" style="padding: 20px;">
                        <h3>Help</h3>
                        <a href="<?php echo $app_conf->base_url(); ?>contact_us">Contact Us</a><br/>
                        <a href="<?php echo $app_conf->base_url(); ?>login">Login</a><br/>
                        <a href="<?php echo $app_conf->base_url(); ?>register">Register</a><br/>
                    </div>
                </div>
            </div>
        </div>
