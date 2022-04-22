<div class="header container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-3 text-left">
                        <i class="fa fa-mobile"></i> 09086128123
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-5 text-center">
                        <i class="fa fa-envelope"></i> justbuy@gmail.com
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 text-right">
                        <?php
                            if($users_view_instance->UserLoggedInVerified()){

                                $user_details = $users_view_instance->GetUserDetails($users_view_instance->GetUserLoggedID());

                                $profile_picture = ($user_details["ProfilePicture"] == NULL) ? "assets/images/avatar.jpg": $user_details["ProfilePicture"];

                                $first_name = $user_details["FirstName"];
                                ?>
                                    <img src="<?php echo $app_conf->base_url(); ?><?php echo $profile_picture;?>" class="rounded-circle" width="30" height="30"/>
                                    <a href="<?php echo $app_conf->base_url(); ?>my_dashboard">
                                        <?php echo $first_name; ?>
                                    </a>
                                <?php

                            }else{
                                ?>
                                    <a href="<?php echo $app_conf->base_url(); ?>register"><i class="fa fa-user"></i> Register</a> |
                                    <a href="<?php echo $app_conf->base_url(); ?>login"><i class="fa fa-user-check"></i> Login</a>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

       <div class="header-mobile container-fluid">
           <div class="row">
               <div class="col-12 text-center">
                   <?php $app_conf->get_font_awesome_icon("fas fa-envelope"); ?> ashoppy2020@gmail.com
               </div>
           </div>
           <div class="navbar-divider">
               <hr/>
           </div>
           <div class="row">
               <div class="col-5 text-left">
                   <?php $app_conf->get_font_awesome_icon("fas fa-mobile"); ?> 07030700028
               </div>
               <div class="col-7 text-right">
                   <?php
                       if($users_view_instance->UserLoggedInVerified()){

                           $user_details = $users_view_instance->GetUserDetails($users_view_instance->GetUserLoggedID());
                           $profile_picture = ($user_details["ProfilePicture"] == NULL) ? "assets/images/avatar.jpg": $user_details["ProfilePicture"];
                           $first_name = $user_details["FirstName"];
                           ?>
                               <img src="<?php echo $app_conf->base_url(); ?><?php echo $profile_picture;?>" class="rounded-circle" width="30" height="30"/>
                               <a href="<?php echo $app_conf->base_url(); ?>my_dashboard">
                                   <?php echo $first_name; ?>
                               </a>
                           <?php

                       }else{
                           ?>
                               <a href="<?php echo $app_conf->base_url(); ?>register"><i class="fa fa-user"></i> Register</a> |
                               <a href="<?php echo $app_conf->base_url(); ?>login"><i class="fa fa-user-check"></i> Login</a>
                           <?php
                       }
                   ?>
               </div>
           </div>
       </div>
