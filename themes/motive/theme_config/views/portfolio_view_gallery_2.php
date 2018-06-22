<?php get_template_part( 'theme_includes/container','close'); ?>

<?php 
$item_nr = !empty($shortcode['nr'])? $shortcode['nr'] : count($slides);;
$tags_str = $shortcode['tags'];
$tags_array = explode('; ',$tags_str);
?>

<!-- ===== Start Screens ===== -->
<section class="screens">
	<div class="container">
		<div class="row">
			<div class="image-slider col-xs-12 col-md-6">
				<div class="slider-header">
					<i class="fa fa-circle"></i>
					<i class="fa fa-circle"></i>
					<i class="fa fa-circle"></i>
				</div>
				<div class="screens-slider" data-tesla-plugin="slider" data-tesla-item=".slide" data-tesla-next=".slide-right" data-tesla-prev=".slide-left" data-tesla-container=".slide-wrapper">
					<ul class="slide-wrapper">
					<?php foreach ($slides as $slide_nr => $slide) :
						if($slide_nr >= $item_nr){ break; }
							global $post;
							$post = $slide['post'];
							setup_postdata( $post );?>
						<li class="slide">
							<a href="<?php the_permalink() ?>"><img src="<?php echo esc_attr($slide['options']['full_image']->url ); ?>" alt="<?php _e('screen image','motive') ?>" /></a>
						</li>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
					</ul>
					 <ul class="slide-arrows">
						<li class="slide-left no-select"><i class="fa fa-angle-left"></i></li>
						<li class="slide-right no-select"><i class="fa fa-angle-right"></i></li>
					</ul>
				</div>
			</div>
			<div class="information col-xs-12 col-md-6">
				<div class="information-wrapper">
					<div class="information-header">
						<h4><?php echo esc_attr($shortcode['title'] ); ?></h4>
					</div>
					<div class="features">
						<div class="row">
						<?php foreach($tags_array as $tag): ?>
							<div class="col-xs-6">
								<p><i class="icon-check"></i><?php echo esc_attr( $tag ) ?></p>
							</div>
						<?php endforeach; ?>
						</div>
					</div>
					<p class="short-info"><?php echo esc_attr($shortcode['description'] ); ?></p>
					<?php if(!empty($shortcode['url'])||!empty($shortcode['submit'])): ?>
					<a href="<?php echo esc_attr($shortcode['url'] ); ?>" class="view-portfolio"><?php echo esc_attr($shortcode['submit'] ); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ===== Start Screens ===== -->
<?php get_template_part( 'theme_includes/container','open'); ?>