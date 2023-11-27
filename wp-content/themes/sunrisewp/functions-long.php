<?php
add_filter('show_admin_bar', '__return_false');
if (function_exists('acf_add_options_page')) {
    $parent = acf_add_options_page(array(
        'page_title' => 'Cấu hình chung',
        'menu_title' => 'Cấu hình chung',
        'icon_url' => 'dashicons-image-filter',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Tổng quan',
        'menu_title' => 'Tổng quan',
        'parent_slug' => $parent['menu_slug'],
    ));

}
function getimage($id, $size = 'large', $true = '')
{

    if ($true == 'post') {
        if (get_the_post_thumbnail($id) != null) {
            return get_the_post_thumbnail_url($id, $size);
        }
    } else {
        $attachment_url = wp_get_attachment_image_url($id, $size);
        if ($attachment_url) {
            return $attachment_url;
        }
    }
    return get_field('img_default', 'option');

}

function get_post_img($id, $size = '')
{

    $img = get_the_post_thumbnail_url($id, $size);
    if ($img == '')
        $image = img_default();
    else
        $image = $img;
//    print_r($img);die();
    return $image;

}

function get_img_post($id, $size = '')
{

    $img = get_the_post_thumbnail_url($id, $size);
    $image = $img;
//    print_r($img);die();
    return $image;

}

function img_default()
{
    $src = get_field('img_default', 'option');
    return $src;

}

function get_field_tax($id, $key, $bool = 'true')
{

    $src = get_term_meta($id, $key, $bool);
    return $src;

}

function money_check($srt)
{
    return number_format($srt, 0, '.', ',');
}

function clean_content($content, $number = 30)
{
    $clean_content = strip_tags($content);
    $description = truncate_text($clean_content, $number);
    return $description;
}

function truncate_text($text, $limit)
{
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}

//add_filter('wpcf7_form_elements', function ($content) {
//    $content = str_replace('<input type="submit"', '<button type="submit"', $content);
//    $content = str_replace('</input>', '</button>', $content);
//
//    $content = str_replace('<span class="wpcf7-form-control-wrap ', '<div class="wpcf7-form-control-wrap ', $content);
//    $content = str_replace('</span>', '</div>', $content);
//    $content = str_replace('<p>', '', $content);
//    $content = str_replace('</p>', '', $content);
//
//    return $content;
//});
function replace_image_url_in_instructions($field) {
    // Lấy đường dẫn của ảnh cần thay đổi
    $old_url = 'http://pss.mymonda.net';

    // Lấy đường dẫn mới
    $new_url = home_url();

    // Thay đổi đường dẫn trong phần Instructions
    $field['instructions'] = str_replace($old_url, $new_url, $field['instructions']);

    // Trả về field đã được thay đổi
    return $field;
}
add_filter('acf/load_field', 'replace_image_url_in_instructions');
function my_Sql_regcase($str)
{

    $res = "";

    $chars = str_split($str);
    foreach ($chars as $char) {
        if (preg_match("/[A-Za-z]/", $char))
            $res .= "[" . mb_strtoupper($char, 'UTF-8') . mb_strtolower($char, 'UTF-8') . "]";
        else
            $res .= $char;
    }

    return $res;
}
function no_sql_injection($input)
{
    $sql = str_replace(my_Sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|*|--|\)/"), "", $input);
    return trim(strip_tags(addslashes($sql))); #strtolower()
}
function xss($input)
{
    $input = str_replace('=', '', $input);
    $input = str_replace(';', '', $input);
    $input = str_replace(':', '', $input);
    $input = str_replace('[', '', $input);
    $input = str_replace(']', '', $input);
    $input = str_replace('?', '', $input);
    $input = str_replace('AND', '', $input);
    $input = str_replace('OR', '', $input);
    $input = str_replace('&', '', $input);
    $input = str_replace('\'', '', $input);
    $input = str_replace('"', '', $input);
    $input = str_replace('`', '', $input);
    $input = str_replace("'", '', $input);
    $input = str_replace('%', '', $input);
    $input = str_replace('<', '', $input);
    $input = str_replace('>', '', $input);
    $input = str_replace('*', '', $input);
    $input = str_replace('+', '', $input);
    $input = str_replace('#', '', $input);
    $input = str_replace(')', '', $input);
    $input = str_replace('(', '', $input);
    $input = str_replace('\\', '', $input);
    $input = str_replace('\/', '', $input);
    $input = str_replace('SHUTDOWN', '', $input);
    $input = str_replace('DROP', '', $input);
    $input = preg_replace("/[`]/", '', $input);
    $input = addslashes($input);
    $input = htmlspecialchars($input);
    $input = strip_tags($input);

    return $input;
}

function modify_instructions_field($field) {
    // Kiểm tra nếu trường là "Instructions"
    if ($field['name'] === 'instructions') {
        // Thay thế từ ngữ tại đây
        $field['instructions'] = str_replace('http://pss.mymonda.net', home_url(), $field['instructions']);
    }

    return $field;
}

add_filter('acf/load_field', 'modify_instructions_field');
function cut_html_string($tring){
    return  strip_tags($tring, '<span>');
}
//function custom_template_for_post_type_archive( $template ) {
//    if ( is_post_type_archive( 'san-pham' ) ) { // Thay 'ten-post-type' bằng slug của post type của bạn
//        $new_template = locate_template( array( 'page-san-pham.php' ) );
//        if ( ! empty( $new_template ) ) {
//            return $new_template;
//        }
//    }
//    return $template;
//}
//add_filter( 'template_include', 'custom_template_for_post_type_archive' );
function set_default_image_size() {
    update_option('image_default_size', 'full');
}
add_action('after_setup_theme', 'set_default_image_size');
