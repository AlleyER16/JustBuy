<?php

    if(!isset($_SESSION["admin_logged"]) || empty($_SESSION["admin_logged"]) || !$_SESSION["admin_logged"]){

        header("location: login");

    }

?>
