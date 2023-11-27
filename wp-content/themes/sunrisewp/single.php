<?php get_header(); ?>

    <section class="section-news detail-news">
        <div class="container">
            <div class="content row">
                <div class="col-lg-8">
                    <div class="col-left">
                        <div class="top">
                            <div class="title">
                                <h2>
                                    <?php echo the_title(); ?>
                                </h2>
                            </div>
                            <div class="date">
                                <figure>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M13.9582 2.96675V1.66675C13.9582 1.32508 13.6749 1.04175 13.3332 1.04175C12.9915 1.04175 12.7082 1.32508 12.7082 1.66675V2.91675H7.29153V1.66675C7.29153 1.32508 7.0082 1.04175 6.66653 1.04175C6.32487 1.04175 6.04153 1.32508 6.04153 1.66675V2.96675C3.79153 3.17508 2.69987 4.51675 2.5332 6.50841C2.51653 6.75008 2.71653 6.95008 2.94987 6.95008H17.0499C17.2915 6.95008 17.4915 6.74175 17.4665 6.50841C17.2999 4.51675 16.2082 3.17508 13.9582 2.96675Z" fill="#899197"/>
                                        <path d="M16.6667 8.19995H3.33333C2.875 8.19995 2.5 8.57495 2.5 9.03328V14.1666C2.5 16.6666 3.75 18.3333 6.66667 18.3333H13.3333C16.25 18.3333 17.5 16.6666 17.5 14.1666V9.03328C17.5 8.57495 17.125 8.19995 16.6667 8.19995ZM12.3667 12.4916L11.95 12.9166H11.9417L9.41667 15.4416C9.30833 15.55 9.08333 15.6666 8.925 15.6833L7.8 15.85C7.39167 15.9083 7.10833 15.6166 7.16667 15.2166L7.325 14.0833C7.35 13.925 7.45833 13.7083 7.56667 13.5916L10.1 11.0666L10.5167 10.6416C10.7917 10.3666 11.1 10.1666 11.4333 10.1666C11.7167 10.1666 12.025 10.3 12.3667 10.6416C13.1167 11.3916 12.875 11.9833 12.3667 12.4916Z" fill="#899197"/>
                                    </svg>
                                </figure>
                                <span>
                                    <?php echo get_the_date('d/m/Y'); ?>
                                </span>
                            </div>
                        </div>
                        <div class="desc">
                            <p>
                                <?php echo the_content(); ?>
                            </p>
                        </div>
                        <div class="bot">
                            <?php if(has_tag()) : ?>
                            <h4>Tags</h4>
                            <?php endif; ?>
                            <div class="list">
                                <nav class="tags">
                                    <ul>
                                        <?php
                                        $posttags = get_the_tags();
                                        ?>
                                        <?php foreach($posttags as $tag) : ?>
                                            <li><a href="#"><?php echo $tag->name; ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </nav>
                                <?php
                                $social_gallery = get_field('social_gallery');
                                ?>
                                <?php if (!empty($social_gallery)) : ?>
                                    <div class="socail">
                                        <?php
                                        ?>
                                        <?php foreach($social_gallery as $social) : ?>
                                            <figure>
                                                <img src="<?php echo getimage($social); ?>" alt="">
                                            </figure>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="col-right">
                        <div class="hot-news">
                            <div class="title">
                                <h3>Tin nổi bật</h3>
                            </div>
                            <div class="list">
                                <?php
                                $args = array(
                                    'post_type'      => 'post',
                                    'post_status'    => 'publish',
                                    'posts_per_page' => 4,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'category',
                                            'field'    => 'slug',
                                            'terms'    => 'tin-noi-bat',
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
            <div class="other-news">
                <div class="title">
                    <h3>Tin liên quan</h3>
                </div>
                <div class="list row">
                    <?php
                    // load sản phẩm cùng category
                    $category = get_the_category();
                    $category_id = $category[0]->cat_ID;
                    $args = array(
                        'post_type'      => 'post',
                        'post_status'    => 'publish',
                        'posts_per_page' => 4,
                        'post__not_in' => array(get_the_ID()),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'term_id',
                                'terms'    => $category_id,
                            ),
                        ),
                    );
                    $the_query = new WP_Query($args);
                    while ($the_query->have_posts()) : $the_query->the_post();
                        $thumbnail_post_related = get_the_post_thumbnail_url();
                        ?>
                    <div class="col-lg-3">
                        <div class="child">
                            <div class="image">
                                <figure>
                                    <img src="<?= (!empty($thumbnail_post_related)) ? $thumbnail_post_related : getimage(img_default()) ?>" alt="">
                                </figure>
                            </div>
                            <div class="text">
                                <div class="date">
                                    <figure>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                            <path d="M13.9582 3.46666V2.16666C13.9582 1.82499 13.6749 1.54166 13.3332 1.54166C12.9915 1.54166 12.7082 1.82499 12.7082 2.16666V3.41666H7.29153V2.16666C7.29153 1.82499 7.0082 1.54166 6.66653 1.54166C6.32487 1.54166 6.04153 1.82499 6.04153 2.16666V3.46666C3.79153 3.67499 2.69987 5.01666 2.5332 7.00832C2.51653 7.24999 2.71653 7.44999 2.94987 7.44999H17.0499C17.2915 7.44999 17.4915 7.24166 17.4665 7.00832C17.2999 5.01666 16.2082 3.67499 13.9582 3.46666Z" fill="#899197"/>
                                            <path d="M16.6667 8.70001H3.33333C2.875 8.70001 2.5 9.07501 2.5 9.53335V14.6667C2.5 17.1667 3.75 18.8333 6.66667 18.8333H13.3333C16.25 18.8333 17.5 17.1667 17.5 14.6667V9.53335C17.5 9.07501 17.125 8.70001 16.6667 8.70001ZM12.3667 12.9917L11.95 13.4167H11.9417L9.41667 15.9417C9.30833 16.05 9.08333 16.1667 8.925 16.1833L7.8 16.35C7.39167 16.4083 7.10833 16.1167 7.16667 15.7167L7.325 14.5833C7.35 14.425 7.45833 14.2083 7.56667 14.0917L10.1 11.5667L10.5167 11.1417C10.7917 10.8667 11.1 10.6667 11.4333 10.6667C11.7167 10.6667 12.025 10.8 12.3667 11.1417C13.1167 11.8917 12.875 12.4833 12.3667 12.9917Z" fill="#899197"/>
                                        </svg>
                                    </figure>
                                    <span><?php echo get_the_date('d F, Y'); ?></span>
                                </div>
                                <div class="name">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php echo the_title(); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>