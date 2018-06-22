<?php
$sidebar = get_post_meta( get_the_id(), THEME_NAME . '_sidebar_position', true );
$sidebar = $sidebar === '' ? 'full_width' : $sidebar;
if($sidebar === 'full_width') : ?>
	<section class="container">
<?php endif;?>