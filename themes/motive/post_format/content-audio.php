<?php $post_id = get_the_ID();
!empty($_COOKIE['motive_likes_'. $post_id])? $cl_liked = ' liked': $cl_liked = '';  
$audio_meta = get_post_meta($post->ID , THEME_NAME . '_audio_embed', true);?>

<!-- === Start Post with Audio === -->
<div class="audio-post post">
	<!-- === Start Post Cover === -->
	<?php if (!empty($audio_meta)): ?>	
	<div class="post-cover">
		<div class="audio-box">	
			<audio controls src="<?php echo esc_attr( $audio_meta ); ?>"></audio>
		</div>
	</div>
	<?php endif; ?>

<?php get_template_part('post_format/post' , 'meta') ?>