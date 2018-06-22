<?php 

$format = get_post_format( get_the_ID() );
switch ($format) {
	case 'video':
		$format = $format;
		break;
	case 'audio':
		$format = $format;
		break;
	case 'gallery':
		$format = $format;
		break;	
	default:
		$format = 'standart';
		break;
}
?>

<div <?php post_class('post');?> id="post-<?php the_ID(); ?>">

<?php
	get_template_part('post_format/header', $format );?>
	<!-- === Start Post Title === -->
	<div class="post-header">
		<div class="date">
			<h4><?php the_time('d') ?></h4>
			<p><?php the_time('F') ?></p>
		</div>
		<div class="details">
			<h3><a href="<?php the_permalink(); ?>"> <?php the_title() ?> </a></h3>
			<a href="<?php the_permalink() ?>">
				<p class="user"><i class="icon-user4"></i> <?php _e('By ','motive') ?><?php the_author( ) ?> &nbsp; //</p>
			</a>
			<p class="categories"><i class="icon-pushpin"></i> <?php the_category(', ') ?> &nbsp; //</p>
		<?php if(has_tag( )): ?>
			<p class="tags"><i class="icon-tags"></i> <?php the_tags(', ') ?>&nbsp;//</p>
		<?php endif; ?>
			<p class="comments"><i class="icon-bubbles2"></i> <?php _e('Comments','motive') ?>&nbsp;(<?php comments_number( '0', '1', '%' ) ?>)&nbsp; //</p>
			<a class="d-text-c-h like-button" href="#" data-post="<?php the_ID(); ?>">	
				<p class="likes"><i class="icon-heart3"></i> <?php _e('Likes','motive') ?> &#40;<span><?php echo get_post_meta( get_the_ID(), 'motive_likes', true ) ? get_post_meta(get_the_ID(), 'motive_likes', true): '0'; ?></span>&#41; &nbsp; //</p>			
			</a>
		</div>
	</div>
	<!-- === Start Post Body === -->
	<div class="post-body">
		<?php the_content() ?>
		<div class="row pagination-links">
			<div class="col-xs-12">
				<?php wp_link_pages(array(
					'before'           => '<ul class="page-numbers"><li>',
					'after'            => '</li></ul>',
					'link_before'      => '',
					'link_after'       => '',
					'next_or_number'   => 'number',
					'separator'        => '</li><li>',
					'nextpagelink'     => __( 'Next page','motive' ),
					'previouspagelink' => __( 'Previous page','motive' ),
					'pagelink'         => '%',
					'echo'             => 1
				)); ?>
			</div>
		</div>
	</div>
	<?php tt_share('post'); ?>

	<!-- === Start Project Pagination === -->
	<div class="project-pagination">
		<a href="<?php echo get_permalink(get_adjacent_post(false,'',true)); ?>"><i class="fa fa-long-arrow-left"></i><?php _ex(' Prev post','Single post Pagination','motive') ?></a>
		<span></span>
		<a href="<?php echo get_permalink(get_adjacent_post(false,'',false)); ?>"><?php _ex('Next post ','Single post Pagination','motive') ?><i class="fa fa-long-arrow-right"></i></a>
	</div>
	
	<?php if ( _go('show_related_posts')):
		get_template_part('related','posts');
	endif; ?>