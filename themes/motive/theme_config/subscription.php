<?php
return array(
	'error_class'=>'error',			//class added to container on error

	'required_class' => 's_error',	//class added to the required input with no value at submission
	'required_msg' => __('Please insert email','motive'),	//message displayed when at least one required filed is not filled
	'invalid_email_class' => 'invalid_email',	//class added to the email input with an invalid email value at submission
	'invalid_email_msg'=>__("Invalid Email",'motive'),	//Invalid email message
	'input_timeout' => true,	//if true will remove input classes within the time in ms set for 'result_timeout' config below

	'success_class'=>'success',		//class addded to container on successful subscription
	'animation_done_class'=>'animation_done',
	'result_timeout' => 3000,	//time in ms to remove result container html and added classes (error_class or success_class)
	
	'result_container_selector'=>'#newsletter .result_container',//Jquery type selector for the result container
	//'result_wrapper'=> array(
	//	'tag'=>'<p>',				//wrapper tag
	//	'attr'=>array(				//any jquery object attributes
	//		'id'=>'result_wrapper',
	//		)
	//	),
	'date_format' => "F j, Y, g:i a",
	'date_headline' => __('Date','motive'),
	'no_data_posted' => __('No data received','motive'),
	'error_open_create_files_msg' => __('Error writing to disk','motive'), //leave blank to get the php error msg
	'success_msg' => __('Successfully Subscribed','motive'),
	'error_writing_msg' => __("Couldn't write to file",'motive'),

	);