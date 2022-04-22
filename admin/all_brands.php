<?php

    session_start();

    $classes_redirect = "../classes/";

    require_once $classes_redirect."__WebAppConfig.php";

    require_once $app_conf->get_inc_file("", "auth_func");

    require_once $classes_redirect."BrandsView.php";
    require_once $classes_redirect."ProductsView.php";

    $brands_view_instance = new BrandsView();
    $products_view_instance = new ProductsView();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>All Brands | JustBuy Admin </title>

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
                                        All brands
                                        <div class="page-title-subheading">
                                            This shows all brands
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <a href="<?php echo $app_conf->admin_url(); ?>add_brand" class="btn btn-primary">Add brand</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">
                                        Brands
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S/N</th>
                                                    <th>Brand Name</th>
                                                    <th class="text-center">Num. Products</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                    $brands = $brands_view_instance->GetBrands();

                                                    $counter = 0;

                                                    foreach ($brands as $brand) {

                                                        $counter++;

                                                        $brand_id = $brand["BrandID"];
                                                        $brand_name = $brand["BrandName"];

                                                        $num_products = $products_view_instance->GetNumBrandProducts($brand_id);

                                                        ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $counter; ?></td>
                                                            <td><?php echo $brand_name; ?></td>
                                                            <td class="text-center"><?php echo $num_products; ?></td>
                                                        </tr>
                                                        <?php

                                                    }

                                                    if($counter == 0){

                                                        ?>
                                                        <tr>
                                                            <td class="text-center" colspan="4">No brands added</td>
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
