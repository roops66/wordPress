<?php 
$page_id = tt_get_page_id();
get_header(); ?>

<?php if(have_posts()) : the_post(); ?>
	
	<?php echo Tesla_slider::get_slider_html('motive_portfolio','','single',get_the_ID()); ?>
	<section class="comments-area">
		<section class="container">
			<?php comments_template(); ?>
		</section>    
	</section>
<?php endif; ?>

<?php get_footer(); ?>