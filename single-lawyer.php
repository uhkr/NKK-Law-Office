<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): the_post(); $id = get_the_ID(); ?>

<div id="pageHeading">
	<?php get_template_part( 'content', 'breadcrumbs' ); ?>

	<div class="cntInner -lawyer">
		<div class="cntTitle-lawyer">
			<?php $data = get_post_meta($id, 'lawyer_position'); if(isset($data[0])): ?>
			<p class="text"><?php echo $data[0]; ?></p>
			<?php endif; ?>
			<h2 class="title"><?php the_title(); ?></h2>
			<?php $data = get_post_meta($id, 'lawyer_en'); if(isset($data[0])): ?>
			<p class="en"><?php echo $data[0]; ?></p>
			<?php endif; ?>
		</div>
		<div class="cntImg-lawyer">
			<?php $data = get_post_meta($id, 'lawyer_img');
			$data_url = wp_get_attachment_url($data[0]);
			if($data_url): ?>
			<img loading="lazy" src="<?php echo $data_url; ?>" class="--img-cover" alt="<?php the_title(); ?>">
			<?php endif; ?>
		</div>
	</div>
</div>

<!-- コンテンツ -->
<main id="mainBox">

	<!-- 主な取扱分野 -->
	<section class="mainCntBox" id="_content-01">
		<div class="cntInner _Inner-s">
			<h2 class="cntTitle _Title-underline">主な取扱分野</h2>
			<ul class="cntList">
				<?php $data = get_post_meta($id, 'lawyer_service_corporate'); if(isset($data[0])): ?>
				<li class="item">
					<h3 class="title">企業法務</h3>
					<p class="text _Text"><?php echo $data[0]; ?></p>
				</li>
				<?php endif; ?>
				<?php $data = get_post_meta($id, 'lawyer_service_individual'); if(isset($data[0])): ?>
				<li class="item">
					<h3 class="title">個人法務</h3>
					<p class="text _Text"><?php echo $data[0]; ?></p>
				</li>
				<?php endif; ?>
			</ul>
		</div>
	</section>

	<?php 
	$fields_list = CFS()->get('lawyer_list');
	if(is_array($fields_list)):
	?>
	<!-- その他 -->
	<section class="mainCntBox" id="_content-02">
		<div class="cntInner"><?php $index = 0;
			foreach ($fields_list as $list): $index++; ?>
			<div class="cntBox <?php if((count($fields_list) === $index) && ($index % 2 === 1)) echo "-col2"; ?>">
				<?php if($list["lawyer_list_title"]): ?>
				<h2 class="cntTitle _Title-underline"><?php echo $list["lawyer_list_title"]; ?></h2>
				<?php endif; ?>
				<?php 
				if(is_array($list["lawyer_list_texts"])):
				?>
				<ul class="cntList">
					<?php foreach($list["lawyer_list_texts"] as $text): ?>
					<li class="item">
						<p class="text _Text"><?php echo $text["lawyer_list_texts_text"]; ?></p>
					</li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
	</section>
	<?php endif; ?>

	<?php get_template_part( 'content', 'access' ); ?>
	<?php get_template_part( 'content', 'contact' ); ?>

</main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>