<?php $post_id = get_the_ID();
!empty($_COOKIE['motive_likes_'. $post_id])? $cl_liked = ' liked': $cl_liked = '';  ?>
<!-- === Start Post with Video === -->
<?php 
	$video_meta = get_post_meta($post->ID , THEME_NAME . '_video_embed', true);
	if($video_meta) : ?>
		<div class="video-post post">
			<!-- === Start Post Cover === -->
			<div class="post-cover">
				<?php echo apply_filters('the_content',$video_meta); ?>
			</div>
	<?php elseif(has_post_thumbnail( )):?>
		<div class="simple-post post">
			<div class="post-cover">
				<div class="image">
					<a href="<?php the_permalink() ?>">
				<?php   $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
						$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );?>
					<img src="<?php echo esc_attr($post_thumbnail_url); ?>" alt="<?php the_title(); ?>" />
					</a>
				</div>
			</div>
	<?php else: ?>
		<div class="no-image-post post">
	<?php endif; ?>
<?php get_template_part('post_format/post' , 'meta') ?>