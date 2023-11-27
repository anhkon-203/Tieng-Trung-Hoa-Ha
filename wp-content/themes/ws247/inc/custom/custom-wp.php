<?php
//Login
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/admin/admin.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
//Upload SVG
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');
//Thumbnail
if ( ! function_exists( 'ws247_post_thumbnail' ) ) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function ws247_post_thumbnail() {
        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            echo get_stylesheet_directory_uri().'/assets/images/default-thumbnail.jpg';
        } else {
         the_post_thumbnail_url('thumbnail');
     }
 }
endif;
//Pagination
function ws247_pagination() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="list-number-next-tab"><ul>' . "\n";

    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );

    echo '</ul></div>' . "\n";

}
//Remove size image
function wpse279908_admin_print_styles() {

    $screen = get_current_screen();

    // Media Options Page Only
    if( 'options-media' !== $screen->id ) {
        return;
    }

    ?>

    <style>
        #wpbody-content form > table:first-of-type tr:nth-of-type( 2 ),
        #wpbody-content form > table:first-of-type tr:nth-of-type( 3 )  {display: none;}
    </style>

    <?php

}
add_action( 'admin_print_styles', 'wpse279908_admin_print_styles' );
//Option

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'  => 'Quản trị',
        'menu_title'  => 'Quản trị',
        'menu_slug'   => 'quan-tri',
        'capability'  => 'edit_posts',
        'icon_url'      => 'dashicons-shield',
        'position'      => '2',
        'redirect'    => true
    ));
    acf_add_options_sub_page(array(
        'page_title'  => 'Cài Đặt Chung',
        'menu_title'  => 'Cài Đặt Chung',
        'parent_slug' => 'themes.php',
    ));
    if(get_field('qt_woocommerce','option')){
        acf_add_options_sub_page(array(
            'page_title'  => 'Cài Đặt Woocommerce',
            'menu_title'  => 'Cài Đặt Woocommerce',
            'parent_slug' => 'themes.php',
        ));
    }
    if(get_field('qt_giaodien','option')){
        while(have_rows('qt_giaodien','option')){the_row();
            $page_title = get_sub_field('page_title');
            $menu_title = get_sub_field('menu_title');
            acf_add_options_sub_page(array(
                'page_title'  => $page_title,
                'menu_title'  => $menu_title,
                'parent_slug' => 'themes.php',
            ));
        }
    }
}

//echo excerp(x)
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);

  if (count($excerpt) >= $limit) {
      array_pop($excerpt);
      $excerpt = implode(" ", $excerpt) . '...';
  } else {
      $excerpt = implode(" ", $excerpt);
  }

  $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

  return $excerpt;
}

function content($limit) {
    $content = explode(' ', get_the_content(), $limit);

    if (count($content) >= $limit) {
        array_pop($content);
        $content = implode(" ", $content) . '...';
    } else {
        $content = implode(" ", $content);
    }

    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content); 
    $content = str_replace(']]>', ']]&gt;', $content);

    return $content;
}

//Mở nếu muốn editor 4.9
if(!get_field('ge_editor','option')){
    add_filter('use_block_editor_for_post', '__return_false', 10);
    add_filter('use_block_editor_for_post_type', '__return_false', 10);
}

//TinyMce
if ( ! function_exists( 'devvn_ilc_mce_buttons' ) ) {
    function devvn_ilc_mce_buttons($buttons){
        array_push($buttons,
           "alignjustify",
           "subscript",
           "superscript"
       );
        return $buttons;
    }
    add_filter("mce_buttons", "devvn_ilc_mce_buttons");
}
if ( ! function_exists( 'devvn_ilc_mce_buttons_2' ) ) {
    function devvn_ilc_mce_buttons_2($buttons){
        array_push($buttons,
           "backcolor",
           "anchor",
           "fontselect",
           "fontsizeselect",
           "cleanup"
       );
        return $buttons;
    }
    add_filter("mce_buttons_2", "devvn_ilc_mce_buttons_2");
}
// Customize mce editor font sizes
if ( ! function_exists( 'devvn_mce_text_sizes' ) ) {
 function devvn_mce_text_sizes( $initArray ){
    $fontsize = get_field('ge_fontsize','option');
    $initArray['fontsize_formats'] =  $fontsize;
    return $initArray;
}
add_filter( 'tiny_mce_before_init', 'devvn_mce_text_sizes' );
}

add_filter( 'tiny_mce_before_init', 'myformatTinyMCE' );
function myformatTinyMCE( $in ) {

    $in['wordpress_adv_hidden'] = FALSE;

    return $in;
}
//MỞ NGAY KHI BÀN GIAO KHÁCH
if(get_field('qt_bg_1','option')){
    define('WP_POST_REVISIONS', false);
}
if(get_field('qt_bg_2','option')){
    define('DISALLOW_FILE_EDIT',true);
    define('DISALLOW_FILE_MODS',true);
}

add_action('admin_head', 'my_custom_fonts');
function my_custom_fonts() {
    ?>
    <style>
        <?php if(get_field('qt_bg_3','option')){ ?>
            #toplevel_page_edit-post_type-acf-field-group{
              display: none;
          }
      <?php } ?>
      <?php if(get_field('qt_bg_4','option')){ ?>
        #menu-plugins{
          display: none;
      }
  <?php } ?>
  <?php if(get_field('qt_bg_5','option')){ ?>
    #toplevel_page_quan-tri{
      display: none;
  }
<?php } ?>
div#widgets-right .sidebars-column-1, div#widgets-right .sidebars-column-2{
    max-width: 100%!important;
    width: 100%!important;
}
#wp-admin-bar-wp-logo,#wpfooter{
    display: none;
}
#adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap {
    background-color: #3a4b55;
}

#adminmenu .wp-has-current-submenu .wp-submenu, #adminmenu .wp-has-current-submenu .wp-submenu.sub-open, #adminmenu .wp-has-current-submenu.opensub .wp-submenu, #adminmenu a.wp-has-current-submenu:focus+.wp-submenu, .no-js li.wp-has-current-submenu:hover .wp-submenu{
    background-color: rgba(0,0,0,.15);
}
#adminmenu a{
    color: hsla(0,0%,100%,.8);
    display: block;
    border-left: 3px solid transparent;
}
#adminmenu a:hover{
    border-left: 3px solid #43b1d6;
    background-color: #2c3a42;
}
#adminmenu div.wp-menu-name {
    color: #fff;
}
#adminmenu div.wp-menu-image:before{
    color: #fff;
}
#adminmenu li:not(:last-child){
    border-bottom: 1px solid #49565d!important;
}
#adminmenu li.wp-menu-separator,#adminmenu li.wp-has-submenu.wp-not-current-submenu:hover:after{
    display: none;
}
#wpadminbar{
    background: #518ca3;
}
#wpadminbar #adminbarsearch:before, #wpadminbar .ab-icon:before, #wpadminbar .ab-item:before,#wpadminbar .ab-empty-item, #wpadminbar a.ab-item, #wpadminbar>#wp-toolbar span.ab-label, #wpadminbar>#wp-toolbar span.noticon {
    color: #fff;
}
#wpwrap{
    background: #eef1f5;
}
</style>
<?php
}


//SMTP

add_action( 'phpmailer_init', function( $phpmailer ) {
    if ( !is_object( $phpmailer ) )
        $phpmailer = (object) $phpmailer;
    $phpmailer->Mailer     = 'smtp';
    $phpmailer->Host       = 'smtp.gmail.com';
    $phpmailer->SMTPAuth   = 1;
    $phpmailer->Port       = 587;
    $phpmailer->Username   = get_field('ge_email','option');
    $phpmailer->Password   = get_field('ge_pass','option');
    $phpmailer->SMTPSecure = 'TLS';
    $phpmailer->From       = get_field('ge_email','option');
    $phpmailer->FromName   = get_field('ge_tieudeemail','option');
});

//Post Type

if( have_rows('qt_post_type','option') ):
    function custom_post_type() {
        while ( have_rows('qt_post_type','option') ) : the_row();
            $tieude=get_sub_field('tieu_de');
            $duongdan=get_sub_field('duong_dan');
            $icon=get_sub_field('icon');
            $tendm=get_sub_field('ten_danh_muc');
            $duongdandm=get_sub_field('duong_dan_dm');
    /*
    * Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin
    */
    $label = array(
    'name' => $tieude, //Tên post type dạng số nhiều
    'singular_name' => $tieude //Tên post type dạng số ít
);

    /*
    * Biến $args là những tham số quan trọng trong Post Type
    */
    $args = array(
    'labels' => $label, //Gọi các label trong biến $label ở trên
    'description' => $tieude, //Mô tả của post type
    'supports' => array(
        'title',
        'editor',
        'excerpt',
        'author',
        'thumbnail',
        'comments',
        'trackbacks',
        'revisions',
        'custom-fields'
    ), //Các tính năng được hỗ trợ trong post type
    'taxonomies' => array( $duongdandm), //Các taxonomy được phép sử dụng để phân loại nội dung
    'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
    'public' => true, //Kích hoạt post type
    'show_ui' => true, //Hiển thị khung quản trị như Post/Page
    'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
    'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
    'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
    'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
    'menu_icon' => $icon, //Đường dẫn tới icon sẽ hiển thị
    'can_export' => true, //Có thể export nội dung bằng Tools -> Export
    'has_archive' => true, //Cho phép lưu trữ (month, date, year)
    'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
    'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
    'capability_type' => 'post' //
);
    register_post_type( $duongdan, $args );
endwhile;
}
add_action( 'init', 'custom_post_type', 0 );

// Register Custom Taxonomy
function custom_taxonomy() {


    while ( have_rows('qt_post_type','option') ) : the_row();
        $tieude=get_sub_field('tieu_de');
        $duongdan=get_sub_field('duong_dan');
        $icon=get_sub_field('icon');
        $tendm=get_sub_field('ten_danh_muc');
        $duongdandm=get_sub_field('duong_dan_dm');




/* Biến $label chứa các tham số thiết lập tên hiển thị của Taxonomy
 */
$labels = array(
    'name' => $tendm,
    'singular' => $tendm,
    'menu_name' => $tendm
);

/* Biến $args khai báo các tham số trong custom taxonomy cần tạo
 */
$args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
);

/* Hàm register_taxonomy để khởi tạo taxonomy
 */
register_taxonomy($duongdandm, $duongdan, $args);



endwhile;
}
add_action( 'init', 'custom_taxonomy', 0 );
endif;


//
