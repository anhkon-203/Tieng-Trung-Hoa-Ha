<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ws247
 */

get_header();
?>
<h1 class="d-none"><?php single_cat_title() ?></h1>
<main>
	<section class="main-news-container">
		<div class="container">
			<div class="row">
				<?php if ( have_posts() ) : ?>
					<div class="col-md-12">
						<?php $i=0 ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php $i++ ?>
							<?php if($i==1){ ?>
								<div class="news-top wow fadeInDown" data-wow-delay=".5s" data-wow-duration="1s">
									<div class="row m-0 align-items-center">
										<div class="col-md-8 p-0">
											<div class="img-nt">
												<a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
													<?php if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
														?>
														<img class="w-100" src="<?php ws247_post_thumbnail() ?>" alt="<?php the_title() ?>">
														<?php
													} else { ?>
														<img class="w-100" src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
													<?php } ?>
												</a>
											</div>
										</div>
										<div class="col-md-4 p-0">
											<div class="text-nt">
												<h2><a href="<?php the_permalink() ?>" title=""><?php the_title() ?></a></h2>
												<p><?php echo excerpt(40) ?></p>
												<span class="date"><?php echo get_the_date('d/m/Y') ?></span>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						<?php endwhile; ?>
						<div class="news-content">
							<div class="row">
								<div class="col-lg-9 col-md-8">
									<div class="title-news">
										<h2>Mới nhất</h2>
									</div>
									<div class="list-news-left">
										<?php $i=0 ?>
										<?php while ( have_posts() ) : the_post(); ?>
											<?php $i++ ?>
											<?php if($i!=1){ ?>
												<div class="box-news wow fadeInDown" data-wow-delay=".5s" data-wow-duration="1s">
													<div class="row">
														<div class="col-lg-5 col-md-6">
															<div class="img-news">
																<a href="<?php the_permalink() ?>" title=""><img class="w-100" src="<?php ws247_post_thumbnail() ?>" alt="<?php the_title() ?>"></a>
															</div>
														</div>
														<div class="col-lg-7 col-md-6">
															<div class="text-news">
																<h3><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h3>
																<p><?php echo excerpt(40) ?></p>
																<span class="date"><i class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo get_the_date('d/m/Y') ?></span>
															</div>
														</div>
													</div>
												</div>
											<?php } ?>
										<?php endwhile; ?>
									</div>
									<?php ws247_pagination() ?>
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
				<?php else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
