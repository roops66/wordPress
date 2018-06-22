<?php
$page_id = tt_get_page_id();
$sidebar = get_post_meta( $page_id,THEME_NAME . '_sidebar_position', true );
$header_img = get_post_meta( $page_id,THEME_NAME . '_header_image', true );
$header_ico = get_post_meta( $page_id,THEME_NAME . '_header_icon', true );
$sidebar = empty($sidebar) ? 'right' : $sidebar;

//Slider
get_header(); ?>

<section class="content">
		<?php if(!empty($header_img)): ?>
	        <!-- ===== Start Jumbotron ===== -->
        	<section class="jumbotron-wrapper" style="background: url(<?php echo esc_attr($header_img['url']) ?>); background-size: cover;">
        		<div class="jumbotron">
	    			<div class="about-wrapper">
	        			<div class="icon">
	        				<i class="icon-<?php echo esc_attr($header_ico);?>"></i> <br />
	        			</div>
	        			<div class="caption">
	        				<div class="border-top hidden-xs"></div>
		        			<h1><?php the_title() ?></h1>
		        			<div class="border-top hidden-xs"></div>
	        			</div>
	        		</div>
	        	</div>
        	</section>
        <?php endif; ?>
	<section class="container">
		<?php if($sidebar !== "full_width"): ?>
			<div class="row">
		<?php endif; ?>
		<?php if($sidebar == "left"): ?>
			<div class="col-md-3 sidebar left-sidebar">					
				<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>
		<?php if($sidebar !== "full_width"): ?>				
			<div class="col-md-9">
				<section class="main-content">
		<?php endif; ?>
		<?php if (have_posts()): ?>				
				<?php while(have_posts()): the_post(); 
					the_content();
				endwhile;
					get_template_part('nav','main');
					comments_template( );	
			endif; ?>
				</section>
		<?php if($sidebar !== "full_width"): ?>
			</div>
		<?php endif; ?>                
		<?php if($sidebar == "right"): ?>
			<div class="col-md-3 sidebar right-sidebar">
				<?php get_sidebar( ); ?>
			</div>
		<?php endif; ?>
		<?php if($sidebar !== "full_width"): ?>
			</div>
		<?php endif; ?>
	</section>
</section>

<?php get_footer(); ?>