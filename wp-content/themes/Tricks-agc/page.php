<?php get_header(); ?>
<!-- BEGIN: CONTENT -->
<div id="content">

<?php include (TEMPLATEPATH . '/banner.php'); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" class="post">

<!-- google_ad_section_start -->
<h2><?php the_title(); ?></h2>
<div class="info">
	<span class="date"><?php the_time(__('F jS, Y', 'inove')) ?></span>
	<span class="author"><?php the_author_posts_link(); ?></span>
	<?php edit_post_link(__('Edit', ''), '<span class="editpost">', '</span>'); ?>
	<span class="comments">
	<?php comments_number('<strong>0</strong> Comments', '<strong>1</strong> Comment', '<strong>%</strong> Comments'); ?></span>
	<div class="clr"></div>
</div>
<!-- google_ad_section_end -->
<?php include (TEMPLATEPATH . '/adsense-content1.php'); ?>

<!-- google_ad_section_start -->
<?php the_content("Read more..."); ?>
<!-- google_ad_section_end -->

<?php include (TEMPLATEPATH . '/adsense-content2.php'); ?>

<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

<div class="under">
	<span class="categories"><?php the_category(', '); ?></span>
</div>

<span class="article_seperator">&nbsp;</span>
<?php include (TEMPLATEPATH . '/bookmark.php'); ?>
<span class="article_seperator">&nbsp;</span>

<div id="related_posts">
<h4>Related Article</h4>

<?php if(function_exists('st_related_posts')) st_related_posts('number=7&title=&include_page=false&xformat=<a href="%permalink%" title="%title% (%date%)">%title%</a>'); ?>
</div>
<span class="article_seperator">&nbsp;</span>

<?php comments_template(); ?>
</div>

<div id="postnavi">
	<div class="prev"><?php previous_post_link('%link') ?></div>
	<div class="next"><?php next_post_link('%link') ?></div>
	<div class="clr"></div>
</div>

<?php endwhile; endif; ?>

</div>
<!-- END: CONTENT -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>