<?php
define('THEME_NAME', 'motive');
define('THEME_PRETTY_NAME', 'Motive');

//Load Textdomain
add_action('after_setup_theme', 'tt_theme_textdomain_setup');
function tt_theme_textdomain_setup(){
	if(load_theme_textdomain('motive', get_template_directory() . '/languages'))
		define('TT_TEXTDOMAIN_LOADED',true);
}


//content width
if (!isset($content_width))
    $content_width = 1200;

//============Theme support=======
//post-thumbnails
add_theme_support('post-thumbnails');
//add feed support
add_theme_support('automatic-feed-links');