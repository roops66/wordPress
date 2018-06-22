<?php 
$layout = $shortcode['layout'];
$nr = !empty($shortcode['nr'])? $shortcode['nr'] : count($slides);
$play_speed = !empty($shortcode['speed'])? $shortcode['speed'] : '1000';
?>
<?php if( ($layout == 'single')||empty($layout)): ?>
<?php get_template_part( 'theme_includes/container','close'); ?>
<!-- ===== Start Testimonials ===== -->
<section class="main-testimonials" style=" background: url(<?php echo $shortcode['bg_url'] ?>);  background-position: 50% 50%;  background-repeat: no-repeat;  background-attachment: fixed;  background-size: cover;">
	<div class="testimonials-slider" data-tesla-plugin="slider" data-tesla-item=".slide" data-tesla-container=".slide-wrapper" data-tesla-autoplay-speed="<?php echo esc_attr($play_speed) ?>" data-tesla-autoplay-resume="<?php echo esc_attr($play_speed) ?>">
		<ul class="slide-wrapper">
		<?php foreach ($slides as $i => $slide): ?>
			<?php if($i >= $nr) break; ?>
			<li class="slide">
				<div class="image">
					<?php echo get_the_post_thumbnail( $slide['post']->ID ); ?>
				</div>
				<div class="container">
					<div class="text">
						<?php echo apply_filters('the_content', $slide['post']->post_content); ?>
					</div>
				</div>
				<div class="border-bottom"></div>
				<div class="client">
					<h6 class="client-name"><?php echo get_the_title($slide['post']->ID); ?></h6>
					<p class="client-job"><?php echo esc_attr($slide['options']['position'] ) ?></p>
				</div>
			</li>
		<?php endforeach; ?>
		</ul>
		<ul class="the-bullets-dots" data-tesla-plugin="bullets">
		<?php foreach($slides as $i => $slide): ?>
			<li<?php if($i==0) echo ' class="active"'?>></li>
		<?php endforeach; ?>
		</ul>
	</div>
</section>
<?php get_template_part( 'theme_includes/container','open'); ?>
<?php elseif( $layout == 'mix'): ?>
	<ul>
	<?php foreach($slides as $i => $slide): ?>
		<?php if($i >= $nr) break; ?>
		<li class="testimonial">
			<div class="image">
				<?php echo get_the_post_thumbnail( $slide['post']->ID ); ?>
			</div>
			<div class="testimonial-header">
				<p class="name"><strong><?php echo get_the_title($slide['post']->ID); ?></strong>&nbsp;&nbsp;<?php echo esc_attr($slide['options']['position'] ) ?></p>
			</div>
			<p class="message"><?php echo apply_filters('the_content', $slide['post']->post_content); ?></p>
		</li>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>