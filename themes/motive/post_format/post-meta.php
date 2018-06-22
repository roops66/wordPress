<!-- === Start Post Header === -->
	<div class="post-header">
		<div class="date">				
			<h4><a href="<?php the_permalink() ?>"><?php the_time('d') ?></a></h4>
			<p><a href="<?php the_permalink() ?>"><?php the_time('F') ?></a></p>
		</div>
		<div class="details">
			<h3><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
			<a href="<?php the_permalink() ?>">
				<p class="user"><i class="icon-user4"></i> <?php _e('By ','motive') ?><?php the_author( ) ?>&nbsp;//</p>
			</a>
			<p class="categories"><i class="icon-pushpin"></i> <?php the_category(', ') ?>&nbsp;//</p>
		<?php if(has_tag( )): ?>
			<p class="tags"><i class="icon-tags"></i> <?php the_tags(', ') ?>&nbsp;//</p>
		<?php endif; ?>
			<p class="comments"><i class="icon-bubbles2"></i> <?php _e('Comments','motive') ?>&nbsp;(<?php comments_number( '0', '1', '%' ) ?>)&nbsp;//</p>
			<a class="d-text-c-h like-button" href="#" data-post="<?php the_ID(); ?>">	
				<p class="likes"><i class="icon-heart3"></i> <?php _e('Likes','motive') ?> (<span><?php echo get_post_meta( get_the_ID(), 'motive_likes', true ) ? get_post_meta(get_the_ID(), 'motive_likes', true): '0'; ?></span>)&nbsp;//</p>			
			</a>
		</div>
	</div>

	<!-- === Start Post Body === -->
	<div class="post-body">
		<?php the_excerpt() ?>
		<a href="<?php the_permalink() ?>" class="view-details-button"><?php _e('View','motive') ?></a>
	</div>
</div>