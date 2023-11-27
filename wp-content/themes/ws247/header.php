<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ws247
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-MRHGP99');</script>
<!-- End Google Tag Manager -->

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php the_field('script_head','option') ?>
	<?php wp_head(); ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-165845429-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-165845429-1');
</script>
</head>
<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MRHGP99" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<header>
		<section class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="logo-menu">
							<div class="logo">
								<?php
								$custom_logo_id = get_theme_mod( 'custom_logo' );
								$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
								printf ('<a href="%1$s" title="%2$s"><img src="%3$s"></a>',
									get_bloginfo('url'),
									get_bloginfo('description'),
									$image[0]
								);
								?>
							</div>
							<div class="menu-search">
								<div class="menu">
									<ul>
										<?php
										wp_nav_menu( array(
											'theme_location'  => 'menu-1',
											'container'       => '__return_false',
											'fallback_cb'     => '__return_false',
											'items_wrap'      => '%3$s',
											'depth'           => 2,
											'walker'          => new WP_bootstrap_4_walker_nav_menu()

										) );
										?>
									</ul>
								</div>
								<div class="search">
									<span class="icon-search search-nh"><i class="fa fa-search" aria-hidden="true"></i></span>
									<span class="icon-search toggle hc-nav-trigger hc-nav-1"><i class="fa fa-bars" aria-hidden="true"></i></span>
									<div class="form-search">
										<form action="<?php echo get_home_url() ?>">
											<input class="form-control" type="text" placeholder="Search.." name="s">
											<button class="btn" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</header>