<?php

    session_start();

    $classes_redirect = "../classes/";

    require_once $classes_redirect."__WebAppConfig.php";

    require_once $app_conf->get_inc_file("", "auth_func");

    require_once $classes_redirect."CategoriesView.php";
    require_once $classes_redirect."BrandsView.php";
    require_once $classes_redirect."ProductsView.php";

    $categories_view_instance = new CategoriesView();
    $brands_view_instance = new BrandsView();
    $products_view_instance = new ProductsView();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>All Products | JustBuy Admin </title>

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
                                        All products
                                        <div class="page-title-subheading">
                                            This shows all products
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <a href="<?php echo $app_conf->admin_url(); ?>add_product" class="btn btn-primary">Add product</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                    if(isset($_SESSION["product_pg_msg"]) && !empty($_SESSION["product_pg_msg"])){
                                        ?>
                                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                <button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                <?php echo $_SESSION["product_pg_msg"];?>
                                            </div>
                                        <?php
                                        unset($_SESSION["product_pg_msgs"]);
                                    }
                                ?>
                            </div>
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">
                                        All Products
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S/N</th>
                                                    <th class="text-center">Image</th>
                                                    <th>Product Name</th>
                                                    <th>Price</th>
                                                    <th>Stock</th>
                                                    <th>Brand</th>
                                                    <th>Category</th>
                                                    <th>Launch Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                    $products = $products_view_instance->GetProducts();

                                                    $counter = 0;

                                                    foreach ($products as $product) {

                                                        $counter++;

                                                        $product_id = $product["ProductID"];
                                                        $product_name = $product["Name"];
                                                        $price = $product["Price"];
                                                        $stock = $product["Stock"];
                                                        $image = $product["Image"];

                                                        $brand = $brands_view_instance->GetBrandName($product["Brand"]);
                                                        $category = $categories_view_instance->GetCategoryName($product["Category"]);

                                                        $launch_date = date("d-M-Y", $product["LaunchDate"]);

                                                        ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $counter; ?></td>
                                                            <td class="text-center">
                                                                <img src="../<?php echo $image; ?>" width="60px" height="60px" class="rounded"/>
                                                            </td>
                                                            <td><?php echo $product_name; ?></td>
                                                            <td>$<?php echo $price; ?></td>
                                                            <td><?php echo $stock; ?></td>
                                                            <td><?php echo $brand; ?></td>
                                                            <td><?php echo $category; ?></td>
                                                            <td><?php echo $launch_date; ?></td>
                                                        </tr>
                                                        <?php

                                                    }

                                                    if($counter == 0){

                                                        ?>
                                                        <tr>
                                                            <td class="text-center" colspan="8">No products added</td>
                                                        </tr>
                                                        <?php

                                                    }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <?php include_once $app_conf->get_inc_file("", "javascripts"); ?>
    </body>
</html>
