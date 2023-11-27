<?php

// Load values and assing defaults.
$text1 = get_field('title_title_1')?: 'Màu chữ 1';
$text2 = get_field('title_title_2')?: 'Màu chữ 2';
?>
<h2 class="title-bv"><i class="fa fa-bookmark-o" aria-hidden="true"></i> <?php echo $text1 ?>  <span><?php echo $text2 ?></span></h2>