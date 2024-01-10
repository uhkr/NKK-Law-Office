<?php get_header(); ?>

<?php 
$id = get_the_ID();
$data = get_post_meta($id, 'service_img');
$data_url = $data ? wp_get_attachment_url($data[0]) : null;
$args = ["title_en" => "SERVICE", "bg" => $data_url];
get_template_part( 'content', 'pageheading', $args );
get_template_part( 'content', 'breadcrumbs' ); ?>

<!-- コンテンツ -->
<main id="mainBox">

	<div id="withSidebar">
		<div>
			<!-- 投稿 -->
			<section class="mainCntBox" id="_post">
				<div class="cntBox-top">

					<div id="toc_container" class="--h-opacity">
						<p class="toc_title">目次</p>
						<ul class="toc_list"></ul>
					</div>

					<div class="cntBox --h-opacity">
						<?php the_content(); ?>
					</div>
				</div>
			</section>
		</div>
		
		<!-- サイドバー -->
		<nav id="sidebar" class="--h-opacity">
			<div class="cntInner">
				<div class="cntBox">
					<h2 class="title">法人企業法務 一覧</h2>
					<ul class="cntList"><?php 
						$_posts = new WP_Query(array(
							'post_type' => 'service',
							'tax_query' => array(array(
								'taxonomy' => 'service-cat',
								'field' => 'slug',
								'terms' => array('corporate'),
							)),
							'posts_per_page' => -1,
						));
  					if($_posts): while ($_posts->have_posts()): $_posts->the_post(); ?>
						<li><a class="link -right" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</ul>
				</div>
				<div class="cntBox">
					<h2 class="title">個人法務 一覧</h2>
					<ul class="cntList"><?php 
						$_posts = new WP_Query(array(
							'post_type' => 'service',
							'tax_query' => array(array(
								'taxonomy' => 'service-cat',
								'field' => 'slug',
								'terms' => array('individual'),
							)),
							'posts_per_page' => -1,
						));
  					if($_posts): while ($_posts->have_posts()): $_posts->the_post(); ?>
						<li><a class="link -right" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</ul>
				</div>
			</div>
		</nav>
	</div>

	<?php get_template_part( 'content', 'access' ); ?>
	<?php get_template_part( 'content', 'contact' ); ?>

</main>


<?php get_footer(); ?>