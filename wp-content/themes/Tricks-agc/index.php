<?php get_header(); ?>

<!-- BEGIN: CONTENT -->
<div id="content">

<?php include (TEMPLATEPATH . '/banner.php'); ?>
<?php if (have_posts()) : ?>
<?php $count = 1; ?>
<?php while (have_posts()) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" class="post">

<?php include ("title.php"); ?>

<!-- google_ad_section_start -->
<p><?php echo truncate($post->post_content,300); ?></p>
<!-- google_ad_section_end -->

<?php if ($count == 1) : ?>
	<?php include (TEMPLATEPATH . '/adsense-front.php'); ?>
<?php endif; $count++; ?>

<div class="under">
	<span class="categories"><?php the_category(', '); ?></span>
	<span class="more"><a href="<?php the_permalink()?>">[ Read More ]</a></span>
</div>
 

</div>
<?php endwhile; ?>

	<center><?php //include (TEMPLATEPATH . '/ads-home-2.php'); ?></center>

<div id="pagenavi">
	<?php if(function_exists('wp_pagenavi')) : ?>
		<?php wp_pagenavi('', '', '', '', 7, false); ?>
	<?php else : ?>
		<span class="older"><?php next_posts_link(__('Older Entries', '')); ?></span>
		<span class="newer"><?php previous_posts_link(__('Newer Entries', '')); ?></span>
	<?php endif; ?>
	<div style="clear:both;"></div>
</div>

<?php else : ?>

<h2 class="center">Not Found</h2>
<p class="center">Sorry, but you are looking for something that isn't here.</p>

<?php endif; ?>

</div>
<!-- END: CONTENT -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>