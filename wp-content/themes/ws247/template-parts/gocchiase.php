<?php
/**
Template Name: Góc chia sẻ
 */

get_header();
?>

<main>
	<section class="banner-page paga-share">
		<div class="img-banner-page">
			<img class="w-100" src="<?php the_field('t1_img') ?>" alt="<?php the_title() ?>">
		</div>
		<div class="text-banner wow fadeInDown" data-wow-delay=".5s" data-wow-duration="1s">
			<div class="container container-1000 h-100">
				<div class="row h-100">
					<div class="col-md-12 h-100">
						<div class="title-main title-custom">
							<?php if(have_rows('t1_title')){ ?>
								<?php while(have_rows('t1_title')): the_row() ?>
									<h1 class="title-hd"><?php the_sub_field('title_1') ?> <br> <span><?php the_sub_field('title_2') ?></span></h1>
								<?php endwhile; ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php if(have_rows('h7_re')){ ?>
		<section class="main-share">
			<div class="container">
				<div class="row">
					<?php while(have_rows('h7_re')): the_row() ?>
						<div class="col-lg-4 col-md-6 col-custom">
							<div class="box-opinion wow fadeInDown" data-wow-delay=".5s" data-wow-duration="1s">
								<a class="hover-zoom" href="javascript:void(0)" title=""><img class="w-100" src="<?php the_sub_field('img') ?>" alt=""></a>
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
		</section>
	<?php } ?>
</main>

<?php
get_footer();
