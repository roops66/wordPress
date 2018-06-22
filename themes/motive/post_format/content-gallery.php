<?php $post_id = get_the_ID();
global $post;
!empty($_COOKIE['motive_likes_'. $post_id])? $cl_liked = ' liked': $cl_liked = '';  
$attachments = get_children( array(
		'post_parent' => get_the_ID(),
		'post_status' => 'inherit',
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'order' => 'ASC',
		'orderby' => 'menu_order ID',
		'numberposts' => 5)
	);?>

<!-- === Start Post with Slider === -->
<div class="slider-post post">
	<!-- === Start Post Cover === -->
<?php if(!empty($attachments)): ?>
	<div class="post-cover">
		<div class="main-post-slider" data-tesla-plugin="slider" data-tesla-item=".slide" data-tesla-next=".slide-right" data-tesla-prev=".slide-left" data-tesla-container=".slide-wrapper">
			<ul class="slide-arrows">
				<li class="slide-left"><i class="fa fa-arrow-left"></i></li>
				<li class="slide-right"><i class="fa fa-arrow-right"></i></li>
			</ul>		
			<ul class="slide-wrapper">
			<?php foreach ( $attachments as $thumb_id => $attachment ) : ?>
				<li class="slide">
					<div class="image">
						<a href="#">
							<?php echo wp_get_attachment_image($thumb_id, 'full' ); ?>
						</a>
					</div>   
				</li>
			<?php endforeach; ?>
			</ul>

		</div>
	</div>
<?php endif; ?>
<?php get_template_part('post_format/post' , 'meta') ?>