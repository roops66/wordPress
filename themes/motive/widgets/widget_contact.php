<?php

class Tesla_contact_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
				'tesla_contact_widget',
				'['.THEME_PRETTY_NAME.'] Contact Box',
				array(
					'description' => __('Displays Contact Info. For Footer Only', 'motive'),
					'classname' => 'contact-info',
				)
		);
	}

	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);
		$description = apply_filters('widget_title', $instance['description'], $instance, $this->id_base);
		$footer_style = _go('footer_style');
		if(!empty($_SESSION['style']))
			$footer_style = $_SESSION['style'];
		
		echo empty($footer_style) || $footer_style == 'Style_1' ? $before_widget : '<div class="col-md-8">';?>
		<div class="contact-info-block">
		<?php if(!empty($title)||!empty($description)):  ?>
			<div class="section-header">
		<?php if(!empty($title)):  ?>
				<h3><?php echo esc_attr($title ); ?></h3>
			<?php endif; ?>
			<?php if(!empty($description)): ?>
				<p><?php echo esc_attr($description ); ?></p>
			<?php endif; ?>
			</div>
		<?php endif; ?>
			<div class="body-wrapper">
			<?php if(_go_repeated('Phone numbers')): ?>
				<?php $phones = _go_repeated('Phone numbers'); ?>
				<div class="section phone">
					<p class="caption"><?php _ex('Phone/Fax','Widget Contact Info','motive') ?></p>
					<div class="section-body">
						<i class="icon-phone2"></i>
						<div class="details-wrapper">
					<?php foreach($phones as $phone): ?>
							<p><?php echo $phone['office_phone']; ?></p>
					<?php endforeach; ?>
						</div>
					</div>
				</div>	
			<?php endif; ?>
			<?php if(_go('email_contact')): ?>
				<div class="section mail">
					<p class="caption"><?php _e('Mail','motive') ?></p>
					<div class="section-body">
						<i class="icon-envelop"></i>
						<div class="details-wrapper">
							<p><a href="mailto:<?php _eo('email_contact') ?>"><?php _eo('email_contact') ?></a></p>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<?php if(_go('contact_address')): ?>
				<div class="section location">
					<p class="caption"><?php _ex('Location','Widget Contact Info','motive') ?></p>
					<div class="section-body">
						<i class="icon-location-pin"></i>
						<div class="details-wrapper">
							<p><?php _eo('contact_address') ?></p>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<?php tt_share('widget') ?>
			</div>
		</div>
		<?php 
		echo empty($footer_style)|| $footer_style == 'Style_1' ? $after_widget : '</div>';;
	}

	function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title'] = $new_instance['title'];
		$instance['description'] = $new_instance['description'];

		return $instance;
	}

	function form($instance) {
		empty($instance['title'])? $instance['title'] = '': $instance['title'] = $instance['title'];
		$title = esc_attr($instance['title']);
		empty($instance['description'])? $instance['description'] = '': $instance['description'] = $instance['description'];
		$description = esc_attr($instance['description']);
		?>
		<p>
			<label><?php _e('Title:','motive'); ?><input class="widefat" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label>
		</p>
		<p>
			<label><?php _e('Description:','motive'); ?><input class="widefat" name="<?php echo esc_attr($this->get_field_name('description')); ?>" type="text" value="<?php echo esc_attr($description); ?>" /></label>
		</p>
		<?php
	}
}

add_action('widgets_init', create_function('', 'return register_widget("Tesla_contact_widget");'));