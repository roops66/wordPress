		<?php 		
		$footer_style = _go('footer_style');
		$footer_contact_form = _go('footer_contact_form');
		 ?>
		<!-- ===================================== START FOOTER ===================================  -->			
			<footer class="footer <?php echo !empty($footer_style)? esc_attr( $footer_style ) : 'Style_1'; ?>">
		<?php if( $footer_style == 'Style_1'||empty($footer_style)): ?>
				<?php get_sidebar('footer') ?>
			<?php if(_go('show_map_footer')): ?>		
				<section class="map">
					<?php  tt_gmap('map-wrapper','map-wrapper','map-wrapper','false'); ?>
				</section>
			<?php endif; ?>
		<?php else: ?>			
			<!-- === Footer Toggle === -->
			<div class="container">
				<div class="footer-toggle">
					<i class="icon-plus closed no-select"></i>
				</div>
			</div>
			<!-- === Footer Content Wrapper === -->
			<div class="footer-wrapper">
				<div class="row row-fit">					
					<!-- === Information Wrapper === -->
					<div class="col-md-12 col-lg-<?php echo !empty($footer_contact_form)? '7' : '12'; ?>">						
						<?php get_sidebar('footer-2') ?>						
					</div>
				<?php if(_go('footer_contact_form')): ?>
					<!-- === Contact Form Wrapper === -->
					<div class="col-md-12 col-lg-5">
						<div class="contact-box">
					        <div class="caption">
	    						<p><?php _ex('Contact Form','Footer Contact Form','motive') ?></p>
	    						<span><?php _ex('Write Us','Footer Contact Form','motive') ?></span>
	    					</div>						
							<?php tt_form_location('contact_footer') ?>	
						</div>
					</div>
				<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>

			<!-- Copyrights -->
			<section class="copyrights">
					<p>Copyright 2015 Design by <a href="http://www.teslathemes.com" target="_blank">TeslaThemes</a>, Supported by <a href="http://wpmatic.io" target="_blank">WPmatic</a></p>
			<?php if(_go('copyright_message')):  ?>
				<p><?php _eo('copyright_message') ?></p>
			<?php endif; ?>
			</section>
		</footer>
			<!-- ========================= END FOOTER ======================== --> 

			<!--[if lt IE 9]>
					<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->
		<?php if(_go('tracking_code')): ?>
			<?php _eo('tracking_code'); ?>
		<?php endif; ?>
	<?php wp_footer(); ?>
	</body>
</html>