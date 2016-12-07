 <!-- .sidebar.php -->
<nav class="sidebar-container">
	<header>
		<h3>Navigation</h3>
		<a href="#0" class="sidebar-close-trigger">Close</a>
	</header>
	<ul class="nav-list">

<?php
$request_tag = $GLOBALS['request_tag'];
$tags_array = $GLOBALS['mygallery_tags'];
$url = site_url();
ksort($tags_array);

$_obj = new stdClass;
$_obj->name = 'all';
array_push($tags_array, $_obj);
foreach($tags_array as $tag_info){
	$tag_name = $tag_info->name;
	$_html = '<li';
	if($tag_name== 'all'){
		if($request_tag == ''){ $_html.= ' class="selected"'; }
		$_html.= '><a href="'.$url.'"><em>'.$tag_name.'</em></a></li>';
	} else {
		if($request_tag == $tag_name){ $_html.= ' class="selected"'; }
		$_html.= '><a href="'.$url.'/?my_tag='.$tag_name.'"><em>'.$tag_name.'</em></a></li>';
	}
	echo $_html;
}

?>
	</ul>

</nav>
<!-- .sidebar.php -->
