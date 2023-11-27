<div class="share">
	<ul>
		<?php global $wp; ?>
		<li><span>Chia sẻ: </span></li>
		<li><a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo home_url( $wp->request ) ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
		<li><a target="_blank" href="http://twitter.com/intent/tweet?source=sharethiscom&text=<?php the_title() ?>&url=<?php echo home_url( $wp->request ) ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
		<li><a target="_blank" href="https://plus.google.com/share?url=<?php echo home_url( $wp->request ) ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
		<li><a target="_blank" href="mailto:<?php echo get_bloginfo('admin_email') ?>?subject=<?php the_title() ?>&amp;body=<?php echo home_url( $wp->request ) ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
	</ul>
</div>
