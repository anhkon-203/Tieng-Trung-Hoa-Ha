<?php
/**
Template Name: Home
 */

get_header();
?>
<main>
	<?php if(have_rows('h1_re')){ ?>
		<section class="main-slide-top">
			<div class="owl-carousel sl-banner owl-theme">
				<?php $m=0 ?>
				<?php while(have_rows('h1_re')): the_row() ?>
					<?php $m++ ?>
					<div class="item">
						<div class="images-slide">
							<img src="<?php the_sub_field('img') ?>" alt="">
							<div class="paragraph">
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<div class="text-slide">
												<?php if(have_rows('titlle')){ ?>
													<?php while(have_rows('titlle')): the_row() ?>
														<?php if($m==1){ ?>
															<h1 class="title-banner"><a href="javascript:void(0)" title=""><?php the_sub_field('title_1') ?> <span><?php the_sub_field('title_2') ?></span></a></h1>
														<?php } else { ?>
															<h2 class="title-banner"><a href="javascript:void(0)" title=""><?php the_sub_field('title_1') ?> <span><?php the_sub_field('title_2') ?></span></a></h2>
														<?php } ?>
													<?php endwhile; ?>
												<?php } ?>
												<p><?php the_sub_field('mota') ?></p>
												<?php if(have_rows('button')){ ?>
													<?php while(have_rows("button")): the_row() ?>
														<?php if(get_sub_field('link')){ ?>
															<a class="more" href="<?php the_sub_field('link') ?>" title=""><?php the_sub_field('title') ?></a>
														<?php } ?>
													<?php endwhile; ?>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</section>
	<?php } ?>
	<section class="main-about-home" style="background-image: url(<?php the_field('h2_bg') ?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title-main wow fadeInDown" data-wow-delay=".15s" data-wow-duration=".75s">
						<?php if(have_rows('h2_title')){ ?>
							<?php while(have_rows('h2_title')): the_row() ?>
								<h2 class="title-hd"><?php the_sub_field('title_1') ?> <span><?php the_sub_field('title_2') ?></span></h2>
							<?php endwhile; ?>
						<?php } ?>
					</div>
				</div>
				<?php if(have_rows('h2_re')){ ?>
					<?php while(have_rows('h2_re')): the_row() ?>
						<div class="col-md-4">
							<div class="box-about-home wow fadeInDown" data-wow-delay=".15s" data-wow-duration=".75s">
								<div class="img-top-about">
									<img src="<?php the_sub_field('icon') ?>" alt="">
								</div>
								<p><?php the_sub_field('text') ?></p>
							</div>
						</div>
					<?php endwhile; ?>
				<?php } ?>
				<?php if(have_rows('button')){ ?>
					<?php while(have_rows('button')): the_row() ?>
						<div class="col-md-12">
							<div class="box-more wow fadeInDown" data-wow-delay=".15s" data-wow-duration=".75s">
								<a class="tht" href="<?php the_sub_field('link') ?>" title=""><?php the_sub_field('title') ?></a>
							</div>
						</div>
					<?php endwhile ?>
				<?php } ?>
			</div>
		</div>
	</section>
	<section class="main-highlights" style="background-image: url(<?php the_field('h3_bg') ?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title-main wow fadeInDown" data-wow-delay=".15s" data-wow-duration=".75s">
						<?php if(have_rows('h3_title')){ ?>
							<?php while(have_rows('h3_title')): the_row() ?>
								<h2 class="title-hd"><?php the_sub_field('title_1') ?> <span><?php the_sub_field('title_2') ?></span></h2>
							<?php endwhile; ?>
						<?php } ?>
					</div>
					<?php if(have_rows('h3_re')){ ?>
						<div class="list-icon-hightlights">
							<ul>
								<?php while(have_rows('h3_re')): the_row() ?>
									<li class="wow fadeInDown" data-wow-delay=".15s" data-wow-duration=".75s">
										<a href="javascript:void(0)">
											<span class="img-hl">
												<img src="<?php the_sub_field('icon') ?>" alt="">
												<img class="img-apnut w-100" src="<?php the_sub_field('icon2'); ?>" alt="">
											</span>
											<p><?php the_sub_field('text') ?></p>
										</a>
									</li>
								<?php endwhile; ?>
							</ul>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<section class="main-educate">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title-main">
						<?php if(have_rows('h4_title')){ ?>
							<?php while(have_rows('h4_title')): the_row() ?>
								<h2 class="title-hd wow fadeInDown" data-wow-delay=".15s" data-wow-duration=".75s"><?php the_sub_field('title_1') ?> <span><?php the_sub_field('title_2') ?></span></h2>
							<?php endwhile; ?>
						<?php } ?>
						<p class="wow fadeInDown" data-wow-delay=".25s" data-wow-duration=".75s"><?php the_field('h4_mota') ?></p>
						<h3 class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration=".75s"><?php the_field('h4_title_2') ?></h3>
					</div>
					<?php if(have_rows('h4_re')){ ?>
						<div class="list-box-educate">
							<div class="row row-custom">
								<?php while(have_rows('h4_re')): the_row() ?>
									<div class="col-lg-3 col-md-4 col-custom">
										<div class="box-educate wow fadeInDown" data-wow-delay=".15s" data-wow-duration=".75s">
											<div class="img-top">
												<?php $image = get_sub_field('img');
												$size = 'thumbnail'; ?>
												<a href="<?php the_sub_field('link') ?>" title=""><?php echo wp_get_attachment_image( $image, $size ); ?></a>
											</div>
											<div class="text-bottom">
												<?php if(have_rows('title')){ ?>
													<?php while(have_rows('title')): the_row() ?>
														<h4><?php the_sub_field('titlle_1') ?></h4>
														<h3><a href="<?php the_sub_field('link') ?>" title="<?php the_sub_field('titlle_2') ?>"><?php the_sub_field('titlle_2') ?></a></h3>
													<?php endwhile; ?>
												<?php } ?>
												<p><?php the_sub_field('text') ?></p>
												<a class="plust" href="<?php the_sub_field('link') ?>" title=""><i class="fa fa-plus" aria-hidden="true"></i></a>
											</div>
										</div>
									</div>
								<?php endwhile; ?>
								<?php if(have_rows('h4_group')){ ?>
									<?php while(have_rows('h4_group')): the_row() ?>
										<div class="col-lg-3 col-md-4 col-custom">
											<div class="box-contact wow fadeInDown" data-wow-delay=".15s" data-wow-duration=".75s">
												<div class="img-top">
													<a href="javascript:void(0)" title="<?php the_sub_field('title') ?>"><img src="<?php the_sub_field('img') ?>" alt="<?php the_sub_field('title') ?>"></a>
												</div>
												<h3><a href="javascript:void(0)" title="<?php the_sub_field('title') ?>"><?php the_sub_field('title') ?></a></h3>
												<p><?php the_sub_field('mota') ?></p>
												<?php if(have_rows('button')){ ?>
													<?php while(have_rows('button')): the_row() ?>
														<a class="more" href="<?php the_sub_field('link') ?>" title="<?php the_sub_field('title') ?>"><?php the_sub_field('title') ?></a>
													<?php endwhile; ?>
												<?php } ?>
											</div>
										</div>
									<?php endwhile; ?>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<section class="main-achievements" style="background-image: url(<?php the_field('h5_bg') ?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title-main" >
						<?php if(have_rows('h5_title')){ ?>
							<?php while(have_rows('h5_title')): the_row() ?>
								<h2 class="title-hd wow fadeInDown" data-wow-delay=".15s" data-wow-duration=".75s"><?php the_sub_field('title_1') ?> <span><?php the_sub_field('title_2') ?></span></h2>
							<?php endwhile; ?>
						<?php } ?>
						<h4 class="slogan-title wow fadeInDown" data-wow-delay=".5s" data-wow-duration=".75s"><?php the_field('h5_mota') ?></h4>
					</div>
				</div>
				<?php if(have_rows('h5_re')){ ?>
					<?php while(have_rows('h5_re')): the_row() ?>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="box-achievements wow fadeInDown" data-wow-delay=".15s" data-wow-duration=".75s">
								<div class="img-top">
									<?php $image = get_sub_field('img');
									$size = 'thumbnail'; ?>
									<a class="hv" href="javascript:void(0)" title="<?php the_sub_field('name') ?>"><?php echo wp_get_attachment_image( $image, $size ); ?></a>
									<div class="bgnh-bottom">
										<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/bg-nh.png" alt="<?php the_sub_field('name') ?>">
									</div>
									<div class="number-after">
										<div class="number-left">
											<?php if(have_rows('point')){ ?>
												<?php while(have_rows('point')): the_row() ?>
													<div class="ielts">
														<span><?php the_sub_field('title') ?></span>
														<span><?php the_sub_field('point') ?></span>
													</div>
												<?php endwhile; ?>
											<?php } ?>
										</div>
										<div class="text-affter">
											<span><?php the_sub_field('mota') ?></span>
										</div>
									</div>
								</div>
								<div class="text-bottom">
									<h3><a href="javascript:void(0)" title="<?php the_sub_field('name') ?>"><?php the_sub_field('name') ?></a></h3>
									<p><?php the_sub_field('univer') ?></p>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				<?php } ?>
			</div>
		</div>
	</section>
	<section class="main-achievement-studying" style="background-image: url(<?php the_field('h6_bg') ?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title-main">
						<?php if(have_rows('h6_title')){ ?>
							<?php while(have_rows('h6_title')): the_row() ?>
								<h2 class="title-hd wow fadeInDown" data-wow-delay=".15s" data-wow-duration=".75s"><?php the_sub_field('title_1') ?> <span><?php the_sub_field('title_2') ?></span></h2>
							<?php endwhile ?>
						<?php } ?>
						<p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration=".75s"><?php the_field('h6_mota') ?></p>
					</div>
					<?php if(have_rows('h6_post')){ ?>
						<div class="sv-top">
							<div class="row">
								<?php while(have_rows('h6_post')): the_row() ?>
									<div class="col-md-6">
										<div class="advisory-study wow fadeInDown" data-wow-delay=".15s" data-wow-duration=".75s">
											<div class="row m-0">
												<div class="col-lg-5 col-md-12 col-12 p-0">
													<div class="img-advisory">
														<a href="javascript:void(0)" title="<?php the_sub_field('title_2') ?>"><img class="w-100" src="<?php the_sub_field('img') ?>" alt=""></a>
													</div>
												</div>
												<div class="col-lg-7 col-md-12 col-12 p-0">
													<div class="text-advisory">
														<span><?php the_sub_field('title_1') ?></span>
														<h3><a href="javascript:void(0)" title="<?php the_sub_field('title_2') ?>"><?php the_sub_field('title_2') ?></a></h3>
														<p><?php the_sub_field('mota') ?></p>
														<?php if(have_rows('button')){ ?>
															<?php while(have_rows('button')): the_row() ?>
																<a class="more" href="<?php the_sub_field('link') ?>" title="<?php the_sub_field('title_2') ?>"><?php the_sub_field('title') ?></a>
															<?php endwhile; ?>
														<?php } ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php endwhile; ?>
							</div>
						</div>
					<?php } ?>
					<?php if(have_rows('h6_re')){ ?>
						<div class="list-sv">
							<div class="owl-carousel l-sv owl-theme">
								<?php while(have_rows('h6_re')): the_row() ?>
									<?php $image = get_sub_field('img');
									$size = 'thumbnail'; ?>
									<div class="item">
										<div class="box-studying wow fadeInDown" data-wow-delay=".15s" data-wow-duration=".75s">
											<div class="img-top">
												<a href="javascript:void(0)" title=""><?php echo wp_get_attachment_image( $image, $size ); ?></a>
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
					<?php if(have_rows('h6_button')){ ?>
						<?php while(have_rows('h6_button')): the_row() ?>
							<div class="details-link wow fadeInDown" data-wow-delay=".15s" data-wow-duration=".75s">
								<a href="<?php the_sub_field('link') ?>" title="<?php the_sub_field('title') ?>"><?php the_sub_field('title') ?></a>
							</div>
						<?php endwhile; ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<section class="main-opinion">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="text-opinion">
						<?php if(have_rows('h7_title')){ ?>
							<?php while(have_rows('h7_title')): the_row() ?>
								<h2 class="wow fadeInDown" data-wow-delay=".15s" data-wow-duration=".75s"><span><?php the_sub_field('title_1') ?></span> <?php the_sub_field('title_2') ?></h2>
							<?php endwhile; ?>
						<?php } ?>
						<p class="wow fadeInDown" data-wow-delay=".25s" data-wow-duration=".75s"><?php the_field('h7_mota') ?></p>
					</div>
				</div>
				<div class="col-md-8">
					<?php if(have_rows('h7_re')){ ?>
						<div class="slide-opinion">
							<div class="owl-carousel opinion owl-theme">
								<?php while(have_rows('h7_re')): the_row() ?>
									<?php $image = get_sub_field('img');
									$size = 'full'; ?>
									<div class="item">
										<div class="box-opinion">
											<a class="hove-op" href="javascript:void(0)" title=""><?php echo wp_get_attachment_image( $image, $size ); ?></a>
											<div class="text-bottom">
												<div class="title-box">
													<div class="ph-top">
														<h3><?php the_sub_field('name') ?></h3>
														<p><?php the_sub_field('pos') ?></p>
													</div>
													<?php if(have_rows('re')){ ?>
														<div class="mxxh">
															<?php while(have_rows('re')): the_row() ?>
																<a href="<?php the_sub_field('link') ?>" title=""><i class="fa <?php the_sub_field('icon') ?>" aria-hidden="true"></i></a>
															<?php endwhile; ?>
														</div>
													<?php } ?>
												</div>
												<div class="descripttion">
													<p><i class="fa fa-quote-left" aria-hidden="true"></i> <span><?php the_sub_field('text') ?></span> <i class="fa fa-quote-right" aria-hidden="true"></i></p>
												</div>
											</div>
										</div>
									</div>
								<?php endwhile; ?>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<section class="main-form-bottom" style="background-image: url(<?php the_field('h8_bg') ?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="form-footer">
						<div class="title-form">
							<h3><?php the_field('h8_title') ?></h3>
						</div>
						<?php echo do_shortcode('[contact-form-7 id="91" title="Đăng ký tư vấn - Thi thử - Học thử"]') ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();
