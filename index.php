<?php get_header(); ?>

<div id="mainVisual">
	<div class="cntBox">
		<div class="cntTitle --pc-tab">
			<p class="large --ff-en">YOUR<br>LEGAL<br>NAVIGATOR</p>
			<p class="small --ff-mincho">未来への成長をナビゲートします</p>
		</div>
		<?php
		$_posts = get_posts(array(
			'posts_per_page' => 1,
		));
		if($_posts):
		?>
		<div class="cntBox-news">
			<h2 class="title">NEWS</h2>
			<?php foreach($_posts as $post): setup_postdata($post); ?>
			<time class="date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
			<a href="<?php the_permalink(); ?>" class="text js-overflow" data-lh="1.5" data-line="2" data-sp-line="1"><?php the_title(); ?></a>
			<?php endforeach; ?>
			<div class="more"><a href="<?php echo home_url("information"); ?>" class="button _Btn-en -right"><span class="txt">VIEW MORE</span><span class="arrow"></span></a></div>
		</div>
		<?php endif; wp_reset_postdata(); ?>
		<div class="scroll"></div>
	</div>
	<div class="cntImg">
		<video src="<?php echo img_url(); ?>/top/mainVisual.mov" class="--img-cover" autoplay muted playsinline loop></video>
	</div>
	<div class="cntTitle --sp">
		<p class="large --ff-en">YOUR<br>LEGAL<br>NAVIGATOR</p>
		<p class="small --ff-mincho">未来への成長をナビゲートします</p>
	</div>
</div>

<!-- コンテンツ -->
<main id="mainBox">
	
	<!-- About Us -->
	<section class="mainCntBox" id="_about">
		<div class="cntInner _Inner">
			<div class="cntBox-title">
				<div class="cntTitle _Title"><small class="en">ABOUT US</small><h2 class="ja">事務所について</h2></div>
				<p class="_Catch">スピーディーかつ丁寧に、<br>戦略的なリーガルサービスを提供します。</p>
			</div>
			<div class="cntBox">
				<p class="cntText _Text">
					弁護士法人GROWTH　南舘・北川・木村法律事務所は、58年余の歴史ある法律事務所です。<br>
					私どもは、人や企業、社会が、法の力により問題を解決し、未来に向かって成長することをミッションとしています。そのミッションのために、時に、道なきところに道を作り、橋を架け、チームを作り、ナビゲーターとして成長のためのリーガルサービスを提供しています。<br>
					戦略的にナビゲートすることが、私どもの強みです。
				</p>
				<?php $url = get_page_url("about"); if($url): ?>
				<a href="<?php echo $url."#_philosophy"; ?>" class="cntBtn _Btn"><span class="txt">理念と指針</span><span class="arrow"></span></a>
				<a href="<?php echo $url."#_about"; ?>" class="cntBtn _Btn"><span class="txt">事務所概要</span><span class="arrow"></span></a>
				<a href="<?php echo $url."#_history"; ?>" class="cntBtn _Btn"><span class="txt">沿革</span><span class="arrow"></span></a>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- Lawyers -->
	<section class="mainCntBox" id="_lawyers">
		<div class="cntInner _Inner">
			<div class="cntTitle _Title-bg"><h1 class="ja">弁護士紹介</h1><small class="en">LAWYERS</small></div>
			<div class="cntDiv">
				<div class="cntBox-text">
					<p class="_Catch">個性ある弁護士による幅広く<span class="--d-ib">柔軟な対応</span></p>
					<p class="cntText _Text">
						ダイバーシティを重視して、個性ある弁護士が在籍しています。<br>
						幅広い得意分野を掛け合わせ、粘り強くサポートいたします。
					</p>
					<a href="<?php echo home_url("lawyer"); ?>" class="cntBtn _Btn"><span class="txt">弁護士 一覧</span><span class="arrow"></span></a>
				</div>
				<div class="cntBox-img"><div class="cntImg"><img src="<?php echo img_url(); ?>/top/lawyers_img.jpg" class="--img-cover" alt=""></div></div>
			</div>
		</div>
	</section>

	<!-- Service -->
	<section class="mainCntBox" id="_service">
		<div class="cntInner _Inner">
			<div class="cntTitle _Title-bg"><h1 class="ja">取扱業務</h1><small class="en">SERVICE</small></div>
			<div class="cntDiv">
				<div class="cntBox-img"><div class="cntImg"><img src="<?php echo img_url(); ?>/top//services_img.jpg" class="--img-cover" alt=""></div></div>
				<div class="cntBox-text">
					<p class="_Catch">社会のニーズに応えるため、<span class="--d-ib">幅広い分野</span>に対応しています。</p>
					<p class="cntText _Text">
						愛知県を中心とする東海地区において、多様な業種の企業・法人・経営者様とお付き合いさせていただいています。その経験を活かしながら、その時々の社会のニーズをキャッチして、幅広い業務に対応しております。
					</p>
					<a href="" class="cntBtn _Btn"><span class="txt">企業法務 一覧</span><span class="arrow"></span></a>
					<a href="" class="cntBtn _Btn -white"><span class="txt">内部通報</span><span class="arrow"></span></a>
					<a href="" class="cntBtn _Btn -white"><span class="txt">人事労務</span><span class="arrow"></span></a>
					<a href="" class="cntBtn _Btn -white"><span class="txt">カスタマー法務</span><span class="arrow"></span></a>
					<a href="" class="cntBtn _Btn"><span class="txt">個人法務 一覧</span><span class="arrow"></span></a>
				</div>
			</div>
		</div>
	</section>

	<!-- Information -->
	<?php
	$_posts = get_posts(array(
		'post_type' => array('post', 'seminar'),
		'posts_per_page' => 4,
	));
	if($_posts):
	?>
	<section class="mainCntBox" id="_info">
		<div class="cntInner _Inner">
			<div class="cntTitle _Title-bg"><h1 class="ja">新着情報</h1><small class="en">INFORMATION</small></div>
			<div id="_archive">
				<ul class="cntList-nav">
					<li class="item active" data-cat="all">すべて</li>
					<li class="item" data-cat="seminar">セミナー</li>
					<li class="item" data-cat="news">お知らせ</li>
					<li class="item" data-cat="topics">トピックス</li>
				</ul>
				<div class="cntList -all --h-opacity active">
					<?php foreach($_posts as $post): setup_postdata($post); ?>
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
					<?php endforeach; wp_reset_postdata(); ?>
				</div>
				<?php
				$_posts = get_posts(array(
					'post_type' => 'seminar',
					'posts_per_page' => 4,
				));
				if($_posts):
				?>
				<div class="cntList -seminar --h-opacity">
					<?php foreach($_posts as $post): setup_postdata($post); $id = get_the_ID(); ?>
					<?php 
					$data = get_post_meta($id, 'seminar_url');
					$data = isset($data[0]) ?  $data[0] : "";
					?>
					<a href="<?php echo $data; ?>" class="item --d-b">
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
						<h3 class="title"><?php the_title(); ?></h3>
						<?php $data = get_post_meta($id, 'seminar_date'); if(isset($data[0])): ?>
						<time class="date" datetime="<?php echo date('Y-m-d', strtotime($data[0])); ?>"><?php echo date('Y年n月j日', strtotime($data[0])); ?></time>
						<?php endif; ?>
					</a>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
				<?php
				$_posts = get_posts(array(
					'posts_per_page' => 4,
					'category_name' => 'news'
				));
				?>
				<div class="cntList -news --h-opacity">
					<?php if($_posts): foreach($_posts as $post): setup_postdata($post); ?>
					<a href="<?php the_permalink(); ?>" class="item">
						<?php $categories = get_the_category(); ?>
						<div class="category _Category <?php if(isset($categories[0])) echo "-".$categories[0]->slug; ?>"><?php echo $categories[0]->name; ?></div>
						<time class="date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
						<h3 class="title js-overflow" data-line="1" data-lh="1.5" data-sp-line="3"><?php the_title(); ?></h3>
					</a>
					<?php endforeach; endif; ?>
				</div>
				<?php
				$_posts = get_posts(array(
					'posts_per_page' => 4,
					'category_name' => 'topics'
				));
				?>
				<div class="cntList -topics --h-opacity">
					<?php if($_posts): foreach($_posts as $post): setup_postdata($post); ?>
					<a href="<?php the_permalink(); ?>" class="item">
						<div class="category _Category <?php if(isset($categories[0])) echo "-".$categories[0]->slug; ?>"><?php echo $categories[0]->name; ?></div>
						<time class="date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
						<h3 class="title js-overflow" data-line="1" data-lh="1.5" data-sp-line="3"><?php the_title(); ?></h3>
					</a>
					<?php endforeach; endif; ?>
				</div>
				<a href="<?php echo home_url("information"); ?>" class="cntBtn _Btn-en -right"><span class="txt">VIEW MORE</span><span class="arrow"></span></a>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<!-- Recruit -->
	<section class="mainCntBox" id="_recruit">
		<div class="cntInner _Inner">
			<div class="cntBox">
				<div class="cntTitle _Title"><h2 class="en">RECRUIT</h2></div>
				<?php $url = get_page_url("recruit"); if($url): ?>
				<a href="<?php echo $url; ?>" class="cntBtn _Btn"><span class="txt">採用情報</span><span class="arrow"></span></a>
				<?php endif; ?>
			</div>
		</div>
	</section>
  
	<?php get_template_part( 'content', 'access' ); ?>
	<?php get_template_part( 'content', 'contact' ); ?>

</main>

<?php get_footer(); ?>
