<?php get_header(); ?>
<a href="#sidebar" class="sidebar-trigger">Menu<span></span></a>
<main>
	<?php
$request_tag = get_query_var('my_tag', '');

$query = new WP_Query(array(
	'post_type' => 'attachment'
,	'post_status' => 'inherit'
,	'post_mime_type' => 'image'
,	'posts_per_page' => -1
,	'category_name' => 'gallery'
,	'tag' => $request_tag
));
$tag_array = array();
while($query->have_posts()) : $query->the_post();
	$_obj = get_the_tags();
	if($_obj){
		$_tag = $_obj[0];
		$tag_array[$_tag->name] = $_tag;
	}

$post_id = $post->ID;
$_meta = wp_get_attachment_metadata($post_id);
$_w = $_meta['width'];
$_h = $_meta['height'];
//var_dump($_w);
//var_dump($_h);
	echo '<div class="item">';
	echo wp_get_attachment_image( $post_id, 'full', 0 );
	echo '<div class="mask"></div>';
	echo '</div>';
endwhile;
$GLOBALS['request_tag'] = $request_tag;
$GLOBALS['mygallery_tags'] = $tag_array;
wp_reset_postdata();
	?>
</main>
<div class="overlay"></div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
