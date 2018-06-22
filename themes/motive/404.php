<?php get_header(); ?>
<!-- ========================= START CONTENT ======================== --> 
<section class="content">
	<!-- ===== Start Jumbotron ===== -->
	<?php if(_go('error_404')):
		$url = _go('error_404');
		$background = 'url('.$url.')';
		elseif(_go('back_color')):
		$background = _go('back_color');
		else:
		$background = '#147a93';
		endif; ?>
	<div class="jumbotron" style="background: <?php echo esc_attr($background );?>; background-size: cover;">
		<div class="jumbotron-content">
			<div class="error-wrapper">
				<div class="border-top hidden-xs"></div>
				<h1 class="oops"><?php _ex('Oops','404 page title','motive') ?>
				</h1>
				<div class="border-top hidden-xs"></div>
				<h1><?php if (_go('error_title')) _eo('error_title'); else _e('404 Page','motive') ?></h1>
				<h4><?php if (_go('error_message')) _eo('error_message'); else _e('I think we are lost, let\'s search again!','motive') ?></h4>
			</div>
			<?php get_search_form(); ?>
		</div>
	</div>
</section>
<!-- ========================= END CONTENT ======================== -->
<?php get_footer(); ?>