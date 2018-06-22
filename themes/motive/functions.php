<?php
/***********************************************************************************************/
/*  Tesla Framework */
/***********************************************************************************************/

require_once(get_template_directory() . '/tesla_framework/tesla.php');

/***********************************************************************************************/
/*  Register Plugins */
/***********************************************************************************************/
if ( is_admin() && current_user_can( 'install_themes' ) ) {
    require_once( get_template_directory() . '/plugins/tgm-plugin-activation/register-plugins.php' );
}

/***********************************************************************************************/
/* Google fonts + Fonts changer */
/***********************************************************************************************/
TT_ENQUEUE::$gfont_changer = array(
		_go('logo_text_font'),
		_go('main_content_text_font'),
		_go('sidebar_text_font'),
		_go('menu_text_font')
	);
TT_ENQUEUE::$base_gfonts = array('Open Sans:300italic,400italic,600italic,700italic,400,300,600,700,800');

/***********************************************************************************************/
/* Color Changers */
/***********************************************************************************************/

require_once get_template_directory() . '/theme_includes/color_changers.php';

/***********************************************************************************************/
/* Custom JS */
/***********************************************************************************************/

add_action('wp_footer', 'tesla_custom_js', 99);
function tesla_custom_js() {
    ?>
    <script type="text/javascript"><?php echo esc_js(_eo('custom_js')) ?></script>
    <?php
}

/***********************************************************************************************/
/* Add Menus */
/***********************************************************************************************/

function tt_register_menus($return = false){
    $tt_menus = array(
			'main_menu'    => __('Main menu','motive'),
		);
    if($return)
        return array(
			'main_menu'    => __('Style 1','motive'),
		);
    register_nav_menus($tt_menus);
}
add_action('init', 'tt_register_menus');

/***********************************************************************************************/
/* Add Shortcodes */
/***********************************************************************************************/

require_once(TT_THEME_DIR . '/shortcodes.php');

/***********************************************************************************************/
/* Add Widgets */
/***********************************************************************************************/

require_once(TT_THEME_DIR . '/widgets/widget_contact.php');
require_once(TT_THEME_DIR . '/widgets/widget_twitter.php');
require_once(TT_THEME_DIR . '/widgets/widget_flickr.php');
require_once(TT_THEME_DIR . '/widgets/widget_popular.php');
require_once(TT_THEME_DIR . '/widgets/widget_social.php');
require_once(TT_THEME_DIR . '/widgets/widget_social_block.php');

/* ========================================================================================================================

  Comments

  ======================================================================================================================== */
function tt_custom_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
	?>

	<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'has-reply') ?> id="comment-<?php comment_ID() ?>">
		<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'],'reply_text'=> __('Reply','motive') ))) ?>
		<?php if ( 'div' != $args['style'] ) : ?>
			<div class="comment-avatar">
		<?php endif; ?>          
			<?php if ($args['avatar_size'] != 0)
				echo get_avatar( $comment, $args['avatar_size'], false,'avatar image' ); ?>            
		<?php if ( 'div' != $args['style'] ) ?>
			</div>
			<?php if ($comment->comment_approved == '0') : ?>
				<em class="comment-awaiting-moderation">
					<?php _e('Your comment is awaiting moderation.','motive') ?>
				</em>
				<br />
			<?php endif; ?>            
			<h4><a href="<?php comment_author_url() ?>"><?php echo get_comment_author() ?></a></h4>
			<p class="date"><?php echo get_comment_time('M d, Y') ?></p>
		<?php comment_text() ?>
		<div id="div-comment-<?php comment_ID() ?>"></div>
		<?php edit_comment_link(__('(Edit)','motive'),'  ','' );

}
/***********************************************************************************************/
/* Add Theme Support */
/***********************************************************************************************/
add_theme_support('post-formats', array('quote', 'gallery', 'video', 'audio', 'image'));


function theme_slug_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_slug_setup' );

if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function theme_slug_render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
	}
add_action( 'wp_head', 'theme_slug_render_title' );
}

/***********************************************************************************************/
/* Register Contact Form Locations */
/***********************************************************************************************/
TT_Contact_Form_Builder::add_form_locations(array(
	'contact_page' => 'Contact Page',
	'contact_footer' => 'Footer Area'
));

/***********************************************************************************************/
/* Add Sidebar Support */
/***********************************************************************************************/
function tt_register_sidebars(){
	if (function_exists('register_sidebar')) {		
		register_sidebar(
			array(
				'name'           => __('Blog Sidebar', 'motive'),
				'id'             => 'blog',
				'description'    => __('Blog Sidebar Area', 'motive'),
				'before_widget'  => '<div class="widget %2$s">',
				'after_widget'   => '</div>',
				'before_title'   => '<h5>',
				'after_title'    => '</h5>'
			)
		);
		register_sidebar(
			array(
				'name'           => __('Footer', 'motive'),
				'id'             => 'footer',
				'description'    => __('Footer Area', 'motive'),
				'class'         => '',
				'before_widget'  => '<div class="col-xs-12 col-md-4"><div class="widget %2$s">',
				'after_widget'   => '</div></div>',
				'before_title'   => '<h3>',
				'after_title'    => '</h3>'
			)
		);
	}
}
add_action('widgets_init','tt_register_sidebars');

add_filter('widget_text', 'do_shortcode');
//Blog page
function tt_strip_images($content) {
	return preg_replace('/<img[^>]+./', '', $content);
}

function tt_cut_content($content, $nr_chars = '500') {
	$str = wordwrap($content, $nr_chars);
	$str = explode("\n", $str);
	$str = $str[0] . '...';
	return $str;
}

function tt_cut_shortcodes($content) {
	return preg_replace('@\[.*?\]@', '', $content);
}

//====================View count for single posts===========================
function tt_set_post_views($postID) {
	$count_key = 'wpb_post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	} else {
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}

//To keep the count accurate, lets get rid of prefetching
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function tt_get_post_views($postID) {
	$count_key = 'wpb_post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0 View";
	}
	return $count . ' Views';
}
//====================View count for single posts===========================


/* ========================================================================================================================

  Likes

======================================================================================================================== */
add_action('wp_ajax_motive_like_post', 'am_motive_like_post');
add_action('wp_ajax_nopriv_motive_like_post', 'am_motive_like_post');

function am_motive_like_post(){
	if(!empty($_POST['id'])){
		$post_id = $_POST['id'];
		$likes = get_post_meta($post_id, 'motive_likes', true);
			if( isset($_COOKIE['motive_likes_'. $post_id]) )
				die('already liked');
				if(!$likes)
					$likes = 0;
					$likes++;
					if(update_post_meta($post_id, 'motive_likes', $likes)){
						setcookie('motive_likes_'. $post_id, $post_id, time()*20, '/');
						die('liked');
					}
					else{
						die('error');
					}
				}
			die();
	}

/***********************************************************************************************/
/* Share Function */
/***********************************************************************************************/

if(!function_exists('tt_share')){
	function tt_share($f_location){
		$share_this = _go('share_this');
		if(($f_location == 'post')||($f_location == 'gallery')){ $tag[0] = '<li>'; $tag[1] = '</li>'; } else {$tag[0] = ''; $tag[1] = ''; };
		$slider_class = $f_location === 'gallery'? 'slider-share-links' : 'share-links social-links';
		if(isset($share_this) && is_array($share_this)): ?>
			<div class="<?php echo esc_attr( $slider_class ) ?>">
				<?php if($f_location === 'post' || $f_location ==='gallery'):  ?>
				<ul>
					<?php if($f_location === 'post'): ?>
					<li><p><?php _e('Share :','motive') ?></p></li>
				<?php endif; ?>
				<?php endif; ?>
				<?php foreach($share_this as $val): ?>
					<?php if($val === 'googleplus') $val = 'google-plus'; ?>
					
					<?php switch ($val) {
						case 'facebook': ?>
								<?php echo $tag[0] ?>
									<a class="facebook" onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;t=<?php echo urlencode(get_the_title()); ?>&amp;u=<?php echo urlencode(get_the_permalink()) ?>','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)"><i class="fa fa-<?php echo esc_attr($val );?>"></i></a>
								<?php echo $tag[1] ?>
							<?php break; ?>
						<?php case 'twitter': ?>
								<?php echo $tag[0] ?>
									<a class="twitter" onClick="window.open('http://twitter.com/intent/tweet?url=<?php echo urlencode(get_the_permalink()) ?>&text=<?php echo urlencode(get_the_title()); ?>','sharer','toolbar=0,status=0,width=548,height=325');"><i class="fa fa-<?php echo esc_attr($val );?>"></i></a>
								<?php echo $tag[1] ?>
							<?php break; ?>
						<?php case 'google-plus': ?>
								<?php echo $tag[0] ?>
									<a class="google-plus" onClick="window.open('https://plus.google.com/share?url=<?php echo urlencode(get_the_permalink()) ?>','sharer','toolbar=0,status=0,width=548,height=325');"><i class="fa fa-<?php echo esc_attr($val );?>"></i></a>
								<?php echo $tag[1] ?>
							<?php break; ?>
						<?php case 'pinterest': ?>
								<?php echo $tag[0] ?>
									<a class="pinterest" onClick="window.open('https://www.pinterest.com/pin/create/button/?url=<?php echo urlencode(get_the_permalink()) ?>','sharer','toolbar=0,status=0,width=748,height=325');"><i class="fa fa-<?php echo esc_attr($val );?>"></i></a>
								<?php echo $tag[1] ?>
							<?php break; ?>
						<?php case 'linkedin': ?>
								<?php echo $tag[0] ?>
									<a class="linkedin" onClick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_the_permalink()) ?>','sharer','toolbar=0,status=0,width=548,height=325');"><i class="fa fa-<?php echo esc_attr($val );?>"></i></a>
								<?php echo $tag[1] ?>
								<?php break; ?>
						<?php case 'vkontakte': ?>
								<?php echo $tag[0] ?>
									<a class="vkontakte" onClick="window.open('http://www.vkontakte.ru/share.php?url=<?php echo urlencode(get_the_permalink()) ?>','sharer','toolbar=0,status=0,width=548,height=325');"><i class="fa fa-vk"></i></a>
								<?php echo $tag[1] ?>
							<?php break; ?>
						
						<?php default:
							echo 'No Share';
							break;
					} ?>
				<?php endforeach; ?>
			<?php if($f_location == 'post'):  ?>
				</ul>
			<?php endif; ?>
			</div>
		<?php endif;
	}
}

/*==== Function Call custom meta boxex ====*/
function tt_video_or_image_featured($echo = false,$size="full") {
	global $post;
	$embed_code = get_post_meta($post->ID , THEME_NAME . '_video_embed', true);
	$patern = '%s';

	if($echo){

		if(!empty($embed_code)) {
			return sprintf($patern, $embed_code);
		}else {
			if( has_post_thumbnail() && ! post_password_required() ){
				return sprintf($patern, get_the_post_thumbnail($post->ID,$size));
			}
		}

	}else{

		if(!empty($embed_code)) {
			printf($patern, $embed_code);
		}else {
			if( has_post_thumbnail() && ! post_password_required() ){
				printf($patern, get_the_post_thumbnail($post->ID,$size));
			}
		}

	}
}
/*==== Function Convert Arabic Numbers to Roman Numerals ====*/
function romanNumerals($num) 
{
	$n = intval($num);
	$res = '';
 
	/*** roman_numerals array  ***/
	$roman_numerals = array('M'  => 1000,'CM' => 900,'D'  => 500,'CD' => 400,'C'  => 100,'XC' => 90,'L'  => 50,'XL' => 40,'X'  => 10,'IX' => 9,'V'  => 5,'IV' => 4,'I'  => 1);
 
	foreach ($roman_numerals as $roman => $number) 
	{
		/*** divide to get  matches ***/
		$matches = intval($n / $number);
 
		/*** assign the roman char * $matches ***/
		$res .= str_repeat($roman, $matches);
 
		/*** substract from the number ***/
		$n = $n % $number;
	}
 
	/*** return the res ***/
	return $res;
	}