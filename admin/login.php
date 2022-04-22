<?php

    $classes_redirect = "../classes/";

    require_once $classes_redirect."__WebAppConfig.php";

?>
<!doctype html>
<html lang="en">
<head>
    <title>Login - Just Buy Admin</title>

    <?php require_once $app_conf->get_inc_file("", "meta_tags"); ?>

    <?php require_once $app_conf->get_inc_file("", "stylesheets"); ?>
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100 bg-plum-plate bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-8">
                        <div class="modal-dialog w-100 mx-auto">
                            <form id="login_form">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="h5 modal-title text-center">
                                        <h4 class="mt-2">
                                            <div>Welcome back,</div>
                                            <span>Enter admin login credentials</span>
                                        </h4>
                                    </div>

                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <label>Admin Email</label>
                                                    <input name="email" type="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <label>Admin Password</label>
                                                    <input name="password" type="password" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                </div>
                                <div class="modal-footer clearfix">
                                    <div class="float-right">
                                        <span class="server_response"></span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="submit" class="btn btn-primary btn-lg">Login</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<?php include_once $app_conf->get_inc_file("", "javascripts"); ?>
<script type="text/javascript" src="<?php echo $app_conf->base_url(); ?>assets/js/jquery-3-5-1.min.js"></script>
<script type="text/javascript" src="<?php echo $app_conf->admin_url(); ?>controllers/base_urls.js"></script>

<?php $app_conf->load_admin_controller("login_func"); ?>

</body>
</html>
