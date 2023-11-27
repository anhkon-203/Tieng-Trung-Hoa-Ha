<?php
/**
Template Name: Thành tích Apply
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
						<div class="title-main title-custom">
							<?php if(have_rows('t1_title')){ ?>
								<?php while(have_rows('t1_title')): the_row() ?>
									<h1 class="title-hd wow fadeInDown" data-wow-delay=".5s" data-wow-duration="1s"><?php the_sub_field('title_1') ?> <span><?php the_sub_field('title_2') ?></span></h1>
								<?php endwhile ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="main-apply">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php if(have_rows('t2_re')){ ?>
						<?php while(have_rows('t2_re')): the_row() ?>
							<div class="box-apply">
								<div class="title-apply">
									<h2 class="dhm wow fadeInDown" data-wow-delay=".5s" data-wow-duration="1s"><a href="javascript:void(0)" title=""><?php the_sub_field('title') ?></a></h2>
								</div>
								<?php if(have_rows('h6_re')){ ?>
									<div class="list-sv">
										<div class="row m-0">
											<?php while(have_rows('h6_re')): the_row() ?>
												<div class="col-lg-3 col-md-4 p-0 col-sv ws-mb-10">
													<div class="box-studying wow fadeInDown" data-wow-delay=".5s" data-wow-duration="1s">
														<div class="img-top">
															<a href="javascript:void(0)" title=""><img src="<?php the_sub_field('img') ?>" alt=""></a>
														</div>
														<div class="text-bottom">
															<div class="title-studying">
																<h3><?php the_sub_field('name') ?></h3>
																<?php if(have_rows('univer')){ ?>
																	<?php while(have_rows('univer')): the_row() ?>
																		<p><?php the_sub_field('titlle') ?></p>
																	<?php endwhile; ?>
																<?php } ?>
															</div>
															<div class="top-scholl">
																<div class="img-scholl">
																	<?php if(have_rows('univer')){ ?>
																		<?php while(have_rows('univer')): the_row() ?>
																			<a href="javascript:void(0)" title="">
																				<img src="<?php the_sub_field('logo') ?>" alt="<?php the_sub_field('titlle') ?>">
																			</a>
																		<?php endwhile; ?>
																	<?php } ?>
																</div>
																<?php if(have_rows('thuhang')){ ?>
																	<?php while(have_rows('thuhang')): the_row() ?>
																		<div class="top">
																			<span><?php the_sub_field('title') ?></span>
																			<h3><?php the_sub_field('top') ?></h3>
																		</div>
																	<?php endwhile ?>
																<?php } ?>
															</div>
															<?php if(have_rows('hocbong')){ ?>
																<?php while(have_rows('hocbong')): the_row() ?>
																	<div class="hoc-bong">
																		<span><?php the_sub_field('titlle') ?></span>
																		<p><?php the_sub_field('time') ?></p>
																	</div>
																<?php endwhile ?>
															<?php } ?>
														</div>
													</div>
												</div>
											<?php endwhile ?>
										</div>
									</div>
								<?php } ?>
							</div>
						<?php endwhile; ?>
					<?php } ?>
				</div>
				<?php if(have_rows('t2_button')){ ?>
					<?php while(have_rows('t2_button')): the_row() ?>
						<div class="col-md-12">
							<div class="contact-ql">
								<a href="<?php the_sub_field('link') ?>" title="<?php the_sub_field('title') ?>">
									<img src="<?php the_sub_field('img') ?>" alt="<?php the_sub_field('title') ?>">
									<span><?php the_sub_field('title') ?></span>
								</a>
							</div>
						</div>
					<?php endwhile; ?>
				<?php } ?>
			</div>
		</div>
	</section>
	<section class="main-list-school" style="background-image: url(<?php the_field('t3_bg') ?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title-sch">
						<?php if(have_rows('t3_title')){ ?>
							<?php while(have_rows('t3_title')): the_row() ?>
								<h2 class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="1s"><span><?php the_sub_field('title_1') ?></span> <?php the_sub_field('title_2') ?></h2>
							<?php endwhile; ?>
						<?php } ?>
					</div>
					<?php if(have_rows('t3_re')){ ?>
						<div class="list-school-content">
							<?php while(have_rows('t3_re')): the_row() ?>
								<div class="box-logo-school wow fadeInDown" data-wow-delay=".5s" data-wow-duration="1s">
									<a href="<?php the_sub_field('link') ?>" title="<?php the_sub_field('info') ?>"><img src="<?php the_sub_field('img') ?>" alt="<?php the_sub_field('info') ?>"></a>
									<span><?php the_sub_field('info') ?></span>
								</div>
							<?php endwhile; ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
