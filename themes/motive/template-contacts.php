<?php
/*
	Template Name: Contact Page Motive
*/
?>
	<?php if(_go('map_border')):
		$url = _go('map_border');
		$background_map = 'url('.$url.')';
		else:
		$background_map = ' ';
		endif;
		
		if(_go('contact_background')):
		$url = _go('contact_background');
		$background_contact = 'url('.$url.')';
		else:
		$background_contact = ' ';
		endif; 

		$show_map = _go('show_map_contact')? '7' : '12';
		?>

<?php get_header() ?>
		<!-- ========================= START CONTENT ======================== --> 
		<section class="content" style="background: <?php echo esc_attr( $background_contact ) ?> top center; background-size: cover;">
			<!-- ===== Start Contact Form ===== -->
			<div class="content-wrapper">
				<div class="container">
					<div class="row">
					<?php if(_go('show_map_contact')): ?>
						<div class="col-md-5 map-wrapper">
							<div class="iphone" style="background: <?php echo esc_attr( $background_map ) ?> no-repeat;">
								<?php tt_gmap('map-wrapper','contact-map','true'); ?>	        		
							</div>
						</div>
					<?php endif; ?>
						<div class="col-md-<?php echo esc_attr($show_map ) ?> contact-form">
							<div class="contact-form-header">
								<div class="caption">
									<h1><?php the_title() ?></h1>
								</div>
								<?php if(_go('contact_phone')||_go('email_contact')||_go('contact_address')): ?>
								<div class="row">
								<?php if(_go_repeated('Phone numbers')): ?>
								<?php $phones = _go_repeated('Phone numbers'); ?>
								<?php foreach($phones as $phone): ?>
									<div class="col-xs-12 col-sm-4 phone">
										<div class="section">
											<i class="icon-phone2"></i>
											<div class="details-wrapper">
												<p><?php echo $phone['office_phone']; ?></p>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
								<?php endif; ?>
								<?php if(_go('email_contact')): ?>
									<div class="col-xs-12 col-sm-4 mail">
										<div class="section">
											<i class="icon-envelop"></i>
											<div class="details-wrapper">
												<p><a href="#"><?php _eo('email_contact') ?></a></p>
											</div>
										</div>
									</div>
								<?php endif; ?>
								<?php if(_go('contact_address')): ?>
									<div class="col-xs-12 col-sm-4 location">
										<div class="section">
											<i class="icon-location-pin"></i>
											<div class="details-wrapper">
												<p><?php _eo('contact_address') ?></p>

											</div>
										</div>
									</div>
								<?php endif; ?>
								</div>
							<?php endif; ?>
							</div>
							<div class="contact-form-body">
								<h4><?php _ex('Write us a letter','Contact Form Title on Contact Page','motive') ?></h4>
								<?php tt_form_location('contact_page') ?>
							</div>
						</div>
					</div>
					<?php if(have_posts()): ?>
					<div class="row">
						<?php while(have_posts()): the_post();
							the_content( );
						endwhile;?>						
					</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
		<!-- ========================= END CONTENT ======================== --> 
<?php get_footer(); ?>