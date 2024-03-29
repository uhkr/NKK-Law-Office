<?php 
$title_ja = get_the_title();
$title_en = get_post_meta(get_the_ID(), 'pageHeading_en');
if(isset($title_en[0])){ $title_en = $title_en[0];
}else{ $title_en = null; }

$pageHeading_img = get_post_meta(get_the_ID(), 'pageHeading_img');
if(isset($pageHeading_img[0])){ $pageHeading_img_url = wp_get_attachment_url($pageHeading_img[0]);
}else{ $pageHeading_img_url = null; }
if(!$pageHeading_img_url) $pageHeading_img_url = get_template_directory_uri() . "/img/common/pageHeading.jpg";

$wp_obj = get_queried_object();
if(is_post_type_archive()){
	// $title_ja = $wp_obj->label;
	$title_ja = str_replace("アーカイブ: ","", get_the_archive_title());
}elseif(is_date()){
	$year  = get_query_var('year');
  $month = get_query_var('monthnum');
  $day   = get_query_var('day');
	if($year) $title_ja = $year."年";
	if($month) $title_ja .= $month."月";
	if($day) $title_ja .= $day."日";
}elseif(is_author()){
	$title_ja = $wp_obj->display_name;
}elseif(is_archive()){
	$title_ja = $wp_obj->name;
}

$class = "";
$bg = "";
if(isset($args)){
  if(isset($args["title_ja"])) $title_ja = $args["title_ja"];
  if(isset($args["title_en"])) $title_en = $args["title_en"];
  if(isset($args["class"])) $class = $args["class"];
  if(isset($args["bg"]) && $args["bg"] != ""){
		$class .= " -bgimg";
		$bg = $args["bg"];
	}
}
?>

<div id="pageHeading" <?php if($class != "") echo 'class="'.$class.'"'; ?>>
	<div class="cntInner _Inner">
		<div class="cntTitle">
			<small class="en"><?php echo $title_en; ?></small>
			<h2 class="ja"><?php echo $title_ja; ?></h2>
		</div>
	</div>
	<?php if($bg != ""): ?>
		<div class="cntImg-bg"><img src="<?php echo $bg; ?>" class="--img-cover" alt="<?php echo $title_ja; ?>"></div>
	<?php endif; ?>
</div>