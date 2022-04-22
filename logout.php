<?php

    session_start();

    include_once "classes/__WebAppConfig.php";

    session_unset();

    session_destroy();

    $redirect_url = $app_conf->base_url()."login";

    header("location: $redirect_url");

?>
