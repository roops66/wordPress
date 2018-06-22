<?php $slide = $slides[0]; ?>
<?php empty($slide['options']['header_title'])? $header_title = get_the_title() : $header_title = $slide['options']['header_title'];  ?>
		<!-- ========================= START CONTENT ======================== --> 
		<section class="content">
			<!-- ===== Start Jumbotron ===== -->
			<?php if (!empty($slide['options']['header_image'])): ?>		

			<section class="jumbotron-wrapper">
				<div class="jumbotron" style="background: url(<?php echo esc_attr($slide['options']['header_image']->url ); ?>) no-repeat; background-size: cover;">
					<div class="about-wrapper">
					<?php if(!empty($slide['options']['header_icon'])): ?>
						<div class="icon">
							<i class="icon-<?php echo esc_attr( $slide['options']['header_icon'] );?>"></i><br />
						</div>
					<?php endif; ?>

						<div class="caption">
							<div class="border-top hidden-xs"></div>
							<h1><?php echo esc_attr( $header_title ) ?></h1>
							<div class="border-top hidden-xs"></div>
						</div>

					</div>
				</div>
			</section>

		<?php endif; ?>
			<!-- ===== Start Project ===== -->
			<section class="project">
				<div class="container">
					<!-- === Start Project Header === -->
					<div class="project-header">
						<i class="icon icon-<?php echo esc_attr($slide['options']['header_icon_2'] ); ?>">
							<i></i>
							<i></i>
							<i></i>
							<i></i>
						</i>
						<h2><?php the_title() ?></h2>
						<div class="border-bottom"></div>                       
						<hr />
						<div class="details">
							<p><strong><?php _e('Date: ','motive') ?></strong><?php the_date(get_option('date_format')) ?></p>
							<p><strong><?php _e('Client: ','motive') ?></strong><?php echo esc_attr($slide['options']['client'] ); ?></p>
							<p><strong><?php _e('Posted by: ','motive') ?></strong><?php the_author( ); ?></p>
							<a class="d-text-c-h like-button" href="#" data-post="<?php the_ID(); ?>">	
							<p><strong><?php _e('Likes: ','motive') ?></strong><span><?php echo get_post_meta( get_the_ID(), 'motive_likes', true ) ? get_post_meta(get_the_ID(), 'motive_likes', true): '0'; ?></span></p>
							</a>
							<p><strong><?php _e('Category: ','motive') ?></strong></p>
							<?php foreach($slide['categories'] as $i => $category): ?>
								<p><?php echo esc_attr($category).';' ?></p>
							<?php endforeach; ?>
						</div>
					</div>
					<!-- === Start Project Body === -->
					<div class="project-body">
						<div class="image">
							<img src="<?php echo esc_attr($slide['options']['full_image']->url ); ?>" alt="project image" />
						</div>
							<?php the_content(); ?>
						</div>

					<!-- === Start Share Links === -->
						<?php tt_share('post') ?>

					<!-- === Start Project Pagination === -->
					<div class="project-pagination">
						<a href="<?php echo get_permalink(get_adjacent_post(false,'',true)); ?>"><i class="fa fa-long-arrow-left"></i><?php _ex(' Prev post','Single post Pagination','motive') ?></a>
						<span></span>
						<a href="<?php echo get_permalink(get_adjacent_post(false,'',false)); ?>"><?php _ex('Next post ','Single post Pagination','motive') ?><i class="fa fa-long-arrow-right"></i></a>
					</div>
				<?php if ( _go('show_related_posts')): ?>
						<!-- === Start Related Projects === -->
					<div class="related-projects">
						<h3><?php _ex('Related Projects','Portfolio Single View','motive') ?></h3>
						<div class="row">
						<?php foreach($slide['related'] as $nr => $related): if ($nr >= 6) break;?>
							<div class="related-project col-xs-12 col-sm-4">
								<figure class="effect-layla">
									<img src="<?php echo esc_attr($related['options']['full_image']->url ) ?>" alt="<?php _e('portfolio image','motive') ?>" />
									<figcaption>
										<div class="caption-wrapper">
											<h2><?php echo get_the_title($related['post']->ID)?></h2>
											<div class="links">
												<a href="<?php echo get_permalink($related['post']->ID); ?>"><i class="fa fa-link"></i></a>
												<a href="<?php echo $related['options']['full_image']->url ?>" class="swipebox"><i class="fa fa-eye"></i></a>
											</div>
										</div>
									</figcaption>
								</figure>
							</div>
						<?php endforeach; ?>
						</div>
					</div>
						<!-- === End Related Projects === -->
				<?php endif; ?>
				</div>
			</section>
		</section>
		<!-- ========================= END CONTENT ======================== -->