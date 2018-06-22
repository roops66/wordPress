<?php 
$footer_style = _go('footer_style');
 ?>
<?php  if($footer_style == 'Style_1'|| empty($footer_style) || ($location == 'contact_page')):?>
	<?php if(!empty($label)) : ?>
		<label class="input-place-name"><?php echo $label ?></label>
	<?php endif; ?>
	<div class="input-cover contact-line">
		<input 
			type='text' 
			name='<?php echo esc_attr($name)?>' 
			placeholder='<?php echo esc_attr($placeholder)?>' 
			value=''
			<?php if($required) echo 'data-parsley-required="true"'; ?>
			class="contact-line client-name"
			>
		<?php if ($location == 'contact_footer'): ?>
			<hr />		
		<?php endif ?>
	</div>
<?php else: ?>
	<div class="input-group">
	<?php if(!empty($label)) : ?>
		<label class="input-place-name"><?php echo $label ?></label>
	<?php endif; ?>
		<input 
			type='text' 
			name='<?php echo esc_attr($name)?>' 
			placeholder='<?php echo esc_attr($placeholder)?>' 
			value=''
			<?php if($required) echo 'data-parsley-required="true"'; ?>
			class="contact-line client-name">
			<?php echo $location == 'contact_footer' && $footer_style == 'Style_1'|| empty($footer_style)? '<br />' : ''; ?>
	</div>
<?php endif; ?>