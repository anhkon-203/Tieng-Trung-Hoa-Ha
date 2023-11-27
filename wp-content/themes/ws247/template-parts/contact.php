<?php
/**
Template Name: Liên hệ
 */

get_header();
?>

<main>
	<section class="main-banner-page-be">
		<img class="w-100" src="<?php the_field('t1_img') ?>" alt="<?php the_title() ?>">
		<div class="text-banner">
			<div class="container h-100">
				<div class="row h-100">
					<div class="col-md-12 h-100">
						<div class="title-banner contact-title">
							<h1 style="font-weight: 800;"><?php the_field('t1_title') ?></h1>
							<p><?php the_field('t1_mota') ?></p>
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
						<?php echo do_shortcode('[contact-form-7 id="601" title="Liên hệ"]') ?>
					</div>
					<div class="maps">
						<?php the_field('d1_maps') ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();
