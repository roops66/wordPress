<?php
 // POPULAR POST WIDGET
 class show_popular extends WP_Widget {
 
	function __construct() {
		parent::__construct(
				'show_popular',
				'['.THEME_PRETTY_NAME.'] Popular Posts',
				array(
					'description' => __('Show your popular posts.', 'motive'),
					'classname' => 'show_popular',
				)
		);
	}

 
	function widget($args, $instance){
		extract($args);
		//$options = get_option('custom_recent');
		$title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);
		if(!empty($instance['posts'])):
			$postscount = $instance['posts'];
		else:
			$postscount = 5;
		endif;


	echo $before_widget;
	if(!empty($title)){
		echo $before_title . $title . $after_title;
	}

	$query_p = new WP_QUERY(array( 'orderby' => 'comment_count', 'posts_per_page' => $postscount ,'ignore_sticky_posts'=>true));			//Get Popular Posts
	$query_l = new WP_QUERY(array( 'orderby' => 'DSC', 'posts_per_page' => $postscount ,'ignore_sticky_posts'=>true)); 						//Get Latest Posts
	?>					
	
	<!-- === Start Post Feed === -->
	<?php if ( $query_p->have_posts() && $query_l->have_posts() ) :?>
			<div class="tabs">
				<ul class="tab_nav">
					<li class="active"><a href="#popular" data-toggle="tab"><?php _e('Popular Posts','motive') ?></a></li>
					<li><a href="#latest" data-toggle="tab"><?php _e('Latest Posts','motive') ?></a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="popular">
						<ul>
					<?php while( $query_p->have_posts() ): $query_p->the_post() ?>
						<?php $no_image = ''; ?>
						<?php has_post_thumbnail()? '': $no_image = 'no-image'; ?>
							<li class="post <?php echo esc_attr( $no_image ); ?>">			
						<?php if ( has_post_thumbnail() ) : // check if the post has a Post Thumbnail assigned to it.
							$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'original' );
							$url = $thumb['0']; ?>
								<div class="image">
									<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_attr( $url ); ?>" alt="post image" /></a>
								</div>
							<?php endif; ?>
								<div class="details">
									<p class="caption"><?php the_title(); ?></p>
									<p class="date"><?php the_time('j,d,Y'); ?></p>
									<a href="<?php the_permalink(); ?>">Read more</a>
								</div>
							</li>
					<?php endwhile;?>
						</ul>
					</div>
					<div class="tab-pane" id="latest">
						<ul>
					<?php while( $query_l->have_posts() ): $query_l->the_post() ?>
						<?php $no_image = ''; ?>
						<?php has_post_thumbnail()? '': $no_image = 'no-image'; ?>
							<li class="post <?php echo esc_attr( $no_image ); ?>">			
						<?php if ( has_post_thumbnail() ) : // check if the post has a Post Thumbnail assigned to it.
							$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'original' );
							$url = $thumb['0']; ?>
								<div class="image">
									<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_attr( $url ); ?>" alt="post image" /></a>
								</div>
							<?php endif; ?>
								<div class="details">
									<p class="caption"><?php the_title(); ?></p>
									<p class="date"><?php the_time('j,d,Y'); ?></p>
									<a href="<?php the_permalink(); ?>">Read more</a>
								</div>
							</li>
					<?php endwhile;?>
						</ul>
					</div>
				</div>
			</div> 
	<?php endif; ?>
	<?php echo $after_widget;
	wp_reset_query();
	}

	function update($newInstance, $oldInstance){
		$instance = $oldInstance;
		$instance['title'] = strip_tags($newInstance['title']);
		$instance['posts'] = $newInstance['posts'];
			return $instance;
	}
 
	function form($instance){
		empty($instance['title'])? $instance['title'] = '': $instance['title'] = $instance['title'];
		echo '<p style="text-align:right;"><label  for="'.$this->get_field_id('title').'">' . __('Title:','motive') . '  <input style="width: 200px;" id="'.$this->get_field_id('title').'"  name="'.$this->get_field_name('title').'" type="text"  value="'.$instance['title'].'" /></label></p>';
		empty($instance['posts'])? $instance['posts'] = '': $instance['posts'] = $instance['posts'];
		echo '<p style="text-align:right;"><label  for="'.$this->get_field_id('posts').'">' . __('Number of Posts:',  'motive') . ' <input style="width: 50px;"  id="'.$this->get_field_id('posts').'"  name="'.$this->get_field_name('posts').'" type="text"  value="'.$instance['posts'].'" /></label></p>';
		echo '<input type="hidden" id="custom_recent" name="custom_recent" value="1" />';
	}
}
 
add_action('widgets_init', create_function('', 'return register_widget("show_popular");')); ?>