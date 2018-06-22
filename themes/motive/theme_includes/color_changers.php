<?php
/***********************************************************************************************/
/* Custom CSS */
/***********************************************************************************************/
add_action('wp_enqueue_scripts', 'tesla_custom_css', 99);
function tesla_custom_css() {
	$custom_css = _go('custom_css') ? _go('custom_css') : '';
	wp_add_inline_style('tt-main-style', $custom_css);
	if(!empty($_GET))
		wp_localize_script( "options.js", "get_data", $_GET );
}

add_action('wp_enqueue_scripts', 'tt_style_changers',99);
function tt_style_changers(){
	$background_color = _go('bg_color') ;
	$background_image = _go('bg_image') ;
	if($background_image || $background_color)
		wp_add_inline_style('tt-main-style', "body{background-color: $background_color;background-image: url('$background_image')}");

	$colopickers_css = '';
	if (_go('site_color')) : 
		$lighter_color = adjustBrightness(_go('site_color'), 20);
		$lighter_color_2 = adjustBrightness(_go('site_color'), 100);
		$colopickers_css .= ' 
		
		.footer .upper-part {
			background-color: ' . _go('site_color') . ';
		}
		.footer .upper-part .container .expand-form {
			background-color: ' . _go('site_color') . ';
		}
		
		.footer .contact-group .body-wrapper .social-links .fa {
			border-color: ' . $lighter_color .';
		}

		.footer .upper-part .contact-box .contact-button {
			background-color: ' . $lighter_color .';
		}
		.footer .contact-group .body-wrapper .social-links a {
		    background-color: ' . $lighter_color .';
		}
		.footer .flickr-widget .follow-me {
			background-color: ' . $lighter_color .';
		}
		.footer .contact-group .body-wrapper .section-body i {
			color: ' . $lighter_color .';
		}
		.header.fixed,
		.sticky {
			background-color: ' . _go('site_color') .';
		}
		.header .menu .main-nav .sub-menu li {
			background-color: ' . _go('site_color') .';
		}
		.contact-page .content .content-wrapper .contact-form .contact-form-body .contact-form .contact-button {
			color: ' . _go('site_color') .';
			border-color: ' . _go('site_color') .';
		}
		.contact-page .content .content-wrapper .contact-form .contact-form-body .contact-form .contact-button:hover,
		.contact-page .content .content-wrapper .contact-form .contact-form-body .contact-form .contact-button:focus {
			background-color: ' . _go('site_color') .';
		}
		.content .project-pagination a {
			color: ' . _go('site_color') .';
		}
		.content .project-pagination span {
			border-left-color: ' . _go('site_color') .';
		}
		.single-project-page .project-header .icon-cross {
			color: ' . _go('site_color') .';
			border-color: ' . _go('site_color') .';
		}
		.sidebar .search-form {
			background-color: ' . _go('site_color') .';
		}

		.content .services .services-wrapper .services-item i {
		    color: ' . _go('site_color') . ';
		}

		.sidebar .widget_calendar a {
		    background-color: ' . _go('site_color') . ';
		}
		

		.comments-area .ul-comments .comment .comment-reply {
		    background-color: ' . $lighter_color_2 . ';
		}
		.sidebar .widget_tag_cloud a {
		    background-color: ' . $lighter_color_2 . ';
		}
		.sidebar select {
			background-color: ' . $lighter_color_2 . ';
		}';


	endif;

	if (_go('site_color_2')) : 
		$lighter_color = adjustBrightness(_go('site_color'), 150);
		$colopickers_css .= '

		.view-details-button, 
		.submit-button {
		    color: ' . _go('site_color_2') . ';
		    border-color: ' . _go('site_color_2') . ';
		}
		.view-details-button:hover,
		.submit-button:hover {
		    color: ' . _go('site_color_2') . ';
		}

		.search-box {
		    background-color: ' . _go('site_color_2') . ';
		}
		.search-box .search-form .search-submit {
		    background-color: ' . _go('site_color_2') . ';
		}
		.main-slider .slide .container .view {
		    background-color: ' . _go('site_color_2') . ';
		    border-color: ' . _go('site_color_2') . ';
		}
		.main-slider .slide .container .buy:hover {
		    border-color: ' . _go('site_color_2') . ';
		    background-color: ' . _go('site_color_2') . ';
		}
		.main-services .service a {
		    border-color: ' . _go('site_color_2') . ';
		    color: ' . _go('site_color_2') . ';
		}
		.main-services .service a:hover {
		    background-color: ' . _go('site_color_2') . ';
		}
		.filter-box li a:hover,
		.filter-box li a.current {
		    background-color: ' . _go('site_color_2') . ';
		    border-color: ' . _go('site_color_2') . ';
		}
		figure.effect-layla figcaption .caption-wrapper a.liked .fa {
		    color: ' . _go('site_color_2') . ';
		}
		figure.effect-layla .links .fa:hover {
		    color: ' . _go('site_color_2') . ';
		}
		.main-offer .offer-item .icon {
		    color: ' . _go('site_color_2') . ';
		}
		.screens .information .information-wrapper .view-portfolio {
		    background-color: ' . _go('site_color_2') . ';
		}
		.content .pagination .pages-wrapper li span.current,
		.content .pagination .pages-wrapper li a:hover {
		    color: ' . _go('site_color_2') . ';
		    border-color: ' . _go('site_color_2') . ';
		}
		.footer .contact-group .body-wrapper .social-links .twitter:hover {
		    background-color: ' . _go('site_color_2') . ';
		}
		.content .post .post-header .date {
		    color: ' . _go('site_color_2') . ';
		}
		.content .post .post-header .date h4 a,
		.content .post .post-header .date p a {
		    color: ' . _go('site_color_2') . ';
		}
		.content .post .post-header .details .like-button.liked p {
		    color: ' . _go('site_color_2') . ';
		}
		.mejs-controls .mejs-time-rail .mejs-time-current {
		  background-color: ' . _go('site_color_2') . ';
		}
		.content .project-pagination a:hover {
		    color: ' . _go('site_color_2') . ';
		    border-color: ' . _go('site_color_2') . ';
		}
		.comments-area .ul-comments .comment .comment-reply:hover {
		    color: ' . _go('site_color_2') . ';
		}
		.about-page .content .history-skills .skills .bar-container .bar {
		    background-color: ' . _go('site_color_2') . ';
		}
		.how-we-work .icon-wrapper .icon {
		    color: ' . _go('site_color_2') . ';
		}
		.how-we-work .icon-wrapper .icon:hover {
		    border-color: ' . _go('site_color_2') . ';
		}
		.how-we-work .icon-wrapper .fa-long-arrow-right {
		    color: ' . _go('site_color_2') . ';
		}
		.how-we-work .work-item h5 {
		    color: ' . _go('site_color_2') . ';
		}

		.sidebar .widget {
		    border-top-color: ' . _go('site_color_2') . ';
		}
		.widget_recent_comments ul li a:hover,
		.widget_archive ul li a:hover,
		.widget_categories ul li a:hover,
		.widget_meta ul li a:hover,
		.widget_recent_entries ul li a:hover,
		.widget_rss ul li a:hover {
		    color: ' . _go('site_color_2') . ';
		}
		.sidebar .widget-categories li a:hover {
		    color: ' . _go('site_color_2') . ';
		}
		.sidebar .widget_tag_cloud a:hover {
		    background-color: ' . _go('site_color_2') . ';
		}
		.sidebar .widget_text .panel-title .fa:hover {
		    background-color: ' . _go('site_color_2') . ';
		}
		.sidebar .flickr-widget .follow-me {
		    background-color: ' . _go('site_color_2') . ';
		}
		.sidebar .widget_pages a:hover,
		.sidebar .widget_nav_menu a:hover {
		    color: ' . _go('site_color_2') . ';
		}
		.sidebar .show_popular .tab-content li.post .details a {
		    background-color: ' . _go('site_color_2') . ';
		}

		.comments-area .ul-comments .comment .comment-reply:hover {
		    background-color: ' . $lighter_color . ';
		}
		.how-we-work .icon-wrapper .icon {
		    background-color: ' . $lighter_color . ';
		}

		.how-we-work .icon-wrapper {
		    border-bottom-color: ' . $lighter_color . ';
		}
		.how-we-work .icon-wrapper .fa-caret-down {
		    color: ' . $lighter_color . ';
		}
		.footer .contact-group .body-wrapper .section-body .details-wrapper p,
		.footer .contact-group .body-wrapper .section-body .details-wrapper p a {
		    color: ' . $lighter_color . ';
		}
		.footer .contact-group .body-wrapper .social-links a:hover .fa {
		    border-color: ' . $lighter_color . ';
		}
		.footer .contact-group .body-wrapper .social-links .fa {
		    color: ' . $lighter_color . ';
		}
		';
	endif;
	if (_go('site_color_3')) : 
		$colopickers_css .= '
	
		.content .post .post-header {
		    border-bottom-color: ' . _go('site_color_3') . ';
		}
		.widget_recent_comments ul li,
		.widget_archive ul li,
		.widget_categories ul li,
		.widget_meta ul li,
		.widget_recent_entries ul li,
		.widget_rss ul li {
		    border-bottom-color: ' . _go('site_color_3') . ';
		}
		.sidebar .widget-categories li {
		    border-bottom-color: ' . _go('site_color_3') . ';
		}
		.sidebar .widget-twitter li {
		    border-bottom-color: ' . _go('site_color_3') . ';
		}
		.sidebar .show_popular .tab-content li.post {
		    border-bottom-color: ' . _go('site_color_3') . ';
		}';
	endif;

	wp_add_inline_style('tt-main-style', $colopickers_css);

	//Custom Fonts Changers
	wp_add_inline_style('tt-main-style', tt_text_css('main_content_text','h1,h2,h3,.content p,.main-services .service .text p,.main-offer .offer-item .description,.content .container .post-body, .project .container .project-body,.content .container p,.sidebar .widget h5, caption,.footer .contact-group .section-header h3,.content .post .post-header .details h3 a,.content .section-header h3,.main-offer .offer-item .title h6,.footer .flickr-widget .follow-me','px'));
	wp_add_inline_style('tt-main-style', tt_text_css('sidebar_text','h3,h4,.content .mai-content .comments-area,.sidebar,.sidebar .widget,.sidebar .widget li a,.sidebar .widget_text p,.widget_rss cite,.footer .contact-group .section-header p,.main-offer .offer-item .title p,.main-services .service .caption h4,.content .post .post-header .details p,.content .post .post-header .details p a','px'));
	wp_add_inline_style('tt-main-style', tt_text_css('menu_text','h5,h6,.main-nav, .header .menu .main-nav > ul > li > a,.widget_rss .rss-date,.sidebar .widget_tag_cloud a,.footer .contact-group .body-wrapper .caption,.footer .contact-group .body-wrapper .section-body .details-wrapper p, .footer .contact-group .body-wrapper .section-body .details-wrapper p a','px'));
	//Custom Styler
	wp_add_inline_style('tt-main-style', _gcustom_styler('Custom Styler'));
};
?>