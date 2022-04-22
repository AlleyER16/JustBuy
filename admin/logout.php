<?php

    session_start();

    unset($_SESSION["admin_logged"]);

    header("location: login");

?>
