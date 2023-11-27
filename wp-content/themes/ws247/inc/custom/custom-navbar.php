<?php

class WP_bootstrap_4_walker_nav_menu extends Walker_Nav_menu {

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $object      = $item->object;
        $type        = $item->type;
        $title       = $item->title;
        $description = $item->description;
        $permalink   = $item->url;
        $mtitle = get_field('menu_title', $item);

        $mmota = get_field('menu_mota', $item);
        $active_class = '';
        if( in_array('current-menu-item', $item->classes) ) {
            $active_class = 'active';
        }

        $output .= "<li class='$active_class " .  implode(" ", $item->classes) . "'>";

        $output .= '<a href="' . esc_url($permalink) . '">';
        $output .= $title;

        if( $args->walker->has_children && $depth == 0 ) {
            $output .= ' <i class="fa fa-caret-down" aria-hidden="true"></i>';
        }
        if( $args->walker->has_children && $depth == 0 ) {
            $output .= "<div class='sub-menu'>";
        }
        $output .= '</a>';
        if($mtitle && $args->walker->has_children && $depth == 0){
            $output .= "<div class='text-submenu'><h2>".$mtitle."</h2>";
            if($mmota){
               $output .= "<p><i class='fa fa-quote-left' aria-hidden='true'></i> ".$mmota." <i class='fa fa-quote-right' aria-hidden='true'></i></p>";
           }
           $output .= "</div>";
       }
   }

   function start_lvl( &$output, $depth=0, $args = array()){
    $output .= "<ul>";
}


}
