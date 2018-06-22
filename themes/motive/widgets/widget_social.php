<?php

class Tesla_Social_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
				'tesla_social_widget',
				'['.THEME_PRETTY_NAME.'] Social Icons',
				array(
					'description' => __('Displays social icons', 'motive'),
					'classname' => 'widget-social-buttons',
				)
		);
	}

	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);
		$comment = empty($instance['comment']) ? '' : apply_filters('widget_title', $instance['comment'], $instance, $this->id_base);
		$form_id = empty($instance['form_id']) ? '' : $instance['form_id'];
		
		echo $before_widget;?>
		<!-- === Start Social Buttons === -->
		<div class="widget widget-social-buttons">
		<?php if(!empty($instance['title'])) ?>
			<h5><?php echo esc_attr($title); ?></h5>
		<?php if(!empty($instance['comment'])): ?>
			<p><?php echo esc_attr($comment); ?></p>
		<?php endif; ?>
			<ul>
				<?php _esocial_platforms(array('twitter', 'facebook', 'google', 'linkedin','flickr','behance', 'youtube', 'dribbble', 'pinterest', 'rss'), '', '',true) ?>
			</ul>
		</div>
		<?php 
		echo $after_widget;
	}

	function update($newInstance, $oldInstance){
		$instance = $oldInstance;
		$instance['title'] = strip_tags($newInstance['title']);
		$instance['comment'] = strip_tags($newInstance['comment']);
			return $instance;
	}

	function form($instance) {
		empty($instance['title'])? $instance['title'] = '': $instance['title'] = $instance['title'];
		echo '<p style="text-align:right;"><label  for="'.$this->get_field_id('title').'">' . __('Title:','motive') . '  <input style="width: 200px;" id="'.$this->get_field_id('title').'"  name="'.$this->get_field_name('title').'" type="text"  value="'.$instance['title'].'" /></label></p>';
		empty($instance['comment'])? $instance['comment'] = '': $instance['comment'] = $instance['comment'];		
		echo '<p style="text-align:right;"><label  for="'.$this->get_field_id('comment').'">' . __('Description:','motive') . '  <input style="width: 200px;" id="'.$this->get_field_id('comment').'"  name="'.$this->get_field_name('comment').'" type="text"  value="'.$instance['comment'].'" /></label></p>';
	}
}

add_action('widgets_init', create_function('', 'return register_widget("Tesla_Social_widget");'));