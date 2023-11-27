<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ws247
 */

get_header();
?>
<?php setPostViews(get_the_ID()); ?>
<main>
	<section class="main-news-container">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="news-content">
						<div class="row">
							<div class="col-lg-9 col-md-8">
								<div class="text-news-details">
									<h1><?php the_title() ?></h1>
									<?php get_template_part( 'template-parts/share'); ?>
									<div class="content-details ws-sgct">
										<?php the_content() ?>
									</div>
									<?php get_template_part( 'template-parts/share'); ?>
								</div>
								<?php
								$custom_taxterms = wp_get_object_terms( $post->ID, 'category', array('fields' => 'ids') );
								$args = array(
									'post_type' => 'post',
									'post_status' => 'publish',
									'posts_per_page' => 5,
									'orderby' => 'rand',
									'tax_query' => array(
										array(
											'taxonomy' => 'category',
											'field' => 'id',
											'terms' => $custom_taxterms
										)
									),
									'post__not_in' => array ($post->ID),
								);
								$related_items = new WP_Query( $args );
								if ($related_items->have_posts()) :?>
									<div class="news-lq">
										<h2>Tin Liên quan</h2>
										<?php while ( $related_items->have_posts() ) : $related_items->the_post();?>
											<div class="box-lq">
												<h3><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h3>
												<p><?php echo excerpt(40) ?></p>
												<span class="date"><i class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo get_the_date('d/m/Y') ?></span>
											</div>
										<?php endwhile; ?>
									</div>
								<?php endif; wp_reset_postdata() ?>
							</div>
							<?php $loop = new WP_Query( $args = array(
								'post_type'      => 'post', 
								'posts_per_page' => 5, 
								'meta_query' => array(
									array(
										'key'   => 'bvnb',
										'value' => '1',
									)
								)
							)); 
							if ( $loop->have_posts() ) { ?>
								<div class="col-lg-3 col-md-4">
									<div class="title-news">
										<h2>nổi bật</h2>
									</div>
									<div class="sidebar_news">
										<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
											<?php get_template_part( 'template-parts/content'); ?>
										<?php endwhile; ?>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
