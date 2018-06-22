<input 
	type="submit"
	value="<?php echo isset($label) && $label !== '' ? $label : 'Submit Now &gt;' ?>"
	class="contact-button contact-send"
	data-sending='<?php _e('Sending Message','motive') ?>'
	data-sent='<?php _e('Message Successfully Sent','motive') ?>'
	>