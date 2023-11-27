<?php get_header();
/* Template Name: Thông tin du học */
?>
<?php
// vì sao chọn
$choose_title = get_field('choose_title');
$choose_content = get_field('choose_content');
$choose_image = get_field('choose_img');
// tiêu chí xét tuyển
$criteria_title = get_field('criteria_title');
$criteria_content = get_field('criteria_content');
$criteria_img = get_field('criteria_img');
$criteria_repeat = get_field('criteria_repeat');
// ưu điểm chương trình tư vấn du học tại Hoa Hạ
$priority_title = get_field('priority_title');
$priority_img = get_field('priority_img');
$priority_repeat = get_field('priority_repeat');
?>

<section class="section-abroad-1">
    <div class="container">
        <div class="content">
            <div class="text">
                <div class="title">
                    <h2>
                        <?php echo $choose_title ?>
                    </h2>
                </div>
                <div class="desc">
                    <p>
                        <?php echo $choose_content ?>
                    </p>
                </div>
            </div>
            <div class="image">
                <figure>
                    <img src="<?php echo getimage($choose_image) ?>" alt="">
                </figure>
            </div>
        </div>
    </div>
</section>

<section class="section-abroad-2">
    <div class="content">
        <div class="col-left">
            <div class="image">
                <figure>
                    <img src="<?php echo getimage($criteria_img) ?>" alt="">
                </figure>
            </div>
        </div>
        <div class="col-right">
            <div class="text">
                <div class="title">
                    <h3>
                        <?php echo $criteria_title ?>
                    </h3>
                </div>
                <div class="desc">
                    <p>
                        <?php echo $criteria_content ?>
                    </p>
                </div>
                <nav>
                    <ul>
                        <?php foreach ($criteria_repeat as $item) : ?>
                            <li><?php echo $item['content'] ?></li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="section-abroad-3">
    <div class="container">
        <div class="content row">
            <div class="col-lg-6">
                <div class="col-left">
                    <div class="title">
                        <h2>
                            <?php echo $priority_title ?>
                        </h2>
                    </div>
                    <div class="image">
                        <div class="image-main swiper">
                            <div class="swiper-wrapper">
                                <?php foreach ($priority_img as $item) : ?>
                                    <div class="child swiper-slide">
                                        <figure>
                                            <img src="<?php echo getimage($item) ?>" alt="">
                                        </figure>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="image-other swiper">
                            <div class="swiper-wrapper">
                                <?php foreach ($priority_img as $item) : ?>
                                    <div class="child swiper-slide">
                                        <figure>
                                            <img src="<?php echo getimage($item) ?>" alt="">
                                        </figure>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="col-right">
                    <div class="list">
                        <?php foreach ($priority_repeat as $item) : ?>
                            <div class="child">
                                <div class="number">
                                    <span>
                                        <?php echo $item['number'] ?>
                                    </span>
                                </div>
                                <div class="text">
                                    <p><?php echo $item['content'] ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var productSlider = new Swiper('.image-main', {
        spaceBetween: 0,
        centeredSlides: false,
        loop:true,
        direction: 'horizontal',
        loopedSlides: 3,
        resizeObserver:true,
    });
    var productThumbs = new Swiper('.image-other', {
        spaceBetween: 20,
        centeredSlides: false,
        loop: true,
        slideToClickedSlide: true,
        direction: 'horizontal',
        slidesPerView: 3,
        loopedSlides: 3,
    });
    productSlider.controller.control = productThumbs;
    productThumbs.controller.control = productSlider;
</script>

<?php get_footer(); ?>