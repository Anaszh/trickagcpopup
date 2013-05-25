<?php ob_start(); ?>



<?php header("HTTP/1.1 200 OK "); ?>



<?php header("Status: 200 OK "); ?>



<?php







define('BING_API_KEY', '');







function pete_curl_get($url, $params)







{







$post_params = array();







foreach ($params as $key => &$val) {







  if (is_array($val)) $val = implode(',', $val);







$post_params[] = $key.'='.urlencode($val);







}







$post_string = implode('&', $post_params);







$fullurl = $url."?".$post_string;







$ch = curl_init();







curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);







    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);







curl_setopt($ch, CURLOPT_URL, $fullurl);







curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);







curl_setopt($ch, CURLOPT_USERAGENT, 'msnbot/1.0 (+http://search.msn.com/msnbot.htm)');







$result = curl_exec($ch);







curl_close($ch);







return $result;







}







function perform_bing_web_search($termstring)







{







$searchurl = 'http://api.bing.net/json.aspx?';







$searchurl .= 'AppId='.'76371219B642AE50E43D37DA9098F09CD0FBDC39';







$searchurl .= '&Query='.urlencode($termstring);







$searchurl .= '&Sources=Web';







$searchurl .= '&Web.Count=5';







$searchurl .= '&Web.Offset=0';







$searchurl .= '&Web.Options=DisableHostCollapsing+DisableQueryAlterations';







$searchurl .= '&JsonType=raw';







$response = pete_curl_get($searchurl, array());







$responseobject = json_decode($response, true);







if ($responseobject['SearchResponse']['Web']['Total']==0)







return array();







$allresponseresults = $responseobject['SearchResponse']['Web']['Results'];







$result = array();







foreach ($allresponseresults as $responseresult)







{







$result[] = array(







'url' => $responseresult['Url'],







'title' => $responseresult['Title'],







'abstract' => $responseresult['Description'],







);







}







return $result;







}











if (isset($_REQUEST['q'])) {



	$termstring = urldecode($_REQUEST['q']);



} else {



	$termstring = '';



}







get_header(); ?>

<!-- BEGIN: CONTENT -->
<div id="content">
<?php include (TEMPLATEPATH . '/banner.php'); ?>
<h2><?php echo CleanFileNameTitle($title) ?></h2>


<script type="text/javascript"><!--
google_ad_client = "pub-6501756347319501";
/* 336x280, dibuat 10/02/04 */
google_ad_slot = "2293782692";
google_ad_width = 336;
google_ad_height = 280;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>








<?php



   function CleanFileName($result ){



    $result = str_replace('&#8230', '',$result);



    $result = str_replace(' &#8211', '',$result);



    $result = str_replace(' ? ', '+',$result);



    $result = str_replace('&#8211', '+',$result);



    $result = str_replace('&#39', '', $result);



    $result = str_replace(' | ', '+', $result);



    $result = str_replace(' |', '', $result);



    $result = str_replace('| ', '', $result);



    $result = str_replace(' -', '', $result);



    $result = str_replace('- ', '', $result);



    $result = str_replace('-', '+', $result);



    $result = str_replace(' ~', '', $result);



    $result = str_replace('~ ', '', $result);



    $result = str_replace('~', '+', $result);



    $result = str_replace(' : ', '+', $result);



    $result = str_replace(' ?', '', $result);



    $result = str_replace(' ?', '', $result);



    $result = str_replace('<', '', $result);



    $result = str_replace('>', '', $result);



    $result = str_replace('(', '', $result);



    $result = str_replace(')', '', $result);



    $result = str_replace('/ ', '+', $result);



    $result = str_replace(' /', '', $result);



    $result = str_replace('& ', '', $result);



    $result = str_replace(' &#58', '', $result);



    $result = str_replace('&#58 ', '', $result);



    $result = str_replace('.com', '+com', $result);



    $result = str_replace('.info', '+info', $result);



    $result = str_replace('.net', '+net', $result);



    $result = str_replace('.us', '+us', $result);



    $result = str_replace('.org', '+org', $result);



    $result = str_replace('.co.id', '+co+id', $result);



    $result = str_replace('...', '', $result);



    $result = str_replace('.', '+', $result);



    $result = str_replace('<Referat> ', '', $result);



    $result = str_replace(' </Referat>', '', $result);



    $result = str_replace('&#63', '', $result);



    $result = str_replace(' _', '', $result);



    $result = str_replace('_', '', $result);



    $result = str_replace('Yahoo! Answers', '', $result);



    $result = str_replace(' :: ', '+', $result);



    $result = trim(strip_tags($result));



    $RemoveChars  = array( "([\40])" , "([^a-zA-Z0-9+])", "(-{2,})");



    $ReplaceWith = array("+", "", "-");



    return preg_replace($RemoveChars, $ReplaceWith, $result);



}



   



?>







<?php



function request_as_words($request) {



		$request = htmlspecialchars($request);



		$request = str_replace('.html', ' ', $request);



		$request = str_replace('.htm', ' ', $request);



		$request = str_replace('.', ' ', $request);



		$request = str_replace('/', ' ', $request);



		$request = str_replace('+', ' ', $request);



		$request = str_replace('-', ' ', $request);



		$request_a = explode(' ', $request);



		$request_new = array();



		foreach ($request_a as $token) {



			$request_new[] = ucwords(trim($token));



		}



		$request = implode(' ', $request_new);



		return $request;



	}



function CleanFileNameTitle($title){



$title = request_as_words($_SERVER['REQUEST_URI']);



    $title = str_replace('&#8230', '', $title);



    $title = str_replace(' &#8211', '', $title);



    $title = str_replace('&#8216', '', $title);



    $title = str_replace('&#8217', '', $title);



    $title = str_replace('&#39', '', $title);



    $title = str_replace(' &amp', '', $title);



    $title = str_replace(' ...', '', $title);



    $title = str_replace(':', '', $title);



    $title = str_replace(' |', '', $title);



    $title = str_replace(';', '', $title);



    $title = str_replace(';', '', $title);



    $title = str_replace(':', '', $title);



    $title = str_replace('(', '', $title);



    $title = str_replace(')', '', $title);



    $title = str_replace(' ?', '', $title);



    $title = str_replace(' ?', '', $title);



    $title = str_replace(',', '', $title);



    $title = str_replace(' -', '', $title);



    $title = str_replace(' /', '', $title);



    $title = str_replace('.com', '+com', $title);



    $title = str_replace('.net', '+net', $title);



    $title = str_replace('.info', '+info', $title);



    $title = str_replace('.org', '+org', $title);



    $title = str_replace('.us', '+us', $title);



    $title = str_replace('.co.id', '+co+id', $title);



      $title = trim(strip_tags($title));



    return ($title);



}



function CleanFileNameTitle2($result){



    $result = str_replace(' ', '-', $result);



	 $result = str_replace('&#8230', '', $result);



    $result = str_replace(' &#8211', '', $result);



    $result = str_replace('&#8216', '', $result);



    $result = str_replace('&#8217', '', $result);



    $result = str_replace('&#39', '', $result);



    $result = str_replace(' &amp', '', $result);



    $result = str_replace(' ...', '', $result);



    $result = str_replace(':', '', $result);



    $result = str_replace('|', '', $result);



    $result = str_replace(';', '', $result);



    $result = str_replace(';', '', $result);



    $result = str_replace(':', '', $result);



    $result = str_replace('(', '', $result);



    $result = str_replace(')', '', $result);



    $result = str_replace(' ?', '', $result);



    $result = str_replace(' ?', '', $result);



    $result = str_replace(',', '', $result);



    $result = str_replace(' -', '', $result);



    $result = str_replace(' /', '', $result);



    $result = str_replace('.com', '-com', $result);



    $result = str_replace('.net', '-net', $result);



    $result = str_replace('.info', '-info', $result);



    $result = str_replace('.org', '-org', $result);



    $result = str_replace('.us', '-us', $result);



    $result = str_replace('.co.id', '-co-id', $result);



    $result = trim(strip_tags(strtolower($result)));



    $RemoveChars  = array( "([\40])" , "([^a-zA-Z0-9+])", "(-{2,})");



    $ReplaceWith = array("+", "-", "-");



    return preg_replace($RemoveChars, $ReplaceWith, $result);



}



?>



<?php $termstring = CleanFileNameTitle($title) ?>











<div class="itemsresult">







</div>











<div id="sresult">



<?php



if ($termstring!='') {







$bingresults = perform_bing_web_search($termstring);







foreach ($bingresults as $result) {







		print '<div class="itemsresult"><h2 class="titlesresult"><a href="'.$result['permalink'].'">'.$result['title'] = preg_replace ('/&#?[a-z0-9]+;/i', '+', $result['title']).'</a></h2>';



		print '<p class="contentsresult">'.$result['abstract'].'</p>';



		print '<p><h3>source : <a rel="nofollow" target="_blank" href="'.$result['url'].'">'.$result['title'] = preg_replace ('/&#?[a-z0-9]+;/i', '+', $result['title']).'</a></h3></p>';	



                print '<div class="itemsresult">



</div>';		



		print '</a></div>';



}



}







?>


</div>





<div class="itemsresult">





<center><font color=red><b><h3>Powered by <a rel="nofollow" target="_blank" href="http://www.bing.com">Bing</a></h3></b></font></center>

<h3>Search the Article Using This Search Form:</h3>
 
<div style="background:#666;text-align:center;padding:5px;margin-bottom:0px;">

<form action="http://maxall.web.id/search" id="cse-search-box">
  <div>
    <input type="hidden" name="cx" value="partner-pub-6501756347319501:8i6i7sn0axd" />
    <input type="hidden" name="cof" value="FORID:11" />
    <input type="hidden" name="ie" value="ISO-8859-1" />
    <input type="text" name="q" size="35" />
    <input type="submit" name="sa" value="Search" class="button" />
  </div>
</form>
<script type="text/javascript" src="http://www.google.com/cse/brand?form=cse-search-box&amp;lang=in"></script>
</div>

</div>


</div>
<!-- END: CONTENT -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>