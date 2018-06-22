<?php get_template_part( 'theme_includes/container','close'); ?>
<?php 
$nr = !empty($shortcode['nr'])? $shortcode['nr'] : count($slides);
$new_member_url = $shortcode['new_member_url'];
$new_member_img = $shortcode['new_member_img'];
$type = $shortcode['type'];
 ?>
<!-- ===== Start Our Team ===== -->
<section class="team <?php echo $type == '2'? 'v2' : 'v1'; ?>">
	<div class="container">
		<div class="team-members">
			<div class="row">
			<?php foreach($slides as $slide_nr=>$slide):
				if( $slide_nr >= $nr ) break; 
					global $post;
				$post = $slide['post'];
				setup_postdata( $post );?>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<div class="member">
						<div class="image">
							<?php if($slide['options']['description']): ?>
								<div class="image-hover">
									<p><?php print $slide['options']['description'] ?></p>
								</div>
							<?php endif ?>
							<img src="<?php echo esc_attr($slide['options']['image'] ); ?>" alt="<?php _e('member image','motive') ?>" />
						</div>
						<div class="details">
							<h5 class="name">
								<?php if($slide['options']['url']): ?>
									<a href="<?php print $slide['options']['url'] ?>">
								<?php endif ?>
								<?php the_title() ?>
								<?php if($slide['options']['url']): ?>
									</a>
								<?php endif ?>
							</h5>

							<h6 class="job"><?php echo esc_attr($slide['options']['position'] ); ?></h6>
						</div>
						<?php if(!empty($slide['options']['facebook'])||!empty($slide['options']['twitter'])||!empty($slide['options']['pinterest'])): ?>
						<div class="social">
							<?php if(!empty($slide['options']['facebook'])): ?>
								<a href="<?php echo esc_attr( $slide['options']['facebook']) ?>" class="facebook" target="blank"><i class="fa fa-facebook"></i></a>
							<?php endif; ?>
							<?php if(!empty($slide['options']['twitter'])): ?>
								<a href="<?php echo esc_attr( $slide['options']['twitter']) ?>" class="twitter" target="blank"><i class="fa fa-twitter"></i></a>	
							<?php endif; ?>
							<?php if(!empty($slide['options']['pinterest'])): ?>
								<a href="<?php echo esc_attr( $slide['options']['pinterest']) ?>" class="pinterest" target="blank"><i class="fa fa-pinterest"></i></a>
							<?php endif; ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
			<?php if(!empty($new_member_img)||!empty($new_member_url)): ?>
				<div class="member become-member col-xs-12 col-sm-6 col-md-3">
					<div class="wrapper">
						<div class="new-member">
							<img src="<?php echo esc_attr($new_member_img ); ?>" alt="<?php _e('become-member','motive') ?>" />
							<a href="<?php echo esc_attr($new_member_url ); ?>"><?php _ex('Become our member','Team Members Shortcode','motive') ?></a>
						</div>
					</div>
				</div>
			<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<!-- ===== End Our Team ===== -->
<?php get_template_part( 'theme_includes/container','open'); ?>