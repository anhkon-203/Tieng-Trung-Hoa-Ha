<?php
/**
Template Name: Tại sao
 */

get_header();
?>

<main>
	<section class="main-banner-why">
		<div class="img-why">
			<img class="w-100" src="<?php the_field('t1_img') ?>" alt="<?php the_title() ?>">
		</div>
		<div class="text-banner-why">
			<div class="container h-100">
				<div class="row h-100">
					<div class="col-md-12 h-100">
						<div class="text-banner-content">
							<div class="title-main text-left">
								<?php if(have_rows('t1_title')){ ?>
									<?php while(have_rows('t1_title')): the_row() ?>
										<h1 class="title-hd"><?php the_sub_field('title_1') ?> <span><?php the_sub_field('title_2') ?></span></h1>
									<?php endwhile ?>
								<?php } ?>
							</div>
							<?php the_field('t1_mota') ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="main-transaction-package" style="background-image: url(<?php the_field('t2_bg') ?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title-package">
						<h2><?php the_field('t2_title_1') ?></h2>
						<h3><?php the_field('t2_title_2') ?></h3>
						<p><?php the_field('t2_mota') ?></p>
					</div>
					<div class="images-list-package">
						<div class="row">
							<div class="col-md-6">
								<div class="img-package">
									<a href="javascript:void(0)" title=""><img class="w-100" src="<?php the_field('t2_img') ?>" alt=""></a>
								</div>
							</div>
							<div class="col-md-6">
								<?php if(have_rows('t2_re')){ ?>
									<div class="list-check-package">
										<ul>
											<?php while(have_rows('t2_re')): the_row() ?>
												<li><i class="fa fa-check-circle" aria-hidden="true"></i> 
													<span><?php the_sub_field('info') ?></span> 
												</li>
											<?php endwhile ?>
										</ul>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="main-special-offer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title-page">
						<h2 class="title-p"><?php the_field('t3_title_1') ?></h2>
						<h3 class="title-c"><?php the_field('t3_title_2') ?></h3>
					</div>
					<?php if(have_rows('t3_re')){ ?>
						<div class="list-offer">
							<?php while(have_rows('t3_re')): the_row() ?>
								<div class="offer-box">
									<div class="ofter-content">
										<div class="number-pt">
											<h3><a href="javascript:void(0)" title="<?php the_sub_field('title') ?>"><?php the_sub_field('title') ?></a></h3>
										</div>
										<div class="content-offer">
											<p><?php the_sub_field('mota') ?></p>
										</div>
									</div>
								</div>
							<?php endwhile ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<section class="main-define">
		<div class="row m-0">
			<div class="col-md-6 p-0">
				<div class="img-define h-100">
					<img class="w-100 h-100" src="<?php the_field('t4_img') ?>" alt="">
				</div>
			</div>
			<div class="col-md-6 p-0">
				<div class="text-define">
					<?php if(have_rows('t4_title')){ ?>
						<?php while(have_rows('t4_title')): the_row() ?>
							<h2><?php the_sub_field('titlel_1') ?> <span><?php the_sub_field('titlel_2') ?></span></h2>
						<?php endwhile ?>
					<?php } ?>
					<p><?php the_field('t4_mota') ?></p>
					<?php if(have_rows('t4_re')){ ?>
						<ul>
							<?php while(have_rows('t4_re')): the_row() ?>
								<li><i class="fa fa-check-circle" aria-hidden="true"></i> <span><?php the_sub_field('info') ?></span></li>
							<?php endwhile; ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<section class="main-process">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 col-custom">
					<div class="title-process">
						<h2><?php the_field('t5_title_1') ?></h2>
						<h3><?php the_field('t5_title_2') ?></h3>
					</div>
				</div>
				<?php if(have_rows('t5_re')){ ?>
					<?php $i=0 ?>
					<?php while(have_rows('t5_re')): the_row() ?>
						<?php $i++ ?>
						<div class="col-lg-4 col-md-6 col-custom">
							<div class="box-process">
								<div class="icon-top">
									<div class="row m-0">
										<div class="col-xl-4 col-12 p-0">
											<div class="img-icon">
												<img src="<?php the_sub_field('img') ?>" alt="<?php the_sub_field('title') ?>">
											</div>
										</div>
										<div class="col-xl-8 col-12 p-0">
											<div class="text-b-top">
												<span>BƯỚC <?php echo $i ?> </span>
												<h3><?php the_sub_field('title') ?></h3>
											</div>
										</div>
									</div>
								</div>
								<div class="description">
									<p><?php the_sub_field('mota') ?></p>
								</div>
								<?php if(have_rows('re')){ ?>
									<ul>
										<?php while(have_rows('re')): the_row() ?>
											<li><i class="fa fa-check-circle" aria-hidden="true"></i> <span><?php the_sub_field('info') ?></span></li>
										<?php endwhile; ?>
									</ul>
								<?php } ?>
							</div>
						</div>
					<?php endwhile; ?>
				<?php } ?>
			</div>
		</div>
	</section>
	<section class="main-limit">
		<div class="container">
			<div class="row m-0">
				<div class="col-md-7 p-0">
					<div class="text-limit">
						<?php if(have_rows('t6_title')){ ?>
							<?php while(have_rows('t6_title')): the_row() ?>
								<h2><?php the_sub_field('titlel_1') ?> <span><?php the_sub_field('titlel_2') ?></span></h2>
							<?php endwhile; ?>
						<?php } ?>
						<?php the_field('t6_mota') ?>
						<?php if(have_rows('t6_button')){ ?>
							<?php while(have_rows('t6_button')): the_row() ?>
								<div class="contact-ql text-left">
									<a href="<?php the_sub_field('link') ?>" title="<?php the_sub_field('title') ?>">
										<img src="<?php the_sub_field('img') ?>" alt="<?php the_sub_field('title') ?>">
										<span><?php the_sub_field('title') ?></span>
									</a>
								</div>
							<?php endwhile; ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="img-limit">
			<img class="w-100 h-100" src="<?php the_field('t6_img') ?>" alt="">
		</div>
	</section>
</main>

<?php
get_footer();
