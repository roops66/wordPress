<?php 
	
/***********************************************************************************************/
/* Shortcodes */
/***********************************************************************************************/

/* Shorcode container (Template structure)
============================================*/
	add_shortcode('container', 'container');

function container($atts, $content = null) {
	extract(shortcode_atts(array(
		'class' => '',
		'bg_img' => '',
		'bg_color' => ''
	), $atts));	
	ob_start(); ?>
				<?php get_template_part( 'theme_includes/container' , 'close' ); ?>
					<section class="<?php echo esc_attr( $class ) ?>" style=" <?php if(!empty($bg_img)): echo "background: url(" . $bg_img . ")";elseif(!empty($bg_color)): echo "background:" . $bg_color . ";"; endif;  ?>">
						<div class="container">
						<?php echo do_shortcode(shortcode_unautop($content)) ?>
						</div>	
					</section>
				<?php get_template_part( 'theme_includes/container' , 'open' ); ?>
	<?php return ob_get_clean();
}

/* Shorcode row (Template structure)
============================================*/
	add_shortcode('row', 'row');

function row($atts, $content = null) {
	extract(shortcode_atts(array(
		'class' => ''
	), $atts));
	
	return '<div class="row '.$class.'">'. do_shortcode(shortcode_unautop($content)) .'</div>';
}
/* Shorcode icon (Template structure)
============================================*/
	add_shortcode('icon', 'icon');

function icon($atts, $content = null) {
	extract(shortcode_atts(array(
		'class' => ''
	), $atts));
	
	return '<i class="icon-' . $class . '"></i>';
}

/* Shorcode image (Template structure)
============================================*/
	add_shortcode('image', 'image');

function image($atts, $content = null) {
	extract(shortcode_atts(array(
		'url' => '',
		'url_2' => '',
		'class' => ''
	), $atts));
	ob_start();?>	<div class="device <?php echo esc_attr( $class ) ?>">
						<img src="<?php echo esc_attr( $url ) ?>">
						<?php if(!empty($url_2)): ?>
						<img src="<?php echo esc_attr( $url_2 ) ?>">
						<?php endif; ?>
					</div>
	<?php return ob_get_clean();
}
/* Shorcode columns (Template structure)
============================================*/

add_shortcode('column', 'column');

function column($atts, $content = null) {
	extract(shortcode_atts(array(
		'size' => '12',
		'class' => ''
	), $atts));

	$content = wpautop(trim($content));
	
	return '<div class="col-md-'.$size.' '.$class.'">'. do_shortcode(shortcode_unautop($content)) .'</div>';
}

add_shortcode('column_2', 'column_2');
//for nesting purposes
function column_2($atts, $content = null) {
    extract(shortcode_atts(array(
        'size' => '12',
        'class' => ''
    ), $atts));

    $content = wpautop(trim($content));
    
    return '<div class="col-md-'.$size.' '.$class.'">'. do_shortcode(shortcode_unautop($content)) .'</div>';
}

/* Shorcode alert (Typography)
============================================*/

add_shortcode('alert', 'alert');

function alert($atts, $content = null) {
	extract(shortcode_atts(array(
		'type' => 'warning'
	), $atts));
	
	return '<div class="alert a_'.$type.'">
				<a class="close" data-dismiss="alert" href="#"></a>
				'.$content.'
			</div>';
}

//=================BASIC SHORTCODES===========================================
function hr($atts, $content = null) {

	return "<hr>";
}

//=============================== Here Goes shortcodes for Pages =========================//

/* Shorcode tesla_accordion
============================================*/
	add_shortcode('tesla_accordion', 'tesla_accordion');

function tesla_accordion($atts, $content = null) {
	extract(shortcode_atts(array( 
	'class' => ''

	), $atts));
	
	return '<div class="panel-group '.$class.'" id="accordion" role="tablist" aria-multiselectable="true">'. do_shortcode($content) .'</div>';
}
	add_shortcode('tt_acc_item','tt_acc_item');


function accordion_counter(){
	global $accordion_count;
	$accordion_count++;
}

function tt_acc_item($atts, $content = null) {
	extract(shortcode_atts(array(
		'title' => ''
	), $atts));
	accordion_counter();
	global $accordion_count;
	
	ob_start();?><div class="panel panel-default">
					<div class="panel-heading" role="tab" id="">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parrent="#accordion" href="#collapse-<?php echo esc_attr( $accordion_count ) ?>" aria-expanded="true" aria-controls="collapse-<?php echo esc_attr( $accordion_count ) ?>"><?php echo esc_attr( $title ) ?></a>
							<a data-toggle="collapse" data-parrent="#accordion" href="#collapse-<?php echo esc_attr( $accordion_count ) ?>" aria-expanded="true" aria-controls="collapse-<?php echo esc_attr( $accordion_count ) ?>">
								<i class="fa fa-plus"></i>
							</a>
						</h4>
					</div>
					<div id="collapse-<?php echo esc_attr( $accordion_count ) ?>" class="panel-collapse collapse" aria-labelledby="headingOne">
						<div class="panel-body"><?php echo do_shortcode( $content ) ?></div>
					</div>
				</div>
	<?php return ob_get_clean();
}

/* Shorcode Start About (Home Page)
============================================*/

add_shortcode('tt_about', 'tt_about');

function tt_about($atts, $content) {
	extract(shortcode_atts(array(
				'type' => '',
				'title' => '',
				'btn_1' => '',
				'btn_2' => '',
				'url_1' => '',
				'url_2' => '',
					), $atts));

	ob_start()?>			
				<div class="section-header <?php echo $type == '2'? 'v2' : 'v1';?>">
					<div class="container">
						<h3><?php echo html_entity_decode($title) ?></h3>
						<div class="border-bottom"></div>
						<p><?php echo do_shortcode( $content ) ?></p>
					<?php if(!empty($btn_1)||!empty($btn_2)): ?>
					<div class="action">
						<a href="<?php echo esc_attr($url_1 ) ?>"><?php echo esc_attr( $btn_1 ); ?></a>
						<a href="<?php echo esc_attr($url_2 ) ?>"><?php echo esc_attr( $btn_2 ); ?></a>
					</div>
					<?php endif; ?>
					</div>
				</div>			
	<?php return ob_get_clean();
};

/* Shorcode Start About (Home Page)
============================================*/

add_shortcode('tt_image', 'tt_image');

function tt_image($atts, $content) {
	extract(shortcode_atts(array(
				'img_bg_1' => '',
				'img_bg_2' => '',
				'img_1' => '',
				'img_2' => ''
					), $atts));

	ob_start()?>
			<?php get_template_part( 'theme_includes/container' , 'close' ); ?>
				<section class="main-about">
					<div class="container">
						<div class="devices">
							<div class="macbook wow fadeIn" style="background: url(<?php echo esc_attr( $img_bg_1 ) ?>);">
								<img src="<?php echo esc_attr( $img_1 ) ?>" alt="image 1" />
							</div>
							<div class="iphone wow fadeIn" data-wow-delay="0.3s" style="background: url(<?php echo esc_attr( $img_bg_2 ) ?>);">
								<img src="<?php echo esc_attr( $img_2 ) ?>" alt="image 2" />
							</div>
						</div>
					</div>
				</section>
			<?php get_template_part( 'theme_includes/container' , 'open' ); ?>
	<?php return ob_get_clean();
};

/* Shorcode Start Statistics (Home Page)
============================================*/

add_shortcode('tt_statistics', 'tt_statistics');

function tt_statistics($atts, $content) {
	extract(shortcode_atts(array(
				'bg_url' => ''
					), $atts));
	ob_start()?>
		<?php get_template_part( 'theme_includes/container' , 'close' ); ?>
			<section class="statistics-counter" style="background: url(<?php echo esc_attr( $bg_url ) ?>);  background-position: 50% 50%;  background-repeat: no-repeat;  background-attachment: fixed;  background-size: cover;">
				<div class="container">
					<div class="row"><?php echo do_shortcode( $content ) ?></div>
				</div>
			</section>
		<?php get_template_part( 'theme_includes/container' , 'open' ); ?>
	<?php return ob_get_clean();
};

add_shortcode('tt_st_item', 'tt_st_item');

function tt_st_item($atts, $content) {
	extract(shortcode_atts(array(
				'title' => '',
				'class' => '',
				'nr' => '',
				'size'=>''
					), $atts));
switch ($size) {
	case '1':
		$sm = 12; $md = 8;
		break;
	case '2':
		$sm = 12; $md = 6;
		break;
	case '3':
		$sm = 12; $md = 4;
		break;
	case '4':
		$sm = 6; $md = 3;
		break;	
	default:
		$sm = 6; $md = 3;
		break;
}
		return 	'<div class="col-xs-12 col-md-' . esc_attr($md) . '">
					<i class="icon icon-' . $class . '"></i>
					<h2 class="count projects" data-count="'. esc_attr( $nr ) . '">1</h2>
					<p class="caption">' . $title . '</p>
				</div>';

};

/* Shorcode Logistics (Home Page)
============================================*/

add_shortcode('tt_logistic', 'tt_logistic');

function tt_logistic($atts,$content) {

		ob_start();?>
			<?php get_template_part( 'theme_includes/container' , 'close' ); ?>
				<section class="how-we-work">
					<div class="container">
						<div class="row"><?php echo do_shortcode( $content ) ?>
						</div>
					</div>
				</section>
			<?php get_template_part( 'theme_includes/container' , 'open' ); ?>
		<?php return ob_get_clean();
};

add_shortcode('tt_lg_item', 'tt_lg_item');

function tt_lg_item($atts, $content) {
	extract(shortcode_atts(array(
				'title' => '',
				'class' => '',
				'class_1' => 'long-arrow-right',
				'class_2' => 'caret-down',
				'size' => '4'
					), $atts));

	empty($class_1) ? $class_1 = 'long-arrow-right' : '';

switch ($size) {
	case '1':
		$sm = 12; $md = 8;
		break;
	case '2':
		$sm = 12; $md = 6;
		break;
	case '3':
		$sm = 12; $md = 4;
		break;
	case '4':
		$sm = 6; $md = 3;
		break;	
	default:
		$sm = 6; $md = 3;
		break;
}
				return 	'<div class="col-xs-12 col-sm-'. esc_attr($sm) .' col-md-'. esc_attr($md) .' work-item">
							<div class="icon-wrapper">
								<i class="icon icon-' . $class. '"></i>
								<i class="fa fa-' . $class_1 . ' hidden-xs hidden-sm"></i>
								<i class="fa fa-' . $class_2. '"></i>
							</div>
							<h5>' . $title . '</h5>
							<p>' . do_shortcode( $content ) . '</p>
						</div>';
};


/* Shorcode Title (About Page)
============================================*/
add_shortcode('tt_title', 'tt_title');

function tt_title($atts, $content) {
	extract(shortcode_atts(array(
				'title' => '',
				'type' => ''
					), $atts));
	ob_start();?>
					<div class="section-header <?php echo !empty($type)? 'v2' : 'v1'; ?>">
						<h3><?php echo esc_attr( $title ); ?></h3>
						<div class="border-bottom"></div>
					</div>
					<p><?php echo do_shortcode( $content ); ?></p>
    <?php return ob_get_clean();
};
/* Shorcode Skils (About Page)
============================================*/
add_shortcode('tt_skills', 'tt_skills');

function tt_skills($atts, $content) {
	extract(shortcode_atts(array(
				'title' => '',
				'type' => ''
					), $atts));
	ob_start();?>		<?php if(!empty($title)): ?>	
	                    	<div class="section-header <?php echo !empty($type)? 'v2' : 'v1'; ?>">
        						<h3><?php echo esc_attr( $title ); ?></h3>
        						<div class="border-bottom"></div>
        					</div>
        				<?php endif; ?>
        					<div class="bar-container-wrap ovh skills">	 
        					<?php echo do_shortcode(shortcode_unautop($content)) ?>
        					</div>               
    <?php return ob_get_clean();
};
add_shortcode('tt_skill', 'tt_skill');

function tt_skill($atts, $content) {
	extract(shortcode_atts(array(
				'skill' => '',
				'percentage' => 0
					), $atts));
	ob_start();?>					
	                    <div class="bar-main-container">
	                        <div class="wrap">
	                            <p class="entry-title"><?php echo esc_attr( $skill ); ?></p>
	                            <div class="bar-container">
	                                <div class="bar"></div>
	                                <div class="bar-percentage" data-percentage="<?php echo esc_attr( $percentage ) ?>"></div>
	                            </div>
	                        </div>
	                    </div>	                
    <?php return ob_get_clean();
};
/* Shorcode Skils (About Page)
============================================*/
add_shortcode('tt_skills_2', 'tt_skills_2');

function tt_skills_2($atts, $content) {
	extract(shortcode_atts(array(
				'title' => '',
					), $atts));
	ob_start();?>	<!-- === Skills Container === -->
					<div class="skills-container">
						<div class="row"> 
						<?php echo do_shortcode( $content ); ?>
						</div>
					</div>            
    <?php return ob_get_clean();
};
add_shortcode('tt_skill_2', 'tt_skill_2');

function tt_skill_2($atts, $content) {
	extract(shortcode_atts(array(
				'title' => '',
				'description' => 0,
				'color' =>'',
				'icon' => ''
					), $atts));
	ob_start();?>					
	                    <div class="col-xs-4 col-sm-2">
							<div class="skill-item" style="background: <?php echo esc_attr( $color ); ?>;">
								<h5><?php echo esc_attr( $title ); ?></h5>
								<p><?php echo esc_attr( $description ); ?></p>
								<i class="fa fa-<?php echo esc_attr( $icon ) ?>"></i>
							</div>
						</div>
    <?php return ob_get_clean();
};

/* Shorcode Pricing (About Page)
============================================*/

add_shortcode('tt_pricing', 'tt_pricing');

function tt_pricing($atts, $content) {
	extract(shortcode_atts(array(
				'type' =>'',
				'title' => '',
				'description' => '',
				'bg_url' => '',
				'btn_1' => '',
				'btn_2' => '',
				'url_1' => '#',
				'url_2' => '#'
					), $atts));
	global $p_count;
	$p_count = 0;
	ob_start();?>
		<?php get_template_part( 'theme_includes/container' , 'close' ); ?>
		    <section class="pricing" style="background: url(<?php echo esc_attr( $bg_url ); ?>)">
				<div class="section-header <?php echo !empty($type)? 'v2' : 'v1'; ?>">
					<div class="container">
						<h3><?php echo esc_attr( $title ); ?></h3>
						<div class="border-bottom"></div>
						<p><?php echo esc_attr( $description ) ?></p>
						<?php if(!empty($btn_1)):?>
						<div class="prices">
							<a href="<?php echo esc_attr( $url_1 ); ?>"><?php echo esc_attr( $btn_1 ); ?></a>
							<?php if(!empty($btn_2)): ?>
							<i class="fa fa-plus"></i>
							<?php endif; ?>
							<a href="<?php echo esc_attr( $url_2 ); ?>"><?php echo esc_attr( $btn_2 ); ?></a>
						</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="body-wrapper">
					<div class="container">
						<div class="row"><?php echo do_shortcode( $content ); ?>
						</div>
					</div>
				</div>
			</section>
		<?php get_template_part( 'theme_includes/container' , 'open' ); ?>
		<?php return ob_get_clean();
};

add_shortcode('tt_pricing_item', 'tt_pricing_item');

function p_item_count(){
	global $p_count;
	$p_count++;
};

function tt_pricing_item($atts, $content) {
	extract(shortcode_atts(array(
				'title' => '',
				'description'=>'',
				'size' => '',
				'btn' => 'BUY IT',
				'url' => '#',
				'class' => ''
					), $atts));
	switch ($size) {
		case $size < 1:
			$size = 1;
			break;
		case $size <= 12 :
			$size = $size;
			break;
		case $size > 12:
			$size = 12;
			break;		
		default:
			$size = 2;
			break;
	}
	p_item_count();
	global $p_count;
	$delay = $p_count * 0.2;
	ob_start();?>
   				<div class="col-xs-12 col-md-<?php echo esc_attr( $size );?> pricing-item wow bounceInUp"  data-wow-delay="<?php echo esc_attr( $delay ) ?>s">
					<div class="<?php echo esc_attr( $class ); ?>-pack">
						<div class="pricing-item-header">
							<h5><?php echo esc_attr( $title ); ?></h5>							
							<p><?php echo html_entity_decode($description); ?></p>
						</div>
						<div class="pricing-item-body"><?php echo do_shortcode(shortcode_unautop($content)) ?></p>
							<a href="<?php echo esc_attr( $url ); ?>"><?php echo esc_attr( $btn ); ?></a>
						</div>
					</div>
				</div>
    <?php return ob_get_clean();
};

/* Shorcode Quote (Home Page)
============================================*/
add_shortcode('tt_quote', 'tt_quote');

function tt_quote($atts, $content) {
	extract(shortcode_atts(array(
				'author' => '',
				'url' => '#',
					), $atts));
	ob_start();?>
					<blockquote>
						<p><?php echo do_shortcode( $content ); ?><br />
						<cite><a href="<?php echo esc_attr( $url ); ?>"><?php echo esc_attr( $author ); ?></a></cite>
						</p>
					</blockquote>
    <?php return ob_get_clean();
};	

/* Shorcode Work (Service Page)
============================================*/
add_shortcode('tt_work', 'tt_work');

function tt_work($atts, $content) {
	extract(shortcode_atts(array(
				'bg_url' => '',
				'bg_url_2'=>''
					), $atts));
	global $c_left;
	global $c_right;
	$c_left = 0;
	$c_right = 0;
	ob_start();?>
			<?php get_template_part( 'theme_includes/container' , 'close' ); ?>
				<section class="services" style="background: url(<?php echo esc_attr( $bg_url ) ?>) top center; background-size: cover;">
					<div class="services-wrapper">
						<div class="container">
							<div class="phone-wrapper wow bounceInUp" data-wow-delay="0.2s">
								<img src="<?php echo esc_attr( $bg_url_2 ) ?>" alt="img" />
							</div>
						<?php echo do_shortcode( $content ) ?>
							</div>
						</div>
					</div>
				</section>
			<?php get_template_part( 'theme_includes/container' , 'open' ); ?>
    <?php return ob_get_clean();
};
function count_left(){
	global $c_left;
	$c_left++;
};
function count_right(){
	global $c_right;
	$c_right++;
};

/* Shorcode Work Left (Service Page)
============================================*/
add_shortcode('tt_work_left', 'tt_work_left');

function tt_work_left($atts, $content) {
	extract(shortcode_atts(array(
				'title' => '',
				'icon' => ''
					), $atts));
	global $c_left;
	$delay = $c_left * 0.2;
	count_left();
	ob_start();?>
				<div class="services-item wow slideInLeft" data-wow-delay="<?php echo esc_attr( $delay ); ?>">
					<i class="icon-<?php echo esc_attr( $icon );?>"></i>
					<div class="services-item-header">
						<h4><?php echo esc_attr( $title ) ?></h4>
					</div>
					<p><?php echo do_shortcode( $content ); ?></p>
				</div>
    <?php return ob_get_clean();
};

/* Shorcode Work Right (Service Page)
============================================*/
add_shortcode('tt_work_right', 'tt_work_right');

function tt_work_right($atts, $content) {
	extract(shortcode_atts(array(
				'title' => '',
				'icon' => ''
					), $atts));
	global $c_right;
	$delay = $c_right * 0.2;
	count_right();
	ob_start();?>
				<div class="services-item wow slideInRight" data-wow-delay="<?php echo esc_attr( $delay ); ?>">
					<i class="icon-<?php echo esc_attr( $icon );?>"></i>
					<div class="services-item-header">
						<h4><?php echo esc_attr( $title ) ?></h4>
					</div>
					<p><?php echo do_shortcode( $content ); ?></p>
				</div>
    <?php return ob_get_clean();
};

/* Shorcode History (About Page)
============================================*/

add_shortcode('tt_history', 'tt_history');

function tt_history($atts, $content) {
	extract(shortcode_atts(array(
				'title' => '',
				'description'=> ''
					), $atts));
	global $h_count;
	$h_count = 0;
	ob_start();?>
				<div class="history">
					<div class="caption">
						<h4><?php echo esc_attr( $title ) ?></h4>
						<p><?php echo esc_attr( $description ); ?></p>
					</div>

					<!-- == Start History Box == -->
					<div class="history-box">
						<ul>
						<?php echo do_shortcode( $content ) ?>
						</ul>
					</div>
				</div>
		<?php return ob_get_clean();
};

add_shortcode('tt_history_item', 'tt_history_item');

function h_item_count(){
	global $h_count;
	$h_count++;
};

function tt_history_item($atts, $content) {

	h_item_count();
	global $h_count;
	ob_start();?>
				<li>
					<div class="li-info">
						<div class="icon">
							<i class="fa fa-dot-circle-o"></i>
							<i class="fa fa-caret-right"></i>
						</div>
						<span><?php echo romanNumerals($h_count) ?></span>
					</div>
					<p><?php echo do_shortcode( $content ); ?></p>
				</li>
    <?php return ob_get_clean();
};


/* Shorcode Offerts (Home Page)
============================================*/

add_shortcode('tt_offerts', 'tt_offerts');

function tt_offerts($atts,$content) {

		ob_start();?>
				<?php get_template_part( 'theme_includes/container' , 'close' ); ?>
					<section class="main-offer">
						<div class="container">
							<div class="row"><?php echo do_shortcode( $content ) ?></div>
						</div>
					</section>
				<?php get_template_part( 'theme_includes/container' , 'open' ); ?>
	<?php return ob_get_clean();
};

add_shortcode('tt_of_item', 'tt_of_item');

function tt_of_item($atts, $content) {
	extract(shortcode_atts(array(
				'title' => '',
				'description' => '',
				'class' => '',
				'link' => '',
				'button' => '',
				'size' => ''
					), $atts));
switch ($size) {
	case '1':
		$sm = 12; $md = 8;
		break;
	case '2':
		$sm = 12; $md = 6;
		break;
	case '3':
		$sm = 12; $md = 4;
		break;
	case '4':
		$sm = 6; $md = 3;
		break;	
	default:
		$sm = 6; $md = 3;
		break;
}
		return 	'<div class="col-xs-12 col-sm-'. esc_attr($sm) .' col-md-'. esc_attr($md) .'">
					<div class="offer-item">
						<div class="icon">
							<i class="icon-' . $class . '"></i>
						</div>
						<div class="title">
							<h6>' . $title . '</h6>
							<p>' . $description .'</p>
						</div>
						<p class="description">' . do_shortcode( $content ) . '</p>
						<a href="' . $link . '" class="view-details-button">' . $button . '</a>
						</div>
				</div>';
};