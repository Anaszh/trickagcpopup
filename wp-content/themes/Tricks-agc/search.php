<?php get_header(); ?>
<?php //include (TEMPLATEPATH . '/leftbar.php'); ?>

<!-- BEGIN: CONTENT -->
<div id="content">

<?php include (TEMPLATEPATH . '/banner.php'); ?>

<?php if (have_posts()) : ?>
<a href="<?php bloginfo('home'); ?>">Home</a> &raquo; <a href="<?php echo "$bloginfo" ?>">Archives</a> &raquo; <?php the_search_query(); ?>
<h1 class="postTitle"><a href="<?php echo "$bloginfo" ?>"><?php the_search_query(); ?></a></h1>
<?php include (TEMPLATEPATH . '/adsense-front.php'); ?>

<?php while (have_posts()) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" class="post">
<?php echo spp(get_search_query());?>
<!-- google_ad_section_start -->
<h3><a class="title" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
<div class="info">
	<span class="date"><?php the_time(__('F jS, Y', 'inove')) ?></span>
	<span class="author"><?php the_author_posts_link(); ?></span>
	<?php edit_post_link(__('Edit', ''), '<span class="editpost">', '</span>'); ?>
	<span class="comments">
	<?php comments_number('<strong>0</strong> Comments', '<strong>1</strong> Comment', '<strong>%</strong> Comments'); ?></span>
	<div class="clr"></div>
</div>
<!-- google_ad_section_end -->

<!-- google_ad_section_start -->
<p><?php echo truncate($post->post_content,300); ?></p>
<!-- google_ad_section_end -->

<div class="under">
	<span class="categories"><?php the_category(', '); ?></span>
	<span class="more"><a href="<?php the_permalink()?>">[ Read More ]</a></span>
</div>

</div>
<?php endwhile; ?>

<div id="pagenavi">
	<?php if(function_exists('wp_pagenavi')) : ?>
		<?php wp_pagenavi() ?>
	<?php else : ?>
		<span class="older"><?php next_posts_link(__('Older Entries', '')); ?></span>
		<span class="newer"><?php previous_posts_link(__('Newer Entries', '')); ?></span>
	<?php endif; ?>
	<div class="fixed"></div>
</div>

<?php else : ?>
<a href="<?php bloginfo('home'); ?>">Home</a> &raquo; <a href="<?php echo "$bloginfo" ?>">Archives</a> &raquo; <?php the_search_query(); ?>
<h1 class="postTitle"><a href="<?php echo "$bloginfo" ?>"><?php the_search_query(); ?></a></h1>
<h2>Related Articles <?php the_search_query(); ?></h2>
<div id="post"><?php $edit = array ('-' , '/' , '.html');
$sumber = str_replace($edit, ' ', $_SERVER['REQUEST_URI']);
?>
<?php
// Get RSS Feed(s)
include_once(ABSPATH . WPINC . '/feed.php');
 
$query = $sumber ;
$rss = fetch_feed('http://www.bing.com/search?q=' . str_replace(' ', '+', $query));
 
if (!is_wp_error( $rss ) ) : // Checks that the object is created correctly
// Figure out how many total items there are, but limit it to 10.
$maxitems = $rss->get_item_quantity(10);
 
// Build an array of all the items, starting with element 0 (first element).
$rss_items = $rss->get_items(0, $maxitems);
endif;
 
?><?php if ($maxitems == 0) 
echo ' ';
else

// Loop through each feed item and display each item as a hyperlink.
foreach ( $rss_items as $item ) : ?>
<?php 
$url_separator = '-';
$link = strtolower($item->get_title());
$link = preg_replace('/([^a-z0-9]+)/i', $url_separator, $link);
$link = trim($link, $url_separator);
if ($link != '') :
?>

<h3><a class="title" href="<?php echo $item->get_permalink(); ?>" target="_blank" rel="nofollow"><?php echo htmlentities($item->get_title(), ENT_COMPAT, 'UTF-8'); ?></a></h3>
<div class="info"></div><p><?php echo $item->get_title(); ?><?php echo $item->get_description(); ?></p><div class="under"><a href=<?php bloginfo('url'); ?>/search/<?php echo $link; ?>><?php echo $item->get_title(); ?></a></div><div class="clr"></div>
<?php endif; endforeach; ?></div>

<?php endif; ?></div>
<!-- END: CONTENT -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>