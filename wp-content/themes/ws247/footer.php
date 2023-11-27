<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ws247
 */

?>

<section class="plusgin-nh">
    <div class="slide-item">
        <div class="item-sl">
            <div class="item">
                <a href="javascript:;"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            </div>
            <div class="item">
                <a href="javascript:;" title=""><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
            </div>
            <div class="item">
                <a href="javascript:;"><i class="fa fa-phone" aria-hidden="true"></i></a>
            </div>
            <div class="item">
                <a class="user" href="javascript:;"><i class="fa fa-user" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="timesss"><svg width="12" height="13" viewBox="0 0 14 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Canvas" transform="translate(-4087 108)"><g id="Vector"><use xlink:href="#path0_fill" transform="translate(4087 -108)" fill="currentColor"></use></g></g><defs><path id="path0_fill" d="M 14 1.41L 12.59 0L 7 5.59L 1.41 0L 0 1.41L 5.59 7L 0 12.59L 1.41 14L 7 8.41L 12.59 14L 14 12.59L 8.41 7L 14 1.41Z"></path></defs></svg></div>
        <div class="box-send-chat">
            <ul>
                <li><a target="_blank" href="<?php the_field('p1_link','option') ?>">
                    <span class="svg-item">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </span>
                    <span class="text-svg-item">Chat facebook</span>
                </a></li>
                <li><a class="email-click" href="javascript:;">
                    <span class="svg-item">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    </span>
                    <span class="text-svg-item">Gửi góp ý</span>
                </a></li>
                <li><a href="tel:<?php the_field('p1_phone','option') ?>">
                    <span class="svg-item">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                    </span>
                    <span class="text-svg-item"><?php the_field('p1_phone','option') ?></span>
                </a></li>
                <li><a class="user" href="javascript:;" title="">
                    <span class="svg-item">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                    <span class="text-svg-item">Đăng ký</span>
                </a></li>
            </ul>
        </div>
    </div>
</section>
<footer>
    <section class="footer-container" style="background-image: url(<?php the_field('f1_bg','option') ?>);">
     <div class="container">
      <div class="row">
       <div class="col-md-12">
        <div class="footer-bottom">
            <div class="row">
                <div class="col-lg-5">
                    <div class="logo-footer">
                        <div class="logo">
                            <img src="<?php the_field('f2_logo','option') ?>" alt="<?php the_field('f2_title','option') ?>">
                        </div>
                        <h2><?php the_field('f2_title','option') ?></h2>
                        <?php if(have_rows('f2_re','option')){ ?>
                            <?php while(have_rows('f2_re','option')): the_row() ?>
                                <div class="word-time">
                                    <div class="icon-word">
                                        <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="text-word-time">
                                        <p><?php the_sub_field('title') ?></p>
                                        <?php if(have_rows('re','option')){ ?>
                                            <ul>
                                                <?php while(have_rows('re','option')): the_row() ?>
                                                    <li><strong><?php the_sub_field('time') ?></strong>  <?php the_sub_field('ngay') ?></li>
                                                <?php endwhile; ?>
                                            </ul>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="list-footer-container">
                        <div class="row">
                            <?php if(have_rows('f3_re','option')){ ?>
                                <div class="col-md-6">
                                    <div class="list-footer">
                                        <ul>
                                            <?php while(have_rows('f3_re','option')): the_row() ?>
                                                <li>
                                                    <a href="<?php the_sub_field('link') ?>">
                                                        <span class="icon"><i class="fa <?php the_sub_field('icon') ?>" aria-hidden="true"></i></span>
                                                        <span class="text"><?php the_sub_field('info') ?></span>
                                                    </a>
                                                </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if(have_rows('f4_re','option')){ ?>
                                <div class="col-md-6">
                                    <div class="list-footer icon-footer">
                                        <ul>
                                            <?php while(have_rows('f4_re','option')): the_row() ?>
                                                <li>
                                                   <a href="<?php the_sub_field('link') ?>">
                                                    <span class="icon"><i class="fa <?php the_sub_field('icon') ?>" aria-hidden="true"></i></span>
                                                    <span class="text"><?php the_sub_field('info') ?></span>
                                                </a>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>
</footer>
<div class="load-fixe">
    <div class="loading-animation"></div>
</div>
<section class="mobile-container">
    <!-- Mobile -->

    <!-- SCROLL -->
    <div class="scroll-top">
        <a href="javascript:;"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
    </div>

    <!-- Menu-Mobile -->
    <div class="wrapper cf">
        <nav id="main-nav">
            <ul>
             <?php
             wp_nav_menu( array(
                'theme_location'  => 'menu-1',
                'container'       => '__return_false',
                'fallback_cb'     => '__return_false',
                'items_wrap'      => '%3$s',
                'depth'           => 3,
            ) );
            ?>      
        </ul>
    </nav>
</div>
</section>
<section class="work-time pp-lich-kham">
    <div class="box-word-time">
        <div class="form-lich">
            <?php echo do_shortcode('[contact-form-7 id="949" title="Đóng góp ý kiến"]') ?>
        </div>
        <a class="times" href="javascript:;" title=""><i class="fa fa-times-circle" aria-hidden="true"></i></a>
    </div>
</section>
<section class="fixe-container">
    <div class="contact-fixe">
        <ul>
            <li><a target="_blank"  href="<?php the_field('p1_link','option') ?>" ><div class="icon"><i class="fa fa-facebook" aria-hidden="true"></i></div> <span>Facebook</span></a></li>
            <li><a href="tel:<?php the_field('p1_phone','option') ?>"><div class="icon"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/phone.png" alt=""></div> <span><?php the_field('p1_phone','option') ?></span></a></li>
            <li><a href="javascript:;"><div class="icon"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/fax.png" alt=""></div> <span>Gửi góp ý</span></a></li>
        </ul>
    </div>
    <div class="login-fixe">
        <a class="login" href="javascript:void(0)" title="">
            <div>
                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/text.png" alt="">
                <span>Đăng ký</span>
            </div>
        </a>
        <?php echo do_shortcode('[contact-form-7 id="116" title="Đăng ký"]') ?>
    </div>
</section>
<section class="menu-web">
    <ul>
       <?php
       wp_nav_menu( array(
        'theme_location'  => 'menu-2',
        'container'       => '__return_false',
        'fallback_cb'     => '__return_false',
        'items_wrap'      => '%3$s',
        'depth'           => 1,
    ) );
    ?>      
</ul>
</section>
<?php the_field('script_body','option') ?>
<?php wp_footer(); ?>
<p align="center">
Thiết kế website bởi <a href="https://wecan-group.com" target="_blank">Wecan-Group.com</a>
</p>

</body>
</html>
