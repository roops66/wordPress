
<?php get_template_part( 'theme_includes/container','close'); ?>
<?php
$nr = !empty($shortcode['nr'])? $shortcode['nr'] : count($slides);
$type = $shortcode['type'];
$title = $shortcode['title'];
$layout = $shortcode['layout']; 
$columns = $shortcode['columns'];
$section_class = $layout == 'fluid'? 'latest-works' : 'portfolio';
$bg_img = !empty($shortcode['bg_url'])? 'background: url(' . $shortcode['bg_url'] . ') top center; background-size: cover;' : '' ;

	if($layout == 'grid'):
		switch ($columns) {
			case '1':
				$sm = 12; $md = 12;
				break;
			case '2':
				$sm = 12; $md = 6;
				break;
			case '3':
				$sm = 6; $md = 4;
				break;
			case '4':
				$sm = 4; $md = 3;
				break;            
			default:
				$sm = 4; $md = 6;
				break;
		};
	endif;?>
<!-- ===== Start Portfolio ===== -->
<section class="<?php echo esc_attr( $section_class ); echo $type == '2' ? ' v2 ' : ' v1 ' ?>">
	<div class="works">
	<?php if(!empty($shortcode['title'])||!empty($shortcode['bg_url'])): ?>
		<div class="section-header <?php echo $type == '2' ? ' v2 ' : ' v1 ' ?> no-padding" style="<?php echo esc_attr($bg_img ) ?>">
		<?php if(!empty($bg_img)): ?>
			<div class="bg-wrapper">
		<?php endif; ?>
			<?php if(!empty($shortcode['title'])): ?>
				<div class="container">
					<h3><?php echo html_entity_decode($shortcode['title']) ?></h3>
					<div class="border-bottom"></div>			
				</div>
			<?php endif; ?>
		<?php if(!empty($bg_img)): ?>
			</div>
		<?php endif; ?>
		</div>
	<?php endif; ?>
		<div class="filter-box <?php echo $type == '2' ? ' v2 ' : ' v1 ' ?>">
			<div class="portfolioFilter">
				<ul>
					<li><a href="#" data-filter="*" class="current"><?php _e('All','motive') ?></a></li>
					<?php foreach($all_categories as $category_slug => $category_name): ?>
						<li><a href="#" data-filter=".<?php echo $category_slug; ?>"><?php echo $category_name; ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<div class="container<?php if($layout=='fluid') echo '-' . esc_attr( $layout ) ?>">
			<div class="row">
				<div class="portfolioContainer <?php echo esc_attr( $layout ); ?>">
					<?php foreach ($slides as $slide_nr => $slide) : 
						if($slide_nr >= $nr) break;
						global $post;
						$post = $slide['post'];
						setup_postdata( $post );
							if($layout == 'mosaic'){
								switch ($slide['options']['size']) {
								case '4':
									$sm = 12; $md = 6;
									break;
								case '3':
									$sm = 6; $md = 4;
									break;
								case '2':
									$sm = 4; $md = 3;
									break;
								case '1':
									$sm = 4; $md = 2;
									break;        
								default:
									$sm = 4; $md = 6;
									break;
								};
							};
							if($layout == 'masonry'){
									$sm = $md = 4;
							}
							if($layout == 'fluid'){
								switch ($slide['options']['size']) {
								case '4':
									$sm = 12; $md = 4;
									break;
								case '3':
									$sm = 12; $md = 4;
									break;
								case '2':
									$sm = 6; $md = 2;
									break;
								case '1':
									$sm = 6; $md = 2;
									break;        
								default:
									$sm = 6; $md = 2;
									break;
								};
							};?>
						<div class="portfolio-post col-xs-12 col-sm-<?php echo esc_attr( $sm )?> col-md-<?php echo esc_attr( $md )?> <?php echo implode(' ', array_keys($slide['categories'])); ?>">
							<figure class="effect-layla">
								<img src="<?php echo $slide['options']['cover_image']->url ?>" alt="<?php _e('portfolio post','motive') ?>" />
								<figcaption>
									<?php if($type == '2'): ?>
									<div class="links">
										<a href="<?php echo !empty($slide['options']['link']) ? $slide['options']['link'] : get_permalink($slide['post']->ID); ?>"><i class="fa fa-link"></i></a>
										<a href="<?php echo $slide['options']['full_image'] != "holder.js/940x799/auto" ? $slide['options']['full_image']->url : $slide['options']['cover_image']->url; ?>" class="swipebox"><i class="fa fa-eye"></i></a>
										<a class="d-text-c-h like-button" href="#" data-post="<?php the_ID(); ?>">	
										<i class="fa fa-heart"></i>
										</a>
									</div>
									<div class="caption-wrapper">
										<h2><?php the_title() ?></h2>
										<p><?php foreach($slide['categories'] as $i => $category): ?>
											<?php echo esc_attr($category).';' ?>
										<?php endforeach; ?></p>
									</div>
									<?php else: ?>
									<div class="caption-wrapper">
										<h2><?php the_title() ?></h2>
										<div class="links">
											<a href="<?php the_permalink() ?>"><i class="fa fa-link"></i></a>
											<a href="<?php echo $slide['options']['full_image'] != "holder.js/940x799/auto" ? $slide['options']['full_image']->url: $slide['options']['cover_image']['url']->url; ?>" class="swipebox"><i class="fa fa-eye"></i></a>
											<a class="d-text-c-h like-button" href="#" data-post="<?php the_ID(); ?>">	
											<i class="fa fa-heart"></i>
											</a>
										</div>
									</div>
									<?php endif; ?>
								</figcaption>           
							</figure>
						</div>
					<?php endforeach; 
					wp_reset_postdata();?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_template_part( 'theme_includes/container','open'); ?>

