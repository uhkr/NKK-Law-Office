<?php get_header(); ?>

<?php $args = ["title_en" => "LAWYER", "title_ja" => "弁護士紹介"]; get_template_part( 'content', 'pageheading', $args ); ?>
<?php get_template_part( 'content', 'breadcrumbs' ); ?>

<!-- コンテンツ -->
<main id="mainBox">

	<!-- Lawyers -->
	<section class="mainCntBox" id="_lawyers">
		<div class="cntInner _Inner-s">
			<h2 class="cntTitle">
				ダイバーシティを重視して、<span class="--d-ib">個性ある弁護士が在籍しています。</span><br>
				幅広い得意分野を掛け合わせ、<span class="--d-ib">粘り強くサポートいたします。</span>
			</h2>
      <?php 
      $_posts = get_posts(array(
        'post_type' => 'lawyer',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
      ));
      if($_posts): //if(have_posts()): ?>
			<ul class="cntList">
        <?php foreach($_posts as $post): setup_postdata($post); $id = get_the_ID(); //while(have_posts()): the_post(); ?>
				<li class="item">
          <a href="<?php the_permalink(); ?>" class="--d-b">
            <div class="image">
              <?php 
              $data = get_post_meta($id, 'lawyer_img');
              $data_url = isset($data[0]) ? wp_get_attachment_url($data[0]) : false;
              if($data_url): ?>
              <img loading="lazy" src="<?php echo $data_url; ?>" class="--img-cover --absolute" alt="<?php the_title(); ?>">
              <?php endif; ?>
            </div>
            <?php $data = get_post_meta($id, 'lawyer_position'); if(isset($data[0])): ?>
            <p class="text"><?php echo $data[0]; ?></p>
            <?php endif; ?>
            <h3 class="title"><?php the_title(); ?></h3>
            <?php $data = get_post_meta($id, 'lawyer_en'); if(isset($data[0])): ?>
            <p class="en"><?php echo $data[0]; ?></p>
            <?php endif; ?>
          </a>
				</li>
        <?php endforeach; ?>
			</ul>
      <?php endif; ?>
		</div>
	</section>

	<?php get_template_part( 'content', 'access' ); ?>
	<?php get_template_part( 'content', 'contact' ); ?>

</main>


<?php get_footer(); ?>