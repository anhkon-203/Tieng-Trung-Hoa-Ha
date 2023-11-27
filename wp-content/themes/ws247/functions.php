<?php
/**
 * ws247 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ws247
 */

if ( ! function_exists( 'ws247_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ws247_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ws247, use a find and replace
		 * to change 'ws247' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ws247', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'ws247' ),
		) );
		register_nav_menus( array(
			'menu-2' => esc_html__( 'Menu Footer', 'ws247' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );


		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'ws247_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ws247_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'ws247_content_width', 640 );
}
add_action( 'after_setup_theme', 'ws247_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ws247_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Trang chủ', 'ws247' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'ws247' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ws247' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ws247' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ws247_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ws247_scripts() {
	wp_enqueue_style( 'ws247-style', get_stylesheet_uri() );

	if(get_field('qt_uikit','option')){
		wp_enqueue_style('css_uikit', get_template_directory_uri() . '/assets/plugin/uikit-3.0.3/css/uikit.min.css');
	}

	if(get_field('qt_bootstrap_4','option')){
		wp_enqueue_style('css_boostrap', get_template_directory_uri() . '/assets/plugin/bootstrap/bootstrap.min.css');
	}

	if(get_field('qt_fontawesome','option')){
		wp_enqueue_style('css_font_awesome', get_template_directory_uri() . '/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css');
	}

	if(get_field('qt_fancybox','option')){
		wp_enqueue_style('css_fancybox', get_template_directory_uri() . '/assets/plugin/fancybox/jquery.fancybox.min.css');
	}

	if(get_field('qt_slick','option')){
		wp_enqueue_style('css_slick', get_template_directory_uri() . '/assets/plugin/slick-1.8.1/slick/slick.css');
		wp_enqueue_style('css_slick2', get_template_directory_uri() . '/assets/plugin/slick-1.8.1/slick/slick-theme.css');
	}

	if(get_field('qt_carousel','option')){
		wp_enqueue_style('css_carousel', get_template_directory_uri() . '/assets/plugin/carousel/owl.carousel.min.css');
		wp_enqueue_style('css_carousel2', get_template_directory_uri() . '/assets/plugin/carousel/owl.theme.default.min.css');
	}

	if(get_field('qt_animate_css','option')){
		wp_enqueue_style('css_aniamte', get_template_directory_uri() . '/assets/css/animate.css');
	}

	if(get_field('qt_reset_css','option')){
		wp_enqueue_style('css_reset', get_template_directory_uri() . '/assets/css/reset.css');
	}
	wp_enqueue_style('css_stylez', get_template_directory_uri() . '/assets/css/jquery-ui.css');
	wp_enqueue_style('css_style2', get_template_directory_uri() . '/assets/css/demo.css');
	wp_enqueue_style('css_stylex', get_template_directory_uri() . '/assets/css/style.css');
	wp_enqueue_style('css_stylec', get_template_directory_uri() . '/assets/css/responsive.css');
	wp_enqueue_style('css_res_style', get_template_directory_uri() . '/assets/css/cus-res.css');

	wp_enqueue_script( 'ws247-jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '20151215', true );

	if(get_field('qt_uikit','option')){
		wp_enqueue_script( 'ws247-uikit', get_template_directory_uri() . '/assets/plugin/uikit-3.0.3/js/uikit.min.js', array(), '20151215', true );
		wp_enqueue_script( 'ws247-uikit2', get_template_directory_uri() . '/assets/plugin/uikit-3.0.3/js/uikit-icons.min.js', array(), '20151215', true );
	}

	if(get_field('qt_bootstrap_4','option')){
		wp_enqueue_script( 'ws247-bootstrap', get_template_directory_uri() . '/assets/plugin/bootstrap/bootstrap.min.js', array(), '20151215', true );
	};

	if(get_field('qt_fancybox','option')){
		wp_enqueue_script( 'ws247-fancybox', get_template_directory_uri() . '/assets/plugin/fancybox/jquery.fancybox.min.js', array(), '20151215', true );
	}

	if(get_field('qt_slick','option')){
		wp_enqueue_script( 'ws247-slick', get_template_directory_uri() . '/assets/plugin/slick-1.8.1/slick/slick.min.js', array(), '20151215', true );
	}

	if(get_field('qt_carousel','option')){
		wp_enqueue_script( 'ws247-carousel', get_template_directory_uri() . '/assets/plugin/carousel/owl.carousel.min.js', array(), '20151215', true );
	}

	if(get_field('qt_wow_js','option')){
		wp_enqueue_script( 'ws247-wow', get_template_directory_uri() . '/assets/js/wow.min.js', array(), '20151215', true );
	}

	if(get_field('qt_menu_offcanvas','option')){
		wp_enqueue_script( 'ws247-menu', get_template_directory_uri() . '/assets/js/hc-offcanvas-nav.js', array(), '20151215', true );
	}
	wp_enqueue_script( 'ws247-index', get_template_directory_uri() . '/assets/js/jquery-ui.js', array(), '20151215', true );
	wp_enqueue_script( 'ws247-index2', get_template_directory_uri() . '/assets/js/main.js', array(), '20151215', true );
	wp_enqueue_script( 'ws247-index3', get_template_directory_uri() . '/assets/js/style.js', array(), '20151215', true );

	wp_enqueue_script( 'ws247-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'ws247-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ws247_scripts' );


/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer Navbar
 */
require get_template_directory() . '/inc/custom/custom-navbar.php';

/**
 * Customizer Widgets
 */
require get_template_directory() . '/inc/custom/custom-widgets.php';

function register_acf_block_types() {

    // register a testimonial block.
	acf_register_block_type(array(
		'name'              => 'title2',
		'title'             => __('Tiêu đề 2 màu'),
		'description'       => __('Tiêu đề 2 màu'),
		'render_template'   => 'template-parts/blocks/title.php',
		'category'          => 'formatting',
		'icon'              => 'edit',
		'keywords'          => array( 'title2', 'quote' ),
	));
}

add_action('acf/init', 'register_acf_block_types');
/**
 * Customizer ACF
 */
require get_template_directory() . '/inc/custom/custom-acf.php';

/**
 * Customizer Wp
 */
require get_template_directory() . '/inc/custom/custom-wp.php';



if(get_field('qt_woocommerce','option')){
	require get_template_directory() . '/inc/custom/custom-woo.php';
}

/**
 * Remove medium_large size
 */
function ws247_remove_image_sizes( $sizes) {
	unset( $sizes['large'] );
	unset( $sizes['medium_large'] );
	unset( $sizes['medium'] );
	return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'ws247_remove_image_sizes');

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



//

// Function hiển thị số lượng người xem.
function getPostViews($postID){
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0";
	}
	return $count;
}

// Function đếm số người xem.
function setPostViews($postID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}else{
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}
//
wpcf7_add_shortcode('lptitle', 'custom_lptitle_shortcode_handler', true);
function custom_lptitle_shortcode_handler( $tag ) {
	global $post;
	$id = get_the_ID();
	$phone = get_field('d1_hotline',$id);
	$email = get_field('d1_email',$id);
	$content = '<div class="list-phone-email">
	<ul>
	<li>
	<div class="icon">
	<img src="'.get_stylesheet_directory_uri().'/assets/images/phone.png" alt="">
	</div>
	<div class="text">
	<span> Hotline</span>
	<a href="tel:'.$phone.'" title="">'.$phone.'</a>
	</div>
	</li>
	<li>
	<div class="icon">
	<img src="'.get_stylesheet_directory_uri().'/assets/images/email.png" alt="">
	</div>
	<div class="text">
	<span> Email</span>
	<a href="mailto:'.$email.'" title="">'.$email.'</a>
	</div>
	</li>
	</ul>
	</div>';
	return $content;
}