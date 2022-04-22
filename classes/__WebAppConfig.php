<?php

    class WebAppConfig{

        private const APP_NAME = "JustBuy";
        private const BASE_URL = "http://localhost/justbuy/";

        public function app_name(){

            echo self::APP_NAME;

        }

        public function base_url(){

            return self::BASE_URL;

        }

        public function admin_url(){

            return self::BASE_URL . "admin/";

        }

        public function load_controller($controller_name){

            $controller_name = $this->base_url() . "controllers/" . $controller_name . ".ctrl.js";

            echo "<script type=\"text/javascript\" src=\"".$controller_name."\"></script>";

        }

        public function load_admin_controller($controller_name){

            $controller_name = $this->admin_url() . "controllers/" . $controller_name . ".ctrl.js";

            echo "<script type=\"text/javascript\" src=\"".$controller_name."\"></script>";

        }

        public function load_javascript($path){

            $path = $this->base_url() . "assets/" . $path;

            echo "<script type=\"text/javascript\" src=\"".$path."\"></script>";

        }

        public function load_stylesheet($path){

            $path = $this->base_url() . "assets/" . $path;

            echo "<link type=\"text/css\" rel=\"stylesheet\" href=\"".$path."\"/>";

        }

        public function get_inc_file($redirect, $file_name){

            $inc_url = $redirect."includes/".$file_name.".inc.php";

            return $inc_url;

        }

        public function get_view($view_name){

            $view_url = "views/".$view_name.".view.php";

            return $view_url;

        }

        public function get_font_awesome_icon($icon_code){

            echo '<span class="'.$icon_code.'"></span>';

        }

    }

    $app_conf = new WebAppConfig();

?>
