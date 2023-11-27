<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ws247
 */

?>
<div class="box-sidebar">
	<a class="img-top" href="<?php the_permalink() ?>" title=""><img class="w-100" src="<?php ws247_post_thumbnail() ?>" alt="<?php the_title() ?>"></a>
	<div class="text-bottom-sidebar">
		<h3><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h3>
		<span class="date"><i class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo get_the_date("d/m/Y") ?></span>
	</div>
</div>