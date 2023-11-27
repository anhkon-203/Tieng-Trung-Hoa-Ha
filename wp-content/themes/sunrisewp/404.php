<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package sunrisewp
 */

get_header();
?>
    <link rel="stylesheet" href="<?= get_template_directory_uri()?>/vendor/css/style_404.css">

    <section class="bg-purple">
        <div class="stars">
            <div class="custom-navbar">

            </div>
            <div class="central-body">
                <img class="image-404" src="<?= get_template_directory_uri() ?>/vendor/images/404.svg" width="300px">
                <a href="<?= home_url() ?>" class="btn-go-home" >TRỞ VỀ TRANG CHỦ</a>
            </div>
            <div class="objects">
                <img class="object_rocket" src="<?= get_template_directory_uri() ?>/vendor/images/rocket.svg" width="40px">
                <div class="earth-moon">
                    <img class="object_earth" src="<?= get_template_directory_uri() ?>/vendor/images/earth.svg" width="100px">
                    <img class="object_moon" src="<?= get_template_directory_uri() ?>/vendor/images/moon.svg" width="80px">
                </div>
                <div class="box_astronaut">
                    <img class="object_astronaut" src="<?= get_template_directory_uri() ?>/vendor/images/astronaut.svg" width="140px">
                </div>
            </div>
            <div class="glowing_stars">
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>

            </div>

        </div>
    </section>
<?php
get_footer();
