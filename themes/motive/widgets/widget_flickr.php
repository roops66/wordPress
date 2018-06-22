<?php

class Flickr_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
				'tesla_flickr_widget',
				'['.THEME_PRETTY_NAME.'] Flickr',
				array(
					'description' => __('Displays Flickr photos', 'motive'),
					'classname' => 'flickr-widget',
				)
		);
	}

	function widget($args, $instance) {
		extract($args);
		$widget_id = $args['id'];
		$title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);
		$user = $instance['user'];
		$link = $instance['link'] ? $instance['link'] : '';
		$nr = $instance['nr'];

		echo $before_widget;
		if($widget_id == 'footer')
			echo '<div class="section-header">';

			echo $before_title.$title.$after_title;

		if($widget_id == 'footer')
			echo '</div><div class="body-wrapper">';                


			echo '<ul class="flickr_widget" data-userid="'.$user.'" data-items="'.$nr.'"></ul>';
			echo $link ? '<a href="'.$link.'" class="follow-me">'.__("Follow me", "motive").'</a>' : '';
		if($widget_id == 'footer')				
			echo '</div>';

		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title'] = $new_instance['title'];
		$instance['user'] = $new_instance['user'];
		$instance['link'] = $new_instance['link'];
		$instance['nr'] = (int)$new_instance['nr'];

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args((array) $instance, array('title' => '', 'user'=>'97073871@N04', 'nr'=>4, 'link'=>'https://www.flickr.com/photos/97073871@N04/'));
		$title = esc_attr($instance['title']);
		$link = esc_attr($instance['link']);
		$user = esc_attr($instance['user']);
		$nr = $instance['nr'];
		?>
		<p>
			<label><?php _e('Title:','motive'); ?><input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label> 
			<label><?php _e('Flickr id:','motive'); ?><input class="widefat" name="<?php echo $this->get_field_name('user'); ?>" type="text" value="<?php echo $user; ?>" /></label> 
			<label><?php _e('Follow me:','motive'); ?><input class="widefat" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" /></label>
			<label for="<?php echo $this->get_field_id('nr'); ?>">
				<?php _e('Number of photos to show:','motive'); ?>
				<input id="<?php echo $this->get_field_id('nr'); ?>" name="<?php echo $this->get_field_name('nr'); ?>" type="text" value="<?php echo $nr; ?>" size="3" />
			</label>
		</p>
		<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("Flickr_widget");'));