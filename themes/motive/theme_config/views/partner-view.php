<?php 
$nr = !empty($shortcode['nr'])? $shortcode['nr'] : count($slides);
$layout = $shortcode['layout']; 
$type = $shortcode['type'];
 ?>
<?php if($layout =='single'): ?>
<?php get_template_part( 'theme_includes/container','close'); ?>
			<!-- ===== Start Clients ===== -->
			<section class="clients <?php echo $type == '2' ? 'v2' : 'v1'; ?>">
				<div class="container">
					<div class="clients-carousel" data-tesla-plugin="carousel" data-tesla-container=".tesla-carousel-items" data-tesla-item=".clients-carousel-item" data-tesla-rotate="false" data-tesla-autoplay="false" data-tesla-hide-effect="false">
						<div class="carousel-controls">
							<span class="prev disabled"><i class="fa fa-arrow-left no-select"></i></span>
							<span class="next"><i class="fa fa-arrow-right no-select"></i></span>
						</div>
						<div class="row">
							<div class="tesla-carousel-items">
							<?php foreach($slides as $i => $slide): ?>
								<div class="col-xs-12 col-sm-6 col-md-3 clients-carousel-item">
									<a href="<?php echo esc_attr( $slide['options']['url'] ); ?>"><?php echo get_the_post_thumbnail( $slide['post']->ID ); ?></a>
								</div>
							<?php endforeach; ?>
							</div>
						</div>
					</div>					
				</div>
			</section>		
			<!-- ========================= END CONTENT ======================== -->
<?php get_template_part( 'theme_includes/container','open'); ?>
<?php elseif( $layout == 'mix'):?>			
		<div class="partners-wrapper">
			<div class="partners-header">
				<h3><?php echo esc_attr( $shortcode['title'] ) ?></h3>
			</div>
			<div class="partners-carousel" data-tesla-plugin="carousel" data-tesla-container=".tesla-carousel-items" data-tesla-item=".clients-carousel-item" data-tesla-rotate="false" data-tesla-autoplay="false" data-tesla-hide-effect="false">
				<div class="carousel-controls">
					<span class="prev disabled"><i class="fa fa-angle-left no-select"></i></span>
					<span class="next"><i class="fa fa-angle-right no-select"></i></span>
				</div>
				<div class="tesla-carousel-items">
					<div class="clients-carousel-item">
						<div class="row">
					<?php foreach($slides as $i => $slide): ?>
						<?php if($i >= $nr) break; ?>		                	
							<div class="col-xs-12 col-sm-6">
								<a href="<?php echo esc_attr( $slide['options']['url'] ); ?>"><?php echo get_the_post_thumbnail( $slide['post']->ID ); ?></a>
							</div>
						<?php if($i > 0 && $i % 5 === 0 ): ?>		                			
						</div>
					</div>
					<div class="clients-carousel-item">
						<div class="row">
						<?php endif; ?>
					<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php endif; ?>