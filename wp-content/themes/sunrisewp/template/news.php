<?php get_header();
/* Template Name: Tin tức */
?>

    <section class="section-news">
        <div class="container">
            <div class="title">
                <h2>
                    <?php
                    if (isset($_GET['category'])) {
                        switch ($_GET['category']) {
                            case 'tat-ca':
                                echo 'Tất cả tin tức';
                                break;
                            case 'tin-moi':
                                echo 'Tin mới';
                                break;
                            case 'su-kien':
                                echo 'Sự kiện';
                                break;
                            default:
                                echo 'Tất cả tin tức';
                                break;
                        }
                    } else {
                        echo 'Tất cả tin tức';
                    }
                    ?>
                </h2>
            </div>
            <div class="content row">
                <div class="col-lg-8">
                    <?php
                    $category_filter = isset($_GET['category']) ? $_GET['category'] : 'tat-ca';
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                    );
                    if ($category_filter === 'tat-ca') {
                        $args['posts_per_page'] = 8;
                        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                        $args['paged'] = $paged;
                    }

                    if ($category_filter === 'tin-moi') {
                        $args['orderby'] = 'date';
                        $args['order'] = 'DESC';
                        $args['posts_per_page'] = 4;
                    }

                    if ($category_filter === 'su-kien') {
                        $args['tax_query'] = array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'slug',
                                'terms' => 'su-kien',
                            ),
                        );
                    }

                    $the_query = new WP_Query($args);
                    ?>

                    <div class="col-left">
                        <div class="list">
                            <?php while ($the_query->have_posts()) : $the_query->the_post();
                                $thumbnail_post = get_the_post_thumbnail_url();
                                ?>
                                <div class="child">
                                    <div class="image">
                                        <figure>
                                            <img src="<?= (!empty($thumbnail_post)) ? $thumbnail_post : getimage(img_default()) ?>"
                                                 alt="">
                                        </figure>
                                    </div>
                                    <div class="text">
                                        <div class="name">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </div>
                                        <div class="date">
                                            <figure>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                                     viewBox="0 0 20 21" fill="none">
                                                    <path d="M13.9582 3.46675V2.16675C13.9582 1.82508 13.6749 1.54175 13.3332 1.54175C12.9915 1.54175 12.7082 1.82508 12.7082 2.16675V3.41675H7.29153V2.16675C7.29153 1.82508 7.0082 1.54175 6.66653 1.54175C6.32487 1.54175 6.04153 1.82508 6.04153 2.16675V3.46675C3.79153 3.67508 2.69987 5.01675 2.5332 7.00841C2.51653 7.25008 2.71653 7.45008 2.94987 7.45008H17.0499C17.2915 7.45008 17.4915 7.24175 17.4665 7.00841C17.2999 5.01675 16.2082 3.67508 13.9582 3.46675Z"
                                                          fill="#899197"/>
                                                    <path d="M16.6667 8.69995H3.33333C2.875 8.69995 2.5 9.07495 2.5 9.53328V14.6666C2.5 17.1666 3.75 18.8333 6.66667 18.8333H13.3333C16.25 18.8333 17.5 17.1666 17.5 14.6666V9.53328C17.5 9.07495 17.125 8.69995 16.6667 8.69995ZM12.3667 12.9916L11.95 13.4166H11.9417L9.41667 15.9416C9.30833 16.05 9.08333 16.1666 8.925 16.1833L7.8 16.35C7.39167 16.4083 7.10833 16.1166 7.16667 15.7166L7.325 14.5833C7.35 14.425 7.45833 14.2083 7.56667 14.0916L10.1 11.5666L10.5167 11.1416C10.7917 10.8666 11.1 10.6666 11.4333 10.6666C11.7167 10.6666 12.025 10.8 12.3667 11.1416C13.1167 11.8916 12.875 12.4833 12.3667 12.9916Z"
                                                          fill="#899197"/>
                                                </svg>
                                            </figure>
                                            <span><?php echo get_the_date('d F, Y'); ?></span>
                                        </div>
                                        <div class="desc">
                                            <p><?php the_excerpt(); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <?php if ($category_filter !== 'tin-moi') : ?>
                            <?php if (!empty($the_query->max_num_pages && $the_query->max_num_pages > 1)): ?>
                                <nav class="number-page">
                                    <ul>
                                        <?php
                                        // Nút "Previous"
                                        $prev_link = esc_url(add_query_arg('paged', max(1, $paged - 1)));
                                        echo '<li><a href="' . $prev_link . '"><i class="fas fa-angle-left"></i></a></li>';

                                        // Lặp qua các trang và hiển thị nút tương ứng
                                        for ($i = 1; $i <= $the_query->max_num_pages; $i++) {
                                            $is_current = $i == $paged ? ' class="active"' : '';
                                            echo '<li' . $is_current . '><a href="' . esc_url(add_query_arg('paged', $i)) . '">' . $i . '</a></li>';
                                        }

                                        // Nút "Next"
                                        $next_link = esc_url(add_query_arg('paged', min($the_query->max_num_pages, $paged + 1)));
                                        echo '<li><a href="' . $next_link . '"><i class="fas fa-angle-right"></i></a></li>';
                                        ?>
                                    </ul>
                                </nav>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <?php wp_reset_postdata(); ?>
                </div>
                <div class="col-lg-4">
                    <div class="col-right">
                        <div class="category">
                            <div class="title">
                                <h4>Thể loại</h4>
                            </div>
                            <ul id="category-filter">
                                <li <?php echo ($category_filter === 'tat-ca') ? 'class="active"' : ''; ?>
                                        data-category="tat-ca">
                                    <a href="<?php echo esc_url(add_query_arg('category', 'tat-ca', $_SERVER['REQUEST_URI'])); ?>">Tất
                                        cả</a>
                                </li>
                                <li <?php echo ($category_filter === 'tin-moi') ? 'class="active"' : ''; ?>
                                        data-category="tin-moi">
                                    <a href="<?php echo esc_url(add_query_arg('category', 'tin-moi', $_SERVER['REQUEST_URI'])); ?>">Tin
                                        mới</a>
                                </li>
                                <li <?php echo ($category_filter === 'su-kien') ? 'class="active"' : ''; ?>
                                        data-category="su-kien">
                                    <a href="?category=su-kien">Sự kiện</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hot-news">
                            <div class="title">
                                <h3>Tin nổi bật</h3>
                            </div>
                            <div class="list">
                                <?php
                                $args = array(
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'posts_per_page' => 4,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'category',
                                            'field' => 'slug',
                                            'terms' => 'tin-noi-bat',
                                        ),
                                    ),
                                );
                                $the_query = new WP_Query($args);
                                while ($the_query->have_posts()) : $the_query->the_post();
                                    $thumbnail_highlightpost = get_the_post_thumbnail_url();
                                    ?>
                                    <div class="child">
                                        <div class="image">
                                            <figure>
                                                <img src="<?= (!empty($thumbnail_highlightpost)) ? $thumbnail_highlightpost : getimage(img_default()) ?>"
                                                     alt="">
                                            </figure>
                                        </div>
                                        <div class="text">
                                            <div class="date">
                                                <span><?php echo get_the_date('d F, Y'); ?></span>
                                            </div>
                                            <div class="name">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php echo the_title(); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>