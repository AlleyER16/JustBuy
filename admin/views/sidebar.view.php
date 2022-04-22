<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboard</li>
                <li class="mm-active">
                    <a href="<?php echo $app_conf->admin_url(); ?>analytics">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Analytics
                    </a>
                </li>
                <li class="app-sidebar__heading">Users & Feedback</li>
                <li>
                    <a href="<?php echo $app_conf->admin_url(); ?>all_users">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        All Users
                    </a>
                </li>
                <li>
                    <a href="<?php echo $app_conf->admin_url(); ?>all_feedbacks">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        All Feedbacks
                    </a>
                </li>
                <li class="app-sidebar__heading">Manufacturers/Brand</li>
                <li>
                    <a href="<?php echo $app_conf->admin_url(); ?>all_brands">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        All Brands
                    </a>
                </li>
                <li>
                    <a href="<?php echo $app_conf->admin_url(); ?>add_brand">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        Add Brand
                    </a>
                </li>
                <li class="app-sidebar__heading">Products & Categories</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        Categories
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="<?php echo $app_conf->admin_url(); ?>all_categories">
                                <i class="metismenu-icon">
                                </i>All categories
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $app_conf->admin_url(); ?>add_category">
                                <i class="metismenu-icon">
                                </i>Add Category
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        Products
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="<?php echo $app_conf->admin_url(); ?>all_products">
                                <i class="metismenu-icon">
                                </i>All Products
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $app_conf->admin_url(); ?>add_product">
                                <i class="metismenu-icon">
                                </i>Add Products
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="app-sidebar__heading">Account</li>
                <li>
                    <a href="<?php echo $app_conf->admin_url(); ?>logout">
                        <i class="metismenu-icon pe-7s-graph2">
                        </i>Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
