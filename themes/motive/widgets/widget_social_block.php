<?php

class Tesla_Social_Block_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
				'tesla_social_block_widget',
				'['.THEME_PRETTY_NAME.'] Footer Social Block ',
				array(
					'description' => __('Displays social icons. Just for Footer', 'motive'),
					'classname' => 'widget-social-block',
				)
		);
	}

	function widget($args, $instance) {
		extract($args);?>
		<!-- Social Block -->
		<div class="col-md-2">
			<div class="social-block">
			<?php if(!empty($instance['social_1'])): ?>
				<div class="social-item <?php echo esc_attr( $instance['social_1'] ); ?>">
					<a href="<?php _eo('social_platforms_' . $instance['social_1']) ?>" target="_blank"></a>
					<i class="fa fa-<?php echo esc_attr($instance['social_1']) ?>"></i>
					<p><?php echo esc_attr(strtoupper($instance['social_1']) ) ?></p>					
				</div>
			<?php endif; ?>
			<?php if(!empty($instance['social_2'])): ?>
				<div class="social-item <?php echo esc_attr( $instance['social_2'] ); ?>">
					<a href="<?php _eo('social_platforms_' . $instance['social_2']) ?>" target="_blank"></a>
					<i class="fa fa-<?php echo esc_attr($instance['social_2']) ?>"></i>
					<p><?php echo esc_attr(strtoupper($instance['social_2']) ) ?></p>									
				</div>
			<?php endif; ?>
			</div>
		</div>
		<?php //echo $after_widget;		
	}

	function update($newInstance, $oldInstance){
		$instance = $oldInstance;
		$instance['social_1'] = $newInstance['social_1'];
		$instance['social_2'] = $newInstance['social_2'];
			return $instance;
	}

	function form($instance) {
		empty($instance['social_1'])? $instance['social_1'] = '': $instance['social_1'] = $instance['social_1'];
		empty($instance['social_2'])? $instance['social_2'] = '': $instance['social_2'] = $instance['social_2'];	
		$social_platforms = array('facebook','twitter','pinterest','flickr','dribbble','behance','google','linkedin','youtube','rss');?>		
		<p>Select a social platform to display at top.</p>		
		<select class="widefat" id="<?php echo $this->get_field_id('social_1') ?>" name="<?php echo $this->get_field_name('social_1'); ?>">
			<?php			
			foreach($social_platforms as $platform): 
				if (_go('social_platforms_' . $platform)):?>
				<option value="<?php echo esc_attr( $platform ); ?>" <?php if($platform == esc_attr($instance['social_1'])) {echo 'selected';} ?>><?php echo esc_attr(strtoupper($platform) ) ?></option>
				<?php endif;
			endforeach;
			?>
		</select>
		<p>Select a social platform to display at bottom.</p>				
		<select class="widefat" name="<?php echo $this->get_field_name('social_2'); ?>">
			<?php			
			foreach($social_platforms as $platform): 
				if (_go('social_platforms_' . $platform)):?>
				<option value="<?php echo esc_attr( $platform ); ?>" <?php if($platform == esc_attr($instance['social_2'])) {echo 'selected';} ?>><?php echo strtoupper($platform) ?></option>
				<?php endif;
			endforeach;
			?>
		</select>
		<p></p>

		<?php }
}

add_action('widgets_init', create_function('', 'return register_widget("Tesla_Social_Block_widget");'));