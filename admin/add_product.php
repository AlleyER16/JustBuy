<?php

    session_start();

    $classes_redirect = "../classes/";

    require_once $classes_redirect."__WebAppConfig.php";

    require_once $app_conf->get_inc_file("", "auth_func");

    require_once $classes_redirect."CategoriesView.php";
    require_once $classes_redirect."BrandsView.php";

    $categories_view_instance = new CategoriesView();
    $brands_view_instance = new BrandsView();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add Product | JustBuy Admin </title>

        <?php require_once $app_conf->get_inc_file("", "meta_tags"); ?>

        <?php require_once $app_conf->get_inc_file("", "stylesheets"); ?>
    </head>
    <body>
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

            <?php include_once $app_conf->get_view("header"); ?>

            <div class="app-main">

                <?php include_once $app_conf->get_view("sidebar"); ?>

                <div class="app-main__outer">

                    <div class="app-main__inner">

                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                    <div>
                                        Add product
                                        <div class="page-title-subheading">
                                            Add a new product
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <a href="<?php echo $app_conf->admin_url(); ?>all_products" class="btn btn-primary">View all products</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">
                                        Add Product
                                    </div>
                                    <form id="add_product_form">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Product Name</label>
                                                <input type="text" class="form-control" name="product_name" placeholder="Enter product name"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Product Description</label>
                                                <textarea rows="5" class="form-control" name="description" placeholder="Enter product description"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Price ($)</label>
                                                <input type="number" class="form-control" name="price" placeholder="Enter product price"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Stock</label>
                                                <input type="number" class="form-control" name="stock" placeholder="Enter number of stocks"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Launch Date</label>
                                                <input type="date" class="form-control" name="launch_date"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select class="form-control" name="category">
                                                    <?php
                                                        $categories = $categories_view_instance->GetCategories();

                                                        foreach($categories as $category){

                                                            $category_id = $category["CategoryID"];
                                                            $category_name = $category["CategoryName"];

                                                            ?>
                                                            <option value="<?php echo $category_id; ?>"><?php echo $category_name; ?></option>
                                                            <?php

                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Brands</label>
                                                <select class="form-control" name="brand">
                                                    <?php
                                                        $brands = $brands_view_instance->GetBrands();

                                                        foreach($brands as $brand){

                                                            $brand_id = $brand["BrandID"];
                                                            $brand_name = $brand["BrandName"];

                                                            ?>
                                                            <option value="<?php echo $brand_id; ?>"><?php echo $brand_name; ?></option>
                                                            <?php

                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button type="submit" class="btn btn-primary">Add product</button>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="server_response"></span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <?php include_once $app_conf->get_inc_file("", "javascripts"); ?>
        <script type="text/javascript" src="<?php echo $app_conf->base_url(); ?>assets/js/jquery-3-5-1.min.js"></script>
        <script type="text/javascript" src="<?php echo $app_conf->admin_url(); ?>controllers/base_urls.js"></script>

        <?php $app_conf->load_admin_controller("product_func"); ?>
    </body>
</html>
