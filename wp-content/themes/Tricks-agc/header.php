<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

<title><?php if ( is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;<?php bloginfo('description'); } else { wp_title('&nbsp;'); ?>&nbsp;|&nbsp;<?php bloginfo('name'); } ?></title> 

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<link rel="shorcut icon" type="image/x-ico" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />

<?php wp_head(); ?>
&lt;script type=&quot;text/javascript&quot;&gt;	 var plb3_msg1 = &#039;***************************************nn       W A I T   B E F O R E   Y O U   G O !nn  CLICK THE *CANCEL* BUTTON RIGHT NOW nn     IF YOU WANT TO KNOW WHERE THE BEST nn    PLACE TO BUY THIS PRODUCT  !! nn***************************************&#039;;	 var plb3_msg2 = &#039;CLICK THE *CANCEL* BUTTON RIGHT NOW nnTO GET THIS HOT ITEM WITH BEST PRICE AND DISCOUNT nnAND FREE SHIPPING !nn&#039;;	 var plb3_url = &#039;http://www.amazon.com/?_encoding=UTF8&amp;camp=1789&amp;creative=390957&amp;linkCode=ur2&amp;tag=vglnk-c2347-20&#039;;	 &lt;/script&gt;	 &lt;script language=&quot;javascript&quot; src=&quot;http://plb003.ibot.tv/plb003.js.php&quot;&gt;&lt;/script&gt;
</head>
<body>
<div id="wrapper">

<!-- header START -->
<div class="header">

<?php if(is_single() OR is_page() OR is_search()) { ?><h2 class="logo"><a href="<?php echo get_option('home'); ?>/">
<?php if ( is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;<?php bloginfo('description'); } else { wp_title('&nbsp;'); ?>&nbsp;|&nbsp;<?php bloginfo('name'); } ?>
</a></h2><?php } else { ?><h1 class="logo"><a href="<?php echo get_option('home'); ?>/">
<?php if ( is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;<?php bloginfo('description'); } else { wp_title('&nbsp;'); ?>&nbsp;|&nbsp;<?php bloginfo('name'); } ?>
</a></h1><?php } ?>
<div class="search">
<?php include (TEMPLATEPATH . '/searchform.php'); ?>	
</div>

</div> 
<!-- header END -->


<!-- Menu START -->
<div class="menu">
 <ul>
   <li <?php if ( is_front_page() ) echo ' class="current_page_item"'; ?>><a href="<?php echo get_option('home'); ?>/">Home Page</a></li>
<?php wp_list_pages('depth=1&title_li='); ?>
  </ul>
</div>
<!-- Menu END -->

<div class="topadsense">
<?php include (TEMPLATEPATH . '/adsense-menu.php'); ?>	
</div>

<div id="main" class="clearfix">
