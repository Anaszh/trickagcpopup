<div id="sidebarwrap"><div style="margin:0; padding:0" >

<?php include (TEMPLATEPATH . '/subscribe.php'); ?>

<div class="subscribe"><div style="background:#444;text-align:center;padding:5px;margin-bottom:0px;"><?php include (TEMPLATEPATH . '/adsense-search.php'); ?></div></div>
<div class="module"><div class="sponsor"><?php include (TEMPLATEPATH . '/125.php'); ?></div></div>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?><?php endif; ?>
<div style="width=300px;"> <?php include (TEMPLATEPATH . '/sidebarleft.php'); ?><?php include (TEMPLATEPATH . '/sidebarright.php'); ?><div class="clr"></div></div>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(4) ) : else : ?><?php endif; ?>
</div></div>