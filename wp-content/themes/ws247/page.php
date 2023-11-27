<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ws247
 */

get_header();
?>

<main>
	<section class="banner-page">
		<div class="img-banner-page banner-about">
			<img class="w-100" src="<?php the_field('t1_img') ?>" alt="<?php the_title() ?>">
		</div>
		<div class="text-banner">
			<div class="container container-1000 h-100">
				<div class="row h-100">
					<div class="col-md-12 h-100">
						<div class="title-main title-custom">
							<?php if(have_rows('t1_title')){ ?>
								<?php while(have_rows('t1_title')): the_row() ?>
									<h1 class="title-hd"><?php the_sub_field('title_1') ?> <br> <span style="margin-top: 10px;"><?php the_sub_field('title_2') ?></span></h1>
								<?php endwhile; ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="main-content-bv">
		<div class="container container-1000">
			<div class="row">
				<div class="col-md-12">
					<div class="text-bv">
						<div class="box-bv">
						<?php the_content() ?>
						</div>
					</div>
					<div class="contact-ql text-left">
					 <a href="http://4words.wecan-group.info/lien-he/" title="Liên hệ cấp quản lý - Xây dựng lộ trình học tập và du học"> <img src="http://4words.wecan-group.info/wp-content/uploads/2019/10/contact.png" alt="Liên hệ cấp quản lý - Xây dựng lộ trình học tập và du học"> 
					 	<span>Liên hệ cấp quản lý - Xây dựng lộ trình học tập và du học</span> </a> 
					 </div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
