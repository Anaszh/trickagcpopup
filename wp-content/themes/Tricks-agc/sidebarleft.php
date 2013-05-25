<div style="margin:0; padding:0 10px 0 0px; width:130px;float:left;" >

<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?><?php endif; ?>
<div class="box">
<?php
if(is_search()){
echo spp(get_search_query(), 'sidebar.html','');
}

?>	
</div>

</div>

