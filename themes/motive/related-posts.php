<?php 
	$get_cats = get_the_category();
	$cats_arr = array();

	foreach ($get_cats as $key => $category) {
		$cats_arr[] = $category->term_id;
	}

	$cats_str = implode(', ', $cats_arr);
	$posts_number = _go('related_posts_number') ? _go('related_posts_number') : '2';
	$title = _go('related_posts_title');

	$args = array(            
		'post_type'   => 'post',
		'post_status' => 'publish',
		'showposts' => $posts_number,
		'ignore_sticky_posts' => 1,
		'category' => $cats_str,
		'order'    => 'DESC',
		'meta_key' => '_thumbnail_id',
		'orderby'  => 'date',
	);

	$similar  = new WP_Query( $args );

	if( $similar->have_posts() ): ?>
	<!-- === Start Related Projects === -->
	<div class="related-projects">
	<?php if(!empty($title)): ?>
		<h3><?php echo esc_attr( $title ); ?></h3>
	<?php endif; ?>
		<div class="row">
		<?php while ($similar->have_posts()) : $similar->the_post(); ?>
			<div class="related-post col-xs-12 col-sm-4">
				<figure class="effect-layla">
					<?php 
						$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
						$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
					?>
					<img src="<?php echo esc_attr( $post_thumbnail_url ); ?>" alt="related project image" />
					<figcaption>
						<div class="caption-wrapper">
							<a href="<?php the_permalink() ?>">
								<h2><?php the_title() ?></h2>
							</a>
							<div class="links">
								<a href="<?php the_permalink() ?>"><i class="fa fa-link"></i></a>
								<a href="<?php echo esc_attr($post_thumbnail_url); ?>" class="swipebox"><i class="fa fa-eye"></i></a>								
								<a class="d-text-c-h like-button" href="#" data-post="<?php the_ID(); ?>">	
									<i class="fa fa-heart"></i>			
								</a>
							</div>
						</div>
					</figcaption>
				</figure>
			</div>
		<?php endwhile; ?>
	</div>
	<?php endif; ?>
<?php wp_reset_postdata(); ?>
</div>