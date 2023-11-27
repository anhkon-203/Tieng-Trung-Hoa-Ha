<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= get_field('favicon', 'option') ?>" type="image/x-icon"/>
    <?php wp_head() ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/dist/lib/bootstrap/css/bootstrap.min.css">
    <link rel='stylesheet' href='<?php echo get_template_directory_uri() ?>/dist/lib/fancybox/jquery.fancybox.css'
          type='text/css' media='all'/>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/dist/lib/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/dist/css/aos.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/dist/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/dist/scss/main.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/dist/css/lg-thumbnail.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/dist/css/lg-fullscreen.min.css">
    <script src="<?php echo get_template_directory_uri() ?>/dist/lib/jquery/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/dist/lib/jquery/jquery-ui.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/dist/lib/swiper/swiper-bundle.min.js"></script>
    <script type="text/javascript"
            src='<?php echo get_template_directory_uri() ?>/dist/lib/fancybox/jquery.fancybox.js'></script>
    <script src="<?php echo get_template_directory_uri() ?>/dist/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/dist/js/aos.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/dist/js/lightgallery.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/dist/js/lg-thumbnail.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/dist/js/lg-fullscreen.min.js"></script>
</head>
<body>
<header>
    <div class="header-wrapper">
        <div class="container">
            <div class="content">
                <div class="left">
                    <div class="logo">
                        <a href="<?php echo home_url() ?>">
                            <figure>
                                <?php
                                $logo = get_field('logo_header', 'option');
                                ?>
                                <img src="<?php echo getimage($logo) ?>" alt="">
                            </figure>
                        </a>
                    </div>
                </div>
                <div class="right">
                    <nav class="menu-all">
                        <ul class="menu">
                            <?php
                            $menu_name = 'Menu Header'; // Thay đổi 'Menu Header' bằng tên menu thực tế của bạn

                            $menu_items = wp_get_nav_menu_items($menu_name);
                            $menu_hierarchy = array();

                            // Tổ chức các mục theo cấp bậc
                            foreach ($menu_items as $menu_item) {
                                $menu_hierarchy[$menu_item->menu_item_parent][] = $menu_item;
                            }

                            // Hiển thị menu cấp 1
                            if (isset($menu_hierarchy[0])) {
                                foreach ($menu_hierarchy[0] as $menu_item) {
                                    ?>
                                    <li>
                                        <a href="<?php echo esc_url($menu_item->url); ?>">
                                            <?php echo esc_html($menu_item->title); ?>
                                        </a>
                                        <?php
                                        // Kiểm tra xem menu cấp 1 có menu cấp 2 không
                                        if (isset($menu_hierarchy[$menu_item->ID])) {
                                            ?>
                                            <i class="fas fa-caret-down"></i>
                                            <div class="menu-dropdown">
                                                <ul>
                                                    <?php
                                                    // Hiển thị menu cấp 2
                                                    foreach ($menu_hierarchy[$menu_item->ID] as $child_menu_item) {
                                                        ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($child_menu_item->url); ?>">
                                                                <?php echo esc_html($child_menu_item->title); ?>
                                                            </a>
                                                            <?php
                                                            // Kiểm tra xem menu cấp 2 có menu cấp 3 không
                                                            if (isset($menu_hierarchy[$child_menu_item->ID])) {
                                                                ?>
                                                                <i class="fas fa-caret-right"></i>
                                                                <div class="menu-dropdown">
                                                                    <ul>
                                                                        <?php
                                                                        // Hiển thị menu cấp 3
                                                                        foreach ($menu_hierarchy[$child_menu_item->ID] as $grandchild_menu_item) {
                                                                            ?>
                                                                            <li>
                                                                                <a href="<?php echo esc_url($grandchild_menu_item->url); ?>">
                                                                                    <?php echo esc_html($grandchild_menu_item->title); ?>
                                                                                </a>
                                                                            </li>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </ul>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </li>
                                                        <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </nav>
                    <nav class="menu-mobie menu-mobie-all">
                        <ul class="menu">
                            <?php
                            $menu_name = 'Menu Header'; // Thay đổi 'Menu Header' bằng tên menu thực tế của bạn

                            $menu_items = wp_get_nav_menu_items($menu_name);
                            $menu_hierarchy = array();

                            // Tổ chức các mục theo cấp bậc
                            foreach ($menu_items as $menu_item) {
                                $menu_hierarchy[$menu_item->menu_item_parent][] = $menu_item;
                            }

                            // Hiển thị menu cấp 1
                            if (isset($menu_hierarchy[0])) {
                                foreach ($menu_hierarchy[0] as $menu_item) {
                                    ?>
                                    <li class="menu-item">
                                        <a href="<?php echo esc_url($menu_item->url); ?>">
                                            <?php echo esc_html($menu_item->title); ?>
                                        </a>

                                        <?php
                                        // Kiểm tra xem menu cấp 1 có menu cấp 2 không
                                        if (isset($menu_hierarchy[$menu_item->ID])) {
                                            ?>
                                            <i class="fas fa-caret-right"></i>
                                            <div class="menu-mobie sub-menu-mobile">
                                                <p class="submenu-back"><i class="fas fa-caret-left"></i> Back</p>
                                                <ul>
                                                    <?php
                                                    // Hiển thị menu cấp 2
                                                    foreach ($menu_hierarchy[$menu_item->ID] as $child_menu_item) {
                                                        ?>
                                                        <li class="menu-item">
                                                            <a href="<?php echo esc_url($child_menu_item->url); ?>">
                                                                <?php echo esc_html($child_menu_item->title); ?>
                                                            </a>

                                                            <?php
                                                            // Kiểm tra xem menu cấp 2 có menu cấp 3 không
                                                            if (isset($menu_hierarchy[$child_menu_item->ID])) {
                                                                ?>
                                                                <i class="fas fa-caret-right"></i>
                                                                <div class="menu-mobie sub-menu-mobile">
                                                                    <p class="submenu-back"><i class="fas fa-caret-left"></i> Back</p>
                                                                    <ul>
                                                                        <?php
                                                                        // Hiển thị menu cấp 3
                                                                        foreach ($menu_hierarchy[$child_menu_item->ID] as $grandchild_menu_item) {
                                                                            ?>
                                                                            <li class="menu-item">
                                                                                <a href="<?php echo esc_url($grandchild_menu_item->url); ?>">
                                                                                    <?php echo esc_html($grandchild_menu_item->title); ?>
                                                                                </a>
                                                                            </li>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </ul>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </li>
                                                        <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>

                    </nav>
                    <div class="search">
                        <div class="search-btn">
                            <figure>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                     fill="none">
                                    <path d="M9.58317 18.1251C4.87484 18.1251 1.0415 14.2917 1.0415 9.58342C1.0415 4.87508 4.87484 1.04175 9.58317 1.04175C14.2915 1.04175 18.1248 4.87508 18.1248 9.58342C18.1248 14.2917 14.2915 18.1251 9.58317 18.1251ZM9.58317 2.29175C5.55817 2.29175 2.2915 5.56675 2.2915 9.58342C2.2915 13.6001 5.55817 16.8751 9.58317 16.8751C13.6082 16.8751 16.8748 13.6001 16.8748 9.58342C16.8748 5.56675 13.6082 2.29175 9.58317 2.29175Z"
                                          fill="white"/>
                                    <path d="M18.3335 18.9583C18.1752 18.9583 18.0169 18.9 17.8919 18.775L16.2252 17.1083C15.9835 16.8666 15.9835 16.4666 16.2252 16.225C16.4669 15.9833 16.8669 15.9833 17.1085 16.225L18.7752 17.8916C19.0169 18.1333 19.0169 18.5333 18.7752 18.775C18.6502 18.9 18.4919 18.9583 18.3335 18.9583Z"
                                          fill="white"/>
                                </svg>
                            </figure>
                        </div>
                        <div class="input-search">
                            <div class="item">
                                <form action="<?php echo home_url('/'); ?>" role="search">
                                    <input type="text" placeholder="Tìm kiếm" name="s">
                                    <input type="hidden" name="key">
                                </form>
                                <i class="far fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-menu">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<main>
