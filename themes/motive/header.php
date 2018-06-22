<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="Wordpress Admin">
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	 <!-- Pingbacks -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" >

	<?php echo "<script type='text/javascript'>var TemplateDir='".TT_THEME_URI."'</script>" ?>
	<!-- Favicon -->
	<?php if(_go('favicon')): ?>
		<link rel="shortcut icon" href="<?php _eo('favicon'); ?>">
	<?php endif; ?>
	<?php if(_go('tracking_code')){_eo('tracking_code');} ?>
	<?php wp_head(); ?>
</head>

	<?php
	$page_id = tt_get_page_id();
	$header = get_post_meta( $page_id,THEME_NAME . '_header_type', true );
	$body_class = '';
	is_search()||is_tag()||is_category()||is_archive()||is_home()||is_single()? $body_class .=' blog-page ' : '';
	!empty($header)? $body_class = $header : $body_class .= $header ;
	is_page_template('template-contacts.php')? $body_class .=' contact-page': '';
	is_404()? $body_class .= ' page-404': ' ';	
	$sticky = false !== strpos($body_class, 'blog-page' )? 'sticky' : '';

	$header_layout = get_post_meta( $page_id,THEME_NAME . '_header_layout', true );
	$sticky .= ' ' . $header_layout
	?>

<body <?php body_class($body_class); ?>>
	<!-- ===================================== START HEADER -->
<header class="header <?php echo esc_attr( $sticky ); ?>">
	<div class="search-box">
		<div class="container">
			<?php get_search_form( ); ?>
		</div>
	</div>
	<div class="menu">
		<div class="container">
			<i class="fa fa-bars mobile-navigation-toggle hidden-md hidden-lg"></i>
			<div class="logo">
				<a href="<?php echo home_url() ?>" style="<?php _estyle_changer('logo_text') ?>" >
					<?php if(_go('logo_image')): ?>
						<img src="<?php _eo('logo_image'); ?>" alt="<?php echo THEME_PRETTY_NAME ?>">
					<?php elseif(_go('logo_text')): ?>
						<?php _eo('logo_text'); ?>
					<?php else: ?>
						<?php echo '<h3>' . THEME_PRETTY_NAME.'</h3>'; ?>
					<?php endif; ?>
				</a>
			</div>
			<nav class="main-nav">
				<ul>
					<?php wp_nav_menu(array(
						'tile_li'=>'',
						'theme_location' => 'main_menu',
						'container' => false,
						'fallback_cb' => 'wp_list_pages',
						'items_wrap' => '%3$s',
						//'walker' => ''
					)); ?>
				</ul>
				<div class="right-box">
					<ul>
						<li><i class="fa fa-search"></i></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
</header>
	<!-- END HEADER -->