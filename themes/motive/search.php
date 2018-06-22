<?php get_header(); ?>
<?php
/**
 * Search results page
 */
$blog_id = get_option( 'page_for_posts' );
$sidebar = get_post_meta( $blog_id,'motive_sidebar_position', true );
$sidebar = empty($sidebar) ? 'right' : $sidebar;
?>

<section class="content">
	<div class="container">
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
		<div class="site-title text-center">
			<h1><?php _e('Search Results for ','motive') ?><span><i>'<?php echo get_search_query(); ?>'</i></span> :</h1>
		</div><br /><br />
			<?php while(have_posts()): the_post(); 
				get_template_part('post_format/content',get_post_format( ));
			endwhile; ?>						
		<?php get_template_part('nav','main'); ?>				
	<?php else: ?>
		<header class="margin-top-100 site-title">
			<h1><?php _e('No matching posts found','motive'); ?></h1>
		</header><br /><br />
	<?php endif; ?>
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
	</div>
</section>

<?php get_footer(); ?>