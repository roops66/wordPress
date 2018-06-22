<?php 
$item_nr = !empty($shortcode['nr'])? $shortcode['nr'] : count($slides);
$layout = $shortcode['layout'];
$columns = $shortcode['columns'];
$type = $shortcode['type'];
	switch ($columns) {
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
			$sm = 6; $md = 3; $columns = 4;
			break;
	}
 ?>
<?php if($layout == 'accordion'): ?>
<!-- === Accordion Container === -->
	<div class="info-accordion">
		<div class="panel-group" id="accordion">
		<?php foreach($slides as $i => $slide): ?>
		<?php global $post;
			if($i >= $item_nr){ break; } 					
			$post = $slide['post'];
			setup_postdata( $post );?>

	        <div class="panel panel-default">
	            <div class="panel-heading">
	                <h4 class="panel-title">
	                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo esc_attr( $i )?>"><?php the_title() ?></a>
	                </h4>
	            </div>
	            <div id="collapse<?php echo esc_attr( $i )?>" class="panel-collapse collapse <?php echo $i == '0'? 'in' : ''; ?>">
	                <div class="panel-body">
	                    <?php the_content() ?>
	                </div>
	            </div>
	        </div>
		<?php endforeach; ?>
		<?php wp_reset_postdata(); ?> 
	    </div>
	</div>
<?php else: ?>
	<?php foreach($slides as $i => $slide): ?>
		<?php global $post;
			if($i >= $item_nr){ break; } 					
			$post = $slide['post'];
			setup_postdata( $post );?>		
			<div class="col-xs-12 col-sm-<?php echo esc_attr( $sm ) ?> col-md-<?php echo esc_attr( $md )?>">
			<?php if($type == '2'): ?>
				<div class="service v2">
					<div class="service-header">
						<a class="icon" href="<?php echo esc_attr( $slide['options']['url']) ?>"><?php echo esc_attr( $i + 1 );?>. <i class="fa fa-<?php echo esc_attr( $slide['options']['icon'] ) ?>"></i></a>
						<h4 class="caption"><?php the_title() ?></h4>
					</div>
					<p class="text"><?php the_content() ?></p>
				</div>
			<?php else: ?>
				<div class="service v1">
					<div class="icon">
						<a href="<?php echo esc_attr( $slide['options']['url']) ?>"><i class="fa fa-<?php echo esc_attr( $slide['options']['icon'] ) ?>"></i></a>
					</div>
					<div class="caption">
						<h4><?php the_title( ); ?></h4>
					</div>
					<div class="text">
						<p><?php the_content() ?></p>
					</div>	
				</div>
			<?php endif; ?>
			</div>
			<?php if(($i + 1) % $columns == 0 && ($i + 1) < count($slides)): ?>
				</div>
				<div class="row">
			<?php endif ?>
		<?php endforeach; ?>
	<?php wp_reset_postdata(); ?>
<?php endif; ?>