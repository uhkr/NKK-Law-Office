<?php get_header(); ?>

<?php 
$title_ja = "当事務所からのお知らせ";
if(is_date()){
  $year  = get_query_var('year');
  $month = get_query_var('monthnum');
  $day   = get_query_var('day');
	$title_ja .= "：".$year."年";
	if($month) $title_ja .= $month."月";
	if($day) $title_ja .= $day."日";
}elseif(is_category()){
	$title_ja .= "：".single_cat_title('', false);
}elseif(is_tag()){
	$title_ja .= "：".single_tag_title('', false);
}
$args = ["title_en" => "INFORMATION", "title_ja" => $title_ja];
get_template_part( 'content', 'pageheading', $args ); ?>
<?php get_template_part( 'content', 'breadcrumbs' ); ?>

<!-- コンテンツ -->
<main id="mainBox">
	
	<div id="withSidebar">
		<div>
			<!-- アーカイブ -->
			<section class="mainCntBox" id="_archive">
				<div class="cntList --h-opacity">
      	<?php if(have_posts()): while(have_posts()): the_post(); $id = get_the_ID(); ?>
					<?php 
					$post_type = get_post_type();
					if($post_type == "seminar"):
					$data = get_post_meta($id, 'seminar_url');
					$data = isset($data[0]) ?  $data[0] : "";
					?>
					<a href="<?php echo $data; ?>" class="item">
						<div class="category _Category -seminar">セミナー</div>
						<div class="col2">
							<?php $data = get_post_meta($id, 'seminar_date'); if(isset($data[0])): ?>
							<p class="text">開催日：<?php echo date('Y年m月d日', strtotime($data[0])); ?></p>
							<?php endif; ?>
							<?php $data = get_post_meta($id, 'seminar_fee'); if(isset($data[0])): ?>
							<p class="text">受講料：<?php echo $data[0]; ?></p>
							<?php endif; ?>
							<h3 class="title js-overflow" data-line="1" data-lh="1.5" data-sp-line="3"><?php the_title(); ?></h3>
						</div>
					</a>
					<?php else: ?>
					<a href="<?php the_permalink(); ?>" class="item">
						<?php $categories = get_the_category(); ?>
						<div class="category _Category <?php if(isset($categories[0])) echo "-".$categories[0]->slug; ?>"><?php echo $categories[0]->name; ?></div>
						<time class="date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
						<h3 class="title js-overflow" data-line="1" data-lh="1.5" data-sp-line="3"><?php the_title(); ?></h3>
					</a>
					<?php endif; ?>
				<?php endwhile; endif; ?>
				</div>
		
				<div id="pagination">
					<?php
					the_posts_pagination( array(
						'mid_size' => 1,
						'prev_text' => '',
						'next_text' => '',
					) );
					?>
				</div>
			</section>
		</div>
		
		<!-- サイドバー -->
		<nav id="sidebar" class="--h-opacity">
			<h2 class="cntTitle -en _Slider-tabsp --tab-sp">MENU</h2>
			<div class="cntInner">
				<div class="cntBox -bg">
					<h2 class="title -en">CATEGORY</h2>
					<ul class="cntList">
						<li><a class="link" href="<?php echo home_url("information"); ?>">すべて</a></li>
						<?php
						$categories = get_categories();
						foreach($categories as $category): ?>
							<li><a class="link" href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></li><?php
						endforeach;
						?>
						<li><a class="link" href="<?php echo home_url("seminar"); ?>">セミナー</a></li>
					</ul>
				</div>
				<div class="cntBox">
					<h2 class="title -en">YEARS</h2>
					<ul class="cntList">
						<li><a class="link" href="<?php echo home_url("information"); ?>">すべて</a></li>
						<?php wp_get_archives(array('type' => 'yearly',)); ?>
					</ul>
				</div>

				<?php 
				$args = array(
					'range' => 'all',
					'order_by' => 'views',
					'post_type' => 'post',
					'limit' => 3
				);
				$query = new \WordPressPopularPosts\Query($args);
				$posts = $query->get_posts();
				if($posts):
				?>
				<div class="cntBox">
					<h2 class="title -en">POPULAR</h2>
					<ul class="cntList-post">
					<?php 
					foreach ($posts as $post):
						$post = get_post($post->id);
						setup_postdata($post); ?>
						<li><a class="link" href="">
							<time class="date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
						<?php 
						$categories = get_the_category();
						?>
							<div class="category _Category <?php if(isset($categories[0])) echo "-".$categories[0]->slug; ?>"><?php echo $categories[0]->name; ?></div>
							<h3 class="text js-overflow" data-line="2" data-lh="1.8"><?php the_title(); ?></h3>
						</a></li>
						<?php endforeach; ?>
						<?php wp_reset_postdata(); ?>
					</ul>
				</div>
				<?php endif; ?>

				<?php 
				$tags = get_the_tags();
				if($tags): ?>
				<div class="cntBox">
					<h2 class="title -en">TAG</h2>
					<ul class="cntList-tag">
						<?php foreach($tags as $tag): ?>
						<li><a class="link" href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
			</div>
		</nav>
	</div>

	<?php get_template_part( 'content', 'access' ); ?>
	<?php get_template_part( 'content', 'contact' ); ?>
	
</main>

<?php get_footer(); ?>