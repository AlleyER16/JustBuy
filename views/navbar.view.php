<div class="a-navbar container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <div class="dropdown">
                            <button type="button" class="btn btn-success dropdown-toggle categories-button btn-block" data-toggle="dropdown">
                              <span class="fa fa-menu"></span> Product Categories
                            </button>
                            <div class="dropdown-menu btn-block" style="padding: 0px;">
                                <a class="dropdown-item" href="<?php echo $app_conf->base_url(); ?>products/all/all/all/all">All</a>
                                <?php
                                    $active_categories = $categories_view_instance->GetCategories("all");

                                    foreach($active_categories as $category){

                                        $category_name = $category["CategoryName"];
                                        $category_id = $category["CategoryID"];

                                        ?>
                                        <a class="dropdown-item" href="<?php echo $app_conf->base_url(); ?>products/<?php echo $category_id; ?>/all/all/all"><?php echo $category_name; ?></a>
                                        <?php

                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-8 menu-area">
                        <div class="row">
                            <div class="col-4 text-center">
                                <a href="<?php echo $app_conf->base_url(); ?>home">Home</a>
                            </div>
                            <div class="col-4 text-center">
                                <a href="<?php echo $app_conf->base_url(); ?>newest_arrivals">Newest Arrivals</a>
                            </div>
                            <div class="col-4 text-center">
                                <a href="<?php echo $app_conf->base_url(); ?>brands">Brands</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 md-disp-none text-right">
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle categories-button btn-block" data-toggle="dropdown">
                              <span class="fa fa-menu"></span> Help
                            </button>
                            <div class="dropdown-menu btn-block" style="padding: 0px;">
                                <a class="dropdown-item" href="<?php echo $app_conf->base_url(); ?>contact_us">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="a-navbar-mobile container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle categories-button" data-toggle="dropdown">
                              <span class="fa fa-menu"></span> Product Categories
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo $app_conf->base_url(); ?>category/all">All</a>
                                <?php
                                    $active_categories = $categories_view_instance->GetCategories("all");

                                    foreach($active_categories as $category){

                                        $category_name = $category["CategoryName"];
                                        $category_id = $category["CategoryID"];

                                        ?>
                                        <a class="dropdown-item" href="<?php echo $app_conf->base_url(); ?>category/<?php echo $category_id; ?>"><?php echo $category_name; ?></a>
                                        <?php

                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 text-right" style="padding-top: 13px">
                        <button id="mobile_menu_button" class="btn btn-outline-success">Menu</button>
                    </div>
                </div>
            </div>
        </div>
