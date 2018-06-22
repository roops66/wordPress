<?php 
wp_reset_postdata();
if(comments_open( ) || have_comments()) : ?>
<div class="comments-area">
	<?php if ( post_password_required() ) : ?>
				<p><?php _e( 'This post is password protected. Enter the password to view any comments ', 'motive' ); ?></p>
			</div>

		<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
		endif;?>
	<?php 
		$args = array(
		'fields' => apply_filters( 'comment_form_default_fields', array(
			'author' => '<input class="comments-line" name="author" type="text" value="' . esc_attr( $commenter[ 'comment_author' ] ) . '" aria-required="true" placeholder="'.__('Name','motive').'">',
			'email' => '<input class="comments-line" name="email" type="text" value="' . esc_attr( $commenter[ 'comment_author_email' ] ) . '" aria-required="true" placeholder="'.__('E-mail','motive').'">',
			'url' => '<input class="comments-line" name="url" type="text" placeholder="'.__('Website','motive').'" value="' . esc_attr( $commenter[ 'comment_author_url' ] ) . '"> '
				)
		),
		'comment_notes_after' => '',
		'comment_notes_before' => '',
		'title_reply' => _x('Leave a reply','comment-form','motive'),
		'comment_field' => '<div class="line-cover"><textarea name="comment" class="comments-area-field"></textarea></div>',
		'comment_field' => '<textarea class="comments-linearea" name="comment" placeholder="'.__('Comment','motive').'"></textarea>',
		'class_submit' => 'submit-button',
		'label_submit' => _x('Comment','comment-form','motive')
	);
	comment_form( $args );
	?>
	
	<?php if ( have_comments() ) : ?>
		<div class="comment-area">
			<h3 class="comment-title"><?php comments_number( __('No Comments','motive'), __('1 Comment','motive'), '% '.__('Comments','motive') ); ?></h3>
			<div class="comments_navigation page-numbers center">
				<?php paginate_comments_links(); ?>
			</div>
			<ul class="ul-comments">
				<?php wp_list_comments( array( 'callback' => 'tt_custom_comments' , 'avatar_size'=>'64','style'=>'ul') ); ?>
			</ul>
		</div>	
	<?php endif; ?>
</div>
<?php endif; ?>