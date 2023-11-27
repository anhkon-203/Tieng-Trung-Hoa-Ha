<?php get_header(); ?>
<?php
// lịch khai giảng
$calendar_title = get_field('calendar_title');
$calendar_desc = get_field('calendar_desc');
$calendar_btn = get_field('calendar_btn');
$calendar_img = get_field('calendar_img');
if ($calendar_btn) {
    $calendar_btn_url = $calendar_btn['link'];
    $calendar_btn_title = $calendar_btn['title'];
}
?>
<?php
$taxonomy = get_queried_object();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'khoa-hoc',
    'posts_per_page' => get_option('posts_per_page'),
    'order' => 'DESC',
    'paged' => $paged,
    'orderby' => 'date',
    'tax_query' => array(
        array(
            'taxonomy' => $taxonomy->taxonomy,
            'field' => 'slug',
            'terms' => $taxonomy->slug,
        ),
    ),
);
$query_course = new WP_Query($args);

?>
    <section class="section-homepage-2 section-course-1">
        <div class="container">
            <div class="title">
                <figure>
                    <svg xmlns="http://www.w3.org/2000/svg" width="86" height="38" viewBox="0 0 86 38" fill="none">
                        <path d="M85.303 17.6131L62.416 17.6131L52.344 7.54111L47.498 12.3871L43.947 8.83612L47.717 5.0661L42.651 9.20613e-05L37.585 5.0661L41.355 8.83612L37.804 12.3871L32.958 7.54111L22.886 17.6131L2.31879e-07 17.6131L2.10033e-07 19.4451L22.887 19.4451L32.959 29.5171L33.607 28.8691L37.805 24.6711L41.356 28.2221L37.586 31.9921L42.652 37.0581L43.3 36.4101L47.718 31.9921L43.948 28.2221L47.499 24.6711L52.345 29.5171L52.993 28.8691L62.417 19.4451L85.304 19.4451L85.304 17.6131L85.303 17.6131ZM42.652 2.5911L45.127 5.0661L42.652 7.54111L40.177 5.0661L42.652 2.5911ZM42.652 10.1321L46.203 13.6831L42.652 17.2341L39.101 13.6831L42.652 10.1321ZM47.498 14.9781L51.049 18.5291L47.498 22.0801L43.947 18.5291L47.498 14.9781ZM41.356 18.5291L37.805 22.0801L34.254 18.5291L37.805 14.9781L41.356 18.5291ZM32.959 26.9261L24.562 18.5291L32.959 10.1321L36.51 13.6831L31.664 18.5291L36.51 23.3751L32.959 26.9261ZM42.652 34.4661L40.177 31.9911L42.652 29.5161L45.127 31.9911L42.652 34.4661ZM42.652 26.9261L39.101 23.3751L42.652 19.8241L46.203 23.3751L42.652 26.9261ZM52.344 26.9261L48.793 23.3751L53.639 18.5291L48.793 13.6831L52.344 10.1321L60.741 18.5291L52.344 26.9261Z" fill="#F7C56B"/>
                    </svg>
                </figure>
                <h2>
                    <?php echo $taxonomy->name ?>
                </h2>
                <figure>
                    <svg xmlns="http://www.w3.org/2000/svg" width="86" height="38" viewBox="0 0 86 38" fill="none">
                        <path d="M85.303 17.6131L62.416 17.6131L52.344 7.54111L47.498 12.3871L43.947 8.83612L47.717 5.0661L42.651 9.20613e-05L37.585 5.0661L41.355 8.83612L37.804 12.3871L32.958 7.54111L22.886 17.6131L2.31879e-07 17.6131L2.10033e-07 19.4451L22.887 19.4451L32.959 29.5171L33.607 28.8691L37.805 24.6711L41.356 28.2221L37.586 31.9921L42.652 37.0581L43.3 36.4101L47.718 31.9921L43.948 28.2221L47.499 24.6711L52.345 29.5171L52.993 28.8691L62.417 19.4451L85.304 19.4451L85.304 17.6131L85.303 17.6131ZM42.652 2.5911L45.127 5.0661L42.652 7.54111L40.177 5.0661L42.652 2.5911ZM42.652 10.1321L46.203 13.6831L42.652 17.2341L39.101 13.6831L42.652 10.1321ZM47.498 14.9781L51.049 18.5291L47.498 22.0801L43.947 18.5291L47.498 14.9781ZM41.356 18.5291L37.805 22.0801L34.254 18.5291L37.805 14.9781L41.356 18.5291ZM32.959 26.9261L24.562 18.5291L32.959 10.1321L36.51 13.6831L31.664 18.5291L36.51 23.3751L32.959 26.9261ZM42.652 34.4661L40.177 31.9911L42.652 29.5161L45.127 31.9911L42.652 34.4661ZM42.652 26.9261L39.101 23.3751L42.652 19.8241L46.203 23.3751L42.652 26.9261ZM52.344 26.9261L48.793 23.3751L53.639 18.5291L48.793 13.6831L52.344 10.1321L60.741 18.5291L52.344 26.9261Z" fill="#F7C56B"/>
                    </svg>
                </figure>
            </div>
            <div class="tabs">
                <div id="1" class="tabs-content">
                    <div class="content row">
                        <?php while ($query_course->have_posts()) : $query_course->the_post();
                            $id = get_the_ID();
                            $so_buoi = get_post_meta($id, 'number', true);
                            $so_nguoi = get_post_meta($id, 'number_person', true);

                            ?>
                            <div class="col-lg-3 col-6">
                                <div class="child">
                                    <a href="<?= the_permalink() ?>">
                                        <div class="image">
                                            <figure>
                                                <?php
                                                $thumbnail_1 = get_the_post_thumbnail_url($query_course->post->ID);
                                                ?>
                                                <img src="<?php echo (!empty($thumbnail_1)) ? $thumbnail_1 : getimage(img_default()) ?>"
                                                     alt="">
                                            </figure>
                                        </div>
                                        <div class="text">
                                            <div class="name">
                                            <span>
                                                <?php echo get_the_title() ?>
                                            </span>
                                            </div>
                                            <div class="desc">
                                                <div class="left">
                                                    <figure>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M12 18.95C9.38 18.95 7.25 16.82 7.25 14.2C7.25 11.58 9.38 9.45001 12 9.45001C14.62 9.45001 16.75 11.58 16.75 14.2C16.75 16.82 14.62 18.95 12 18.95ZM12 10.95C10.21 10.95 8.75 12.41 8.75 14.2C8.75 15.99 10.21 17.45 12 17.45C13.79 17.45 15.25 15.99 15.25 14.2C15.25 12.41 13.79 10.95 12 10.95Z" fill="#363839"/>
                                                            <path d="M10.9999 15.95C10.7499 15.95 10.4999 15.82 10.3599 15.59C10.1499 15.23 10.2599 14.77 10.6199 14.56L11.3799 14.1C11.4599 14.06 11.4999 13.97 11.4999 13.89V12.96C11.4999 12.55 11.8399 12.21 12.2499 12.21C12.6599 12.21 12.9999 12.54 12.9999 12.95V13.88C12.9999 14.49 12.6699 15.07 12.1499 15.38L11.3899 15.84C11.2699 15.92 11.1299 15.95 10.9999 15.95Z" fill="#363839"/>
                                                            <path d="M16.0002 22.75H8.00023C3.38023 22.75 2.52023 20.6 2.30023 18.51L1.55023 10.5C1.44023 9.45001 1.41023 7.90001 2.45023 6.74001C3.35023 5.74001 4.84023 5.26001 7.00023 5.26001H17.0002C19.1702 5.26001 20.6602 5.75001 21.5502 6.74001C22.5902 7.90001 22.5602 9.45001 22.4502 10.51L21.7002 18.5C21.4802 20.6 20.6202 22.75 16.0002 22.75ZM7.00023 6.75001C5.31023 6.75001 4.15023 7.08001 3.56023 7.74001C3.07023 8.28001 2.91023 9.11001 3.04023 10.35L3.79023 18.36C3.96023 19.94 4.39023 21.25 8.00023 21.25H16.0002C19.6002 21.25 20.0402 19.94 20.2102 18.35L20.9602 10.36C21.0902 9.11001 20.9302 8.28001 20.4402 7.74001C19.8502 7.08001 18.6902 6.75001 17.0002 6.75001H7.00023Z" fill="#363839"/>
                                                            <path d="M16 6.75C15.59 6.75 15.25 6.41 15.25 6V5.2C15.25 3.42 15.25 2.75 12.8 2.75H11.2C8.75 2.75 8.75 3.42 8.75 5.2V6C8.75 6.41 8.41 6.75 8 6.75C7.59 6.75 7.25 6.41 7.25 6V5.2C7.25 3.44 7.25 1.25 11.2 1.25H12.8C16.75 1.25 16.75 3.44 16.75 5.2V6C16.75 6.41 16.41 6.75 16 6.75Z" fill="#363839"/>
                                                            <path d="M16.01 14.39C15.67 14.39 15.37 14.16 15.28 13.82C15.18 13.42 15.42 13.01 15.82 12.91C17.77 12.42 19.58 11.57 21.2 10.39C21.53 10.15 22 10.22 22.25 10.56C22.49 10.89 22.42 11.36 22.08 11.61C20.3 12.9 18.32 13.83 16.18 14.37C16.13 14.38 16.07 14.39 16.01 14.39Z" fill="#363839"/>
                                                            <path d="M8.00023 14.42C7.94023 14.42 7.88023 14.41 7.82023 14.4C5.81023 13.91 3.92023 13.06 2.19023 11.88C1.85023 11.65 1.76023 11.18 1.99023 10.84C2.22023 10.5 2.69023 10.41 3.03023 10.64C4.61023 11.72 6.33023 12.49 8.17023 12.94C8.57023 13.04 8.82023 13.44 8.72023 13.85C8.65023 14.19 8.34023 14.42 8.00023 14.42Z" fill="#363839"/>
                                                        </svg>
                                                    </figure>
                                                    <span>
                                                    <?= $so_buoi ?>
                                                </span>
                                                </div>
                                                <div class="right">
                                                    <figure>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M17.9998 7.91002C17.9698 7.91002 17.9498 7.91002 17.9198 7.91002H17.8698C15.9798 7.85002 14.5698 6.39001 14.5698 4.59001C14.5698 2.75001 16.0698 1.26001 17.8998 1.26001C19.7298 1.26001 21.2298 2.76001 21.2298 4.59001C21.2198 6.40001 19.8098 7.86001 18.0098 7.92001C18.0098 7.91001 18.0098 7.91002 17.9998 7.91002ZM17.8998 2.75002C16.8898 2.75002 16.0698 3.57002 16.0698 4.58002C16.0698 5.57002 16.8398 6.37002 17.8298 6.41002C17.8398 6.40002 17.9198 6.40002 18.0098 6.41002C18.9798 6.36002 19.7298 5.56002 19.7398 4.58002C19.7398 3.57002 18.9198 2.75002 17.8998 2.75002Z" fill="#363839"/>
                                                            <path d="M18.01 15.28C17.62 15.28 17.23 15.25 16.84 15.18C16.43 15.11 16.16 14.72 16.23 14.31C16.3 13.9 16.69 13.63 17.1 13.7C18.33 13.91 19.63 13.68 20.5 13.1C20.97 12.79 21.22 12.4 21.22 12.01C21.22 11.62 20.96 11.24 20.5 10.93C19.63 10.35 18.31 10.12 17.07 10.34C16.66 10.42 16.27 10.14 16.2 9.73002C16.13 9.32002 16.4 8.93003 16.81 8.86003C18.44 8.57003 20.13 8.88002 21.33 9.68002C22.21 10.27 22.72 11.11 22.72 12.01C22.72 12.9 22.22 13.75 21.33 14.35C20.42 14.95 19.24 15.28 18.01 15.28Z" fill="#363839"/>
                                                            <path d="M5.96998 7.91C5.95998 7.91 5.94998 7.91 5.94998 7.91C4.14998 7.85 2.73998 6.39 2.72998 4.59C2.72998 2.75 4.22998 1.25 6.05998 1.25C7.88998 1.25 9.38998 2.75 9.38998 4.58C9.38998 6.39 7.97998 7.85 6.17998 7.91L5.96998 7.16L6.03998 7.91C6.01998 7.91 5.98998 7.91 5.96998 7.91ZM6.06998 6.41C6.12998 6.41 6.17998 6.41 6.23998 6.42C7.12998 6.38 7.90998 5.58 7.90998 4.59C7.90998 3.58 7.08998 2.75999 6.07998 2.75999C5.06998 2.75999 4.24998 3.58 4.24998 4.59C4.24998 5.57 5.00998 6.36 5.97998 6.42C5.98998 6.41 6.02998 6.41 6.06998 6.41Z" fill="#363839"/>
                                                            <path d="M5.96 15.28C4.73 15.28 3.55 14.95 2.64 14.35C1.76 13.76 1.25 12.91 1.25 12.01C1.25 11.12 1.76 10.27 2.64 9.68002C3.84 8.88002 5.53 8.57003 7.16 8.86003C7.57 8.93003 7.84 9.32002 7.77 9.73002C7.7 10.14 7.31 10.42 6.9 10.34C5.66 10.12 4.35 10.35 3.47 10.93C3 11.24 2.75 11.62 2.75 12.01C2.75 12.4 3.01 12.79 3.47 13.1C4.34 13.68 5.64 13.91 6.87 13.7C7.28 13.63 7.67 13.91 7.74 14.31C7.81 14.72 7.54 15.11 7.13 15.18C6.74 15.25 6.35 15.28 5.96 15.28Z" fill="#363839"/>
                                                            <path d="M11.9998 15.38C11.9698 15.38 11.9498 15.38 11.9198 15.38H11.8698C9.97982 15.32 8.56982 13.86 8.56982 12.06C8.56982 10.22 10.0698 8.72998 11.8998 8.72998C13.7298 8.72998 15.2298 10.23 15.2298 12.06C15.2198 13.87 13.8098 15.33 12.0098 15.39C12.0098 15.38 12.0098 15.38 11.9998 15.38ZM11.8998 10.22C10.8898 10.22 10.0698 11.04 10.0698 12.05C10.0698 13.04 10.8398 13.84 11.8298 13.88C11.8398 13.87 11.9198 13.87 12.0098 13.88C12.9798 13.83 13.7298 13.03 13.7398 12.05C13.7398 11.05 12.9198 10.22 11.8998 10.22Z" fill="#363839"/>
                                                            <path d="M11.9998 22.76C10.7998 22.76 9.59978 22.45 8.66978 21.82C7.78978 21.23 7.27979 20.39 7.27979 19.49C7.27979 18.6 7.77978 17.74 8.66978 17.15C10.5398 15.91 13.4698 15.91 15.3298 17.15C16.2098 17.74 16.7198 18.58 16.7198 19.48C16.7198 20.37 16.2198 21.23 15.3298 21.82C14.3998 22.44 13.1998 22.76 11.9998 22.76ZM9.49979 18.41C9.02979 18.72 8.77979 19.11 8.77979 19.5C8.77979 19.89 9.03979 20.27 9.49979 20.58C10.8498 21.49 13.1398 21.49 14.4898 20.58C14.9598 20.27 15.2098 19.88 15.2098 19.49C15.2098 19.1 14.9498 18.72 14.4898 18.41C13.1498 17.5 10.8598 17.51 9.49979 18.41Z" fill="#363839"/>
                                                        </svg>
                                                    </figure>
                                                    <span>
                                                    <?= $so_nguoi ?>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
            <?php if(!empty($query_course->max_num_pages && $query_course->max_num_pages > 1)): ?>
                <nav class="number-page">
                <ul>
                    <?php
                    // Nút "Previous"
                    $prev_link = esc_url(add_query_arg('paged', max(1, $paged - 1)));
                    echo '<li><a href="' . $prev_link . '"><i class="fas fa-angle-left"></i></a></li>';

                    // Lặp qua các trang và hiển thị nút tương ứng
                    for ($i = 1; $i <= $query_course->max_num_pages; $i++) {
                        $is_current = $i == $paged ? ' class="active"' : '';
                        echo '<li' . $is_current . '><a href="' . esc_url(add_query_arg('paged', $i)) . '">' . $i . '</a></li>';
                    }

                    // Nút "Next"
                    $next_link = esc_url(add_query_arg('paged', min($query_course->max_num_pages, $paged + 1)));
                    echo '<li><a href="' . $next_link . '"><i class="fas fa-angle-right"></i></a></li>';
                    ?>
                </ul>
            </nav>
            <?php endif; ?>
        </div>
    </section>

    <section class="section-homepage-3 section-course-2">
        <div class="content">
            <div class="left">
                <div class="icon icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="101" height="101" viewBox="0 0 101 101" fill="none">
                        <path d="M3.51838 70.881L9.74032 70.881C15.6058 70.8798 20.3576 66.1281 20.3588 60.2626L20.3588 37.1991L33.6831 37.1991L33.6831 50.5235L33.6831 54.0407L33.6831 60.7022C33.6843 66.3251 38.2402 70.8798 43.8619 70.881C49.4847 70.8798 54.0395 66.3239 54.0407 60.7022L54.0407 54.0407L60.7022 54.0406C66.3251 54.0395 70.8798 49.4835 70.881 43.8619C70.8798 38.239 66.3239 33.6842 60.7022 33.6831L54.0407 33.6831L50.5235 33.6831L37.1991 33.6831L37.1991 20.3587L60.2626 20.3587C66.1281 20.3576 70.8798 15.6058 70.881 9.74028L70.881 3.51719L101 3.51719L101 -1.30728e-05L70.881 -1.14495e-05L33.6819 -9.44467e-06L-3.58067e-06 -7.62939e-06L-2.38657e-06 33.6819L-1.06778e-06 70.881L0 101L3.5172 101L3.5172 70.881L3.51838 70.881ZM14.7617 65.284C14.0817 65.9628 13.2669 66.4986 12.363 66.8585L12.363 37.1991L16.8416 37.1991L16.8416 60.2626C16.8416 62.2299 16.0502 63.9932 14.7617 65.284ZM33.6831 16.9306C24.815 17.763 17.7642 24.815 16.9306 33.6831L12.4298 33.6831C12.7604 27.9559 15.1861 22.8044 18.9941 18.9941C22.8044 15.1861 27.9559 12.7604 33.6831 12.4298L33.6831 16.9306ZM50.5246 60.7022C50.5234 62.5476 49.7813 64.2018 48.5737 65.4129C47.3626 66.6217 45.7084 67.3638 43.8631 67.3638C42.0177 67.3626 40.3634 66.6205 39.1523 65.4129C37.9436 64.2018 37.2026 62.5476 37.2015 60.7022L37.2015 54.0407L50.5258 54.0407L50.5258 60.7022L50.5246 60.7022ZM60.7034 37.1991C62.5488 37.2003 64.203 37.9424 65.4141 39.15C66.6229 40.361 67.365 42.0153 67.365 43.8607C67.3638 45.706 66.6217 47.3603 65.4141 48.5714C64.203 49.7801 62.5488 50.5223 60.7034 50.5223L54.0418 50.5223L54.0418 37.1979L60.7034 37.1991ZM50.5246 37.1991L50.5246 50.5235L37.2003 50.5235L37.2003 37.1991L50.5246 37.1991ZM20.4701 33.6819C20.8723 30.2186 22.4351 27.12 24.7764 24.7752C27.12 22.4339 30.2198 20.8711 33.6831 20.4677L33.6831 33.6807L20.4701 33.6819ZM60.2638 16.8415L37.2003 16.8415L37.2003 12.3629L66.8597 12.3629C66.4998 13.2669 65.964 14.0817 65.2852 14.7617C63.9944 16.049 62.2299 16.8404 60.2638 16.8415ZM67.365 8.84574L37.2003 8.84574L37.2003 3.51834L67.365 3.51834L67.365 8.84574ZM3.51838 3.5172L33.6831 3.51719L33.6831 8.87858C20.2872 9.54451 9.54569 20.286 8.87977 33.6819L3.51838 33.6819L3.51838 3.5172ZM8.84578 37.1991L8.84578 67.365L3.51838 67.365L3.51838 37.1991L8.84578 37.1991Z"
                              fill="#F7C56B"/>
                    </svg>
                </div>
                <div class="icon icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="101" height="102" viewBox="0 0 101 102" fill="none">
                        <path d="M70.881 98.027L70.881 91.8051C70.8798 85.9396 66.1281 81.1878 60.2626 81.1866L37.1991 81.1867L37.1991 67.8623L50.5235 67.8623L54.0407 67.8623L60.7022 67.8623C66.3251 67.8612 70.8798 63.3052 70.881 57.6835C70.8798 52.0607 66.3239 47.5059 60.7022 47.5047L54.0406 47.5047L54.0406 40.8432C54.0395 35.2204 49.4835 30.6656 43.8619 30.6644C38.239 30.6656 33.6842 35.2215 33.6831 40.8432L33.6831 47.5047L33.6831 51.0219L33.6831 64.3463L20.3587 64.3463L20.3587 41.2828C20.3576 35.4173 15.6058 30.6656 9.74028 30.6644L3.51719 30.6644L3.51719 0.545421L-1.47907e-05 0.545421L-1.26552e-05 30.6644L-1.00176e-05 67.8635L-7.62939e-06 101.545L33.6819 101.545L70.881 101.545L101 101.545L101 98.0282L70.881 98.0282L70.881 98.027ZM65.284 86.7837C65.9628 87.4637 66.4986 88.2785 66.8585 89.1824L37.1991 89.1824L37.1991 84.7039L60.2626 84.7039C62.2299 84.7039 63.9932 85.4952 65.284 86.7837ZM16.9306 67.8623C17.763 76.7304 24.815 83.7812 33.6831 84.6148L33.6831 89.1156C27.9559 88.785 22.8044 86.3593 18.9941 82.5513C15.1861 78.741 12.7604 73.5895 12.4298 67.8623L16.9306 67.8623ZM60.7022 51.0208C62.5476 51.022 64.2018 51.7641 65.4129 52.9717C66.6217 54.1828 67.3638 55.837 67.3638 57.6824C67.3626 59.5277 66.6205 61.182 65.4129 62.3931C64.2018 63.6018 62.5476 64.3428 60.7022 64.3439L54.0407 64.3439L54.0406 51.0196L60.7022 51.0196L60.7022 51.0208ZM37.1991 40.842C37.2003 38.9966 37.9424 37.3424 39.15 36.1313C40.361 34.9226 42.0153 34.1804 43.8607 34.1804C45.706 34.1816 47.3603 34.9237 48.5714 36.1313C49.7801 37.3424 50.5223 38.9966 50.5223 40.842L50.5223 47.5036L37.1979 47.5036L37.1991 40.842ZM37.1991 51.0208L50.5234 51.0208L50.5235 64.3451L37.1991 64.3451L37.1991 51.0208ZM33.6819 81.0753C30.2186 80.6731 27.12 79.1103 24.7752 76.769C22.4339 74.4254 20.8711 71.3256 20.4677 67.8623L33.6807 67.8623L33.6819 81.0753ZM16.8415 41.2817L16.8415 64.3451L12.3629 64.3451L12.3629 34.6857C13.2669 35.0457 14.0817 35.5814 14.7617 36.2602C16.049 37.5511 16.8404 39.3155 16.8415 41.2817ZM8.84574 34.1804L8.84574 64.3451L3.51834 64.3451L3.51834 34.1804L8.84574 34.1804ZM3.5172 98.027L3.51719 67.8623L8.87858 67.8623C9.54451 81.2582 20.286 91.9997 33.6819 92.6656L33.6819 98.027L3.5172 98.027ZM37.1991 92.6996L67.365 92.6996L67.365 98.027L37.1991 98.027L37.1991 92.6996Z"
                              fill="#F7C56B"/>
                    </svg>
                </div>
                <div class="text">
                    <div class="name">
                        <h3>
                            <?php echo $calendar_title ?>
                        </h3>
                    </div>
                    <div class="desc">
                        <p>
                            <?php echo $calendar_desc ?>
                        </p>
                    </div>
                    <div class="action">
                        <a href="<?= $calendar_btn_url ?>">
                            <?= $calendar_btn_title ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="image">
                    <figure>
                        <img src="<?= getimage($calendar_img) ?>" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>