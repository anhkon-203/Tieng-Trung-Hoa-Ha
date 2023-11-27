<?php
/**
Template Name: Đăng ký
 */

get_header();
?>

<main>
	<section class="main-banner-page-be">
		<img class="w-100" src="<?php the_field('t1_img') ?>" alt="">
		<div class="text-banner">
			<div class="container h-100">
				<div class="row h-100">
					<div class="col-md-12 h-100">
						<div class="title-banner">
							<?php if(have_rows('t1_title')){ ?>
								<?php while(have_rows('t1_title')): the_row() ?>
									<h2><?php the_sub_field('title_1') ?></h2>
									<h1><?php the_sub_field('title_2') ?></h1>
								<?php endwhile; ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="form-login-dt">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="form-login">
						<?php echo do_shortcode('[contact-form-7 id="579" title="Đăng ký"]') ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
