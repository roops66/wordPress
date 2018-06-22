<section class="upper-part">
	<div class="container">
	<?php if(_go('footer_contact_form')): ?>
		<i class="expand-form fa fa-envelope-o"></i>
		<div class="contact-form-wrapper-footer contact-box">
			<div class="section-header">
				<h3><?php _ex('Drop us a line','Footer Contact Form Title','motive') ?></h3>
				<div class="border-bottom"></div>
				<p><?php _ex('Write us a letter','Footer Contact Form Description','motive') ?></p>
			</div>
			<?php tt_form_location('contact_footer') ?>
		</div>
	<?php endif; ?>
	    <div class="contact-group">
            <div class="row">
				<?php dynamic_sidebar('footer') ?>
			</div>
		</div>
	</div>
</section> 