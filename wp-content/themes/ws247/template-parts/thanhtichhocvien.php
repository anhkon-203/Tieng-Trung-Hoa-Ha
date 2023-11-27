<?php
/**
Template Name: Thành tích học viên
 */

get_header();
?>

<main>
	<section class="banner-page">
		<div class="img-banner-page">
			<img class="w-100" src="<?php the_field('t1_img') ?>" alt="<?php the_title() ?>">
		</div>
		<div class="text-banner">
			<div class="container h-100">
				<div class="row h-100">
					<div class="col-md-12 h-100">
						<div class="title-main">
							<?php if(have_rows('t1_title')){ ?>
								<?php while(have_rows('t1_title')): the_row() ?>
									<h1 class="title-hd wow fadeInDown" data-wow-delay=".5s" data-wow-duration="1s"><?php the_sub_field('title_1') ?> <span><?php the_sub_field('title_2') ?></span></h1>
								<?php endwhile; ?>
							<?php } ?>
							<p><?php the_field('t1_mota') ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php if(have_rows('t2_re')){ ?>
		<section class="main-student-achievement">
			<div class="container">
				<div class="row">
					<?php while(have_rows('t2_re')): the_row() ?>
						<div class="col-md-6 col-custom">
							<div class="box-student-achievement wow fadeInDown" data-wow-delay=".5s" data-wow-duration="1s">
								<div class="user-left">
									<div class="img-user">
										<img src="<?php the_sub_field('img') ?>" alt="<?php the_sub_field('name') ?>">
									</div>
									<div class="text-mxh-user">
										<h3><?php the_sub_field('name') ?></h3>
										<?php if(have_rows('social')){ ?>
											<ul>
												<?php while(have_rows('social')): the_row() ?>
													<li><a href="<?php the_sub_field('link') ?>"><i class="fa <?php the_sub_field('icon') ?>" aria-hidden="true"></i></a></li>
												<?php endwhile; ?>
											</ul>
										<?php } ?>
									</div>
								</div>
								<div class="point-user">
									<?php if(have_rows('price')){ ?>
										<ul class="list-point">
											<?php while(have_rows('price')): the_row() ?>
												<li>
													<span class="text"><?php the_sub_field('mon') ?></span>
													<span class="number"><?php the_sub_field('point') ?></span>
												</li>
											<?php endwhile; ?>
										</ul>
									<?php } ?>
									<p class="emphasize"><?php the_field('mota') ?></p>
									<?php if(have_rows('unvier')){ ?>
										<?php while(have_rows('unvier')): the_row() ?>
											<div class="school-logo">
												<div class="logo-sch">
													<a href="javascript:void(0)" title="">
														<?php if (get_sub_field('img')): ?>
															<img src="<?php the_sub_field('img') ?>" alt="">
															<?php else: ?>
															<img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/no-image.jpg" alt="">
														<?php endif ?>
													</a>
												</div>
												<?php if(have_rows('title')){ ?>
													<?php while(have_rows('title')): the_row() ?>
														<div class="scholl-dh">
															<span><?php the_sub_field('title_1') ?></span>
															<p><?php the_sub_field('title_2') ?></p>
														</div>
													<?php endwhile ?>
												<?php } ?>
											</div>
										<?php endwhile ?>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</section>
	<?php } ?>
</main>

<?php
get_footer();
