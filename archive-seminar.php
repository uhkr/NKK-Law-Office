<?php get_header(); ?>

<?php $args = ["title_en" => "SEMINAR", "title_ja" => "セミナー"]; get_template_part( 'content', 'pageheading', $args ); ?>
<?php get_template_part( 'content', 'breadcrumbs' ); ?>

<!-- コンテンツ -->
<main id="mainBox">

	<!-- セミナー -->
	<section class="mainCntBox" id="_archive-seminar">
		<div class="cntInner _Inner">
			<div class="cntList">
      <?php if(have_posts()): while(have_posts()): the_post(); $id = get_the_ID(); ?>
        <?php 
        $data = get_post_meta($id, 'seminar_url');
        $data = isset($data[0]) ?  $data[0] : "";
        ?>
				<a href="<?php echo $data; ?>" class="item" target="_blank" rel="noopener">
          <div class="image">
            <?php 
            $data = get_post_meta($id, 'seminar_img');
            $data_url = wp_get_attachment_url($data[0]);
            if($data_url): ?>
            <img src="<?php echo $data_url; ?>" class="--img-cover --absolute" alt="<?php the_title(); ?>">
            <?php else: ?>
            <img src="<?php echo img_url(); ?>/seminar/seminar_img.jpg" class="--img-cover --absolute" alt="<?php the_title(); ?>">
            <?php endif; ?>
          </div>
					<h2 class="title"><?php the_title(); ?></h2>
					<p class="text _Text"><?php $data = get_post_meta($id, 'seminar_text'); if(isset($data[0])) echo $data[0]; ?></p>
					<div class="details">
						<div>
							<h3 class="dtitle">開催日</h3>
							<p class="dtext"><?php $data = get_post_meta($id, 'seminar_date'); if(isset($data[0])) echo date('Y年n月j日', strtotime($data[0])); ?></p>
						</div>
						<div>
							<h3 class="dtitle">受講料</h3>
							<p class="dtext"><?php $data = get_post_meta($id, 'seminar_fee'); if(isset($data[0])) echo $data[0]; ?></p>
						</div>
					</div>
					<div class="button _Btn-en -right"><span class="txt">VIEW MORE</span><span class="blank"></span></div>
				</a>
      <?php endwhile; endif; ?>
			</div>
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

	<?php get_template_part( 'content', 'access' ); ?>
	<?php get_template_part( 'content', 'contact' ); ?>

</main>

<?php get_footer(); ?>