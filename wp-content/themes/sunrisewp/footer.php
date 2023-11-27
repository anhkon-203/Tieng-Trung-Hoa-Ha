<div class="overlay"></div>
</main>
<footer>
    <?php
    $logo_footer = get_field('logo_footer', 'option');
    $slogan = get_field('title_footer_menu', 'option');
    $support_footer = get_field('support_footer', 'option');
    $title_link_footer = get_field('title_link_footer', 'option');
    $img_qr_footer = get_field('img_qr_footer', 'option');
    $embed_page = get_field('embed_page', 'option');
    $copyright = get_field('copyright', 'option');
    ?>
    <div class="footer-wrapper">
        <div class="container">
            <div class="content row">
                <div class="col-lg-3 col-md-8">
                    <div class="left">
                        <div class="logo">
                            <a href="#">
                                <figure>
                                    <img src="<?php echo getimage($logo_footer) ?>" alt="">
                                </figure>
                            </a>
                        </div>
                        <p class="slogan">
                            <?php echo $slogan ?>
                        </p>
                        <div class="contact">
                            <?php foreach ($support_footer as $item) : ?>
                                <div class="child">
                                    <div class="image">
                                        <figure>
                                            <img src="<?php echo getimage($item['img']) ?>" alt="">
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
                        <span class="copyright">
                            <?php echo $copyright ?>
                        </span>
                    </div>
                </div>
                <div class="col-lg-5 col-md-4">
                    <div class="mid">
                        <div class="item">
                            <div class="title">
                                <h4>
                                    <?php echo $title_link_footer ?>
                                </h4>
                            </div>
                            <nav class="menu-footer">
                                <?php
                                $elMenuFooter = wp_get_nav_menu_items('Menu footer');
                                $menuFooter = array();

                                foreach ($elMenuFooter as $value) {
                                    $menuFooter[] = (array)$value;
                                }

                                ?>

                                <ul>
                                    <?php foreach ($menuFooter as $item): ?>
                                        <li><a href="<?= $item['url']; ?>"><?= $item['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </nav>
                            <div class="qr">
                                <figure>
                                <img src="<?php echo getimage($img_qr_footer) ?>" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="right">
                       <?php echo $embed_page ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script>
    $(".search-btn").click(function (){
        $(".input-search").slideToggle(300);
    })
    // $(document).ready(function($) {
    //     $('.tabs-content').hide();
    //     $('.tabs-content:first').show();
    //     $('.tabs-control li:first').addClass('active');
    //     $('.tabs-control li').click(function(event) {
    //         $('.tabs-control li').removeClass('active');
    //         $(this).addClass('active');
    //         $('.tabs-content').hide();
    //         var selectTab = $(this).find('a').attr("href");
    //         $(selectTab).fadeIn();
    //     });
    // });
    var productList = new Swiper('.slide-partner', {
        spaceBetween: 15,
        centeredSlides: false,
        loop: true,
        slideToClickedSlide: true,
        slidesPerView: 6,
        pagination: {
            el: '.slider-pagination',
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 2,
                spaceBetween: 15
            },
            640: {
                slidesPerView: 4,
                spaceBetween: 15
            },
            1024: {
                slidesPerView: 6,
                spaceBetween: 15
            }
        }
    });
</script>
<script>
    $(".navbar-menu").click(function(){
        $(".menu-mobie-all").toggleClass("active-mobile-menu");
        $(".overlay").fadeToggle();
    })
    $(".overlay").click(function(){
        $(".menu-mobie-all").removeClass("active-mobile-menu");
        $(".overlay").fadeOut();
    })
    $("body").on("click", ".menu-mobie .fa-caret-right",function(e){
        e.preventDefault();
        $(this).closest("li").find(".sub-menu-mobile").first().addClass("active-mobile-menu");
    });
    $(".submenu-back").click(function () {
        $(this).closest(".sub-menu-mobile").removeClass("active-mobile-menu");
    });
    $(window).scroll(function(){
        var pixel = $(window).scrollTop();
        if(pixel > 0){
            $('.header-wrapper').addClass('fixed-menu');
        } else {
            $('.header-wrapper').removeClass('fixed-menu');
        }
    });
</script>
</body>
</html>