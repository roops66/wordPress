<?php
/**
 * Single post page
 */
$post_id = get_the_ID();
$blogs_id = get_option( 'page_for_posts' );
$sidebar_option = get_post_meta( $post_id,'motive_sidebar_position', true );

switch ($sidebar_option) {
	case 'as_blog':
		$s_id = $blogs_id;	
		break;
	case 'full_width':
		$s_id = $post_id;
		break;
	case 'right':
		$s_id = $post_id;
		break;
	case 'left':
		$s_id = $post_id;
}
if(!empty($s_id))
	$sidebar = get_post_meta( $s_id,'motive_sidebar_position', true );
$sidebar = empty($sidebar) ? 'right' : $sidebar;
?>

<?php get_header(); ?>
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
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php get_template_part('content','single'); 
				tt_set_post_views(get_the_ID());
			endwhile; ?>
				<?php comments_template(); ?>
			<?php else: ?>
				<h2>No post to display</h2>
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