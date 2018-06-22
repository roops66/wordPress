<?php $post_id = get_the_ID();
!empty($_COOKIE['motive_likes_'. $post_id])? $cl_liked = ' liked': $cl_liked = '';  ?>
<!-- === Start Post with Testimonial === -->
<div class="testimonial-post post">
    <!-- === Start Post Cover === -->                                
    <div class="post-cover">
        <blockquote>
			<?php the_excerpt(' '); ?>
        </blockquote>
    </div>
<?php get_template_part('post_format/post' , 'meta') ?>