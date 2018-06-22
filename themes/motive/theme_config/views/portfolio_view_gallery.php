<?php get_template_part( 'theme_includes/container','close'); ?>
<?php $item_nr = !empty($shortcode['nr'])? $shortcode['nr'] : count($slides);?>

<!-- ===== Start Gallery ===== -->
<section class="gallery" style="background: url('<?php echo esc_attr($shortcode['bg_url'] ) ?>'); background-size: cover;">
	<div class="container">
	<?php if (!empty($shortcode['title'])): ?>	
		<div class="section-header <?php echo !empty($shortcode['type'])? 'v2' : 'v1'; ?>">
			<h3><?php echo esc_attr($shortcode['title']) ?></h3>
			<div class="border-bottom"></div>
			<p><?php echo esc_attr($shortcode['description'] ); ?></p>
		</div>
	<?php endif ?>
		<div class="slider">
			<!-- Slider Body -->
			<div class="row">
				<div class="col-xs-12 col-md-7">
					<div class="browser-header">
						<i class="fa fa-circle"></i>
						<i class="fa fa-circle"></i>
						<i class="fa fa-circle"></i>
					</div>
				</div>
			</div>
			<div id="slider" class="flexslider">
				<ul class="slides">

				<?php foreach ($slides as $slide_nr => $slide) : 
					
					global $post;
					if($slide_nr >= $item_nr){ break; }
					$post = $slide['post'];
					setup_postdata( $post );?>

					<li class="slide">
						<div class="row">
							<div class="col-xs-12 col-md-7">
								<div class="project-image-and-share">
									<a href="<?php the_permalink( ) ?>"><img src="<?php echo esc_attr( $slide['options']['full_image']->url ); ?>" alt="<?php _e('slider image','motive') ?>" /></a>
									<?php tt_share('gallery'); ?>
								</div>	
							</div>
							<div class="col-xs-12 col-md-5">
								<div class="project-details">
									<h4 class="title"><strong><?php _e('Title:','motive') ?></strong> <?php the_title() ?></h4>
									<h4 class="date"><strong><?php _e('Date:','motive') ?></strong><?php the_date(get_option('date_format' )) ?></h4>
									<h4 class="description"><strong><?php _ex('Description','Shortcode Gallery','motive') ?></strong></h4>
									<p><?php the_excerpt(); ?></p>
								</div>
							</div>
						</div>
					</li>
					
				<?php endforeach;
				wp_reset_postdata();?>
				</ul>
			</div>
			<!-- Slider Controls -->
			<div class="row slider-controls">
				<div class="col-xs-12 col-md-7">
					<div id="carousel" class="flexslider">
						<ul class="slides">
						<?php foreach ($slides as $slide_nr => $slide) : 
					
							global $post;
							if($slide_nr >= $item_nr){ break; }
							$post = $slide['post'];
							setup_postdata( $post );?>
							<li>
								<div class="hover"></div>
								<img src="<?php echo esc_attr( $slide['options']['full_image']->url ) ?>" alt="<?php _e('slider control image','motive') ?>" />
							</li>
						<?php endforeach; ?>
						<?php wp_reset_postdata(); ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_template_part( 'theme_includes/container','open'); ?>