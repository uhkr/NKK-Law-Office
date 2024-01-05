<?php get_header(); ?>


<div id="pageHeading">
	<?php get_template_part( 'content', 'breadcrumbs' ); ?>

	<div class="cntInner -post _Inner">
		<div class="cntTitle-post">
			<?php 
			$categories = get_the_category();
			if($categories): foreach($categories as $category):
				$cat_link = esc_url(get_category_link($category->term_id)); ?>
				<a href="<?php echo $cat_link; ?>" class="category _Category <?php echo "-".$category->slug; ?>"><?php echo $category->name; ?></a><?php
			endforeach; endif;
			?>
			<time class="date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年n月j日'); ?></time>
			<h2 class="title"><?php the_title(); ?></h2>
		</div>
	</div>
</div>

<!-- コンテンツ -->
<main id="mainBox">
	
	<div id="withSidebar">
		<div>
			<!-- 投稿 -->
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<section class="mainCntBox" id="_post">
				<div class="cntBox-top">

					<div id="toc_container" class="--h-opacity">
						<p class="toc_title">目次</p>
						<ul class="toc_list"></ul>
					</div>

					<div class="cntBox --h-opacity">
						<?php the_content(); ?>
					</div>

					<div class="cntBox-bottom">
						<div class="items">
							<div class="item"><?php previous_post_link('%link', '<span class="arrow"></span><span class="txt">PREV PAGE</span>'); ?></div>
							<div class="item"><?php next_post_link('%link', '<span class="txt">NEXT PAGE</span><span class="arrow"></span>'); ?></div>
						</div>

						<a href="<?php echo home_url("information"); ?>" class="button _Btn -prev"><span class="arrow"></span><span class="txt">一覧に戻る</span></a>
					</div>
				</div>
			</section>
			<?php endwhile; endif; ?>
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