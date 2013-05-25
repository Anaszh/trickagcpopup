<?php $edit = array ('-' , '/' , '.html');
$sumber = str_replace($edit, ' ', $_SERVER['REQUEST_URI']);
?>
<?php
// Get RSS Feed(s)
include_once(ABSPATH . WPINC . '/feed.php');
 
$query = $sumber ;
$rss = fetch_feed('http://www.bing.com/search?q=' . str_replace(' ', '+', $query) . '&go=&form=QBLH&filt=all&format=rss');
 
if (!is_wp_error( $rss ) ) : // Checks that the object is created correctly
// Figure out how many total items there are, but limit it to 10.
$maxitems = $rss->get_item_quantity(5);
 
// Build an array of all the items, starting with element 0 (first element).
$rss_items = $rss->get_items(0, $maxitems);
endif;
 
?>
<?php if ($maxitems == 0) 
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
?><b><a href=<?php bloginfo('url'); ?>/search/<?php echo $link; ?>><?php echo htmlentities($item->get_title(), ENT_COMPAT, 'UTF-8'); ?></a></b><p><?php echo $item->get_description(); ?></p>
<?php endif; endforeach; ?><br/>