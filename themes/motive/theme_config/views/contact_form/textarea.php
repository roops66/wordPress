<?php 
$footer_style = _go('footer_style');
 ?>
<?php  if($footer_style == 'Style_1'|| empty($footer_style) || $location == 'contact_page'):?>
	<?php if(!empty($label)) : ?>
		<label class="input-place-name "><?php echo $label ?></label>
	<?php endif; ?>
	<div class="input-cover <?php echo $location === "contact_page" ? " " : "input-cover-text" ?>">
		<textarea 
			name='<?php echo esc_attr($name)?>'
			placeholder='<?php echo esc_attr($placeholder)?>' 
			<?php if($required) echo 'data-parsley-required="true"'; ?>
			class="contact-area comment"
			></textarea>
		<?php if ($location == 'contact_footer'): ?>
			<hr />		
		<?php endif; ?>
	</div>
<?php else: ?>
    <div class="input-group">
	<?php if(!empty($label)) : ?>
		<label class="input-place-name"><?php echo $label ?></label>
	<?php endif; ?>
		<textarea 
			name='<?php echo esc_attr($name)?>'
			placeholder='<?php echo esc_attr($placeholder)?>' 
			<?php if($required) echo 'data-parsley-required="true"'; ?>
			class="contact-area comment"
			></textarea>
	</div>
<?php endif; ?>