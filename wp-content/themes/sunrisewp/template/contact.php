<?php get_header();
/* Template Name: Liên hệ */
?>
<?php
// đăng ký tư vấn
$reg_img = get_field('reg_img');
$reg_title = get_field('reg_title');
$reg_shortcode = get_field('reg_shortcode');
// thông tin liên hệ
$contact_repeat = get_field('contact_repeat');
$reg_shortcode = get_field('reg_shortcode');
?>

<section class="section-homepage-7 section-contact-1">
    <div class="content">
        <div class="left">
            <div class="form-advise">
                <div class="title">
                    <h2>
                        <?php echo $reg_title ?>
                    </h2>
                </div>
                <?php echo do_shortcode($reg_shortcode) ?>
            </div>
        </div>
        <div class="right">
            <div class="image">
                <figure>
                    <img src="<?php echo getimage($reg_img) ?>" alt="">
                </figure>
            </div>
        </div>
    </div>
</section>

<section class="section-contact-2">
    <div class="container">
        <div class="content">
            <?php foreach ($contact_repeat as $item) : ?>
            <div class="child">
                <div class="image">
                    <figure>
                        <img src="<?php echo getimage($item['icon']) ?>" alt="">
                    </figure>
                </div>
                <div class="text">
                    <span>
                        <?php echo $item['title'] ?>
                    </span>
                    <h4>
                        <?php echo $item['content'] ?>
                    </h4>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>