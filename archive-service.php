<?php get_header(); ?>

<?php $args = ["title_en" => "SERVICE"]; get_template_part( 'content', 'pageheading', $args ); ?>
<?php get_template_part( 'content', 'breadcrumbs' ); ?>

<?php 
global $post;
function echo_service_archive($args){
  $_posts = new WP_Query($args);
  if($_posts): ?>

  <ul class="cntList">
    <?php while ($_posts->have_posts()): $_posts->the_post(); $id = get_the_ID(); ?>
    <li class="cntItem">
      <h3 class="title js-htit"><span class="txt"><?php the_title(); ?></span></h3>
      <div class="box">
        <div class="box-img"><div class="image"><?php 
          $data = get_post_meta($id, 'service_img');
          $data_url = wp_get_attachment_url($data[0]);
          if($data_url): ?>
          <img loading="lazy" src="<?php echo $data_url; ?>" class="--img-cover --absolute" alt="<?php the_title(); ?>">
          <?php endif; ?>
        </div></div>
        <?php $permalink = get_the_permalink(); ?>
        <div class="box-texts">
          <?php if(has_term("exclusive", "service-cat")): ?>
          <p class="text --h-opacity">
            <?php $data = get_post_meta($id, 'service_title'); ?>
            <a href="<?php echo $permalink; ?>"><?php if(isset($data[0]) && $data[0] != ""){ echo $data[0]; }else{ the_title(); } ?>の専用ページをご確認ください</a><?php 
            $data = get_post_meta($id, 'service_mainfield');
            if(isset($data[0])) echo "<br><br>【主な対応分野】<br>".nl2br($data[0]); ?>
          </p>
          <a href="<?php echo $permalink; ?>" class="button _Btn-en -right"><span class="txt">専用ページを見る</span><span class="arrow"></span></a>
          <?php else: ?>
          <ol class="list --h-opacity">
            <?php
            $content = get_the_content();
            $blocks = parse_blocks($content);
            $index = 0;
            foreach($blocks as $block) { // 分割したブロックを順番に処理
              if ($block['blockName'] == 'core/heading' && isset($block['attrs']['className']) && $block['attrs']['className'] == 'is-style-numbered') { // 見出しブロックの場合
                if(preg_match("/(<h([1-2]).*?>)(.*?)(<\/h[1-2]>)/", $block['innerHTML'], $match)){ ?>
                  <li><a href="<?php echo $permalink."#title-".sprintf('%02d', $index); ?>" class="link"><?php echo $match[3]; ?></a></li><?php
                  $index++;
                }
              }
            }
            ?>
          </ol>
          <a href="<?php echo $permalink; ?>" class="button _Btn-en -right"><span class="txt">詳細を見る</span><span class="arrow"></span></a>
          <?php endif; ?>
        </div>
      </div>
    </li>
    <?php endwhile; ?>
  </ul><?php 
  endif; wp_reset_postdata();
}
?>

<!-- コンテンツ -->
<main id="mainBox">

  <div id="_anchor" class="--tab-sp">
		<div class="cntInner">
			<a href="#_services" class="cntBtn">法人企業法務</a><a href="#_individual" class="cntBtn">個人法務</a>
		</div>
	</div>

	<div id="_services">

		<!-- 企業法務のお客様へ -->
		<section class="mainCntBox" id="_corporate">
			<div class="cntInner _Inner">
				<div class="cntTitle _Title-bg"><h2 class="ja">企業法務のお客様へ</h2><small class="en">CORPORATE</small></div>
        <?php
        $args = array(
          'post_type' => 'service',
          'tax_query' => array(array(
            'taxonomy' => 'service-cat',
            'field' => 'slug',
            'terms' => array('corporate'),
          )),
          'posts_per_page' => -1,
        );
        echo_service_archive($args);
        ?>
			</div>
		</section>

		<!-- 個人のお客様へ -->
		<section class="mainCntBox" id="_individual">
			<div class="cntInner _Inner">
				<div class="cntTitle _Title">
					<small class="en">INDIVIDUAL</small>
					<h2 class="ja">個人のお客様へ</h2>
				</div>
        <?php
        $args = array(
          'post_type' => 'service',
          'tax_query' => array(array(
            'taxonomy' => 'service-cat',
            'field' => 'slug',
            'terms' => array('individual'),
          )),
          'posts_per_page' => -1,
        );
        echo_service_archive($args);
        ?>
			</div>
		</section>
	</div>

	<?php get_template_part( 'content', 'access' ); ?>
	<?php get_template_part( 'content', 'contact' ); ?>

</main>


<?php get_footer(); ?>