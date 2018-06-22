<?php $post_id = get_the_ID();
!empty($_COOKIE['motive_likes_'. $post_id])? $cl_liked = ' liked': $cl_liked = '';  ?>
<!-- === Start Post with no Image === -->
<div class="no-image-post post">
<?php if(has_post_thumbnail()): 
	$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
	$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); ?>
	<div class="post-cover">
		<div class="image">
			<a href="<?php the_permalink() ?>">
					<img src="<?php echo esc_attr($post_thumbnail_url); ?>" alt="<?php the_title(); ?>" />
			</a>
		</div>
	</div>
<?php endif; ?>
<?php get_template_part('post_format/post' , 'meta') ?>