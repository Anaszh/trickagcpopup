<!-- google_ad_section_start -->
<h2><a class="title" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<div class="info">
	<span class="date"><?php the_time(__('F jS, Y', 'inove')) ?></span>
	<span class="author"><?php the_author_posts_link(); ?></span>
	<?php edit_post_link(__('Edit', ''), '<span class="editpost">', '</span>'); ?>
	<span class="comments">
	<?php comments_number('<strong>0</strong> Comments', '<strong>1</strong> Comment', '<strong>%</strong> Comments'); ?></span>
	<div class="clr"></div>
</div>
<!-- google_ad_section_end -->
